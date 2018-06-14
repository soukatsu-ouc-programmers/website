// JavaScript Document

$(function() {
	$(".main-slider").slick({
		autoplaySpeed: 30000,       // スライド１枚あたりの表示時間
		speed: 500,                 // スライドの切り替え時間
		lazyLoad: "ondemand",       // バックグラウンドでスライド画像をロード
		arrows: false,              // 矢印ボタン
		dots: true,                 // ドットインジケーター
		autoplay: true,             // 自動再生
		pauseOnHover: true,         // マウスホバーで自動再生を停止
	});
});
