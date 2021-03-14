//【残り工程】
/*
→阿波度のコメントをどうするか
*/
//スマホの画面直したとき，画面のみ再リロードさせる。

// const PATH = "http://localhost/wp-content/themes/sogo/"; phpの中でパスをGETしている。
//canvas設定
const CANVAS = document.getElementById("canvas");
const CTX = CANVAS.getContext("2d");
//const HEADER = document.getElementById("header_size");

//運用時のキャンバスの大きさ
CANVAS.width = window.innerWidth * 0.9;
CANVAS.height = window.innerHeight * 0.9;
//ヘッダーのサイズ分マージンにあてる。
//const HEADER_HEIGHT = HEADER.scrollHeight;
//const CANVAS_HEIGHT = CANVAS.scrollHeight;

//CANVAS.style.marginTop = HEADER_HEIGHT + "px";
//CANVAS.width = 1600;開発時の初期画面サイズ
//CANVAS.height = 900;開発時の初期画面サイズ

//キャンバスサイズチェック（デバッグ用）
console.log(CANVAS.width);
console.log(CANVAS.height);


//画像
const CORRECT_IMG = new Image();
CORRECT_IMG.src = PATH + "/assets/images/quiz/correct.png";
const MISTAKE_IMG = new Image();
MISTAKE_IMG.src = PATH + "/assets/images/quiz/mistake.png";
const START1_IMG = new Image();
START1_IMG.src = PATH + "/assets/images/quiz/start1.png";
const START2_IMG = new Image();
START2_IMG.src = PATH + "/assets/images/quiz/start2.png";
const RESULT_IMG = new Image();
RESULT_IMG.src = PATH + "/assets/images/quiz/result.png";
const LINK_IMG = new Image();
LINK_IMG.src = PATH + "/assets/images/quiz/link.png";
const CLICK1_IMG = new Image();
CLICK1_IMG.src = PATH + "/assets/images/quiz/click1.png";
const CLICK2_IMG = new Image();
CLICK2_IMG.src = PATH + "/assets/images/quiz/click2.png";

//BGM
const CORRECT_MP3 = new Audio(PATH + "/assets/audio/correct.mp3");
CORRECT_MP3.loop = false;
const MISTAKE_MP3 = new Audio(PATH + "/assets/audio/mistake.mp3");
MISTAKE_MP3.loop = false;
const BGM_MP3 = new Audio(PATH + "/assets/audio/bgm.mp3");
BGM_MP3.loop = true;
BGM_MP3.volume = 0.3;

//重要なパラメーター
const FPS = 10;
let nextSwitchTime = 1000;      //次の問題までの時間
let totalQuestionNumber = 10;   //総問題数【10個がデフォルト】

//[問題文,正解,不正解,不正解,不正解]
let protoQuestions = [
    ["アジアで初めてベートーヴェンの交響曲第九番が演奏された地域はどこ？", "鳴門市", "徳島市", "小松島市", "吉野川市"],
    ["次の有名人のうち，徳島県出身でない人は誰？", "大塚愛さん", "アンジェラアキさん", "米津玄師さん", "板東英二さん"],
    ["四国八十八個所の一番札所はどこ？", "霊山寺", "極楽寺", "安楽寺", "地蔵寺"],
    ["徳島県が全国１位をとったことがないものはどれ", "下水道普及率", "人口あたりの医師数", "女性社長率", "人口あたりの幼稚園数"],
    ["徳島県を西から東に流れる吉野川の別名は次のうちのどれ？", "四国三郎", "四国太郎", "四国次郎", "四国四郎"],
    ["徳島県を拠点にしているアニメ制作会社は次のうちのどれ？", "Ufotable", "A-1 Pictures", "P.A.WORKS", "タツノコプロ"],
    ["徳島県をモデルにしたことがないアニメ作品は次のうちのどれ？", "名探偵コナン", "平成狸合戦ぽんぽこ", "涼宮ハルヒの憂鬱", "蟲師"],
    ["アメリカのロッキー山脈、イタリアのチロル地方の土柱と並んで「世界三大奇勝」と称されている土柱がある地域は？", "阿波市", "吉野川市", "鳴門市", "三好市"],
    ["徳島発祥の妖怪は？", "こなきじじい", "ぬりかべ", "いったんもめん", "砂かけばばあ"],
    ["徳島発祥の企業でないものはどれ？", "キッコーマン", "日本ハム", "大塚製薬", "ジャストシステム"],
    ["徳島県のゆるキャラでないのはどれ？", "くろしおくん", "ヨッピー", "秘境竜", "あいのすけ"],
    ["徳島の方言で「せこい」とは、どう意味？（例）「せこいなあ」", "しんどい", "いやらしい", "ずるい", "腹が立つ"],
    ["徳島の方言で「むつごい」とは、どういう意味？（例）「むつごい味」", "味が濃い", "からい", "さっぱりしている", "甘い"],
    ["徳島の方言で「めげる」とは、どういう意味？", "壊れる", "目をける", "あまやかす", "歩き回る"],
    ["徳島の方言で「どくれる」とは、どういう意味？", "すねる", "隠れる", "夢中になる", "疲れる"],
    ["徳島の方言で「あばばい」とは、どういう意味？", "まぶしい", "危ない", "うろたえる", "あわてる"],
    ["徳島の方言で「かんまんかんまん！」とは、どういう意味？", "いいよいいよ！", "がまんがまん！", "落ち着いて落ち着いて！", "やめてやめて！"],
    ["阿波踊りの歴史は何年？", "400年", "100年", "200年", "300年"],
    ["阿波踊りの掛け声の「ヤットサー！」とは、どういう意味？", "久しぶり！", "がんばるぞ！", "はじめるぞ！", "やってられるか！"],
    ["徳島で開かれるアニメイベント「マチ★アソビ」では、眉山に続くロープウェイのアナウンスが、イベント期間中、有名なアニメ声優によって吹き替えられます。その吹き替えをしたことがない声優は誰？（※2021年3月現在）", "杉田智和", "水樹奈々", "花澤香菜", "大塚明夫"]
];

