<?php get_header(); ?>

<main>
    <h2>検索結果</h2>

    <!-- パンくずリスト -->
    <!-- <?php get_template_part('template-parts/breadcrumb'); ?> -->

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>

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

                <!-- moreBtn -->
                <div class="l-moreBtn u-right">
                    <button class="c-moreBtn one u-center u-west">more</button>
                </div>
                <!-- /moreBtn -->


            <?php endwhile; ?>
        <?php endif; ?>

</main>

<?php get_footer(); ?>
