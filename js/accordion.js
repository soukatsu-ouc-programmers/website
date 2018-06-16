// JavaScript Document

/**
 * アコーディオンを初期化します。
 */
$(function() {
    // スマホ版のハンバーガーメニュー
    $(".sp_menu dd").css("display","none");
    $(".sp_menu dt").click(function(){
        $(this).toggleClass("open").next().slideToggle("fast");
    });

    // 部員紹介
    $(".toggleMenu").accordion({
        //header: "h3",
        active: false,
        collapsible: true,
        heightStyle: "content"
    });
});
