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

<div id="sp_logo"><img class="topimage" src="<?php bloginfo('template_url'); ?>/img/sp_logo.gif" width="250" height="110" alt=""></div>
<div id="description">小樽商科大学の創立<script type="text/javascript">myDate = new Date(); myYear = myDate.getFullYear() - 2013 + 1; document.write(myYear);</script>年目のサークル「創作活動部」のホームページです。</div>
<img class="topimage" src="<?php bloginfo('template_url'); ?>/img/topimage.jpg" width="780" height="200" alt=""><br><br>


<!-- 右側の広告欄 -->
<div class="contents_right">
  <br class="sp_br"><div class="ad"><a href="leonardo.html"><img src="<?php bloginfo('template_url'); ?>/img/banner/banner_leonardo.png" width="200" height="75" alt=""></a><br>我が部のマスコット</div>
  <br class="sp_br"><div class="ad"><a href="http://www.kawaz.org/"><img src="<?php bloginfo('template_url'); ?>/img/banner/banner_kawazlogo.png" width="200" height="75" alt=""></a><br>交流させて頂いています</div>
  <br class="sp_br"><div class="ad"><a href="pagework/blessingcorolla/rpg.html"><img src="<?php bloginfo('template_url'); ?>/img/banner/banner_rpg01.png" width="200" height="75" alt=""></a><br>我が部の代表作</div>
  <br class="sp_br"><div class="ad"><a href="about.html"><img src="<?php bloginfo('template_url'); ?>/img/banner/banner_buin.gif" width="200" height="75" alt=""></a><br>入部についてはこちらから</div>
  <br class="sp_br"><div class="ad"><a href="http://slib.net/a/13641/"><img src="<?php bloginfo('template_url'); ?>/img/banner/banner_hoshizora.gif" width="200" height="75" alt=""></a><br>完結型の文芸作品はこちらから</div>
  <br class="sp_br"><div class="ad"><a href="http://mypage.syosetu.com/525447/"><img src="<?php bloginfo('template_url'); ?>/img/banner/banner_novelist.gif" width="200" height="75" alt=""></a><br>連載型の文芸作品はこちらから</div>
  <br clear="all">
</div><!-- contents_right -->


<!-- 左側の本文欄 -->
<div class="contents_left">
  <h1>新着情報</h1>
  <p>
    <?php
      $args = array(
        'post_type' => array('page', 'post', 'works', 'leonardotoys'),   // 投稿系をすべて対象とする
        'posts_per_page' => 5    // 取得件数
      );
      $the_query = new WP_Query($args);
      while($the_query->have_posts()) :
        $the_query->the_post();
        $the_post_type = get_post_type_object(get_post_type());
    ?>
      <span class="update_date"><?php the_time('Y/m/d') ?></span><?php echo esc_html($the_post_type->label); ?>: <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
    <?php
      endwhile;
      wp_reset_postdata();
    ?>
  </p>

  <h1>最近の作品</h1>
  <section class="main-slider">
    <div class="item youtube">
      <iframe width="500" height="280" src="https://www.youtube.com/embed/4LuvmbGfFSs" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="item youtube">
      <iframe width="500" height="280" src="https://www.youtube.com/embed/ozz6Fwrw3qc" frameborder="0" allowfullscreen></iframe>
    </div>
  </section>

  <h1>つぶやき</h1>
  <a class="twitter-timeline" href="https://twitter.com/Act_Ouc" lang="en" data-widget-id="667532351136624640" width="95%" height="400px">@Act_Oucさんのツイート</a>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

  <h1>創作活動部とは</h1>
  <p>
    私たちは自分が作りたい物を作っていくスタイルで活動しています。<br>
    個人で独立した作品を作ることもあれば、グループで作ることもあります。<br>
    現在は小説や漫画、ゲームといったコンテンツが中心です。<br>
    しかし、創立したばかりでまだ人数も少なく、制作の幅が限られるのが現状です。<br>
    部員募集…切実です。<br>
  </p>
</div><!-- contents_left -->

<?php get_footer(); ?>
