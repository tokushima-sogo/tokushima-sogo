<!-- 引継ぎ事項
1,このデータは仮データー。このページのwordpress化してる部分をコーダーの作ったデータに割り当てて使ってください。
2,画像ファイルパスはあたっていない。
3,home_urlもリンク先を書いてください。 -->

<?php get_header(); ?>

<h1>特集一覧</h1>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : ?>
        <?php the_post(); ?>

        <a href="<?php the_permalink(); ?>">

            <?php the_title(); ?>

            <!-- サムネイルの表示 -->
            <div class="pic">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium') ?>
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                <?php endif; ?>
            </div>

        </a>

        <!-- コンテンツ文章の抜粋 -->
        <?php the_excerpt(); ?>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
