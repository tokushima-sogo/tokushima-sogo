<!-- 【引継ぎ事項】
１,84行目サムネイル仮入力。消すこと
2,市内出せない
-->

<?php get_header(); ?>
<link href="<?php echo get_template_directory_uri(); ?>/assets/css/archive-horror.css " rel="stylesheet">

<main class="l-main u-bgHorror">

    <!-- breadCrumb -->
    <div class="p-breadCrumb">
        <div class="p-breadCrumb__inner u-panHorror">
            <!-- breadcrumbループstart -->
            <span>トップ</span>
            <i class="fas fa-angle-right"></i>
            <span>エリア名</span>
            <i class="fas fa-angle-right"></i> <span>カテゴリ</span>
            <i class="fas fa-angle-right"></i> <span>記事タイトル</span>
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

        <!-- 歴史の記事を出力するループの設定 -->
        <?php
        $args = array(
            'post_type'        => 'horror',   // カスタム投稿タイプ名
            'orderby'          => 'modified', // 更新日で表示
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

                <!-- articleList -->
                <div class="p-articleList u-grid">
                    <!-- article -->
                    <article class="p-article c-more1">

                        <!-- imgArea -->
                        <div class="p-imgArea">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/flame_archive_horror_thmbFlame.png" class="c-frame" alt="額縁">

                            <!-- サムネイルの表示 -->
                            <a href="<?php the_permalink(); ?>">
                                <!-- ↓サムネイル入れたら消す -->
                                <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mv_single_horror_hatikura4.jpeg" class="c-thumbnail" alt="スポット写真"> -->

                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium') ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                                <?php endif; ?>
                            </a>
                        </div>
                        <!-- /imgArea -->

                        <!-- textArea -->
                        <div class="p-textArea u-horrorRed">
                            <div class="p-textContent u-flex">
                                <div class="p-bookmark u-flex">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_archive_common_icon_heart.svg" class="c-icon__heart">
                                    <div class="c-bookmark__text u-fontHorror"><span class="c-bookmark__count">10</span>いいね！</div>
                                </div>
                                <div class="p-tag u-flex">
                                    <!-- <div class="c-tag u-bgHorror u-mr15"><?php echo $term_slug; ?></div> -->
                                    <div class="c-tag u-bgHorror"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></div>
                                </div>
                            </div>
                            <div class="c-title u-center u-fontHorror">八倉比売神社</div>
                        </div>
                        <!-- /textArea -->
                    </article>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?> ​
    </section>


    <!-- 歴史の記事 -->
    <section class="l-articleList">
        <h3 class="c-subHeading u-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tl_archive_horror_history02.png" alt="歴史">
        </h3>
        <!-- 妖怪の記事を出力するループ -->
        <?php
        $args = array(
            'post_type'        => 'horror',    // カスタム投稿タイプ名
            'orderby'          => 'modified',  // 更新日で表示
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

                <!-- articleList -->
                <div class="p-articleList u-grid">
                    <!-- article -->
                    <article class="p-article c-more1">

                        <!-- imgArea -->
                        <div class="p-imgArea">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/flame_archive_horror_thmbFlame.png" class="c-frame" alt="額縁">

                            <!-- サムネイルの表示 -->
                            <a href="<?php the_permalink(); ?>">
                                <!-- ↓サムネイル入れたら消す -->
                                <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mv_single_horror_hatikura4.jpeg" class="c-thumbnail" alt="スポット写真"> -->

                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium') ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                                <?php endif; ?>
                            </a>
                        </div>
                        <!-- /imgArea -->

                        <!-- textArea -->
                        <div class="p-textArea u-horrorRed">
                            <div class="p-textContent u-flex">
                                <div class="p-bookmark u-flex">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_archive_common_icon_heart.svg" class="c-icon__heart">
                                    <div class="c-bookmark__text u-fontHorror"><span class="c-bookmark__count">10</span>いいね！</div>
                                </div>
                                <div class="p-tag u-flex">
                                    <!-- <div class="c-tag u-bgHorror u-mr15"><?php echo $term_slug; ?></div> -->
                                    <div class="c-tag u-bgHorror"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></div>
                                </div>
                            </div>
                            <div class="c-title u-center u-fontHorror">八倉比売神社</div>
                        </div>
                        <!-- /textArea -->
                    </article>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?> ​
    </section>

</main>

<?php get_footer(); ?>
