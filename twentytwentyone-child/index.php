<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One_child
 * @since Twenty Twenty-One 1.0
 * Edited by Antti Suomi
 * Let's create a archive view of case studies as the index
 */

get_header(); ?>


<div class="wrapper">
<?php
$time = get_post_time( 'F j, Y', TRUE,);
$loop = new WP_Query( array( 'post_type' => 'casestudy', 'posts_per_page' => 10 ) );
while ( $loop->have_posts() ) : $loop->the_post();
the_title('<div class="card">
<div class="studyname">
<h2 class="entry-title">
<a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2></div>' );
echo '<div class="studydate">'.get_post_time( 'j.n.Y', TRUE,).'</div>';
?>
<div class="studysubcat">
<?php
$terms = get_the_terms( $post->ID , 'subcategory' );
print_r($terms);
/*foreach( $terms as $term ) {
    echo $term->name;
    break;
    unset($term);
}*/ ?>
</div>

    <div class="entryexcerpt">
        <?php the_excerpt(); ?>
    </div>

    <div class="studyimage">
    <?php the_post_thumbnail('thumbnail'); ?>
    </div>

	</div>
<?php endwhile;

?></div><?php

get_footer();
