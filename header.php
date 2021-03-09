<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/reset.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/base.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/project.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/compornent.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/utility.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/top.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/top.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/top.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/top.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/top.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/top.css">

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/contact-style.css"> -->

    <!-- プラグインsearch&filterのcssとjs ※後でfunctions.phpにまとめる -->
    <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/searchandfilter.css"> -->
    <?php wp_enqueue_script('searchandfilter', get_template_directory_uri() . '/assets/js/searchandfilter.js', '', '', true); ?>

    <!-- fontsawesome -->
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>



    <!-- header -->
    <header class="l-header">
        <div class="p-header__contents u-header__navListDetail__blue">
            <h1><a href="<?php echo home_url(); ?>"><img class="c-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo_header.png" alt="トクシマSOGO"></a></h1>
            <nav class="p-topNav">
                <ul class="p-header__nav">
                    <li>
                        <div class="p-header__navList"><img class="c-elevatorBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_ev01.png" alt="1階">
                            <div class="c-header__nav u-header__nav__white">ご案内</div>
                        </div>
                        <ul class="p-header__navListDetail p-header__navListDetail1 u-header__navListDetail__blue">
                            <li><a class="c-header__navListDetail u-header__nav__white" href="#">サイトの使い方
                                </a></li>
                            <li><a class="c-header__navListDetail u-header__nav__white" href="about-tokushima.html">徳島県について
                                </a></li>
                            <li><a class="c-header__navListDetail u-header__nav__white" href="#">徳島県の名物
                                </a></li>
                            <li><a class="c-header__navListDetail u-header__nav__white" href="#">徳島県のイベント
                                </a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="p-header__navList"><img class="c-elevatorBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_ev02.png" alt="2階">
                            <div class="c-header__nav u-header__nav__white">県南部</div>
                        </div>
                        <ul class="p-header__navListDetail p-header__navListDetail2 u-header__navListDetail__blue">
                            <li><a class="c-header__navListDetail u-header__nav__white" href="west.html">トップ
                                </a></li>
                            <li><a class="c-header__navListDetail u-header__nav__white" href="#">スポット
                                </a></li>
                            <li><a class="c-header__navListDetail u-header__nav__white" href="#">グルメ
                                </a></li>
                            <li><a class="c-header__navListDetail u-header__nav__white" href="#">ショップ
                                </a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="p-header__navList"><img class="c-elevatorBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_ev03.png" alt="3階">
                            <div class="c-header__nav u-header__nav__white">徳島市</div>
                        </div>
                        <ul class="p-header__navListDetail3 p-header__navListDetail u-header__navListDetail__blue">
                            <li><a class="c-header__navListDetail u-header__nav__white" href="west.html">トップ
                                </a></li>
                            <li><a class="c-header__navListDetail u-header__nav__white" href="#">スポット
                                </a></li>
                            <li><a class="c-header__navListDetail u-header__nav__white" href="#">グルメ
                                </a></li>
                            <li><a class="c-header__navListDetail u-header__nav__white" href="#">ショップ
                                </a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="p-header__navList"><img class="c-elevatorBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_ev04.png" alt="4階">
                            <div class="c-header__nav u-header__nav__white">県西部</div>
                        </div>
                        <ul class="p-header__navListDetail4 p-header__navListDetail u-header__navListDetail__blue">
                            <li><a class="c-header__navListDetail u-header__nav__white" href="west.html">トップ
                                </a></li>
                            <li><a class="c-header__navListDetail u-header__nav__white" href="#">スポット
                                </a></li>
                            <li><a class="c-header__navListDetail u-header__nav__white" href="#">グルメ
                                </a></li>
                            <li><a class="c-header__navListDetail u-header__nav__white" href="#">ショップ
                                </a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="p-header__navList"><img class="c-elevatorBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_ev05.png" alt="5階">
                            <div class="c-header__nav u-header__nav__white">県東部</div>
                        </div>
                        <ul class="p-header__navListDetail5 p-header__navListDetail u-header__navListDetail__blue">
                            <li><a class="c-header__navListDetail u-header__nav__white" href="west.html">トップ
                                </a></li>
                            <li><a class="c-header__navListDetail u-header__nav__white" href="#">スポット
                                </a></li>
                            <li><a class="c-header__navListDetail u-header__nav__white" href="#">グルメ
                                </a></li>
                            <li><a class="c-header__navListDetail u-header__nav__white" href="#">ショップ
                                </a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="p-header__navList"><img class="c-elevatorBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_ev06.png" alt="6階">
                            <div class="c-header__nav u-header__nav__white">特設会場</div>
                        </div>
                        <ul class="p-header__navListDetail6 p-header__navListDetail u-header__navListDetail__blue">
                            <li><a class="c-header__navListDetail u-header__nav__white" href="#">ゲーム
                                </a></li>
                            <li><a class="c-header__navListDetail u-header__nav__white" href="#">クイズ
                                </a></li>
                            <li><a class="c-header__navListDetail u-header__nav__white" href="archiveSpecial.html">特集
                                </a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="p-header__contentsList">
                <ul>
                    <li><button><img id="btn_header_searchOpen" class="c-search u-mb5" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_searchOpen.png" alt="検索アイコン">
                            <div class="u-header__nav__white">検索</div>
                        </button>
                    </li>
                    <li><a id='mapbtn'><img class="c-mapIcon u-mb5" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_map.png" alt="マップアイコン">
                            <div class="u-header__nav__white">MYマップ</div>
                        </a>
                    </li>
                    <li><img id="c-elevatorOpen" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_burger3.png" alt="開くボタン"></li>
                </ul>
            </div>
        </div>
        <!-- ハンバーガーメニュー -->
        <div id="p-header__contentsBurger">
            <div class="p-header__contentsBurgerTop u-header__navListDetail__blue">
                <img id="c-elevatorClose" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_seachForm_close--white.png" alt="閉じるボタン">
            </div>
            <nav>
                <ul class="p-header__contentsBurgerNav u-header__contentsBurgerNav__beige">
                    <li>
                        <a class="c-header__contentsBurgerNavBtn" href=" #"><img class="c-elevatorBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_ev06.png" alt="6階"><span class="u-BurgerNavDetailA__blue">特設会場</span></a>
                        <ul class="p-BurgerNavDetail">
                            <li><a class="u-BurgerNavDetailA__blue" href="#"><span>ゲーム</span></a></li>
                            <li><a class="u-BurgerNavDetailA__blue" href="#"><span>クイズ</span></a></li>
                            <li><a class="u-BurgerNavDetailA__blue" href="#"><span>特集</span></a></li>
                        </ul>
                    </li>
                    <li><a class="c-header__contentsBurgerNavBtn" href="#"><img class="c-elevatorBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_ev05.png" alt="5階"><span class="u-BurgerNavDetailA__blue">県東部</span></a>
                        <ul class="p-BurgerNavDetail">
                            <li><a class="u-BurgerNavDetailA__blue" href="#"><span>トップ</span></a></li>
                            <li><a class="u-BurgerNavDetailA__blue" href="#"><span>スポット</span></a></li>
                            <li><a class="u-BurgerNavDetailA__blue" href="#"><span>グルメ</span></a></li>
                            <li><a class="u-BurgerNavDetailA__blue" href="#"><span>ショップ</span></a></li>
                        </ul>
                    </li>
                    <li><a class="c-header__contentsBurgerNavBtn" href="#"><img class="c-elevatorBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_ev04.png" alt="4階"><span class="u-BurgerNavDetailA__blue">県西部</span></a>
                        <ul class="p-BurgerNavDetail">
                            <li><a class="u-BurgerNavDetailA__blue" href="west.html"><span>トップ</span></a></li>
                            <li><a class="u-BurgerNavDetailA__blue" href="#"><span>スポット</span></a></li>
                            <li><a class="u-BurgerNavDetailA__blue" href="#"><span>グルメ</span></a></li>
                            <li><a class="u-BurgerNavDetailA__blue" href="#"><span>ショップ</span></a></li>
                        </ul>
                    </li>
                    <li><a class="c-header__contentsBurgerNavBtn" href="#"><img class="c-elevatorBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_ev03.png" alt="3階"><span class="u-BurgerNavDetailA__blue">徳島市</span></a>
                        <ul class="p-BurgerNavDetail">
                            <li><a class="u-BurgerNavDetailA__blue" href="#"><span>トップ</span></a></li>
                            <li><a class="u-BurgerNavDetailA__blue" href="#"><span>スポット</span></a></li>
                            <li><a class="u-BurgerNavDetailA__blue" href="#"><span>グルメ</span></a></li>
                            <li><a class="u-BurgerNavDetailA__blue" href="#"><span>ショップ</span></a></li>
                        </ul>
                    </li>
                    <li><a class="c-header__contentsBurgerNavBtn" href="#"><img class="c-elevatorBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_ev02.png" alt="2階"><span class="u-BurgerNavDetailA__blue">県南部</span></a>
                        <ul class="p-BurgerNavDetail">
                            <li><a class="u-BurgerNavDetailA__blue" href="#"><span>トップ</span></a></li>
                            <li><a class="u-BurgerNavDetailA__blue" href="#"><span>スポット</span></a></li>
                            <li><a class="u-BurgerNavDetailA__blue" href="#"><span>グルメ</span></a></li>
                            <li><a class="u-BurgerNavDetailA__blue" href="#"><span>ショップ</span></a></li>
                        </ul>
                    </li>
                    <li><a class="c-header__contentsBurgerNavBtn" href="#"><img class="c-elevatorBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_ev01.png" alt="1階"><span class="u-BurgerNavDetailA__blue">ご案内</span></a>
                        <ul class="p-BurgerNavDetail">
                            <li><a class="u-BurgerNavDetailA__blue" href="#"><span>サイトの使い方</span></a></li>
                            <li><a class="u-BurgerNavDetailA__blue" href="#"><span>徳島県について</span></a></li>
                            <li><a class="u-BurgerNavDetailA__blue" href="#"><span>徳島の名物</span></a></li>
                            <li><a class="u-BurgerNavDetailA__blue" href="#"><span>徳島県のイベント</span></a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- ここまでハンバーガーメニュー -->
        <!-- 検索フォーム -->
        <section class="p-searchArea">
            <img id="close" class="close c-button__searchForm__close" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_searchForm_close.png" alt="×">
            <div id="searchform">
                <?php echo do_shortcode('[searchandfilter fields="search"]'); ?>
            </div>
            <div id="searchfilter">
                <?php echo do_shortcode('[searchandfilter fields="searcharea,contents"  types="radio,radio"  submit_label="検索" headings="エリアで探す,内容で探す"]'); ?>
            </div>
        </section>
        <!-- サーチエリアワードプレス化避難 -->
        <!-- <form action="" method="post" class="searchandfilter">
                <div class="u-margin--seachContent u-bgColor--white">
                    <ul class="p-seach__keywordArea u-mb40">

                        <li class="p-seach__keyword"><input type="text" name="ofsearch" placeholder="　Search &hellip;" value="">
                            <div class="c-icon__submit"></div>
                        </li>
                    </ul>
                    <li>

                        <h4 class="u-mb10 u-text__center">エリアで探す</h4>
                        <ul class="p-radio__area u-mb40 group">
                            <li class="cat-item cat-item-5 u-ml15"><label class="p-label__seach u-bgColor--white"><input type='radio' name='ofarea[]' value='5' id="seach_south" /> 南部
                                    (4)</label>
                            </li>
                            <li class="cat-item cat-item-4 u-ml15"><label class="p-label__seach u-bgColor--white"><input type='radio' name='ofarea[]' value='4' id="seach_city" /> 徳島市内
                                    (4)</label>
                            </li>
                            <li class="cat-item cat-item-2 u-ml15"><label class="p-label__seach u-bgColor--white"><input type='radio' name='ofarea[]' value='2' id="seach_east" /> 東部
                                    (5)</label>
                            </li>
                            <li class="cat-item cat-item-3 u-ml15"><label class="p-label__seach u-bgColor--white"><input type='radio' name='ofarea[]' value='3' id="seach_west" /> 西部
                                    (4)</label>
                            </li>
                        </ul><input type="hidden" name="ofarea_operator" value="and" />
                    </li>
                    <li class="u-mb40">
                        <h4 class="u-mb10 u-text__center">内容で探す</h4>
                        <ul class="p-radio__content">
                            <li class="cat-item u-ml15"><label class="p-label__seach u-bgColor--white"><input class="postform" type="radio" name="ofpost_types[]" value="spot" id="seach_spot">
                                    スポット</label></li>
                            <li class="cat-item u-ml15"><label class="p-label__seach u-bgColor--white"><input class="postform" type="radio" name="ofpost_types[]" value="gourmet" id="seach_gourmet"> グルメ</label></li>
                            <li class="cat-item u-ml15"><label class="p-label__seach u-bgColor--white"><input class="postform" type="radio" name="ofpost_types[]" value="souvenir" id="seach_shop"> お土産※ショップ</label></li>
                        </ul>
                    </li>
                    <li class="p-submit__radio"><input type="hidden" name="ofsubmitted" value="1">
                        <label class="p-label_submit"><input type="submit" value="検索">この条件で検索</label>
                    </li>

                </div>
            </form> -->


        <!-- ajax -->
        <script>
            //マップ生成ページへ移動
            jQuery(document).ready(function($) {
                //マップ作成ボタンをクリックしたら発動
                $('#mapbtn').click(function() {
                    //新しいウィンドウで開く
                    // window.open("http://localhost/tokushima-sogoTest/mapcreate/", "_blank");
                    // window.open("https://heroxs3v38.xsrv.jp/tokushima-sogo/mapcreate/", "_blank");
                    window.open("http://localhost/tokushima-sogo/mapcreate/", "_blank");
                });
            });
        </script>


        <!-- パンくずリスト -->
        <?php get_template_part('template-parts/breadcrumb'); ?>

    </header>
