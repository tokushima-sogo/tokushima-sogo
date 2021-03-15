<?php get_header(); ?>

<?php $more_count = 0; ?>
<main class="l-main">

    <!-- breadCrumb -->
    <div class="p-breadCrumb">
        <div class="p-breadCrumb__inner">
            <a href="<?php echo home_url('/'); ?>"><span>トップ</span></a>
            <i class="fas fa-angle-right"></i>
            <span>徳島の名物</span>
        </div>
    </div>
    <!-- breadCrumb -->

    <!-- description -->
    <section class="l-description">
        <h2 class="c-heroImg"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/mv_archive_famous_web.jpg" alt="徳島の名物"></h2>
        <div class="p-description">
            <div class="p-description__item">
                <p class="c-description__text u-center">
                    お菓子・おかず・お酒の3種類の名産品を紹介します。どれもうまいんじょ！</p>
            </div>
        </div>
    </section>
    <!-- description -->

    <!--  1  -->
    <section class="l-articleList">
        <div class="u-center">
            <h3 class="c-subHeading">お菓子</h3>
        </div>
        <!-- articleList -->
        <div class="p-articleList u-grid">
            <!-- お菓子の記事を出力するループ -->
            <?php
            $args = array(
                'post_type'         => 'famous',  // カスタム投稿タイプ名
                'orderby'           => 'rand',    //ランダムで表示
                'tax_query'         => array(
                    'relation'      => 'AND',
                    array(
                        'taxonomy'  => 'taxotag', // タクソノミースラッグを指定
                        'field'     => 'slug',    // termsで使用する種類指定
                        'terms'     => 'snack',   // タームスラッグを指定
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
                                    $terms = get_the_terms($post->ID, 'taxotag');
                                    if ($terms[0]) {
                                        echo '<li class="c-singleTagList__li">' . $terms[0]->name . '</li>';
                                    }
                                    if (isset($terms[1])) {
                                        echo '<li class="c-singleTagList__li">' . $terms[1]->name . '</li>';
                                    } else {
                                        echo '<p>&nbsp;</p>';
                                    }
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
            <!-- /moreBtn -->

        <?php endif; ?>
        <!-- カウントを初期化する -->
        <?php $more_count = 0; ?>
    </section>
    <!-- 1 -->

    <!-- 2 -->
    <section class="l-articleList">
        <div class="u-center">
            <h3 class="c-subHeading">おかず</h3>
        </div>

        <!-- articleList -->
        <div class="p-articleList u-grid">
            <!-- おかずの記事を出力するループ -->
            <?php
            $args = array(
                'post_type'        => 'famous',    // カスタム投稿タイプ名
                'orderby'          => 'rand',      //ランダムで表示
                'tax_query'        => array(
                    'relation'     => 'AND',
                    array(
                        'taxonomy' => 'taxotag',   // タクソノミースラッグを指定
                        'field'    => 'slug',      // termsで使用する種類指定
                        'terms'    => 'meal',      // タームスラッグを指定
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
                                    $terms = get_the_terms($post->ID, 'taxotag');
                                    if ($terms[0]) {
                                        echo '<li class="c-singleTagList__li">' . $terms[0]->name . '</li>';
                                    }
                                    if (isset($terms[1])) {
                                        echo '<li class="c-singleTagList__li">' . $terms[1]->name . '</li>';
                                    } else {
                                        echo '<p>&nbsp;</p>';
                                    }
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
        <?php $more_count = 0; ?>​
    </section>
    <!-- 2 -->

    <!-- 3 -->
    <section class="l-articleList">
        <div class="u-center">
            <h3 class="c-subHeading">お酒</h3>
        </div>

        <!-- articleList -->
        <div class="p-articleList u-grid">
            <!-- お酒の記事を出力するループ -->
            <?php
            $args = array(
                'post_type'         => 'famous',    // カスタム投稿タイプ名
                'orderby'          => 'rand',             //ランダムで表示
                'tax_query'         => array(
                    'relation'      => 'AND',
                    array(
                        'taxonomy'  => 'taxotag',   // タクソノミースラッグを指定
                        'field'     => 'slug',      // termsで使用する種類指定
                        'terms'     => 'alcohol',   // タームスラッグを指定
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
                                    $terms = get_the_terms($post->ID, 'taxotag');
                                    if ($terms[0]) {
                                        echo '<li class="c-singleTagList__li">' . $terms[0]->name . '</li>';
                                    }
                                    if (isset($terms[1])) {
                                        echo '<li class="c-singleTagList__li">' . $terms[1]->name . '</li>';
                                    } else {
                                        echo '<p>&nbsp;</p>';
                                    }
                                    ?>
                                </ul>
                                <!-- singleTagList -->
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
        <?php $more_count = 0; ?>​
    </section>
    <!-- 3 -->

</main>
<?php get_footer(); ?>
