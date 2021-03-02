<!-- 【引継ぎ事項】
１,クラス名は適当，命名ルールに合わせて直す必要あり。
２,スポットの写真表示の部分は仮です。jQueryのslickで書き直してください。
４,cssは作っていない。
５,wpulinkのショートコードは埋め込んでいない。 -->

<!-- ヘッダーの読み込み -->
<?php get_header(); ?>
<!-- spot用のCSSの読み込み CSS名は仮です-->
<!-- <link href="<?php echo get_template_directory_uri(); ?>/assets/css/single-spot.css" rel="stylesheet" meida="all"> -->

<main>
    <p>文字</p>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <h3><?php the_title(); ?></h3>
            <?php the_content(); ?>

            <!-- カスタムフィールドの住所 -->
            <?php the_field('spot_address'); ?>

            <!-- カスタムフィールドでsnsを表示 -->
            <?php $facebook = get_field('spot_facebook'); ?>
            <?php $instagram = get_field('spot_instagram'); ?>
            <?php $twitter = get_field('spot_twitter'); ?>

            <?php if ($facebook) : ?>
                <a href="<?php the_field('spot_facebook'); ?>"><i class="fab fa-facebook-square"></i></a>
            <?php endif; ?>
            <?php if ($instagram) : ?>
                <a href="<?php the_field('spot_instagram'); ?>"><i class="fab fa-instagram-square"></i></a>
            <?php endif; ?>
            <?php if ($twitter) : ?>
                <a href="<?php the_field('spot_twitter'); ?>"><i class="fab fa-twitter-square"></i></a>
            <?php endif; ?>

            <!-- <?php if (get_field('spot_instagram')) : ?>
                <a href="<?php the_field('spot_instagram'); ?>"><i class="fab fa-instagram-square"></i></a>
            <?php endif; ?>
            <?php if (get_field('spot_facebook')) : ?>
                <a href="<?php the_field('spot_facebook'); ?>"><i class="fab fa-facebook-square"></i></a>
            <?php endif; ?>
            <?php if (get_field('spot_twitter')) : ?>
                <a href="<?php the_field('spot_twitter'); ?>"><i class="fab fa-twitter-square"></i></a>
            <?php endif; ?> -->

            <p>カスタムタクソノミー</p>
            <?php the_taxonomies(); ?>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>

    <section>
        <h2>関連記事</h2>
        ​
        <!-- サブループ設定 -->

        <!-- 表示されている記事の投稿タイプでターム記事をランダムで表示するループ -->
        <!-- 【https://cotodama.co/get_posts_sub_loop/#i-8】 -->
        <?php
        global $post;
        $post_id = $post->ID;                           //投稿記事を取得する。
        $post_type = get_post_type($post_id);           //投稿タイプを取得
        $taxonomy = 'area';                             //タクソノミーを指定
        $terms = get_the_terms($post_id, $taxonomy);     //タームデータを取得する。
        $term_slug =  $terms[0]->slug;                   //タームを指定する。

        $args =
            array(
                'post_type'      => $post_type,          //カスタム投稿タイプ名
                'posts_per_page' => 3,                   // 取得する投稿数
                'orderby'        => 'rand',              //ランダムで表示
                'exclude'        => $post_id,            // 表示中の投稿を除外

                'tax_query' => array(
                    array(
                        'taxonomy' => $taxonomy,        // タクソノミースラッグを指定
                        'field' => 'slug',              // termsで使用する種類指定。'term_id','name','slug'
                        'terms' => $term_slug,          // タームスラッグを指定
                    ),
                )

            );
        $spot_query = new WP_Query($args);

        if ($spot_query->have_posts()) :
            while ($spot_query->have_posts()) : $spot_query->the_post();
        ?>
                <!-- サムネイル部分 -->
                <div class="pic">
                    <a href="<?php the_permalink(); ?>">
                        <!-- サムネイルがあれば表示する
                            サムネイルじゃなくてカスタム投稿の写真の表示方法？教科書ｐ205-->
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium') ?>
                            <!-- なければ，NO＿IMAGEを表示 -->
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                        <?php endif; ?>
                    </a>
                </div>
                ​
                <!-- ターム表示といいね -->
                <div class="flex">

                    <!-- タクソノミースラッグ（ターム）の表示 -->
                    <div class="term">
                        <?php echo $term_slug; ?>
                    </div>

                    <!-- カスタム投稿タイプのスラッグ表示 get_post_typeの方？-->
                    <div class="slug">
                        <!-- タクソノミー(area)のターム -->
                        <?php echo $post_type; ?>
                    </div>
                    <!-- wpulikeのショートコード 記入場所-->
                </div>
                ​
                <!-- 抜粋 -->
                <div>
                    <?php the_excerpt(); ?>
                </div>
    </section>

    <?php wp_reset_postdata(); //$postをグローバル変数に戻す
    ?>
<?php endwhile; ?>
<?php endif; ?>
​

</main>

<?php get_footer(); ?>
