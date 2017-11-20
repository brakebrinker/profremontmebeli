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
    'bottom' => 'Нижнее меню',
    'bottom_serv' => 'Нижнее меню услуг',
    'bottom_switch' => 'Нижнее меню под лого'
));

//виджет кнопок соц сетей
add_theme_support( widgets );

register_sidebar(array(
   'name' => __("Область соц кнопок", CURRENT_THEME),
   'id' => 'social-buttons-area',
   'description' => __("Область соц кнопок в футере", CURRENT_THEME),
   'before_widget' => '<div id="%1$s">',
   'after_widget' => '</div>',
   'before_title' => '<h4>',
   'after_title' => '</h4>',
));

// хлебные крошки
/*
 * "Хлебные крошки" для WordPress
 * автор: Dimox
 * версия: 2017.01.21
 * лицензия: MIT
*/
function dimox_breadcrumbs() {

  /* === ОПЦИИ === */
  $text['home'] = 'Главная'; // текст ссылки "Главная"
  $text['category'] = '%s'; // текст для страницы рубрики
  $text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
  $text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
  $text['author'] = 'Статьи автора %s'; // текст для страницы автора
  $text['404'] = 'Ошибка 404'; // текст для страницы 404
  $text['page'] = 'Страница %s'; // текст 'Страница N'
  $text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'

  $wrap_before = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки
  $wrap_after = '</div><!-- .breadcrumbs -->'; // закрывающий тег обертки
  $sep = '/'; // разделитель между "крошками"
  $sep_before = '<span class="sep">'; // тег перед разделителем
  $sep_after = '</span>'; // тег после разделителя
  $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
  $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
  $show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
  $before = '<span class="current">'; // тег перед текущей "крошкой"
  $after = '</span>'; // тег после текущей "крошки"
  /* === КОНЕЦ ОПЦИЙ === */

  global $post;
  $home_url = home_url('/');
  $link_before = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
  $link_after = '</span>';
  $link_attr = ' itemprop="item"';
  $link_in_before = '<span itemprop="name">';
  $link_in_after = '</span>';
  $link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
  $frontpage_id = get_option('page_on_front');
  $parent_id = ($post) ? $post->post_parent : '';
  $sep = ' ' . $sep_before . $sep . $sep_after . ' ';
  $home_link = $link_before . '<a href="' . $home_url . '"' . $link_attr . ' class="home">' . $link_in_before . $text['home'] . $link_in_after . '</a>' . $link_after;

  //-------Переопределение последних заголовков крошек
      if (get_field('seo_breadcrumbs', get_the_ID())) {
        $postTitle = get_field('seo_breadcrumbs', get_the_ID());
      } else {
        $postTitle = get_the_title();
      }
  //================

  if (is_home() || is_front_page()) {

    if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;

  } else {

    echo $wrap_before;
    if ($show_home_link) echo $home_link;

    if ( is_category() ) {
      $cat = get_category(get_query_var('cat'), false);
      if ($cat->parent != 0) {
        $cats = get_category_parents($cat->parent, TRUE, $sep);
        $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        if ($show_home_link) echo $sep;
        echo $cats;
      }
      if ( get_query_var('paged') ) {
        $cat = $cat->cat_ID;
        echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            if ($slug['slug'] === 'materials') {
                $pageLink = wp_basename(get_page_link(192));
                $postTypeName = $post_type->labels->name;
                echo $sep . sprintf($link, $home_url . $pageLink, $postTypeName) . $after;
            }
            echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
        } 
      }

    } elseif ( is_search() ) {
      if (have_posts()) {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
      } else {
        if ($show_home_link) echo $sep;
        echo $before . sprintf($text['search'], get_search_query()) . $after;
      }

    } elseif ( is_day() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
      echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
      if ($show_current) echo $sep . $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
      if ($show_current) echo $sep . $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {

      if ($show_home_link) echo $sep;
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        //----------------------------
        if ($slug['slug'] === 'materials') {
            $pageLink = wp_basename(get_page_link(192));
        } elseif ($slug['slug'] === 'works') {
            $pageLink = wp_basename(get_page_link(90));
        } elseif ($slug['slug'] === 'articles') {
            $pageLink = wp_basename(get_page_link(26));
        } elseif ($slug['slug'] === 'services') {
            $pageLink = wp_basename(get_page_link(126));
        } elseif ($slug['slug'] === 'faq') {
            $pageLink = wp_basename(get_page_link(269));
        } else {
            $pageLink = $slug['slug'];
        }
        //-----------------------------
        printf($link, $home_url . $pageLink . '/', $post_type->labels->name);

        if (get_the_category()) {
            echo $sep; 
            the_category('/', 'multiple'); 
        }

        if ($show_current) echo $sep . $before . $postTitle . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, $sep);
        if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
        if ( get_query_var('cpage') ) {
          echo $sep . sprintf($link, get_permalink(), $postTitle) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
        } else {
          if ($show_current) echo $before . $postTitle . $after;
        }
      }

    // custom post type
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      if ( get_query_var('paged') > 1) {
        echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $postTitle) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . $postTitle . $after;
      }

    } elseif ( is_attachment() ) {
      if ($show_home_link) echo $sep;
      $parent = get_post($parent_id);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      if ($cat) {
        $cats = get_category_parents($cat, TRUE, $sep);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
      }
      printf($link, get_permalink($parent), $parent->post_title);
      if ($show_current) echo $sep . $before . $postTitle . $after;

    } elseif ( is_page() && !$parent_id ) {
      if ($show_current) echo $sep . $before . $postTitle . $after;

    } elseif ( is_page() && $parent_id ) {
      if ($show_home_link) echo $sep;
      if ($parent_id != $frontpage_id) {
        $breadcrumbs = array();
        while ($parent_id) {
          $page = get_page($parent_id);
          //-------Переопределение последних заголовков крошек
              if (get_field('seo_breadcrumbs', $page->ID)) {
                $postTitle = get_field('seo_breadcrumbs', $page->ID);
              } else {
                $postTitle = get_the_title($page->ID);
              }
          //================
          if ($parent_id != $frontpage_id) {
            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), $postTitle);
          }
          $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        for ($i = 0; $i < count($breadcrumbs); $i++) {
          echo $breadcrumbs[$i];
          if ($i != count($breadcrumbs)-1) echo $sep;
        }
      }
      $page = get_page($parent_id);
      //-------Переопределение последних заголовков крошек
      if (get_field('seo_breadcrumbs', $page->ID)) {
        $postTitle = get_field('seo_breadcrumbs', $page->ID);
      } else {
        $postTitle = get_the_title($page->ID);
      }
      //================

      if ($show_current) echo $sep . $before . $postTitle . $after;

    } elseif ( is_tag() ) {
      if ( get_query_var('paged') ) {
        $tag_id = get_queried_object_id();
        $tag = get_tag($tag_id);
        echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
      }

    } elseif ( is_author() ) {
      global $author;
      $author = get_userdata($author);
      if ( get_query_var('paged') ) {
        if ($show_home_link) echo $sep;
        echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
      }

    } elseif ( is_404() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . $text['404'] . $after;

    } elseif ( has_post_format() && !is_singular() ) {
      if ($show_home_link) echo $sep;
      echo get_post_format_string( get_post_format() );
    }

    echo $wrap_after;

  }
} // end of dimox_breadcrumbs()

// пункт главного меню
add_filter( 'wp_nav_menu_items', 'your_custom_menu_item', 10, 2 );
function your_custom_menu_item ( $items, $args ) {
if ($args->theme_location === 'top') {
$items .= '<li class="mobile-show">        
        <a href="#">Сайт для корпоративных клиентов</a>
       <p class="bottom-header_phone">' . get_option('mobile_phone') . '</p>
       <a href="#" class="call-me-button button-green" data-toggle="modal" data-target="#callback">Перезвоните мне</a></li>';
}
return $items;
}

