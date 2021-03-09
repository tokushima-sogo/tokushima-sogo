// 最初のアニメーション
$('body').append(
    '<style>body{display:none;}'
);
$(window).on("load", function () {
    $('body').delay(1000).fadeIn("slow");
});
