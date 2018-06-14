<?php
/*
Template Name: レオナルドのおもちゃ箱
*/
?>
<?php get_header(); ?>

<!-- パンくずリスト -->
<div id="breadcrumb">
  <a href="<?php echo home_url() ?>"><i class="fa fa-home"></i>HOME</a> &gt;
  <a href="/leonardo.html">レオナルドの部屋</a> &gt;
  <a href="<?php echo get_the_permalink(); ?>">おもちゃ箱：<?php the_title(); ?></a>
</div>

<!-- 本文欄 -->
<div class="content">
<?php if(have_posts()) : the_post(); ?>
	<h1>レオナルドのおもちゃ：<?php the_title(); ?></h1>
	<div class="post_datetime"><?php the_time('Y/m/d') ?></div>

	<?php the_content(); ?>

	<div class="post_category">
		<?php
			$terms = get_the_terms($post->ID, 'leonardotoys_category');
			foreach($terms as $term) {
				echo '<a href="' . get_term_link($term->slug, 'leonardotoys_category') . '">' . $term->name . '</a> ';
			}
		?>
	</div>
    <div class="post_tag">
		<?php
			$terms = get_the_terms($post->ID, 'leonardotoys_tag');
			foreach($terms as $term) {
				echo '<a href="' . get_term_link($term->slug, 'leonardotoys_tag') . '">#' . $term->name . '</a> ';
			}
		?>
	</div>
<?php endif; ?>


<!-- コメント欄 -->
<div class="comments">
	<?php comments_template(); ?>
</div>

<!-- ナビゲーター -->
<div class="navigator">
	<span class="nav-previous"><?php previous_post_link('%link', '前のおもちゃへ'); ?></span>
	<span class="nav-next"><?php next_post_link('%link', '次のおもちゃへ'); ?></span>
</div><!-- navigator -->
</div><!-- content -->

<?php if(function_exists('wp_pagenavi')) wp_pagenavi(); ?>
<?php get_footer(); ?>
