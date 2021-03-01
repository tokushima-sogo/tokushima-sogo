<?php get_header(); ?>

<main>

    <!-- ループ内 -->
    <a href="<?php the_permalink(); ?>">ループ内</a>

    <!-- ループ外 -->
    <a href="<?php echo get_permalink(); ?>">ループ外</a>

    <!-- 東部の観光スポットsingle-spot.php -->


    <!-- 東部のグルメsingle-gourmet.php -->


    <!-- 東部のお土産single-souvenir.php -->

    <!-- キーヴィジュアル -->
    <!-- エリア説明 -->
    <!-- スポットのサブクエリ -->
    <?php
    $args = array(
        'post_type' => 'spot',
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'area',
                'field' => 'slug',
                'terms' => 'east',
            ),
        ),
    );
    $the_query = new WP_Query($args); ?>
    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : ?>
            <?php $the_query->the_post(); ?>
            <?php the_title(); ?>
            <?php the_content(); ?>
            <a href="<?php the_permalink(); ?>">個別ページへ</a>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    <!-- グルメのサブクエリ -->
    <?php
    $args = array(
        'post_type' => 'gourmet',
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'area',
                'field' => 'slug',
                'terms' => 'east',
            ),
        ),
    );
    $the_query = new WP_Query($args); ?>
    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : ?>
            <?php $the_query->the_post(); ?>
            <?php the_title(); ?>
            <?php the_content(); ?>
            <a href="<?php the_permalink(); ?>">個別ページへ</a>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    <!-- ショップのサブクエリ -->
    <?php
    $args = array(
        'post_type' => 'souvenir',
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'area',
                'field' => 'slug',
                'terms' => 'east',
            ),
        ),
    );
    $the_query = new WP_Query($args); ?>
    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : ?>
            <?php $the_query->the_post(); ?>
            <?php the_title(); ?>
            <?php the_content(); ?>
            <a href="<?php the_permalink(); ?>">個別ページへ</a>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
