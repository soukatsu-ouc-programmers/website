// JavaScript Document

// ページ遷移中かどうか
var isPageMoving = false;


/**
 * アコーディオンを初期化します。
 */
$(function() {
    // スマホ版のハンバーガーメニュー
    $("#sp-menu-container dd").css("display", "none");
    $("#sp-menu-container dt").click(function() {
        if(isPageMoving == false) {
            $(this).toggleClass("open").next().slideToggle("fast");
        }
    });
    $("#sp-logo").bind("click", function(e) {
        // リンクのため、これ以上上のDOM階層にイベントを伝播させない
        e.stopPropagation();
    });

    // 部員紹介
    $(".toggleMenu").accordion({
        header: "h6",
        active: false,
        collapsible: true,
        heightStyle: "content"
    });

    $(window).bind('beforeunload', function(e) {
        isPageMoving = true;
    });
});
