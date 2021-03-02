<?php get_header(); ?>

<main>
    <section id="conceptBase">
        <div class="p-conceptBase__heading u-bgIndigo">
            <h2 class="p-conceptBase__heading__title u-white">お問い合わせフォーム</h2>
        </div>
        <!-- テーブルフォーム -->
        <div id="conceptBase__inner">
            <form action="#" id="form1" method="POST">
                <table class="p-conceptBase__formTable">
                    <tbody class="c-conceptBase__formTable__item">
                        <tr>
                            <th>件名*</th>
                            <td>
                                <select name="type" required>
                                    <option value>選択してください</option>
                                    <option value="1">質問1：掲載内容について</option>
                                    <option value="2">質問2：掲載希望</option>
                                    <option value="3">質問3：その他</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>お名前*</th>
                            <td>
                                <input name="name" type="text" class="input01" required>
                            </td>
                        </tr>
                        <tr>
                            <th>メールアドレス*</th>
                            <td>
                                <input name="email" type="text" class="input01" placeholder="(半角)" 　required>

                            </td>
                        </tr>
                        <tr>
                            <th>電話番号*</th>
                            <td>
                                <input name="tel" type="tel" class="input02" placeholder="(半角数字)" required>

                            </td>
                        </tr>
                        <tr class="c-conceptBase__formTable__item__textarea">
                            <th>お問い合わせ内容*</th>
                            <td>
                                <textarea name="comment" cols="30" rows="10"></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="c-contactSec__formTable__item__formButtons  ">
                    <input type="reset" value="リセット " class="button02 u-bgIndigo">
                    <input type="submit" value="送信" class="button02 u-bgIndigo">
                </div>
            </form>
        </div>
    </section>


    <!-- べーやんコード -->
    <section class="contact">
        <div class="contact--wrapper">
            <h1 class="contact--title">
                お問い合わせフォーム
            </h1>

            <form class="contact--form--wrapper" action="" method="post">
                <ul>
                    <li>
                        <label class="beige-wrap">件名</label>
                        <span class="white-wrap">質問１：掲載内容について</span>
                    </li>
                    <li>
                        <label class="beige-wrap">お名前</label>
                        <input type="text" id="name" name="user_name" class="white-wrap">　

                    </li>
                    <li>
                        <label class="beige-wrap">メールアドレス</label>
                        <input type="mail" id="mail-address" name="mail-address" class="white-wrap">　
                    </li>
                    <li>
                        <label class="beige-wrap">電話番号</label>
                        <input type="tel" name="tel" id="tel" class="white-wrap"></text>
                    </li>
                    <li id="text_area">
                        <label class="beige-wrap text_area">お問い合わせ内容</label>
                        <textarea name="contact-text" id="contact-text" class="white-wrap text_area"></textarea>
                    </li>
                    <li>
                        <div id="contact--button">
                            <input type="reset" value="リセット" class="contact--button"></input>
                            <input type="submit" value="入力内容確認" class="contact--button"></input>
                        </div>
                    </li>
                </ul>

            </form>
        </div>
    </section>

</main>


<?php get_footer(); ?>
