<?php get_header(); ?>
<?php
  if (have_posts()) : the_post();
  $terms_category = get_the_terms($post->ID, 'works_category');
  $terms_tag = get_the_terms($post->ID, 'works_tag');
?>

<!-- パンくずリスト -->
<div id="breadcrumb">
  <a href="<?php echo home_url() ?>"><i class="fa fa-home"></i>HOME</a> &gt;
  <a href="/works.html">Works</a> &gt;
  <?php foreach($terms_category as $term) : ?>
    <?php echo '<a href="' . get_term_link($term->slug, 'works_category') . '">' . $term->name . '</a> '; ?> &gt;
  <?php endforeach; ?>
  <a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
</div>

<!-- 本文欄 -->
<div class="content">
	<h1><?php the_title(); ?></h1>
	<div class="post_datetime"><?php the_time('Y/m/d') ?></div>

    <?php the_post_thumbnail('large'); ?>
	<?php the_content(); ?>

	<div class="post_category">
		<?php foreach($terms_category as $term) : ?>
			<?php echo '<a href="' . get_term_link($term->slug, 'works_category') . '">' . $term->name . '</a> '; ?>
		<?php endforeach; ?>
	</div>
    <div class="post_tag">
		<?php foreach($terms_tag as $term) : ?>
			<?php echo '<a href="' . get_term_link($term->slug, 'works_tag') . '">#' . $term->name . '</a> '; ?>
		<?php endforeach; ?>
	</div>
</div><!-- content -->

<?php endif; ?>
<?php get_footer(); ?>
