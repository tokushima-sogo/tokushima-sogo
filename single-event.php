<?php get_header(); ?>

<main>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <!-- タイトル -->
            <h1><?php the_title(); ?></h1>
            <!-- 本文 -->
            <?php echo do_shortcode('[wp_ulike]'); ?>


            <p><?php the_content(); ?></p>
            <div class="pic">
                <!-- サムネイルがあれば表示する-->
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium') ?>
                    <!-- なければ，NO＿IMAGEを表示 -->
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
