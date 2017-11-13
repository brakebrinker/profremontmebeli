<?php 

function enqueue_styles() {
    wp_enqueue_style( 'whitesquare-style', get_stylesheet_uri());
    wp_register_style('font-style', 'https://fonts.googleapis.com/css?family=Fira+Sans:400,500,700&amp;subset=cyrillic-ext');
    wp_enqueue_style( 'font-style');
    wp_register_style('font-style-pt', 'https://fonts.googleapis.com/css?family=PT+Serif:400,700&amp;subset=cyrillic-ext');
    wp_enqueue_style( 'font-style-pt');
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style( 'bootstrap');
    wp_register_style('lightbox', get_template_directory_uri() . '/css/lightbox.css');
    wp_enqueue_style( 'lightbox');
    wp_register_style('slick', get_template_directory_uri() . '/css/slick.css');
    wp_enqueue_style( 'slick');
    wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_style( 'main');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function enqueue_scripts () {
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js');
    wp_enqueue_script('jquery');
    wp_register_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_script('bootstrap-js');
    wp_register_script('slick-js', get_template_directory_uri() . '/js/slick.min.js');
    wp_enqueue_script('slick-js');
    wp_register_script('maskedinput', get_template_directory_uri() . '/js/jquery.maskedinput.min.js');
    wp_enqueue_script('maskedinput');
    wp_register_script('lightbox-js', get_template_directory_uri() . '/js/lightbox.js');
    wp_enqueue_script('lightbox-js');
    wp_register_script('main-js', get_template_directory_uri() . '/js/main.js');
    wp_enqueue_script('main-js');
    wp_register_script('font-awesome', 'https://use.fontawesome.com/5048c3b714.js');
    wp_enqueue_script('font-awesome');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

/**
 * Добавляет страницу настройки темы в админку Вордпресса
 */
function mytheme_customize_register( $wp_customize ) {
/*
Добавляем секцию в настройки темы
*/
$wp_customize->add_section(
    // ID
    'data_site_section',
    // Arguments array
    array(
        'title' => 'Данные сайта',
        'capability' => 'edit_theme_options',
        'description' => "Здесь можно указать данные сайта"
    )
);
/*
Добавляем поле контактных данных
*/
$wp_customize->add_setting(
    // ID
    'work_modes',
    // Arguments array
    array(
        'default' => '',
        'type' => 'option'
    )
);
$wp_customize->add_control(
    // ID
    'work_modes_control',
    // Arguments array
    array(
        'type' => 'text',
        'label' => "Время работы",
        'section' => 'data_site_section',
        // This last one must match setting ID from above
        'settings' => 'work_modes'
    )
);
/*
Добавляем поле телефона site_telephone
*/
$wp_customize->add_setting(
    // ID
    'site_telephone',
    // Arguments array
    array(
        'default' => '',
        'type' => 'option'
    )
);
$wp_customize->add_control(
    // ID
    'site_telephone_control',
    // Arguments array
    array(
        'type' => 'text',
        'label' => "Основной телефон",
        'section' => 'data_site_section',
        // This last one must match setting ID from above
        'settings' => 'site_telephone'
    )
);
/*
Добавляем поле телефона site_telephone
*/
$wp_customize->add_setting(
    // ID
    'mobile_phone',
    // Arguments array
    array(
        'default' => '',
        'type' => 'option'
    )
);
$wp_customize->add_control(
    // ID
    'mobile_phone_control',
    // Arguments array
    array(
        'type' => 'text',
        'label' => "Мобильный телефон",
        'section' => 'data_site_section',
        // This last one must match setting ID from above
        'settings' => 'mobile_phone'
    )
);
}
add_action( 'customize_register', 'mytheme_customize_register' );

// Google map API KEY
function my_acf_google_map_api( $api ){
    
    $api['key'] = 'AIzaSyAzbQxSvs_cxRpIhr9jq7iMSL5xQp6W3xQ';
    
    return $api;
    
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

// регистрируем меню
register_nav_menus(array(
    'top'    => 'Верхнее меню',    //Название месторасположения меню в шаблоне
    'bottom' => 'Нижнее меню'      //Название другого месторасположения меню в шаблоне
));