//その他
let nowTime = 0;
let TimerTime = 0;
let remainNowTime = 0;
let s = 0;
let mode = 0;               //0スタート画面,1ゲーム画面,2終了画面
let point = 0;              //得点
let clickEnable = false;    //クリックの許可
//timerで仕様
let startTime = 0;          //スタートボタンを押した時間を取得
let gameRound = null;       //timerの変数名    ゲームサイクル

//class mobile
let rowStringCount = 0;      //mobileで設定，DRAWで使用。一行の文字数
let textSize = 0;           //monileで設定,questionDrawで仕様
let isMobile = false;         //スマホかPC・タブレットか判定
let fontMode = 0;               //画面サイズに合わせたフォントサイズ指定
let answerCircleSize = 0;
//class draw
let nowQuestionNumber = 0;
let theQuestionNumber = [];
let lineWidth = 10;
let resultAnime = null;
//class QUIZ
let setQuestions = [];                      //出題の問題
let questions = [[]];                       //クイズと解答の配列
let setQuestionNumbers = [];                //出題の番号順

//judge
let answerJudge = null;
let answerNumber = 0;
/**
 * レスポンシブ対応のクラス
 *
 * スマホ判定+横向き依頼
 * isSmartPhone()
 *
 * フォントサイズのレスポンシブ
 * timeFont()
 * answerCircleFont()
 *
 * コンストラクター【MOBILE】
 */
class mobile {
    //もしスマホなら横向きに直すようにお願いする（半強制）。
    isSmartPhone() {
        if (navigator.userAgent.match(/iPhone|Android.+Mobile/)) {
            isMobile = true;
            console.log("スマホ");
            if (window.innerHeight > window.innerWidth) {
                alert("このゲームは横向き対応です。横向きに変更した後，再度更新し直してください");
                CTX.fillStyle = "black";
                CTX.globalAlpha = 0.3;                                                          //画面暗くして強制的に促す。
                CTX.fillRect(0, 0, CANVAS.width, CANVAS.height);
            }
        } else {
            if (CANVAS.width > 1700) {
                fontMode = 4;
                console.log("width:1700以上のPC")
            }
            else if (CANVAS.width > 1350) {
                fontMode = 3;
                console.log("width:1350以上のPC")
            } else if (CANVAS.width >= 1050) {
                fontMode = 2;
                console.log("width:1050以上のPC")
            }
            else if (CANVAS.width < 1050) {
                fontMode = 1;
                console.log("width:1000以下のPCかIPAD")
            }
        }
    }
    //行の文字数
    rowStringCount() {
        if (isMobile == true) {
            rowStringCount = 24;
        } else {
            if (CANVAS.width > 2000) {
                fontMode = 4;
                rowStringCount = 32;
                console.log("width:1700以上のPC")
            }
            if (CANVAS.width > 1700) {
                fontMode = 4;
                rowStringCount = 29;
                console.log("width:1700以上のPC")
            }
            else if (CANVAS.width > 1600) {
                fontMode = 3;
                rowStringCount = 30;
                console.log("width:1350以上のPC")
            } else if (CANVAS.width > 1500) {
                fontMode = 2;
                rowStringCount = 27;
                console.log("width:1050以上のPC")
            } else if (CANVAS.width > 1400) {
                fontMode = 2;
                rowStringCount = 29;
                console.log("width:1050以上のPC")
            }
            else if (CANVAS.width > 1300) {
                fontMode = 2;
                rowStringCount = 27;
                console.log("width:1050以上のPC")
            }
            else if (CANVAS.width > 1200) {
                fontMode = 2;
                rowStringCount = 24;
                console.log("width:1050以上のPC")
            }
            else if (CANVAS.width > 1100) {
                fontMode = 2;
                rowStringCount = 23;
                console.log("width:1050以上のPC")
            }
            else if (CANVAS.width > 1000) {
                fontMode = 2;
                rowStringCount = 22;
                console.log("width:1050以上のPC")
            }
            else if (CANVAS.width > 900) {
                fontMode = 1;
                rowStringCount = 24;
                console.log("width:1000以下のPCかIPAD")
            }
            else if (CANVAS.width > 800) {
                fontMode = 1;
                rowStringCount = 22;
                console.log("width:1000以下のPCかIPAD")
            } else if (CANVAS.width >= 700) {
                fontMode = 1;
                rowStringCount = 22;
                console.log("width:1000以下のPCかIPAD")
            }
            else if (CANVAS.width < 700) {
                fontMode = 1;
                rowStringCount = 18;
                console.log("width:1000以下のPCかIPAD")
            }
        }
    }
    //解答番号の文字の大きさ    resultにも
    answerCircleFont() {
        if (isMobile == true) {
            CTX.font = "18px 'mamelon-fonts5','sans-serif',serif";
        } else {
            if (fontMode == 4) {
                CTX.font = "45px 'mamelon-fonts5','sans-serif',serif";
            } else if (fontMode == 3) {
                CTX.font = "38px 'mamelon-fonts5','sans-serif',serif";
            } else if (fontMode == 2) {
                CTX.font = "31px 'mamelon-fonts5','sans-serif',serif";
            } else if (fontMode == 1) {
                CTX.font = "24px 'mamelon-fonts5','sans-serif',serif";
            }

        }
    }
    //解答文字の大きさ
    answerFont() {
        if (isMobile == true) {
            CTX.font = "11px 'mamelon-fonts5','sans-serif',serif";
        } else {
            if (fontMode == 4) {
                CTX.font = "36px 'mamelon-fonts5','sans-serif',serif";
            } else if (fontMode == 3) {
                CTX.font = "32px 'mamelon-fonts5','sans-serif',serif";
            } else if (fontMode == 2) {
                CTX.font = "26px 'mamelon-fonts5','sans-serif',serif";
            } else if (fontMode == 1) {
                CTX.font = "22px 'mamelon-fonts5','sans-serif',serif";
            }
        }
    }
    //時間の文字の大きさ
    timeFont() {
        if (isMobile == true) {
            CTX.font = "15px 'mamelon-fonts5','sans-serif',serif";
        } else {
            if (fontMode == 4) {
                CTX.font = "36px 'mamelon-fonts5','sans-serif',serif";
            } else if (fontMode == 3) {
                CTX.font = "32px 'mamelon-fonts5','sans-serif',serif";
            } else if (fontMode == 2) {
                CTX.font = "27px 'mamelon-fonts5','sans-serif',serif";
            } else if (fontMode == 1) {
                CTX.font = "22px 'mamelon-fonts5','sans-serif',serif";
            }
        }
    }
    //問題文
    questionFont() {
        if (isMobile == true) {
            CTX.font = "15px 'mamelon-fonts5','sans-serif',serif";
            textSize = 15;
        } else {
            if (fontMode == 4) {
                CTX.font = "45px 'mamelon-fonts5','sans-serif',serif";
                textSize = 45;
            } else if (fontMode == 3) {
                CTX.font = "42px 'mamelon-fonts5','sans-serif',serif";
                textSize = 37.5;
            } else if (fontMode == 2) {
                CTX.font = "38px 'mamelon-fonts5','sans-serif',serif";
                textSize = 35;
            } else if (fontMode == 1) {
                CTX.font = "28px 'mamelon-fonts5','sans-serif',serif";
                textSize = 25;
            }
        }
    }
    //最終点数
    finishResultFont() {
        if (isMobile == true) {
            CTX.font = "40px PixelMplus10-Regular";
        } else {
            if (fontMode == 4) {
                CTX.font = "198px PixelMplus10-Regular";
            } else if (fontMode == 3) {
                CTX.font = "140px PixelMplus10-Regular";
            } else if (fontMode == 2) {
                CTX.font = "100px PixelMplus10-Regular";
            } else if (fontMode == 1) {
                CTX.font = "100px PixelMplus10-Regular";
            }
        }
    }
    //コメント
    commentFont() {
        if (isMobile == true) {
            CTX.font = "28px PixelMplus10-Regular";
        } else {
            if (fontMode == 4) {
                CTX.font = "90px PixelMplus10-Regular";
            } else if (fontMode == 3) {
                CTX.font = "68px PixelMplus10-Regular";
            } else if (fontMode == 2) {
                CTX.font = "53px PixelMplus10-Regular";
            } else if (fontMode == 1) {
                CTX.font = "40px PixelMplus10-Regular";
            }
        }
    }
    //クレジット表記
    creditFont() {
        if (isMobile == true) {
            CTX.font = "9px 'mamelon-fonts5','sans-serif',serif";
        } else {
            if (fontMode == 4) {
                CTX.font = "27px 'mamelon-fonts5','sans-serif',serif";;
            } else if (fontMode == 3) {
                CTX.font = "20px 'mamelon-fonts5','sans-serif',serif";
            } else if (fontMode == 2) {
                CTX.font = "16px 'mamelon-fonts5','sans-serif',serif";
            } else if (fontMode == 1) {
                CTX.font = "12px 'mamelon-fonts5','sans-serif',serif";
            }
        }
    }

