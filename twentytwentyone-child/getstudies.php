<?php
echo '<div class="wrapper">';
$time = get_post_time( 'F j, Y', TRUE,);
$loop = new WP_Query( array( 'post_type' => 'casestudy', 'posts_per_page' => 10 ) );
while ( $loop->have_posts() ) : $loop->the_post();
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
				echo '
                <!-- ! Why did I do this in this manner?
                I mixed things up while planning my todo and first printed out the categories only if there was more than one... 😂 -->
                </div>
        </div>
            <div class="entryexcerpt">';
                the_excerpt();
				echo '</div>
				<div class="studyimage">';
            $image = get_the_post_thumbnail_url();//*get the img
            $width = getimagesize($image)[0];
            $height = getimagesize($image)[1];
            if ($width > $height) { //*check ratio of the two values of array
                the_post_thumbnail(); }
			else {
                echo '<!--Please upload an image in landscape ratio-->';
            }
            //* if in ls, show, if not, pester in comments
			echo '
            </div>
            </div>';
        endwhile;

echo '</div>';
?>