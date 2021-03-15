<?php get_header(); ?>

<main class="l-main">

    <!-- breadCrumb -->
    <div class="p-breadCrumb">
        <div class="p-breadCrumb__inner">
            <a href="<?php echo home_url('/'); ?>"><span>トップ</span></a>
            <i class="fas fa-angle-right"></i>
            <span>このサイトについて</span>
        </div>
    </div>
    <!-- breadCrumb -->

    <div class="l-page">
        <!-- description -->
        <section class="l-description">
            <div class="p-description">
                <h2 class="c-heading u-flex">このサイトについて</h2>
                <p class="c-description__text">
                    私たちは国の求職者支援制度に基づく株式会社QLIP クリッププログラミングスクール「WEBプログラマー養成科」第8期生によって2021年に制作されたものです。
                    ​
                    このサイトを通して、徳島を知らない方々に徳島の魅力を知ってもらい、
                    1つでも行きたいところを見つけて頂き、来県される際の参考になれば幸いです。
                    内容はできるだけ正確を期していますが、責任を負うものではありません。
                </p>
            </div>
        </section>

        <!-- description -->
        <section class="l-description">
            <div class="p-description">
                <h2 class="c-heading u-flex">参考サイト一覧</h2>
                <p class="c-description__text">
                    以下のサイトを参考元・引用元として、まとめさせて頂きました。<br>アドレスをクリックすると、リンク先へ飛びます。</p>
            </div>
            <div class="l-reference">
                <div class="u-center">
                    <h3 class="c-subHeading">地域情報、等</h3>
                </div>
                <div class="l-pageTable">
                    <table class="p-pageTable">
                        <tr>
                            <th class="c-pageTable__th">ウィキペディア</th>
                            <td class="c-pageTable__td"><a href="https://ja.wikipedia.org/wiki/" target="_blank">https://ja.wikipedia.org/wiki/</a></td>
                        </tr>
                        <tr>
                            <th class="c-pageTable__th">徳島県観光情報:阿波ナビ</th>
                            <td class="c-pageTable__td"><a href="http://www.awanavi.jp/" target="_blank">http://www.awanavi.jp/</a></td>
                        </tr>
                        <tr>
                            <th class="c-pageTable__th">周辺地図:Googleマップ</th>
                            <td class="c-pageTable__td"><a href="https://www.google.co.jp/maps/?hl=ja" target="_blank">https://www.google.co.jp/maps/?hl=ja</a></td>
                        </tr>
                    </table>
                </div>

            </div>
            <div class="l-reference">
                <div class="u-center">
                    <h3 class="c-subHeading">画像</h3>
                </div>
                <div class="l-pageTable">
                    <table class="p-pageTable">
                        <tr>
                            <th class="c-pageTable__th">イラストAC</th>
                            <td class="c-pageTable__td"><a href="https://www.ac-illust.com/" target="_blank">https://www.ac-illust.com/</a></td>
                        </tr>
                        <tr>
                            <th class="c-pageTable__th">CLEANPNG</th>
                            <td class="c-pageTable__td"><a href="https://www.cleanpng.com/" target="_blank">https://www.cleanpng.com/</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <!-- page -->
</main>
<!-- main -->

<?php get_footer(); ?>
