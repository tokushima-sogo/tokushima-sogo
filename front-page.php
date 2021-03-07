<?php get_header(); ?>

<main>

    <!-- 各ページへのリンク -->
    <!-- 6F -->
    <!-- クイズゲームへ -->
    <!-- <a href="<?php echo esc_url(home_url('/quiz')); ?>">クイズ</a> -->
    <!-- 特集ページへ -->
    <!-- <a href="<?php echo get_post_type_archive_link('special'); ?>">特集</a> -->

    <!-- 5F -->
    <!-- 東部のアーカイブ -->
    <!-- <?php
            $east = get_term_by('slug', 'east', 'area');
            $east_link = get_term_link($east, 'area');
            ?>
    <a href="<?php echo $east_link; ?>">東部</a> -->


    <!-- 4F -->
    <!-- 西部のアーカイブ -->
    <!-- <?php
            $west = get_term_by('slug', 'west', 'area');
            $west_link = get_term_link($west, 'area');
            ?>
    <a href="<?php echo $west_link; ?>">西部</a> -->

    <!-- 3F -->
    <!-- 市内のアーカイブ -->
    <!-- <?php
            $city = get_term_by('slug', 'city', 'area');
            $city_link = get_term_link($city, 'area');
            ?>
    <a href="<?php echo $city_link; ?>">徳島市内</a> -->

    <!-- 2F -->
    <!-- 南部のアーカイブ -->
    <!-- <?php
            $south = get_term_by('slug', 'south', 'area');
            $south_link = get_term_link($south, 'area');
            ?>
    <a href="<?php echo $south_link; ?>">南部</a> -->

    <!-- 1F -->
    <!-- 徳島について固定ページ -->
    <!-- <a href="<?php echo esc_url(home_url('/tokushima')); ?>">徳島について</a> -->
    <!-- 名物のアーカイブ -->
    <!-- <a href="<?php echo get_post_type_archive_link('famous'); ?>">名物</a> -->
    <!-- イベントのアーカイブ -->
    <!-- <a href="<?php echo get_post_type_archive_link('event'); ?>">イベント</a> -->

    <!-- B1F -->
    <!-- 都市伝説のアーカイブ -->
    <!-- <a href="<?php echo get_post_type_archive_link('horror'); ?>">都市伝説</a> -->



    <!-- Ditty news ticker ショートコード -->
    <!-- <?php echo do_shortcode('[ditty_news_ticker id="219"]'); ?> -->

</main>

