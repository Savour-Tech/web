$(function() {

	"use strict";

    //generic data-table
    $('.g-data-table').DataTable();
	
	$('.cat-option').on('click', function(e){

        var elem = $(this);
        var input = $('#cat-value');
        var btn = $('#cat-selected-btn');

        if(!elem.hasClass('selected'))
            $('.cat-option').removeClass('selected');

        elem.addClass('selected');
        btn.removeAttr('disabled');
        input.val( elem.attr('data-value') );

    });

});