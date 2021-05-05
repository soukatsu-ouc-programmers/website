// JavaScript Document

/**
 * スライダーを初期化します。
 */
$(function() {
    // スライダーの初期設定
    $(".slick-slider").slick({
        autoplaySpeed: 30000,   // スライド１枚あたりの表示時間
        speed: 500,             // スライドの切り替え時間
        lazyLoad: "ondemand",   // バックグラウンドでスライド画像をロード
        arrows: false,          // 矢印ボタン
        dots: true,             // ドットインジケーター
        autoplay: true,         // 自動再生
        pauseOnHover: true,     // マウスホバーで自動再生を停止
        adaptiveHeight: true,   // 高さを可変にする
    });

    // スライドが切り替わるときに古いスライドの動画再生を一時停止する
    $(".slick-slider").on("beforeChange", function(e, slick) {
        slick = $(slick.$slider);
        controllVideo(slick, "pause");
    });
});


/**
 * Slickスライドの動画を再生/一時停止します。
 *
 * @param {object} slick   Slickスライド
 * @param {string} control 操作名
 */
function controllVideo(slick, control) {
    // 現在のプレイヤーを取得
    var currentSlide = slick.find(".slick-current");
    var player = currentSlide.find("iframe").get(0);

    // YouTubeにのみ対応する
    switch(control) {
        case "play":
            // ミュートにして再生する
            postMessageToPlayer(player, {
                "event": "command",
                "func": "mute"
            });
            postMessageToPlayer(player, {
                "event": "command",
                "func": "playVideo"
            });
            break;

        case "pause":
            postMessageToPlayer(player, {
                "event": "command",
                "func": "pauseVideo"
            });
            break;
    }
}


/**
 * YouTubeAPIを直接叩いてプレイヤーを操作します。
 *
 * @param {HTMLIFrameElement} player YouTubeのiframeオブジェクト
 * @param {object} command           送信するコマンドオブジェクト
 */
function postMessageToPlayer(player, command) {
    if(player == null || command == null) {
        return;
    }
    player.contentWindow.postMessage(JSON.stringify(command), "*");
}
