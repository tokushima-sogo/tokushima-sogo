<?php get_header(); ?>

<main>

    <!-- ループ内 -->
    <a href="<?php the_permalink(); ?>">ループ内</a>

    <!-- ループ外 -->
    <a href="<?php echo get_permalink(); ?>">ループ外</a>

    <!-- 都市伝説の詳細single-horror.php -->

</main>

<?php get_footer(); ?>
