$(document).ready(setHeight);
$(window).on('resize',setHeight);

function setHeight(){
	header = $('header').outerHeight();
	footer = $('footer.footer-area ').outerHeight();
	header_top = $('.header-top').outerHeight();
	section = $('.section-page-6').outerHeight();
	width = $( document ).width();
	height = header+footer+section-36-84;
	if(width<768){
		height = height+84;
	}
	$('#minHeight').css({'min-height':'calc(100vh - '+height+'px)'});
}