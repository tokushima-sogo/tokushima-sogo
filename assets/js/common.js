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
$(function () {
    $('.p-header__navListDetail').hide();
    $('.p-header__navList').click(function () {
        $(this).next('.p-header__navListDetail').slideToggle();
        $('.p-header__navList').not($(this)).next('.p-header__navListDetail').slideUp();
    });
});
$(document).on('click', function (e) {
    if (!$(e.target).closest('.p-header__navList').length) {
        $('.p-header__navList').next('.p-header__navListDetail').slideUp();
    }
});
// バーガーメニュー
$(function () {
    $('.p-BurgerNavDetail').hide();
    $('.c-header__contentsBurgerNavBtn').click(function () {
        $(this).next().slideToggle();
        $('.c-header__contentsBurgerNavBtn').not($(this)).next().slideUp();
    });
});
$(document).on('click', function (e) {
    if (!$(e.target).closest('.c-header__contentsBurgerNavBtn').length) {
        $('.c-header__contentsBurgerNavBtn').next('.p-BurgerNavDetail').slideUp();
    }
});
//フッター
$(window).on('load resize', function () {
    var w_width = $(window).width();
    $('.c-footer__contentsPartsBtn').on("click", function () {
        if (w_width < 1025) {
            $(this).next().slideToggle();
            $('.c-footer__contentsPartsBtn').not($(this)).next().slideUp();
            $(document).on('click', function (e) {
                if (!$(e.target).closest('.c-footer__contentsPartsBtn').length) {
                    $('.c-footer__contentsPartsBtn').next('.c-footer__contentsDetail').slideUp();
                }
            })
        }
    });
});
