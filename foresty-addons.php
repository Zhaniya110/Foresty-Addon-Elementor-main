<?php
/**
 * Plugin Name: Foresty Addon Elementor
 * Version:     1.0.0
 * Text Domain: foresty-addon-elementor
 * Elementor tested up to: 3.17.2
 */

function register_foresty_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/foresty-button.php' );
	require_once( __DIR__ . '/widgets/foresty-slider.php' );
	$widgets_manager->register( new \Elementor_Foresty_Button() );
	$widgets_manager->register( new \Elementor_Foresty_Slider() );

}
add_action( 'elementor/widgets/register', 'register_foresty_widget' );

function register_foresty_widget_styles() {
	wp_register_style( 'stylesheet', plugins_url( 'css/style.css', __FILE__ ) );
	wp_register_style( 'bootstrap-foresty', plugins_url( 'css/bootstrap.css', __FILE__ ));
	wp_register_style( 'bootstrap-icons', plugins_url( 'css/all.min.css', __FILE__ ));
	wp_register_style( 'slider', plugins_url( 'css/slider.css', __FILE__ ));
	
}
add_action( 'wp_enqueue_scripts', 'register_foresty_widget_styles' );

function register_widget_scripts() {
	wp_register_script( 'slider', plugins_url( 'js/slider.js', __FILE__ ) );
}
