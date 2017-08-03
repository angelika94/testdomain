var st = jQuery('.product_title').val();
if(/^[a-zA-Z0-9- ]*$/.test(st))  {
	jQuery('.product_title').css('direction','rtl');
}