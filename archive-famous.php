<?php get_header(); ?>


<!-- 【引継ぎ事項】
１,クラス名は適当，命名ルールに合わせて直す必要あり。
２,cssは作っていない。
３,wpulinkのショートコードは埋め込んでいない。
４，タグ検索ができない！小川さん助けて！！
-->


<!-- ヘッダーの読み込み -->
<?php get_header(); ?>
<!-- spot用のCSSの読み込み CSS名は仮です-->
<!-- <link href="<?php echo get_template_directory_uri(); ?>/assets/css/single-spot.css" rel="stylesheet" meida="all"> -->

<main>
    <h1>徳島の名物</h1>
    <p>紹介文</p><br><br>

    <section>
        <h2>お菓子</h2>​
        <!-- サブループ設定 -->
        <!-- 表示されている記事の投稿タイプでターム記事を更新日で表示するループ -->
        <!-- 【https://cotodama.co/get_posts_sub_loop/#i-8】 -->
        <?php
        // $args =
        //     array(
        //         'post_type'      => 'famous',          //カスタム投稿タイプ名
        //         'posts_per_page' => 3,                   // 取得する投稿数
        //         'orderby'        => "post_modified",              //更新日で表示
        //         'taxonomy' => 'snack',        // タクソノミースラッグを指定
        //     );
        $args = array(
            'post_type' => 'famous',
            'posts_per_page' => 3,
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'taxotag',
                    'field' => 'slug',
                    'terms' => 'snack',
                ),
            ),
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
                    <?php the_tags(); ?>
                    <!-- タグの表示 -->
                    <div class="term">


                        <!-- タグ検索できない -->
                        <?php
                        echo $term_slug;
                        $tags = get_the_tags();
                        if (!empty($tags)) {
                            $echoTag = '';
                            $separator = '<span> ♯ </span>';
                        } else {
                            echo "タグがありません";
                        }
                        foreach ($tags as $tag) {
                            echo $tag->name;
                            $echoTag .= $separator . '<span>' . $tag->name . '</span>';
                        }
                        //$echoTag = rtrim($html, $separator);
                        echo $echoTag; ?>

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



            <?php endwhile; ?>
            <?php wp_reset_postdata(); //$postをグローバル変数に戻す
            ?>
            <?php endif; ?>​
    </section>


    <section>
        <h2>おかず</h2>​
        <!-- サブループ設定 -->
        <!-- 表示されている記事の投稿タイプでターム記事を更新日で表示するループ -->
        <!-- 【https://cotodama.co/get_posts_sub_loop/#i-8】 -->
        <?php
        // $args =
        //     array(
        //         'post_type'      => 'famous',          //カスタム投稿タイプ名
        //         'posts_per_page' => 3,                   // 取得する投稿数
        //         'orderby'        => "post_modified",              //更新日で表示
        //         'taxonomy' => 'meal',        // タクソノミースラッグを指定
        //     );
        $args = array(
            'post_type' => 'famous',
            'posts_per_page' => 3,
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'taxotag',
                    'field' => 'slug',
                    'terms' => 'meal',
                ),
            ),
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
                    <?php the_tags(); ?>
                    <!-- タグの表示 -->
                    <div class="term">


                        <!-- タグ検索できない -->
                        <?php
                        echo $term_slug;
                        $tags = get_the_tags();
                        if (!empty($tags)) {
                            $echoTag = '';
                            $separator = '<span> ♯ </span>';
                        } else {
                            echo "タグがありません";
                        }
                        foreach ($tags as $tag) {
                            echo $tag->name;
                            $echoTag .= $separator . '<span>' . $tag->name . '</span>';
                        }
                        //$echoTag = rtrim($html, $separator);
                        echo $echoTag; ?>

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



            <?php endwhile; ?>
            <?php wp_reset_postdata(); //$postをグローバル変数に戻す
            ?>
            <?php endif; ?>​
    </section>



    <section>
        <h2>お酒</h2>​
        <!-- サブループ設定 -->
        <!-- 表示されている記事の投稿タイプでターム記事を更新日で表示するループ -->
        <!-- 【https://cotodama.co/get_posts_sub_loop/#i-8】 -->
        <?php
        // $args =
        //     array(
        //         'post_type'      => 'famous',          //カスタム投稿タイプ名
        //         'posts_per_page' => 3,                   // 取得する投稿数
        //         'orderby'        => "post_modified",              //更新日で表示
        //         'taxonomy' => 'alcohol',        // タクソノミースラッグを指定
        //     );
        $args = array(
            'post_type' => 'famous',
            'posts_per_page' => 3,
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'taxotag',
                    'field' => 'slug',
                    'terms' => 'alcohol',
                ),
            ),
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
                    <?php the_tags(); ?>
                    <!-- タグの表示 -->
                    <div class="term">


                        <!-- タグ検索できない -->
                        <?php
                        echo $term_slug;
                        $tags = get_the_tags();
                        if (!empty($tags)) {
                            $echoTag = '';
                            $separator = '<span> ♯ </span>';
                        } else {
                            echo "タグがありません";
                        }
                        foreach ($tags as $tag) {
                            echo $tag->name;
                            $echoTag .= $separator . '<span>' . $tag->name . '</span>';
                        }
                        //$echoTag = rtrim($html, $separator);
                        echo $echoTag; ?>

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



            <?php endwhile; ?>
            <?php wp_reset_postdata(); //$postをグローバル変数に戻す
            ?>
            <?php endif; ?>​
    </section>

</main>
<?php get_footer(); ?>
