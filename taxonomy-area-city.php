<?php get_header(); ?>

<main>

    <!-- パンくずリスト -->


    <!-- 市内の観光スポット記事を出力 -->
    <?php
    $args = array(
        'post_type'         => 'spot',      // カスタム投稿タイプ名
        'orderby'           => 'modified',  // 更新日で表示
        'tax_query'         => array(
            'relation'      => 'AND',
            array(
                'taxonomy'  => 'area',      // タクソノミースラッグを指定
                'field'     => 'slug',      // termsで使用する種類指定
                'terms'     => 'city',      // タームスラッグを指定
            ),
        ),
    );
    ?>
    <?php $the_query = new WP_Query($args); ?>
    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : ?>
            <?php $the_query->the_post(); ?>

            <!-- タイトルを出力 -->
            <?php the_title(); ?>

            <!-- サムネイルの表示 -->
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium') ?>
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                <?php endif; ?>
                個別ページへ
            </a>

            <!-- コンテンツの抜粋 -->
            <?php the_excerpt(); ?>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>

    <!-- 市内のグルメ記事を出力 -->
    <?php
    $args = array(
        'post_type'         => 'gourmet',   // カスタム投稿タイプ名
        'orderby'           => 'modified',  // 更新日で表示
        'tax_query'         => array(
            'relation'      => 'AND',
            array(
                'taxonomy'  => 'area',      // タクソノミースラッグを指定
                'field'     => 'slug',      // termsで使用する種類指定
                'terms'     => 'city',      // タームスラッグを指定
            ),
        ),
    );
    ?>
    <?php $the_query = new WP_Query($args); ?>
    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : ?>
            <?php $the_query->the_post(); ?>

            <!-- タイトルの表示 -->
            <?php the_title(); ?>

            <!-- サムネイルの表示 -->
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium') ?>
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                <?php endif; ?>
                個別ページへ
            </a>

            <!-- コンテンツの抜粋 -->
            <?php the_excerpt(); ?>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>

    <!-- 市内のお土産記事を出力 -->
    <?php
    $args = array(
        'post_type'         => 'shop',      // カスタム投稿タイプ名
        'orderby'           => 'modified',  // 更新日で表示
        'tax_query'         => array(
            'relation'      => 'AND',
            array(
                'taxonomy'  => 'area',      // タクソノミースラッグを指定
                'field'     => 'slug',      // termsで使用する種類指定
                'terms'     => 'city',      // タームスラッグを指定
            ),
        ),
    );
    ?>
    <?php $the_query = new WP_Query($args); ?>
    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : ?>
            <?php $the_query->the_post(); ?>

            <!-- タイトルの表示 -->
            <?php the_title(); ?>

            <!-- サムネイルの表示 -->
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium') ?>
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                <?php endif; ?>
                個別ページへ
            </a>

            <!-- コンテンツの抜粋 -->
            <?php the_excerpt(); ?>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
