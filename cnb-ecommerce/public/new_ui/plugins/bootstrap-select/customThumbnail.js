$(document).ready(function(){
	const $_SELECT_PICKER = $('.selectpicker');

	$_SELECT_PICKER.find('option').each((idx, elem) => {
	    const $OPTION = $(elem);
	    const IMAGE_URL = $OPTION.attr('data-thumbnail');

	    if (IMAGE_URL) {
	        $OPTION.attr('data-content', "<img src='%i'/> %s".replace(/%i/, IMAGE_URL).replace(/%s/, $OPTION.text()))
	    }

	    console.warn('option:', idx, $OPTION)
	});

	// $_SELECT_PICKER.selectpicker();
});