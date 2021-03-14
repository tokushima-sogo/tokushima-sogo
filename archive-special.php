<?php get_header(); ?>

<main class="l-main">

    <!-- breadCrumb-->
    <div class="p-breadCrumb">
        <div class="p-breadCrumb__inner">
            <a href="<?php echo home_url(); ?>"><span>トップ</span></a>
            <i class="fas fa-angle-right"></i>
            <span>特集一覧</span>
        </div>
    </div>
    <!-- breadCrumb -->

    <!-- description -->
    <section class="l-description">
        <h2 class="c-heroImg"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/mv_archive_special_web.png" alt="特集一覧"></h2>
        <div class="p-description">
            <div class="p-description__item">
                <p class="c-description__text">
                    最強ご当地ラーメン！徳島ラーメン特集から、専門店ならではのこだわりグルメ！地元民もまだ知らない面白珍スポットなどなど。この特集を読めば、行きたくなること間違いなし！！
                </p>
            </div>
        </div>
    </section>
    <!-- description -->

    <!-- specialArticle -->
    <section class="l-specialArticle u-flex">
        <!-- メインループ開始 -->
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : ?>
                <?php the_post(); ?>
                <!-- specialArticle -->
                <article class="p-specialArticle">
                    <a href="<?php the_permalink(); ?>">
                        <!-- thumbnail -->
                        <div class="c-specialBanner">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium') ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="画像がありません">
                            <?php endif; ?>
                        </div>
                    </a>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
    <!-- specialArticle -->

</main>

<?php get_footer(); ?>
