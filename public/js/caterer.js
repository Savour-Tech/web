$(function() {

	"use strict";
	
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