<!-- 【引継ぎ事項】
１,クラス名は適当，命名ルールに合わせて直す必要あり。
２,cssは作っていない。
３,wpulinkのショートコードは埋め込んでいない。
４，タグ検索ができない！小川さん助けて！！
-->

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
                    徳島県内の名物を紹介します。</p>
            </div>
        </div>
    </section>
    <!-- description -->

    <section class="l-articleList">
        <h3 class="c-subHeading u-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tl_archive_event_look.png" alt="展示・見学">
        </h3>​

        <!-- お菓子の記事を出力するループ -->
        <?php
        $args = array(
            'post_type'         => 'famous',  // カスタム投稿タイプ名
            'orderby'           => 'modified', // 更新日で表示
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

                <!-- articleList -->
                <div class="p-articleList u-grid">
                    <!-- article -->
                    <article class="p-article c-more1">
                        <!-- imgArea -->
                        <div class="p-imgArea">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/flame_archive_common_thumbFlame.png" class="c-frame" alt="額縁">
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
                            <div class="p-textContent u-flex">
                                <div class="p-bookmark u-flex">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_archive_common_icon_heart02.png" class="c-icon__heart">
                                    <div class="c-bookmark__text"><span class="c-bookmark__count">10</span>いいね！</div>
                                </div>
                                <div class="p-tag u-flex">
                                    <div class="c-tag u-west u-mr15">
                                        <?php
                                        echo get_the_term_list($post->ID, 'area');
                                        ?>
                                    </div>
                                    <div class="c-tag">
                                        <?php
                                        echo esc_html(get_post_type_object(get_post_type())->label);
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="c-title u-center"><?php the_title(); ?></div>
                        </div>
                        <!-- /textArea -->
                    </article>
                </div>

                <!-- moreBtn -->
                <div class="l-moreBtn u-right">
                    <button class="c-moreBtn one u-center u-west">more</button>
                </div>
                <!-- /moreBtn -->

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>

    </section>
    <!-- /1 -->

    <!-- 2 -->
    <section class="l-articleList">
        <h3 class="c-subHeading u-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tl_archive_event_play.png" alt="体験・レジャー">
        </h3>​

        <!-- おかずの記事を出力するループ -->
        <?php
        $args = array(
            'post_type'        => 'famous',    // カスタム投稿タイプ名
            'orderby'          => 'modified',  // 更新日で表示
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

                <!-- articleList -->
                <div class="p-articleList u-grid">
                    <!-- article -->
                    <article class="p-article c-more3">
                        <!-- imgArea -->
                        <div class="p-imgArea">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/flame_archive_common_thumbFlame.png" class="c-frame" alt="額縁">
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
                            <div class="p-textContent u-flex">
                                <div class="p-bookmark u-flex">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_archive_common_icon_heart02.png" class="c-icon__heart">
                                    <div class="c-bookmark__text"><span class="c-bookmark__count">10</span>いいね！</div>
                                </div>
                                <div class="p-tag u-flex">
                                    <div class="c-tag u-west u-mr15">
                                        <?php
                                        echo get_the_term_list($post->ID, 'area');
                                        ?>
                                    </div>
                                    <div class="c-tag">
                                        <?php
                                        echo esc_html(get_post_type_object(get_post_type())->label);
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="c-title u-center"><?php the_title(); ?></div>
                        </div>
                        <!-- /textArea -->
                    </article>
                    <!-- /article -->
                </div>
                <!-- /articleList -->

                <!-- moreBtn -->
                <div class="l-moreBtn u-right">
                    <button class="c-moreBtn three u-center u-west">more</button>
                </div>
                <!-- /moreBtn -->


            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>​
    </section>


    <!-- 3 -->
    <section class="l-articleList">
        <h3 class="c-subHeading u-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tl_archive_event_festival.png" alt="お祭り">
        </h3>
        ​
        <!-- お酒の記事を出力するループ -->
        <?php
        $args = array(
            'post_type'         => 'famous',    // カスタム投稿タイプ名
            'orderby'           => 'modified',  // 更新日で表示
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


                <!-- articleList -->
                <div class="p-articleList u-grid">
                    <!-- article -->
                    <article class="p-article c-more3">
                        <!-- imgArea -->
                        <div class="p-imgArea">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/flame_archive_common_thumbFlame.png" class="c-frame" alt="額縁">
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
                            <div class="p-textContent u-flex">
                                <div class="p-bookmark u-flex">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_archive_common_icon_heart02.png" class="c-icon__heart">
                                    <div class="c-bookmark__text"><span class="c-bookmark__count">10</span>いいね！</div>
                                </div>
                                <div class="p-tag u-flex">
                                    <div class="c-tag u-west u-mr15">
                                        <?php
                                        echo get_the_term_list($post->ID, 'area');
                                        ?>
                                    </div>
                                    <div class="c-tag">
                                        <?php
                                        echo esc_html(get_post_type_object(get_post_type())->label);
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="c-title u-center"><?php the_title(); ?></div>
                        </div>
                        <!-- /textArea -->
                    </article>
                    <!-- /article -->
                </div>
                <!-- /articleList -->

                <!-- moreBtn -->
                <div class="l-moreBtn u-right">
                    <button class="c-moreBtn three u-center u-west">more</button>
                </div>
                <!-- /moreBtn -->

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>​
    </section>

</main>
<?php get_footer(); ?>
