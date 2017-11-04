<?php 
/**
*   Plugin Name: Zummy Ajax Taxonomy Filter
*   Description: Ajax загрузка результатов фильтрации материалов. Плагин создан специально для сайта profremontmebeli.ru
*   Author: Zumtum
*   Author URI: https://www.montirovka.by
*/
add_action('wp_ajax_get_tax', 'ajax_show_post_from_tax');
add_action('wp_ajax_nopriv_get_tax', 'ajax_show_post_from_tax');

function ajax_show_post_from_tax() {

    $arrColors = array();
    $arrTextures = array();
    $arrProperties = array();

    $term_slug = !empty($_GET['termslug']) ? esc_attr($_GET['termslug']) : false;

    $cat = get_category_by_slug($term_slug);

    if (!empty($_GET['colors'])) {
       $arrColors = $_GET['colors'];
    } else {
        $argsColor = array(
         'taxonomy' => 'colors',
         'hide_empty' => true,
         'fields' => 'slugs',
        );

        $arrColors = get_terms( $argsColor );
    }

    if (!empty($_GET['textures'])) {
           $arrTextures = $_GET['textures'];
    } else {
        $argsTextures = array(
         'taxonomy' => 'textures',
         'hide_empty' => true,
         'fields' => 'slugs',
        );

        $arrTextures = get_terms( $argsTextures );
    }

    if (!empty($_GET['properties'])) {
           $arrProperties = $_GET['properties'];
    } else {
        $argsProperties = array(
         'taxonomy' => 'properties',
         'hide_empty' => true,
         'fields' => 'slugs',
        );

        $arrProperties = get_terms( $argsProperties );
    }
    
    $args = array(
        'posts_per_page' => get_option('posts_per_page'),
        'post_type' => 'materials',
        'post_status' => 'publish',
        'category_name' => $term_slug,
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'colors',
                'field' => 'slug',
                'terms' => $arrColors,
            ),
            array(
                'taxonomy' => 'textures',
                'field' => 'slug',
                'terms' => $arrTextures,
            ),
            array(
                'taxonomy' => 'properties',
                'field' => 'slug',
                'terms' => $arrProperties,
            )
        )
    );
    query_posts($args);

    require plugin_dir_path(__FILE__) . 'zummy-filter-tpl.php';

    wp_die();
}

add_action('wp_enqueue_scripts', 'my_assets');
function my_assets() {
    wp_enqueue_script('custom', plugins_url('custom.js', __FILE__), array('jquery'));
    wp_localize_script('custom', myFilter, array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}