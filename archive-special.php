<?php get_header(); ?>

<main>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) :  the_post(); ?>
            <a href="<?php the_permalink(); ?>">
                <!-- タイトル -->
                <h3><?php the_title(); ?></h3>
                <!-- サムネイル部分 -->
                <div class="pic">
                    <!-- サムネイルがあれば表示する
                            サムネイルじゃなくてカスタム投稿の写真の表示方法？教科書ｐ205-->
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('medium') ?>
                        <!-- なければ，NO＿IMAGEを表示 -->
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                    <?php endif; ?>
                </div>
                <!-- 本文抜粋 -->
                <p><?php the_excerpt(); ?></p>
            </a>
        <?php endwhile; ?>
    <?php endif; ?>



    <!-- ループ内 -->
    <a href="<?php the_permalink(); ?>">ループ内</a>

    <!-- ループ外 -->
    <a href="<?php echo get_permalink(); ?>">ループ外</a>

    <!-- 特集ページの詳細single-special.php -->

</main>

<?php get_footer(); ?>
