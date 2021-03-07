// エレベーター部分動き
//window高さ取得
// let w_height = $(window).height();
// console.log(w_height);
let currentY = 0; //スクロールしたY座標を補完する
let elevator = document.getElementById('elevator');
// これいる？
window.onload = function () {
    elevator.classList.add('lift6');
};
window.addEventListener("scroll", function () {
    //スクロールしたときに動作するイベントリスナー
    let currentY = window.pageYOffset; //スクロールしたY座標を取得する
    //ターゲット要素のtopからの位置取得
    let FloorSix = document.getElementById('js_6f').offsetTop;
    let FloorFive = document.getElementById('js_5f').offsetTop;
    let FloorFour = document.getElementById('js_4f').offsetTop;
    let FloorThree = document.getElementById('js_3f').offsetTop;
    let FloorTwo = document.getElementById('js_2f').offsetTop;
    let FloorOne = document.getElementById('js_1f').offsetTop;
    let Floorbasement = document.getElementById('js_basement').offsetTop;
    if (currentY == FloorSix) {
        elevator.classList.remove('lift5', 'lift4', 'lift3', 'lift2', 'lift1', 'liftbasement');
        elevator.classList.add('lift6');
    } else if (currentY > FloorSix && currentY < FloorFive) {
        elevator.classList.remove('lift6', 'lift4', 'lift3', 'lift2', 'lift1', 'liftbasement');
        elevator.classList.add('lift5');
    } else if (currentY > FloorFive && currentY < FloorFour) {
        elevator.classList.remove('lift6', 'lift5', 'lift3', 'lift2', 'lift1', 'liftbasement');
        elevator.classList.add('lift4');
    } else if (currentY > FloorFour && currentY < FloorThree) {
        elevator.classList.remove('lift6', 'lift5', 'lift4', 'lift2', 'lift1', 'liftbasement');
        elevator.classList.add('lift3');
    } else if (currentY > FloorThree && currentY < FloorTwo) {
        elevator.classList.remove('lift6', 'lift5', 'lift4', 'lift3', 'lift1', 'liftbasement');
        elevator.classList.add('lift2');
    } else if (currentY > FloorTwo && currentY < FloorOne) {
        elevator.classList.remove('lift6', 'lift5', 'lift4', 'lift3', 'lift2', 'liftbasement');
        elevator.classList.add('lift1');
    } else if (currentY > FloorOne && currentY < Floorbasement) {
        elevator.classList.remove('lift6', 'lift5', 'lift4', 'lift3', 'lift2', 'lift1');
        elevator.classList.add('liftbasement');
    };
    // console.log(currentY);
});
