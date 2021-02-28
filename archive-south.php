<?php get_header(); ?>

<main>

    <!-- ループ内 -->
    <a href="<?php the_permalink(); ?>">ループ内</a>

    <!-- ループ外 -->
    <a href="<?php echo get_permalink(); ?>">ループ外</a>

    <!-- 南部の観光スポットsingle-spot.php -->


    <!-- 南部のグルメsingle-gourmet.php -->


    <!-- 南部のお土産single-souvenir.php -->

</main>

<?php get_footer(); ?>
