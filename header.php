<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/reset.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/base.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/project.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/compornent.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/utility.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/top.css">

    <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/contact-style.css"> -->

    <!-- プラグインsearch&filterのcssとjs ※後でfunctions.phpにまとめる -->
    <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/searchandfilter.css"> -->
    <?php wp_enqueue_script('searchandfilter', get_template_directory_uri() . '/assets/js/searchandfilter.js', '', '', true); ?>

    <!-- fontsawesome -->
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header>
        <a href="<?php echo home_url(); ?>">Topへ</a><br>
        <div class="p-search u-search--margin u-clearfix">
            <!-- 検索ボタン -->
            <button id="search">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/image/search.png" width="100px" alt="虫眼鏡">
            </button>
            <button id="close" class="close"><img src="<?php echo get_template_directory_uri(); ?>/assets/image/close.png" width="50px" alt="×"></button>
        </div>
        <!-- 検索フォーム -->
        <div id="searchform">
            <?php echo do_shortcode('[searchandfilter fields="search"]'); ?>
        </div>
        <div id="searchfilter">
            <?php echo do_shortcode('[searchandfilter fields="searcharea"  types="radio"  submit_label="検索" headings="エリアで探す,内容で探す,タグ" operators="and"]'); ?>
        </div>
        <!-- ajaxの結果出力場所 -->
        <div id="result"></div>
        <p>taxoid <span id="span1"></span></p>
        <input type="button" value="ボタン" onclick="clickBtn1()" />
        <!-- <button>値を取得</button> -->
        <button id="mapbtn">マップ作成テスト</button>
        <!-- ajax -->
        <script>
            jQuery(document).ready(function($) {
                //ラジオボタンをチェックしたら発動
                $('input[type="radio"]').change(function() {
                    //選択したvalue値を変数に格納
                    var val = $(this).val();
                    $.ajax({
                        type: 'POST', //送信方法
                        url: ajaxurl, //送信先(functions.phpで変数にしてある)
                        data: {
                            'action': 'my_ajax_do',
                            'mes': val,
                        },
                        datatype: 'json', //送信データの種類
                    }).done(function(data) {
                        console.log("done...");
                        console.log(data);
                        var jsonData = JSON.stringify(data);
                        var element = document.getElementById('result'); //結果を表示する場所
                        element.innerHTML = jsonData; //結果表示
                    }).fail(function(XMLHttpRequest, textStatus, error) {
                        console.log('失敗' + error);
                        console.log(XMLHttpRequest.responseText);
                    });
                });
            });
            jQuery(document).ready(function($) {
                $('button').click(function() {
                    /// チェックされたvalue値を配列として取得
                    var vals = $("input[name^='ofarea']:checked").map(function() {
                        return $(this).val();
                    }).get();
                    console.log(vals);
                });
            });
            jQuery(document).ready(function($) {
                $('button').click(function() {
                    var r = $('input[type="radio"]:checked').val();
                    console.log(r);
                });
            });

            //マップ生成ページへ移動
            jQuery(document).ready(function($) {
                //マップ作成ボタンをクリックしたら発動
                $('#mapbtn').click(function() {
                    //新しいウィンドウで開く
                    window.open("http://localhost/tokushima-sogoTest/mapcreate/", "_blank");
                });
            });
        </script>


        <!-- パンくずリスト -->
        <?php get_template_part('template-parts/breadcrumb'); ?>

    </header>
