<?php get_header(); ?>

<main>

    <!-- 市内の観光スポットsingle-spot.php -->
<?php
$args = array(
    'post_type' => 'spot',
    'tax_query' => array(
    'relation' => 'AND',
    array(
        'taxonomy' => 'area',
        'field' => 'slug',
        'terms' => 'city',
        ),
    ),
);
$the_query = new WP_Query($args);?>
<?php if ($the_query->have_posts()): ?>
    <?php while($the_query->have_posts()): ?>
    <?php $the_query->the_post(); ?>
        <?php the_title(); ?>
        <?php the_content(); ?>
        <a href="<?php the_permalink(); ?>">個別ページへ</a>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>

    <!-- 市内のグルメsingle-gourmet.php -->
<?php
$args = array(
    'post_type' => 'gourmet',
    'tax_query' => array(
    'relation' => 'AND',
    array(
        'taxonomy' => 'area',
        'field' => 'slug',
        'terms' => 'city',
        ),
    ),
);
$the_query = new WP_Query($args);?>
<?php if ($the_query->have_posts()): ?>
    <?php while($the_query->have_posts()): ?>
    <?php $the_query->the_post(); ?>
        <?php the_title(); ?>
        <?php the_content(); ?>
        <a href="<?php the_permalink(); ?>">個別ページへ</a>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>

    <!-- 市内のお土産single-souvenir.php -->
<?php
$args = array(
    'post_type' => 'souvenir',
    'tax_query' => array(
    'relation' => 'AND',
    array(
        'taxonomy' => 'area',
        'field' => 'slug',
        'terms' => 'city',
        ),
    ),
);
$the_query = new WP_Query($args);?>
<?php if ($the_query->have_posts()): ?>
    <?php while($the_query->have_posts()): ?>
    <?php $the_query->the_post(); ?>
        <?php the_title(); ?>
        <?php the_content(); ?>
        <a href="<?php the_permalink(); ?>">個別ページへ</a>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>

</main>

<?php get_footer(); ?>
