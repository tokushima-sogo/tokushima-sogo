var show = 3; //最初に表示する件数
var num = 20;  //clickごとに表示したい件数
var first__contents = '.c-more1'; // 対象の記事 １つ目のカテゴリー
var secound__contents = '.c-more2'; //対象の記事 2つ目のカテゴリー
var third__contents = '.c-more3';  //対象の記事 3つ目のカテゴリー


jQuery(first__contents + ':nth-child(n + ' + (show + 1) + ')').addClass('is-hidden');
jQuery('.one').on('click', function () {
    jQuery(first__contents + '.is-hidden').slice(0, num).removeClass('is-hidden');
    if (jQuery(first__contents + '.is-hidden').length == 0) {
        jQuery('.one').fadeOut();
    }
});

jQuery(secound__contents + ':nth-child(n + ' + (show + 1) + ')').addClass('is-hidden');
jQuery('.two').on('click', function () {
    jQuery(secound__contents + '.is-hidden').slice(0, num).removeClass('is-hidden');
    if (jQuery(secound__contents + '.is-hidden').length == 0) {
        jQuery('.two').fadeOut();
    }
});

jQuery(third__contents + ':nth-child(n + ' + (show + 1) + ')').addClass('is-hidden');
jQuery('.three').on('click', function () {
    jQuery(third__contents + '.is-hidden').slice(0, num).removeClass('is-hidden');
    if (jQuery(third__contents + '.is-hidden').length == 0) {
        jQuery('.three').fadeOut();
    }
});
