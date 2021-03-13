<?php get_header(); ?>

<link href="<?php echo get_template_directory_uri(); ?>/assets/css/front-page.css " rel="stylesheet">

<main class="l-main">

    <!-- リフト部分 -->
    <div class="p-main__liftGroup__parts">
        <div><img class="c-main__liftLineImg u-bgWhite" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_liftLine03.png" alt=""></div>
        <div id="elevator" class="c-main__liftBodyImg">
            <img class="c-ropeway" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_ropeway.png" alt="">
        </div>
    </div>
    <!-- リフト部分 -->

    <!-- department -->
    <div class="l-department">

        <!-- elevatorArea -->
        <div class="p-elevatorArea u-bg3ea5c8">
            <img class="c-buildingTablet" src="<?php echo get_template_directory_uri(); ?>/assets/images/mv_front_tablet.jpg" alt="建物">
            <img class="c-buildingPc u-m0A" src="<?php echo get_template_directory_uri(); ?>/assets/images/mv_front_web.png" alt="建物">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_catchCopy02.png" class="c-catchCopy" alt="＼定員無制限／エレベーターに乗って見つけよう！あ・わくわくする徳島">

            <!-- 6F -->
            <!-- <section id="js_6f" class="p-departmentFloor u-m0A">
                <div class="p-floorBlock6">
                    <h2 class="c-floorName u-bg2d294f u-mb10 u-white">特設会場</h2>
                    <div class="p-special u-flex">
                        <div class="p-specialLink ">
                            <a href="<?php echo home_url('quiz/') ?>" class="c-specialLink">
                                <h3 class="u-specialName u-white">クイズゲーム</h3>
                                <img class="c-game" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_game.png" alt="ゲーム">
                            </a>
                        </div>
                        <div class="p-specialLink ">
                            <a href="<?php echo home_url('special') ?>" class="c-specialLink">
                                <h3 class="u-specialName u-white">特集コーナー</h3>
                                <img class="c-specialEvent" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_special.png" alt="特集">
                            </a>
                        </div>
                        <img class="c-wheel" src="assets/images/img_front_ferrisWheel.gif" alt="観覧車">
                    </div>
                </div>
            </section> -->

            <section id="js_6f" class="u-m0A">
                <div class="p-floorBlock6">
                    <h2 class="c-floorName u-bg2d294f u-white u-mb0">特設会場</h2>
                    <div class="p-special u-flex">
                        <div class="p-specialLink ">
                            <a href="<?php echo home_url('quiz/') ?>" class="c-specialLink">
                                <h3 class="u-specialName">クイズゲーム</h3>
                                <img class="c-specialEvent" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_game.png" alt="ゲーム">
                            </a>
                        </div>
                        <div class="p-specialLink ">
                            <a href="<?php echo home_url('special') ?>" class="c-specialLink">
                                <h3 class="u-specialName">特集コーナー</h3>
                                <img class="c-specialEvent" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_special.png" alt="特集">
                            </a>
                        </div>
                        <div class="p-specialLink ">
                            <a href="<?php echo home_url('horror') ?>" class="c-specialLink">
                                <h3 class="u-specialName">都市伝説</h3>
                                <img class="c-specialEvent" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_special.png" alt="特集">
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 5F -->
            <section id="js_5f" class="p-departmentFloor u-m0A">
                <div class="p-floorBlock5">
                    <div class="p-floorLink">
                        <a href="<?php echo home_url('area/east') ?>">
                            <h2 class="c-floorName u-bg2d294f u-mb10 u-white">県東部</h2>
                            <div class="p-floorImg ">
                                <img class="c-satomusume" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_east01.png" class="c-floorSpot" alt="里むすめ">
                                <img class="c-beer" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_east02.png" class="c-floorSpot u-floorSpot--2nd" alt="上勝ビール">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_map_east.png" class="c-floorMapHigasi" alt="県東部">
                            </div>
                        </a>
                    </div>
                </div>
            </section>

            <!-- 4F -->
            <section id="js_4f" class="p-departmentFloor u-m0A">
                <div class="p-floorBlock4">
                    <div class="p-floorLink ">
                        <a href="<?php echo home_url('area/west') ?>">
                            <!-- <h2 class="c-floorName c-floorNameRight u-bg2d294f u-mb10 u-white ">県西部</h2>
                            <div class="p-floorImgNisi"> -->
                            <h2 class="c-floorName u-bg2d294f u-mb10 u-white ">県西部</h2>
                            <div class="p-floorImg">
                                <img class="c-soba" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_west01.png" class="c-floorSpot" alt="祖谷そば">
                                <img class="c-tutuji" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_west02.png" class="c-floorSpot u-floorSpot--2nd" alt="オンツツジ">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_map_west.png" class="c-floorMapNisi" alt="県西部">
                            </div>
                        </a>
                    </div>
                </div>
            </section>

            <!-- 3F -->
            <section id="js_3f" class="p-departmentFloor u-m0A">
                <div class="p-floorBlock3">
                    <div class="p-floorLink ">
                        <a href="<?php echo home_url('area/city') ?>">
                            <h2 class="c-floorName u-bg2d294f u-mb10 u-white">徳島市</h2>
                            <div class="p-floorImg">
                                <img class="c-yakimoti
                                        " src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_city01.png" class="c-floorSpot" alt="焼餅">
                                <img class="c-sirasagi
                                        " src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_city02.png" class="c-floorSpot u-floorSpot--2nd" alt="シラサギ">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_map_city.png" class="c-floorMapTokusimacity" alt="徳島市">
                            </div>
                        </a>
                    </div>
                </div>
            </section>

            <!-- 2F -->
            <section id="js_2f" class="p-departmentFloor u-m0A">
                <div class="p-floorBlock2">
                    <div class="p-floorLink ">
                        <a href="<?php echo home_url('area/south') ?>">
                            <h2 class="c-floorName u-bg2d294f u-mb10 u-white ">県南部</h2>
                            <div class="p-floorImg">
                                <img class="c-turtle" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_south01.png" class="c-floorSpot" alt="ウミガメ">
                                <img class="c-surfing" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_south02.png" class="c-floorSpot u-floorSpot--2nd" alt="サーフィン">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_map_south.png" class="c-floorMapMinami" alt="県南部">
                            </div>
                        </a>
                    </div>
                </div>
            </section>
        </div>

        <!-- 1F -->
        <!-- <section id="js_1f" class="p-departmentFloor u-m0A u-bgEAE4AD">
            <div class="p-floorBlock1">
                <h2 class="c-floorName u-mb10 u-bg2d294f u-mb10 u-white ">ご案内</h2>
                <div class="p-guideArea u-m0A">
                    <span id="front_info"></span>
                    <h3 class="c-guideTitle u-lightPurpule">このサイトの使い方</h3>
                    <p class="c-floor__text u-lightPurple">
                        1.行きたい場所を見つける　2.Myスポットに登録する　3.自分だけの地図づくり　4.徳島へ行く</p>
                    <ul class="p-tokushimaLink u-lightPurple">
                        <li class="c-tokushimaLink"><a href="<?php echo esc_url(home_url('/tokushima')); ?>">徳島について</a></li>
                        <li class="c-tokushimaLink"><a href="<?php echo get_post_type_archive_link('famous'); ?>">徳島の名物</a></li>
                        <li class="c-tokushimaLink"><a href="<?php echo get_post_type_archive_link('event'); ?>">徳島のイベント</a></li>
                    </ul>
                </div>
            </div>
        </section> -->

        <section id="js_1f" class="u-m0A u-bgEAE4AD">
            <div class="p-floorBlock_info">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_fukidashi.png" alt="" srcset="" class="c-fukidashi">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/anime_front_awaodori.gif" alt="" srcset="" class="c-awaodori">
                <h2 class="c-floorName u-bg2d294f u-mb10 u-white ">ご案内</h2>
                <div class="p-guideArea u-m0A">
                    <span id="front_info"></span>
                    <h3 class="c-guideTitle">このサイトの使い方</h3>
                    <ul class="c-floor__text">
                        <li>①行きたい場所を見つける</li>
                        <li>②Myマップに登録する</li>
                        <li>③自分だけの地図づくり</li>
                        <li>④徳島へ行く</li>
                    </ul>
                    <ul class="p-tokushimaLink">
                        <li class="c-tokushimaLink"><a href="<?php echo esc_url(home_url('/tokushima')); ?>">徳島について</a></li>
                        <li class="c-tokushimaLink"><a href="<?php echo get_post_type_archive_link('famous'); ?>">徳島の名物</a></li>
                        <li class="c-tokushimaLink"><a href="<?php echo get_post_type_archive_link('event'); ?>">徳島のイベント</a></li>
                    </ul>
                </div>
            </div>
        </section>


        <!-- /elevatorArea -->

        <!-- B1 -->
        <!-- <section id="page-link" class="p-departmentFloor u-bgblack u-red">
            <a href="#js_6f" class="c-horrorLink">
                <div class="p-floorBlock">
                    <h2 class="c-floorNameBasement u-bg2d294f u-white u-mb10 ">徳島の都市伝説</h2>
                    <p class="u-red c-floorNameBasementP">
                        特設会場のゲームをクリアすれば 都市伝説へご案内</p>
                </div>
            </a>
        </section> -->
    </div>
    <!-- /department -->

    <!-- news -->
    <section class="p-newsArea u-bgWhite">
        <div class="c-newsArea">
            <!-- Ditty news ticker ショートコード -->
            <?php echo do_shortcode('[ditty_news_ticker id="219"]'); ?>
        </div>
    </section>
    <!-- /news -->

    <!-- insta -->
    <section class="p-insta">
        <div class="c-footerImg"></div>
        <!-- instagram表示 ショートコード -->
        <?php echo do_shortcode('[instagram-feed]'); ?>
        <!-- <ul class="p-instaPhotos u-flex">
            <li><a href=""><img class="c-instaPhoto" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_map_city.png" alt="インスタ１" width="110px" height="110px"></a></li>
            <li><a href=""><img class="c-instaPhoto" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_map_city.png" alt="インスタ２"></a></li>
            <li><a href=""><img class="c-instaPhoto" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_map_city.png" alt="インスタ３"></a></li>
            <li><a href=""><img class="c-instaPhoto" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_map_city.png" alt="インスタ４"></a></li>
            <li><a href=""><img class="c-instaPhoto" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_map_city.png" alt="インスタ５"></a></li>
            <li><a href=""><img class="c-instaPhoto" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_map_city.png" alt="インスタ６"></a></li>
        </ul> -->
        <div class="c-footerImg"></div>
    </section>

</main>
<!-- ここからフッター -->

<?php get_footer(); ?>
