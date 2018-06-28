<?php get_header(); ?>
<?php
  global $more;
  $more = 0;
  $category = get_the_category();
?>

<!-- パンくずリスト -->
<div id="breadcrumb">
<?php
  if(get_post_type() == 'post'):
?>
  <a href="<?php echo esc_url(home_url()); ?>"><i class="fa fa-home"></i>HOME</a> &gt;
  <a href="<?php echo esc_url(get_permalink(get_page_by_title('Blog'))); ?>">Blog</a> &gt;
  <a href="<?php echo esc_url(get_category_link($category->cat_ID)); ?>"><?php single_cat_title(); ?></a>
<?php
  endif;
?>

<?php
  if(get_post_type() == 'works'):
?>
  <a href="<?php echo esc_url(home_url()); ?>"><i class="fa fa-home"></i>HOME</a> &gt;
  <a href="<?php echo esc_url(get_permalink(get_page_by_title('Works'))); ?>">Works</a> &gt;
  <a href="<?php echo esc_url(get_category_link($category->cat_ID)); ?>"><?php single_cat_title(); ?></a>
<?php
  endif;
?>

<?php
  if(get_post_type() == 'leonardotoys'):
?>
  <a href="<?php echo esc_url(home_url()); ?>"><i class="fa fa-home"></i>HOME</a> &gt;
  <a href="<?php echo esc_url(get_permalink(get_page_by_title('レオナルドの部屋'))); ?>">レオナルドの部屋</a> &gt;
  <a href="<?php echo esc_url(get_category_link($category->cat_ID)); ?>"><?php single_cat_title(); ?></a>
<?php
  endif;
?>
</div>

<!-- 本文欄 -->
<div class="content">
<?php
  if(is_archive()):
?>
  <h1><?php echo esc_html(get_the_archive_title()); ?></h1>
<?php
  endif;
?>

  <!-- 各記事の一覧 -->
<?php
  while(have_posts()):
    the_post();
?>
  <h2 class="<?php echo esc_attr(get_post_type()); ?>"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>
  <div class="post_datetime"><?php the_time('Y/m/d'); ?></div>
  <div class="text clear-float">
    <!-- アイキャッチ -->
    <div class="thumbnail">
<?php
    the_post_thumbnail();
?>
    </div>
    <!-- 省略付き記事本文 -->
<?php
    the_content('続きを読む');
?>
  </div>

<?php
    // ブログ投稿：タグのみ
    if(get_post_type() == 'post'):
?>
  <!-- 関連付けられたタグ -->
  <div class="post-tag">
<?php
      $tags = get_the_tags();
      foreach($tags as $tag):
?>
    <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">#<?php echo esc_html($tag->name); ?></a>
<?php
      endforeach;
?>
  </div>
<?php
    endif;
?>

<?php
    // 作品投稿：カテゴリーとタグ
    if(get_post_type() == 'works'):
?>
  <!-- 関連付けられたカテゴリー -->
  <div class="post-category">
<?php
      $terms = get_the_terms($post->ID, 'works_category');
      foreach($terms as $term):
?>
    <a href="<?php echo esc_url(get_term_link($term->slug, 'works_category')); ?>"><?php echo esc_html($term->name); ?></a>
<?php
      endforeach;
?>
  </div>

  <!-- 関連付けられたタグ -->
  <div class="post-tag">
<?php
      $terms = get_the_terms($post->ID, 'works_tag');
      foreach($terms as $term):
?>
    <a href="<?php echo esc_url(get_term_link($term->slug, 'works_tag')); ?>">#<?php echo esc_html($term->name); ?></a>
<?php
      endforeach;
?>
  </div>
<?php
    endif;
?>

<?php
    // レオナルドのおもちゃ：タグのみ
    if(get_post_type() == 'leonardotoys'):
?>
  <!-- 関連付けられたタグ -->
  <div class="post-tag">
<?php
      $terms = get_the_terms($post->ID, 'leonardotoys_tag');
      foreach($terms as $term):
?>
    <a href="<?php echo esc_url(get_term_link($term->slug, 'leonardotoys_tag')); ?>">#<?php echo esc_html($term->name); ?></a>
<?php
      endforeach;
?>
  </div>
<?php
    endif;
?>

<?php
  endwhile;
  wp_reset_postdata();
?>

  <!-- ナビゲーター -->
<?php
  if(function_exists('wp_pagenavi')):
    wp_pagenavi();
  endif;
?>

</div><!-- content -->

<?php get_footer(); ?>
