<?php
/*
Template Name: Blog
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
  部員たちによる活動報告やプライベートな日記などを綴っていきます。<br>

  <!-- 各記事の一覧 -->
  <?php $the_query = new WP_Query(array('post_type' => 'post')); ?>
  <?php while($the_query->have_posts()) : $the_query->the_post(); ?>
    <h2 class="<?php echo esc_attr(get_post_type()); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  	<div class="post_datetime"><?php the_time('Y/m/d') ?></div>
    <div class="text" style="overflow: hidden;">
      <div class="thumbnail" style="float: left; margin-right: 20px;">
        <?php the_post_thumbnail(); ?>
      </div>
	    <?php the_content('続きを読む'); ?>
    </div><!-- text -->
  <?php endwhile; ?>
</div><!-- content -->

<?php get_footer(); ?>
