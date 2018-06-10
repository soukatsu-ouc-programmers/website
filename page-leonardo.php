<?php
/*
Template Name: レオナルドの部屋
*/
?>
<?php get_header(); ?>

<!-- パンくずリスト -->
<div id="breadcrumb">
  <a href="<?php echo home_url() ?>"><i class="fa fa-home"></i>HOME</a> &gt;
  <a href="top.html">レオナルドの部屋</a>
</div>

<!-- 本文欄 -->
<div class="content">
  <h1>レオナルドの部屋</h1>
  <img src="<?php bloginfo('template_url'); ?>/img/logo.jpg" width="750"><br>

  <!-- 追従式レオナルド -->
  <div class="pc" style="position: fixed; right: 0; bottom: 0; z-index: 1">
    <img src="<?php bloginfo('template_url'); ?>/img/leonardo_follow.png" width="150">
  </div>

  <h2>レオナルドって？</h2>
  <ul class="circle">
    <li>犬の妖精</li>
    <li>創作の象徴</li>
    <li>基本なんでもできる</li>
  </ul>
  <br>

  <h2>プロフィール</h2>
  <table>
    <tr>
      <th width="100">趣味</th>
      <td width="300">創作活動</td>
    </tr>
    <tr>
      <th>性別</th>
      <td>不詳</td>
    </tr>
    <tr>
      <th>年齢</th>
      <td><script type="text/javascript">myDate = new Date(); myYear = myDate.getFullYear() - 2013; document.write(myYear);</script>歳（2013年生まれ）</td>
    </tr>
    <tr>
      <th>大きさ</th>
      <td>30cm くらい</td>
    </tr>
    <tr>
      <th>特技</th>
      <td>影分身</td>
    </tr>
    <tr>
      <th>装備品</th>
      <td>ヘッドホン・メガネ・羽</td>
    </tr>
  </table>
  <br>

  <h2>特徴</h2>
  <ul class="circle">
    <li>魔法のステッキ（ススキ）を使う</li>
    <li>身体の色を変えられる</li>
    <li>普段は妖精界にいる</li>
    <li>気まぐれで人間界に降り立ち、創作活動部の様子を眺めている</li>
    <li>尻尾が筆になり、絵や文字を書くこともある</li>
    <li>装備しているヘッドホンでゲームのサウンドトラックを聴いている</li>
  </ul>
  <br>

  <h2>おもちゃ箱（ミニゲーム集）</h2>
  <ul class="circle">
    <li><a href="leonardo-shinkeisuijaku.html">神経衰弱</a></li>
    <li><a href="leonardo-slidepuzzle.html">スライドパズル</a></li>
  </ul>
  <br>
  ※ Windows/Mac/Linux/iOS/Android に対応しています。<br>
</div><!-- content -->

<?php get_footer(); ?>
