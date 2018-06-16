<?php
/*
Template Name: Works単一記事
*/
?>
<?php get_header(); ?>
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
<div class="content">
  <h1><?php the_title(); ?></h1>
  <div class="post_datetime"><?php the_time('Y/m/d'); ?></div>
  <!-- アイキャッチ -->
<?php
  the_post_thumbnail('large');
?>
  <!-- 記事本文 -->
  <div class="text">
<?php
  the_content();
?>
  </div>

  <!-- 関連付けられたカテゴリー -->
  <div class="post_category">
<?php
  foreach($terms_category as $term) :
?>
    <a href="<?php echo esc_url(get_term_link($term->slug, 'works_category')); ?>"><?php echo esc_html($term->name); ?></a>
<?php
  endforeach;
?>
  </div>

  <!-- 関連付けられたタグ -->
  <div class="post_tag">
<?php
  foreach($terms_tag as $term):
?>
    <a href="<?php echo esc_url(get_term_link($term->slug, 'works_tag')); ?>">#<?php echo esc_html($term->name); ?></a>
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
    <span class="nav-previous"><?php previous_post_link('%link', '前の作品へ'); ?></span>
    <span class="nav-next"><?php next_post_link('%link', '次の作品へ'); ?></span>
  </div>

</div><!-- content -->

<?php get_footer(); ?>
