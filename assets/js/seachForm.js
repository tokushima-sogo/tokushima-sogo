// エリアで探すのチェックアクション

// エリアのラジオボタンの値が変動したら発動
jQuery('input[name="ofarea[]"]').change(function () {

      // 南部のチェックが入ったとき
      if (jQuery('input[id="seach_south"]').prop('checked')) {
            // 親のクラスに背景色をつける/消す
            jQuery(this).parent().addClass("u-bgColor--8981ca");
            jQuery('input[id="seach_city"]').parent().removeClass("u-bgColor--8981ca");
            jQuery('input[id="seach_east"]').parent().removeClass("u-bgColor--8981ca");
            jQuery('input[id="seach_west"]').parent().removeClass("u-bgColor--8981ca");
      }
      // 徳島市のチェックが入ったとき
      else if (jQuery('input[id="seach_city"]').prop('checked')) {
            jQuery(this).parent().addClass("u-bgColor--8981ca");
            jQuery('input[id="seach_south"]').parent().removeClass("u-bgColor--8981ca");
            jQuery('input[id="seach_east"]').parent().removeClass("u-bgColor--8981ca");
            jQuery('input[id="seach_west"]').parent().removeClass("u-bgColor--8981ca");
      }
      // 東部のチェックが入ったとき
      else if (jQuery('input[id="seach_east"]').prop('checked')) {
            jQuery(this).parent().addClass("u-bgColor--8981ca");
            jQuery('input[id="seach_south"]').parent().removeClass("u-bgColor--8981ca");
            jQuery('input[id="seach_city"]').parent().removeClass("u-bgColor--8981ca");
            jQuery('input[id="seach_west"]').parent().removeClass("u-bgColor--8981ca");
      }
      // 西部のチェックが入ったとき
      else if (jQuery('input[id="seach_west"]').prop('checked')) {
            jQuery(this).parent().addClass("u-bgColor--8981ca");
            jQuery('input[id="seach_south"]').parent().removeClass("u-bgColor--8981ca");
            jQuery('input[id="seach_east"]').parent().removeClass("u-bgColor--8981ca");
            jQuery('input[id="seach_city"]').parent().removeClass("u-bgColor--8981ca");
      }
});


// 内容で探すのチェックアクション

// 内容のラジオボタンの値が変動したら発動
jQuery('input[name="ofpost_types[]"]').change(function () {

      // スポットのチェックが入ったとき
      if (jQuery('input[id="seach_spot"]').prop('checked')) {
            jQuery(this).parent().addClass("u-bgColor--8981ca");
            jQuery('input[id="seach_gourmet"]').parent().removeClass("u-bgColor--8981ca");
            jQuery('input[id="seach_shop"]').parent().removeClass("u-bgColor--8981ca");
      }
      // グルメのチェックが入ったとき
      else if (jQuery('input[id="seach_gourmet"]').prop('checked')) {
            jQuery(this).parent().addClass("u-bgColor--8981ca");
            jQuery('input[id="seach_spot"]').parent().removeClass("u-bgColor--8981ca");
            jQuery('input[id="seach_shop"]').parent().removeClass("u-bgColor--8981ca");
      }
      // ショップのチェックが入ったとき
      else if (jQuery('input[id="seach_shop"]').prop('checked')) {
            jQuery(this).parent().addClass("u-bgColor--8981ca");
            jQuery('input[id="seach_spot"]').parent().removeClass("u-bgColor--8981ca");
            jQuery('input[id="seach_gourmet"]').parent().removeClass("u-bgColor--8981ca");
      }
});





// ヘッダーナビ(検索 開く/閉じる)

jQuery(function () {
    jQuery('.p-seachArea').hide();
    jQuery('.p-header__seach').click(function (){
        jQuery('.p-seachArea').slideToggle();
    });
});

// 検索画面を閉じるボタン

jQuery(function () {
    jQuery('.c-button__seachForm__close').click(function (){
        jQuery('.p-seachArea').slideToggle();
    });
});
