<?php get_header(); ?>

<main class="l-main u-bgHorror">
    <!-- breadCrumb -->
    <div class="p-breadCrumb">
        <div class="p-breadCrumb__inner u-panHorror">
            <?php if (function_exists('bcn_display')) {
                bcn_display();
            } ?>
        </div>
    </div>
    <!-- /breadCrumb -->

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <!-- カスタムフィールドの値を取得 -->
            <?php
            $picture = get_field('horror_pic');
            $address = get_field('horror_address');
            ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
    <?php endif; ?>

    <!-- articleList -->
    <section class="l-articleList">
        <h3 class="c-subHeading u-center"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/tl_archive_horror_relation.png" alt="関連記事"></h3>

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

        <!-- articleList -->
        <div class="p-articleList u-grid">
            <?php $the_query = new WP_Query($args); ?>
            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : ?>
                    <?php $the_query->the_post(); ?>

                    <!-- article -->
                    <article class="p-article c-more1">
                        <!-- imgArea -->
                        <div class="p-imgArea">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/flame_archive_horror_thmbFlame.png" class="c-frame" alt="額縁">
                            <a href="<?php the_permalink(); ?>" class="c-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium') ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="画像がありません">
                                <?php endif; ?>
                            </a>
                        </div>
                        <!-- /imgArea -->
                        <!-- textArea -->
                        <div class="p-textArea u-horrorRed">
                            <div class="p-textContent">
                                <div class="c-title u-center u-fontHorror"><?php the_title(); ?></div>
                                <div class="c-date u-center u-fontHorror">公開日：<?php the_time('Y-m-d'); ?>
                                </div>
                                <div class="p-tag u-flex">
                                    <div class="c-tag u-bgHorror"> <?php echo get_the_term_list($post->ID, 'taxotag'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /textArea -->
                    </article>
                    <!-- /article -->
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
        <!-- /articleList -->

    </section>
    <!-- /spot -->

</main>
<!-- /main -->

<?php get_footer(); ?>
