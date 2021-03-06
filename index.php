<?php get_header(); ?>

<main class="l-main">

    <!-- breadCrumb -->
    <div class="p-breadCrumb">
        <div class="p-breadCrumb__inner">
            <a href="<?php echo home_url('/'); ?>"><span>トップ</span></a>
            <i class="fas fa-angle-right"></i>
            <span>検索結果</span>
        </div>
    </div>
    <!-- breadCrumb -->

    <section class="l-description">
        <div class="p-description">
            <h2 class="c-heading u-flex">検索結果</h2>
        </div>
    </section>

    <div class="l-articleList">
        <!-- articleList -->
        <div class="p-articleList u-grid">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : ?>
                    <?php the_post(); ?>
                    <article class="p-article">
                        <!-- imgArea -->
                        <div class="p-imgArea">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/frame_archive_common_thumbFrame.png" class="c-frame" alt="額縁">
                            <!-- thumbnail -->
                            <a href="<?php the_permalink(); ?>" class="c-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium') ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" class="c-thumbnail" alt="画像がありません">
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
            <?php endif; ?>
        </div>
    </div>

</main>

<?php get_footer(); ?>
