<?php get_header(); ?>

<main class="l-main">
    <div class="l-page">
        <!-- description -->
        <div class="p-description">
            <h2 class="c-heading u-flex">お問い合わせ</h2>

            <?php echo do_shortcode('[mwform_formkey key="193"]'); ?>

            <!--
            <section class="l-pageTable">
                <form action="#" id="form" method="POST">
                    <table class="p-pageTable">
                        <tr>
                            <th class="c-pageTable__th">件名<span class="u-must">必須</span></th>
                            <td class="c-pageTable__td u-contact">
                                <div class="c-select u-center"><select name="type" required>
                                        <option value>選択してください</option>
                                        <option value="1">質問1：掲載内容について</option>
                                        <option value="2">質問2：掲載希望</option>
                                        <option value="3">質問3：その他</option>
                                    </select></div>
                            </td>
                        </tr>
                        <tr>
                            <th class="c-pageTable__th">お名前<span class="u-must">必須</span></th>
                            <td class="c-pageTable__td u-contact"><input name="name" type="text" class="c-input" required></td>
                        </tr>
                        <tr>
                            <th class="c-pageTable__th">メールアドレス<span class="u-must">必須</span></th>
                            <td class="c-pageTable__td u-contact"><input name="email" type="email" class="c-input" required></td>
                        </tr>
                        <tr>
                            <th class="c-pageTable__th">電話番号<span class="u-must">必須</span></th>
                            <td class="c-pageTable__td u-contact"><input name="tel" type="tel" class="c-input" required></td>
                        </tr>
                        <tr>
                            <th class="c-pageTable__th">お問い合わせ内容<span class="u-must">必須</span></th>
                            <td class="c-pageTable__td u-contact"><textarea name="comment" cols="30" rows="10"></textarea></td>
                        </tr>
                    </table>
                    <div class="p-contactBtns u-center">
                        <input type="reset" value="リセット " class="c-contactBtn u-center u-mr30">
                        <input type="submit" value="送信" class="c-contactBtn u-center u-bgIndigo u-white">
                    </div>
                </form>
            </section> -->
            <!-- /pageTable -->
        </div>
        <!-- /description -->
    </div>
    <!-- /page -->
</main>
<!-- /main -->


<?php get_footer(); ?>
