<?php get_header(); ?>

<main>
    <p>プログラミングスクールQlipです。</p>

    <div id="map" style="width:600px; height:400px"></div>
</main>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNNbWvrL46SW-8K-D0w6Haff4Vbcc4rRQ">
</script>
<script>
    //jsonデータ
    let json_list = [];
    //テーブル取得データ
    let spot_list = [];
    //スポットデータ
    let spotsName = [];
    let getLats = [];
    let getLngs = [];
    //マップ生成データ
    let lats = [];
    let lngs = [];
    let spots = [];

    //wp ulikeでいいねをつけたスポットの座標データを取得
    jQuery(function($) {
        //ページロード時に実行
        $(window).on("load", function() {
            //Ajax
            $.ajax({
                type: 'POST', //送信方法
                url: ajaxurl, //送信先(functions.phpで変数にしてある)
                data: {
                    'action': 'map_test_do',
                },
                datatype: 'json', //送信データの種類

                //同期が成功したら店舗情報を$json_list に保管する
            }).done(function(json_list) {
                console.log("同期成功");
                console.log(json_list);
                //取得データが""で囲まれていないためエラーが出る。回避するために改めてjsonデータに戻す。
                let list = JSON.stringify(json_list)
                //JSONデータをオブジェクトデータに戻す。
                let temp_list = JSON.parse(list);
                console.dir(temp_list);
                //map関数を使って配列に置き換える。
                let spot_list = temp_list.map(temp => temp.meta_value)
                console.log(spot_list);


                for (let i = 0; i < spot_list.length / 3; i++) {
                    spotsName[i] = spot_list[0 + (i * 3)];
                    getLats[i] = parseFloat(spot_list[1 + (i * 3)]);
                    getLngs[i] = parseFloat(spot_list[2 + (i * 3)]);
                    console.log(spotsName[i]);
                    console.log(getLngs[i]);
                    console.log(getLats[i]);
                }
                //地図データ生成
                for (let i = 0; i < spotsName.length; i++) {
                    spots[i] = {
                        lat: parseFloat(getLats[i]),
                        lng: parseFloat(getLngs[i])
                    };
                    console.log(spots[i]);
                }
                console.dir(spots);
                //【googleMap生成】
                function initMap() {
                    //地図の中心にするQLIPの座標。
                    const qlip = {
                        lat: 34.08851305415384,
                        lng: 134.55011544448973
                    };
                    //QLIPの座標を中心にmapの生成
                    const opts = {
                        zoom: 10,
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
                    for (let i = 0; i < spots.length; i++) {
                        const marker = new google.maps.Marker({
                            position: spots[i],
                            map: map,
                            label: {
                                text: spotsName[i],
                                color: 'blue',
                                fontFamily: 'sans-serif',
                                fontWeight: 'bold',
                                fontSize: '14px'
                            },
                        });
                    }
                }
                google.maps.event.addDomListener(window, "load", initMap());
                //同期に失敗
            }).fail(function(XMLHttpRequest, textStatus, error) {
                console.log('失敗' + error);
                console.log(XMLHttpRequest.responseText);
            });
        });
    });
</script>
<?php get_footer(); ?>
