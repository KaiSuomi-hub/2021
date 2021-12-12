<?php
/**
 * Function to get the studies
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One_child
 * @since Twenty Twenty-One 1.0
 * Edited by Antti Suomi 12.12.21
 * Let's get studies under a given variable
 */

echo '<div class="wrapper">';
$time = get_post_time( 'F j, Y', TRUE,);
$loop = new WP_Query( array( 'post_type' => 'casestudy') );
echo '</div>';

/*
["name"]=> string(9) "eCommerce";
["name"]=> string(14) "Service Design";
["name"]=> string(20) "Software development";

["slug"]=> string(9) "ecommerce";
["slug"]=> string(14) "service-design";
["slug"]=> string(20) "software-development";
 */

//*ok, now we print a post from the type case study
//* let's get the id and query terms for it that are under term name blanket "subcategory"

while ( $loop->have_posts() ) : $loop->the_post();
$terms = get_the_terms( $post->ID , 'subcategory' );
$termcount = count($terms); //* as the get_the_terms prints out arrays, count them

    if ($terms[0]->slug == 'software-development'){

        the_title('<div class="card">
        <div class="studyname">
        <h2 class="entry-title">
        <a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2></div>' );
        echo '<div class="sidebyside">';
        echo '<div class="studydate">'.get_post_time( 'j.n.Y', TRUE,).'</div>';
        echo '<div class="studysubcat">';
        $terms = get_the_terms( $post->ID , 'subcategory' );
        $termcount = count($terms); //* as the get_the_terms prints out arrays, count them
        while( $termcount>0 ){
            $termcount--;
            echo '<span class="tagprint">'; //todo make the tags look a tad nicer
            echo(array_column($terms, 'name',))[$termcount].' ';
            echo '</span>';
        };//* and print out the 'name' from every object
    } else {
        echo 'not about ecommerce';
    }

endwhile;







?>
