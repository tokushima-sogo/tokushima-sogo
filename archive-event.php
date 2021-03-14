<?php get_header(); ?>

<?php $more_count = 0; ?>
<main class="l-main">

    <!-- breadCrumb -->
    <div class="p-breadCrumb">
        <div class="p-breadCrumb__inner">
            <a href="<?php echo home_url(); ?>"><span>トップ</span></a>
            <i class="fas fa-angle-right"></i>
            <span>徳島のイベント</span>
        </div>
    </div>
    <!-- breadCrumb -->

    <!-- description -->
    <section class="l-description">
        <h2 class="c-heroImg"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/mv_archive_event_web.jpg" alt="徳島のイベント"></h2>
        <div class="p-description">
            <div class="p-description__item">
                <p class="c-description__text u-center">
                    県内各地で開催されている展示・見学、体験・レジャー、お祭りを紹介します。阿波踊り以外も楽しめます。</p>
            </div>
        </div>
    </section>
    <!-- description -->

    <!--  1  -->
    <section class="l-articleList">
        <div class="u-center">
            <h3 class="c-subHeading">展示・見学</h3>
        </div>
        <!-- articleList -->
        <div class="p-articleList u-grid">
            <!-- 展示・体験の記事を出力するループ -->
            <?php
            $args = array(
                'post_type'         => 'event',    // カスタム投稿タイプ名
                'orderby'           => 'rand',     // 更新日で表示
                'tax_query'         => array(
                    'relation'      => 'AND',
                    array(
                        'taxonomy'  => 'taxotag',  // タクソノミースラッグを指定
                        'field'     => 'slug',     // termsで使用する種類指定
                        'terms'     => 'tour',     // タームスラッグを指定
                    ),
                ),
            );
            ?>
            <?php $the_query = new WP_Query($args); ?>
            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : ?>
                    <?php $the_query->the_post(); ?>

                    <!-- 記事の数ループ文の中で-->
                    <?php $more_count++; ?>

                    <!-- article -->
                    <article class="p-article c-more1">
                        <!-- imgArea -->
                        <div class="p-imgArea">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/frame_archive_common_thumbFrame.png" class="c-frame" alt="額縁">
                            <!-- thumbnail -->
                            <a href="<?php the_permalink(); ?>" class="c-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium') ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="画像がありません">
                                <?php endif; ?>
                            </a>
                        </div>
                        <!-- imgArea -->

                        <!-- textArea -->
                        <div class="p-textArea">
                            <div class="p-textContent">
                                <div class="c-title u-center">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                                <ul class="p-singleTagList__ul u-flex">
                                    <?php
                                    echo get_the_term_list($post->ID, 'taxotag', '<li class="c-singleTagList__li', '</li><li class="c-singleTagList__li>', '</li>');
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <!-- textArea -->
                    </article>
                    <!-- article -->
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
        <!-- articleList -->

        <!-- 記事が3以上ならmoreボタンを出す。 -->
        <?php if ($more_count > 3) : ?>

            <!-- moreBtn -->
            <div class="l-moreBtn u-right">
                <button class="c-btn c-moreBtn one u-center">more</button>
            </div>
            <!-- moreBtn -->

        <?php endif; ?>
        <!-- カウントを初期化する -->
        <?php $more_count = 0; ?>
    </section>
    <!-- 1 -->

    <!-- 2 -->
    <section class="l-articleList">
        <div class="u-center">
            <h3 class="c-subHeading">体験・レジャー</h3>
        </div>

        <!-- articleList -->
        <div class="p-articleList u-grid">
            <!-- レジャーの記事を出力するループ -->
            <?php
            $args = array(
                'post_type'         => 'event',     // カスタム投稿タイプ名
                'orderby'           => 'rand',      // 更新日で表示
                'tax_query'         => array(
                    'relation'      => 'AND',
                    array(
                        'taxonomy'  => 'taxotag',   // タクソノミースラッグを指定
                        'field'     => 'slug',      // termsで使用する種類指定
                        'terms'     => 'leisure',   // タームスラッグを指定
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

                    <!-- article -->
                    <article class="p-article c-more2">
                        <!-- imgArea -->
                        <div class="p-imgArea">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/frame_archive_common_thumbFrame.png" class="c-frame" alt="額縁">
                            <a href="<?php the_permalink(); ?>" class="c-thumbnail">
                                <!-- thumbnail -->
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium') ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="画像がありません">
                                <?php endif; ?>
                            </a>
                        </div>
                        <!-- imgArea -->

                        <!-- textArea -->
                        <div class="p-textArea">
                            <div class="p-textContent">
                                <div class="c-title u-center">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                                <ul class="p-singleTagList__ul u-flex">
                                    <?php
                                    echo get_the_term_list($post->ID, 'taxotag', '<li class="c-singleTagList__li', '</li><li class="c-singleTagList__li>', '</li>');
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <!-- textArea -->
                    </article>
                    <!-- article -->
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
        <!-- articleList -->

        <!-- 記事が3以上ならmoreボタンを出す。 -->
        <?php if ($more_count > 3) : ?>

            <!-- moreBtn -->
            <div class="l-moreBtn u-right">
                <button class="c-btn c-moreBtn two u-center">more</button>
            </div>
            <!-- moreBtn -->

        <?php endif; ?>
        <!-- カウントを初期化する -->
        <?php $more_count = 0; ?>
    </section>
    <!-- 2 -->

    <!-- 3 -->
    <section class="l-articleList">
        <div class="u-center">
            <h3 class="c-subHeading">お祭り</h3>
        </div>

        <!-- articleList -->
        <div class="p-articleList u-grid">
            <!-- お祭りの記事を出力するループ -->
            <?php
            $args = array(
                'post_type'         => 'event',     // カスタム投稿タイプ名
                'orderby'           => 'rand',      // 更新日で表示
                'tax_query'         => array(
                    'relation'      => 'AND',
                    array(
                        'taxonomy'  => 'taxotag',   // タクソノミースラッグを指定
                        'field'     => 'slug',      // termsで使用する種類指定
                        'terms'     => 'festival',  // タームスラッグを指定
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

                    <!-- article -->
                    <article class="p-article c-more3">
                        <!-- imgArea -->
                        <div class="p-imgArea">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/frame_archive_common_thumbFrame.png" class="c-frame" alt="額縁">
                            <a href="<?php the_permalink(); ?>" class="c-thumbnail">
                                <!-- thumbnail -->
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium') ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="画像がありません">
                                <?php endif; ?>
                            </a>
                        </div>
                        <!-- imgArea -->

                        <!-- textArea -->
                        <div class="p-textArea">
                            <div class="p-textContent">
                                <div class="c-title u-center">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                                <ul class="p-singleTagList__ul u-flex">
                                    <?php
                                    echo get_the_term_list($post->ID, 'taxotag', '<li class="c-singleTagList__li', '</li><li class="c-singleTagList__li>', '</li>');
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <!-- textArea -->
                    </article>
                    <!-- article -->
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
        <!-- articleList -->

        <!-- 記事が3以上ならmoreボタンを出す。 -->
        <?php if ($more_count > 3) : ?>

            <!-- moreBtn -->
            <div class="l-moreBtn u-right">
                <button class="c-btn c-moreBtn three u-center">more</button>
            </div>
            <!-- moreBtn -->

        <?php endif; ?>
        <!-- カウントを初期化する -->
        <?php $more_count = 0; ?>
    </section>
    <!-- 3 -->

</main>
<?php get_footer(); ?>
