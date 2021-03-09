<?php

/**
 * body要素直後に何かを挿入する場合 htmlタグを挿入するものではない！
 *
 * @return void
 */
function tokushima_sogo_wp_body_open()
{
    //挿入したいコードを記述
}
add_action('wp_body_open', 'tokushima_sogo_wp_body_open');

/**
 * <title>タグを出力
 */
add_theme_support('title-tag');

/**
 * サムネイル画像の出力
 */
add_theme_support('post-thumbnails');

/**
 * タイトルの区切り文字を変更
 *
 * @param [type] $separator
 * @return void
 */
function tokushima_sogo_document_title_separator($separator)
{
    $separator = '|';
    return $separator;
}
add_filter('document_title_separator', 'tokushima_sogo_document_title_separator');

/**
 * タイトルのカスタマイズ
 *
 * @param [type] $title
 * @return void
 */
function tokushima_sogo_document_title_parts($title)
{
    if (is_home()) {
        unset($title['tagline']);
        $title['title'] = "";
    }
    return $title;
}
add_filter('document_title_parts', 'tokushima_sogo_document_title_parts');

/**
 * CSSの読み込み
 *
 * @return void
 */
function add_tokushima_sogo_styles()
{
    //トップページ
    if (is_front_page()) {
        //固定ページ
    } else if (is_page('contact')) {
    } else if (is_page('privacy')) {
    } else if (is_page('aboutsite')) {
    } else if (is_page('quiz')) {
    } else if (is_page('mapcreate')) {
    } else if (is_page('tokushima')) {
        //詳細？ページ
    } else if (is_single('special')) {
    } else if (is_single('spot')) {
    } else if (is_single('gourmet')) {
    } else if (is_single('shop')) {
    } else if (is_single('famous')) {
    } else if (is_single('event')) {
    } else if (is_single('horror')) {
        //アーカイブ（一覧）ページ
        //間違ってたらこっち。is_post_type_archive()  カスタム投稿のアーカイブページが表示されている場合。
    } else if (is_archive('special')) {
    } else if (is_archive('famous')) {
    } else if (is_archive('event')) {
    } else if (is_archive('horror')) {
        //タクソノミーは間違ってるかもis_tax( $taxonomy, $term )
        //全て同じ場合は，is_tax( 'area', array( 'east', 'west', 'city', 'south') )
    } else if (is_tax('area', 'east')) {
    } else if (is_tax('area', 'west')) {
    } else if (is_tax('area', 'city')) {
    } else if (is_tax('area', 'south')) {
        //タクソノミーページちょっと自信ない。
    } else if (is_tax()) {
    }
    // wp_enqueue_style('tokushima_sogo_reset_style', get_template_directory_uri() . '/assets/css/reset.css');
    // wp_enqueue_style('tokushima_sogo_base_style', get_template_directory_uri() . '/assets/css/base.css');
    // wp_enqueue_style('tokushima_sogo_project_style', get_template_directory_uri() . '/assets/css/project.css');
    // wp_enqueue_style('tokushima_sogo_compornent_style', get_template_directory_uri() . '/assets/css/compornent.css');
    // wp_enqueue_style('tokushima_sogo_utility_style', get_template_directory_uri() . '/assets/css/utility.css');
    // wp_enqueue_style('tokushima_sogo_compornent_style', get_template_directory_uri() . '/assets/css/top.css');
}
add_action('wp_enqueue_scripts', 'add_tokushima_sogo_styles');

/**
 * jsファイルの読み込み
 *
 * @return void
 */
function add_tokushima_sogo_scripts()
{
    // jqueryの利用
    wp_enqueue_script('jquery');
    // slickの利用
    wp_enqueue_script('slick_carousel_js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js');
    wp_enqueue_script('slick_setting_js', get_template_directory_uri() . '/assets/js/slick.setting.js');
    wp_enqueue_script('common_js', get_template_directory_uri() . '/assets/js/common.js', '', '', true);
    // wp_enqueue_script('serchForm_js', get_template_directory_uri() . '/assets/js/searchForm.js', '', '', true);
    wp_enqueue_script('searchandfilter', get_template_directory_uri() . '/assets/js/searchandfilter.js', '', '', true);
}
add_action('wp_enqueue_scripts', 'add_tokushima_sogo_scripts');




// 下記からは、絶対に編集しない！！！！！！！！！！！

/**
 * ajaxの準備
 */
function add_my_ajaxurl()
{
?>
    <script>
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>
<?php
}
add_action('wp_footer', 'add_my_ajaxurl', 1);


// MAP生成コード
function map_test_do()
{
    header("Content-Type: application/json; charset=UTF-8"); //ヘッダー情報の明記。必須。
    $ary_list = []; //配列宣言
    $ip = $_SERVER['REMOTE_ADDR'];
    global $wpdb;
    $ret = $wpdb->get_results("SELECT meta_value
                                FROM wp_postmeta LEFT OUTER JOIN wp_ulike
                                ON wp_postmeta.post_id = wp_ulike.post_id
                                WHERE ip = '$ip'
                                AND status = 'like'
                                AND meta_key IN ('spot_name','spot_lat','spot_lag');");
    if (isset($ret)) $ary_list = $ret; //連想配列のプロパティから値を取得
    echo json_encode($ary_list);
    wp_die();
}
add_action('wp_ajax_map_test_do', 'map_test_do');
add_action('wp_ajax_nopriv_map_test_do', 'map_test_do');

//カスタムフィールドgooglemapのAPIキー取得に関するコード
function my_acf_google_map_api($api)
{
    $api['key'] = 'AIzaSyDNNbWvrL46SW-8K-D0w6Haff4Vbcc4rRQ';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
