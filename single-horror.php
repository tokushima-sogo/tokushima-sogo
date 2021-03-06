<?php get_header(); ?>

<main>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>

            <!-- カスタムフィールドの値を取得 -->
            <?php
            $picture = get_field('horror_pic');
            $address = get_field('horror_address');
            ?>

            <?php the_title(); ?>
            <?php the_content(); ?>

            <!-- カスタムフィールド写真 -->
            <?php if ($picture) : ?>
                <?php echo '<img src=" ' . $picture . '">'; ?>
            <?php endif; ?>

            <!-- カスタムフィールド住所 -->
            <?php if ($address) : ?>
                <?php echo $address; ?>
            <?php endif; ?>

            <!-- いいねぼたん -->
            <?php echo do_shortcode('[wp_ulike]'); ?>

            <!-- タグを持ってくる -->
            <?php the_taxonomies(); ?>

        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
