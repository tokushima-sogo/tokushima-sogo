<?php get_header(); ?>

<main>
    <h2>タクソノミー検索</h2>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>

            <!-- タイトルの表示 -->
            <?php the_title(); ?>

            <!-- コンテンツを出力 -->
            <?php the_content(); ?>

            <a href="<?php the_permalink(); ?>">個別ページへ</a>

            <p>カスタムタクソノミー</p>
            <?php the_taxonomies(); ?>

        <?php endwhile; ?>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
