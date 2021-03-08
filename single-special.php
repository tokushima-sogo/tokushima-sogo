<?php get_header(); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/single-special.css">

<main class="l-main">

    <!-- breadCrumb -->
    <div class="p-breadCrumb">
        <div class="p-breadCrumb__inner">
            <!-- breadcrumbループstart -->
            <span>トップ</span>
            <i class="fas fa-angle-right"></i>
            <span>エリア名</span>
            <i class="fas fa-angle-right"></i> <span>カテゴリ</span>
            <i class="fas fa-angle-right"></i> <span>記事タイトル</span>
            <!-- breadcrumbループend -->
        </div>
    </div>
    <!-- /breadCrumb -->

    <!-- 投稿記事の出力 -->
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>

            <!-- タイトル -->
            <?php the_title(); ?>

            <section class="l-description">
                <div class="p-description u-center">
                    <!-- 特集一覧のバナー -->
                    <div class="c-specialBanner"><img src="./assets/images/bn_archive_special_ramen.png" alt="ラーメン特集"></div>
                    <div class="p-description__item">
                        <!-- 特集一覧のテキスト(概要？) -->
                        <p class="c-description__text">
                            徳島ラーメンと言えば！な、茶系×生卵な王道徳島ラーメンから、飲んだ後にもう一杯！汁まで飲み干せるあっさり〆のラーメンまで。みんな大好きラーメン特集！</p>
                    </div>
                </div>
            </section>
            <!-- /description -->

            <!-- 本文 -->
            <?php the_content(); ?>

            <!-- article -->
            <section class="l-article">
                <!-- ここから記事内容(投稿者の自由に) -->
                <div class="c-img"><img src="./assets/images/takenoko1.jpg" alt=""></div>
                <p class="c-text u-3times">いろいろ書きながら<span class="u-marker">ここをこう</span></p>
                <p class="c-text u-bold">どんな感じかしらん</p>
                <!-- 記事内容ここまで -->
            </section>
            <!-- /article -->

            <!-- タグを持ってくる -->
            <?php
            echo get_the_term_list($post->ID, 'taxotag', 'タグ:', '|');
            ?>

        <?php endwhile; ?>
    <?php endif; ?>

</main>
<!-- /main -->

<?php get_footer(); ?>
