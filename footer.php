<!-- エリア別のスポットグルメショップにリンクが飛ぶようになっているが，
そんなアーカイブサイトは存在しない。要確認3月9日（23：29）現在 -->

<!-- footer -->
<footer class="l-footer u-center u-white u-bgCalmBlue">
    <!-- footer__inner -->
    <div class="p-footer__inner u-flex">
        <!-- footer__contentsBlock -->
        <ul class="p-footer__contentsBlock u-flex u-cr u-o3">
            <li class="p-footer__contentsParts">
                <div class="c-footer__contentsPartsBtn "><span>特設会場</span></div>
                <ul class="c-footer__contentsDetail u-center u-p88">
                    <li><a href="<?php echo esc_url(home_url('quiz')); ?>">クイズ</a></li>
                    <li><a href="<?php echo get_post_type_archive_link('special'); ?>">特集</a></li>
                </ul>
            </li>
            <li class="p-footer__contentsParts u-white">
                <div class="c-footer__contentsPartsBtn"><span>県東部</span></div>
                <ul class="c-footer__contentsDetail u-center">
                    <?php
                    $east = get_term_by('slug', 'east', 'area');
                    $east_link = get_term_link($east, 'area');
                    ?>
                    <li><a href="<?php echo $east_link; ?>">トップ</a></li>
                    <li><a href="<?php echo $east_link; ?>#east_spot">スポット</a></li>
                    <li><a href="<?php echo $east_link; ?>#east_gourmet">グルメ</a></li>
                    <li><a href="<?php echo $east_link; ?>#east_shop">ショップ</a></li>
                </ul>
            </li>
        </ul>
        <!-- /footer__contentsBlock -->
        <!-- footer__contentsBlock -->
        <ul class="p-footer__contentsBlock u-flex u-cr u-o2">
            <li class="p-footer__contentsParts">
                <div class="c-footer__contentsPartsBtn"><span>県西部</span></div>
                <ul class="c-footer__contentsDetail u-center">
                    <?php
                    $west = get_term_by('slug', 'west', 'area');
                    $west_link = get_term_link($west, 'area');
                    ?>
                    <li><a href="<?php echo $west_link; ?>">トップ</a></li>
                    <li><a href="<?php echo $west_link; ?>#west_spot">スポット</a></li>
                    <li><a href="<?php echo $west_link; ?>#west_gourmet">グルメ</a></li>
                    <li><a href="<?php echo $west_link; ?>#west_shop">ショップ</a></li>
                </ul>
            </li>
            <li class="p-footer__contentsParts">
                <div class="c-footer__contentsPartsBtn"><span>徳島市</span></div>
                <ul class="c-footer__contentsDetail u-center">
                    <?php
                    $city = get_term_by('slug', 'city', 'area');
                    $city_link = get_term_link($city, 'area');
                    ?>
                    <li><a href="<?php echo $city_link; ?>">トップ</a></li>
                    <li><a href="<?php echo $city_link; ?>#city_spot">スポット</a></li>
                    <li><a href="<?php echo $city_link; ?>#city_gourmet">グルメ</a></li>
                    <li><a href="<?php echo $city_link; ?>#city_shop">ショップ</a></li>
                </ul>
            </li>
        </ul>
        <!-- /footer__contentsBlock -->
        <!-- footer__contentsBlock -->
        <ul class="p-footer__contentsBlock u-flex u-cr u-o1">
            <li class="p-footer__contentsParts">
                <div class="c-footer__contentsPartsBtn"><span>県南部</span></div>
                <ul class="c-footer__contentsDetail u-center">
                    <?php
                    $south = get_term_by('slug', 'south', 'area');
                    $south_link = get_term_link($south, 'area');
                    ?>
                    <li><a href="<?php echo $south_link; ?>">トップ</a></li>
                    <li><a href="<?php echo $south_link; ?>#south_spot">スポット</a></li>
                    <li><a href="<?php echo $south_link; ?>#south_gourmet">グルメ</a></li>
                    <li><a href="<?php echo $south_link; ?>#south_shop">ショップ</a></li>
                </ul>
            </li>
            <li class="p-footer__contentsParts">
                <div class="c-footer__contentsPartsBtn"><span>ご案内</span></div>
                <ul class="c-footer__contentsDetail u-center u-p88">
                    <li><a href="<?php echo get_post_type_archive_link('famous'); ?>">徳島の名物</a></li>
                    <li><a href="<?php echo get_post_type_archive_link('event'); ?>">徳島県のイベント</a></li>
                </ul>
            </li>
        </ul>
        <!-- /footer__contentsBlock -->
        <!-- footer__contentsBlock -->
        <ul class="p-footer__contentsBlock u-flex u-o4">
            <li>
                <!-- このサイトについてなど -->
                <ul class="p-footer__contentsParts p-footer__contentsPartsLast u-center">
                    <li><a href="<?php echo esc_url(home_url('/aboutsite')); ?>">このサイトについて</a></li>
                    <li><a href="<?php echo esc_url(home_url('/privacy')); ?>">プライバシーポリシー</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact')); ?>">お問い合わせ</a></li>
                    <li><a href="#">サイトの使い方</a></li>
                    <li><a href="<?php echo esc_url(home_url('/tokushima')); ?>">徳島県について</a></li>
                </ul>
                <!-- /このサイトについてなど -->
            </li>
            <li>
                <!-- p-fab -->
                <ul class="p-fab u-flex">
                    <li class="c-fab"><a href="#" class="u-white"><i class="fab fa-instagram-square fa-3x"></i></a></li>
                    <li class="c-fab"><a href="#" class="u-white"><i class="fab fa-twitter-square fa-3x"></i></a></li>
                </ul>
                <!-- /p-fab -->
            </li>
        </ul>
        <!-- /footer__contentsBlock -->
    </div>
    <!-- /footer__inner -->
    <!-- copyRight -->
    <p class="c-copyRight">
        Copyright©トクシマSo Go！All Rights Reserved.
    </p>
    <!-- /copyRight -->
</footer>
<!-- /footer -->
</body>

</html>
