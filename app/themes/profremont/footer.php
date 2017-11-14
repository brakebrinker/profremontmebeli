<footer>
  <?php if( is_front_page() ) { ?>
  <div class="footer-home-contacts container">
     <h2>Контактная информация</h2>
     <div class="content-subtitle">Позвоните нам или оставьте заявку и мы свяжемся с вами.</div>
     <div class="footer-home-contacts_wrapper">
       <div class="address left">
         <h3>Адресы</h3>
         <div class="sub">Офис в Москве</div>
         <p>
           <span><?php echo get_field('contacts_msk_phone', 79); ?></span>
           <?php echo get_field('contacts_msk_address', 79); ?>
         </p>
         <div class="sub">Офис в Санкт-Петербурге</div>
         <p>
           <span><?php echo get_field('contacts_spb_phone', 79); ?></span>
           <?php echo get_field('contacts_spb_address', 79); ?>
         </p>
         <a href="mailto:<?php echo get_field('contacts_spb_email', 79); ?>" class="mail-link"><?php echo get_field('contacts_msk_email', 79); ?></a>
         <p>
           Также вы можете написать и скинуть нам  фотографии для оценки ремонта в Whatsapp и Viber:
           <span><?php echo get_option('mobile_phone'); ?></span> 
         </p>
       </div>

        <?php
        echo do_shortcode('[contact-form-7 id="210" html_class="right" title="Контактная форма Напишите нам на Главной"]'); 
        ?>
     </div>
  </div>
  <?php } ?>
  <div class="container">

    <div class="footer-contacts left">
      <a href="<?php echo get_home_url(); ?>" class="footer-logo left">
        <img src="<?php bloginfo('template_url'); ?>/images/footer_logo.png" alt="logo">
      </a>
      <?php if (!dynamic_sidebar('Область соц кнопок')):?> <?php endif ;?>
      <div class="footer-phone right">
        <p class="inline"><?php echo get_option('site_telephone'); ?></p>
        <a href="#" class="call-me trans-orange-button inline" data-toggle="modal" data-target="#callback">Перезвоните мне</a>
      </div>
    </div>

    <div class="footer-menu left">
      <ul>
        <li class="current_page_item"><a href="#">Частным клиентам</a></li>
        <li><a href="#">Корпоративным клиентам</a></li>
      </ul>

      <?php
      wp_nav_menu( array(
          'menu_class'=>'',
          'container'       => '',
          'theme_location'=>'bottom'
      ) );

      wp_nav_menu( array(
          'menu_class'=>'',
          'container'       => '',
          'theme_location'=>'bottom_serv'
      ) );
      ?>

    </div>
    <div class="mobile-show">
      <p class="bottom-phone"><?php echo get_option('site_telephone'); ?></p>
      <a href="#" class="call-me-button">Перезвоните мне</a>
    </div>
    <div class="footer-copy left">
      <p class="left">© 2010–2017, ООО «Франч-гид». Все права защищены.</p>
      <p class="right">Профессиональный ремонт<br> мебели на дому и в мастерской</p>
    </div>

    <div class="footer-info left">
      Обращаем ваше внимание на то, что данный интернет-сайт носит исключительно информационный характер и ни при каких условиях не является публичной офертой, определяемой положениями статьи 437 Гражданского кодекса Российской Федерации. Порядок оформления гражданско-правовых отношений, объем, точная стоимость услуг, сроки их оказания, а также иные условия оказания услуг определяются при выезде мастера к клиенту.
    </div>

  </div>
</footer>
<a href="#" class="scrollup"></a>
<?php get_template_part( 'popup', 'forms' ); ?>

<?php wp_footer(); ?>
</body>

<!-- Mirrored from webdego.com/sites/profRemont/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Oct 2017 15:31:42 GMT -->
</html>