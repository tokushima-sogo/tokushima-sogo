<?php get_header(); ?>
<<<<<<< HEAD

<main>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) :  the_post(); ?>
            <!-- 記事タイトル -->
            <?php the_title(); ?>
            <!-- 本文 -->
            <?php the_content(); ?>
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
    <!-- 特集ページの詳細single-special.php -->

</main>
=======
<h1>特集一覧</h1>
<p>本文</p>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) :  the_post(); ?>
        <a href="<?php the_permalink(); ?>">
            <!-- タイトル -->
            <h3><?php the_title(); ?></h3>
            <!-- サムネイル部分 -->
            <div class="pic">
                <!-- サムネイルがあれば表示する-->
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
>>>>>>> 3f4476d796f472e749fa6d16ca65a350622c08f9

<?php get_footer(); ?>
