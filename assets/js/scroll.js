jQuery(function () {
    // 一番上のidを取得
    let top = jQuery('#scroll').offset().top;
    // スクロールしたい位置のidを取得
    var targetOffset = jQuery('#js_1f').offset().top;
    // 一番上から始まる指定
    jQuery('html,head').animate({ scrollTop: top }, 'slow').delay
        // 秒数はあとで変更する。スクロールしたい位置の指定
        (3000).animate({ scrollTop: targetOffset }, 'slow');
});
