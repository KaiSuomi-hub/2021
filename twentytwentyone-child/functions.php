<?php
/**
 * Antti Suomi 10.12.21
 *
 * @package twentytwentyone_child
 */

/**
 * Load child theme css and optional scripts
 * @return void
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function twentytwentyone_child_enqueue_styles() {
	wp_enqueue_style('hello-elementor-child-style', get_stylesheet_directory_uri() . '/style.css');
	wp_enqueue_style('fontawesome', get_stylesheet_directory_uri() . '/fontawesome/font-awesome.min.css');
}
add_action( 'wp_enqueue_scripts', 'twentytwentyone_child_enqueue_styles' );

function twentytwentyone_child_enqueue_scripts() {
    //wp_enqueue_script('slick', get_stylesheet_directory_uri() . '/slick-1.8.1/slick.min.js', array( 'jquery' ));
    //wp_enqueue_script('lightbox', get_stylesheet_directory_uri() . '/lightbox/lightbox.js', array( 'jquery' ));
}

add_action( 'wp_enqueue_scripts', 'twentytwentyone_child_enqueue_scripts' );

/**
 * Register Custom Post Type for cars
 */
if ( ! function_exists('case_studies') ) {

function case_studies() {

	$labels = array(
		'name'                  => _x( 'Case Studies', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'A case study', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Case studies', 'text_domain' ),
		'name_admin_bar'        => __( 'Case studies', 'text_domain' ),
		'archives'              => __( 'Case studies', 'text_domain' ),
		'attributes'            => __( 'Attribuutit', 'text_domain' ),
		'parent_item_colon'     => __( 'Vanhempi:', 'text_domain' ),
		'all_items'             => __( 'Kaikki', 'text_domain' ),
		'add_new_item'          => __( 'Lisää uusi', 'text_domain' ),
		'add_new'               => __( 'Lisää uusi', 'text_domain' ),
		'new_item'              => __( 'Uusi', 'text_domain' ),
		'edit_item'             => __( 'Muokkaa', 'text_domain' ),
		'update_item'           => __( 'Päivitä', 'text_domain' ),
		'view_item'             => __( 'Katso', 'text_domain' ),
		'view_items'            => __( 'Katso', 'text_domain' ),
		'search_items'          => __( 'Hae', 'text_domain' ),
		'not_found'             => __( 'Ei löydy', 'text_domain' ),
		'not_found_in_trash'    => __( 'Ei löydy roskakorista', 'text_domain' ),
		'featured_image'        => __( 'Kansikuva', 'text_domain' ),
		'set_featured_image'    => __( 'Aseta kansikuva', 'text_domain' ),
		'remove_featured_image' => __( 'Poista kansikuva', 'text_domain' ),
		'use_featured_image'    => __( 'Käytä kansikuvana', 'text_domain' ),
		'insert_into_item'      => __( 'Lisää', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Lisätty', 'text_domain' ),
		'items_list'            => __( 'Lista', 'text_domain' ),
		'items_list_navigation' => __( 'Navigaatio', 'text_domain' ),
		'filter_items_list'     => __( 'Suodata', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'CaseStudy',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'CaseStudy', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-index-card',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'CaseStudy', $args );

}
add_action( 'init', 'Case_Study_type', 0 );

}


//* Let's see if we need acf later
/**
 * Register ACF fields
 */
/*if( function_exists('acf_add_local_field_group') ):
acf_add_local_field_group(array(
	'key' => 'group_5fd9ffde12809',
	'title' => 'Vaihtoauto',
	'fields' => array(
		array(
			'key' => 'field_5fda13e14d49b',
			'label' => 'Varastotieto',
			'name' => 'car_varastotieto',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.333%',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'vaihtoauto',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));


acf_add_local_field_group(array(
	'key' => 'group_5fe0bf820dc6a',
	'title' => 'Autolistauksen suodattimet',
	'fields' => array(
		array(
			'key' => 'field_5ff1a78011b35',
			'label' => 'Vaihteisto',
			'name' => 'carfilter_vaihteisto',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-vaihtoautot.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;
*/

?>