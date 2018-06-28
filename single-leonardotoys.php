<?php
/*
Template Name: レオナルドのおもちゃ箱単一記事
*/
?>
<?php get_header(); ?>
<?php
  if(have_posts()):
    the_post();
  endif;
  $terms_tag = get_the_terms($post->ID, 'leonardotoys_tag');
?>

<!-- パンくずリスト -->
<div id="breadcrumb">
  <a href="<?php echo esc_url(home_url()); ?>"><i class="fa fa-home"></i>HOME</a> &gt;
  <a href="<?php echo esc_url(get_permalink(get_page_by_title('About'))); ?>">レオナルドの部屋</a> &gt;
  <a href="<?php echo esc_url(get_the_permalink()); ?>">おもちゃ箱：<?php the_title(); ?></a>
</div>

<!-- 本文欄 -->
<div class="content">
  <h1>レオナルドのおもちゃ：<?php the_title(); ?><span class="update-date">（<?php the_time('Y/m/d'); ?>）</span></h1>

  <!-- 関連付けられたタグ -->
  <div class="post-tag">
<?php
  foreach($terms_tag as $term):
?>
    <a href="<?php echo esc_url(get_term_link($term->slug, 'leonardotoys_tag')); ?>"><?php echo esc_html($term->name); ?></a>
<?php
  endforeach;
?>
  </div>

  <!-- 記事本文 -->
  <div class="text">
<?php
  the_content();
?>
  </div>

  <!-- ナビゲーター -->
  <div class="navigator">
    <span class="nav-previous"><?php previous_post_link('%link', '前のおもちゃへ'); ?></span>
    <span class="nav-next"><?php next_post_link('%link', '次のおもちゃへ'); ?></span>
  </div>

</div><!-- content -->

<?php get_footer(); ?>
