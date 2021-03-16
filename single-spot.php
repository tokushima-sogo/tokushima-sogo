<?php get_header(); ?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNNbWvrL46SW-8K-D0w6Haff4Vbcc4rRQ"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/googlemap.js"></script>

<main class="l-main">
    <!-- singleArticle -->
    <section class="l-singleArticle">
        <!-- breadCrumb -->
        <div class="p-breadCrumb">
            <div class="p-breadCrumb__inner">
                <a href="<?php echo home_url('/'); ?>"><span>トップ</span></a>
                <i class="fas fa-angle-right"></i>
                <span><?php echo get_the_term_list($post->ID, 'area') ?></span>
                <i class="fas fa-angle-right"></i><span><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span>
                <i class="fas fa-angle-right"></i><span><?php echo get_post()->post_title ?></span>
            </div>
        </div>
        <!-- breadCrumb -->

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
                <!-- singleBody -->
                <div class="l-singleBody">
                    <!-- singleArticle__item -->
                    <div class="p-singleArticle__item u-flex">
                        <!-- slickSlider -->
                        <div class="l-slickSlider">
                            <ul class="p-slickSlider">
                                <li>
                                    <?php if ($picture1) : ?>
                                        <?php echo '<img src=" ' . $picture1 . '">'; ?>
                                    <?php endif; ?>
                                </li>
                                <li>
                                    <?php if ($picture2) : ?>
                                        <?php echo '<img src=" ' . $picture2 . '">'; ?>
                                    <?php endif; ?>
                                </li>
                                <li>
                                    <?php if ($picture3) : ?>
                                        <?php echo '<img src=" ' . $picture3 . '">'; ?>
                                    <?php endif; ?>
                                </li>
                            </ul>
                            <ul class="p-thumbSlider">
                                <li>
                                    <?php if ($picture1) : ?>
                                        <?php echo '<img src=" ' . $picture1 . '">'; ?>
                                    <?php endif; ?>
                                </li>
                                <li>
                                    <?php if ($picture2) : ?>
                                        <?php echo '<img src=" ' . $picture2 . '">'; ?>
                                    <?php endif; ?>
                                </li>
                                <li>
                                    <?php if ($picture3) : ?>
                                        <?php echo '<img src=" ' . $picture3 . '">'; ?>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>

                        <!-- singleArticle__description -->
                        <div class="p-singleArticle__description u-flex">
                            <h2 class="c-heading u-flex"><?php the_title(); ?></h2>
                            <!-- singleArticle__text -->
                            <div class="c-singleArticle__text u-center">
                                <?php the_content(); ?>
                                <!-- map登録ボタン -->
                                <?php echo do_shortcode('[wp_ulike]'); ?>
                            </div>

                            <!-- singleTag -->
                            <div class="p-singleTag u-flex">
                                <div class="c-singleTag__text u-center">タグ</div>

                                <!-- singleTagList -->
                                <ul class="p-singleTagList__ul u-flex">
                                    <?php
                                    $terms = get_the_terms($post->ID, 'taxotag');
                                    if ($terms[0]) {
                                        echo '<li class="c-singleTagList__li">' . $terms[0]->name . '</li>';
                                    }
                                    if (isset($terms[1])) {
                                        echo '<li class="c-singleTagList__li">' . $terms[1]->name . '</li>';
                                    } else {
                                        echo '<p>&nbsp;</p>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- singleArticle__info -->
                    <div class="p-singleArticle__info u-flex">
                        <!-- Map -->
                        <?php
                        $location = get_field('location');
                        if ($location) : ?>
                            <div class="l-singleMap acf-map" data-zoom="16">
                                <div class="p-singleMap marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>">
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- singleTable -->
                        <div class="l-singleTable">
                            <table class="p-singleTable">
                                <tr class="c-singleTable__tr">
                                    <th class="c-singleTable__th">所在地</th>
                                    <td class="c-singleTable__td">
                                        <!-- カスタムフィールド住所 -->
                                        <?php if ($address) : ?>
                                            <?php echo $address; ?>
                                        <?php else : ?>
                                            <p>&nbsp;</p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr class="c-singleTable__tr">
                                    <th class="c-singleTable__th">TEL</th>
                                    <td class="c-singleTable__td">
                                        <!-- カスタムフィールド電話 -->
                                        <?php if ($tel) : ?>
                                            <?php echo $tel; ?>
                                        <?php else : ?>
                                            <p>&nbsp;</p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr class="c-singleTable__tr">
                                    <th class="c-singleTable__th">営業時間</th>
                                    <td class="c-singleTable__td">
                                        <!-- カスタムフィールド営業時間 -->
                                        <?php if ($opentime) : ?>
                                            <?php echo $opentime; ?>
                                        <?php else : ?>
                                            <p>&nbsp;</p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr class="c-singleTable__tr">
                                    <th class="c-singleTable__th">定休日</th>
                                    <td class="c-singleTable__td">
                                        <!-- カスタムフィールド定休日 -->
                                        <?php if ($closetime) : ?>
                                            <?php echo $closetime; ?>
                                        <?php else : ?>
                                            <p>&nbsp;</p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr class="c-singleTable__tr">
                                    <th class="c-singleTable__th">URL</th>
                                    <td class="c-singleTable__td">
                                        <!-- カスタムフィールドURL -->
                                        <?php if ($url) : ?>
                                            <a href="<?php echo $url; ?>" target="_blank">ホームページはこちら</a>
                                        <?php else : ?>
                                            <p>&nbsp;</p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr class="c-singleTable__tr">
                                    <!-- カスタムフィールドsns -->
                                    <th class="c-singleTable__th">SNS</th>
                                    <td class="c-singleTable__td">
                                        <?php if ($facebook) : ?>
                                            <a href="<?php echo $facebook; ?>" target="_blank"><i class="fab fa-facebook-square"></i></a>
                                        <?php endif; ?>
                                        <?php if ($instagram) : ?>
                                            <a href="<?php echo $instagram; ?>" target="_blank"><i class="fab fa-instagram-square"></i></a>
                                        <?php endif; ?>
                                        <?php if ($twitter) : ?>
                                            <a href="<?php echo $twitter; ?>" target="_blank"><i class="fab fa-twitter-square"></i></a>
                                        <?php endif; ?>
                                        <?php if ($facebook == false && $instagram == false && $twitter == false) : ?>
                                            <p>&nbsp;</p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr class="c-singleTable__tr">
                                    <!-- カスタムフィールド備考 -->
                                    <th class="c-singleTable__th">備考</th>
                                    <td class="c-singleTable__td">
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
                                        <?php if (
                                            $remarks1 == false &&
                                            $remarks2 == false &&
                                            $remarks3 == false &&
                                            $remarks4 == false &&
                                            $remarks5 == false
                                        ) : ?>
                                            <p>&nbsp;</p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>

    <!-- articleList -->
    <section class="l-articleList">
        <div class="u-center">
            <h3 class="c-subHeading">関連記事</h3>
        </div>
        <!-- articleList -->
        <div class="p-articleList u-grid">
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
                'orderby'          => 'rand',             //ランダムで表示
                'posts_per_page'    => 3,                 //記事を3件のみ出力
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

                    <!-- article -->
                    <article class="p-article">
                        <!-- imgArea -->
                        <div class="p-imgArea">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/frame_archive_common_thumbFrame.png" class="c-frame" alt="額縁">
                            <a href="<?php the_permalink(); ?>" class="c-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium') ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="画像がありません">
                                <?php endif; ?>
                            </a>
                        </div>

                        <!-- textArea -->
                        <div class="p-textArea">
                            <div class="p-textContent">
                                <div class="c-title u-center">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                                <div class="p-tag u-flex">
                                    <div class="c-tag u-mr15">
                                        <?php
                                        echo get_the_term_list($post->ID, 'area');
                                        ?>
                                    </div>
                                    <div class="c-tag">
                                        <?php
                                        echo esc_html(get_post_type_object(get_post_type())->label);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
