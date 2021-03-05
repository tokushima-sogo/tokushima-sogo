<?php get_header(); ?>

<main>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>

            <?php the_title(); ?>
            <?php the_content(); ?>

            <?php the_taxonomies(); ?>

        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
