<?php
/*
Template Name: 固定ページ汎用
*/
?>
<?php get_header(); ?>

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
</div><!-- content -->

<?php get_footer(); ?>
