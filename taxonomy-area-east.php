<?php get_header(); ?>

<?php $more_count = 0; ?>
<main class="l-main">

    <!-- breadCrumb -->
    <div class="p-breadCrumb">
        <div class="p-breadCrumb__inner">
            <a href="<?php echo home_url('/'); ?>"><span>トップ</span></a>
            <i class="fas fa-angle-right"></i>
            <span>県東部</span>
        </div>
    </div>
    <!-- breadCrumb -->

    <section class="l-description">
        <div class="c-heroImg"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/mv_archive_east_web.jpg" alt="徳島東部"></div>
        <!-- エリア名と説明全体  -->
        <div class="p-description">
            <!-- エリア名  -->
            <h2 class="c-heading u-center u-white u-east">徳島東部</h2>
            <div class="p-description__item u-flex">
                <div class="c-description__text">
                    県東部は1985年に神戸淡路鳴門自動車道が開通して以来、「四国の玄関口」として四国訪客者の憩いの場となってきた。大鳴門橋を渡ってすぐの鳴門市では、世界的にも珍しい「鳴門の渦潮」(世界三大潮流※1の一つ)がみられる。また伝統工芸「藍染め」を体験できる施設が多くある。「藍染め」とは植物染料 藍 を用いた染色技法で、縁起の良い勝色として古くから重宝されている。その他にも、県東部には郷土料理「たらいうどん」を堪能できるお店もあり、徳島を深く感じられるエリアである。
                    （※1日本・鳴門の渦潮、イタリア・メッシーナ海峡、カナダのセイモア海峡）
                </div>
                <div class="c-description__map">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_archive_east_map02.png" class="c-map" alt="徳島東部">
                </div>
            </div>
        </div>
    </section>

    <section class="l-articleList">
        <!-- タイトルの表示 -->
        <span id="east_spot"></span>
        <div class="u-center">
            <h3 class="c-subHeading">スポット</h3>
        </div>
        <div class="p-articleList u-grid">
            <!-- 東部の観光スポット記事を出力 -->
            <?php
            $args = array(
                'post_type'         => 'spot',      // カスタム投稿タイプ名
                'orderby'           => 'rand',      //ランダムで表示
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
        <span id="east_gourmet"></span>
        <div class="u-center">
            <h3 class="c-subHeading">グルメ</h3>
        </div>
        <div class="p-articleList u-grid">

            <!-- 東部のグルメ記事を出力 -->
            <?php
            $args = array(
                'post_type'         => 'gourmet',   // カスタム投稿タイプ名
                'orderby'           => 'rand',      //ランダムで表示
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
        <span id="east_shop"></span>
        <div class="u-center">
            <h3 class="c-subHeading">ショップ</h3>
        </div>
        <div class="p-articleList u-grid">
            <!-- 東部のショップ記事を出力 -->
            <?php
            $args = array(
                'post_type'         => 'shop',      // カスタム投稿タイプ名
                'orderby'           => 'rand',      //ランダムで表示
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
