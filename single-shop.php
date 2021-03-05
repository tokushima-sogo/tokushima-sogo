<!-- 【引継ぎ事項】
１,クラス名は適当，命名ルールに合わせて直す必要あり。
２,スポットの写真表示の部分は仮です。jQueryのslickで書き直してください。
４,cssは作っていない。
 -->

<?php get_header(); ?>

<main>

    <!-- 投稿記事の出力 -->
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>

            <!-- タイトル -->
            <?php the_title(); ?>

            <!-- 本文 -->
            <?php the_content(); ?>

            <!-- いいねぼたん -->
            <?php echo do_shortcode('[wp_ulike]'); ?>

            <!-- タグを持ってくる -->
            <?php the_taxonomies(); ?>

        <?php endwhile; ?>
    <?php endif; ?>

    <section>
        <h2>関連記事</h2>
        ​
        <!-- 関連記事のサブループ設定 -->
        <!-- 表示されている記事の投稿タイプでターム記事をランダムで表示するループ -->
        <!-- 【https://cotodama.co/get_posts_sub_loop/#i-8】 -->
        <?php
        global $post;
        $post_id = $post->ID;                         //投稿記事を取得する。
        $post_type = get_post_type($post_id);         //投稿タイプを取得
        $taxonomy = 'area';                           //タクソノミーを指定
        $terms = get_the_terms($post_id, $taxonomy);  //タームデータを取得する。
        $term_slug =  $terms[0]->slug;                //タームを指定する。
        ?>
        <?php $args = array(
            'post_type'        => $post_type,     //カスタム投稿タイプ名
            'posts_per_page'   => 3,              // 取得する投稿数
            'orderby'          => 'rand',         //ランダムで表示
            'exclude'          => $post_id,       // 表示中の投稿を除外
            'tax_query'        => array(
                array(
                    'taxonomy' => $taxonomy,      // タクソノミースラッグを指定
                    'field'    => 'slug',         // termsで使用する種類指定
                    'terms'    => $term_slug,     // タームスラッグを指定
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

                    <!-- タクソノミースラッグ（ターム）の表示 -->
                    <div class="term">
                        <?php echo $term_slug; ?>
                    </div>

                    <!-- カスタム投稿タイプのスラッグ表示 get_post_typeの方？-->
                    <div class="slug">
                        <!-- タクソノミー(area)のターム -->
                        <?php echo $post_type; ?>
                    </div>
                </div>
                ​
                <!-- コンテンツ文章の抜粋 -->
                <?php the_excerpt(); ?>
    </section>

<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
​
</main>

<?php get_footer(); ?>
