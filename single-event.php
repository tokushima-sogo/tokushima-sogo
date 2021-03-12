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
                <a href="<?php echo home_url('event'); ?>">
                    <span>
                        徳島のイベント
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
                $eventname  = get_field('event_name');
                $picture1   = get_field('event_pic1');
                $picture2   = get_field('event_pic2');
                $held       = get_field('event_held');
                $place      = get_field('event_shop');
                $owner      = get_field('event_owner');
                $url        = get_field('event_url');
                $facebook   = get_field('event_facebook');
                $instagram  = get_field('event_instagram');
                $twitter    = get_field('event_twitter');
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
                            <!-- singleArticle__text -->
                            <h2 class="c-heading u-flex"><?php echo $eventname; ?></h2>
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
                                <th class="c-singleTable__th">開催時期</th>
                                <!-- カスタムフィールド開催日時 -->
                                <td class="c-singleTable__td">
                                    <?php if ($held) : ?>
                                        <?php echo $held; ?>
                                    <?php else : ?>
                                        <p>&nbsp;</p>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr class="c-singleTable__tr">
                                <th class="c-singleTable__th">開催場所</th>
                                <!-- カスタムフィールド開催場所 -->
                                <td class="c-singleTable__td">
                                    <?php if ($place) : ?>
                                        <?php echo $place; ?>
                                    <?php else : ?>
                                        <p>&nbsp;</p>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr class="c-singleTable__tr">
                                <th class="c-singleTable__th">主催</th>
                                <!-- カスタムフィールド主催者 -->
                                <td class="c-singleTable__td">
                                    <?php if ($owner) : ?>
                                        <?php echo $owner; ?>
                                    <?php else : ?>
                                        <p>&nbsp;</p>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr class="c-singleTable__tr">
                                <th class="c-singleTable__th">URL</th>
                                <!-- カスタムフィールドイベントURL -->
                                <td class="c-singleTable__td">
                                    <?php if ($url) : ?>
                                        <a href="<?php echo $url; ?>"><?php echo $url; ?></a>
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
                                        <a href="<?php echo $facebook; ?>"><i class="fab fa-facebook-square"></i></a>
                                    <?php elseif ($instagram) : ?>
                                        <a href="<?php echo $instagram; ?>"><i class="fab fa-instagram-square"></i></a>
                                    <?php elseif ($twitter) : ?>
                                        <a href="<?php echo $twitter; ?>"><i class="fab fa-twitter-square"></i></a>
                                    <?php else : ?>
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
