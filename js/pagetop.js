// JavaScript Document

/**
 * ページの最上部へ戻るボタンの初期設定を行います。
 */
$(document).ready(function() {
    var flag = false;
    var pagetop = $(".pagetop");
    $(window).scroll(function() {
        if($(this).scrollTop() > 100) {
            if(flag == false) {
                flag = true;
                pagetop.stop().animate({
                    "right": "0"
                }, 200);
            }
        } else {
            if(flag == true) {
                flag = false;
                pagetop.stop().animate({
                    "right": "-50px"
                }, 200);
            }
        }
    });
    pagetop.click(function() {
        $("body, html").animate({
			scrollTop: 0
		}, 800);
        return false;
    });
});
