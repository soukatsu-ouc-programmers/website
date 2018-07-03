<?php
/*
Template Name: About
*/
?>
<?php
  get_header();

  // 固定ページ自体のコンテンツを取り出す
  the_post();
?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/about.css">
<?php
  // 見出しとカスタムフィールドのキーの対応付け定義
  $member_grade = array(
   'ＯＢ・院生' => 'accordion-member-ob',
   '４年生' => 'accordion-member-4th-grade',
   '３年生' => 'accordion-member-3rd-grade',
   '２年生' => 'accordion-member-2nd-grade',
   '１年生' => 'accordion-member-1st-grade',
  );
?>

<!-- パンくずリスト -->
<div id="breadcrumb">
  <a href="<?php echo esc_url(home_url()); ?>"><i class="fa fa-home"></i>HOME</a> &gt;
  <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a>
</div>

<!-- 本文欄 -->
<div class="content">
  <h1 class="title-main"><?php the_title(); ?></h1>

<?php
  if(function_exists('the_views') && is_user_logged_in()):
    // このページは管理者としてログインしているときのみ閲覧数を表示する
?>
  <!-- 固定ページ自体の閲覧数 -->
  <div class="post-count">
    <div class="post-view-number">
      <i class="fa fa-eye" aria-hidden="true"></i> <?php the_views(); ?>
    </div>
  </div>
<?php
  endif;
?>

<?php
  the_content();
?>

  <h2>部員紹介</h2>
  <p>
    学年をクリックすると展開します。
  </p>
  <div class="toggleMenu" id="member-list">
<?php
  // 学年ごとのカスタムフィールドのキーを走査
  foreach($member_grade as $summary => $field_key):
    // この学年のデータをすべて取り出す
?>
    <h6><?php echo esc_html($summary); ?></h6>
    <div>
<?php
    foreach(get_post_custom()[$field_key] as $member_text):
?>
      <div class="member">
<?php
      // カスタムフィールドでのHTMLを許可するためエスケープしない
      echo $member_text;
?>
      </div>
<?php
    endforeach;
?>
    </div>
<?php
  endforeach;
?>
  </div>

  <p>
    他にも多数の部員が在籍しています。
  </p>

</div><!-- content -->

<?php get_footer(); ?>
