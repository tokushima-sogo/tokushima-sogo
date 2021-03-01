<!-- 【引継ぎ事項】
１,クラス名は適当，命名ルールに合わせて直す必要あり。
２,スポットの写真表示の部分は仮です。jQueryのslickで書き直してください。
３,サブループは自信ない。
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
            <p>カスタムタクソノミー</p>
            <?php the_taxonomies(); ?>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>

    <section>
        <h2>関連記事</h2>
        ​
        <!-- サブループ設定 -->
        <?php
        $args = array(
            'post_type'      => 'spot',          //カスタム投稿タイプ名
            'posts_per_page' => 3,               // 取得する投稿数
            'orderby'        => 'rand',          //ランダムで表示
            'tax_query' => array(
                array(
                    'taxonomy' => 'area', // タクソノミースラッグを指定
                    'field' => 'slug', // termsで使用する種類指定。指定できる値は 'term_id','name','slug'
                    'terms' => 'east', // タームスラッグを指定
                )
            )
        );
        $spot_query = new WP_Query($args);

        if ($spot_query->have_posts()) :
            while ($spot_query->have_posts()) : $spot_query->the_post();
        ?>
                ​
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

                    <!-- タクソノミースラッグの表示 -->
                    <div class="term">
                        <!-- タクソノミースラッグの取得 -->
                        <?php $area_slug = get_query_var('east'); ?>
                        <!-- タクソノミー(area)のターム -->
                        <?php $area_term = get_term_by('slug', $area_slug, 'east'); ?>
                        <?php echo $area_term->name; ?>
                    </div>

                    <!-- カスタム投稿タイプのスラッグ表示 get_post_typeの方？-->
                    <div class="slug">
                        <!-- カスタム投稿タイプのスラッグの取得 -->
                        <?php $post_type = get_post_type($post); ?>
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
