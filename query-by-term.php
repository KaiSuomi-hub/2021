<?php
/**
 * Function to get the studies by slug
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One_child
 * @since Twenty Twenty-One 1.0
 * Edited by Antti Suomi 12.12.21
 * Let's get studies under a given variable
 */
function get_by_topic($topic){
	//todo begin variables
	$loop = new WP_Query(array( 'post_type' => 'casestudy')); //* , 'posts_per_page' => 10 use this to limit amounts searched. Now just get all as we have 12 posts total
	echo '<div class="wrapper">';
	//? begin loop for post that has the right term
    echo '<span class=""><p>Displaying content from'.$topic.'</p></span>';
	while ($loop->have_posts()) : $loop->the_post();

		$terms = get_the_terms($loop->ID, 'subcategory'); //*get the terms under "subcategory"
		$termcount = count($terms); //* as the get_the_terms prints out arrays, count them
	    //* Go through all the terms and see if slug matched the one searched for with $topic
	    //* Use a class that either hides or shows the card according to points
		$x=0;
        while ($termcount>0) {
			$termcount--;
			$posted = array_column($terms, 'slug', )[$termcount];

            if ($posted == $topic){
					$x=3; //* Correct topic
					}else{
                    $x--; //* minus a point if not correct topic
					}
			    };
            if ($x>0){
                $hide = "";
            }else{
                $hide = "hide";
            }
			//* If the term matches use class don't throw in the hide
					the_title('<div class="card '.$hide.'">
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

get_by_topic('ecommerce');
?>