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
  <?php last_breadcrumb($category); ?>
<?php
  endif;
?>

<?php
  if(get_post_type() == 'works'):
?>
  <a href="<?php echo esc_url(home_url()); ?>"><i class="fa fa-home"></i>HOME</a> &gt;
  <a href="<?php echo esc_url(get_permalink(get_page_by_title('Works'))); ?>">Works</a> &gt;
  <?php last_breadcrumb($category); ?>
<?php
  endif;
?>

<?php
  if(get_post_type() == 'leonardotoys'):
?>
  <a href="<?php echo esc_url(home_url()); ?>"><i class="fa fa-home"></i>HOME</a> &gt;
  <a href="<?php echo esc_url(get_permalink(get_page_by_title('レオナルドの部屋'))); ?>">レオナルドの部屋</a> &gt;
  <?php last_breadcrumb($category); ?>
<?php
  endif;
?>
</div>

<!-- 本文欄 -->
<div class="content">
<?php
  if(is_archive()):
?>
  <h1 class="title-main include-japanese"><?php echo get_the_archive_title(); ?></h1>
<?php
  endif;
?>

  <!-- 各記事の一覧 -->
<?php
  while(have_posts()):
    the_post();
?>
  <article class="post-article">
    <h2 class="<?php echo esc_attr(get_post_type()); ?> post-title">
      <a href="<?php esc_url(the_permalink()); ?>">
        <?php the_title(); ?>
      </a>
      <span class="post-date">
        （<?php the_time('Y/m/d'); ?>）
      </span>
    </h2>

<?php
    // 作品投稿：カテゴリーが有効
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
<?php
    endif;
?>

    <div class="post-text">
<?php
    // 作品投稿：アイキャッチが有効
    if(get_post_type() == 'works'):
?>
      <!-- アイキャッチ -->
      <div class="thumbnail">
<?php
    the_post_thumbnail('large');
?>
      </div>
<?php
    endif;
?>

      <!-- 省略付き記事本文 -->
      <div class="text">
<?php
    the_content('続きを読む');
?>
      </div>
    </div>

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
        <i class="fa fa-eye" aria-hidden="true"></i> <?php echo the_views(); ?>
      </div>
<?php
    endif;
?>
    </div>

<?php
    // ブログ投稿
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
    // 作品投稿
    if(get_post_type() == 'works'):
?>
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
    // レオナルドのおもちゃ
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
  </article>
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
