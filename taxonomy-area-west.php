<?php get_header(); ?>

<?php $more_count = 0; ?>
<main class="l-main">

    <!-- breadCrumb -->
    <div class="p-breadCrumb">
        <div class="p-breadCrumb__inner">
            <a href="<?php echo home_url('/'); ?>"><span>トップ</span></a>
            <i class="fas fa-angle-right"></i>
            <span>県西部</span>
        </div>
    </div>
    <!-- breadCrumb -->

    <section class="l-description">
        <div class="c-heroImg"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/mv_archive_west_web.jpg" alt="徳島西部"></div>
        <!-- エリア名と説明全体  -->
        <div class="p-description">
            <!-- エリア名  -->
            <h2 class="c-heading u-center u-white u-west">徳島西部</h2>
            <div class="p-description__item u-flex">
                <div class="c-description__text">
                    県西部は日本百名山に名を連ねる「剣山」や、日本を代表する三大河川の一つで「四国三郎」と呼ばれる吉野川に囲まれており、壮大な自然を感じることができる。県西部の中でも絶景で激流の渓谷として知られている「大歩危」では、2017年ラフティング世界選手権が開催され、大会期間中は約3万人が来場した。また実際にラフティングを体験できる施設もあり、今もなお、多くの観光客を魅了している。他にも徳島を代表する観光スポット「祖谷のかずら橋」や「うだつの町並み」があり、どこか懐かしい、のどかな雰囲気を感じられるエリアである。
                </div>
                <div class="c-description__map">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_archive_west_map02.png" class="c-map" alt="徳島西部">
                </div>
            </div>
        </div>
    </section>

    <section class="l-articleList">
        <!-- タイトルの表示 -->
        <span id="west_spot"></span>
        <div class="u-center">
            <h3 class="c-subHeading">スポット</h3>
        </div>
        <div class="p-articleList u-grid">
            <!-- 西部の観光スポット記事のループ設定 -->
            <?php
            $args = array(
                'post_type'         => 'spot',      // カスタム投稿タイプ名
                'orderby'           => 'rand',      //ランダムで表示
                'tax_query'         => array(
                    'relation'      => 'AND',
                    array(
                        'taxonomy'  => 'area',      // タクソノミースラッグを指定
                        'field'     => 'slug',      // termsで使用する種類指定
                        'terms'     => 'west',      // タームスラッグを指定
                    ),
                ),
            );
            ?>
            <!-- ループ開始 -->
            <?php $the_query = new WP_Query($args); ?>
            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : ?>
                    <?php $the_query->the_post(); ?>

                    <!-- 記事の数 ループ文の中で-->
                    <?php $more_count++; ?>

                    <article class="p-article c-more1">
                        <!-- imgArea -->
                        <div class="p-imgArea">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/frame_archive_common_thumbFrame.png" class="c-frame" alt="額縁">
                            <!-- thumbnail -->
                            <a href="<?php the_permalink(); ?>" class="c-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium') ?>
                                <?php else : ?>
                                    <img src=" <?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="画像がありません">
                                <?php endif; ?>
                            </a>
                        </div>

                        <div class="p-textArea">
                            <div class="p-textContent">
                                <div class="c-title u-center">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                                <div class="p-tag u-flex">
                                    <div class="c-tag u-mr15">
                                        <?php echo get_the_term_list($post->ID, 'area') ?>
                                    </div>
                                    <div class="c-tag">
                                        <?php echo esc_html(get_post_type_object(get_post_type())->label); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>

        <!-- 記事が3以上ならmoreボタンを出す。 -->
        <?php if ($more_count > 3) : ?>

            <div class="l-moreBtn u-right">
                <button class="c-btn c-moreBtn one u-center">more</button>
            </div>

        <?php endif; ?>
        <!-- カウントを初期化する -->
        <?php $more_count = 0; ?>
    </section>

    <section class="l-articleList">
        <!-- タイトルの表示 -->
        <span id="west_gourmet"></span>
        <div class="u-center">
            <h3 class="c-subHeading">グルメ</h3>
        </div>

        <div class="p-articleList u-grid">
            <!-- 西部のグルメ記事を出力 -->
            <?php
            $args = array(
                'post_type'         => 'gourmet',   // カスタム投稿タイプ名
                'orderby'           => 'rand',      //ランダムで表示
                'tax_query'         => array(
                    'relation'      => 'AND',
                    array(
                        'taxonomy'  => 'area',      // タクソノミースラッグを指定
                        'field'     => 'slug',      // termsで使用する種類指定
                        'terms'     => 'west',      // タームスラッグを指定
                    ),
                ),
            );
            ?>
            <?php $the_query = new WP_Query($args); ?>
            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : ?>
                    <?php $the_query->the_post(); ?>

                    <!-- 記事の数 ループ文の中で-->
                    <?php $more_count++; ?>

                    <article class="p-article c-more2">
                        <!-- imgArea -->
                        <div class="p-imgArea">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/frame_archive_common_thumbFrame.png" class="c-frame" alt="額縁">
                            <!-- thumbnail -->
                            <a href="<?php the_permalink(); ?>" class="c-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium') ?>
                                <?php else : ?>
                                    <img src=" <?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="画像がありません">
                                <?php endif; ?>
                            </a>
                        </div>

                        <div class="p-textArea">
                            <div class="p-textContent">
                                <div class="c-title u-center">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                                <div class="p-tag u-flex">
                                    <div class="c-tag u-mr15">
                                        <?php echo get_the_term_list($post->ID, 'area') ?>
                                    </div>
                                    <div class="c-tag">
                                        <?php echo esc_html(get_post_type_object(get_post_type())->label); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>

        <!-- 記事が3以上ならmoreボタンを出す。 -->
        <?php if ($more_count > 3) : ?>

            <div class="l-moreBtn u-right">
                <button class="c-btn c-moreBtn two u-center">more</button>
            </div>

        <?php endif; ?>
        <!-- カウントを初期化する -->
        <?php $more_count = 0; ?>
    </section>

    <section class="l-articleList">
        <!-- タイトルの表示 -->
        <span id="west_shop"></span>
        <div class="u-center">
            <h3 class="c-subHeading">ショップ</h3>
        </div>

        <div class="p-articleList u-grid">
            <!-- 西部のショップ記事を出力 -->
            <?php
            $args = array(
                'post_type'         => 'shop',      // カスタム投稿タイプ名
                'orderby'           => 'rand',      //ランダムで表示
                'tax_query'         => array(
                    'relation'      => 'AND',
                    array(
                        'taxonomy'  => 'area',      // タクソノミースラッグを指定
                        'field'     => 'slug',      // termsで使用する種類指定
                        'terms'     => 'west',      // タームスラッグを指定
                    ),
                ),
            );
            ?>
            <?php $the_query = new WP_Query($args); ?>
            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : ?>
                    <?php $the_query->the_post(); ?>

                    <!-- 記事の数 ループ文の中で-->
                    <?php $more_count++; ?>

                    <article class="p-article c-more3">
                        <!-- imgArea -->
                        <div class="p-imgArea">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/frame_archive_common_thumbFrame.png" class="c-frame" alt="額縁">
                            <!-- thumbnail -->
                            <a href="<?php the_permalink(); ?>" class="c-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium') ?>
                                <?php else : ?>
                                    <img src=" <?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="画像がありません">
                                <?php endif; ?>
                            </a>
                        </div>

                        <div class="p-textArea">
                            <div class="p-textContent">
                                <div class="c-title u-center">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                                <div class="p-tag u-flex">
                                    <div class="c-tag u-mr15">
                                        <?php echo get_the_term_list($post->ID, 'area') ?>
                                    </div>
                                    <div class="c-tag">
                                        <?php echo esc_html(get_post_type_object(get_post_type())->label); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>

        <!-- 記事が3以上ならmoreボタンを出す。 -->
        <?php if ($more_count > 3) : ?>

            <div class="l-moreBtn u-right">
                <button class="c-btn c-moreBtn three u-center">more</button>
            </div>

        <?php endif; ?>
        <!-- カウントを初期化する -->
        <?php $more_count = 0; ?>
    </section>
</main>

<?php get_footer(); ?>
