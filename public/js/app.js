$(function() {

    "use strict";
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    
    $(".preloader").fadeOut();

    $('body .btn-loading').on('click', function(e){
        $(this).addClass('active');
    });

    $('.action-copy-clipboard').on('click', function (e) {
        e.preventDefault();

        var elem = $(this);
        var textToCopy = elem.attr('data-clip');

        copyToClipboard(textToCopy);

        toastInfo('text copied to clipboard!');
        
    });

    $('.action-confirm').on('click', function (e) {
        e.preventDefault();

        var elem = $(this);

        swal({
            title: elem.attr('data-title') || "Are you sure?",
            text: elem.attr('data-body') || "You will not be able to undo this action!",
            type: elem.attr('data-type') || "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: false
        }, function (res) {

            if(!res)
                return;

            if(elem.attr('type') == 'submit'){
                //it is a form

                var form = elem.parents('form');
                console.log(form);
                form.submit();

                return;
            }
            
            window.location.href = elem.attr('href');
        });
    });

    $(".ajax-submit").submit(function(e) {

        e.preventDefault();

        var elem = $(this);

        var submitError = function(err){
            elem.find('.form-success').addClass('hidden').html('');
            elem.find('.form-error').removeClass('hidden').html(err);
            elem.find('button[type=submit]').removeClass('active');
            //elem.find('button[type=submit]').removeAttr('disabled', 'disabled');
        }

        submitForm(elem,function(res){

            console.log(res);

            elem.find('button[type=submit]').removeAttr('disabled', 'disabled');

            elem.find('.form-error').addClass('hidden').html('');
            elem.find('.form-success').removeClass('hidden').html(res.message || 'successful');

            //elem.find('.modal-body').html('saved');
            elem.find('button[data-dismiss=modal]').click();

            if(elem.hasClass('with-toast')){
                toastSuccess('action succesful');
            }

        }, function(err){

            console.log(err.status);

            elem.find('button[type=submit]').removeAttr('disabled', 'disabled');
            submitError(err.responseJSON.message || 'network error')
        }) 
    });

    $(".ajax-submit-image").submit(function(e) {

        e.preventDefault();

        var elem = $(this);


        var method = elem.attr('method');
        var action = elem.attr('action');

        console.log(method, action)

        elem.find('button[type=submit]').attr('disabled', 'disabled');
        elem.find('button[type=submit]').html('saving...');


        var formData = new FormData();
        formData.append('file', elem.find('input[type=file]')[0].files[0]);


        elem.find('input').not( "[type=file]" ).each(function( index ) {
          formData.append($( this ).attr('name') , $( this ).val());
        });

        $.ajax({
            method: method,
            url: action,
            data: formData,
            processData: false,  // tell jQuery not to process the data
            contentType: false,  // tell jQuery not to set contentType
            success: function(res) {

                console.log(res)
                elem.find('button[type=submit]').removeAttr('disabled', 'disabled');

                if(!res.success){

                    elem.find('button[type=submit]').html('Submit');
                    elem.find('.form-error').removeClass('hidden').html(res.data);
                    return;
                }

                elem.find('.form-error').addClass('hidden').html('');
                elem.find('button[type=submit]').html('saved');
                elem.find('button[data-dismiss=modal]').click();
            },
            error: function(err){
                elem.find('button[type=submit]').removeAttr('disabled', 'disabled');
            }
        });
    });
});

/*
* App Functions
* for generic actions
*/

function toastInfo(message, afterHidden, opts){

    if(!opts)
        opts = {};

    $.toast({
        heading: opts.title || 'Info',
        text: message,
        position: opts.position || 'bottom-right',
        loaderBg:'#ff6849',
        icon: opts.icon || 'info',
        hideAfter: opts.hideAfter || 5000,
        afterHidden: afterHidden
    });
}

function toastSuccess(message, afterHidden){
    $.toast({
        heading: 'Success',
        text: message,
        icon: 'success',
        position: 'bottom-right',
        hideAfter: 5000,
        afterHidden: afterHidden
    });
}

function toastError(message){
    $.toast({
        heading: 'Error',
        text: message,
        position: 'bottom-right',
        loaderBg:'#ff0000',
        icon: 'error',
        hideAfter: 5000,
    });
}

function submitForm(elem, success, error){
    var method = elem.attr('method');
    var action = elem.attr('action');

    console.log(method, action)

    elem.find('button[type=submit]').addClass('active');
    elem.find('button[type=submit]').attr('disabled', 'disabled');
    //elem.find('button[type=submit]').html('saving...');

    $.ajax({
        method: method,
        url: action+"-ajax",
        data: elem.serialize(),
        dataType: 'json',
        success: success,
        error: error
    });
}

function isEmpty(text){
    return (text == '' || text == ' ' || !text || typeof text === 'undefined' || text == false );
}

function strtotime(str, is_date, seperator){

    if(!str)
        return;

    if(!seperator)
        seperator = '-';

    date = str.split(seperator);
    // Now we convert the array to a Date object, which has several helpful methods
    date =  new Date(date[2], date[1], date[0]);

    return (is_date)? date : date.getTime();
}

function formatNumber(amount, decimalCount = 2, decimal = ".", thousands = ",") {
   try {
    decimalCount = Math.abs(decimalCount);
    decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

    const negativeSign = amount < 0 ? "-" : "";

    let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
    let j = (i.length > 3) ? i.length % 3 : 0;

    return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
  } catch (e) {
    console.log(e)
    return amount;
  }
}

function cleanTemplate(elem) {
    return elem.html().split(/\$\{(.+?)\}/g);
}

function renderTemplate(props) {
    return function(tok, i) {
        return (i % 2) ? props[tok] : tok;
    };
}

function payWithRave(opts, success, failure) {

    var x = getpaidSetup({
        PBFPubKey: "FLWPUBK-caa04291d4295e3800bb3dafcd5aced8-X",
        customer_email: opts.email,
        amount: opts.amount,
        customer_phone: opts.phone,
        customer_firstname: opts.first_name || "",
        customer_lastname: opts.last_name || "",
        country: "NG",
        currency: opts.currency || "USD",
        txref: '' + Math.floor((Math.random() * 1000000000) + 1),
        meta: [{
            metaname: "Name",
            metavalue: opts.name
        }],
        onclose: function() {
            if(failure) failure(false);
        },
        callback: function(response) {
            //var txref = response.tx.txRef; // collect txRef returned and pass to a                  server page to complete status check.
            if (response.tx.chargeResponseCode == "00" || response.tx.chargeResponseCode == "0"){
                success(response);
            }
            else{
                if(failure) failure(response);
            }

            x.close(); // use this to close the modal immediately after payment.
        }
    });
}