    ansCirSize() {
        if (isMobile == true) {
            answerCircleSize = CANVAS.height * 0.0444;
        } else {
            if (fontMode == 4) {
                answerCircleSize = CANVAS.height * 0.04;
            } else if (fontMode == 3) {
                answerCircleSize = CANVAS.height * 0.036;
            } else if (fontMode == 2) {
                answerCircleSize = CANVAS.height * 0.032;
            } else if (fontMode == 1) {
                answerCircleSize = CANVAS.height * 0.028;
            }
        }
    }
}
const MOBILE = new mobile();

/**
 * クリック判定
 */
//let clickJudge = false;

let clickNumber = 0;
canvas.addEventListener("click", onClick, true);
function onClick(e) {
    let clickX = 0;
    let clickY = 0;

    //clientXブラウザの端から+キャンバスからのクリック位置-offsetLeft：キャンバスまでの長さ＝正確なクリック位置【ボツ】
    /* clickX = e.clientX - CANVAS.offsetLeft;
    clickY = e.clientY - CANVAS.offsetTop; */

    //キャンバスのクリック位置
    /* let rect = e.currentTarget.getBoundingClientRect(); */
    let rect = e.target.getBoundingClientRect();
    clickX = e.clientX - rect.left;
    clickY = e.clientY - rect.top;

    /*  clickX = e.offsetX;
     clickY = e.offsetY; */

    //クリックチェック（デバッグ用）
    /*     console.log("クリックX" + clickX);
        console.log("クリックY" + clickY);
        console.log("1のｘ始点" + DRAW.answer1X);
        console.log("1のY始点" + DRAW.answer1Y);
        console.log("2のｘ始点" + DRAW.answer2X);
        console.log("2のY始点" + DRAW.answer2Y);
        console.log("3のｘ始点" + DRAW.answer3X);
        console.log("3のY始点" + DRAW.answer3Y);
        console.log("4のｘ始点" + DRAW.answer4X);
        console.log("4のY始点" + DRAW.answer4Y); */

    //クリック範囲表示（デバッグ用）
    /*  CTX.fillStyle = "red";
     CTX.fillRect(clickX, clickY, DRAW.answerWidth, DRAW.answerHeight); */

    //解答をクリックしたとき
    if (mode == 1 && clickEnable == true) {
        if ((DRAW.answer1X <= clickX && clickX <= (DRAW.answer1X + DRAW.answerWidth)) && (DRAW.answer1Y <= clickY && (clickY <= (DRAW.answer1Y + DRAW.answerHeight)))) {
            //clickJudge = true;
            clickNumber = 1;
            console.log("クリックしたのは【１】");
            SYSTEM.judge();
            DRAW.teachAnswer();
        } else if ((DRAW.answer2X <= clickX && clickX <= (DRAW.answer2X + DRAW.answerWidth)) && (DRAW.answer2Y <= clickY && (clickY <= (DRAW.answer2Y + DRAW.answerHeight)))) {
            //clickJudge = true;
            clickNumber = 2;
            console.log("クリックしたのは【２】");
            SYSTEM.judge();
            DRAW.teachAnswer();
        } else if ((DRAW.answer3X <= clickX && clickX <= (DRAW.answer3X + DRAW.answerWidth)) && (DRAW.answer3Y <= clickY && (clickY <= (DRAW.answer3Y + DRAW.answerHeight)))) {
            //clickJudge = true;
            clickNumber = 3;
            console.log("クリックしたのは【３】");
            SYSTEM.judge();
            DRAW.teachAnswer();
        } else if ((DRAW.answer4X <= clickX && clickX <= (DRAW.answer4X + DRAW.answerWidth)) && (DRAW.answer4Y <= clickY && (clickY <= (DRAW.answer4Y + DRAW.answerHeight)))) {
            //clickJudge = true;
            clickNumber = 4;
            console.log("クリックしたのは【４】");
            SYSTEM.judge();
            DRAW.teachAnswer();
        }
        clickEnable = false;
    }
    if (mode == 2) {
        window.addEventListener("click", function () {
            clearInterval(resultAnime);
            location.href = "https://heroxs3v38.xsrv.jp/tokushima-sogo/";
        })
    }
}
let inputStr = "";

