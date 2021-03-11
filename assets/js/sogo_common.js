// //スライドさせるボタンのID
// const SLIDE_IN_BUTTON = document.getElementById("c-elevatorOpen");
// //スライドを閉じるボタンのID
// const SLIDE_OFF_BUTTON = document.getElementById("c-elevatorClose");
// //アニメーションを追加する場所のID
// const BURGER = document.getElementById("p-header__contentsBurger");
// //スライドさせる。（クラス名「slide-in」を追加する。）
// SLIDE_IN_BUTTON.addEventListener("click", function () {
//     //クラスを切り替える
//     BURGER.classList.remove("slide-off");
//     BURGER.classList.add("slide-in");
// });
// //スライドを閉じる。クラス名「slide-off」を追加する。
// SLIDE_OFF_BUTTON.addEventListener("click", function () {
//     //クラスを切り替える
//     BURGER.classList.remove("slide-in");
//     BURGER.classList.add("slide-off");
// });

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
jQuery('.c-footer__contentsPartsBtn').on("click", function () {
    var width = jQuery(window).width();
    if (width < 1025) {
        console.log(width);
        jQuery(this).next().slideToggle();
        jQuery('.c-footer__contentsPartsBtn').not(jQuery(this)).next().slideUp();

        jQuery('.c-footer__contentsPartsBtn').not(jQuery(this)).next().on('click',
            function (e) {
                if (!jQuery(e.target).closest('.c-footer__contentsPartsBtn').length) {
                    jQuery('.c-footer__contentsPartsBtn').next('.c-footer__contentsDetail').slideUp();
                }
            })
    }
});

// 地下からのページ内リンク
jQuery('#page-link a[href^="#"]').click(function () {
    var adjust = 120;
    var speed = 400;
    var elmHash = jQuery(this).attr('href');
    var pos = jQuery(elmHash).offset().top - adjust;
    console.log('hello');
    jQuery('body,html').animate({ scrollTop: pos }, speed, 'swing');
    return false;
});

// // ヘッダーナビ
// jQuery(function () {
//     jQuery('.p-header__navListDetail').hide();
//     jQuery('.p-header__navList').click(function () {
//         jQuery(this).next('.p-header__navListDetail').slideToggle();
//         jQuery('.p-header__navList').not(jQuery(this)).next('.p-header__navListDetail').slideUp();
//     });
// });
// jQuery(document).on('click', function (e) {
//     if (!jQuery(e.target).closest('.p-header__navList').length) {
//         jQuery('.p-header__navList').next('.p-header__navListDetail').slideUp();
//     }
// });

// // ハンバーガーボタン
// jQuery(function () {
//     jQuery('.c-burgerBtn').click(function () {
//         jQuery(this).toggleClass("slide-in");
//         if (jQuery(this).hasClass('slide-in')) {
//             jQuery('.c-burgerBtn , .p-header__contentsBurger').addClass('slide-in');
//         } else {
//             jQuery('.c-burgerBtn , .p-header__contentsBurger').removeClass('slide-in');
//         }
//     });
// });

// // バーガーメニュー
// jQuery(function () {
//     jQuery('.p-BurgerNavDetail').hide();
//     jQuery('.c-header__contentsBurgerNavBtn').click(function () {
//         jQuery(this).next().slideToggle();
//         jQuery('.c-header__contentsBurgerNavBtn').not(jQuery(this)).next().slideUp();
//     });
// });
// jQuery(document).on('click', function (e) {
//     if (!jQuery(e.target).closest('.c-header__contentsBurgerNavBtn').length) {
//         jQuery('.c-header__contentsBurgerNavBtn').next('.p-BurgerNavDetail').slideUp();
//     }
// });

// //フッター
// jQuery('.c-footer__contentsPartsBtn').on("click", function () {
//     var width = jQuery(window).width();
//     if (width < 1025) {
//         console.log(width);
//         jQuery(this).next().slideToggle();
//         jQuery('.c-footer__contentsPartsBtn').not(jQuery(this)).next().slideUp();
//     }
// });

// //これは独立させる
// jQuery(document).on('click', function (e) {
//     if (!jQuery(e.target).closest('.c-footer__contentsPartsBtn').length) {
//         jQuery('.c-footer__contentsPartsBtn').next('.c-footer__contentsDetail').slideUp();
//     }
// });
