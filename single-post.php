<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>

<!-- パンくずリスト -->
<div id="breadcrumb">
  <a href="<?php echo home_url() ?>"><i class="fa fa-home"></i>HOME</a> &gt;
  <a href="/blog.html">Blog</a> &gt;
  <a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
</div>

<!-- 本文欄 -->
<div class="content">
<?php if(have_posts()) : the_post(); ?>
	<h1><?php the_title(); ?></h1>
	<div class="post_datetime"><?php the_time('Y/m/d') ?></div>

	<?php the_content(); ?>

    <div class="post_tag"><?php echo get_the_tags("#", ", "); ?></div>
<?php endif; ?>

<!-- コメント欄 -->
<div class="comments">
	<?php comments_template(); ?>
</div>

<!-- ナビゲーター -->
<div class="navigator">
	<span class="nav-previous"><?php previous_post_link('%link', '前の記事へ'); ?></span>
	<span class="nav-next"><?php next_post_link('%link', '次の記事へ'); ?></span>
</div><!-- navigator -->
</div><!-- content -->

<?php get_footer(); ?>