/**
 * 描画関係
 *
 * コンストラクター名【DRAW】
 */

class draw {
    startDraw1() {
        CTX.drawImage(START1_IMG, 0, 0, CANVAS.width, CANVAS.height);
    }
    startDraw2() {
        CTX.drawImage(START2_IMG, 0, 0, CANVAS.width, CANVAS.height);
    }
    untilAnswerDraw() {
        //背景
        CTX.fillStyle = "yellow";
        CTX.fillRect(CANVAS.width * 0.15625, CANVAS.height * 0.02222, CANVAS.width * 0.65625, CANVAS.height * 0.06666);
    }
    //第〇問目
    theQuestionNumberDraw() {
        for (let i = 1; i < (totalQuestionNumber + 1); i++) {
            CTX.fillStyle = "red";
            MOBILE.timeFont();
            CTX.fillText("第" + (nowQuestionNumber + 1) + "問目", CANVAS.width * 0.43, CANVAS.height * 0.075,);
        }
    }

    //今までの解答の成否
    resultDraw() {
        for (let i = 0; i < (totalQuestionNumber); i++) {
            if (results[i] == 1) {
                MOBILE.answerCircleFont();
                CTX.fillStyle = "red";
                if (i < 5) {
                    CTX.fillText("〇", ((CANVAS.width * 0.18) + (CANVAS.width * 0.05 * i)), CANVAS.height * 0.075,);
                } else {
                    CTX.fillText("〇", ((CANVAS.width * 0.3) + (CANVAS.width * 0.05 * i)), CANVAS.height * 0.075,);
                }
            } else if (results[i] == 2) {
                MOBILE.answerCircleFont();
                CTX.fillStyle = "blue";
                if (i < 5) {
                    CTX.fillText("☓", ((CANVAS.width * 0.18) + (CANVAS.width * 0.05 * i)), CANVAS.height * 0.075,);
                } else {
                    CTX.fillText("☓", ((CANVAS.width * 0.3) + (CANVAS.width * 0.05 * i)), CANVAS.height * 0.075,);
                }
            } else {
                MOBILE.answerCircleFont();
                CTX.fillStyle = "gray";
                if (i < 5) {
                    CTX.fillText("□", ((CANVAS.width * 0.18) + (CANVAS.width * 0.05 * i)), CANVAS.height * 0.075,);
                } else {
                    CTX.fillText("□", ((CANVAS.width * 0.3) + (CANVAS.width * 0.05 * i)), CANVAS.height * 0.075,);
                }
            }
        }
    }
    //問題文大枠
    questionFrameDraw() {
        CTX.strokeStyle = "orange";
        CTX.lineWidth = 5;
        CTX.strokeRect(CANVAS.width * 0.09375, CANVAS.height * 0.13333, CANVAS.width * 0.8125, CANVAS.height * 0.33333);
    }
    /* questionTextDraw() {
        CTX.fillStyle = "white";
        MOBILE.questionFont();
        CTX.fillText(questions[nowQuestionNumber][0], CANVAS.width * 0.16, CANVAS.height * 0.2);
    } */
    //問題文生成（自動改行付き）
    questionTextDraw() {
        MOBILE.questionFont();
        CTX.fillStyle = "white";
        let inputText = questions[setQuestionNumbers[nowQuestionNumber]][0].split("");
        let rowText = [];
        rowText[0] = "";
        let rowText_cnt = 0;

        for (let i = 0; i < inputText.length; i++) {
            let text = inputText[i];
            //一行の文字数が，規定の文字数を超えたら，KEYの数字に1足して，新たな箱の中に一行当たりのテキストを保管していく。
            if (rowText[rowText_cnt].length >= rowStringCount) {
                rowText_cnt++;
                rowText[rowText_cnt] = "";
            }
            //もし，改行を見つけたら
            if (text == "\n") {
                rowText_cnt++;
                rowText[rowText_cnt] = "";
                text = "";//一文字下げる
            }
            //一行あたりのテキストを管理する配列に１文字加える
            rowText[rowText_cnt] += text;
        }

        for (let i = 0; i < rowText.length; i++) {
            inputStr = rowText[i].split("");
            for (let j = 0; j < inputStr.length; j++) {
                CTX.fillText(inputStr[j], ((j * textSize) + CANVAS.width * 0.13), ((i * textSize) + CANVAS.height * 0.2));
            }
        }
    }
    //解答枠
    answerWidth = CANVAS.width * 0.375;
    answerHeight = CANVAS.height * 0.1;
    answer1X = CANVAS.width * 0.09375;
    answer1Y = CANVAS.height * 0.6;
    answer2X = CANVAS.width * 0.5125;
    answer2Y = CANVAS.height * 0.6;
    answer3X = CANVAS.width * 0.09375;
    answer3Y = CANVAS.height * 0.7444;
    answer4X = CANVAS.width * 0.5125;
    answer4Y = CANVAS.height * 0.7444;;
    answerFrameDraw() {
        CTX.fillStyle = "white";
        CTX.fillRect(this.answer1X, this.answer1Y, this.answerWidth, this.answerHeight);
        CTX.fillRect(this.answer2X, this.answer2Y, this.answerWidth, this.answerHeight);
        CTX.fillRect(this.answer3X, this.answer3Y, this.answerWidth, this.answerHeight);
        CTX.fillRect(this.answer4X, this.answer4Y, this.answerWidth, this.answerHeight);
    }
    //時間表示
    drawTime() {
        CTX.fillStyle = "white";
        MOBILE.timeFont();
        CTX.fillText("Time", CANVAS.width * 0.45625, CANVAS.height * 0.52222);
        CTX.fillText(remainNowTime, CANVAS.width * 0.45625, CANVAS.height * 0.5666);
    }

