<?php
/*
Template Name: レオナルドの部屋
*/
?>
<?php
  get_header();

  // 固定ページ自体のコンテンツを取り出す
  the_post();
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

  <p class="thumbnail-full"><img src="<?php bloginfo('template_url'); ?>/img/logo.jpg"></p>

  <!-- 追従式レオナルド -->
  <div class="pc follow-leonardo">
    <img src="<?php bloginfo('template_url'); ?>/img/leonardo_follow.png">
  </div>

<?php
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

  <p>
    ※ Windows/Mac/Linux/iOS/Android に対応しています。
  </p>
</div><!-- content -->

<?php get_footer(); ?>
