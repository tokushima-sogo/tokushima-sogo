<?php get_header(); ?>

<link href="<?php echo get_template_directory_uri(); ?>/assets/css/archive-west.css " rel="stylesheet">

<main class="l-main">
    <!-- breadCrumb -->
    <div class="p-breadCrumb">
        <div class="p-breadCrumb__inner">
            <!-- breadcrumbループstart -->
            <a href="<?php echo home_url('/'); ?>"><span>HOME</span></a>
            <i class="fas fa-angle-right"></i>
            <span>県市内</span>
            <!-- breadcrumbループend -->
        </div>
    </div>
    <!-- /breadCrumb -->

    <section class="l-description">
        <div class="c-heroImg"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/mv_archive_city_web.jpg" alt="徳島市内"></div>
        <!-- エリア名と説明全体  -->
        <div class="p-description">
            <!-- エリア名  -->
            <h2 class="c-heading u-center u-white u-city">徳島市内</h2>
            <div class="p-description__item u-flex">
                <div class="c-description__text">
                    テキストはまだ
                </div>
                <div class="c-description__map">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_archive_city_map02.png" class="c-map" alt="徳島市内">
                </div>
            </div>
        </div>
    </section>

    <!-- 市内の観光スポット記事のループ設定 -->
    <?php
    $args = array(
        'post_type'         => 'spot',      // カスタム投稿タイプ名
        'orderby'           => 'modified',  // 更新日で表示
        'tax_query'         => array(
            'relation'      => 'AND',
            array(
                'taxonomy'  => 'area',      // タクソノミースラッグを指定
                'field'     => 'slug',      // termsで使用する種類指定
                'terms'     => 'city',      // タームスラッグを指定
            ),
        ),
    );
    ?>

    <section class="l-articleList">
        <!-- タイトルの表示 -->
        <span id="city_spot"></span>
        <h3 class="c-subHeading u-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tl_archive_common_spot.png" alt="スポット">
        </h3>

        <div class="p-articleList u-grid">
            <!-- ループ開始 -->
            <?php $the_query = new WP_Query($args); ?>
            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : ?>
                    <?php $the_query->the_post(); ?>

                    <article class="p-article c-more1">
                        <!-- imgArea -->
                        <div class="p-imgArea">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/frame_archive_common_thumbFrame.png" class="c-frame" alt="額縁">
                            <!-- thumbnail -->
                            <a href="<?php the_permalink(); ?>" class="c-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium') ?>
                                <?php else : ?>
                                    <img src=" <?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                                <?php endif; ?>
                            </a>
                        </div>
                        <!-- /imgArea -->

                        <div class="p-textArea">
                            <div class="p-textContent">
                                <div class="p-tag u-flex">
                                    <div class="c-tag u-city u-mr15">
                                        <?php echo get_the_term_list($post->ID, 'area') ?>
                                    </div>
                                    <div class="c-tag">
                                        <?php echo esc_html(get_post_type_object(get_post_type())->label); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="c-title u-center"><?php the_title(); ?></div>
                        </div>
                        <!-- articleList -->

                        <!-- article -->

                        <div class="c-title u-center">
                            <!-- コンテンツの抜粋 -->
                            <?php the_excerpt(); ?>
                        </div>
                    </article>


                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
        <div class="l-moreBtn u-right">
            <button class="c-moreBtn one u-center u-city">more</button>
        </div>
    </section>

    <!-- 市内のグルメ記事を出力 -->
    <?php
    $args = array(
        'post_type'         => 'gourmet',   // カスタム投稿タイプ名
        'orderby'           => 'modified',  // 更新日で表示
        'tax_query'         => array(
            'relation'      => 'AND',
            array(
                'taxonomy'  => 'area',      // タクソノミースラッグを指定
                'field'     => 'slug',      // termsで使用する種類指定
                'terms'     => 'city',      // タームスラッグを指定
            ),
        ),
    );
    ?>

    <section class="l-articleList">
        <!-- タイトルの表示 -->
        <span id="city_gourmet"></span>
        <h3 class="c-subHeading u-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tl_archive_common_gourmet.png" alt="グルメ">
        </h3>

        <div class="p-articleList u-grid">
            <?php $the_query = new WP_Query($args); ?>
            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : ?>
                    <?php $the_query->the_post(); ?>


                    <article class="p-article c-more2">
                        <!-- imgArea -->
                        <div class="p-imgArea">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/frame_archive_common_thumbFrame.png" class="c-frame" alt="額縁">
                            <!-- thumbnail -->
                            <a href="<?php the_permalink(); ?>" class="c-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium') ?>
                                <?php else : ?>
                                    <img src=" <?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                                <?php endif; ?>
                            </a>
                        </div>
                        <!-- /imgArea -->

                        <div class="p-textArea">
                            <div class="p-textContent">
                                <div class="p-tag u-flex">
                                    <div class="c-tag u-city u-mr15">
                                        <?php echo get_the_term_list($post->ID, 'area') ?>
                                    </div>
                                    <div class="c-tag">
                                        <?php echo esc_html(get_post_type_object(get_post_type())->label); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="c-title u-center"><?php the_title(); ?></div>
                        </div>
                        <!-- articleList -->

                        <!-- article -->

                        <div class="c-title u-center">
                            <!-- コンテンツの抜粋 -->
                            <?php the_excerpt(); ?>
                        </div>
                    </article>


                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
        <div class="l-moreBtn u-right">
            <button class="c-moreBtn two u-center u-city">more</button>
        </div>
    </section>

    <!-- 市内のお土産記事を出力 -->
    <?php
    $args = array(
        'post_type'         => 'shop',      // カスタム投稿タイプ名
        'orderby'           => 'modified',  // 更新日で表示
        'tax_query'         => array(
            'relation'      => 'AND',
            array(
                'taxonomy'  => 'area',      // タクソノミースラッグを指定
                'field'     => 'slug',      // termsで使用する種類指定
                'terms'     => 'city',      // タームスラッグを指定
            ),
        ),
    );
    ?>

    <section class="l-articleList">
        <!-- タイトルの表示 -->
        <span id="city_shop"></span>
        <h3 class="c-subHeading u-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tl_archive_common_shop.png" alt="ショップ">
        </h3>
        <div class="p-articleList u-grid">
            <!-- spot -->
            <?php $the_query = new WP_Query($args); ?>
            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : ?>
                    <?php $the_query->the_post(); ?>


                    <article class="p-article c-more3">
                        <!-- サムネイルの表示 -->
                        <!-- imgArea -->
                        <div class="p-imgArea">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/frame_archive_common_thumbFrame.png" class="c-frame" alt="額縁">
                            <!-- thumbnail -->
                            <a href="<?php the_permalink(); ?>" class="c-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium') ?>
                                <?php else : ?>
                                    <img src=" <?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                                <?php endif; ?>
                            </a>
                        </div>
                        <!-- /imgArea -->

                        <div class="p-textArea">
                            <div class="p-textContent">
                                <div class="p-tag u-flex">
                                    <div class="c-tag u-city u-mr15">
                                        <?php echo get_the_term_list($post->ID, 'area') ?>
                                    </div>
                                    <div class="c-tag">
                                        <?php echo esc_html(get_post_type_object(get_post_type())->label); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="c-title u-center"><?php the_title(); ?></div>
                        </div>
                        <!-- articleList -->

                        <!-- article -->

                        <div class="c-title u-center">
                            <!-- コンテンツの抜粋 -->
                            <?php the_excerpt(); ?>
                        </div>
                    </article>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
        <div class="l-moreBtn u-right">
            <button class="c-moreBtn three u-center u-city">more</button>
        </div>
    </section>
</main>

<?php get_footer(); ?>
