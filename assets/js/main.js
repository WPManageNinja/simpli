jQuery(document).ready(function($){
	'use strict';

	/* burger nav js */
	var navBar = $('#nav_bar');
	
	$('.menu_button').on('click', function(){
		navBar.fadeIn();
	});

	$('.close_button').on('click', function(){
		navBar.fadeOut();
	});

	/* Adminer add class */
    $('#wpadminbar').addClass('mobile');

});