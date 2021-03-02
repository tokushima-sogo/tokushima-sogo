<!-- 【引継ぎ事項】
１,クラス名は適当，命名ルールに合わせて直す必要あり。
２,cssは作っていない。
３,wpulinkのショートコードは埋め込んでいない。
４,サブループは仮。井上さんにタクソノミーやタームどうするか確認する。

-->


<!-- ヘッダーの読み込み -->
<?php get_header(); ?>
<!-- spot用のCSSの読み込み CSS名は仮です-->
<!-- <link href="<?php echo get_template_directory_uri(); ?>/assets/css/single-spot.css" rel="stylesheet" meida="all"> -->

<main>
    <h1>徳島の都市伝説</h1>
    <p>紹介文</p>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <h3><?php the_title(); ?></h3>
            <?php the_content(); ?>
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
        $terms = get_the_terms($post_id, $taxonomy);     //タームデータを取得する。
        $term_slug =  $terms[0]->slug;                   //タームを指定する。

        $args =
            array(
                'post_type'      => 'horror',          //カスタム投稿タイプ名
                'posts_per_page' => 3,                   // 取得する投稿数
                'orderby'        => 'modified',              //更新日で表示

                'tax_query' => array(
                    array(
                        'taxonomy' => 'history',        // タクソノミースラッグを指定
                        'field' => 'slug',              // termsで使用する種類指定。'term_id','name','slug'
                        'terms' => $term_slug,          // タームスラッグを指定
                    ),
                )

            );
        $history_query = new WP_Query($args);

        if ($history_query->have_posts()) :
            while ($history_query->have_posts()) : $history_query->the_post();
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

                    <!-- カスタム投稿タイプのスラッグ表示 ダメならhttps://www.nxworld.net/wp-get-current-post-type.htmlで-->
                    <div class="slug">
                        <!-- タクソノミー(area)のターム -->
                        <?php echo get_post_type(); ?>
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



<!-- サブループ設定２ -->

<!-- 表示されている記事の投稿タイプでターム記事をランダムで表示するループ -->
<!-- 【https://cotodama.co/get_posts_sub_loop/#i-8】 -->
<?php
$terms = get_the_terms($post_id, $taxonomy);     //タームデータを取得する。
$term_slug =  $terms[1]->slug;                   //タームを指定する。

$args =
    array(
        'post_type'      => 'horror',          //カスタム投稿タイプ名
        'posts_per_page' => 3,                   // 取得する投稿数
        'orderby'        => 'modified',              //更新日で表示

        'tax_query' => array(
            array(
                'taxonomy' => 'goast',        // タクソノミースラッグを指定
                'field' => 'slug',              // termsで使用する種類指定。'term_id','name','slug'
                'terms' => $term_slug,          // タームスラッグを指定
            ),
        )

    );
$goast_query = new WP_Query($args);

if ($goast_query->have_posts()) :
    while ($goast_query->have_posts()) : $goast_query->the_post();
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

            <!-- カスタム投稿タイプのスラッグ表示 ダメならhttps://www.nxworld.net/wp-get-current-post-type.htmlで-->
            <div class="slug">
                <!-- タクソノミー(area)のターム -->
                <?php echo get_post_type(); ?>
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
</main>

<?php get_footer(); ?>