    //解答の枠


    answerNumberDraw() {

        //1番目
        CTX.fillStyle = "red";
        CTX.beginPath();
        CTX.arc(CANVAS.width * 0.125, CANVAS.height * 0.65, answerCircleSize, 0, Math.PI * 2);
        CTX.fill();
        CTX.fillStyle = "white";
        MOBILE.answerCircleFont();
        CTX.fillText("1", CANVAS.width * 0.1175, CANVAS.height * 0.67222);


        //２番目
        CTX.beginPath();
        CTX.fillStyle = "blue";
        CTX.arc(CANVAS.width * 0.54375, CANVAS.height * 0.65, answerCircleSize, 0, Math.PI * 2);
        CTX.fill();
        CTX.fillStyle = "white";
        MOBILE.answerCircleFont();
        CTX.fillText("2", CANVAS.width * 0.535, CANVAS.height * 0.6722);

        //３番目
        CTX.beginPath();
        CTX.fillStyle = "gold";
        CTX.arc(CANVAS.width * 0.125, CANVAS.height * 0.7944, answerCircleSize, 0, Math.PI * 2);
        CTX.fill();
        CTX.fillStyle = "white";
        MOBILE.answerCircleFont();
        CTX.fillText("3", CANVAS.width * 0.1175, CANVAS.height * 0.8166);


        //４番目
        CTX.beginPath();
        CTX.fillStyle = "green";
        CTX.arc(CANVAS.width * 0.54375, CANVAS.height * 0.7944, answerCircleSize, 0, Math.PI * 2);
        CTX.fill();
        CTX.fillStyle = "white";
        MOBILE.answerCircleFont();
        CTX.fillText("4", CANVAS.width * 0.535, CANVAS.height * 0.8166)
    }
    //解答の数字
    answerTextDraw() {
        //1番目
        CTX.fillStyle = "black";
        MOBILE.answerFont();
        CTX.fillText(questions[setQuestionNumbers[nowQuestionNumber]][1], CANVAS.width * 0.16, CANVAS.height * 0.67);

        //２番目
        CTX.fillStyle = "black";
        MOBILE.answerFont();
        CTX.fillText(questions[setQuestionNumbers[nowQuestionNumber]][2], CANVAS.width * 0.58, CANVAS.height * 0.67);

        //３番目
        CTX.fillStyle = "black";
        MOBILE.answerFont();
        CTX.fillText(questions[setQuestionNumbers[nowQuestionNumber]][3], CANVAS.width * 0.16, CANVAS.height * 0.81);

        //４番目
        CTX.fillStyle = "black";
        MOBILE.answerFont();
        CTX.fillText(questions[setQuestionNumbers[nowQuestionNumber]][4], CANVAS.width * 0.58, CANVAS.height * 0.81);
    }
    //正答を教える
    teachAnswer() {
        if (answerJudge == false) {
            if (answerNumber == 1) {
                CTX.strokeStyle = "red";
                CTX.lineWidth = lineWidth;
                CTX.strokeRect(this.answer1X, this.answer1Y, this.answerWidth, this.answerHeight);
            } else if (answerNumber == 2) {
                CTX.strokeStyle = "red";
                CTX.lineWidth = lineWidth;
                CTX.strokeRect(this.answer2X, this.answer2Y, this.answerWidth, this.answerHeight);
            } else if (answerNumber == 3) {
                CTX.strokeStyle = "red";
                CTX.lineWidth = lineWidth;
                CTX.strokeRect(this.answer3X, this.answer3Y, this.answerWidth, this.answerHeight);
            } else if (answerNumber == 4) {
                CTX.strokeStyle = "red";
                CTX.lineWidth = lineWidth;
                CTX.strokeRect(this.answer4X, this.answer4Y, this.answerWidth, this.answerHeight);
            }
        }
        answerJudge = null;
    }
    //残り時間の〇表示
    timeCircleSize = CANVAS.width * 0.03125;
    timeCircleDraw() {
        CTX.fillStyle = "skyblue";
        if (s > 24) {
            CTX.fillStyle = "red";
        } else if (s > 19) {
            CTX.fillStyle = "yellow";
        } else if (s > 9) {
            CTX.fillStyle = "green";
        }
        CTX.beginPath();
        if (s < 1) {
            CTX.arc(CANVAS.width * 0.68125, CANVAS.height * 0.53333, this.timeCircleSize, 0, Math.PI * 2);
        }
        if (s < 2) {
            CTX.arc(CANVAS.width * 0.74375, CANVAS.height * 0.53333, this.timeCircleSize, 0, Math.PI * 2);
        }
        if (s < 3) {
            CTX.arc(CANVAS.width * 0.80625, CANVAS.height * 0.53333, this.timeCircleSize, 0, Math.PI * 2);
        } if (s < 4) {
            CTX.arc(CANVAS.width * 0.86875, CANVAS.height * 0.53333, this.timeCircleSize, 0, Math.PI * 2);
        }
        if (s < 5) {
            CTX.arc(CANVAS.width * 0.93125, CANVAS.height * 0.53333, this.timeCircleSize, 0, Math.PI * 2);
            CTX.fill();
        }
        if (s < 6) {
            CTX.beginPath();
            CTX.arc(CANVAS.width * 0.93125, CANVAS.height * 0.66111, this.timeCircleSize, 0, Math.PI * 2);
        } if (s < 7) {
            CTX.arc(CANVAS.width * 0.93125, CANVAS.height * 0.78888, this.timeCircleSize, 0, Math.PI * 2);
        } if (s < 8) {
            CTX.arc(CANVAS.width * 0.93125, CANVAS.height * 0.91666, this.timeCircleSize, 0, Math.PI * 2);
            CTX.fill();
        }
        if (s < 9) {
            CTX.beginPath();
            CTX.arc(CANVAS.width * 0.86875, CANVAS.height * 0.91666, this.timeCircleSize, 0, Math.PI * 2);
        } if (s < 10) {
            CTX.arc(CANVAS.width * 0.80625, CANVAS.height * 0.91666, this.timeCircleSize, 0, Math.PI * 2);
        } if (s < 11) {
            CTX.arc(CANVAS.width * 0.74375, CANVAS.height * 0.91666, this.timeCircleSize, 0, Math.PI * 2);
        } if (s < 12) {
            CTX.arc(CANVAS.width * 0.68125, CANVAS.height * 0.91666, this.timeCircleSize, 0, Math.PI * 2);
        } if (s < 13) {
            CTX.arc(CANVAS.width * 0.61875, CANVAS.height * 0.91666, this.timeCircleSize, 0, Math.PI * 2);
        } if (s < 14) {
            CTX.arc(CANVAS.width * 0.55625, CANVAS.height * 0.91666, this.timeCircleSize, 0, Math.PI * 2);
        } if (s < 15) {
            CTX.arc(CANVAS.width * 0.49375, CANVAS.height * 0.91666, this.timeCircleSize, 0, Math.PI * 2);
        } if (s < 16) {
            CTX.arc(CANVAS.width * 0.43125, CANVAS.height * 0.91666, this.timeCircleSize, 0, Math.PI * 2);
        } if (s < 17) {
            CTX.arc(CANVAS.width * 0.36875, CANVAS.height * 0.91666, this.timeCircleSize, 0, Math.PI * 2);
        } if (s < 18) {
            CTX.arc(CANVAS.width * 0.30625, CANVAS.height * 0.91666, this.timeCircleSize, 0, Math.PI * 2);
        } if (s < 19) {
            CTX.arc(CANVAS.width * 0.24375, CANVAS.height * 0.91666, this.timeCircleSize, 0, Math.PI * 2);
        } if (s < 20) {
            CTX.arc(CANVAS.width * 0.18125, CANVAS.height * 0.91666, this.timeCircleSize, 0, Math.PI * 2);
        } if (s < 21) {
            CTX.arc(CANVAS.width * 0.11875, CANVAS.height * 0.91666, this.timeCircleSize, 0, Math.PI * 2);
        } if (s < 22) {
            CTX.arc(CANVAS.width * 0.05625, CANVAS.height * 0.91666, this.timeCircleSize, 0, Math.PI * 2);
            CTX.fill();
        }
        if (s < 23) {
            CTX.beginPath();
            CTX.arc(CANVAS.width * 0.05625, CANVAS.height * 0.78888, this.timeCircleSize, 0, Math.PI * 2);
        } if (s < 24) {
            CTX.arc(CANVAS.width * 0.05625, CANVAS.height * 0.66111, this.timeCircleSize, 0, Math.PI * 2);
        } if (s < 25) {
            CTX.arc(CANVAS.width * 0.05625, CANVAS.height * 0.53333, this.timeCircleSize, 0, Math.PI * 2);
            CTX.fill();

        } if (s < 26) {
            CTX.beginPath();
            CTX.arc(CANVAS.width * 0.11875, CANVAS.height * 0.53333, this.timeCircleSize, 0, Math.PI * 2);
        } if (s < 27) {
            CTX.arc(CANVAS.width * 0.18125, CANVAS.height * 0.53333, this.timeCircleSize, 0, Math.PI * 2);
        } if (s < 28) {
            CTX.arc(CANVAS.width * 0.24375, CANVAS.height * 0.53333, this.timeCircleSize, 0, Math.PI * 2);
        } if (s < 29) {
            CTX.arc(CANVAS.width * 0.30625, CANVAS.height * 0.53333, this.timeCircleSize, 0, Math.PI * 2);
            CTX.fill();
        }
    }
    //正解か不正解かを表示する
    judgeDraw() {
        if (results[nowQuestionNumber] == 1) {
            CTX.drawImage(CORRECT_IMG, CANVAS.width * 0.32, CANVAS.height * 0.12, CANVAS.width * 0.35, CANVAS.height * 0.53);
        } else {
            CTX.drawImage(MISTAKE_IMG, CANVAS.width * 0.32, CANVAS.height * 0.12, CANVAS.width * 0.35, CANVAS.height * 0.53);
        }
    }
    //終了画面描写
    finishDraw() {
        resultAnime = setInterval(function () {
            CTX.clearRect(0, 0, CANVAS.width, CANVAS.height);
            CTX.drawImage(RESULT_IMG, 0, 0, CANVAS.width, CANVAS.height);
            DRAW.pointDraw();
            DRAW.commentDraw();
            DRAW.creaditDraw();
        })
    }

