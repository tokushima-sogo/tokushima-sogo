<?php get_header(); ?>

<main>

    <!-- 各ページへのリンク -->
    <!-- 6F -->
    <!-- クイズゲームへ -->
    <a href="<?php echo esc_url(home_url('/quiz')); ?>"></a>
    <!-- 特集ページへ -->
    <a href="<?php echo get_post_type_archive_link('special'); ?>">特集ページへ</a>

    <!-- 5F -->
    <!-- 東部のアーカイブ -->
    <a href="<?php echo get_post_type_archive_link('east'); ?>">東部</a>

    <!-- 4F -->
    <!-- 西部のアーカイブ -->
    <a href="<?php echo get_post_type_archive_link('west'); ?>">西部</a>

    <!-- 3F -->
    <!-- 市内のアーカイブ -->
    <a href="<?php echo get_post_type_archive_link('city'); ?>">徳島市内</a>

    <!-- 2F -->
    <!-- 南部のアーカイブ -->
    <a href="<?php echo get_post_type_archive_link('south'); ?>">南部</a>

    <!-- 1F -->
    <!-- 徳島について固定ページ -->
    <a href="<?php echo esc_url(home_url('/tokushima')); ?>">徳島について</a>
    <!-- 名物のアーカイブ -->
    <a href="<?php echo get_post_type_archive_link('famous'); ?>">名物</a>
    <!-- イベントのアーカイブ -->
    <a href="<?php echo get_post_type_archive_link('event'); ?>">イベント</a>

    <!-- B1F -->
    <!-- 都市伝説のアーカイブ -->
    <a href="<?php echo get_post_type_archive_link('horror'); ?>">都市伝説</a>

</main>

<?php get_footer(); ?>
