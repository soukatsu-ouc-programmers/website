<?php
/*
Template Name: 固定ページ汎用
*/
?>
<?php
  get_header();

  // 固定ページ自体のコンテンツを取り出す
  the_post();
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

</div><!-- content -->

<?php get_footer(); ?>