    //クレジット表記
    creaditDraw() {
        CTX.fillStyle = "white";
        MOBILE.creditFont();
        CTX.fillText("効果音　OtoLogic様　https://otologic.jp/", CANVAS.width * 0.12, CANVAS.height * 0.82)
        CTX.fillText("BGM　いまたく様　https://imatakumusic.com", CANVAS.width * 0.12, CANVAS.height * 0.87)

    }

    /* finishDraw() {
        resultAnime = setInterval(function () {
            setTimeout(function () {
                CTX.clearRect(0, 0, CANVAS.width, CANVAS.height);
                CTX.drawImage(RESULT_IMG, 0, 0, CANVAS.width, CANVAS.height);
                DRAW.pointDraw();
                CTX.drawImage(CLICK1_IMG, CANVAS.width * 0.83, CANVAS.height * 0.8, CANVAS.width * 0.15, CANVAS.height * 0.15);
            }, 200);
            setTimeout(function () {
                CTX.clearRect(0, 0, CANVAS.width, CANVAS.height);
                CTX.drawImage(RESULT_IMG, 0, 0, CANVAS.width, CANVAS.height);
                DRAW.pointDraw();
                CTX.drawImage(CLICK2_IMG, CANVAS.width * 0.83, CANVAS.height * 0.8, CANVAS.width * 0.15, CANVAS.height * 0.15);
            }, 400);
        }, 400);
    } */
    //成績表示・・・終了画面で表示
    pointDraw() {
        CTX.fillStyle = "gold";
        MOBILE.finishResultFont();
        CTX.fillText(point, CANVAS.width * 0.54, CANVAS.height * 0.48);
    }
    commentDraw() {
        CTX.fillStyle = "gold";
        MOBILE.commentFont();
        if (point < 30) {
            CTX.fillText("ひよっ子", CANVAS.width * 0.5, CANVAS.height * 0.82);
        } else if (point < 60) {
            CTX.fillText("阿波っ子", CANVAS.width * 0.5, CANVAS.height * 0.82);
        }
        else if (point < 90) {
            CTX.fillText("阿波博士", CANVAS.width * 0.5, CANVAS.height * 0.82);
        }
        else if (point = 100) {
            CTX.fillText("阿波博士", CANVAS.width * 0.5, CANVAS.height * 0.82);
        }
    }
}
const DRAW = new draw();

