<?php
/**
 * Function to get the studies by slug
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One_child
 * @since Twenty Twenty-One 1.0
 * Edited by Antti Suomi 12.12.21
 * Let's get studies under a given variable
 *
 *["slug"]=> string(9) "ecommerce"
 *["slug"]=> string(14) "service-design"
 *["slug"]=> string(20) "software-development"
 */
?>

<div class="listingcontainer">

	<div id="firstcol">

    <?php get_by_topic('ecommerce') ?>

	</div>

	<div id="secondcol">

    <?php get_by_topic('service-design') ?>


	</div>

	<div id="thirdcol">

    <?php get_by_topic('software-development') ?>


	</div>



</div>

<?php