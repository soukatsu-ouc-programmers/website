<?php
/*
Template Name: Blog単一記事
*/
?>
<?php get_header(); ?>
<?php
  // 固定ページ自体のコンテンツを取り出す
  the_post();
?>

<!-- パンくずリスト -->
<div id="breadcrumb">
  <a href="<?php echo esc_url(home_url()); ?>"><i class="fa fa-home"></i>HOME</a> &gt;
  <a href="<?php echo esc_url(get_permalink(get_page_by_title('Blog'))); ?>">Blog</a> &gt;
  <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a>
</div>

<!-- 本文欄 -->
<div class="content post">
  <h1 class="title-single-article"><?php the_title(); ?><span class="post-date"><?php the_time('Y/m/d'); ?></span></h1>

    <div class="post-count">
<?php
    if(get_comments_number() > 0):
?>
      <!-- コメント数 -->
      <div class="post-comment-number">
        <i class="fa fa-comment-o" aria-hidden="true"></i> <?php echo get_comments_number(); ?>
      </div>
<?php
    endif;
?>

<?php
    if(function_exists('the_views')):
?>
      <!-- 閲覧数 -->
      <div class="post-view-number">
        <i class="fa fa-eye" aria-hidden="true"></i> <?php the_views(); ?>
      </div>
<?php
    endif;
?>
    </div>

  <!-- 記事本文 -->
  <div class="post-text">
<?php
  the_content();
?>
  </div>

  <!-- 関連付けられたタグ -->
  <div class="post-tag">
<?php
  foreach(get_the_tags() as $tag):
?>
    <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"><?php echo esc_html($tag->name); ?></a>
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
  <div id="navigator">
    <div class="pager-arrow"><?php next_post_link('%link', '<i class="fa fa-angle-left" aria-hidden="true"></i>'); ?></div>
    <div class="pager-home"><a href="<?php echo esc_url(get_permalink(get_page_by_title('Blog'))); ?>"><i class="fa fa-home"></i><span>Blog</span></a></div>
    <div class="pager-arrow"><?php previous_post_link('%link', '<i class="fa fa-angle-right" aria-hidden="true"></i>'); ?></div>
  </div>

</div><!-- content -->

<?php get_footer(); ?>
