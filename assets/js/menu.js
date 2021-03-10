// PC用アコーディオンメニュー
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

// ハンバーガーボタン
jQuery(function () {
    jQuery('.c-burgerBtn').click(function () {
        jQuery(this).toggleClass("slide-in");
        if (jQuery(this).hasClass('slide-in')) {
            jQuery('.c-burgerBtn , .p-header__contentsBurger').addClass('slide-in');
        } else {
            jQuery('.c-burgerBtn , .p-header__contentsBurger').removeClass('slide-in');
        }
    });
});

// バーガー用アコーディオンメニュー
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


// フッターアコーディオンメニュー
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
