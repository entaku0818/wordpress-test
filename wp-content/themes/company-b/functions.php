<?php
// Add company specific body class
add_filter('body_class', function($classes) {
  // Check if current site is for Company B
  if (is_page('company-b') || is_category('company-b')) {
    $classes[] = 'company-b';
  }
  return $classes;
});

// Enqueue custom styles
function company_b_enqueue_styles() {
  wp_enqueue_style(
    'company-b-style',
    get_stylesheet_directory_uri() . '/style.css',
    array('twentytwentyfive-style')
  );
}
add_action('wp_enqueue_scripts', 'company_b_enqueue_styles');
