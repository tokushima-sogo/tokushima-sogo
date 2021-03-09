
// 検索フォームのラジオボタン（チェックアクション）

// エリアで検索
$('.p-label__search--area').change(function () {
    $(this).addClass("u-searchRabel__change");
    $('.p-label__search--area').not($(this)).removeClass("u-searchLabel__change");
});


// 内容で検索
$('.p-label__search--content').change(function () {
    $(this).addClass("u-searchRabel__change");
    $('.p-label__search--content').not($(this)).removeClass("u-searchLabel__change");
});




// ヘッダーナビ(検索 開く/閉じる)

$(function () {
    $('.l-searchArea').hide();
    $('.p-header__search').click(function () {
        $('.l-searchArea').slideToggle();
    });
});

// 検索画面を閉じるボタン
$(function () {
    $('.c-button__searchForm--close').click(function () {
        $('.l-searchArea').slideToggle();
    });
});
