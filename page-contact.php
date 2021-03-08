<?php get_header(); ?>

<link href="<?php echo get_template_directory_uri(); ?>/assets/css/reset.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/assets/css/base.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/assets/css/project.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/assets/css/compornent.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/assets/cspages/utility.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>assets/css/contact.css" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon_tokushima_sogo.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon_tokushima_sogo.png">

<main>

    <?php echo do_shortcode('[mwform_formkey key="193"]'); ?>
    <!-- <section id="conceptBase">
        <div class="p-conceptBase__heading u-bgIndigo">
            <h2 class="p-conceptBase__heading__title u-white">お問い合わせフォーム</h2>
        </div> -->
    <!-- テーブルフォーム -->
    <!-- <div id="conceptBase__inner">
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
    </section> -->

</main>


<?php get_footer(); ?>
