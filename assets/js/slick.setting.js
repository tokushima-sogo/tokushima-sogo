// メインのスライド
$('.p-slickSlider').slick({
    infinite: true,      // スライドをループさせる
    fade: true,    // フェードを有効にする
    arrows: false,    // 左右の矢印なし
});

// サムネイルのスライド
$('.p-thumbSlider').slick({
    infinite: true,      // スライドをループさせる
    slidesToShow: 3,      // スライドを3つ表示
    focusOnSelect: true,      // フォーカスを有効にする
    asNavFor: '.p-slickSlider',      // 連動させるスライドショーの設定
});

// サムネイルをスライドさせずに連動して変更させる設定
$('.p-slickSlider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
    let index = nextSlide;
    // サムネイルのslick-currentを削除し次のスライドにslick-currentを追加
    $(".p-thumbSlider .slick-slide").removeClass("slick-current").eq(index).addClass("slick-current");
});
