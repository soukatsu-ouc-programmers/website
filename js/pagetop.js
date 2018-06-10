// JavaScript Document

$(document).ready(function() {
	var flag = false;
	var pagetop = $('.pagetop');
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			if (flag == false) {
				flag = true;
				pagetop.stop().animate({
					'right': '0'
				}, 200);
			}
		} else {
			if (flag) {
				flag = false;
				pagetop.stop().animate({
					'right': '-50px'
				}, 200);
			}
		}
	});
	pagetop.click(function () {
		$('body, html').animate({ scrollTop: 0 }, 800);
		return false;
	});
});// JavaScript Document