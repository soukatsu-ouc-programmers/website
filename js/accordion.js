// JavaScript Document

//SmartPhone Menu
$(function() {
    $(".sp_menu dd").css("display","none");
    $(".sp_menu dt").click(function(){
        $(this).toggleClass("open").next().slideToggle("fast");
    });
});
