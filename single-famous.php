<?php get_header(); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/single-event.css">

<main class="l-main">

    <!-- breadCrumb -->
    <div class="p-breadCrumb">
        <div class="p-breadCrumb__inner">
            <!-- breadcrumbループstart -->
            <span>トップ</span>
            <i class="fas fa-angle-right"></i>
            <span>エリア名</span>
            <i class="fas fa-angle-right"></i> <span>カテゴリ</span>
            <i class="fas fa-angle-right"></i> <span>記事タイトル</span>
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
            $famousname  = get_field('famous_name');
            $picture1    = get_field('famous_pic1');
            $picture2    = get_field('famous_pic2');
            $makername   = get_field('famous_maker');
            $shop        = get_field('famous_shop');
            $url         = get_field('famous_url');
            $online      = get_field('famous_online');
            $facebook    = get_field('famous_facebook');
            $instagram   = get_field('famous_instagram');
            $twitter     = get_field('famous_twitter');
            ?>

            <!-- singleArticle -->
            <section class="l-singleArticle">
                <!-- singleHeader -->
                <div class="l-singleHeader">
                    <h2 class="c-singleArticle__title u-center"><?php echo $famousname; ?></h2>
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
                                    <!-- <li class="c-singleTagList__li">#タグ名</li>
                                    <li class="c-singleTagList__li">#タグ名</li>
                                    <li class="c-singleTagList__li">#タグ名</li> -->
                                </ul>
                                <!-- /singleTagList -->
                            </div>
                            <!-- /singleTag -->

                            <!-- singleBtns -->
                            <div class="p-singleBtns u-center u-flex">
                                <!-- いいね！ -->
                                <a href="#" class="p-singleBtn c-btnTag u-center u-btnTag--fav">
                                    <!-- ハートのsvg -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 792 637.038" preserveAspectRatio="none">
                                        <path class="1e6ff1b7-abfa-4d80-a212-8e109273a368" d="M896,512c0,212.077-384,384-384,384S128,724.077,128,512,384,192,512,384C640,192,896,299.923,896,512Z" transform="translate(-116 -272.11)" />
                                    </svg><span class="c-favCount">10</span>いいね！
                                </a>
                                <!-- /いいね！ -->
                            </div>
                            <!-- /singleBtns -->
                        </div>
                        <!-- /singleArticle__description -->
                    </div>
                    <!-- /singleArticle__item -->

                    <!-- singleTable -->
                    <div class="l-singleTable">
                        <table class="p-singleTable">
                            <tr class="c-singleTable__tr">
                                <th class="c-singleTable__th">メーカー名</th>
                                <!-- カスタムフィールドメーカー名 -->
                                <td class="c-singleTable__td">
                                    <?php if ($makername) : ?>
                                        <?php echo $makername; ?>
                                    <?php else : ?>
                                        <p>-</p>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr class="c-singleTable__tr">
                                <th class="c-singleTable__th">直営店</th>
                                <!-- カスタムフィールド直営店 -->
                                <td class="c-singleTable__td">
                                    <?php if ($shop) : ?>
                                        <?php echo $shop; ?>
                                    <?php else : ?>
                                        <p>-</p>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr class="c-singleTable__tr">
                                <th class="c-singleTable__th">メーカーURL</th>
                                <!-- カスタムフィールドメーカーURL -->
                                <td class="c-singleTable__td">
                                    <?php if ($url) : ?>
                                        <a href="<?php echo $url; ?>"><?php echo $url; ?></a>
                                    <?php else : ?>
                                        <p>-</p>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr class="c-singleTable__tr">
                                <th class="c-singleTable__th">オンラインショップ</th>
                                <!-- カスタムフィールドオンラインショップ -->
                                <td class="c-singleTable__td">
                                    <?php if ($online) : ?>
                                        <a href="<?php echo $online; ?>"><?php echo $online; ?></a>
                                    <?php else : ?>
                                        <p>-</p>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr class="c-singleTable__tr">
                                <th class="c-singleTable__th">SNS</th>
                                <!-- カスタムフィールドsns -->
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
                        </table>
                    </div>
                    <!-- /singleTable -->
                </div>
                <!-- /singleBody -->
            </section>
            <!-- /singleArticle -->

        <?php endwhile; ?>
    <?php endif; ?>

</main>
<!-- /main -->

<?php get_footer(); ?>
