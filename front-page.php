<?php get_header(); ?>

<main>

    <!-- 各ページへのリンク -->
    <!-- 6F -->
    <!-- クイズゲームへ -->
    <a href="<?php echo esc_url(home_url('/quiz')); ?>"></a>
    <!-- 特集ページへ -->
    <a href="<?php echo get_post_type_archive_link('special'); ?>"></a>

    <!-- 5F -->
    <!-- 東部のアーカイブ -->
    <a href="<?php echo get_post_type_archive_link('east'); ?>"></a>

    <!-- 4F -->
    <!-- 西部のアーカイブ -->
    <a href="<?php echo get_post_type_archive_link('west'); ?>"></a>

    <!-- 3F -->
    <!-- 市内のアーカイブ -->
    <a href="<?php echo get_post_type_archive_link('city'); ?>"></a>

    <!-- 2F -->
    <!-- 南部のアーカイブ -->
    <a href="<?php echo get_post_type_archive_link('south'); ?>"></a>

    <!-- 1F -->
    <!-- 徳島について固定ページ -->
    <a href="<?php echo esc_url(home_url('/tokushima')); ?>"></a>
    <!-- 名物のアーカイブ -->
    <a href="<?php echo get_post_type_archive_link('famous'); ?>"></a>
    <!-- イベントのアーカイブ -->
    <a href="<?php echo get_post_type_archive_link('event'); ?>"></a>

    <!-- B1F -->
    <!-- 都市伝説のアーカイブ -->
    <a href="<?php echo get_post_type_archive_link('horror'); ?>"></a>

</main>

<?php get_footer(); ?>
