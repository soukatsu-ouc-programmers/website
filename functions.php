<?php

//---------------------------------------------------------------------------
//　サムネイルを使えるようにする
//---------------------------------------------------------------------------
add_theme_support('post-thumbnails');
set_post_thumbnail_size(150, 120, false);

// サムネイルのサイズを指定（追加）する
add_image_size('archive_thumbnail', 150, 120, false);

// サムネイルに別の解像度のsrcsetが挿入されないようにする
add_filter('wp_calculate_image_srcset_meta', '__return_null');


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


//---------------------------------------------------------------------------
//　コメント欄の生成
//---------------------------------------------------------------------------
function create_comment_form($comment, $args, $depth) {
  // ログインユーザーを取得
  $user = wp_get_current_user();

    // 最初の開始タグ li に対する終了タグはWordPressが自動で付加する
?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    <div id="comment-<?php comment_ID(); ?>">
      <div class="comments-list">
        <div class="comment-header">
          <!-- 投稿者名 -->
          <div class="comment-author">
<?php
  if(is_user_logged_in() && $user->display_name == get_comment_author()):
    // 自分の投稿のとき、投稿者名を太字にする
?>
            <span class="comment-author-me"><?php echo get_comment_author_link(); ?></span>
<?php
  else:
?>
            <?php echo get_comment_author_link(); ?>
<?php
  endif;
?>
          </div>

          <div class="comment-info">
            <!-- 投稿日時 -->
            <div class="comment-datetime"><?php echo (get_comment_date('Y/m/d') . ' ' . get_comment_time('H:i:s')); ?></div>
            <!-- 編集ボタン -->
<?php
  $edit_link = get_edit_comment_link();
  if($edit_link):
?>
            <div class="comment-edit"><a href="<?php echo esc_url($edit_link); ?>">編集</a></div>
<?php
  endif;
?>
          </div>
        </div>

<?php
  if($comment->comment_approved == '0'):
?>
        <em><?php echo 'このコメントはサイト管理者の承認待ちです。' ?></em>
<?php
  endif;
?>

        <!-- コメント本文 -->
        <div class="comment-text">
          <?php comment_text(); ?>
        </div>

        <!-- 返信ボタン -->
        <div class="comment-reply-wrapper">
          <div class="comment-reply">
<?php
  comment_reply_link(
    array_merge(
      $args,
      array(
        'depth' => $depth,
        'max_depth' => $args['max_depth']
      )
    )
  );
?>
          </div>
        </div>
      </div>
    </div>

<?php
}

//---------------------------------------------------------------------------
//　ログインしているときのコメント欄の表示
//---------------------------------------------------------------------------
add_filter( 'comment_form_logged_in', '__return_empty_string' );


//---------------------------------------------------------------------------
//　アーカイブページのパンくずリスト末尾の項目を出力
//---------------------------------------------------------------------------
function last_breadcrumb($category) {
    // ページ全体のタイトル有無を判定して出し分ける
    if(single_cat_title('', false)):
?>
  <a href="<?php echo esc_url(get_category_link($category->cat_ID)); ?>"><?php single_cat_title(); ?></a>
<?php
    else:
?>
  <a href=""><?php echo esc_html(get_the_archive_title()); ?></a>
<?php
    endif;
}

?>
