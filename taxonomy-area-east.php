<?php get_header(); ?>
<link href="<?php echo get_template_directory_uri(); ?>/assets/css/archive-west.css " rel="stylesheet">


<main class="l-main">
    <!-- チェックボックス -->
    <input type="checkbox" class="check fade" id="checked-fade" checked>
    <label class="switch fade" for="checked-fade"></label>
    <!-- doorAnimation -->
    <div class="c-doorAnimation">

        <!-- breadCrumb -->
        <div class="p-breadCrumb">
            <div class="p-breadCrumb__inner">
                <!-- breadcrumbループstart -->
                <a href="<?php echo home_url(); ?>"><span>HOME</span></a>
                <i class="fas fa-angle-right"></i>
                <span>県東部</span>
                <!-- breadcrumbループend -->
            </div>
        </div>
        <!-- /breadCrumb -->

        <section class="l-description">
            <div class="c-heroImg"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/mv_archive_east_web.jpg" alt="徳島東部"></div>
            <!-- エリア名と説明全体  -->
            <div class="p-description">
                <!-- エリア名  -->
                <h2 class="c-heading u-center u-white u-west">徳島東部</h2>
                <div class="p-description__item u-flex">
                    <div class="c-description__text">
                        テキストはまだ
                    </div>
                    <div class="c-description__map">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_archive_east_map02.png" class="c-map" alt="徳島東部">
                    </div>
                </div>
            </div>
        </section>

        <!-- 東部の観光スポット記事を出力 -->
        <?php
        $args = array(
            'post_type'         => 'spot',      // カスタム投稿タイプ名
            'orderby'           => 'modified',  // 更新日で表示
            'tax_query'         => array(
                'relation'      => 'AND',
                array(
                    'taxonomy'  => 'area',      // タクソノミースラッグを指定
                    'field'     => 'slug',      // termsで使用する種類指定
                    'terms'     => 'east',      // タームスラッグを指定
                ),
            ),
        );
        ?>

        <section class="l-articleList">
            <!-- タイトルの表示 -->
            <h3 id="east_spot" class="c-subHeading u-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tl_archive_common_spot.png" alt="スポット">
            </h3>

            <!-- ループ開始 -->
            <?php $the_query = new WP_Query($args); ?>
            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : ?>
                    <?php $the_query->the_post(); ?>

                    <div class="p-articleList u-grid">
                        <article class="p-article c-more1">
                            <!-- imgArea -->
                            <div class="p-imgArea">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/flame_archive_common_thumbFlame.png" class="c-frame" alt="額縁">
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
                                <div class="p-textContent u-flex">
                                    <div class="p-bookmark u-flex">
                                        <img src="assets/images/icon_archive_common_icon_heart02.png" class="c-icon__heart">
                                        <div class="c-bookmark__text"><span class="c-bookmark__count">10</span>いいね！</div>
                                    </div>
                                    <div class="p-tag u-flex">
                                        <div class="c-tag u-west u-mr15"><?php echo get_the_term_list($post->ID, 'area') ?></div>
                                        <div class="c-tag"><?php echo get_post_type(); ?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- articleList -->

                            <!-- article -->

                            <div class="c-title u-center">
                                <!-- コンテンツの抜粋 -->
                                <?php the_excerpt(); ?>
                            </div>
                        </article>
                    </div>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </section>

        <!-- 東部のグルメ記事を出力 -->
        <?php
        $args = array(
            'post_type'         => 'gourmet',   // カスタム投稿タイプ名
            'orderby'           => 'modified',  // 更新日で表示
            'tax_query'         => array(
                'relation'      => 'AND',
                array(
                    'taxonomy'  => 'area',      // タクソノミースラッグを指定
                    'field'     => 'slug',      // termsで使用する種類指定
                    'terms'     => 'east',      // タームスラッグを指定
                ),
            ),
        );
        ?>
        <section class="l-articleList">
            <!-- タイトルの表示 -->
            <h3 id="east_gourmet" class="c-subHeading u-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tl_archive_common_gourmet.png" alt="グルメ">
            </h3>

            <!-- spot -->
            <?php $the_query = new WP_Query($args); ?>
            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : ?>
                    <?php $the_query->the_post(); ?>

                    <div class="p-articleList u-grid">
                        <article class="p-article c-more1">
                            <!-- imgArea -->
                            <div class="p-imgArea">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/flame_archive_common_thumbFlame.png" class="c-frame" alt="額縁">
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
                                <div class="p-textContent u-flex">
                                    <div class="p-bookmark u-flex">
                                        <img src="assets/images/icon_archive_common_icon_heart02.png" class="c-icon__heart">
                                        <div class="c-bookmark__text"><span class="c-bookmark__count">10</span>いいね！</div>
                                    </div>
                                    <div class="p-tag u-flex">
                                        <div class="c-tag u-west u-mr15"><?php echo get_the_term_list($post->ID, 'area') ?></div>
                                        <div class="c-tag"><?php echo get_post_type(); ?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- articleList -->

                            <!-- article -->

                            <div class="c-title u-center">
                                <!-- コンテンツの抜粋 -->
                                <?php the_excerpt(); ?>
                            </div>
                        </article>
                    </div>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </section>

        <!-- 東部のお土産記事を出力 -->
        <?php
        $args = array(
            'post_type'         => 'shop',      // カスタム投稿タイプ名
            'orderby'           => 'modified',  // 更新日で表示
            'tax_query'         => array(
                'relation'      => 'AND',
                array(
                    'taxonomy'  => 'area',      // タクソノミースラッグを指定
                    'field'     => 'slug',      // termsで使用する種類指定
                    'terms'     => 'east',      // タームスラッグを指定
                ),
            ),
        );
        ?>
        <section class="l-articleList">
            <!-- タイトルの表示 -->
            <h3 id="east_shop" class="c-subHeading u-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tl_archive_common_shop.png" alt="ショップ">
            </h3>

            <!-- spot -->
            <?php $the_query = new WP_Query($args); ?>
            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : ?>
                    <?php $the_query->the_post(); ?>

                    <div class="p-articleList u-grid">
                        <article class="p-article c-more1">
                            <!-- imgArea -->
                            <div class="p-imgArea">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/flame_archive_common_thumbFlame.png" class="c-frame" alt="額縁">
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
                                <div class="p-textContent u-flex">
                                    <div class="p-bookmark u-flex">
                                        <img src="assets/images/icon_archive_common_icon_heart02.png" class="c-icon__heart">
                                        <div class="c-bookmark__text"><span class="c-bookmark__count">10</span>いいね！</div>
                                    </div>
                                    <div class="p-tag u-flex">
                                        <div class="c-tag u-west u-mr15"><?php echo get_the_term_list($post->ID, 'area') ?></div>
                                        <div class="c-tag"><?php echo get_post_type(); ?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- articleList -->

                            <!-- article -->

                            <div class="c-title u-center">
                                <!-- コンテンツの抜粋 -->
                                <?php the_excerpt(); ?>
                            </div>
                        </article>
                    </div>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </section>

</main>

<?php get_footer(); ?>
