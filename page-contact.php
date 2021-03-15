<?php get_header(); ?>

<main class="l-main">

    <!-- breadCrumb -->
    <div class="p-breadCrumb">
        <div class="p-breadCrumb__inner">
            <a href="<?php echo home_url('/'); ?>"><span>トップ</span></a>
            <i class="fas fa-angle-right"></i>
            <span>お問い合わせ</span>
        </div>
    </div>
    <!-- breadCrumb -->

    <div class="l-page">
        <div class="p-description">
            <h2 class="c-heading u-flex">お問い合わせ</h2>
            <?php echo do_shortcode('[mwform_formkey key="193"]'); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
