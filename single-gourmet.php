<!-- ヘッダーの読み込み -->
<?php get_header(); ?>

<!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/single.css"> -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNNbWvrL46SW-8K-D0w6Haff4Vbcc4rRQ"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/googlemap.js"></script>
<main class="l-main">

    <!-- breadCrumb -->
    <div class="p-breadCrumb">
        <div class="p-breadCrumb__inner">
            <!-- breadcrumbループstart -->
            <a href="<?php home_url(); ?>"><span>HOME</span></a>
            <i class="fas fa-angle-right"></i>
            <span><?php echo get_the_term_list($post->ID, 'area') ?></span>
            <i class="fas fa-angle-right"></i> <span><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span>
            <i class="fas fa-angle-right"></i> <span><?php echo get_post()->post_title ?></span>
            <!-- breadcrumbループend -->
        </div>
    </div>
    <!-- /breadCrumb -->

    <!-- 詳細記事の出力 -->

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>

            <!-- カスタムフィールドの値を取得 -->
            <?php
            $spotname  = get_field('spot_name');
            $picture1  = get_field('gourmet_pic1');
            $picture2  = get_field('gourmet_pic2');
            $picture3  = get_field('gourmet_pic3');
            $address   = get_field('gourmet_address');
            $tel       = get_field('gourmet_tel');
            $opentime  = get_field('gourmet_open_time');
            $closetime = get_field('gourmet_close');
            $url       = get_field('gourmet_url');
            $facebook  = get_field('gourmet_facebook');
            $instagram = get_field('gourmet_instagram');
            $twitter   = get_field('gourmet_twitter');
            $remarks1   = get_field('gourmet_remarks1');
            $remarks2   = get_field('gourmet_remarks2');
            $remarks3   = get_field('gourmet_remarks3');
            $remarks4   = get_field('gourmet_remarks4');
            $remarks5   = get_field('gourmet_remarks5');
            ?>

            <!-- singleArticle -->
            <section class="l-singleArticle">
                <!-- singleHeader -->
                <div class="l-singleHeader">
                    <h2 class="c-singleArticle__title u-center"><?php the_title(); ?></h2>
                    <!-- /singleArticle__title -->
                </div>
                <!-- /singleHeader -->
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
                                    <!-- <img src="assets/images/takenoko1.jpg" alt=""> -->
                                </li>
                                <li>
                                    <?php if ($picture2) : ?>
                                        <?php echo '<img src=" ' . $picture2 . '">'; ?>
                                    <?php endif; ?>
                                    <!-- <img src="assets/images/takenoko2.jpg" alt=""> -->
                                </li>
                                <li>
                                    <?php if ($picture3) : ?>
                                        <?php echo '<img src=" ' . $picture3 . '">'; ?>
                                    <?php endif; ?>
                                    <!-- <img src="assets/images/takenoko3.jpg" alt=""> -->
                                </li>
                            </ul>
                            <ul class="p-thumbSlider">
                                <li>
                                    <?php if ($picture1) : ?>
                                        <?php echo '<img src=" ' . $picture1 . '">'; ?>
                                    <?php endif; ?>
                                    <!-- <img src="assets/images/takenoko1.jpg" alt=""> -->
                                </li>
                                <li>
                                    <?php if ($picture2) : ?>
                                        <?php echo '<img src=" ' . $picture2 . '">'; ?>
                                    <?php endif; ?>
                                    <!-- <img src="assets/images/takenoko2.jpg" alt=""> -->
                                </li>
                                <li>
                                    <?php if ($picture3) : ?>
                                        <?php echo '<img src=" ' . $picture3 . '">'; ?>
                                    <?php endif; ?>
                                    <!-- <img src="assets/images/takenoko3.jpg" alt=""> -->
                                </li>
                            </ul>
                        </div>

                        <!-- /slickSlider -->
                        <!-- singleArticle__description -->
                        <div class="p-singleArticle__description u-flex">
                            <!-- singleArticle__text -->
                            <p class="c-singleArticle__text"><?php the_content(); ?></p>
                            <!-- /singleArticle__text -->
                            <!-- singleTag -->
                            <div class="p-singleTag u-flex">
                                <div class="c-singleTag__text u-center">登録タグ</div>
                                <!-- /singleTag__text -->
                                <!-- singleTagList -->

                                <ul class="p-singleTagList__ul u-flex">
                                    <?php
                                    echo get_the_term_list($post->ID, 'taxotag', '<li class="c-singleTagList__li>', '</li><li class="c-singleTagList__li>', '</li>');
                                    ?>
                                </ul>
                                <!-- /singleTagList -->
                            </div>
                            <!-- /singleTag -->
                            <!-- singleBtns -->
                            <div class="p-singleBtns u-center u-flex">
                                <!-- Myスポット -->
                                <div class="p-singleBtn c-btnTag u-center u-btnTag--spot">
                                    <!-- map登録ボタン -->
                                    <?php echo do_shortcode('[wp_ulike]'); ?>
                                    <!-- Myスポットに追加 -->
                                </div>
                                <!-- /Myスポット -->
                            </div>
                            <!-- /singleBtns -->
                        </div>
                        <!-- /singleArticle__description -->
                    </div>
                    <!-- /singleArticle__item -->
                    <!-- singleArticle__info -->
                    <div class="p-singleArticle__info u-flex">
                        <!-- singleMap -->
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
                                            <p>-</p>
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
                                            <p>-</p>
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
                                            <p>-</p>
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
                                            <p>-</p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr class="c-singleTable__tr">
                                    <th class="c-singleTable__th">URL</th>
                                    <td class="c-singleTable__td">
                                        <?php if ($url) : ?>
                                            <a href="<?php echo $url; ?>"><?php echo $url; ?></a>
                                        <?php else : ?>
                                            <p>-</p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr class="c-singleTable__tr">
                                    <!-- カスタムフィールドsns -->
                                    <th class="c-singleTable__th">SNS</th>
                                    <td class="c-singleTable__td">
                                        <?php if ($facebook) : ?>
                                            <a href="<?php echo $facebook; ?>"><i class="fab fa-facebook-square"></i></a>
                                        <?php else : ?>
                                            <p>-</p>
                                        <?php endif; ?>
                                        <?php if ($instagram) : ?>
                                            <a href="<?php echo $instagram; ?>"><i class="fab fa-instagram-square"></i></a>
                                        <?php endif; ?>
                                        <?php if ($twitter) : ?>
                                            <a href="<?php echo $twitter; ?>"><i class="fab fa-twitter-square"></i></a>
                                        <?php endif; ?>
                                    </td>


                                </tr>
                                <tr class="c-singleTable__tr">
                                    <!-- カスタムフィールド備考 -->
                                    <th class="c-singleTable__th">備考</th>
                                    <td class="c-singleTable__td">
                                        <?php if ($remarks1) : ?>
                                            <?php echo $remarks1; ?>
                                        <?php else : ?>
                                            <p>-</p>
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
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- /singleTable -->
                    </div>
                </div>
                <!-- /singleArticle__info -->
                </div>
                <!-- /singleBody -->


            </section>
            <!-- /singleArticle -->
        <?php endwhile; ?>
    <?php endif; ?>


    <!-- 関連記事の出力 -->
    <!-- articleList -->
    <section class="l-articleList">
        <h3 class="c-subHeading u-center"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/tl_single_common_related.png" alt="関連記事"></h3>

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


                    <!-- article -->
                    <article class="p-article">
                        <!-- imgArea -->
                        <div class="p-imgArea">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/frame_archive_common_thumbFrame.png" class="c-frame" alt="額縁">
                            <!-- thumbnail -->
                            <a href="<?php the_permalink(); ?>" class="c-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium') ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                                <?php endif; ?>
                            </a>
                            <!-- </a> -->
                        </div>
                        <!-- /imgArea -->
                        <!-- textArea -->
                        <div class="p-textArea">
                            <div class="p-textContent">
                                <div class="p-tag u-flex">
                                    <div class="c-tag u-west u-mr15">
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
                            <div class="c-title u-center"><?php the_title(); ?></div>
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
    <!-- /articleList -->


</main>
<!-- /main -->

<?php get_footer(); ?>
