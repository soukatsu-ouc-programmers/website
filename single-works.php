<?php
/*
Template Name: Works単一記事
*/
?>
<?php get_header(); ?>
<link rel="stylesheet" href="/wp-content/themes/createactouc/css/post.css">

<?php
  if(have_posts()):
    the_post();
  endif;
  $terms_category = get_the_terms($post->ID, 'works_category');
  $terms_tag = get_the_terms($post->ID, 'works_tag');
?>

<!-- パンくずリスト -->
<div id="breadcrumb">
  <a href="<?php echo esc_url(home_url()); ?>"><i class="fa fa-home"></i>HOME</a> &gt;
  <a href="<?php echo esc_url(get_permalink(get_page_by_title('Works'))); ?>">Works</a> &gt;
<?php
  // カテゴリー階層もパンくずリストに含める
  foreach($terms_category as $term):
?>
  <a href="<?php echo esc_url(get_term_link($term->slug, 'works_category')); ?>"><?php echo esc_html($term->name); ?></a> &gt;
<?php
  endforeach;
?>
  <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a>
</div>

<!-- 本文欄 -->
<div class="content post">
  <h1 class="ttl-main"><?php the_title(); ?><span class="update-date"><?php the_time('Y/m/d'); ?></span></h1>

  <!-- 関連付けられたカテゴリー -->
  <div class="post-category">
<?php
  foreach($terms_category as $term) :
?>
    <a href="<?php echo esc_url(get_term_link($term->slug, 'works_category')); ?>"><?php echo esc_html($term->name); ?></a>
<?php
  endforeach;
?>
  </div>

  <!-- アイキャッチ -->
  <div class="thumbnail-full">
<?php
  the_post_thumbnail('large');
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
foreach($terms_tag as $term):
?>
    <a href="<?php echo esc_url(get_term_link($term->slug, 'works_tag')); ?>"><?php echo esc_html($term->name); ?></a>
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
    <div id="nav-next" class="pager-arrow"><?php next_post_link('%link', '<i class="fa fa-angle-left" aria-hidden="true"></i>'); ?></div>
    <div id="nav-home" class="pager-home"><a href="<?php echo esc_url(get_permalink(get_page_by_title('Works'))); ?>"><i class="fa fa-home"></i><span>Works</span></a></div>
    <div id="nav-previous" class="pager-arrow"><?php previous_post_link('%link', '<i class="fa fa-angle-right" aria-hidden="true"></i>'); ?></div>
  </div>

</div><!-- content -->

<?php get_footer(); ?>
