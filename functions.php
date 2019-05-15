<?php

/**
 * Enqueue styles and scripts
 */
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
  //scripts
  wp_enqueue_script('vue', 'https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js', [], '2.6.10', true);
  wp_enqueue_script('vue-search', get_stylesheet_directory_uri() . '/vue-search.js', ['vue', 'jquery'], '1.0', true);

  //localize vue search to tell us where to send the ajax
  wp_localize_script('vue-search', 'adminAjax', admin_url( 'admin-ajax.php' ));

  //style
  wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}