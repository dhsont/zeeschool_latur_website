$(document).ready(function($) {
	$('.carousel').carousel('cycle',{interval:2000});	
	$("a[class^='popBox']").click(function(){
		var popUrl = $(this).attr('href');
		TINY.box.show({iframe:popUrl,width:600, height:500});
		return false;
	});
});
$(document).ready(function(){
	$("a[rel^='prettyPhoto']").prettyPhoto();
});
