<?php
/*
Template Name: レオナルドの部屋
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
  <img src="<?php bloginfo('template_url'); ?>/img/logo.jpg" width="750"><br>

  <!-- 追従式レオナルド -->
  <div class="pc" style="position: fixed; right: 0; bottom: 0; z-index: 1">
    <img src="<?php bloginfo('template_url'); ?>/img/leonardo_follow.png" width="150">
  </div>

<?php
  the_post();
  the_content();
?>

  <h2>おもちゃ箱（ミニゲーム集）</h2>
  <ul class="circle">
<?php
  // ミニゲーム一覧を取得
  $posts = get_posts(
    array(
      'numberposts' => 999,            // 取得する件数
      'post_type' => 'leonardotoys'    // 取得する投稿タイプ
    )
  );
  if($posts):
    foreach($posts as $post):
      setup_postdata($post);
?>
      <li><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></li>
<?php
    endforeach;
  endif;
  wp_reset_postdata();
?>
 </ul>
 <br>
  ※ Windows/Mac/Linux/iOS/Android に対応しています。<br>
</div><!-- content -->

<?php get_footer(); ?>
