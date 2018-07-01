<?php
/*
Template Name: レオナルドのおもちゃ箱単一記事
*/
?>
<?php get_header(); ?>
<?php
  if(have_posts()):
    // 固定ページ自体のコンテンツを取り出す
    the_post();
  endif;
  $terms_tag = get_the_terms($post->ID, 'leonardotoys_tag');
?>

<!-- パンくずリスト -->
<div id="breadcrumb">
  <a href="<?php echo esc_url(home_url()); ?>"><i class="fa fa-home"></i>HOME</a> &gt;
  <a href="<?php echo esc_url(get_permalink(get_page_by_title('Leonardo\'s Room'))); ?>">レオナルドの部屋</a> &gt;
  <a href="<?php echo esc_url(get_the_permalink()); ?>">おもちゃ箱：<?php the_title(); ?></a>
</div>

<!-- 本文欄 -->
<div class="content post">
  <h1 class="title-single-article">レオナルドのおもちゃ：<?php the_title(); ?><span class="post-date">（<?php the_time('Y/m/d'); ?>）</span></h1>

  <!-- 記事本文 -->
  <div class="post-text">
<?php
  the_content();
?>
  </div>

  <!-- ナビゲーター -->
  <div id="navigator">
    <div class="pager-arrow"><?php next_post_link('%link', '<i class="fa fa-angle-left" aria-hidden="true"></i>'); ?></div>
    <div class="pager-home"><a href="<?php echo esc_url(get_permalink(get_page_by_title('Leonardo\'s Room'))); ?>"><i class="fa fa-home"></i><span>Leonardo's Room</span></a></div>
    <div class="pager-arrow"><?php previous_post_link('%link', '<i class="fa fa-angle-right" aria-hidden="true"></i>'); ?></div>
  </div>

</div><!-- content -->

<?php get_footer(); ?>
