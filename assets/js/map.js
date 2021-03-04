//チェックボックスクリックで使用
let goToButtons = [];
let spotName = "";
let lat = "";
let lng = "";
let cookies = "";


let tempNames = [];
let temp2Names = [];
let templegend = [];
let getSpotNames = [];
let getLats = [];
let getLngs = [];
let spotData = [];
let cookieData = [];
let getLegend = 0;
let tempLegend = 0;
let Legend = 0;

let setCookie = "";
//クッキー書き込みで使う有効期限設定の関数
function setExpire() {
    //現在の日時
    let expire = new Date();
    //現在の日時に3か月分の時間をプラス
    expire.setTime(expire.getTime() + 1000 * 60 * 60 * 24 * 90);
    //世界標準時(UTC)文字型に変換
    expire.toUTCString();
    return expire;
}

//チェックボックスのclassのDOMを取得
spots = document.getElementsByClassName('spot');
//配列に変換
Array.prototype.slice.call(spots);
console.log(spots.length);



//【普通のボタンをクリックしたときのイベント】
for (let i = 0; i < spots.length; i++) {
    goToButtons[i] = document.getElementById("shop" + i);
    goToButtons[i].value = 0;
    goToButtons[i].addEventListener("click", function () {
        console.log(goToButtons[i].value);

        if (goToButtons[i].value == 0) {
            //ボタンの色を変えるver?

            //ボタンの画像を入れ替えるver
            //プロパティに以下追加する
            //変更する画像のID取得document.getElementById("");
            //pic=new Image()

            //pic.src="";画像を取得

            //
            goToButtons[i].value = 1;

            spotName = goToButtons[i].dataset.spot_name;
            lat = goToButtons[i].dataset.lat;
            lng = goToButtons[i].dataset.lng;

            //クッキーに書き込む
            document.cookie += "spot=" + spotName + "," + lat + "," + lng + "/" + ";"; +"expires=" + setExpire() + ";" + "SameSite=None; Secure";
            console.log(document.cookie);


            //クッキーの中身確認（デバッグ用）
            //cookies = document.cookie;
            //console.log("【クッキーに登録されている情報】" + cookies);
            goToButtons[i].classList.remove("button_off");
            goToButtons[i].classList.add("button_on");
        } else if (goToButtons[i].value == 1) {
            goToButtons[i].value = 0;
            //pic.src="";画像を取得

            //保存されているクッキーを取得する
            cookies = document.cookie;
            //クッキーから取得した店舗名と緯度経度のデータを破棄する。
            let tempcookies = cookies.replace('spot=' + goToButtons[i].dataset.spot_name + ',' + goToButtons[i].dataset.lat + ',' + goToButtons[i].dataset.lng + '/', "");
            document.cookie = tempcookies + ";" + "expires=" + setExpire() + ";";
            //クッキーの中身確認（デバッグ用）
            cookies = document.cookie;
            console.log("【クッキーに登録されている情報】" + cookies);
            goToButtons[i].classList.remove("button_on");
            goToButtons[i].classList.add("button_off");
        }
    })
}

//都市伝説のページクッキー【フロントページ用】（ページ読み込み時にクッキーにデータを追加する。）
//クッキー読み込みlegend切り出す。





//クッキーを全て削除する。
function deleteAllCookies() {
    let cookies = document.cookie.split(';')
    for (let i = 0; i < cookies.length; i++) {
        let tempCookie = cookies[i]
        let keyNameLength = tempCookie.indexOf('=')
        let deleteName = tempCookie.substr(0, keyNameLength);
        document.cookie = deleteName + '=;max-age=0';
    }
}


//クッキーの情報を取得する

cookies = document.cookie;
//クッキーの中身を切り分ける。getCookieに配列で保管
let getCookie = cookies.split("/");
//都市伝説解除のキーをgetLegendで取得。
getLegend = getCookie[0];
//都市伝説解除のクッキーデータを削除する。（残りのクッキーのデータで地図生成に使うため）
getCookie.shift();
//Legendの中身（判定）を取得する。0か1
tempLegend = getLegend.split("=");
legend = tempLegend[1];
//クッキーのデータを種類別に分ける。
for (let i = 0; i < getCookie.length; i++) {
    spotData = getCookie[i].split(",");
    tempNames.push(spotData[0]);
    getLats.push(spotData[1]);
    getLngs.push(spotData[2]);
    //key(spot=)を取り除く
    temp2Names = tempNames[i].split("=");
    getSpotNames.push(temp2Names[1]);

    //クッキーに登録した店舗だったらボタンをクリックした状態にする。
    for (let i = 0; i < spots.length; i++) {
        for (let j = 0; j < getSpotNames.length; j++) {
            goToButtons[i] = document.getElementById("shop" + i);
            //ボタンのスポット名とクッキーのスポット名が一緒なら
            if (goToButtons[i].dataset.spot_name == getSpotNames[j]) {
                //ボタンはON
                goToButtons[i].value = 1;
                //ボタンに色をつける。
                goToButtons[i].classList.remove("button_off");
                goToButtons[i].classList.add("button_on");
            }
        }
    }
}

//legendがなかったら追加+クッキーの初期化
if (legend != 1) {
    document.cookie = "legend=" + 0 + "/" + ";" + "expires=" + setExpire();
}


//【フロントページ】のみ if文順序入れ替えるこっち優先

else if (legend == 1) {
    //都市伝説を隠していたcssクラスを削除
    //legend.classList.remove("hidden");
    //都市伝説を表示するcssクラスを追加
    //legend.classList.add("appear");
}
document.cookie = cookies;
console.log("【クッキーに登録されている情報】" + cookies);
console.log("【登録店舗】" + spotData);
console.log("【店舗名】" + getSpotNames);
console.log("【緯度】" + getLats);
console.log("【経度】" + getLngs);

//地図生成ボタンをクリック





const CREATE = document.getElementById("create");
CREATE.addEventListener("click", function () {
    //新しいウィンドウでnewmap.phpを開く
    window.open("http://localhost/sogo/map-create/", "_blank");
});

const DELETE_COOKIE = document.getElementById("delete_cookie");
DELETE_COOKIE.addEventListener("click", function () {
    deleteAllCookies();
    document.cookie = "legend=" + 0 + "/" + ";" + "expires=" + setExpire();
})
    //クッキーを削除リロードするボタンにつける
