<?php get_header(); ?>

<main>

    <!-- 投稿記事の出力 -->
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

            <!-- タイトル -->
            <?php the_title(); ?>

            <!-- 本文 -->
            <?php the_content(); ?>

            <!-- イベント名称 -->
            <?php if ($eventname) : ?>
                <?php echo $eventname; ?>
            <?php endif; ?>

            <!-- カスタムフィールド写真 -->
            <?php if ($picture1) : ?>
                <?php echo '<img src=" ' . $picture1 . '">'; ?>
            <?php endif; ?>

            <?php if ($picture2) : ?>
                <?php echo '<img src=" ' . $picture2 . '">'; ?>
            <?php endif; ?>

            <!-- カスタムフィールド開催日時 -->
            <?php if ($held) : ?>
                <?php echo $held; ?>
            <?php endif; ?>

            <!-- カスタムフィールド開催場所 -->
            <?php if ($place) : ?>
                <?php echo $place; ?>
            <?php endif; ?>

            <!-- カスタムフィールド主催者 -->
            <?php if ($owner) : ?>
                <?php echo $owner; ?>
            <?php endif; ?>

            <!-- カスタムフィールドイベントURL -->
            <?php if ($url) : ?>
                <?php echo $url; ?>
            <?php endif; ?>

            <!-- カスタムフィールドsns -->
            <?php if ($facebook) : ?>
                <a href="<?php echo $facebook; ?>"><i class="fab fa-facebook-square"></i></a>
            <?php endif; ?>

            <?php if ($instagram) : ?>
                <a href="<?php echo $instagram; ?>"><i class="fab fa-instagram-square"></i></a>
            <?php endif; ?>

            <?php if ($twitter) : ?>
                <a href="<?php echo $twitter; ?>"><i class="fab fa-twitter-square"></i></a>
            <?php endif; ?>

            <!-- サムネイルの表示 -->
            <!-- <div class="pic">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium') ?>
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                <?php endif; ?>
            </div> -->

            <!-- いいねぼたん -->
            <?php echo do_shortcode('[wp_ulike]'); ?>

            <!-- タグを持ってくる -->
            <?php the_taxonomies(); ?>

        <?php endwhile; ?>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
