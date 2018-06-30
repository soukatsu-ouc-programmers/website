<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width,user-scalable=no">
  <meta id="keywords" content="小樽商科大学,創作活動部,よろず家,ゲーム,RPG,小説,作曲,プログラミング,プログラム,シナリオ,マネジメント,エディター,ツクール,ウディタ,Unity">
  <meta id="description" content="小樽商科大学のサークル「創作活動部」のホームページです。">
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/reset.css">
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/common.css">
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/sp.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Advent+Pro">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/jquery-ui.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/jquery.sidr.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/jquery.slidemenu.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/jquery.taphover.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/pagetop.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/accordion.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/smoothscroll.js"></script>
<?php
  wp_deregister_script('jquery');
  wp_head();
?>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/ez-toc.css">
</head>

<body>
<!-- スマホ版メニュー -->
<div id="sp-menu-container">
  <dl id="sp-menu">
    <dt>&nbsp;&nbsp;≡</dt>
    <dd>
      <ul>
        <li><a href="<?php echo esc_url(get_permalink(get_page_by_title('About'))); ?>">About<span class="menu-comment">創作活動部について</span></a></li>
        <li><a href="<?php echo esc_url(get_permalink(get_page_by_title('Works'))); ?>">Works<span class="menu-comment">作品紹介</span></a></li>
        <li><a href="<?php echo esc_url(get_permalink(get_page_by_title('Blog'))); ?>">Blog<span class="menu-comment">部員日記</span></a></li>
        <li><a href="<?php echo esc_url(get_permalink(get_page_by_title('Contact'))); ?>">Contact<span class="menu-comment">連絡先</span></a></li>
      </ul>
    </dd>
  </dl>
</div>

<div id="container">
<div id="main">

<!-- パソコン版メニュー -->
<div id="menu">
  <div id="logo"><a href="<?php echo esc_url(home_url()); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo.gif" width="220" height="auto" alt=""></a></div>
  <ul>
    <li><a href="<?php echo esc_url(get_permalink(get_page_by_title('About'))); ?>">About<br><span class="menu-comment">創作活動部について</span></a></li>
    <li><a href="<?php echo esc_url(get_permalink(get_page_by_title('Works'))); ?>">Works<br><span class="menu-comment">作品紹介</span></a></li>
    <li><a href="<?php echo esc_url(get_permalink(get_page_by_title('Blog'))); ?>">Blog<br><span class="menu-comment">部員日記</span></a></li>
    <li><a href="<?php echo esc_url(get_permalink(get_page_by_title('Contact'))); ?>">Contact<br><span class="menu-comment">連絡先</span></a></li>
  </ul>
</div>

<!-- メインコンテンツ -->
<div id="contents">
