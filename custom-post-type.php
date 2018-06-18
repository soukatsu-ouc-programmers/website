<?php

//---------------------------------------------------------------------------
//  カスタム投稿タイプ [作品] を登録
//---------------------------------------------------------------------------
function new_post_type_works() {
    register_post_type(
        'works',                       // 投稿タイプ名（識別子）
        array(
            'label' => '作品',
            'labels' => array(
                'add_new_item' => '作品を追加',
                'edit_item'    => '作品情報を編集',
                'view_item'    => '作品を表示',
                'search_items' => '作品を検索',
            ),
            'public'       => true,    // 管理画面に表示しサイト上にも表示する
            'hierarchical' => false,   // コンテンツを階層構造にするかどうか(投稿記事と同様に時系列に)
            'has_archive'  => true,    // trueにすると投稿した記事のアーカイブページを生成
            'supports' => array(       // 記事編集画面に表示する項目を配列で指定することができる
                'title',               // タイトル
                'editor',              // 本文（の編集機能）
                'thumbnail',           // アイキャッチ画像
                'custom-fields',       // カスタムフィールド
                'comments'             // コメント
            ),
            'menu_position' => 5       // 「投稿」の下に追加
        )
    );

    register_taxonomy(
        'works_category',
        'works',
        array(
            'label'  => '作品カテゴリー',
            'labels' => array(
                'popular_items' => 'よく使うカテゴリー',
                'edit_item'     => 'カテゴリーを編集',
                'add_new_item'  => '新規カテゴリーを追加',
                'search_items'  => 'カテゴリーを検索',
            ),
          'public'       => true,
          'hierarchical' => true,
          'rewrite'      => array('slug' => 'works/category')    // works_category の代わりに works/category でアクセス（URL)
        )
    );

    register_taxonomy(
        'works_tag',
        'works',
        array(
            'label'  => '作品タグ',
            'labels' => array(
                'popular_items' => 'よく使うタグ',
                'edit_item'     => 'タグを編集',
                'add_new_item'  => '新規タグを追加',
                'search_items'  =>  'タグを検索',
            ),
            'public'       => true,
            'hierarchical' => false,
            'rewrite'      => array('slug' => 'works/tag')
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
        'leonardotoys',                // 投稿タイプ名（識別子）
        array(
            'label'  => 'おもちゃ箱',
            'labels' => array(
                'add_new_item' => 'おもちゃを追加',
                'edit_item'    => 'おもちゃ情報を編集',
                'view_item'    => 'おもちゃを表示',
                'search_items' => 'おもちゃを検索',
            ),
            'public'       => true,    // 管理画面に表示しサイト上にも表示する
            'hierarchical' => false,   // コンテンツを階層構造にするかどうか(投稿記事と同様に時系列に)
            'has_archive'  => true,    // trueにすると投稿した記事のアーカイブページを生成
            'supports'     => array(   // 記事編集画面に表示する項目を配列で指定することができる
                'title',               // タイトル
                'editor',              // 本文（の編集機能）
                'custom-fields',       // カスタムフィールド
            ),
            'menu_position' => 5       // 「投稿」の下に追加
        )
    );

    register_taxonomy(
        'leonardotoys_category',
        'leonardotoys',
        array(
            'label'  => 'おもちゃカテゴリー',
            'labels' => array(
                'popular_items' => 'よく使うカテゴリー',
                'edit_item'     => 'カテゴリーを編集',
                'add_new_item'  => '新規カテゴリーを追加',
                'search_items'  => 'カテゴリーを検索',
            ),
          'public'       => true,
          'hierarchical' => true,
          'rewrite'      => array('slug' => 'leonardotoys/category')    // leonardotoys_category の代わりに leonardotoys/category でアクセス（URL)
        )
    );

    register_taxonomy(
        'leonardotoys_tag',
        'leonardotoys',
        array(
            'label'  => 'おもちゃタグ',
            'labels' => array(
                'popular_items' => 'よく使うタグ',
                'edit_item'     => 'タグを編集',
                'add_new_item'  => '新規タグを追加',
                'search_items'  => 'タグを検索',
            ),
            'public'       => true,
            'hierarchical' => false,
            'rewrite'      => array('slug' => 'leonardotoys/tag')
        )
    );

    flush_rewrite_rules();
}

add_action('init', 'new_post_type_leonardotoys');
add_rewrite_rule('leonardotoys/category/([^/]+)/?$', 'index.php?leonardotoys_category=$matches[1]', 'top');
add_rewrite_rule('leonardotoys/tag/([^/]+)/?$', 'index.php?leonardotoys_tag=$matches[1]', 'top');

?>
