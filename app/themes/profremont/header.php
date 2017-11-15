<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php if (get_field('seo_title', get_queried_object_id())) 
              echo get_field('seo_title', get_queried_object_id());
             else 
              wp_title('«', true, 'right'); 
       ?>
</title>
<meta http-equiv="X-RU-Compatible" content="IE=edge">
<?php if (get_field('seo_description', get_queried_object_id())) { ?>
<meta name="description" content="<?php echo get_field('seo_description', get_queried_object_id()); ?>">
<?php } ?>
<?php if (get_field('seo_keywords', get_queried_object_id())) { ?>
<meta name="keywords" content="<?php echo get_field('seo_keywords', get_queried_object_id()); ?>">
<?php } ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?> 
</head>
<body <?php if( is_front_page() ) echo 'class="home"'; ?>>
 <header>
   <div class="top-header gray-line">
     <div class="container">
       <ul class="left">
         <li><a href="#" class="active">Частным лицам</a></li>
         <li><a href="#">Корпоративным клиентам</a></li>
       </ul>
       <div class="top-contacts right">
         <p><span class="whatsapp">Whatsapp</span> и <span class="viber">Viber</span> <span class="mobile-hide"> для фото</span>: <?php echo get_option('mobile_phone'); ?></p>
       </div>
     </div>
   </div>

   <div class="bottom-header container">
     <div class="bottom-header_left-part left">
       <a href="<?php echo get_home_url(); ?>" class="main-logo inline"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="logo"></a>
       <p class="work-hours inline"><?php echo get_option('work_modes'); ?></p>
     </div>

     <div class="bottom-header_right-part right">
       <div class="mobile-hidden inline"><a href="#">Услуги</a><a href="#">Цены</a></div>
       <p class="bottom-header_phone"><a href="tel:+<?php echo preg_replace("/[^0-9]/", '', get_option('site_telephone')); ?>"><?php echo get_option('site_telephone'); ?></a></p>
       <a href="#" class="call-me-button button-green" data-toggle="modal" data-target="#callback">Перезвоните мне</a>
       <div id="hamburger" class="hamburger inline">
          <div class="line"></div>
          <div class="line"></div>
          <div class="line"></div>
        </div>
     </div>
      
      <nav class="left">
       <?php 
       wp_nav_menu( array(
           'menu_class'=>'',
           'container'       => '',
           'theme_location'=>'top'
       ) );
       ?>
       <li class="mobile-show">        
        <a href="#">Сайт для корпоративных клиентов</a>
       <p class="bottom-header_phone"><?php echo get_option('mobile_phone'); ?></p>
       <a href="#" class="call-me-button button-green" data-toggle="modal" data-target="#callback">Перезвоните мне</a></li>
      </nav>
   </div>
 </header>