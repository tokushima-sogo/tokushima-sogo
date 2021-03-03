<!-- 引継ぎ事項
1,このデータは仮データー。このページのwordpress化してる部分をコーダーの作ったデータに割り当てて使ってください。
2,画像ファイルパスはあたっていない。
3,home_urlもリンク先を書いてください。 -->
<?php get_header(); ?>
<h1>特集一覧</h1>
<p>本文</p>
<!-- 特集バナー表示 -->
<div>
    <a href="<?php echo home_url() ?>">
        <h2>徳島ラーメン特集</h2>
        <img src="<?php get_template_directory_uri(); ?>/assets/image/画像ファイルパス">
        <p>特集紹介本文</p>
    </a>
</div>
<div>
    <a href="<?php echo home_url() ?>">
        <h2>専門店</h2>
        <img src="<?php get_template_directory_uri(); ?>/assets/image/画像ファイルパス">
        <p>特集紹介本文</p>
    </a>
</div>
<div>
    <a href="<?php echo home_url() ?>">
        <h2>珍スポット</h2>
        <img src="<?php get_template_directory_uri(); ?>/assets/image/画像ファイルパス">
        <p>特集紹介本文</p>
    </a>
</div>
<?php get_footer(); ?>
