<?php get_header(); ?>

<main class="l-main">

    <!-- breadCrumb -->
    <div class="p-breadCrumb">
        <div class="p-breadCrumb__inner">
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


    <!-- description -->
    <section class="l-description">
        <h2 class="c-heroImg"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/mv_archive_event_web.jpg" alt="徳島のイベント"></h2>
        <div class="p-description">
            <div class="p-description__item">
                <p class="c-description__text u-center">
                    徳島県内各地で行われているイベントを紹介します。</p>
            </div>
        </div>
    </section>
    <!-- description -->

    <!--  1  -->
    <section class="l-articleList">
        <h3 class="c-subHeading u-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tl_archive_event_look.png" alt="展示・見学">
        </h3>
        <!-- articleList -->
        <div class="p-articleList u-grid">
            <!-- 展示・体験の記事を出力するループ -->
            <?php
            $args = array(
                'post_type'         => 'event',     // カスタム投稿タイプ名
                'orderby'           => "modified",  // 更新日で表示
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
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                                <?php endif; ?>
                            </a>
                        </div>
                        <!-- /imgArea -->
                        <!-- textArea -->
                        <div class="p-textArea">
                            <div class="p-textContent">
                                <ul class="p-singleTagList__ul u-flex">
                                    <?php
                                    echo get_the_term_list($post->ID, 'taxotag', '<li class="c-singleTagList__li', '</li><li class="c-singleTagList__li>', '</li>');
                                    ?>
                                </ul>
                                <!-- /singleTagList -->
                            </div>
                            <div class="c-title u-center"><?php the_title(); ?></div>
                        </div>
                        <!-- /textArea -->
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
        <!-- /articleList -->

        <!-- moreBtn -->
        <div class="l-moreBtn u-right">
            <button class="c-moreBtn one u-center">more</button>
        </div>
        <!-- /moreBtn -->

    </section>
    <!-- /1 -->


    <!-- 2 -->
    <section class="l-articleList">
        <h3 class="c-subHeading u-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tl_archive_event_play.png" alt="体験・レジャー">
        </h3>

        <!-- articleList -->
        <div class="p-articleList u-grid">
            <!-- レジャーの記事を出力するループ -->
            <?php
            $args = array(
                'post_type'         => 'event',     // カスタム投稿タイプ名
                'orderby'           => 'modified',  // 更新日で表示
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


                    <!-- article -->
                    <article class="p-article c-more2">
                        <!-- imgArea -->
                        <div class="p-imgArea">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/frame_archive_common_thumbFrame.png" class="c-frame" alt="額縁">
                            <!-- thumbnail -->
                            <a href="<?php the_permalink(); ?>" class="c-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium') ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                                <?php endif; ?>
                            </a>
                        </div>
                        <!-- /imgArea -->

                        <!-- textArea -->
                        <div class="p-textArea">
                            <div class="p-textContent">
                                <ul class="p-singleTagList__ul u-flex">
                                    <?php
                                    echo get_the_term_list($post->ID, 'taxotag', '<li class="c-singleTagList__li', '</li><li class="c-singleTagList__li>', '</li>');
                                    ?>
                                </ul>
                                <!-- /singleTagList -->
                            </div>
                            <div class="c-title u-center"><?php the_title(); ?></div>
                        </div>
                        <!-- /textArea -->
                    </article>
                    <!-- /article -->


                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
        <!-- /articleList -->
        <!-- moreBtn -->
        <div class="l-moreBtn u-right">
            <button class="c-moreBtn two u-center">more</button>
        </div>
        <!-- /moreBtn -->

    </section>
    <!-- /2 -->



    <!-- 3 -->
    <section class="l-articleList">
        <h3 class="c-subHeading u-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tl_archive_event_festival.png" alt="お祭り">
        </h3>

        <!-- articleList -->
        <div class="p-articleList u-grid">
            <!-- お祭りの記事を出力するループ -->
            <?php
            $args = array(
                'post_type'         => 'event',     // カスタム投稿タイプ名
                'orderby'           => 'modified',  // 更新日で表示
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
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                                <?php endif; ?>
                            </a>
                        </div>
                        <!-- /imgArea -->
                        <!-- textArea -->
                        <div class="p-textArea">
                            <div class="p-textContent">
                                <ul class="p-singleTagList__ul u-flex">
                                    <?php
                                    echo get_the_term_list($post->ID, 'taxotag', '<li class="c-singleTagList__li', '</li><li class="c-singleTagList__li>', '</li>');
                                    ?>
                                </ul>
                                <!-- /singleTagList -->
                            </div>
                            <div class="c-title u-center"><?php the_title(); ?></div>
                        </div>
                        <!-- /textArea -->
                    </article>
                    <!-- /article -->




                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
        <!-- /articleList -->
        <!-- moreBtn -->
        <div class="l-moreBtn u-right">
            <button class="c-moreBtn three u-center">more</button>
        </div>
        <!-- /moreBtn -->

    </section>
    <!-- /3 -->

</main>
<?php get_footer(); ?>
