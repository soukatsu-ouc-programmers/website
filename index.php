<?php get_header(); ?>
<?php global $more; $more = 0; ?>

<!-- 本文欄 -->
<div class="content">
  <?php if(is_archive()) : ?>
    <h1><?php echo get_the_archive_title(); ?></h1>
  <?php endif; ?>

  <!-- 各記事の一覧 -->
  <?php while(have_posts()) : the_post(); ?>
    <h2 class="<?php echo esc_attr(get_post_type()); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  	<div class="post_datetime"><?php the_time('Y/m/d') ?></div>
    <div class="text" style="overflow: hidden;">
      <div class="thumbnail" style="float: left; margin-right: 20px;">
        <?php the_post_thumbnail(); ?>
      </div>
      <?php the_content('続きを読む'); ?>
    </div><!-- text -->
  <?php endwhile; ?>

  <!-- ナビゲーター -->
  <?php if(function_exists('wp_pagenavi')) wp_pagenavi(); ?>
</div><!-- content -->

<?php get_footer(); ?>
