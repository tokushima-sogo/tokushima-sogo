<?php get_header(); ?>

<main>
    <h2>タグ検索</h2>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <h3><?php the_title(); ?></h3>
            <?php the_content(); ?>
            <a href="<?php the_permalink(); ?>">個別ページへ</a>
            <p>カテゴリー</p>
            <?php the_category(); ?>
            <p>タグ</p>
            <?php the_tags(); ?>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
