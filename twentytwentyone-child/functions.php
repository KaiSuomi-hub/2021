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
global $wpdb;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function twentytwentyone_child_enqueue_styles() {
	wp_enqueue_style('hello-elementor-child-style', get_stylesheet_directory_uri() . '/style.css');
}
add_action( 'wp_enqueue_scripts', 'twentytwentyone_child_enqueue_styles' );

//todo jquery! I choose you!...if I have time...
function twentytwentyone_child_enqueue_scripts() {
	wp_enqueue_script( 'boot1','https://code.jquery.com/jquery-3.6.0.min.js', array('jquery'));
    wp_enqueue_script('casestudy',get_stylesheet_directory_uri() . '/assets/js/casestudy.js',	array( 'jquery' ));
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
function custom_excerpt_length( $length ) {
    return 20;
}

function homepagecustomexcerpt() {
        add_filter( 'excerpt_length', 'custom_excerpt_length');
}
add_action( 'init', 'homepagecustomexcerpt' );

function excerpt_read_more($more) {
    global $post;
 return '<br><a href="'. get_permalink($post->ID) . '">>>Read more<<</a>';
}

add_filter('excerpt_more', 'excerpt_read_more', 11); //! What's overriding this? This is the min priority that works.


function get_by_topic($topic){
    global $wpdb;
    $table_name = $wpdb->prefix . "id";

	//todo begin variables
	$loop = new WP_Query(array( 'post_type' => 'casestudy')); //* , 'posts_per_page' => 10 use this to limit amounts searched. Now just get all as we have 12 posts total
	echo '<div id="'.$topic.'" class="wrapper ">';
	//? begin loop for post that has the right term
    echo '<span class="nice"><p>Displaying content from '.$topic.'</p></span>';
	while ($loop->have_posts()) : $loop->the_post();
		$terms = get_the_terms($loop->ID, 'subcategory'); //*get the terms under "subcategory"
		$xtermcount = count($terms); //* as the get_the_terms prints out arrays, count them
	    //* Go through all the terms and see if slug matched the one searched for with $topic
	    //* Use a class that either hides or shows the card according to points
        $x=0;
        $altcat = array();//*make note of what other categories are in use

        while ($xtermcount>0) {
			$xtermcount--;
			$posted = array_column($terms, 'slug', )[$xtermcount];
            if ($posted == $topic){
					$x=3; //* Correct topic
					}else{
                    array_push($altcat,$posted);//* Note down alt cat
                    $x--; //* minus a point if not correct topic
                    }
            };
            if ($x>0){
                $hide = "";
            }else{
                continue; //* break next to in while loop, if not enough points to print
            }




            $postid = get_the_ID();
					the_title('<div id="'.$postid.'"   class="card moveto'.implode(' ',$altcat).' '.$hide.' '.$topic.'-card">
					<div class="studyname">
					<h2 class="entry-title">
					<a href="'.get_permalink().
					'" title="' .
					the_title_attribute('echo=0').
					'" rel="bookmark">',
					'</a></h2></div>');

				echo '<div class="sidebyside">';
				echo '<div class="studydate">'.get_post_time('j.n.Y', true, ).'</div>';
				echo '<div class="studysubcat">';
                $termcount = count($terms);
				while ($termcount>0) {
					$termcount--;
					echo '<span class="tagprint">'; //todo make the tags look a tad nicer
					echo(array_column($terms, 'name', ))[$termcount].' ';
					echo '</span>';
				};//* and print out the 'name' from every object
				//! Why did I do this in this manner?
				//! I mixed things up while planning and first printed out the categories only if there was more than one... 😂
                echo '</div>'; //*studysubcat
				echo '</div>'; //*sidebyside
				echo '<div class="entryexcerpt">';

                the_excerpt();
                echo '</div>';
						echo '<div class="studyimage">';
						$image = get_the_post_thumbnail_url();//*get the img
						$width = getimagesize($image)[0];
						$height = getimagesize($image)[1];
						if ($width > $height) { //*check ratio of the two values of array
							the_post_thumbnail();
						} else {
							echo '<!--Please upload an image in landscape ratio-->';
						}
						//* if in ls, show, if not, pester in comments
						echo '</div>'; //*thumbnail termination
            echo '</div>'; //* card termination

    endwhile;

	//?end loop for posts

    echo '</div>'; //* wrapper termination
}

add_action( 'get_by_topic', 'get_by_topic',10,1 ); //priority 10, with one variable
//*Let's create a helper table to keep things in order
global $wpdb;
add_action("init", "create_extra_table");
function create_extra_table(){
    global $wpdb;
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    $table_name = $wpdb->prefix . "id";
    $sql = "CREATE TABLE $table_name (
	id int(10) unsigned NOT NULL AUTO_INCREMENT,
	postid int(10) NOT NULL,
	posttopic  varchar(255) NOT NULL,
	PRIMARY KEY  (id),
	KEY Index_2 (postid)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    dbDelta( $sql );
}

?>