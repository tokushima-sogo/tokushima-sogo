<?php get_header(); ?>

<main class="l-main">

    <section class="l-description">
        <div class="p-description">
            <h2 class="c-heading u-flex">検索結果</h2>
        </div>
    </section>
    <section class="l-articleList">
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
                        <!-- /imgArea -->
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
                        <!-- /textArea -->
                    </article>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
