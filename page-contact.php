<?php
/*
Template Name: Contact
*/
?>
<?php get_header(); ?>

<!-- パンくずリスト -->
<div id="breadcrumb">
  <a href="<?php echo home_url() ?>"><i class="fa fa-home"></i>HOME</a> &gt;
  <a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
</div>

<!-- 本文欄 -->
<div class="content">
  <h1><?php the_title(); ?></h1>
  創作活動部へのコンタクトはこちらからお願いします。<br>
  入部の希望や、質問、要望…どんなことでも構いません。<br>
  どうぞお気軽にご連絡下さい！<br>
  差し支えなければ、本文中に学年を含めて頂けると幸いです。<br>
  <br>

  <!-- WordPressプラグインの問い合わせフォーム -->
  <?php
    if(have_posts()) :
      while(have_posts()) :
        the_post();
        the_content();
      endwhile;
    endif;
  ?>
</div><!-- content -->

<?php get_footer(); ?>
