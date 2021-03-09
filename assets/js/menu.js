// PC用アコーディオンメニュー
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

// ハンバーガーボタン
$(function () {
    $('.c-burgerBtn').click(function () {
        $(this).toggleClass("slide-in");
        if ($(this).hasClass('slide-in')) {
            $('.c-burgerBtn , .p-header__contentsBurger').addClass('slide-in');
        } else {
            $('.c-burgerBtn , .p-header__contentsBurger').removeClass('slide-in');
        }
    });
});

// バーガー用アコーディオンメニュー
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


// フッターアコーディオンメニュー
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
