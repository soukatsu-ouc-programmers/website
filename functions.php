<?php

//---------------------------------------------------------------------------
//　サムネイルを使えるようにする
//---------------------------------------------------------------------------
add_theme_support('post-thumbnails');
set_post_thumbnail_size(150, 120, false);

// サムネイルのサイズを指定（追加）する
add_image_size('archive_thumbnail', 150, 120, false);


//---------------------------------------------------------------------------
//　固定ページのパーマリンクの最後に.htmlを付ける
//---------------------------------------------------------------------------
add_action('init', 'edit_page_url');
if(!function_exists('edit_page_url')) {
    function edit_page_url() {
        global $wp_rewrite;
        $wp_rewrite->use_trailing_slashes = false;
        $wp_rewrite->page_structure = $wp_rewrite->root . '%pagename%.html';
    }
}


//---------------------------------------------------------------------------
//　カスタムメニューの設定
//---------------------------------------------------------------------------
add_theme_support('menus');
register_nav_menu('primary', 'Header navigation menu');
register_nav_menu('footer-navi', 'Footer navigation menu');


//---------------------------------------------------------------------------
//　サイドバーの設定
//　nameとidを変更すれば幾つでも登録できる。
//　ダッシュボードの外観>ウィジェットから中身を設定可能。
//---------------------------------------------------------------------------
register_sidebar(array(
    'name'          => 'Sidebar-1',
    'id'            => 'sidebar-1',
    'description'   => 'Widget area of sidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s sidebar">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="text-center widgettitle">',
    'after_title'   => '</h4>'
));


//---------------------------------------------------------------------------
//  スマホならtrue, タブレット・PCならfalseを返す
//---------------------------------------------------------------------------
function is_mobile() {
    $useragents = array(
        'iPhone',          // iPhone
        'iPod',            // iPod touch
        'Android',         // 1.5+ Android
        'dream',           // Pre 1.5 Android
        'CUPCAKE',         // 1.5+ Android
        'blackberry9500',  // Storm
        'blackberry9530',  // Storm
        'blackberry9520',  // Storm v2
        'blackberry9550',  // Storm v2
        'blackberry9800',  // Torch
        'webOS',           // Palm Pre Experimental
        'incognito',       // Other iPhone browser
        'webmate'          // Other iPhone browser
    );
    $pattern = '/' . implode('|', $useragents).'/i';
    return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}


//---------------------------------------------------------------------------
//　外部ファイルの読み込み
//---------------------------------------------------------------------------
include_once(TEMPLATEPATH . "/custom-post-type.php");

?>
