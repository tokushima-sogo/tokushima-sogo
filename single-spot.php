<!-- 【引継ぎ事項】
１,クラス名は適当，命名ルールに合わせて直す必要あり。
２,スポットの写真表示の部分は仮です。jQueryのslickで書き直してください。
４,cssは作っていない。
 -->

<!-- ヘッダーの読み込み -->
<?php get_header(); ?>

<main>

    <!-- パンくずリスト -->


    <!-- 投稿記事の出力 -->
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>

            <!-- カスタムフィールドの値を取得 -->
            <?php
            $spotname  = get_field('spot_name');
            $picture1  = get_field('spot_pic1');
            $picture2  = get_field('spot_pic2');
            $picture3  = get_field('spot_pic3');
            $address   = get_field('spot_address');
            $tel       = get_field('spot_tel');
            $opentime  = get_field('spot_open_time');
            $closetime = get_field('spot_close');
            $url       = get_field('spot_url');
            $facebook  = get_field('spot_facebook');
            $instagram = get_field('spot_instagram');
            $twitter   = get_field('spot_twitter');
            $remarks1  = get_field('spot_remarks1');
            $remarks2  = get_field('spot_remarks2');
            $remarks3  = get_field('spot_remarks3');
            $remarks4  = get_field('spot_remarks4');
            $remarks5  = get_field('spot_remarks5');
            ?>

            <!-- タイトル -->
            <?php the_title(); ?>

            <!-- 本文 -->
            <?php the_content(); ?>

            <!-- スポットの名称 -->
            <?php if ($spotname) : ?>
                <?php echo $spotname; ?>
            <?php endif; ?>

            <!-- 緯度経度 -->
            <?php
            get_field('spot_lat');
            get_field('spot_lag');
            ?>

            <!-- カスタムフィールド写真 -->
            <?php if ($picture1) : ?>
                <?php echo '<img src=" ' . $picture1 . '">'; ?>
            <?php endif; ?>

            <?php if ($picture2) : ?>
                <?php echo '<img src=" ' . $picture2 . '">'; ?>
            <?php endif; ?>

            <?php if ($picture3) : ?>
                <?php echo '<img src=" ' . $picture3 . '">'; ?>
            <?php endif; ?>

            <!-- カスタムフィールド住所 -->
            <?php if ($address) : ?>
                <?php echo $address; ?>
            <?php endif; ?>

            <!-- カスタムフィールド電話 -->
            <?php if ($tel) : ?>
                <?php echo $tel; ?>
            <?php endif; ?>

            <!-- カスタムフィールド営業時間 -->
            <?php if ($opentime) : ?>
                <?php echo $opentime; ?>
            <?php endif; ?>

            <!-- カスタムフィールド定休日 -->
            <?php if ($closetime) : ?>
                <?php echo $closetime; ?>
            <?php endif; ?>

            <!-- カスタムフィールドURL -->
            <?php if ($url) : ?>
                <?php echo $url; ?>
            <?php endif; ?>

            <!-- カスタムフィールドsns -->
            <?php if ($facebook) : ?>
                <a href="<?php echo $facebook; ?>"><i class="fab fa-facebook-square"></i></a>
            <?php endif; ?>

            <?php if ($instagram) : ?>
                <a href="<?php echo $instagram; ?>"><i class="fab fa-instagram-square"></i></a>
            <?php endif; ?>

            <?php if ($twitter) : ?>
                <a href="<?php echo $twitter; ?>"><i class="fab fa-twitter-square"></i></a>
            <?php endif; ?>

            <!-- カスタムフィールド備考 -->
            <?php if ($remarks1) : ?>
                <?php echo $remarks1; ?>
            <?php endif; ?>

            <?php if ($remarks2) : ?>
                <?php echo $remarks2; ?>
            <?php endif; ?>

            <?php if ($remarks3) : ?>
                <?php echo $remarks3; ?>
            <?php endif; ?>

            <?php if ($remarks4) : ?>
                <?php echo $remarks4; ?>
            <?php endif; ?>

            <?php if ($remarks5) : ?>
                <?php echo $remarks5; ?>
            <?php endif; ?>

            <!-- いいねぼたん -->
            <?php echo do_shortcode('[wp_ulike]'); ?>

            <!-- いいねボタン -->
            <?php if (function_exists('the_ratings')) {
                the_ratings();
            }
            ?>

            <!-- タグを持ってくる -->
            <?php
            echo get_the_term_list($post->ID, 'taxotag', 'タグ:', '|');
            ?>
            <!-- タグを持ってくる -->
            <!-- <?php the_taxonomies(); ?> -->

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
            'post_type'        => $post_type,         //カスタム投稿タイプ名
            'posts_per_page'   => 3,                  // 取得する投稿数
            'orderby'          => 'rand',             //ランダムで表示
            'exclude'          => $post_id,           // 表示中の投稿を除外
            'tax_query'        => array(
                array(
                    'taxonomy' => $taxonomy,          // タクソノミースラッグを指定
                    'field'    => 'slug',             // termsで使用する種類指定
                    'terms'    => $term_slug,         // タームスラッグを指定
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

</main>

<?php get_footer(); ?>
