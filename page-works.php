<?php
/*
Template Name: Works
*/
?>
<?php
  get_header();

  // 固定ページ自体のコンテンツを取り出す
  the_post();

  // 「続きを読む」を有効にする
  global $more;
  $more = 0;
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

  <div class="content-description">
    <?php the_content(); ?>
  </div>

  <div class="content-category">
    <h2 class="title-sub">Category</h2>
    <ul class="category-list">
<?php
  $terms_category = get_terms('works_category');
  foreach($terms_category as $term):
?>
      <li><a href="<?php echo esc_url(get_term_link($term->slug, 'works_category')); ?>"><?php echo esc_html($term->name); ?></a></li>
<?php
  endforeach;
?>
    </ul>
  </div>

  <!-- 各記事の一覧 -->
<?php
  // 現在のページの作品一覧を取得
  $the_query = new WP_Query(
    array(
      'post_type' => 'works',
      'paged' => $paged
    )
  );
  while($the_query->have_posts()):
    $the_query->the_post();
    $terms_category = get_the_terms($post->ID, 'works_category');
    $terms_tag = get_the_terms($post->ID, 'works_tag');
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

    <!-- 関連付けられたカテゴリー -->
    <div class="post-category">
<?php
    foreach($terms_category as $term):
?>
      <a href="<?php echo esc_url(get_term_link($term->slug, 'works_category')); ?>"><?php echo esc_html($term->name); ?></a>
<?php
    endforeach;
?>
    </div>

    <div class="post-text">
      <!-- アイキャッチ -->
      <div class="thumbnail">
        <a href="<?php echo esc_url(the_permalink()); ?>">
<?php
    the_post_thumbnail('large');
?>
        </a>
      </div>

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
        <i class="fa fa-eye" aria-hidden="true"></i> <?php the_views(); ?>
      </div>
<?php
    endif;
?>
    </div>

    <!-- 関連付けられたタグ -->
    <div class="post-tag">
<?php
    foreach($terms_tag as $term) :
?>
      <a href="<?php echo esc_url(get_term_link($term->slug, 'works_tag')); ?>"><?php echo esc_html($term->name); ?></a>
<?php
    endforeach;
?>
    </div>
  </article>
<?php
  endwhile;
  wp_reset_postdata();
?>

  <!-- ナビゲーター -->
<?php
  if(function_exists('wp_pagenavi')):
    wp_pagenavi(
      array(
        'query' => $the_query
      )
    );
  endif;
?>

</div><!-- content -->

<?php get_footer(); ?>
