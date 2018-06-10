<?php

//---------------------------------------------------------------------------
//　jQueryを使えるようにする
//---------------------------------------------------------------------------
function add_jquery_scripts() {
    if(is_admin()) return;
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), false, false);
    // wp_enqueue_script('jquery-mig', get_template_directory_uri() . '/js/jquery-migrate-1.2.1.min.js', array(), false, false);
}
add_action('wp_enqueue_scripts', 'add_jquery_scripts');

//---------------------------------------------------------------------------
//　サムネイルを使えるようにする
//---------------------------------------------------------------------------
add_theme_support('post-thumbnails');

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
//　外部ファイルの読み込み
//  例えば、カスタム投稿タイプを作成する関数を記述したcustom-post-type.php
//---------------------------------------------------------------------------
include_once(TEMPLATEPATH . "/custom-post-type.php");

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
    $pattern = '/'.implode('|', $useragents).'/i';
    return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}


//---------------------------------------------------------------------------
//  カスタム投稿タイプ [作品] を登録
//---------------------------------------------------------------------------
function new_post_type_works() {
    register_post_type(
        'works',    // 投稿タイプ名（識別子）
        array(
            'label' => '作品一覧',
            'labels' => array(
                'add_new_item' => '作品を追加',
                'edit_item' => '作品情報を編集',
                'view_item' => '作品を表示',
                'search_items' => '作品を検索',
            ),
            'public' => true,          // 管理画面に表示しサイト上にも表示する
            'hierarchicla' => false,   // コンテンツを階層構造にするかどうか(投稿記事と同様に時系列に)
            'has_archive' => true,     // trueにすると投稿した記事のアーカイブページを生成
            'supports' => array(       // 記事編集画面に表示する項目を配列で指定することができる
                'title',               // タイトル
                'editor',              // 本文（の編集機能）
                'thumbnail',           // アイキャッチ画像
                'custom-fields',
                'excerpt'              // 抜粋
            ),
            'menu_position' => 5       // 「投稿」の下に追加
        )
    );

    register_taxonomy(
        'works_category',
        'works',
        array(
            'label' =>  'カテゴリー',
            'labels' => array(
                'popular_items' => 'よく使うカテゴリー',
                'edit_item' => 'カテゴリーを編集',
                'add_new_item' => '新規カテゴリーを追加',
                'search_items' =>  'カテゴリーを検索',
            ),
          'public' => true,
          'hierarchical' => true,
          'rewrite' => array('slug' => 'works/category')  // works_category の代わりに works/category でアクセス（URL)
        )
    );

    register_taxonomy(
        'works_tag',
        'works',
        array(
            'label' => 'タグ',
            'labels' => array(
                'popular_items' => 'よく使うタグ',
                'edit_item' => 'タグを編集',
                'add_new_item' => '新規タグを追加',
                'search_items' =>  'タグを検索',
            ),
            'public' => true,
            'hierarchical' => false,
            'rewrite' => array('slug' => 'works/tag')
        )
    );

    flush_rewrite_rules();
}
add_action('init', 'new_post_type_works');
add_rewrite_rule('works/category/([^/]+)/?$', 'index.php?works_category=$matches[1]', 'top');
add_rewrite_rule('works/tag/([^/]+)/?$', 'index.php?works_tag=$matches[1]', 'top');


//---------------------------------------------------------------------------
//  カスタム投稿タイプ [レオナルドのおもちゃ箱] を登録
//---------------------------------------------------------------------------
function new_post_type_leonardotoys() {
    register_post_type(
        'leonardotoys',    // 投稿タイプ名（識別子）
        array(
            'label' => 'レオナルドのおもちゃ箱一覧',
            'labels' => array(
                'add_new_item' => '作品を追加',
                'edit_item' => '作品情報を編集',
                'view_item' => '作品を表示',
                'search_items' => '作品を検索',
            ),
            'public' => true,          // 管理画面に表示しサイト上にも表示する
            'hierarchicla' => false,   // コンテンツを階層構造にするかどうか(投稿記事と同様に時系列に)
            'has_archive' => true,     // trueにすると投稿した記事のアーカイブページを生成
            'supports' => array(       // 記事編集画面に表示する項目を配列で指定することができる
                'title',               // タイトル
                'editor',              // 本文（の編集機能）
                'thumbnail',           // アイキャッチ画像
                'custom-fields',
                'excerpt'              // 抜粋
            ),
            'menu_position' => 5       // 「投稿」の下に追加
        )
    );

    register_taxonomy(
        'leonardotoys_category',
        'leonardotoys',
        array(
            'label' =>  'カテゴリー',
            'labels' => array(
                'popular_items' => 'よく使うカテゴリー',
                'edit_item' => 'カテゴリーを編集',
                'add_new_item' => '新規カテゴリーを追加',
                'search_items' =>  'カテゴリーを検索',
            ),
          'public' => true,
          'hierarchical' => true,
          'rewrite' => array('slug' => 'leonardotoys/category')  // leonardotoys_category の代わりに leonardotoys/category でアクセス（URL)
        )
    );

    register_taxonomy(
        'leonardotoys_tag',
        'leonardotoys',
        array(
            'label' => 'タグ',
            'labels' => array(
                'popular_items' => 'よく使うタグ',
                'edit_item' => 'タグを編集',
                'add_new_item' => '新規タグを追加',
                'search_items' =>  'タグを検索',
            ),
            'public' => true,
            'hierarchical' => false,
            'rewrite' => array('slug' => 'leonardotoys/tag')
        )
    );

    flush_rewrite_rules();
}
add_action('init', 'new_post_type_leonardotoys');
add_rewrite_rule('leonardotoys/category/([^/]+)/?$', 'index.php?leonardotoys_category=$matches[1]', 'top');
add_rewrite_rule('leonardotoys/tag/([^/]+)/?$', 'index.php?leonardotoys_tag=$matches[1]', 'top');
