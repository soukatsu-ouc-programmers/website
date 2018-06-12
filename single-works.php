<?php get_header(); ?>

<!-- パンくずリスト -->
<div id="breadcrumb">
  <a href="<?php echo home_url() ?>"><i class="fa fa-home"></i>HOME</a> &gt;
  <a href="/works.html">Works</a> &gt;
  <a href="/works/category/...">カテゴリー名</a> &gt;
  <a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
</div>

<!-- 本文欄 -->
<div class="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h1><?php the_title(); ?></h1>
	<div class="post_datetime"><?php the_time('Y/m/d H:i') ?></div>

	<?php the_content(); ?>

	<div class="post_category">
		<?php
			$terms = get_the_terms($post->ID, 'works_category');
			foreach($terms as $term) {
				echo '<a href="' . get_term_link($term->slug, 'works_category') . '">' . $term->name . '</a> ';
			}
		?>
	</div>
    <div class="post_tag">
		<?php
			$terms = get_the_terms($post->ID, 'works_tag');
			foreach($terms as $term) {
				echo '<a href="' . get_term_link($term->slug, 'works_tag') . '">#' . $term->name . '</a> ';
			}
		?>
	</div>
<?php endwhile; ?>
	<div class="nav-below">
    	<span class="nav-previous"><?php previous_post_link('%link', '前の作品へ'); ?></span>
    	<span class="nav-next"><?php next_post_link('%link', '次の作品へ'); ?></span>
	</div><!-- /.nav-below -->
<?php else : ?>
	<h1>ページが見つかりませんでした</h1>
<?php endif; ?>
</div><!-- content -->

<?php get_footer(); ?>