let results = [];           //0は初期値(問題答えていない)1正解2不正解
class system {

    //改行システム

    //正解判定
    //答えと解答の文字列を比較して正解。配列の中身取り出す関数必要
    //正解だったら，画面に〇の画像を表示する+nowQuestion...++する。
    //timeをクリアーする。次のタイマー作動させる。
    //正解不正解のtrue記述。pushで　成否の配列results[]

    //今までの正解不正解表示
    //終了判定
    timeLimitJudge() {
        if (s > 29) {
            MISTAKE_MP3.play();
            results.push(2);
            console.log("時間切れ");
            answerJudge = false;
            clearInterval(gameRound);
            //表示andリンク？クリック後or５秒後次始める
            if (nowQuestionNumber > 8) {
                setTimeout(function () {
                    clearInterval(gameRound);
                    DRAW.finishDraw();
                    mode = 2;
                    console.log("ゲーム終了");
                }, nextSwitchTime);
            } else {
                setTimeout(function () {
                    nowQuestionNumber++;
                    let sTime = new Date();
                    startTime = sTime.getTime();
                    gameRound = setInterval(gameCycle, FPS);
                }, nextSwitchTime);
            }
        }
    }
    judge() {
        answerNumber = questions[setQuestionNumbers[nowQuestionNumber]].indexOf(protoQuestions[[setQuestionNumbers[nowQuestionNumber]]][1]);
        console.log(answerNumber);
        if (protoQuestions[[setQuestionNumbers[nowQuestionNumber]]][1] == questions[setQuestionNumbers[nowQuestionNumber]][clickNumber]) {
            CORRECT_MP3.play();
            results.push(1);
            console.log("正解")
            answerJudge = true;
            clearInterval(gameRound);
            DRAW.judgeDraw();
            point += 10;
        }
        else {
            MISTAKE_MP3.play();
            results.push(2);
            console.log("不正解");
            answerJudge = false;
            clearInterval(gameRound);
            DRAW.judgeDraw();
        }

        if (nowQuestionNumber > 8) {
            setTimeout(function () {
                clearInterval(gameRound);
                DRAW.finishDraw();
                mode = 2;
                console.log("ゲーム終了");
            }, nextSwitchTime);
        } else {
            setTimeout(function () {
                nowQuestionNumber++;
                let sTime = new Date();
                startTime = sTime.getTime();
                gameRound = setInterval(gameCycle, FPS);
            }, nextSwitchTime);
        }
        //デバッグ用
        console.log("クリックしたのは" + questions[setQuestionNumbers[nowQuestionNumber]][clickNumber]);
    }
    //現在時刻
    nowTime() {
        let ntime = new Date();
        nowTime = ntime.getTime();//1000分の1秒
    }
    //残り時間計算
    remainNowTimeCalc(startTime) {
        TimerTime = Math.floor((nowTime - startTime) / 10);//100分の1秒でタイマー
        s = Math.floor(TimerTime / 100);
    }
    //残り時間表示用
    timerWrite() {
        let mst = TimerTime % 100;//ミリ秒
        //ゼロパディング
        //slice(-2)で末尾の２個目まで表示001→01になる。Math.floor(TimerTime / 100)で１秒 【%60】60で割れたら0に戻る。
        let writeMs = ("00" + Math.floor(100 - mst)).slice(-2);
        //slice(-2)で末尾の２個目まで表示001→01になる。Math.floor(TimerTime / 100)で１秒 【%60】60で割れたら0に戻る。
        let writeS = ("00" + Math.floor(29 - s)).slice(-2);
        if (s > 29) {
            writeS = "00".slice(-2);
        }
        //表示整形
        remainNowTime = writeS + ":" + writeMs;
    }
}
const SYSTEM = new system();


