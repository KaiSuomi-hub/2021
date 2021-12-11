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
 * Even better, let's create a function that shows studies from under a variable
 */

get_header();
include 'getstudies.php';
get_footer();
