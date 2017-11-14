<?php 
/**
*   Plugin Name: Prof Calc Ajax
*   Description: Ajax калькулятор. Плагин создан специально для сайта profremontmebeli.ru
*   Author: Zumtum
*   Author URI: https://www.montirovka.by
*/
function wpmudev_cta_shortcode() {
  <div class="cta">
    echo 'Hello my friend';
  </div>
}
add_shortcode( 'CTA', 'wpmudev_cta_shortcode' );
