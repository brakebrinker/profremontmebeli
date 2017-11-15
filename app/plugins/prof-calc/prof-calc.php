<?php 
/**
*   Plugin Name: Prof Calc Ajax
*   Description: Ajax калькулятор. Плагин создан специально для сайта profremontmebeli.ru
*   Author: Zumtum
*   Author URI: https://www.montirovka.by
*/

add_shortcode( 'profcalc', 'prof_calc_shortcode' );

function prof_calc_shortcode() { 
	include plugin_dir_path( __FILE__ ) . 'calc.php';
	require plugin_dir_path(__FILE__) . 'prof-calc-tpl.php';
}

function prof_calc_register_stylesheet(){
	wp_register_style( 'calc-css', plugins_url( 'calc.css', __FILE__ ));
	wp_enqueue_style( 'calc-css' );
}
add_action( 'wp_enqueue_scripts', 'prof_calc_register_stylesheet' );

function prof_calc_register_script() {
  wp_register_script('calc-js', plugins_url('calc.js', __FILE__), array('jquery') );
  wp_enqueue_script('calc-js');
  wp_localize_script('calc-js', profCalc, array(
  	'calcurl' => plugin_dir_url( __FILE__ ) . 'calc.php'
  ));
}
add_action( 'wp_enqueue_scripts', 'prof_calc_register_script' );