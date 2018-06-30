<?php
/*
Template Name: About
*/
?>
<?php get_header(); ?>
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
  <h1><?php the_title(); ?></h1>
<?php
  the_post();
  the_content();
?>

  <h2>部員紹介</h2>
  <p>
    クリックすると展開します。
  </p>
  <div class="toggleMenu" id="member-list">
    <!-- 以下の見出しに使われている h3 タグはjQueryの仕様で決められているため変更しないこと -->
<?php
  // 学年ごとのカスタムフィールドのキーを走査
  foreach($member_grade as $summary => $field_key):
    // この学年のデータをすべて取り出す
?>
    <h3><?php echo esc_html($summary); ?></h3>
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
