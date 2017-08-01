jQuery(function() {
	jQuery('button.popup-1').on('click', function(){
		jQuery('.popup-overlay').fadeIn( 'slow' );
		console.log('ok');
	});

	jQuery('.popup-overlay').on('click', function(){
		jQuery('.popup-overlay').fadeOut();
	});
});