<?php
/*
Template Name: Members
*/
?>
<?php
  get_header();

  // 固定ページ自体のコンテンツを取り出す
  the_post();
?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/members.css">

<!-- パンくずリスト -->
<div id="breadcrumb">
  <a href="<?php echo esc_url(home_url()); ?>"><i class="fa fa-home"></i>HOME</a> &gt;
  <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a>
</div>

<!-- 本文欄 -->
<div class="content">
  <h1 class="title-main"><?php the_title(); ?></h1>

<?php
  if(function_exists('the_views') && is_user_logged_in()):
    // このページは管理者としてログインしているときのみ閲覧数を表示する
?>
  <!-- 固定ページ自体の閲覧数 -->
  <div class="post-count">
    <div class="post-view-number">
      <i class="fa fa-eye" aria-hidden="true"></i> <?php the_views(); ?>
    </div>
  </div>
<?php
  endif;
?>
<h2>部員紹介</h2>

<div class="members">
  <?php foreach (SCF::get('member') as $value): ?>
    <div class="member">
      <a href="<?php home_url( '/' ); ?>works/tag/<?= $value['name'] ?>">
        <img class="icon" src="<?= wp_get_attachment_url($value['icon']) ?>">
      </a>
      <h3><a href="<?php home_url( '/' ); ?>works/tag/<?= $value['name'] ?>"><?= $value['name'] ?></a></h3>
      <div class="social-icons">
        <a href="<?= $value['twitter'] ?>" target="_blank" class="<?php !empty($value['twitter']) ? print 'enable' : print 'disable' ?>">
          <img src="<?php bloginfo('template_url'); ?>/img/twitter_icon.svg" alt="twitter">
        </a>
        <a href="<?= $value['github'] ?>" target="_blank" class="<?php !empty($value['github']) ? print 'enable' : print 'disable' ?>">
          <img src="<?php bloginfo('template_url'); ?>/img/github_icon.svg" alt="github">
        </a>
        <a href="<?= $value['portfolio'] ?>" target="_blank" class="<?php !empty($value['portfolio']) ? print 'enable' : print 'disable' ?>">
          <img src="<?php bloginfo('template_url'); ?>/img/portfolio_icon.svg" alt="portfolio">
        </a>
      </div>
      <p class="roles">
        <?php foreach ($value['roles'] as $role): ?>
          <span>
            <?= $role ?>
          </span>
        <?php endforeach; ?>  
      </p>
    </div>
  <?php endforeach; ?>
</div>

</div><!-- content -->

<?php get_footer(); ?>