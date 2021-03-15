<?php get_header(); ?>

<main class="l-main">

    <!-- リフト部分 -->
    <div class="p-main__liftGroup__parts">
        <div><img class="c-main__liftLineImg u-bgWhite" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_liftLine03.png" alt="リフトのロープ"></div>
        <div id="elevator" class="c-main__liftBodyImg">
            <img class="c-ropeway" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_ropeway.png" alt="ロープウェイ">
        </div>
    </div>
    <!-- リフト部分 -->

    <!-- department -->
    <div class="l-department">

        <!-- elevatorArea -->
        <div class="p-elevatorArea u-bg3ea5c8">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_catchCopy02.png" class="c-catchCopy" alt="ロープウェイに乗って見つけよう！あ・わくわくする徳島">
            <!-- class="u-mb20" -->
            <section id="js_6f" class="u-mb2p">
                <div class="p-floorBlock6">
                    <h2 class="c-floorName">
                        <p>特設会場</p>
                    </h2>
                    <div class="p-special u-flex">
                        <div class="p-specialLink ">
                            <a href="<?php echo home_url('/quiz/') ?>" class="c-specialLink" target="_blank">
                                <h3 class="u-specialName">徳島<br>クイズ</h3>
                                <img class="c-specialEvent" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_game.png" alt="ゲーム">
                            </a>
                        </div>
                        <div class="p-specialLink ">
                            <a href="<?php echo home_url('/special/') ?>" class="c-specialLink">
                                <h3 class="u-specialName">特集<br>コーナー</h3>
                                <img class="c-specialEvent" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_special.png" alt="特集">
                            </a>
                        </div>
                        <div class="p-specialLink ">
                            <a href="<?php echo home_url('/horror/') ?>" class="c-specialLink">
                                <h3 class="u-specialName">徳島の<br>都市伝説</h3>
                                <img class="c-specialEvent" src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_horror.png" alt="都市伝説">
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- u-mb20 -->
            <!-- 5F -->
            <section id="js_5f" class="p-departmentFloor u-mb2p">
                <div class="p-floorBlock5">
                    <div class="p-floorLink">
                        <a href="<?php echo home_url('/area/east/') ?>">
                            <!-- u-bg2d294f u-white -->
                            <h2 class="c-floorName">県東部</h2>
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
            <!-- u-mb20 -->
            <section id="js_4f" class="p-departmentFloor u-mb2p">
                <div class="p-floorBlock4">
                    <div class="p-floorLink ">
                        <a href="<?php echo home_url('/area/west/') ?>">
                            <!-- u-bg2d294f u-white -->
                            <h2 class="c-floorName">県西部</h2>
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
            <!-- u-mb20 -->
            <section id="js_3f" class="p-departmentFloor u-mb2p">
                <div class="p-floorBlock3">
                    <div class="p-floorLink ">
                        <a href="<?php echo home_url('/area/city/') ?>">
                            <!-- u-bg2d294f u-white -->
                            <h2 class="c-floorName">徳島市</h2>
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
            <section id="js_2f" class="p-departmentFloor">
                <div class="p-floorBlock2">
                    <div class="p-floorLink ">
                        <a href="<?php echo home_url('/area/south/') ?>">
                            <h2 class="c-floorName">県南部</h2>
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
        <!-- u-mb40 -->
        <section id="js_1f" class="u-bgEAE4AD u-mb4p">
            <div class="p-floorBlock_info">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_fukidashi.png" alt="" class="c-fukidashi">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/anime_front_awaodori.gif" alt="" class="c-awaodori">
                <!-- u-white -->
                <h2 class="c-floorName u-bg2d294f u-mb10">ご案内</h2>
                <div class="p-guideArea u-m0A">
                    <h3 class="c-guideTitle">このサイトの使い方</h3>
                    <p class="c-floor__text">
                        当サイトは“架空の案内所“をモチーフにし、徳島県の観光情報を掲載したサイトです。<br>
                        実際に案内所に訪れた時のように、ぜひ一階から最上階までゆっくり楽しんでみてください！<br><br>
                        行きたい所を見つけたら、「MYマップに追加」ボタンを押す事で、地図を作成することが出来ます。<br>
                        ぜひ、自分だけの地図を作って遊んでみてください！
                    </p>
                </div>
            </div>
        </section>

    </div>
    <!-- department -->

    <span id="front_info"></span>
    <div>
        <!-- u-mb40 -->
        <ul class="p-tokushimaLink u-mb4p">
            <li class="c-tokushimaLink"><a href="<?php echo esc_url(home_url('/tokushima/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/bn_front_tokushima.png" alt="徳島について"></a></li>
            <li class="c-tokushimaLink"><a href="<?php echo get_post_type_archive_link('event'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/bn_front_event.png" alt="徳島のイベント"></a></li>
            <li class="c-tokushimaLink"><a href="<?php echo get_post_type_archive_link('famous'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/bn_front_famous.png" alt="徳島の名物"></a></li>
        </ul>
    </div>

    <!-- news -->
    <section class="p-newsArea u-bgWhite">
        <div class="c-newsArea">
            <!-- Ditty news ticker ショートコード -->
            <?php echo do_shortcode('[ditty_news_ticker id="219"]'); ?>
        </div>
    </section>
    <!-- news -->

    <!-- insta -->
    <section class="p-insta">
        <h2 class="c-floorName u-m0A u-mb10">
            <p>Instagram</p>
        </h2>
        <div class="c-footerImg"></div>
        <!-- instagram表示 ショートコード -->
        <?php echo do_shortcode('[instagram-feed]'); ?>
        <div class="c-footerImg"></div>
    </section>

</main>

<?php get_footer(); ?>
