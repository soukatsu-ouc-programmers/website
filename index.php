<?php get_header(); ?>
<?php global $more; $more = 0; ?>

index.php

<!-- 本文欄 -->
<div class="content">
  <h1>
  <?php
    if(is_author()) {
		$user_data = get_userdata($author);
		echo '投稿者「', $user_data->last_name, ' ', $user_data->first_name, '」';
	}
	if(is_category())                   echo '記事カテゴリー「', single_cat_title(), '」';
	if(is_tax('works_category'))        echo '作品カテゴリー「', single_cat_title(), '」';
	if(is_tax('leonardotoys_category')) echo 'おもちゃカテゴリー「', single_cat_title(), '」';
	if(is_tag())                        echo '記事タグ「', single_cat_title(), '」';
	if(is_tax('works_tag'))             echo '作品タグ「', single_cat_title(), '」';
	if(is_tax('leonardotoys_tag'))      echo 'おもちゃタグ「', single_cat_title(), '」';
  ?>
  </h1>

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
</div><!-- content -->

<?php if(function_exists('wp_pagenavi')) wp_pagenavi(); ?>
<?php get_footer(); ?>
