// JavaScript Document

$(function() {
    // SmartPhone Menu
    $(".sp_menu dd").css("display","none");
    $(".sp_menu dt").click(function(){
        $(this).toggleClass("open").next().slideToggle("fast");
    });

    // Members Toggle
    $(".toggleMenu").accordion({
        //header: "h3",
        active: false,
        collapsible: true,
        heightStyle: "content"
    });
});
