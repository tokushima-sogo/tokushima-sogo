<?php get_header(); ?>

<main>
    <h2>検索結果</h2>

    <!-- パンくずリスト -->
    <!-- <?php get_template_part('template-parts/breadcrumb'); ?> -->

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>

            <!-- タイトルの表示 -->
            <?php the_title(); ?>

            <!-- サムネイルの表示 -->
            <div class="pic">
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('medium') ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                    <?php endif; ?>
                </a>
            </div>

            <a href="<?php the_permalink(); ?>">個別ページへ</a>


        <?php endwhile; ?>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
