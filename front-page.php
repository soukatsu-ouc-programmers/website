<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/slick.min.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/slick-theme.min.css">
<script src="<?php bloginfo('template_url'); ?>/js/slick.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/movie-slider.js"></script>

<div id="sp-logo"><img class="topimage" src="<?php bloginfo('template_url'); ?>/img/sp_logo.gif" width="250" height="110" alt=""></div>
<div id="description">小樽商科大学の創立<script type="text/javascript">myDate = new Date(); myYear = myDate.getFullYear() - 2013 + 1; document.write(myYear);</script>年目のサークル「創作活動部」のホームページです。</div>
<img class="pc topimage" src="<?php bloginfo('template_url'); ?>/img/topimage.jpg" width="780" height="200" alt="">

<!-- 右側の広告欄 -->
<div id="contents-wrapper">
  <div id="contents-right">
    <br class="sp-br"><div class="ad"><a href="leonardo.html"><img src="<?php bloginfo('template_url'); ?>/img/banner/banner_leonardo.png" width="200" height="75" alt=""></a><br>我が部のマスコット</div>
    <br class="sp-br"><div class="ad"><a href="http://www.kawaz.org/"><img src="<?php bloginfo('template_url'); ?>/img/banner/banner_kawazlogo.png" width="200" height="75" alt=""></a><br>交流させて頂いています</div>
    <br class="sp-br"><div class="ad"><a href="pagework/blessingcorolla/rpg.html"><img src="<?php bloginfo('template_url'); ?>/img/banner/banner_rpg01.png" width="200" height="75" alt=""></a><br>我が部の代表作</div>
    <br class="sp-br"><div class="ad"><a href="about.html"><img src="<?php bloginfo('template_url'); ?>/img/banner/banner_buin.gif" width="200" height="75" alt=""></a><br>入部についてはこちらから</div>
    <br class="sp-br"><div class="ad"><a href="http://slib.net/a/13641/"><img src="<?php bloginfo('template_url'); ?>/img/banner/banner_hoshizora.gif" width="200" height="75" alt=""></a><br>完結型の文芸作品はこちらから</div>
    <br class="sp-br"><div class="ad"><a href="http://mypage.syosetu.com/525447/"><img src="<?php bloginfo('template_url'); ?>/img/banner/banner_novelist.gif" width="200" height="75" alt=""></a><br>連載型の文芸作品はこちらから</div>
    <br clear="all">
  </div><!-- contents-right -->

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
      <span class="update-date"><?php the_time('Y/m/d'); ?></span>
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
  the_post();
  the_content();
?>

  </div><!-- contents-left -->
</div><!-- contents-wrapper -->

<?php get_footer(); ?>
