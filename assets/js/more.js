var show = 3; //最初に表示する件数
var num = 20;  //clickごとに表示したい件数
var first__contents = '.more1'; // 対象の記事 １つ目のカテゴリー
var secound__contents = '.more2'; //対象の記事 2つ目のカテゴリー
var third__contents = '.more3';  //対象の記事 3つ目のカテゴリー


$(first__contents + ':nth-child(n + ' + (show + 1) + ')').addClass('is-hidden');
$('.one').on('click', function () {
    $(first__contents + '.is-hidden').slice(0, num).removeClass('is-hidden');
    if ($(first__contents + '.is-hidden').length == 0) {
        $('.one').fadeOut();
    }
});

$(secound__contents + ':nth-child(n + ' + (show + 1) + ')').addClass('is-hidden');
$('.two').on('click', function () {
    $(secound__contents + '.is-hidden').slice(0, num).removeClass('is-hidden');
    if ($(secound__contents + '.is-hidden').length == 0) {
        $('.two').fadeOut();
    }
});

$(third__contents + ':nth-child(n + ' + (show + 1) + ')').addClass('is-hidden');
$('.three').on('click', function () {
    $(third__contents + '.is-hidden').slice(0, num).removeClass('is-hidden');
    if ($(third__contents + '.is-hidden').length == 0) {
        $('.three').fadeOut();
    }
});