/**
 * クイズの問題関係
 *
 * createQuestion()出題問題決定+問題シャッフル
 * createAnswer()で解答をシャッフルしている。
 * 取り出し方
 * 問題文【questions[setQuestionNumbers[i]][0]】
 * 解答【questions[setQuestionNumbers[i]][1～4]】
 * 答えは，【protoQuestions[setQuestionNumbers[i]][1]?】
 *
 * コンストラクター名【QUIZ】
 */
class quiz {
    //出題する問題を決定+シャッフルする（protoQuestions.lengthを5問か10問に変更する）setQuestionNumbersに出題番号順作成
    createQuestion() {
        //多次元配列のコピー
        questions = JSON.parse(JSON.stringify(protoQuestions));
        for (let i = 0; i < totalQuestionNumber; i++) {
            while (true) {
                let tempQuestionNumber = Math.floor(Math.random() * protoQuestions.length);
                if (!setQuestionNumbers.includes(tempQuestionNumber)) {
                    setQuestionNumbers.push(tempQuestionNumber);
                    break;                              //while(true)で永久に繰り返すのでbreakさせる。
                }
            }
        }
    }
    //createQuestionで並び変えた順番で，答えの中身もシャッフルする
    /*  createAnswer() {
        for (let i = 0; i < setQuestionNumbers.length; i++) {
            for (let j = 3; j > 0; j--) {
                 let answerRand = Math.floor(Math.random() * j);
                let tmpArray = questions[setQuestionNumbers[i]][j + 1];
                questions[setQuestionNumbers[i]][j + 1] = questions[setQuestionNumbers[i]][answerRand + 1];
                questions[setQuestionNumbers[i]][answerRand + 1] = tmpArray;
            }
        }
        for (let k = 0; k < setQuestionNumbers.length; k++) {
            for (let l = 0; l < 5; l++) {
                questions[k][l] = questions[setQuestionNumbers[k]][l];
            }
        }
     } */
    createAnswer() {
        for (let i = 0; i < setQuestionNumbers.length; i++) {
            for (let j = 3; j > 0; j--) {
                let answerRand = Math.floor(Math.random() * j);
                let tmpArray = questions[setQuestionNumbers[i]][j];
                questions[setQuestionNumbers[i]][j] = questions[setQuestionNumbers[i]][answerRand + 1];
                questions[setQuestionNumbers[i]][answerRand + 1] = tmpArray;
            }
        }
    }
}
const QUIZ = new quiz();


let start = null;
//起動時
window.addEventListener("load", function () {
    //クイズ生成とスマホ判定
    QUIZ.createQuestion();
    QUIZ.createAnswer();
    MOBILE.isSmartPhone();
    MOBILE.ansCirSize();
    MOBILE.rowStringCount();
    //スタート画面
    start = setInterval(function () {
        setTimeout(function () {
            CTX.clearRect(0, 0, CANVAS.width, CANVAS.height);
            DRAW.startDraw1();
        }, 200);
        setTimeout(function () {
            CTX.clearRect(0, 0, CANVAS.width, CANVAS.height);
            DRAW.startDraw2();
        }, 400);
    }, 400);
})

//ゲームサイクル
function gameCycle() {
    CTX.clearRect(0, 0, CANVAS.width, CANVAS.height);
    DRAW.untilAnswerDraw();
    DRAW.theQuestionNumberDraw();
    DRAW.questionFrameDraw();
    DRAW.answerFrameDraw();
    DRAW.answerNumberDraw();
    SYSTEM.nowTime();
    SYSTEM.remainNowTimeCalc(startTime);
    SYSTEM.timerWrite();
    DRAW.drawTime();
    DRAW.timeCircleDraw();
    DRAW.questionTextDraw();
    DRAW.answerTextDraw();
    //デバッグ用
    console.log("正解は" + protoQuestions[[setQuestionNumbers[nowQuestionNumber]]][1]);
    SYSTEM.timeLimitJudge();
    DRAW.resultDraw();
    clickEnable = true;
}
//スタートボタン
//const START_BUTTON = document.getElementById("startButton");
window.addEventListener("click", function () {
    clearInterval(start);
    mode = 1;
    //スタートボタンを押した時間を保管
    let sTime = new Date();
    startTime = sTime.getTime();
    BGM_MP3.play();
    gameRound = setInterval(gameCycle, FPS)

}, { once: true });
