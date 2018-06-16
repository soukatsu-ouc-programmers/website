<?php
/*
Template Name: Blog単一記事
*/
?>
<?php get_header(); ?>
<?php
  if(have_posts()):
    the_post();
  endif;
?>

<!-- パンくずリスト -->
<div id="breadcrumb">
  <a href="<?php echo esc_url(home_url()); ?>"><i class="fa fa-home"></i>HOME</a> &gt;
  <a href="<?php echo esc_url(get_permalink(get_page_by_title('Blog'))); ?>">Blog</a> &gt;
  <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a>
</div>

<!-- 本文欄 -->
<div class="content">
  <h1><?php the_title(); ?></h1>
  <div class="post_datetime"><?php the_time('Y/m/d'); ?></div>

  <!-- 記事本文 -->
  <div class="text">
<?php
  the_content();
?>
  </div>

  <!-- 関連付けられたタグ -->
  <div class="post_tag">
<?php
  foreach(get_the_tags() as $tag):
?>
    <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">#<?php echo esc_html($tag->name); ?></a>
<?php
  endforeach;
?>
  </div>

  <!-- コメント欄 -->
  <div class="comments">
<?php
  comments_template();
?>
  </div>

  <!-- ナビゲーター -->
  <div class="navigator">
    <span class="nav-previous"><?php previous_post_link('%link', '前の記事へ'); ?></span>
    <span class="nav-next"><?php next_post_link('%link', '次の記事へ'); ?></span>
  </div>

</div><!-- content -->

<?php get_footer(); ?>
