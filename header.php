<!-- 引継ぎ
78行目検索のリンク先112行のあんなにについてのリンク先分からず
リンクのテストはまだ。 -->

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トクシマSo Go！</title>
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
    <link rel="icon" href="./assets/images/favicon_tokushima_sogo.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/favicon_tokushima_sogo.png">
</head>

<body>
    <!-- header -->
    <header class="l-header">
        <!-- header__contents -->
        <div class="p-header__contents u-flex u-bgCalmBlue">
            <!-- logo -->
            <h1><a href="<?php echo home_url(); ?>"><img class="c-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo_header.png" alt="トクシマSo Go！"></a></h1>
            <!-- /logo -->
            <!-- topNav -->
            <nav class="p-topNav">
                <ul class="p-header__nav u-flex">
                    <li>
                        <div class="p-header__navList u-center"><img class="c-navBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_info.png" alt="ご案内">
                            <p class="c-header__nav u-bold u-white">ご案内</p>
                        </div>
                        <ul class="p-header__navListDetail u-info u-center">
                            <li><a class="c-header__navListDetail" href="#">徳島県の名物
                                </a></li>
                            <li><a class="c-header__navListDetail" href="#">徳島県のイベント</a></li>
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
                <li><a href="<?php echo home_url('taxonomy') ?>"><img class="c-headerIcon" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_searchOpen.png" alt="検索アイコン">
                        <p class="u-white u-center">検索</p>
                    </a></li>
                <li><a href="mymap.html"><img class="c-headerIcon" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_map.png" alt="マップアイコン">
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
                            <a class="c-header__contentsBurgerNavBtn" href=" <?php echo home_url('special') ?>"><img class="c-navBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_ev06.png" alt="6階"><span class="u-bold u-calmBlue">特設会場</span></a>
                            <ul class="p-BurgerNavDetail">
                                <li><a href="<?php home_url('quiz') ?>">クイズ</a></li>
                                <li><a href="<?php home_url('special') ?>">特集</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo home_url('area/east') ?>" class="c-header__contentsBurgerNavBtn"><img class="c-navBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_ev05.png" alt="5県東部"><span class="u-bold u-calmBlue">県東部</span></a>
                        </li>
                        <li><a href="<?php echo home_url('area/west') ?>" class="c-header__contentsBurgerNavBtn"><img class="c-navBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_ev04.png" alt="県西部"><span class="u-bold u-calmBlue">県西部</span></a>
                        </li>
                        <li><a href="<?php echo home_url('area/city') ?>" class="c-header__contentsBurgerNavBtn"><img class="c-navBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_ev03.png" alt="徳島市"><span class="u-bold u-calmBlue">徳島市</span></a>
                        </li>
                        <li><a href="<?php echo home_url('area/south') ?>" class="c-header__contentsBurgerNavBtn"><img class="c-navBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_ev02.png" alt="県南部"><span class="u-bold u-calmBlue">県南部</span></a>
                        </li>
                        <li><a class="c-header__contentsBurgerNavBtn" href="#"><img class="c-navBtn" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_header_ev01.png" alt="ご案内"><span class="u-bold u-calmBlue">ご案内</span></a>
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
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/btn_searchForm_close.png" alt="" srcset="" width="25px" height="25px" class="c-button__searchForm--close">
            <form action="" method="post" class="searchandfilter">
                <div>
                    <ul>

                        <li class="p-search__keyword u-mb40"><input type="text" name="ofsearch" placeholder="　Search &hellip;" value="">
                            <div class="c-icon__submit"></div>
                        </li>

                        <li class="u-mb40">
                            <h4 class="c-title__searchForm u-center u-mb10">エリアで探す</h4>
                            <ul class="l-radio__area group">
                                <li class="cat-item cat-item-5"><label class="p-label__search--area"><input type='radio' name='ofarea[]' value='5' /> 南部
                                        (4)</label>
                                </li>
                                <li class="cat-item cat-item-4 u-search"><label class="p-label__search--area "><input type='radio' name='ofarea[]' value='4' /> 徳島市内
                                        (4)</label>
                                </li>
                                <li class="cat-item cat-item-2 u-search"><label class="p-label__search--area "><input type='radio' name='ofarea[]' value='2' /> 東部
                                        (5)</label>
                                </li>
                                <li class="cat-item cat-item-3 u-search"><label class="p-label__search--area "><input type='radio' name='ofarea[]' value='3' /> 西部
                                        (4)</label>
                                </li>
                            </ul><input type="hidden" name="ofarea_operator" value="and" />
                        </li>

                        <li class="u-mb40">
                            <h4 class="c-title__searchForm u-center u-mb10">内容で探す</h4>
                            <ul class="l-radio__content">
                                <li class="cat-item"><label class="p-label__search--content "><input class="postform" type="radio" name="ofpost_types[]" value="spot">
                                        スポット</label></li>
                                <li class="cat-item u-search"><label class="p-label__search--content"><input class="postform" type="radio" name="ofpost_types[]" value="gourmet"> グルメ</label></li>
                                <li class="cat-item u-search"><label class="p-label__search--content"><input class="postform" type="radio" name="ofpost_types[]" value="souvenir"> ショップ</label></li>
                            </ul>
                        </li>
                        <li class="l-submit__radio"><input type="hidden" name="ofsubmitted" value="1">
                            <label class="c-label_submit"><input type="submit" value="検索">この条件で検索</label>
                        </li>
                    </ul>
                </div>
            </form>
        </section>
        <!-- /searchArea -->
        <?php wp_head(); ?>
    </header>
    <!-- /header -->
