<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>

<!-- パンくずリスト -->
<div id="breadcrumb">
  <a href="<?php echo esc_url(home_url()); ?>"><i class="fa fa-home"></i>HOME</a> &gt;
  <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a>
</div>

<!-- 本文欄 -->
<div class="content">
  <h1><?php the_title(); ?></h1>
<?php
  the_post();

  // 「続きを読む」を有効にする
  global $more;
  $more = 0;

  the_content();
?>

  <!-- 各記事の一覧 -->
<?php
  // 現在のページの記事一覧を取得
  $the_query = new WP_Query(
    array(
      'post_type' => 'post',
      'paged' => $paged
    )
  );
  while($the_query->have_posts()):
    $the_query->the_post();
?>
  <h2 class="<?php echo esc_attr(get_post_type()); ?>"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>
  <div class="post_datetime"><?php the_time('Y/m/d'); ?></div>
  <div class="text">
    <!-- 省略付き記事本文 -->
<?php
    the_content('続きを読む');
?>
  </div>

  <!-- 関連付けられたタグ -->
  <div class="post_tag">
<?php
    foreach(get_the_tags() as $tag):
?>
    <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">#<?php echo esc_html($tag->name); ?> </a>
<?php
    endforeach;
?>
  </div>
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
