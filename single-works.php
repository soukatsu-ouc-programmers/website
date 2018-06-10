<?php get_header(); ?>

<!-- パンくずリスト -->
<div id="breadcrumb">
	<a href="<?php echo home_url() ?>"><i class="fa fa-home"></i>HOME</a> &gt;
	<a href="works.html">Works</a>
</div>

<!-- 本文欄 -->
<div class="content">
	<h1>Works</h1>
	<p>
		各部員が製作した作品（入学以前、卒業以後のものも含む）をジャンルごとに掲載しています。<br>
		また、作品の著作権は各々部員に帰属します。無断転載はご遠慮下さい。<br>
	</p>

	<h2>ジャンル一覧</h2>
	<div class="text">
		<ul style="list-style-type: disc">
			<li><a href="pagework/project.html">グループ製作プロジェクト</a></li>
			<li><a href="pagework/software.html">個人製作：ソフトウェア</a></li>
			<li><a href="pagework/story.html">個人製作：文章</a></li>
			<li><a href="pagework/illustration.html">個人製作：イラスト</a></li>
			<li><a href="pagework/music.html">個人製作：音楽</a></li>
		</ul>
	</div>
</div><!-- content -->

<?php get_footer(); ?>
