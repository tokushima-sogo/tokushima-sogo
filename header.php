<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- header -->
    <header id="scroll" class="l-header">
        <!-- header__contents -->
        <div class="p-header__contents u-flex u-bgCalmBlue">
            <!-- logo -->
            <h1><a href="<?php echo home_url(); ?>"><img id="header_size" class="c-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo_tokushima_sogokan.png" alt="トクシマSo Go！"></a></h1>
            <!-- /logo -->
            <!-- topNav -->
            <nav class="p-topNav">
                <ul class="p-header__nav u-flex">
                    <li>
                        <div class="p-header__navList u-center"><img class="c-navBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_info.png" alt="ご案内">
                            <p class="c-header__nav u-bold u-white">ご案内</p>
                        </div>
                        <ul class="p-header__navListDetail u-info u-center">
                            <li><a class="c-header__navListDetail" href="<?php echo get_post_type_archive_link('famous'); ?>">徳島県の名物
                                </a></li>
                            <li><a class="c-header__navListDetail" href="<?php echo get_post_type_archive_link('event'); ?>">徳島県のイベント</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo home_url('area/south') ?>" class="p-header__navList u-center"><img class="c-navBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_south.png" alt="県南部">
                            <p class="c-header__nav u-white">県南部</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo home_url('area/city') ?>" class="p-header__navList u-center"><img class="c-navBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_city.png" alt="徳島市">
                            <p class="c-header__nav u-white">徳島市</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo home_url('area/west') ?>" class="p-header__navList u-center"><img class="c-navBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_west.png" alt="県西部">
                            <p class="c-header__nav u-white">県西部</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo home_url('area/east') ?>" class="p-header__navList u-center"><img class="c-navBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_east.png" alt="県東部">
                            <p class="c-header__nav u-white">県東部</p>
                        </a>
                    </li>
                    <li>
                        <div class="p-header__navList u-center"><img class="c-navBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_special.png" alt="6階">
                            <p class="c-header__nav u-bold u-white">特設会場</p>
                        </div>
                        <ul class="p-header__navListDetail u-special u-center">
                            <li><a class="c-header__navListDetail" href="<?php echo home_url('quiz/') ?>">クイズ
                                </a></li>
                            <li><a class="c-header__navListDetail" href="<?php echo home_url('special') ?>">特集
                                </a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /topNav -->
            <!-- header__contentsList -->
            <ul class="p-header__contentsList u-flex u-center u-white">


                <li><button class="p-header_search"><img id="btn_header_searchOpen" class="c-headerIcon" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_searchOpen.png" alt="検索アイコン">
                        <p class="u-white u-center">検索</p>
                    </button></li>

                <!-- <li><a href="<?php echo home_url('taxonomy') ?>"><img class="c-headerIcon" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_searchOpen.png" alt="検索アイコン">
                        <p class="u-white u-center">検索</p>
                    </a></li> -->

                <li><a href="<?php echo get_page_link(220); ?>"><img class="c-headerIcon" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_map.png" alt="マップアイコン">
                        <p class="u-white u-center">MYマップ</p>
                    </a></li>
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_burgerOpen.png" class="c-burgerBtn u-open" alt="開くボタン"></li>
            </ul>
            <!-- /header__contentsList -->
            <!-- header__contentsBurger -->
            <div class="p-header__contentsBurger">
                <!-- header__contentsBurgerTop -->
                <div class="p-header__contentsBurgerTop u-bgCalmBlue">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_burgerClose.png" class="c-burgerBtn u-close" alt="閉じるボタン">
                </div>
                <!-- /header__contentsBurgerTop -->
                <!-- header__contentsBurgerNav -->
                <nav class="p-header__contentsBurgerNav u-center">
                    <ul>
                        <li>
                            <div class="c-header__contentsBurgerNavBtn"><img class="c-navBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_special.png" alt="6階"><span class="u-bold u-calmBlue">特設会場</span></div>
                            <ul class="p-BurgerNavDetail">
                                <li><a href="<?php echo home_url('quiz') ?>">クイズ</a></li>
                                <li><a href="<?php echo home_url('special') ?>">特集</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo home_url('area/east') ?>" class="c-header__contentsBurgerNavBtn"><img class="c-navBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_east.png" alt="5県東部"><span class="u-bold u-calmBlue">県東部</span></a>
                        </li>
                        <li><a href="<?php echo home_url('area/west') ?>" class="c-header__contentsBurgerNavBtn"><img class="c-navBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_west.png" alt="県西部"><span class="u-bold u-calmBlue">県西部</span></a>
                        </li>
                        <li><a href="<?php echo home_url('area/city') ?>" class="c-header__contentsBurgerNavBtn"><img class="c-navBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_city.png" alt="徳島市"><span class="u-bold u-calmBlue">徳島市</span></a>
                        </li>
                        <li><a href="<?php echo home_url('area/south') ?>" class="c-header__contentsBurgerNavBtn"><img class="c-navBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_south.png" alt="県南部"><span class="u-bold u-calmBlue">県南部</span></a>
                        </li>
                        <li>
                            <div class="c-header__contentsBurgerNavBtn"><img class="c-navBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_info.png" alt="ご案内"><span class="u-bold u-calmBlue">ご案内</span></div>
                            <ul class="p-BurgerNavDetail">
                                <li><a href="<?php echo home_url('famous') ?>">徳島の名物</a></li>
                                <li><a href="<?php echo home_url('event') ?>">徳島県のイベント</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /header__contentsBurgerNav -->
            </div>
            <!-- /header__contentsBurger -->
        </div>
        <!-- /header__contents -->




        <!-- searchArea -->
        <section class="l-searchArea">
            <div class="c-button__seachForm__close">
                <button id="c-button__searchForm__close" class="close c-button__searchForm__close "><img src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_searchForm_close.png" alt="×" srcset="" width="25px" height="25px" class="c-button__searchForm--close"></button>
            </div>
            <!-- <div id="searchform">
                <?php echo do_shortcode('[searchandfilter fields="search"]'); ?>
            </div> -->
            <div id="searchfilter">
                <?php echo do_shortcode('[searchandfilter fields="searcharea,contents"  types="radio,radio" " submit_label="検索" headings="エリアで探す,コンテンツで探す"]'); ?>
            </div>
        </section>
        <!-- /searchArea -->

    </header>
    <!-- /header -->
