//スライドさせるボタンのID
const SLIDE_IN_BUTTON = document.getElementById("c-elevatorOpen");
//スライドを閉じるボタンのID
const SLIDE_OFF_BUTTON = document.getElementById("c-elevatorClose");
//アニメーションを追加する場所のID
const BURGER = document.getElementById("p-header__contentsBurger");
//スライドさせる。（クラス名「slide-in」を追加する。）
SLIDE_IN_BUTTON.addEventListener("click", function () {
    //クラスを切り替える
    BURGER.classList.remove("slide-off");
    BURGER.classList.add("slide-in");
});
//スライドを閉じる。クラス名「slide-off」を追加する。
SLIDE_OFF_BUTTON.addEventListener("click", function () {
    //クラスを切り替える
    BURGER.classList.remove("slide-in");
    BURGER.classList.add("slide-off");
});
// ヘッダーナビ
jQuery(function () {
    jQuery('.p-header__navListDetail').hide();
    jQuery('.p-header__navList').click(function () {
        jQuery(this).next('.p-header__navListDetail').slideToggle();
        jQuery('.p-header__navList').not(jQuery(this)).next('.p-header__navListDetail').slideUp();
    });
});
jQuery(document).on('click', function (e) {
    if (!jQuery(e.target).closest('.p-header__navList').length) {
        jQuery('.p-header__navList').next('.p-header__navListDetail').slideUp();
    }
});
// バーガーメニュー
jQuery(function () {
    jQuery('.p-BurgerNavDetail').hide();
    jQuery('.c-header__contentsBurgerNavBtn').click(function () {
        jQuery(this).next().slideToggle();
        jQuery('.c-header__contentsBurgerNavBtn').not(jQuery(this)).next().slideUp();
    });
});
jQuery(document).on('click', function (e) {
    if (!jQuery(e.target).closest('.c-header__contentsBurgerNavBtn').length) {
        jQuery('.c-header__contentsBurgerNavBtn').next('.p-BurgerNavDetail').slideUp();
    }
});
//フッター
jQuery(window).on('load resize', function () {
    var w_width = jQuery(window).width();
    jQuery('.c-footer__contentsPartsBtn').on("click", function () {
        if (w_width < 1025) {
            jQuery(this).next().slideToggle();
            jQuery('.c-footer__contentsPartsBtn').not(jQuery(this)).next().slideUp();
            jQuery(document).on('click', function (e) {
                if (!jQuery(e.target).closest('.c-footer__contentsPartsBtn').length) {
                    jQuery('.c-footer__contentsPartsBtn').next('.c-footer__contentsDetail').slideUp();
                }
            })
        }
    });
});
