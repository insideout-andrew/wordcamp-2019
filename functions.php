<?php

/**
 * Enqueue styles and scripts
 */
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
  //style
  wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
