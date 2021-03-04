//都市伝説のページクッキー【フロントページ用】（ページ読み込み時にクッキーにデータを追加する。）
//クッキー読み込みlegend切り出す。
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

let cookies = document.cookie;
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
}



console.log("【クッキーに登録されている情報】" + cookies);
console.log("【登録店舗】" + spotData);
console.log("【店舗名】" + getSpotNames);
console.log("【緯度】" + getLats);
console.log("【経度】" + getLngs);







//座標の登録(最後尾に空欄ができているからlength-1)
let spots = [];
for (let i = 0; i < (getSpotNames.length - 1); i++) {
    spots[i] = { lat: parseFloat(getLats[i]), lng: parseFloat(getLngs[i]) };
}


//【googleMap生成】
function initMap() {
    //地図の中心にするQLIPの座標。
    const qlip = { lat: 34.08851305415384, lng: 134.55011544448973 };
    //QLIPの座標を中心にmapの生成
    const opts = {
        zoom: 15,
        center: qlip,
    };
    const map = new google.maps.Map(document.getElementById("map"), opts);

    //QLIPのマーカーを生成する
    const centerMarker = new google.maps.Marker({
        position: qlip,
        map: map,
        label: {
            text: 'qlip',
            color: 'blue',
            fontFamily: 'sans-serif',
            fontWeight: 'bold',
            fontSize: '14px'
        },
    })


    //行きたい場所のマーカーを動的に生成する
    for (let i = 0; i < getSpotNames.length; i++) {
        const marker = new google.maps.Marker(
            {
                position: spots[i],
                map: map,
                label: {
                    text: getSpotNames[i],
                    color: 'blue',
                    fontFamily: 'sans-serif',
                    fontWeight: 'bold',
                    fontSize: '14px'
                },
            }
        );
    }
}
