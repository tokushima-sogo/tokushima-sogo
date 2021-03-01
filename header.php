<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/contact-style.css">

    <link href="contact-style.css" rel="stylesheet" media="screen">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header>
<a href="<?php echo home_url(); ?>">Topへ</a><br>
<section id="search">
<div class="p-search u-search--margin u-clearfix">
<img src="<?php echo get_template_directory_uri(); ?>/image/search.png" class="c-imageSmall p-search__image"  alt="虫眼鏡">
<p class="c-search p-search__p">検索する</p>
</div>
<?php echo do_shortcode( '[searchandfilter fields="search,category,taxocategory,taxotag" types=",radio,radio,checkbox" hierarchical="0,1,0,0" show_count=",1,1,1" submit_label="検索" headings=",デフォルトカテゴリー,カスタムタクソノミー,"]' ); ?>
</section>
    </header>
