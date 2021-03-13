<?php get_header(); ?>

<?php $more_count = 0; ?>
<main class="l-main">

    <!-- breadCrumb -->
    <div class="p-breadCrumb">
        <div class="p-breadCrumb__inner">
            <!-- breadcrumbループstart -->
            <a href="<?php echo home_url('/'); ?>"><span>トップ</span></a>
            <i class="fas fa-angle-right"></i>
            <span>徳島市内</span>
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
                    徳島市は江戸時代に徳島藩の城下町として栄え、幕末には藍産業の発展で国内で人口が上位10位に入る城下町となった。徳島県の政治・経済・文化の中心都市であり、古来近畿地方との繋がりが深く現在でも神戸淡路鳴門自動車道や関西地方のテレビ、ラジオを通じて人的・物的・経済的な交流が盛んである。地理的には「四国三郎」と呼ばれる吉野川の河口に位置し、紀伊水道に面している。

                    毎年8月のお盆期間に開催される当市の阿波踊り（徳島市阿波おどり）は江戸時代より約400年の歴史がある日本の著名な伝統芸能の一つであり、阿波踊り期間中の4日間に日本国内外から約130万人の観光客が訪れる。
                </div>
                <div class="c-description__map">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_archive_city_map02.png" class="c-map" alt="徳島市内">
                </div>
            </div>
        </div>
    </section>

    <section class="l-articleList">
        <!-- タイトルの表示 -->
        <span id="city_spot"></span>
        <div class="u-center">
            <h3 class="c-subHeading">スポット</h3>
        </div>
        <div class="p-articleList u-grid">
            <!-- 市内の観光スポット記事のループ設定 -->
            <?php
            $args = array(
                'post_type'         => 'spot',      // カスタム投稿タイプ名
                'orderby'           => 'rand',      //ランダムで表示
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
                        <!-- /imgArea -->

                        <div class="p-textArea">
                            <div class="p-textContent">
                                <div class="c-title u-center">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                                <div class="p-tag u-flex">
                                    <div class="c-tag u-city u-mr15">
                                        <?php echo get_the_term_list($post->ID, 'area') ?>
                                    </div>
                                    <div class="c-tag">
                                        <?php echo esc_html(get_post_type_object(get_post_type())->label); ?>
                                    </div>
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
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>

        <!-- 記事が3以上ならmoreボタンを出す。 -->
        <?php if ($more_count > 3) : ?>

            <div class="l-moreBtn u-right">
                <button class="c-moreBtn one u-center u-city">more</button>
            </div>

        <?php endif; ?>
        <!-- カウントを初期化する -->
        <?php $more_count = 0; ?>

    </section>

    <section class="l-articleList">
        <!-- タイトルの表示 -->
        <span id="city_gourmet"></span>
        <div class="u-center">
            <h3 class="c-subHeading">グルメ</h3>
        </div>
        <div class="p-articleList u-grid">
            <!-- 市内のグルメ記事を出力 -->
            <?php
            $args = array(
                'post_type'         => 'gourmet',   // カスタム投稿タイプ名
                'orderby'           => 'rand',      //ランダムで表示
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
                        <!-- /imgArea -->

                        <div class="p-textArea">
                            <div class="p-textContent">
                                <div class="c-title u-center">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                                <div class="p-tag u-flex">
                                    <div class="c-tag u-city u-mr15">
                                        <?php echo get_the_term_list($post->ID, 'area') ?>
                                    </div>
                                    <div class="c-tag">
                                        <?php echo esc_html(get_post_type_object(get_post_type())->label); ?>
                                    </div>
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
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>

        <!-- 記事が3以上ならmoreボタンを出す。 -->
        <?php if ($more_count > 3) : ?>

            <div class="l-moreBtn u-right">
                <button class="c-moreBtn two u-center u-city">more</button>
            </div>

        <?php endif; ?>
        <!-- カウントを初期化する -->
        <?php $more_count = 0; ?>

    </section>

    <section class="l-articleList">
        <!-- タイトルの表示 -->
        <span id="city_shop"></span>
        <div class="u-center">
            <h3 class="c-subHeading">ショップ</h3>
        </div>
        <div class="p-articleList u-grid">

            <!-- 市内のショップ記事を出力 -->
            <?php
            $args = array(
                'post_type'         => 'shop',      // カスタム投稿タイプ名
                'orderby'           => 'rand',      //ランダムで表示
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
            <?php $the_query = new WP_Query($args); ?>
            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : ?>
                    <?php $the_query->the_post(); ?>

                    <!-- 記事の数 ループ文の中で-->
                    <?php $more_count++; ?>

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
                                    <img src=" <?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="画像がありません">
                                <?php endif; ?>
                            </a>
                        </div>
                        <!-- /imgArea -->

                        <div class="p-textArea">
                            <div class="p-textContent">
                                <div class="c-title u-center">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                                <div class="p-tag u-flex">
                                    <div class="c-tag u-city u-mr15">
                                        <?php echo get_the_term_list($post->ID, 'area') ?>
                                    </div>
                                    <div class="c-tag">
                                        <?php echo esc_html(get_post_type_object(get_post_type())->label); ?>
                                    </div>
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

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>

        <!-- 記事が3以上ならmoreボタンを出す。 -->
        <?php if ($more_count > 3) : ?>

            <div class="l-moreBtn u-right">
                <button class="c-moreBtn three u-center u-city">more</button>
            </div>

        <?php endif; ?>
        <!-- カウントを初期化する -->
        <?php $more_count = 0; ?>
    </section>
</main>

<?php get_footer(); ?>
