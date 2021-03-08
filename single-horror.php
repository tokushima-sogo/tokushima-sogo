<?php get_header(); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/single-horror.css">

<main class="l-main u-bgHorror">

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>

            <div class="l-wrap">
                <h2 class="c-topTitle">金長狸を祀った神社!?金長大明神</h2>

                <div class="l-mainContents">
                    <div class="p-favorite__wrap">
                        <!-- いいね！ -->
                        <a href="#" class="p-singleBtn c-btnTag u-btnTag--fav">
                            <!-- ハートのsvg -->
                            <img src="assets/images/icon_archive_common_icon_heart02.png">
                            <span class="c-favCount">10</span>いいね！
                        </a>
                        <!-- /いいね！ -->
                    </div>

                    <img src="assets/images/mv_single_horror_kintyo.jpg" class="topImg" alt="金長神社">

                    <p class="c-text">徳島の小松島に金長狸を祀った神社があるという。小松島が誇る金長たぬきは、民話「阿波狸合戦（あわたぬきがっせん）」の主人公です。
                        江戸時代の末、染物商「大和屋」の主人である茂右衛門（もえもん）」が松の大木の前を通りかかると、大勢の者が大木の中に潜んでいた狸をあぶり出そうとしていた。かわいそうに思った茂右衛門はその者たちにお金を与えて狸を助けたのである。その狸の名は金長。恩返しをするために大和屋に移り住んだ金長は、守り神になって店を大いに繁盛させた。</p>
                    <p class="c-text">
                        その後、金長は狸の総領である六右衛門のもとへ修行に出かける。そこで著しく成長した金長をみて、六右衛門は娘の養子になるよう勧める。しかし金長は誘いを断り、茂右衛門への恩返しのため故郷へ向かった。

                        金長をこのまま帰せば、やがて自分の脅威になると考えた六右衛門は、金長に攻撃しそれがきっかけとなり、「阿波狸合戦」が幕を開けた。
                    </p>

                    <p class="c-text">
                        金長は六右衛門を討ち取るが、自分も深手を負い
                        茂右衛門に礼を言った後に力尽きた。

                        その生き様に感動した茂右衛門は「正一位金長大明神」として金長をまつりました。日峰山のふもとにある金長神社には、今も多くの人々が参拝に訪れている。
                    </p>

                    <ul class="p-underText">
                        <li>住所</li>
                        <li>徳島県小松島市中田町字脇谷市営グランド横</li>
                    </ul>
                </div>

            </div>

            <!-- カスタムフィールドの値を取得 -->
            <?php
            $picture = get_field('horror_pic');
            $address = get_field('horror_address');
            ?>

            <?php the_title(); ?>
            <?php the_content(); ?>

        <?php endwhile; ?>
    <?php endif; ?>

    <!-- 関連記事の出力 -->
    <!-- articleList -->
    <section class="l-articleList">
        <h3 class="c-subHeading u-center"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/single_common_tl_related--silver.png" alt="関連記事"></h3>

        <?php
        global $post;
        $post_id = $post->ID;                         //投稿記事を取得する。
        $post_type = get_post_type($post_id);         //投稿タイプを取得
        $taxonomy = 'taxotag';                        //タクソノミーを指定
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

                <!-- articleList -->
                <div class="p-articleList u-grid">
                    <!-- article -->
                    <article class="p-article c-more1">
                        <!-- imgArea -->
                        <div class="p-imgArea">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/flame_archive_horror_thmbFlame.png" class="c-frame" alt="額縁">
                            <!-- thumbnail -->
                            <!-- <a href="single.html">
                                <img src="assets/images/mv_single_horror_hatikura4.jpeg" class="c-thumbnail" alt="スポット写真">
                            </a> -->
                            <a href="<?php the_permalink(); ?>" class="c-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium') ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                                <?php endif; ?>
                            </a>
                        </div>
                        <!-- /imgArea -->
                        <!-- textArea -->
                        <div class="p-textArea u-horrorRed">
                            <div class="p-textContent u-flex">
                                <div class="p-bookmark u-flex">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_archive_common_icon_heart.svg" class="c-icon__heart">
                                    <div class="c-bookmark__text u-fontHorror"><span class="c-bookmark__count">10</span>いいね！</div>
                                </div>
                                <div class="p-tag u-flex">
                                    <!-- <div class="c-tag u-bgHorror u-mr15">市内</div> -->
                                    <div class="c-tag u-bgHorror">
                                        <?php echo get_the_term_list($post->ID, 'taxotag');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="c-title u-center u-fontHorror"><?php the_title(); ?></div>
                        </div>
                        <!-- /textArea -->
                    </article>
                    <!-- /article -->
                </div>
                <!-- /articleList -->

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>

    </section>
    <!-- /spot -->

</main>
<!-- /main -->

<?php get_footer(); ?>
