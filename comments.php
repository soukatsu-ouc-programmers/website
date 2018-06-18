<div id="comment_area">

<!-- コメントリスト -->
<?php
  if(have_comments()):
?>
  <h1 id="comments">コメント</h3>
  <ol class="commets-list">
<?php
    wp_list_comments();
?>
  </ol>
<?php
  endif;
?>

<!-- 投稿欄 -->
<?php
  comment_form(
    array(
      'title_reply'          => 'コメントを投稿',
      'label_submit'         => '投稿',
      'comment_notes_before' => '<p class="commentNotesBefore">入力エリアすべてが必須項目です。メールアドレスが公開されることはありません。</p>',
      'comment_notes_after'  => '<p class="commentNotesAfter">内容をご確認の上、投稿して下さい。</p>',
      'comment_field'        => '<p class="comment-form-comment">' .
                                '<textarea id="comment" name="comment" cols="50" rows="6" aria-required="true"' .
                                $aria_req .
                                ' placeholder="コメント本文を入力して下さい..." /></textarea></p>',
      'fields' => array(
        'author' => '<p class="comment-form-author">' .
                    '名前/HN: ' .
                    '<input id="author" name="author" type="text" value="" size="30"' .
                    $aria_req .
                    ' placeholder="名無しさん" /></p>',
        'email'  => '<p class="comment-form-email">' .
                    'メールアドレス: ' .
                    '<input id="email" name="email" ' .
                    ($html5 ? 'type="email"' : 'type="text"') .
                    ' value="" size="30"' .
                    $aria_req .
                    'placeholder="hoge@gmail.com" /></p>',
        'url'    => '',
      ),
    )
  );
?>

</div>
