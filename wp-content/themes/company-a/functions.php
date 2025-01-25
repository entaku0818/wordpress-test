<?php
// Add company specific body class
add_filter('body_class', function($classes) {
  // Check if current site is for Company A
  // You can modify this condition based on your site structure
  if (is_page('company-a') || is_category('company-a')) {
    $classes[] = 'company-a';
  }
  return $classes;
});

// Enqueue custom styles
function company_a_enqueue_styles() {
  wp_enqueue_style(
    'company-a-style',
    get_stylesheet_directory_uri() . '/style.css',
    array('twentytwentyfive-style')
  );
}
add_action('wp_enqueue_scripts', 'company_a_enqueue_styles');
