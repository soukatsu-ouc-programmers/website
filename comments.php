<div id="comment_area">

<!-- コメントリスト -->
<?php
  if(have_comments()):
?>
  <h3 id="comments" class="comment-title"><?php echo get_comments_number(); ?>件のコメント</h3>
  <ol class="comments-list-wrapper">
<?php
    wp_list_comments('callback=create_comment_form');
?>
  </ol>
<?php
  endif;
?>

<!-- 投稿欄 -->
<?php
  // ログインユーザーを取得
  $user = wp_get_current_user();

  comment_form(
    array(
      'title_reply'          => (is_user_logged_in() ? ('「' . $user->display_name . '」として') : '') . 'コメントを投稿',
      'label_submit'         => '送信',
      'comment_notes_before' => '<p class="commentNotesBefore">入力エリアすべてが必須項目です。メールアドレスが公開されることはありません。</p>',
      'comment_notes_after'  => '',
      'comment_field'        => '<textarea id="comment" name="comment" cols="50" rows="6" aria-required="true"' .
                                $aria_req .
                                ' placeholder="コメント本文を入力して下さい..." /></textarea>',
      'fields' => array(
        'author' => '<p class="comment-form-author">' .
                    '<div class="comment-form-label">名前/HN:</div>' .
                    '<input id="author" name="author" type="text" value="" size="30"' .
                    $aria_req .
                    ' placeholder="名無しさん" /></p>',
        'email'  => '<p class="comment-form-email">' .
                    '<div class="comment-form-label">メールアドレス:</div>' .
                    '<input id="email" name="email" ' .
                    ($html5 ? 'type="email"' : 'type="text"') .
                    ' value="" size="30"' .
                    $aria_req .
                    'placeholder="hoge@gmail.com" /></p>',
        'description' => '<p class="commentNotesAfter">内容をご確認の上、送信ボタンを押して下さい。</p>'
      ),
    )
  );
?>

</div>
