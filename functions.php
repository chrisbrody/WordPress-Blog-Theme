<?php

  function additional_theme_support(){
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
  }
  // when wp runs this hook 'after_setup_theme' also call my function 'additional_theme_support'
  add_action('after_setup_theme', 'additional_theme_support');

  // Add menu to theme
  function custom_theme_menus() {
    $locations = array(
      'primary' => "Desktop Primary Menu"
    );

    register_nav_menus($locations);
  }

  add_action('init', 'custom_theme_menus');

  // Get CSS
  function custom_theme_register_styles(){
    // create dynamic theme version based on style.css
    $version = wp_get_theme()->get('Version');

    wp_enqueue_style('custom-theme-styles', get_template_directory_uri() . "/style.css", array('custom-theme-bootstrap'), $version, 'all');
    wp_enqueue_style('custom-theme-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('custom-theme-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');

  }
  // when wp runs this hook 'wp_enqueue_scripts' also call my function 'blogchris_register_styles'
  add_action( 'wp_enqueue_scripts', 'custom_theme_register_styles');

  // Get JS
  function custom_theme_register_scripts(){
    wp_enqueue_script('custom-theme-jQuery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', true);
    wp_enqueue_script('custom-theme-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.0', true);
    wp_enqueue_script('custom-theme-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js", array(), '4.4.1', true);
    wp_enqueue_script('custom-theme-main', get_template_directory_uri() . "/assets/js/main.js", array(), '1.0', true);
  }
  // when wp runs this hook 'wp_enqueue_scripts' also call my function 'blogchris_register_scripts'
  add_action( 'wp_enqueue_scripts', 'custom_theme_register_scripts');


  function custom_theme_widget_area() {
    register_sidebar(
      array(
        'before_title' => '<h2>',
        'after_title' => '</h2>',
        'before_widget' => '',
        'before_widget' => '',
        'name' => 'Sidebar Area',
        'id' => 'sidebar-1',
        'description' => 'Sidebar Widget Area'
      )
    );
    register_sidebar(
      array(
        'before_title' => '<h2>',
        'after_title' => '</h2>',
        'before_widget' => '',
        'before_widget' => '',
        'name' => 'Footer Area',
        'id' => 'footer-1',
        'description' => 'Footer Widget Area'
      )
    );
  }
  add_action('widgets_init', 'custom_theme_widget_area');
?>
