$(function() {

	"use strict";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	
	$(".preloader").fadeOut();

    $(".datepicker").datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });

    $('.action.action-confirm').on('click', function (e) {
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
        }, function () {
            window.location.href = elem.attr('href');
        });
    });

    $(".ajax-submit").submit(function(e) {

        e.preventDefault();

        var elem = $(this);


        var method = elem.attr('method');
        var action = elem.attr('action');

        console.log(method, action)

        elem.find('button[type=submit]').addClass('active');
        elem.find('button[type=submit]').attr('disabled', 'disabled');
        //elem.find('button[type=submit]').html('saving...');

        var submitError = function(err){
            elem.find('.form-success').addClass('hidden').html('');
            elem.find('.form-error').removeClass('hidden').html(err);
            elem.find('button[type=submit]').removeClass('active');
            //elem.find('button[type=submit]').removeAttr('disabled', 'disabled');
        }

        $.ajax({
            method: method,
            url: action+"-ajax",
            data: elem.serialize(),
            dataType: 'json',
            success: function(res) {

                console.log(res)
                elem.find('button[type=submit]').removeAttr('disabled', 'disabled');

                if(!res.success){

                    submitError(res.data)
                    return;
                }

                elem.find('.form-error').addClass('hidden').html('');
                elem.find('.form-success').removeClass('hidden').html(res.data);

                //elem.find('.modal-body').html('saved');
                elem.find('button[data-dismiss=modal]').click();
            },
            error: function(){

                elem.find('button[type=submit]').removeAttr('disabled', 'disabled');
                submitError('network error')
                return;
            }
        });
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


function renderTemplate(props) {
    return function(tok, i) {
        return (i % 2) ? props[tok] : tok;
    };
}