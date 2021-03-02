<?php get_header(); ?>

<main>
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
