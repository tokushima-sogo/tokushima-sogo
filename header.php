<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/contact-style.css">

    <!-- プラグインsearch&filterのcssとjs ※後でfunctions.phpにまとめる -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/searchandfilter.css">
    <?php wp_enqueue_script('searchandfilter', get_template_directory_uri() . '/assets/js/searchandfilter.js', '', '', true); ?>

    <!-- 小野寛智のfontsawesomeアカウントなので必ず消す！！ -->
    <script src="https://kit.fontawesome.com/72a93cd7e4.js" crossorigin="anonymous"></script>

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
        </script>


        <!-- パンくずリスト -->
        <?php get_template_part('template-parts/breadcrumb'); ?>

    </header>
