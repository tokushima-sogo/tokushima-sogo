<?php get_header(); ?>

<main class="l-main">
    <!-- singleArticle -->
    <section class="l-singleArticle">
        <!-- breadCrumb -->
        <div class="p-breadCrumb">
            <div class="p-breadCrumb__inner">
                <!-- breadcrumbループstart -->
                <a href="<?php echo home_url(); ?>"><span>トップ</span></a>
                <i class="fas fa-angle-right"></i>
                <a href="<?php echo home_url('famous'); ?>">
                    <span>
                        徳島の名物
                    </span>
                </a>
                <i class="fas fa-angle-right"></i>
                <span><?php echo get_post()->post_title ?></span>
                <!-- breadcrumbループend -->
            </div>
        </div>
        <!-- /breadCrumb -->
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
                            </ul>
                        </div>
                        <!-- /slickSlider -->

                        <!-- singleArticle__description -->
                        <div class="p-singleArticle__description u-flex">
                            <h2 class="c-heading u-flex"><?php echo $famousname; ?></h2>
                            <!-- singleArticle__text -->
                            <div class="c-singleArticle__text u-center"><?php the_content(); ?></div>
                            <!-- /singleArticle__text -->

                            <!-- singleTag -->
                            <div class="p-singleTag u-flex">
                                <div class="c-singleTag__text u-center">タグ</div>
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
                                        <p>&nbsp;</p>
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
                                        <p>&nbsp;</p>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr class="c-singleTable__tr">
                                <th class="c-singleTable__th">メーカーURL</th>
                                <!-- カスタムフィールドメーカーURL -->
                                <td class="c-singleTable__td">
                                    <?php if ($url) : ?>
                                        <a href="<?php echo $url; ?>" target="_blank">ホームページはこちら</a>
                                    <?php else : ?>
                                        <p>&nbsp;</p>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr class="c-singleTable__tr">
                                <th class="c-singleTable__th">オンラインショップ</th>
                                <!-- カスタムフィールドオンラインショップ -->
                                <td class="c-singleTable__td">
                                    <?php if ($online) : ?>
                                        <a href="<?php echo $online; ?>" target="_blank">オンラインショップ</a>
                                    <?php else : ?>
                                        <p>&nbsp;</p>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr class="c-singleTable__tr">
                                <th class="c-singleTable__th">SNS</th>
                                <!-- カスタムフィールドsns -->
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
                        </table>
                    </div>
                    <!-- /singleTable -->
                </div>
                <!-- /singleBody -->

            <?php endwhile; ?>
        <?php endif; ?>
    </section>
    <!-- /singleArticle -->

</main>
<!-- /main -->

<?php get_footer(); ?>
