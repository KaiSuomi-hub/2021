<div class="studyimage">
            <?php
            $image = get_the_post_thumbnail_url();//*get the img
            $width = getimagesize($image)[0];
            $height = getimagesize($image)[1];
            if ($width > $height) { //*check ratio of the two values of array
                the_post_thumbnail(); }
			else {
                echo '<!--Please upload an image in landscape ratio-->';
            }
            //* if ls, show, if not, pester in comments
            ?>
</div>