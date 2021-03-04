<?php get_header(); ?>

<link href="<?php echo get_template_directory_uri(); ?>/assets/css/map.css" rel="stylesheet" media="screen">


<h1>QLIP周辺の適当な場所</h1>
<h3>A</h3>
<div id="shop0" class="spot button_off" data-spot_name="A" data-lat="34.08761780124958" data-lng="134.55195706026157">行きたい</div>
<h3>B</h3>
<div id="shop1" class="spot button_off" data-spot_name="B" data-lat="34.08985256053749" data-lng="134.55837682640834">行きたい</div>
<h3>C</h3>
<div id="shop2" class="spot button_off" data-spot_name="C" data-lat="34.0843482543871" data-lng="134.55420597518708">行きたい</div>
<h3>D</h3>
<div id="shop3" class="spot button_off" data-spot_name="D" data-lat="34.08343581361514" data-lng="134.56275813604786">行きたい</div>
<br><br>
<div id="delete_cookie" class="button">クッキー削除</div>
<br><br>
<div id="create">地図作成</div>

<a href="<?php echo home_url('west-map'); ?>">qlip</a>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/map.js"></script>
<?php get_footer(); ?>
