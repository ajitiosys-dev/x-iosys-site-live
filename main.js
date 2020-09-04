$(function() {
	console.log('New JS Working');
	$('img').each(function() {
		$(this).attr("src", $(this).attr('src').replace("/wp-content/uploads/2019/04/", "images/2019/04/")); 
	});


	$('img').each(function() {
		$(this).attr("src", $(this).attr('src').replace("https://iosys.in/wp-content/themes/palmspire/images/", "images/")); 
	});


	$('img').each(function() {
		$(this).attr("src", $(this).attr('src').replace("../wp-content/uploads/2018/05/", "images/2018/05/")); 
	});


	$('img').each(function() {
		$(this).attr("src", $(this).attr('src').replace("/wp-content/uploads/", "images/")); 
	});


	$('img').each(function() {
		$(this).attr("src", $(this).attr('src').replace("wp-content/uploads/", "images/")); 
	});
})