/**
    * 都市伝説解除設定ゲームページ
    */
//クッキーに都市伝説解除キーを設定+クッキー初期化
document.cookie = "legend=" + 1 + "/" + ";" + "expires=" + setExpire();
//クッキーに現在保存している行きたいボタン情報を書き込む
for (let i = 0; i < getSpotNames.length; i++) {
    document.cookie += "spot=" + spotName[i] + "," + getLats[i] + "," + getLngs[i] + "/" + ";" + "expires=" + setExpire() + ";";
}
