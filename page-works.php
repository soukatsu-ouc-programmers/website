<?php
/*
Template Name: Works
*/
?>
<?php get_header(); ?>
<?php global $more; $more = 0; ?>

<!-- パンくずリスト -->
<div id="breadcrumb">
  <a href="<?php echo home_url() ?>"><i class="fa fa-home"></i>HOME</a> &gt;
  <a href="<?php echo get_the_permalink(); ?>">Works</a>
</div>

<!-- 本文欄 -->
<div class="content">
  <h1>Works</h1>
  各部員が制作した作品（入学以前、卒業以後のものも含む）をジャンルごとに掲載しています。<br>
  また、作品の著作権は各々部員に帰属します。無断転載はご遠慮下さい。<br>

  <!-- カテゴリー一覧 -->
  <h2>カテゴリー一覧</h>
  <ui>
    <?php $terms_category = get_terms('works_category'); ?>
    <?php foreach($terms_category as $term) : ?>
      <li><?php echo '<a href="' . get_term_link($term->slug, 'works_category') . '">' . $term->name . '</a> '; ?></li>
    <?php endforeach; ?>
  </ul>

  <!-- 各記事の一覧 -->
  <?php $the_query = new WP_Query(array('post_type' => 'works', 'paged' => $paged)); ?>
  <?php while($the_query->have_posts()) : $the_query->the_post(); ?>
    <h2 class="<?php echo esc_attr(get_post_type()); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  	<div class="post_datetime"><?php the_time('Y/m/d') ?></div>
    <div class="text" style="overflow: hidden;">
      <div class="thumbnail" style="float: left; margin-right: 20px;">
        <?php the_post_thumbnail(); ?>
      </div>
	    <?php the_content('続きを読む'); ?>
    </div><!-- text -->
  <?php
    endwhile;
    wp_reset_postdata();
  ?>

  <!-- ナビゲーター -->
  <?php if(function_exists('wp_pagenavi')) wp_pagenavi(array('query' => $the_query)); ?>
</div><!-- content -->

<?php get_footer(); ?>
