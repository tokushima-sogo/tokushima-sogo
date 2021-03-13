<?php get_header(); ?>

<main class="l-main">
    <div class="l-page">
        <!-- <h2 class="c-heading u-center">Myマップ</h2> -->
        <section class="p-mapchoice l-articleList">
            <div class="u-center">
                <h2 class="c-subHeading">MYマップ</h2>
            </div>
            <!-- <h2 class="c-subHeading u-center l-page"></h2> -->
            <!-- articleList -->
            <div class="p-articleList u-grid">

                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : ?>
                        <?php the_post(); ?>
                        <!-- article -->
                        <article class="p-article">
                            <!-- imgArea -->
                            <div class="p-imgArea">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/frame_archive_common_thumbFrame.png" class="c-frame" alt="額縁">
                                <a href="<?php the_permalink(); ?>" class="c-thumbnail">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium') ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="画像がありません">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <!-- /imgArea -->
                            <!-- textArea -->
                            <div class="p-textArea">
                                <div class="p-textContent">
                                    <div class="c-title u-center">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </div>
                                    <div class="p-tag u-flex">
                                        <div class="c-tag u-west u-mr15">
                                            <?php
                                            echo get_the_term_list($post->ID, 'area');
                                            ?>
                                        </div>
                                        <div class="c-tag">
                                            <?php
                                            echo esc_html(get_post_type_object(get_post_type())->label);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /textArea -->
                            <!-- Myスポット -->
                            <div class="p-singleBtn c-btnTag u-center">
                                <!-- map登録ボタン -->
                                <?php echo do_shortcode('[wp_ulike]'); ?>
                            </div>
                            <!-- /Myスポット -->
                        </article>
                        <!-- /article -->
                    <?php endwhile;
                    "" ?>
                <?php else : ?>
                    <?php echo 'Myスポット登録がありません。' ?>
                <?php endif; ?>
            </div>
        </section>
        <!-- googlemap表示 -->
        <section class="l-myMap">
            <div class="u-mapBtn--center">
                <button id="mapBtn" class="mapBtn u-mapBtn--bgcOrange">マップ作成
            </div>
            </button><br>
            <div class="map_wrapper p-myMap">
                <div id="plain_map" class="map_appear">
                    <iframe src="https://www.google.com/maps?&z=10&ll=34.04273024112785,134.16295987060795&output=embed" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
                <div id="map" class="map_disappear"></div>
            </div>
        </section>
    </div>
    <!-- /googlemap表示 -->
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

    const USERAGENT = navigator.userAgent;
    const MAP = document.getElementById("map");
    const PLAIN_MAP = document.getElementById("plain_map");

    //wp ulikeでいいねをつけたスポットの座標データを取得
    jQuery(function($) {
        //ボタンクリック時に実行
        $('#mapBtn').on("click", function() {

            //googlemapの表示を切り替え（iflame版→googlemapAPIへ）
            PLAIN_MAP.classList.remove("map_appear");
            PLAIN_MAP.classList.add("map_disappear");
            MAP.classList.remove("map_disappear");
            MAP.classList.add("map_appear");

            //Ajax
            $.ajax({
                tye: 'POST', //送信方法
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



                //スマホだったら
                /*  if (USERAGENT.indexOf('iPhone') != -1 || USERAGENT.indexOf('Android') != -1) {
                 } */
                function isSmartPhone() {

                }


                //地図データに使う緯度・経度データの生成。
                for (let i = 0; i < spotsName.length; i++) {
                    spots[i] = {
                        lat: parseFloat(getLats[i]),
                        lng: parseFloat(getLngs[i])
                    };
                    console.log(spots[i]);
                }
                console.dir(spots);


                //【googleMap設定】
                function initMap() {
                    //地図の初期位置の座標。



                    const CENTER = {
                        lat: 34.04273024112785,
                        lng: 134.16295987060795
                    };
                    //徳島駅の座標
                    const TOKUSHIMA_STATION = {
                        lat: 34.07434415876051,
                        lng: 134.55118033939166
                    };

                    //CENTERを中心にmapの生成
                    const opts = {
                        zoom: 10,
                        center: CENTER,
                    };
                    const map = new google.maps.Map(MAP, opts);

                    //徳島駅のマーカーを生成する
                    const centerMarker = new google.maps.Marker({
                        position: TOKUSHIMA_STATION,
                        map: map,
                        label: {
                            text: '徳島駅',
                            color: 'green',
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
                //リサイズしたときに初期位置を中央に持ってくる
                // google.maps.event.addDomListener(window, "resize", function() {
                //     var center = map.getCenter();
                //     google.maps.event.trigger(map, "resize");
                //     map.setCenter(center);
                // });

                //googlemap生成
                google.maps.event.addDomListener(window, "load", initMap());
                //同期に失敗
            }).fail(function(XMLHttpRequest, textStatus, error) {
                console.log('失敗' + error);
                console.log(XMLHttpRequest.responseText);
            });
        });
    });


    // on clickに変更するために避難
    // //wp ulikeでいいねをつけたスポットの座標データを取得
    // jQuery(function($) {
    //     //ページロード時に実行
    //     $(window).on("load", function() {
    //         //Ajax
    //         $.ajax({
    //             type: 'POST', //送信方法
    //             url: ajaxurl, //送信先(functions.phpで変数にしてある)
    //             data: {
    //                 'action': 'map_test_do',
    //             },
    //             datatype: 'json', //送信データの種類

    //             //同期が成功したら店舗情報を$json_list に保管する
    //         }).done(function(json_list) {
    //             console.log("同期成功");
    //             console.log(json_list);
    //             //取得データが""で囲まれていないためエラーが出る。回避するために改めてjsonデータに戻す。
    //             let list = JSON.stringify(json_list)
    //             //JSONデータをオブジェクトデータに戻す。
    //             let temp_list = JSON.parse(list);
    //             console.dir(temp_list);
    //             //map関数を使って配列に置き換える。
    //             let spot_list = temp_list.map(temp => temp.meta_value)
    //             console.log(spot_list);

    //             for (let i = 0; i < spot_list.length / 3; i++) {
    //                 spotsName[i] = spot_list[0 + (i * 3)];
    //                 getLats[i] = parseFloat(spot_list[1 + (i * 3)]);
    //                 getLngs[i] = parseFloat(spot_list[2 + (i * 3)]);
    //                 console.log(spotsName[i]);
    //                 console.log(getLngs[i]);
    //                 console.log(getLats[i]);
    //             }



    //             //スマホだったら
    //             /*  if (USERAGENT.indexOf('iPhone') != -1 || USERAGENT.indexOf('Android') != -1) {
    //              } */
    //             function isSmartPhone() {

    //             }


    //             //地図データに使う緯度・経度データの生成。
    //             for (let i = 0; i < spotsName.length; i++) {
    //                 spots[i] = {
    //                     lat: parseFloat(getLats[i]),
    //                     lng: parseFloat(getLngs[i])
    //                 };
    //                 console.log(spots[i]);
    //             }
    //             console.dir(spots);


    //             //【googleMap設定】
    //             function initMap() {
    //                 //地図の初期位置の座標。



    //                 const CENTER = {
    //                     lat: 34.04273024112785,
    //                     lng: 134.16295987060795
    //                 };
    //                 //徳島駅の座標
    //                 const TOKUSHIMA_STATION = {
    //                     lat: 34.07434415876051,
    //                     lng: 134.55118033939166
    //                 };

    //                 //CENTERを中心にmapの生成
    //                 const opts = {
    //                     zoom: 10,
    //                     center: CENTER,
    //                 };
    //                 const map = new google.maps.Map(MAP, opts);

    //                 //徳島駅のマーカーを生成する
    //                 const centerMarker = new google.maps.Marker({
    //                     position: TOKUSHIMA_STATION,
    //                     map: map,
    //                     label: {
    //                         text: '徳島駅',
    //                         color: 'green',
    //                         fontFamily: 'sans-serif',
    //                         fontWeight: 'bold',
    //                         fontSize: '14px'
    //                     },
    //                 })
    //                 //行きたい場所のマーカーを動的に生成する
    //                 for (let i = 0; i < spots.length; i++) {
    //                     const marker = new google.maps.Marker({
    //                         position: spots[i],
    //                         map: map,
    //                         label: {
    //                             text: spotsName[i],
    //                             color: 'blue',
    //                             fontFamily: 'sans-serif',
    //                             fontWeight: 'bold',
    //                             fontSize: '14px'
    //                         },
    //                     });
    //                 }
    //             }
    //             //リサイズしたときに初期位置を中央に持ってくる
    //             google.maps.event.addDomListener(window, "resize", function() {
    //                 var center = map.getCenter();
    //                 google.maps.event.trigger(map, "resize");
    //                 map.setCenter(center);
    //             });

    //             //googlemap生成
    //             google.maps.event.addDomListener(window, "load", initMap());
    //             //同期に失敗
    //         }).fail(function(XMLHttpRequest, textStatus, error) {
    //             console.log('失敗' + error);
    //             console.log(XMLHttpRequest.responseText);
    //         });
    //     });
    // });
</script>
<?php get_footer(); ?>
