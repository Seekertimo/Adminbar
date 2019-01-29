<?php
/*
Plugin Name: Bar positie
Version: 0.0.1
Author: Timo van Elst
Author URI:
Plugin URI:
Description: Laat admin bar naar boven en benden gaan
 */

if (!class_exists("AdminBarPosition")) {
    register_activation_hook( __FILE__, array( 'BarPositie', 'admin_bar_position' ) );
    class AdminBarPosition
    {

        public function __construct()
        {
            add_theme_support('admin-bar', array('callback' => '__return_false'));
            add_action('wp_head', array($this, 'adminbar_print_css'));
            add_action('wp_enqueue_scripts', array($this, 'adminbar_script'));
        }

        public function adminbar_print_css()
        {
            if (is_user_logged_in()) {
                echo <<< EOM
<style>
#wpadminbar{
    top:auto;
    bottom: 0;
}
</style>
EOM;
            }
        }

        public function adminbar_script()
        {
            if (is_user_logged_in()) {
                wp_enqueue_script('jquery');
                wp_enqueue_script('adminbar-position.js', untrailingslashit( plugins_url( '', __FILE__ ) ) . '/js/scripts.js');
        }
    }
}
new AdminBarPosition();
}
