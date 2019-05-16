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

/**
 * AJAX search function
 */
function ajax_search(){
  //find posts based on the request
  $args = [
    'offset'      => ($_REQUEST['page'] - 1) * get_option('posts_per_page'),
    's'           => $_REQUEST['search'],
    'cat'         => $_REQUEST['category'],
    'post_type'   => 'post',
    'post_status' => 'publish'
  ];

  $query = new WP_Query($args);

  //there is alot of stuff we don't want to send that WP Query gives us, so just pick out the important pieces
  $clean_results = [];  
  $clean_results['maxPages'] = $query->max_num_pages;
  $clean_results['results'] = $query->posts;

  //we area also going to add some stuff to each post
  array_map('get_more_meta', $clean_results['results']);

  //send the clean results to the vue app
  wp_send_json_success($clean_results);
}
add_action( 'wp_ajax_ajax_search', 'ajax_search' );
add_action( 'wp_ajax_nopriv_ajax_search', 'ajax_search' );

/**
 * Adds more meta to each result from ajax_search
 */
function get_more_meta($post){
  $post->permalink = get_the_permalink($post);
  $post->thumbnail = get_the_post_thumbnail_url($post, 'thumbnail');
  $post->excerpt   = get_the_excerpt($post);
  $post->category  = get_the_category($post) ?: [];
  $post->category  = count($post->$category) ? $post->category[0]->name : '';
  $post->post_date = date('F j, Y', strtotime($post->post_date));
}