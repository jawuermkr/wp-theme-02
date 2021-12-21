<?php

// Requeridas por wordpress
if ( ! isset( $content_width ) ) $content_width = 800;

add_theme_support( 'automatic-feed-links' );
/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support( 'title-tag' );
if ( is_singular() ) wp_enqueue_script( "comment-reply" );

// This theme uses wp_nav_menu() in a locations.
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'imperium' ),
) );

// inicio add del style.css
function load_styles() {
    wp_register_style('theme_style', get_stylesheet_uri(), '', '1.0', 'all' );
    wp_enqueue_style('theme_style');
    
    // estilos diferentes al style.css
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
}
add_action('wp_enqueue_scripts', 'load_styles');

// Inicio add de scripts .js
function theme_js() {
    wp_enqueue_script( 'wow_js', get_template_directory_uri() . '/js/wow.min.js');
}
add_action( 'wp_enqueue_scripts', 'theme_js');

// sidebar widgets
function a_register_sidebars() {
    register_sidebar(array(
        'name' => __('Sidebar Principal', 'imperium'),
        'id' => 'main_sidebar',
        'description' => __('Este es el sidebar principal', 'imperium'),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}
add_action('widgets_init', 'a_register_sidebars');

// Imagen destacada para posts
add_theme_support('post-thumbnails');
add_image_size('img-post', 300, 300, true);

// Header Imagen de Fondo 
$banner = array(
  'header-text'   => false,
	'width'         => 980,
	'height'        => 200,
	'default-image' => get_template_directory_uri() . '/img/fondo.jpg',
);
add_theme_support( 'custom-header', $banner );

$fondo = array(
	'default-image' => '',
    'default-position-y' => 'top',
    'default-size' => 'auto',
    'default-repeat' => 'repeat',
    'default-attachment' => 'scroll',
    'wp-head-callback' => '_custom_background_cb',
    'admin-head-callback' => '',
    'admin-preview-callback' => '',
    'default-color' => '000000'
);
add_theme_support( 'custom-background', $fondo );

// Imagenes y Textos Íconos Tres
function wp_images_ico ($wp_ico){
  // Section Íconos Tres
  $wp_ico->add_section('ico', array(
    'title'   => __('Diseño Íconos', 'imperium'),
    'description' => sprintf(__('Opciones','imperium')),
    'priority'    => 140
  ));
  // Íconos a
  $wp_ico->add_setting('image-a', array(
    'default'   => get_template_directory_uri('template_directory').'/img/01.jpg',
    'sanitize_callback' => 'esc_attr',
    'type'      => 'theme_mod'
  ));
  $wp_ico->add_control(new WP_Customize_Image_Control($wp_ico, 'image-a', array(
    'label'   => __('Imagen A', 'imperium'),
    'section' => 'ico',
    'settings' => 'image-a',
    'priority'  => 1
  )));
  $wp_ico->add_setting('text-a', array(
    'default'   => __('DESCRIPCIÓN', 'imperium'),
    'sanitize_callback' => 'esc_attr',
    'type'      => 'theme_mod'
  ));
  $wp_ico->add_control('text-a', array(
    'label'   => __('Texto', 'imperium'),
    'section' => 'ico',
    'priority'  => 2
  ));
  // Íconos b
  $wp_ico->add_setting('image-b', array(
    'default'   => get_template_directory_uri('template_directory').'/img/02.jpg',
    'sanitize_callback' => 'esc_attr',
    'type'      => 'theme_mod'
  ));
  $wp_ico->add_control(new WP_Customize_Image_Control($wp_ico, 'image-b', array(
    'label'   => __('Imagen B', 'imperium'),
    'section' => 'ico',
    'settings' => 'image-b',
    'priority'  => 3
  )));
  $wp_ico->add_setting('text-b', array(
    'default'   => __('DESCRIPCIÓN', 'imperium'),
    'sanitize_callback' => 'esc_attr',
    'type'      => 'theme_mod'
  ));
  $wp_ico->add_control('text-b', array(
    'label'   => __('Texto', 'imperium'),
    'section' => 'ico',
    'priority'  => 4
  ));
  // Íconos c
  $wp_ico->add_setting('image-c', array(
    'default'   => get_template_directory_uri('template_directory').'/img/03.jpg',
    'sanitize_callback' => 'esc_attr',
    'type'      => 'theme_mod'
  ));
  $wp_ico->add_control(new WP_Customize_Image_Control($wp_ico, 'image-c', array(
    'label'   => __('Imagen C', 'imperium'),
    'section' => 'ico',
    'settings' => 'image-c',
    'priority'  => 5
  )));
  $wp_ico->add_setting('text-c', array(
    'default'   => __('DESCRIPCIÓN', 'imperium'),
    'sanitize_callback' => 'esc_attr',
    'type'      => 'theme_mod'
  ));
  $wp_ico->add_control('text-c', array(
    'label'   => __('Texto', 'imperium'),
    'section' => 'ico',
    'priority'  => 6
  ));
}
add_action('customize_register', 'wp_images_ico');

// Imagenes y Textos Frontales

function wp_images_front ($wp_customize){
    
    // Section Diseño Frontal
    $wp_customize->add_section('front', array(
      'title'   => __('Diseño Frontal', 'imperium'),
      'description' => sprintf(__('Opciones','imperium')),
      'priority'    => 140
    ));
    // Front Page Image One
    $wp_customize->add_setting('image-unu', array(
      'default'   => get_template_directory_uri('template_directory').'/img/popu.jpg',
      'sanitize_callback' => 'esc_attr',
      'type'      => 'theme_mod'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image-unu', array(
      'label'   => __('Imagen Uno', 'imperium'),
      'section' => 'front',
      'settings' => 'image-unu',
      'priority'  => 1
    )));
    $wp_customize->add_setting('image-title', array(
      'default'   => __('Lorem ipsum', 'imperium'),
      'sanitize_callback' => 'esc_attr',
      'type'      => 'theme_mod'
    ));
    $wp_customize->add_control('image-title', array(
      'label'   => __('Título', 'imperium'),
      'section' => 'front',
      'priority'  => 2
    ));
    $wp_customize->add_setting('image-text', array(
      'default'   => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'imperium'),
      'sanitize_callback' => 'esc_attr',
      'type'      => 'theme_mod'
    ));
    $wp_customize->add_control('image-text', array(
      'label'   => __('Texto', 'imperium'),
      'section' => 'front',
      'type' => 'textarea',
      'priority'  => 3
    ));
    // Front Page Image Two
    $wp_customize->add_setting('image-du', array(
      'default'   => get_template_directory_uri('template_directory').'/img/rec.jpg',
      'sanitize_callback' => 'esc_attr',
      'type'      => 'theme_mod'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image-du', array(
      'label'   => __('Imagen Dos', 'imperium'),
      'section' => 'front',
      'settings' => 'image-du',
      'priority'  => 4
    )));
    $wp_customize->add_setting('image-title-du', array(
      'default'   => __('Lorem ipsum', 'imperium'),
      'sanitize_callback' => 'esc_attr',
      'type'      => 'theme_mod'
    ));
    $wp_customize->add_control('image-title-du', array(
      'label'   => __('Título', 'imperium'),
      'section' => 'front',
      'priority'  => 5
    ));
    $wp_customize->add_setting('image-text-du', array(
      'default'   => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'imperium'),
      'sanitize_callback' => 'esc_attr',
      'type'      => 'theme_mod'
    ));
    $wp_customize->add_control('image-text-du', array(
      'label'   => __('Texto', 'imperium'),
      'section' => 'front',
      'type' => 'textarea',
      'priority'  => 6
    ));
  }
  add_action('customize_register', 'wp_images_front');

function wp_blog_title ($wp_customize){
// Section Titulo Blogs
    $wp_customize->add_section('blog', array(
      'title'   => __('Blog', 'imperium'),
      'description' => sprintf(__('Blog','imperium')),
      'priority'    => 150
    ));
    $wp_customize->add_setting('blog-name', array(
      'default'   => __('Noticias', 'imperium'),
      'sanitize_callback' => 'esc_attr',
      'type'      => 'theme_mod'
    ));
    $wp_customize->add_control('blog-name', array(
      'label'   => __('Blog', 'imperium'),
      'section' => 'blog',
      'priority'  => 1
    ));
    }
add_action('customize_register', 'wp_blog_title');

// wp_link_pages

$defaults = array(
		'before'           => '<p>' . __( 'Pages:', 'imperium' ),
		'after'            => '</p>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => __( 'Next page', 'imperium'),
		'previouspagelink' => __( 'Previous page', 'imperium' ),
		'pagelink'         => '%',
		'echo'             => 1
	);

  wp_link_pages( $defaults );

add_editor_style( 'style.css' );
    
?>