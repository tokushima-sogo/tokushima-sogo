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
    $the_query = new WP_Query($args); ?>
    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : ?>
            <?php $the_query->the_post(); ?>
            <?php the_title(); ?>
            <?php the_content(); ?>
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium') ?>
                    <!-- なければ，NO＿IMAGEを表示 -->
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                <?php endif; ?>
                個別ページへ
            </a>
            <?php echo do_shortcode('[wp_ulike]'); ?>
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
    $the_query = new WP_Query($args); ?>
    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : ?>
            <?php $the_query->the_post(); ?>
            <?php the_title(); ?>
            <?php the_content(); ?>
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium') ?>
                    <!-- なければ，NO＿IMAGEを表示 -->
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                <?php endif; ?>
                個別ページへ
            </a>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>

    <!-- 市内のお土産single-shop.php -->
    <?php
    $args = array(
        'post_type' => 'shop',

        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'area',
                'field' => 'slug',
                'terms' => 'city',
            ),
        ),
    );
    $the_query = new WP_Query($args); ?>
    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : ?>
            <?php $the_query->the_post(); ?>
            <?php the_title(); ?>
            <?php the_content(); ?>
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium') ?>
                    <!-- なければ，NO＿IMAGEを表示 -->
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                <?php endif; ?>
                個別ページへ
            </a>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
