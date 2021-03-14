<?php get_header(); ?>

<?php $more_count = 0; ?>
<main class="l-main u-bgHorror">

    <!-- breadCrumb -->
    <div class="p-breadCrumb">
        <div class="p-breadCrumb__inner u-panHorror">
            <!-- breadcrumbループstart -->
            <a href="<?php echo home_url(); ?>"><span>トップ</span></a>
            <i class="fas fa-angle-right"></i>
            <span>都市伝説</span>
            <!-- breadcrumbループend -->
        </div>
    </div>

    <!-- /breadCrumb -->



    <section class="l-description">
        <div class="c-heroImg">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mv_archive_horror_web.png" alt="都市伝説">
        </div>
        <!-- エリア名と説明全体  -->
        <div class="p-description">
            <!-- エリア名  -->
            <h2 class="c-heading u-center u-white u-horrorRed">徳島の都市伝説</h2>
            <div class="p-description__item">
                <div class="c-description__text">
                    徳島にまつわる都市伝説は数多くある。妖怪伝説、邪馬台国は徳島説、ユダヤ三種の神器が
                    入っているアークの場所は徳島にある説、本ページで紹介しきれない所もあるだろう。
                    実際に取材を行った所では興味深い話を聞けたり、いろんな体験をした。ネットだけで調べるよりも足を運んで行くことの重要性を知った。それを全てここに載せている。興味のある方はぜひ行って確かめて欲しい。あなたにも何か不思議な体験ができるかもしれない。
                </div>

            </div>
        </div>
    </section>


    <!-- 歴史の記事 -->
    <section class="l-articleList">
        <h3 class="c-subHeading u-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tl_archive_horror_history02.png" alt="歴史">
        </h3>
        <!-- articleList -->
        <div class="p-articleList u-grid">

            <!-- 歴史の記事を出力するループの設定 -->
            <?php
            $args = array(
                'post_type'        => 'horror',   // カスタム投稿タイプ名
                'orderby'          => 'rand',             //ランダムで表示
                'tax_query'        => array(
                    'relation'     => 'AND',
                    array(
                        'taxonomy' => 'taxotag',  // タクソノミースラッグを指定
                        'field'    => 'slug',     // termsで使用する種類指定
                        'terms'    => 'history',  // タームスラッグを指定
                    ),
                ),
            );
            ?>
            <!-- サブループ開始 -->
            <?php $the_query = new WP_Query($args); ?>
            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : ?>
                    <?php $the_query->the_post(); ?>

                    <!-- 記事の数 ループ文の中で-->
                    <?php $more_count++; ?>

                    <!-- article -->
                    <article class="p-article c-more1">

                        <!-- imgArea -->
                        <div class="p-imgArea">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/flame_archive_horror_thmbFlame.png" class="c-frame" alt="額縁">
                            <!-- thumbnail -->
                            <a href="<?php the_permalink(); ?>" class="c-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium') ?>
                                <?php else : ?>
                                    <img src=" <?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="画像がありません">
                                <?php endif; ?>
                            </a>
                        </div>
                        <!-- /imgArea -->

                        <!-- textArea -->
                        <div class="p-textArea u-horrorRed">
                            <div class="p-textContent">
                                <a href="<?php the_permalink(); ?>" class="c-title u-center u-fontHorror"><?php the_title(); ?></a>
                                <!-- <div class="c-title u-center u-fontHorror"><?php the_title(); ?></div> -->
                                <div class="c-date u-center u-fontHorror">公開日：<?php the_time('Y-m-d'); ?></div>
                                <div class="p-tag u-flex">
                                    <div class="c-tag u-bgHorror"><?php echo get_the_term_list($post->ID, 'taxotag'); ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /textArea -->
                    </article>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>

        <!-- 記事が3以上ならmoreボタンを出す。 -->
        <?php if ($more_count > 3) : ?>
            <!-- moreBtn -->
            <div class="l-moreBtn u-right">
                <button class="c-btn c-moreBtn one u-center u-horrorRed u-moreHover">more</button>
            </div>
            <!-- /moreBtn -->

        <?php endif; ?>
        <!-- カウントを初期化する -->
        <?php $more_count = 0; ?>​
    </section>



    <!-- 妖怪の記事 -->
    <section class="l-articleList">
        <h3 class="c-subHeading u-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tl_archive_horror_yokai02.png" alt="妖怪">
        </h3>
        <!-- articleList -->
        <div class="p-articleList u-grid">
            <!-- 妖怪の記事を出力するループ -->
            <?php
            $args = array(
                'post_type'        => 'horror',    // カスタム投稿タイプ名
                'orderby'          => 'rand',             //ランダムで表示
                'tax_query'        => array(
                    'relation'     => 'AND',
                    array(
                        'taxonomy' => 'taxotag',   // タクソノミースラッグを指定
                        'field'    => 'slug',      // termsで使用する種類指定
                        'terms'    => 'goast',     // タームスラッグを指定
                    ),
                ),
            );
            ?>

            <!-- サブループ開始 -->
            <?php $the_query = new WP_Query($args); ?>
            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : ?>
                    <?php $the_query->the_post(); ?>

                    <!-- 記事の数 ループ文の中で-->
                    <?php $more_count++; ?>

                    <!-- article -->
                    <article class="p-article c-more2">

                        <!-- imgArea -->
                        <div class="p-imgArea">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/flame_archive_horror_thmbFlame.png" class="c-frame" alt="額縁">
                            <!-- thumbnail -->
                            <a href="<?php the_permalink(); ?>" class="c-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium') ?>
                                <?php else : ?>
                                    <img src=" <?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="画像がありません">
                                <?php endif; ?>
                            </a>
                        </div>
                        <!-- /imgArea -->

                        <!-- textArea -->
                        <div class="p-textArea u-horrorRed">
                            <div class="p-textContent">
                                <!-- <div class="c-title u-center u-fontHorror"><?php the_title(); ?></div> -->
                                <a href="<?php the_permalink(); ?>" class="c-title u-center u-fontHorror"><?php the_title(); ?></a>
                                <div class="c-date u-center u-fontHorror">公開日：<?php the_time('Y-m-d'); ?></div>

                                <div class="p-tag u-flex">
                                    <div class="c-tag u-bgHorror"> <?php echo get_the_term_list($post->ID, 'taxotag'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /textArea -->
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>

        <!-- 記事が3以上ならmoreボタンを出す。 -->
        <?php if ($more_count > 3) : ?>

            <!-- moreBtn -->
            <div class="l-moreBtn u-right">
                <button class="c-btn c-moreBtn two u-center u-horrorRed u-moreHover">more</button>
            </div>
            <!-- /moreBtn -->

        <?php endif; ?>
        <!-- カウントを初期化する -->
        <?php $more_count = 0; ?>​
    </section>

</main>

<?php get_footer(); ?>
