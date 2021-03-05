<!-- 【引継ぎ事項】
１,クラス名は適当，命名ルールに合わせて直す必要あり。
２,cssは作っていない。
３,wpulinkのショートコードは埋め込んでいない。
４，タグ検索ができない！小川さん助けて！！
-->

<?php get_header(); ?>

<main>
    <h1>徳島の名物</h1>
    <p>紹介文</p><br><br>

    <section>
        <h2>お菓子</h2>​

        <!-- お菓子の記事を出力するループ -->
        <?php
        $args = array(
            'post_type'         => 'famous',  // カスタム投稿タイプ名
            'orderby'           => 'modified', // 更新日で表示
            'tax_query'         => array(
                'relation'      => 'AND',
                array(
                    'taxonomy'  => 'taxotag', // タクソノミースラッグを指定
                    'field'     => 'slug',    // termsで使用する種類指定
                    'terms'     => 'snack',   // タームスラッグを指定
                ),
            ),
        );
        ?>
        <?php $the_query = new WP_Query($args); ?>
        <?php if ($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) : ?>
                <?php $the_query->the_post(); ?>

                <!-- サムネイルの表示 -->
                <div class="pic">
                    <a href="<?php the_permalink(); ?>">

                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium') ?>
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
                        $slug_name = get_query_var('taxotag');
                        $term = get_term_by('slug', '$slug_name', 'taxotag'); ?>
                        <?php echo $term->name; ?>

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
                <!-- コンテンツ文章の抜粋 -->
                <?php the_excerpt(); ?>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>​
    </section>


    <section>
        <h2>おかず</h2>​

        <!-- おかずの記事を出力するループ -->
        <?php
        $args = array(
            'post_type'        => 'famous',    // カスタム投稿タイプ名
            'orderby'          => 'modified',  // 更新日で表示
            'tax_query'        => array(
                'relation'     => 'AND',
                array(
                    'taxonomy' => 'taxotag',   // タクソノミースラッグを指定
                    'field'    => 'slug',      // termsで使用する種類指定
                    'terms'    => 'meal',      // タームスラッグを指定
                ),
            ),
        );
        ?>
        <?php $the_query = new WP_Query($args); ?>
        <?php if ($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) : ?>
                <?php $the_query->the_post(); ?>

                <!-- サムネイルの表示 -->
                <div class="pic">
                    <a href="<?php the_permalink(); ?>">

                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium') ?>
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
                <!-- コンテンツ文章の抜粋 -->
                <?php the_excerpt(); ?>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); //$postをグローバル変数に戻す
            ?>
            <?php endif; ?>​
    </section>



    <section>
        <h2>お酒</h2>
        ​
        <!-- お酒の記事を出力するループ -->
        <?php
        $args = array(
            'post_type'         => 'famous',    // カスタム投稿タイプ名
            'orderby'           => 'modified',  // 更新日で表示
            'tax_query'         => array(
                'relation'      => 'AND',
                array(
                    'taxonomy'  => 'taxotag',   // タクソノミースラッグを指定
                    'field'     => 'slug',      // termsで使用する種類指定
                    'terms'     => 'alcohol',   // タームスラッグを指定
                ),
            ),
        );
        ?>
        <?php $the_query = new WP_Query($args); ?>
        <?php if ($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) : ?>
                <?php $the_query->the_post(); ?>

                <!-- サムネイルの表示 -->
                <div class="pic">
                    <a href="<?php the_permalink(); ?>">

                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium') ?>
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
                <!-- コンテンツ文章の抜粋 -->
                <?php the_excerpt(); ?>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>​
    </section>

</main>
<?php get_footer(); ?>
