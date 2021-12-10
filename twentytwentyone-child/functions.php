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

//todo Bootstrap! I choose you!
function twentytwentyone_child_enqueue_scripts() {
	wp_enqueue_script( 'boot1','https://code.jquery.com/jquery-3.6.0.min.js', array('jquery'));
	wp_enqueue_script( 'boot2','https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js', array('jquery'));
	wp_enqueue_script( 'boot3','https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js', array('jquery'));
}

add_action( 'wp_enqueue_scripts', 'twentytwentyone_child_enqueue_scripts' );

/**
 *todo Register Custom Post Type for Case studies
 */
add_action('init', function() {
    $labels = array(
        'name'                  => _x('Case Studies', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('A case study', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Case studies', 'text_domain'),
        'name_admin_bar'        => __('Case studies', 'text_domain'),
        'archives'              => __('More case studies', 'text_domain'),
        'add_new_item'          => __('Add a new study', 'text_domain'),
    );
    $rewrite = array(
        'slug'                  => 'casestudy',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __('casestudy', 'text_domain'),
        'description'         	=> __('Case studies of eServices'),
        'labels'                => $labels,
        'supports'            	=> array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
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
    register_post_type('casestudy', $args);

    //* Ok, that's the post, let's create 3 taxonomies for post type casestudy
    //*   "Software Development", "Service Design",  "eCommerce"
    //todo gonna make the structure as tags

    register_taxonomy('subcategory', ['casestudy'], [
        'label' => __('Subcategories', 'txtdomain'),
        'hierarchical' => false,
        'rewrite' => ['slug' => 'Software Development'],
        'show_admin_column' => true,
        'show_in_rest' => true,
        'labels' => [
            'singular_name' => __('Subcategory', 'txtdomain'),
            'all_items' => __('All subcategories', 'txtdomain'),
            'edit_item' => __('Edit subcategory', 'txtdomain'),
            'view_item' => __('View subcategory', 'txtdomain'),
            'update_item' => __('Update subcategory', 'txtdomain'),
            'add_new_item' => __('Add subcategory', 'txtdomain'),
            'new_item_name' => __('New Subcategory Name', 'txtdomain'),
            'search_items' => __('Search subcategories', 'txtdomain'),
            'parent_item' => __('Parent subcategory', 'txtdomain'),
            'parent_item_colon' => __('Parent subcategory:', 'txtdomain'),
            'not_found' => __('No subcategories found', 'txtdomain'),
        ]
    ]);
    register_taxonomy_for_object_type('subcategory', 'casestudy');
	//!Populate, remember to not use camelCase and so on
	wp_insert_term('Software development', 'subcategory');
	wp_insert_term('Service Design', 'subcategory');
	wp_insert_term('eCommerce', 'subcategory');
});

//*Make excerpt 20 words and a bit niocer
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}


function homepageCustomExcerpt() {
        add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
}

add_action( 'init', 'homepageCustomExcerpt' );

?>