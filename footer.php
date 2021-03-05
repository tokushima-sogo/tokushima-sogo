<footer>

    <!-- 問い合わせフォーム固定ページ -->
    <a href="<?php echo esc_url(home_url('/contact')); ?>">お問い合わせはこちらへ</a>

    <!-- プライバシーポリシー固定ページ -->
    <a href="<?php echo esc_url(home_url('/privacy')); ?>">プライバシーポリシー</a>

    <!-- このサイトについて固定ページ -->
    <a href="<?php echo esc_url(home_url('/aboutsite')); ?>">このサイトについて</a>

</footer>


<script src="<?php echo get_template_directory_uri(); ?>/assets/js/map.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/map_create.js"></script>
<?php wp_footer(); ?>
</body>

</html>
