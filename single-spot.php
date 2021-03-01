<?php get_header(); ?>

<main>

</main>

<?php get_footer(); ?>

<!-- 【引継ぎ事項】
１,クラス名は適当，命名ルールに合わせて直す必要あり。
２,スポットの写真表示の部分は仮です。jQueryのslickで書き直してください。
３,サブループは自信ない。
４,cssは作っていない。
５,wpulinkのショートコードは埋め込んでいない。 -->

<!-- ヘッダーの読み込み -->
<?php get_header(); ?>
<!-- spot用のCSSの読み込み CSS名は仮です-->
<link href="<?php echo get_template_directory_uri(); ?>/assets/css/single-spot.css" rel="stylesheet" meida="all">

<!-- お約束事 body_class()とwp_body_openの読み込み -->

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <main>​
        <!-- メインループ -->
        <?php if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <!-- パンくずリスト -->
                <?php get_template_part('template-parts/breadcrumb'); ?>
                ​
                <!-- 記事 -->
                <article>
                    <div class="flex">
                        ​
                        <!--  写真の部分  カスタム投稿の写真の表示方法？JQUERYのslick？書き直してください-->
                        <div class="pic">
                            <?php
                            $pic = get_field('pic');
                            $pic_url = $pic['sizes']['medium']; ?>
                            <img src="<?php echo $pic_url; ?>" alt="">
                            <!-- 下の３つの写真の表示 -->
                            <!-- カスタム投稿の写真の表示方法ならp205 JQUERY? スライド？ -->
                        </div>
                        ​
                        ​
                        <!-- 記事の部分 -->
                        <div class="article">
                            <!-- タイトル -->
                            <h1 class="title"><?php the_title(); ?></h1>
                            <!-- 本文 -->
                            <p class="content"><?php the_content(); ?></p>
                        </div>
                        ​
                        <!-- タグ  【https://thewppress.com/libraries/display-the-tags/】を参考にした-->
                        <div class="flex">
                            <div class="tag_title">登録タグ</div>
                            <div class="tag">
                                <!-- 第一引数タグの前に表示させる文字 第二引数区切る文字（今回は一文字スペース）-->
                                <?php the_tags('#', '　'); ?>
                            </div>
                        </div>
                        <!-- 良いねボタン wpulike-->
                        <!-- 行きたいボタン divでボタン作るのでいいのか？-->
                        <div id="shop0" class="go_to_button button_off" data-spot_name="<?php the_field('spot_name') ?>" data-lat="the_field('spot_lat')" data-lng="the_field('spot_lag')">MYマップに追加</div>
                    </div>
                    ​
                    ​
                    <!-- サイト下部のスポット情報 -->
                    <div class="flex">
                        <!-- 左側 -->
                        <div class="left">
                            <table>
                                <tr>
                                    <th>所在地</th>
                                    <td><?php the_field('address') ?></td>
                                </tr>
                                <tr>
                                    <th>TEL</th>
                                    <td><?php the_field('tel') ?></td>
                                </tr>
                                <tr>
                                    <th>URL</th>
                                    <td><a href="<?php the_field('url') ?>"></a></td>
                                </tr>
                                <tr>
                                    <th>定休日</th>
                                    <td><?php the_field('holiday') ?></td>
                                </tr>
                            </table>
                        </div>
                        ​
                        <!-- 右側 -->
                        <div class="right">
                            <tr>
                                <th>営業時間</th>
                                <td><?php the_field('start_time') ?>～<?php the_field('start_time') ?></td>
                            </tr>
                            <tr>
                                <th>SNS</th>
                                <td><?php the_field('sns') ?></td>
                            </tr>
                            <tr>
                                <th>備考</th>
                                <td><?php the_field('remarks') ?></td>
                            </tr>
                        </div>
                    </div>
                </article>
        <?php endwhile;
        endif; ?>
        ​
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
                            <?php $area_slug = get_query_var('esat'); ?>
                            <!-- タクソノミー(area)のターム -->
                            <?php $area_term = get_term_by('slug', $area_slug, 'area'); ?>
                            <?php echo $area_term->name; ?>
                        </div>

                        <!-- カスタム投稿タイプのスラッグ表示 get_post_typeの方？-->
                        <div class="slug">
                            <!-- カスタム投稿タイプのスラッグの取得 -->
                            <?php $post_type = get_query_var('post_type'); ?>
                            <!-- タクソノミー(area)のターム -->
                            <?php echo $post_type->name; ?>
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
</body>



<!-- js読み込み -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/single-spot.js"></script>
<?php get_footer(); ?>
