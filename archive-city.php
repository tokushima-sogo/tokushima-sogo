<?php get_header(); ?>

<main>

    <!-- ループ内 -->
    <a href="<?php the_permalink(); ?>">ループ内</a>

    <!-- ループ外 -->
    <a href="<?php echo get_permalink(); ?>">ループ外</a>

    <!-- 市内の観光スポットsingle-spot.php -->


    <!-- 市内のグルメsingle-gourmet.php -->


    <!-- 市内のお土産single-souvenir.php -->

</main>

<?php get_footer(); ?>
