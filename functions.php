<?php

/**
 * カレントテンプレートの表示
 */
add_filter('show_admin_bar', '__return_false');

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
        $title['title'] = "トクシマSOGO館";
    }
    return $title;
}
add_filter('document_title_parts', 'tokushima_sogo_document_title_parts');


/**
 * メディアフォルダのパスを取得するショートコード
 *
 * @param [type] $atts
 * @param [type] $content
 * @return void
 */
function getmediaurl($atts, $content = null)
{
    $wp_upload_dir = wp_upload_dir();
    return $wp_upload_dir['baseurl'];
}
add_shortcode('mediaurl', 'getmediaurl');


/**
 * CSSの読み込み
 *
 * @return void
 */
function add_tokushima_sogo_styles()
{
    wp_enqueue_style('tokushima_sogo_reset_style', get_template_directory_uri() . '/assets/css/reset.css');
    wp_enqueue_style('tokushima_sogo_base_style', get_template_directory_uri() . '/assets/css/base.css');
    wp_enqueue_style('tokushima_sogo_search_style', get_template_directory_uri() . '/assets/css/searchandfilter.css');
    wp_enqueue_style('tokushima_sogo_front_before_style', get_template_directory_uri() . '/assets/css/basebefo.css');
    wp_enqueue_style('tokushima_sogo_fontawesome', 'https://use.fontawesome.com/releases/v5.15.1/css/all.css');
    //トップページ
    if (is_front_page()) {
        wp_enqueue_style('tokushima_sogo_front_page_style', get_template_directory_uri() . '/assets/css/front-page.css');

        //固定ページ
    } else if (is_page('quiz')) {
        wp_enqueue_style('tokushima_sogo_quiz_style', get_template_directory_uri() . '/assets/css/page-quiz.css');
    } else if (is_page('mymap')) {
        wp_enqueue_style('tokushima_sogo_page_style', get_template_directory_uri() . '/assets/css/page.css');
        wp_enqueue_style('tokushima_sogo_mymap_style', get_template_directory_uri() . '/assets/css/mymap.css');
    } else if (is_page()) {
        wp_enqueue_style('tokushima_sogo_page_style', get_template_directory_uri() . '/assets/css/page.css');

        // シングルページ
    } else if (is_singular('special')) {
        wp_enqueue_style('tokushima_sogo_single_special_style', get_template_directory_uri() . '/assets/css/single-special.css');
    } else if (is_singular('event') || is_singular('famous')) {
        wp_enqueue_style('tokushima_sogo_slick_style', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', false);
        wp_enqueue_style('tokushima_sogo_single_event_style', get_template_directory_uri() . '/assets/css/single-event.css');
        wp_enqueue_style('tokushima_sogo_slick_set', get_template_directory_uri() . '/assets/css/slick.css', false);
    } else if (is_singular('horror')) {
        wp_enqueue_style('tokushima_sogo_single_horror_style', get_template_directory_uri() . '/assets/css/single-horror.css');
    } else if (is_singular()) {
        wp_enqueue_style('tokushima_sogo_single_style', get_template_directory_uri() . '/assets/css/single.css', false);
        wp_enqueue_style('tokushima_sogo_slick_style', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', false);
        wp_enqueue_style('tokushima_sogo_slick_set', get_template_directory_uri() . '/assets/css/slick.css', false);
        //アーカイブ（一覧）ページ
        //間違ってたらこっち。is_post_type_archive()  カスタム投稿のアーカイブページが表示されている場合。

    } else if (is_post_type_archive('special')) {
        wp_enqueue_style('tokushima_sogo_archive_special_style', get_template_directory_uri() . '/assets/css/archive-special.css');
    } else if (is_post_type_archive('horror')) {
        wp_enqueue_style('tokushima_sogo_archive_horror_style', get_template_directory_uri() . '/assets/css/archive-horror.css');
    } else if (is_post_type_archive('event') || is_post_type_archive('famous')) {
        wp_enqueue_style('tokushima_sogo_archive_event_style', get_template_directory_uri() . '/assets/css/archive-event.css');
    } else if (is_tax('area', array('east', 'west', 'city', 'south'))) {
        wp_enqueue_style('tokushima_sogo_taxonomy_area_style', get_template_directory_uri() . '/assets/css/taxonomy-area.css');
    } else if (is_tax()) {
        wp_enqueue_style('tokushima_sogo_taxonomy_style', get_template_directory_uri() . '/assets/css/taxonomy.css');
    } else if (is_404()) {
        wp_enqueue_style('tokushima_sogo_404', get_template_directory_uri() . '/assets/css/404.css');
    }
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
    wp_enqueue_script('slick_carousel_js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', '', '', true);
    if (is_front_page()) {
        wp_enqueue_script('scroll_js', get_template_directory_uri() . '/assets/js/scroll.js', '', '', true);
        wp_enqueue_script('elevator', get_template_directory_uri() . '/assets/js/elevator.js', '', '', true);
    } else if (is_single()) {
        wp_enqueue_script('slick_setting_js', get_template_directory_uri() . '/assets/js/slicksetting.js', '', '', true);
    } else if (is_archive()) {
        wp_enqueue_script('sogo_more_js', get_template_directory_uri() . '/assets/js/more.js', '', '', true);
    } else if (is_tax('area', array('east', 'west', 'city', 'south'))) {
        wp_enqueue_script('sogo_more_js', get_template_directory_uri() . '/assets/js/more.js', '', '', true);
    }
    wp_enqueue_script('searchandfilter', get_template_directory_uri() . '/assets/js/searchandfilter.js', '', '', true);
    wp_enqueue_script('sogo_common', get_template_directory_uri() . '/assets/js/sogo_common.js', '', '', true);
}
add_action('wp_enqueue_scripts', 'add_tokushima_sogo_scripts');




// 下記からは、絶対に編集しない！！！！！！！！！！！

/**
 * myマップページのみカスタムクエリを適用する
 */
// カスタムクエリでwp_postsとwp_ulikeを結合
add_filter('posts_join', 'table_join');
function table_join($join)
{
    global $wpdb;
    if (is_page(220)) {
        $join .= " INNER JOIN wp_ulike ON $wpdb->posts.ID = wp_ulike.post_id ";
    }
    return $join;
}

//取得したいデータのフィールドを追加
add_filter('posts_fields', 'add_fields');
function add_fields($fields)
{
    if (is_page(220)) {
        $fields .= ',wp_ulike.ip';
        $fields .= ',wp_ulike.status';
    }
    return $fields;
}

// 絞り込むSQLを追加
// add_filter('posts_where', 'filter_where');
// function filter_where($where)
// {
//     if (is_page(220)) {
//         $where = "";
//         $where .= " AND wp_ulike.status = 'like' ";
//     }
//     return $where;
// }

// レンタルサーバーにはもう一つwhereをつなぐ
// add_filter('posts_where', 'filter_where');
// function filter_where($where)
// {
//     if (is_page(220)) {
//         $ip = $_SERVER['REMOTE_ADDR'];
//         $where = "";
//         $where .= " AND wp_ulike.status = 'like' ";
//         $where .= " AND ip = '$ip' ";
//     }
//     return $where;
// }

// 絞り込むSQLを追加
// ローカルの場合
// add_filter('posts_where', 'filter_where');
// function filter_where($where)
// {
//     if (is_page(220)) {
//         $where = "";
//         $where .= " AND ip = '127.0.0.1' ";
//         $where .= " AND wp_ulike.status = 'like' ";
//         $where .= " AND wp_posts.post_status = 'publish' ";
//         $where .= " OR wp_posts.ID = '1' ";
//     }
//     return $where;
// }

// レンタルサーバーの場合
add_filter('posts_where', 'filter_where');
function filter_where($where)
{
    if (is_page(220)) {
        $ip = $_SERVER['REMOTE_ADDR'];
        $where = "";
        $where .= " AND wp_ulike.status = 'like' ";
        $where .= " AND ip = '$ip' ";
        $where .= " AND wp_posts.post_status = 'publish' ";
        $where .= " OR wp_posts.ID = '1' ";
    }
    return $where;
}
/**
 * ここまで：myマップページのみカスタムクエリを適用する
 */

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


//クッキーを付与する（都市伝説解除キー）
function my_setcookie()
{
    if (is_archive('horror')) {
        setcookie('legend', 1, time() + 86400 * 30, "/");
    }
}
add_action('get_header', 'my_setcookie');
