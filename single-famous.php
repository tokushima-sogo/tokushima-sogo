<?php get_header(); ?>

<main>

    <!-- 投稿記事の出力 -->
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>

            <!-- カスタムフィールドの値を取得 -->
            <?php
            $famousname  = get_field('famous_name');
            $picture1    = get_field('famous_pic1');
            $picture2    = get_field('famous_pic2');
            $makername   = get_field('famous_maker');
            $shop        = get_field('famous_shop');
            $url         = get_field('famous_url');
            $online      = get_field('famous_online');
            $facebook    = get_field('famous_facebook');
            $instagram   = get_field('famous_instagram');
            $twitter     = get_field('famous_twitter');
            ?>

            <!-- タイトル -->
            <?php the_title(); ?>

            <!-- 本文 -->
            <?php the_content(); ?>

            <!-- 名物名称 -->
            <?php if ($famousname) : ?>
                <?php echo $famousname; ?>
            <?php endif; ?>

            <!-- カスタムフィールド写真 -->
            <?php if ($picture1) : ?>
                <?php echo '<img src=" ' . $picture1 . '">'; ?>
            <?php endif; ?>

            <?php if ($picture2) : ?>
                <?php echo '<img src=" ' . $picture2 . '">'; ?>
            <?php endif; ?>

            <!-- カスタムフィールドメーカー名 -->
            <?php if ($makername) : ?>
                <?php echo $makername; ?>
            <?php endif; ?>

            <!-- カスタムフィールド直営店 -->
            <?php if ($shop) : ?>
                <?php echo $shop; ?>
            <?php endif; ?>

            <!-- カスタムフィールドメーカーURL -->
            <?php if ($url) : ?>
                <?php echo $url; ?>
            <?php endif; ?>

            <!-- カスタムフィールドオンラインショップ -->
            <?php if ($online) : ?>
                <?php echo $online; ?>
            <?php endif; ?>

            <!-- カスタムフィールドsns -->
            <?php if ($facebook) : ?>
                <a href="<?php echo $facebook; ?>"><i class="fab fa-facebook-square"></i></a>
            <?php endif; ?>

            <?php if ($instagram) : ?>
                <a href="<?php echo $instagram; ?>"><i class="fab fa-instagram-square"></i></a>
            <?php endif; ?>

            <?php if ($twitter) : ?>
                <a href="<?php echo $twitter; ?>"><i class="fab fa-twitter-square"></i></a>
            <?php endif; ?>

            <!-- いいねぼたん -->
            <?php echo do_shortcode('[wp_ulike]'); ?>

            <!-- タグを持ってくる -->
            <?php
            echo get_the_term_list($post->ID, 'taxotag', 'タグ:', '|');
            ?>

            <!-- タグを持ってくる -->
            <!-- <?php the_taxonomies(); ?> -->
            <!-- サムネイルの表示 -->
            <!-- <div class="pic">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium') ?>
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                <?php endif; ?>
            </div> -->

        <?php endwhile; ?>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
