<!-- <footer> -->



<!-- プライバシーポリシー固定ページ -->
<!-- <a href="<?php echo esc_url(home_url('/privacy')); ?>">プライバシーポリシー</a> -->

<!-- このサイトについて固定ページ -->
<!-- <a href="<?php echo esc_url(home_url('/aboutsite')); ?>">このサイトについて</a> -->

<!-- </footer> -->

<!-- footer -->

<footer class="l-footer u-cWhite">
    <ul class="p-footer__contentsBlock1">
        <li class="p-footer__contentsParts">
            <div class="c-footer__contentsParts c-footer__contentsPartsBtn ">６階<span class="u-cWhite">特設会場</span></div>
            <ul class="c-footer__contentsDetail">
                <li><a class="u-cWhite" href="<?php echo esc_url(home_url('/quiz')); ?>">クイズ</a></li>
                <li><a class="u-cWhite" href="<?php echo get_post_type_archive_link('special'); ?>">特集</a></li>
            </ul>
        </li>
        <li class="p-footer__contentsParts">
            <div class="c-footer__contentsPartsBtn">５階<span>県東部</span></div>
            <ul class="c-footer__contentsDetail">
                <?php
                $east = get_term_by('slug', 'east', 'area');
                $east_link = get_term_link($east, 'area');
                ?>
                <li><a class="u-cWhite" href="<?php echo $east_link; ?>">トップ</a></li>
                <li><a class="u-cWhite" href="#">スポット</a></li>
                <li><a class="u-cWhite" href="#">グルメ</a></li>
                <li><a class="u-cWhite" href="#">ショップ</a></li>
            </ul>
        </li>
    </ul>
    <ul class="p-footer__contentsBlock2">
        <li class="p-footer__contentsParts">
            <div class="c-footer__contentsPartsBtn">４階<span>県西部</span></div>
            <ul class="c-footer__contentsDetail">
                <?php
                $west = get_term_by('slug', 'west', 'area');
                $west_link = get_term_link($west, 'area');
                ?>
                <li><a class="u-cWhite" href="<?php echo $west_link; ?>">トップ</a></li>
                <li><a class="u-cWhite" href="#">スポット</a></li>
                <li><a class="u-cWhite" href="#">グルメ</a></li>
                <li><a class="u-cWhite" href="#">ショップ</a></li>
            </ul>
        </li>
        <li class="p-footer__contentsParts">
            <div class="c-footer__contentsPartsBtn">３階<span>徳島市</span></div>
            <ul class="c-footer__contentsDetail">
                <?php
                $city = get_term_by('slug', 'city', 'area');
                $city_link = get_term_link($city, 'area');
                ?>
                <li><a class="u-cWhite" href="<?php echo $city_link; ?>">トップ</a></li>
                <li><a class="u-cWhite" href="#">スポット</a></li>
                <li><a class="u-cWhite" href="#">グルメ</a></li>
                <li><a class="u-cWhite" href="#">ショップ</a></li>
            </ul>
        </li>
    </ul>
    <ul class="p-footer__contentsBlock3">
        <li class="p-footer__contentsParts">
            <div class="c-footer__contentsPartsBtn">２階<span>県南部</span></div>
            <ul class="c-footer__contentsDetail">
                <?php
                $south = get_term_by('slug', 'south', 'area');
                $south_link = get_term_link($south, 'area');
                ?>
                <li><a class="u-cWhite" href="<?php echo $south_link; ?>">トップ</a></li>
                <li><a class="u-cWhite" href="#">スポット</a></li>
                <li><a class="u-cWhite" href="#">グルメ</a></li>
                <li><a class="u-cWhite" href="#">ショップ</a></li>
            </ul>
        </li>
        <li class="p-footer__contentsParts">
            <div class="c-footer__contentsPartsBtn">１階<span>ご案内</span></div>
            <ul class="c-footer__contentsDetail">
                <li><a class="u-cWhite" href="#">サイトの使い方</a></li>
                <li><a class="u-cWhite" href="<?php echo esc_url(home_url('/tokushima')); ?>">徳島県について</a></li>
                <li><a class="u-cWhite" href="<?php echo get_post_type_archive_link('famous'); ?>">徳島の名物</a></li>
                <li><a class="u-cWhite" href="<?php echo get_post_type_archive_link('event'); ?>">徳島県のイベント</a></li>
            </ul>
        </li>
    </ul>
    <ul class="p-footer__contentsBlock4">
        <li class="p-footer__contentsParts p-footer__contentsPartsLast">
            <div><a class="u-cWhite" href="<?php echo esc_url(home_url('/aboutsite')); ?>">このサイトについて</a></div>

            <div><a class="u-cWhite" href="<?php echo esc_url(home_url('/privacy')); ?>">プライバシーポリシー</a></div>

            <div><a class="u-cWhite" href="<?php echo esc_url(home_url('/contact')); ?>">お問い合わせ</a></div>
        </li>
        <li class="c-fab">
            <a href="https://www.instagram.com/"><i class="fab fa-instagram-square fa-3x u-cWhite"></i></a>
            <a href="https://twitter.com/home"><i class="fab fa-twitter-square fa-3x u-cWhite"></i></a>
        </li>
    </ul>
</footer>
<div class="c-copyRight u-cWhite">
    Copyright©トクシマSo Go！All Rights Reserved.
</div>
<!-- /footer -->
</div>


<!-- <script src="<?php echo get_template_directory_uri(); ?>/assets/js/map.js"></script> -->
<!-- <script src="<?php echo get_template_directory_uri(); ?>/assets/js/map_create.js"></script> -->
<?php wp_footer(); ?>
</body>

</html>
