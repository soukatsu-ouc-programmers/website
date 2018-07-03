<?php
/*
Template Name: Home
*/
?>
<?php
  get_header();

  // 固定ページ自体のコンテンツを取り出す
  the_post();
?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/slick.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/slick-theme.css">
<script src="<?php bloginfo('template_url'); ?>/js/slick.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/movie-slider.js"></script>

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

<div id="description">小樽商科大学の創立<script type="text/javascript">myDate = new Date(); myYear = myDate.getFullYear() - 2013 + 1; document.write(myYear);</script>年目のサークル「創作活動部」のホームページです。</div>
<img class="topimage" src="<?php bloginfo('template_url'); ?>/img/topimage.jpg" alt="">

<div id="contents-wrapper">
  <!-- 左側の本文欄 -->
  <div id="contents-left">
    <h1>新着情報</h1>
    <p>
<?php
  // 新着記事の取得
  $the_query = new WP_Query(
    array(
      // 投稿系をすべて対象とする
      'post_type' => array(
        'page',
        'post',
        'works',
        'leonardotoys'
      ),
      // 取得件数
      'posts_per_page' => 5
    )
  );

  while($the_query->have_posts()):
    $the_query->the_post();
    $the_post_type = get_post_type_object(get_post_type());
?>
      <span class="post-date"><?php the_time('Y/m/d'); ?></span>
      <?php echo esc_html($the_post_type->label); ?>: <a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a><br>
<?php
  endwhile;
  wp_reset_postdata();
?>
    </p>

    <h1>最近の作品</h1>
    <section class="slick-slider">
<?php
  foreach(get_post_custom()['slider'] as $slider_item):
    // カスタムフィールドで埋め込みHTML/iframeを許可するためエスケープしない
?>
      <div class="youtube-wrapper"><div class="item youtube"><?php echo $slider_item; ?></div></div>
<?php
  endforeach;
?>
    </section>

    <h1>つぶやき</h1>
    <a class="twitter-timeline" href="https://twitter.com/Act_Ouc" lang="en" data-widget-id="667532351136624640">@Act_Oucさんのツイート</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

  <!-- 自由編集欄 -->
<?php
  the_content();
?>

  </div><!-- contents-left -->

  <!-- 右側の広告欄 -->
  <div id="contents-right">
<?php
  foreach(get_post_custom()['banner'] as $banner):
?>
    <br class="sp-br"><div class="ad">
<?php
      // カスタムフィールド内でショートコードを実行する
      // カスタムフィールドでのHTMLを許可するためエスケープしない
      echo do_shortcode($banner);
?>
    </div>
<?php
  endforeach;
?>
    <br clear="all">
  </div><!-- contents-right -->

</div><!-- contents-wrapper -->

<?php get_footer(); ?>
