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
 * cssスタイルの読み込み
 *
 * @return void
 */
function add_tokushima_sogo_styles()
{

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
}
add_action('wp_enqueue_scripts', 'add_tokushima_sogo_scripts');

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

/**
 * ajaxを受け取ってからの処理
 */
// function my_ajax_do()
// {
//     $mes = $_POST['mes'];

//     global $wpdb;
//     $res = $wpdb->get_results("SELECT COUNT(object_id) AS 'article'
// FROM wp_term_relationships LEFT OUTER JOIN wp_posts
// ON wp_term_relationships.object_id = wp_posts.ID
// WHERE term_taxonomy_id = $mes
// AND post_status = 'publish';");

//     echo json_encode($res);
//     wp_die();
// }
// add_action('wp_ajax_my_ajax_do', 'my_ajax_do');
// add_action('wp_ajax_nopriv_my_ajax_do', 'my_ajax_do');

// function map_test_do()
// {
//     header("Content-Type: application/json; charset=UTF-8"); //ヘッダー情報の明記。必須。
//     $ary_list = []; //配列宣言
//     global $wpdb;
//     $ret = $wpdb->get_results("SELECT meta_value
//                                 FROM wp_postmeta LEFT OUTER JOIN wp_ulike
//                                 ON wp_postmeta.post_id = wp_ulike.post_id
//                                 WHERE ip = '127.0.0.1'
//                                 AND status = 'like'
//                                 AND meta_key IN ('spot_name','spot_lat','spot_lag');");
//     if (isset($ret)) $ary_list = $ret; //連想配列のプロパティから値を取得
//     echo json_encode($ary_list);
//     wp_die();
// }
// add_action('wp_ajax_map_test_do', 'map_test_do');
// add_action('wp_ajax_nopriv_map_test_do', 'map_test_do');

// ipベタ打ちテスト　配列取得
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

// function map_test_do()
// {
//     header("Content-Type: application/json; charset=UTF-8"); //ヘッダー情報の明記。必須。
//     $ary_list = []; //配列宣言
//     $tempip = $_SERVER['REMOTE_ADDR'];
//     $long = ip2long($tempip);
//     $ip = long2ip($long);
//     global $wpdb;
//     $ret = $wpdb->get_results("SELECT meta_value
//                                 FROM wp_postmeta LEFT OUTER JOIN wp_ulike
//                                 ON wp_postmeta.post_id = wp_ulike.post_id
//                                 WHERE ip = '$ip'
//                                 AND status = 'like'
//                                 AND meta_key IN ('spot_name','spot_lat','spot_lag');");
//     if (isset($ret)) $ary_list = $ret; //連想配列のプロパティから値を取得
//     echo json_encode($ary_list);
//     wp_die();
// }
// add_action('wp_ajax_map_test_do', 'map_test_do');
// add_action('wp_ajax_nopriv_map_test_do', 'map_test_do');

// function map_test_do()
// {
//     header("Content-Type: application/json; charset=UTF-8");
//     $ary_list = [];
//     $pretempip = $_SERVER['REMOTE_ADDR'];
//     $pretempip2 = "$pretempip";
//     $tempip = ip2long($pretempip2);
//     $ip = long2ip($tempip);
//     global $wpdb;
//     $ret = $wpdb->get_results("SELECT meta_value
//                                 FROM wp_postmeta LEFT OUTER JOIN wp_ulike
//                                 ON wp_postmeta.post_id = wp_ulike.post_id
//                                 WHERE ip = '$ip'
//                                 AND status = 'like'
//                                 AND meta_key IN ('spot_name','spot_lat','spot_lag');");
//     if (isset($ret)) $ary_list = $ret;
//     echo json_encode($ary_list);
//     wp_die();
// }
// add_action('wp_ajax_map_test_do', 'map_test_do');
// add_action('wp_ajax_nopriv_map_test_do', 'map_test_do');

// function map_test_do()
// {
//     header("Content-Type: application/json; charset=UTF-8");
//     $ary_list = [];
//     $pretempip = $_SERVER['REMOTE_ADDR'];
//     $pretempip2 = "$pretempip";
//     // $tempip = ip2long($pretempip2);
//     // $ip = long2ip($tempip);
//     global $wpdb;
//     $ret = $wpdb->get_results("SELECT meta_value
//                                 FROM wp_postmeta LEFT OUTER JOIN wp_ulike
//                                 ON wp_postmeta.post_id = wp_ulike.post_id
//                                 WHERE ip = '$pretempip2'
//                                 AND status = 'like'
//                                 AND meta_key IN ('spot_name','spot_lat','spot_lag');");
//     if (isset($ret)) $ary_list = $ret;
//     echo json_encode($ary_list);
//     wp_die();
// }
