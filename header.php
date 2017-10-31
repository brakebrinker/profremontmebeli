<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-RU-Compatible" content="IE=edge">
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
         <p><span class="whatsapp">Whatsapp</span> и <span class="viber">Viber</span> <span class="mobile-hide"> для фото</span>: +7 925 514-73-72</p>
       </div>
     </div>
   </div>

   <div class="bottom-header container">
     <div class="bottom-header_left-part left">
       <a href="#" class="main-logo inline"><img src="images/logo.png" alt="logo"></a>
       <p class="work-hours inline"><?php echo get_option('work_modes'); ?></p>
     </div>

     <div class="bottom-header_right-part right">
       <div class="mobile-hidden inline"><a href="#">Услуги</a><a href="#">Цены</a></div>
       <p class="bottom-header_phone"><a href="tel:+<?php echo preg_replace("/[^0-9]/", '', get_option('mobile_phone')); ?>"><?php echo get_option('mobile_phone'); ?></a></p>
       <a href="#" class="call-me-button button-green" data-toggle="modal" data-target="#callback">Перезвоните мне</a>
       <div id="hamburger" class="hamburger inline">
          <div class="line"></div>
          <div class="line"></div>
          <div class="line"></div>
        </div>
     </div>
      
      <nav class="left">
       
       <ul>
         <li class="current_page_item"><a href="#">О компании</a></li>
         <li class="menu-item-has-children">
         <a href="#">Услуги</a>
         <ul class="sub-menu">
           <li><a href="#">Ремонт мягкой мебели</a></li>
           <li><a href="#">Ремонт кожаной мебели</a></li>
           <li><a href="#">Ремонт диванов</a></li>
         </ul>
         </li>
         <li><a href="#">Цены</a></li>
         <li><a href="#">Примеры работ</a></li>
         <li><a href="#">Подбор материала</a></li>
         <li><a href="#">Вопрос-ответ</a></li>
         <li><a href="#">Отзывы</a></li>
         <li><a href="#">Статьи</a></li>
         <li><a href="#">Контакты</a></li>
         <li class="mobile-show">        
          <a href="#">Сайт для корпоративных клиентов</a>
         <p class="bottom-header_phone"><?php echo get_option('mobile_phone'); ?></p>
         <a href="#" class="call-me-button button-green" data-toggle="modal" data-target="#callback">Перезвоните мне</a></li>
       </ul>
      </nav>
   </div>
 </header>