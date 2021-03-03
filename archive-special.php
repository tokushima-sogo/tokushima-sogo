<<<<<<< HEAD
<!-- 引継ぎ事項
1,このデータは仮データー。このページのwordpress化してる部分をコーダーの作ったデータに割り当てて使ってください。
2,画像ファイルパスはあたっていない。
3,home_urlもリンク先を書いてください。 -->

<?php get_header(); ?>
<h1>特集一覧</h1>
<p>本文</p>

<!-- 特集バナー表示 -->
<div>
    <a href="<?php echo home_url() ?>">
        <h2>徳島ラーメン特集</h2>
        <img src="<?php get_template_directory_uri(); ?>/assets/image/画像ファイルパス">
        <p>特集紹介本文</p>
    </a>
</div>
<div>
    <a href="<?php echo home_url() ?>">
        <h2>専門店</h2>

        <img src="<?php get_template_directory_uri(); ?>/assets/image/画像ファイルパス">
        <p>特集紹介本文</p>
    </a>
</div>
<div>
    <a href="<?php echo home_url() ?>">
        <h2>珍スポット</h2>
        <img src="<?php get_template_directory_uri(); ?>/assets/image/画像ファイルパス">
        <p>特集紹介本文</p>
    </a>
</div>
=======
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
>>>>>>> 017b00a4f71f8d7c32dc3ba1dea8f49ca44487f1

<?php get_footer(); ?>