<main class="l-main">
    <!-- リフト部分 -->
    <div class="p-main__liftGroup__parts">
        <div class="c-main__liftTopImg">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_liftTop.png" alt="リフトトップ">
        </div>
        <div class="c-main__liftLineImg"></div>
        <div id="elevator" class="c-main__liftBodyImg">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_liftBody.png" alt="リフトボディ">
        </div>
    </div>
    <!-- リフト部分 -->
    <!-- department -->
    <div class="l-department">
        <!-- elevatorArea -->
        <div class="p-elevatorArea">
            <!-- 6F -->
            <section id="js_6f" class="p-departmentFloor u-6f">
                <div class="p-floorBlock">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_catchCopy.png" class="c-catchCopy" alt="＼定員無制限／エレベーターに乗って見つけよう！あ・わくわくする徳島">
                    <h2 class="c-title c-floorName u-center"><span class="c-floorNumber">6階</span>特設会場</h2>
                    <div class="p-special u-flex">
                        <div class="p-specialLink u-flex">
                            <h3 class="c-floorName u-specialName u-center">クイズゲーム</h3>
                            <a href="<?php echo esc_url(home_url('/quiz')); ?>" class="c-specialLink c-ferrisWheelGif">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_ferrisWheel.gif" class="u-filter" alt="観覧車">
                            </a>
                        </div>
                        <div class="p-specialLink u-flex">
                            <h3 class="c-floorName u-specialName u-center">特集コーナー</h3>
                            <a href="<?php echo get_post_type_archive_link('special'); ?>" class="c-specialLink c-baloonGif">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_balloon.gif" class="u-filter" alt="アドバルーン">
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- 5F -->
            <section id="js_5f" class="p-departmentFloor u-5f u-hS">
                <div class="p-floorBlock">
                    <div class="p-floorLink u-flex">
                        <?php
                        $east = get_term_by('slug', 'east', 'area');
                        $east_link = get_term_link($east, 'area');
                        ?>
                        <a href="<?php echo $east_link; ?>">
                            <h2 class="c-title c-floorName u-center u-mb10"><span class="c-floorNumber">5階</span>県東部</h2>
                            <div class="p-floorImg u-filter">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_east01.png" class="c-floorSpot" alt="里むすめ">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_east02.png" class="c-floorSpot u-floorSpot--2nd" alt="上勝ビール">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_map_east.png" class="c-floorMap" alt="県東部">
                            </div>
                        </a>
                    </div>
                </div>
            </section>
            <!-- 4F -->
            <section id="js_4f" class="p-departmentFloor u-4f u-hS">
                <div class="p-floorBlock">
                    <div class="p-floorLink u-flex">
                        <?php
                        $west = get_term_by('slug', 'west', 'area');
                        $west_link = get_term_link($west, 'area');
                        ?>
                        <a href="<?php echo $west_link; ?>">
                            <h2 class="c-title c-floorName u-center u-mb10"><span class="c-floorNumber">4階</span>県西部</h2>
                            <div class="p-floorImg u-filter">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_west01.png" class="c-floorSpot" alt="祖谷そば">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_west02.png" class="c-floorSpot u-floorSpot--2nd" alt="オンツツジ">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_map_west.png" class="c-floorMap" alt="県西部">
                            </div>
                        </a>
                    </div>
                </div>
            </section>
            <!-- 3F -->
            <section id="js_3f" class="p-departmentFloor u-3f u-hS">
                <div class="p-floorBlock">
                    <div class="p-floorLink u-flex">
                        <?php
                        $city = get_term_by('slug', 'city', 'area');
                        $city_link = get_term_link($city, 'area');
                        ?>
                        <a href="<?php echo $city_link; ?>">
                            <h2 class="c-title c-floorName u-center u-mb10"><span class="c-floorNumber">3階</span>徳島市</h2>
                            <div class="p-floorImg u-filter">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_city01.png" class="c-floorSpot" alt="焼餅">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_city02.png" class="c-floorSpot u-floorSpot--2nd" alt="シラサギ">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_map_city.png" class="c-floorMap" alt="徳島市">
                            </div>
                        </a>
                    </div>
                </div>
            </section>
            <!-- 2F -->
            <section id="js_2f" class="p-departmentFloor u-2f u-hS">
                <div class="p-floorBlock">
                    <div class="p-floorLink u-flex">
                        <?php
                        $south = get_term_by('slug', 'south', 'area');
                        $south_link = get_term_link($south, 'area');
                        ?>
                        <a href="<?php echo $south_link; ?>">
                            <h2 class="c-title c-floorName u-center u-mb10"><span class="c-floorNumber">2階</span>県南部</h2>
                            <div class="p-floorImg u-filter">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_south01.png" class="c-floorSpot" alt="ウミガメ">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_south02.png" class="c-floorSpot u-floorSpot--2nd" alt="サーフィン">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_front_map_south.png" class="c-floorMap" alt="県南部">
                            </div>
                        </a>
                    </div>
                </div>
            </section>
            <!-- 1F -->
            <section id="js_1f" class="p-departmentFloor u-1f u-hL">
                <div class="p-floorBlock">
                    <h2 class="c-title c-floorName u-center u-mb10"><span class="c-floorNumber">1階</span>ご案内</h2>
                    <div class="p-guideArea">
                        <h3 class="c-guideTitle">このサイトの使い方</h3>
                        <p class="c-text">
                            行きたい場所を見つけたら、Myスポットに登録して、自分だけの地図づくりを楽しんでください。</p>
                        <ul class="p-tokushimaLink">
                            <li class="c-tokushimaLink"><a href="<?php echo esc_url(home_url('/tokushima')); ?>">徳島について<i class="fas fa-caret-right"></i></a></li>
                            <li class="c-tokushimaLink"><a href="<?php echo get_post_type_archive_link('famous'); ?>">徳島の名物<i class="fas fa-caret-right"></i></a></li>
                            <li class="c-tokushimaLink"><a href="<?php echo get_post_type_archive_link('event'); ?>">徳島のイベント<i class="fas fa-caret-right"></i></a></li>
                        </ul>
                        <div class="p-topIcon">
                            <div class="c-topIcon"><i class="fas fa-caret-up"></i></div>
                            <span class="c-floor__text">上へどうぞ</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /elevatorArea -->
        <!-- B1 -->
        <section id="js_basement" class="p-departmentFloor u-b1">
            <a href="<?php echo get_post_type_archive_link('horror'); ?>" class="c-horrorLink">
                <div class="p-floorBlock">
                    <h2 class="u-mb10"><span class="c-floorNumber">地下1階</span>徳島の都市伝説</h2>
                    6階のゲームをクリアすれば 都市伝説へご案内
                </div>
            </a>
        </section>
    </div>
    <!-- /department -->
    <!-- news -->
    <section class="p-newsArea">
        <!-- Ditty news ticker ショートコード -->
        <?php echo do_shortcode('[ditty_news_ticker id="219"]'); ?>
    </section>
    <!-- /news -->
</main>




<?php get_footer(); ?>
