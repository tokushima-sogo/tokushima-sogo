<?php get_header(); ?>

<main class="l-main">

    <!-- singleArticle -->
    <section class="l-singleArticle">
        <!-- breadCrumb -->
        <div class="p-breadCrumb">
            <div class="p-breadCrumb__inner">
                <a href="<?php echo home_url('/'); ?>"><span>トップ</span></a>
                <i class="fas fa-angle-right"></i>
                <a href="<?php echo home_url('/special/'); ?>">
                    <span>
                        特集一覧
                    </span>
                </a>
                <i class="fas fa-angle-right"></i><span><?php echo get_post()->post_title ?></span>
            </div>
        </div>
        <!-- breadCrumb -->

        <!-- 投稿記事の出力 -->
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : ?>
                <?php the_post(); ?>

                <!-- タイトル -->
                <!-- <?php the_title(); ?> -->

                <section class="l-description">
                    <div class="p-description u-center">
                        <!-- 特集一覧のバナー -->
                        <div class="c-specialBanner">
                            <a href="<?php the_permalink(); ?>" class="c-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium') ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="画像がありません">
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>
                </section>

                <!-- article -->
                <section class="l-article u-center">
                    <!-- 本文 -->
                    <?php the_content(); ?>
                </section>

            <?php endwhile; ?>
        <?php endif; ?>
    </section>

</main>

<?php get_footer(); ?>
