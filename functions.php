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

    wp_enqueue_style('tokushima_sogo_reset_style', get_template_directory_uri() . '/assets/css/reset.css');
    wp_enqueue_style('tokushima_sogo_base_style', get_template_directory_uri() . '/assets/css/reset.css');

    if (is_home()) {
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
}
add_action('wp_enqueue_scripts', 'add_tokushima_sogo_scripts');
