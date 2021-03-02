<?php get_header(); ?>
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

<?php get_footer(); ?>
