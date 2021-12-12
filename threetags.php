<?php
/* Array (

[0] => WP_Term Object (
[term_id] => 14,
[name] => eCommerce,
[slug] => ecommerce,
[term_group] => 0,
[term_taxonomy_id] => 14,
[taxonomy] => subcategory,
[description] =>,
[parent] => 0,
[count] => 5,
[filter] => raw ),
[1] => WP_Term Object (,
[term_id] => 13,
[name] => Service Design,
[slug] => service-design,
[term_group] => 0,


[taxonomy] => subcategory,

[description] =>,

[parent] => 0,

[count] => 4,

[filter] => raw ),


[2] => WP_Term Object (,

[term_id] => 12,

[name] => Software development,

[slug] => software-development,

[term_group] => 0,

[term_taxonomy_id] => 12,

[taxonomy] => subcategory ,

[description] =>,

[parent] => 0,

[count] => 6,

[filter] => raw ) ); */

$terms = get_the_terms( $post->ID , 'subcategory' );
$termcount = var_dump(count($terms)); //* as the term get prints out arrays, count them
foreach( $termcount as $i ){
    $i = 1;
    $i++;
    echo $i;
};

if ($termcount > 1) {
    foreach ($terms as $term) {
        echo $term->name;
        break;
        unset($term);
    }
}
//* and if more than one print them out



echo(array_column($terms, 'name',))
[2]; //*this prints out the name of tag in specified object

WP_Query Object ( [query] => Array ( [post_type] => casestudy ) [query_vars] => Array ( [post_type] => casestudy [error] => [m] => [p] => 0 [post_parent] => [subpost] => [subpost_id] => [attachment] => [attachment_id] => 0 [name] => [pagename] => [page_id] => 0 [second] => [minute] => [hour] => [day] => 0 [monthnum] => 0 [year] => 0 [w] => 0 [category_name] => [tag] => [cat] => [tag_id] => [author] => [author_name] => [feed] => [tb] => [paged] => 0 [meta_key] => [meta_value] => [preview] => [s] => [sentence] => [title] => [fields] => [menu_order] => [embed] => [category__in] => Array ( ) [category__not_in] => Array ( ) [category__and] => Array ( ) [post__in] => Array ( ) [post__not_in] => Array ( ) [post_name__in] => Array ( ) [tag__in] => Array ( ) [tag__not_in] => Array ( ) [tag__and] => Array ( ) [tag_slug__in] => Array ( ) [tag_slug__and] => Array ( ) [post_parent__in] => Array ( ) [post_parent__not_in] => Array ( ) [author__in] => Array ( ) [author__not_in] => Array ( ) [ignore_sticky_posts] => [suppress_filters] => [cache_results] => 1 [update_post_term_cache] => 1 [lazy_load_term_meta] => 1 [update_post_meta_cache] => 1 [posts_per_page] => 10 [nopaging] => [comments_per_page] => 50 [no_found_rows] => [order] => DESC ) [tax_query] => WP_Tax_Query Object ( [queries] => Array ( ) [relation] => AND [table_aliases:protected] => Array ( ) [queried_terms] => Array ( ) [primary_table] => wp_posts [primary_id_column] => ID ) [meta_query] => WP_Meta_Query Object ( [queries] => Array ( ) [relation] => [meta_table] => [meta_id_column] => [primary_table] => [primary_id_column] => [table_aliases:protected] => Array ( ) [clauses:protected] => Array ( ) [has_or_relation:protected] => ) [date_query] => [request] => SELECT SQL_CALC_FOUND_ROWS wp_posts.ID FROM wp_posts WHERE 1=1 AND wp_posts.post_type = 'casestudy' AND (wp_posts.post_status = 'publish') ORDER BY wp_posts.post_date DESC LIMIT 0, 10 [posts] => Array ( [0] => WP_Post Object ( [ID] => 59 [post_author] => 1 [post_date] => 2021-12-10 15:45:34 [post_date_gmt] => 2021-12-10 15:45:34 [post_content] => 

array(1) {
[0]=> object(WP_Post)#943 (24) {
["ID"]=> int(59)
["post_author"]=> string(1) "1"
["post_date"]=> string(19) "2021-12-10 15:45:34"
["post_date_gmt"]=> string(19) "2021-12-10 15:45:34"
["post_content"]=> string(982) " "
["post_title"]=> string(32) "Service Design, Vert, multi tag,"
["post_excerpt"]=> string(0) ""
["post_status"]=> string(7) "publish"
["comment_status"]=> string(6) "closed"
["ping_status"]=> string(6) "closed"
["post_password"]=> string(0) ""
["post_name"]=> string(16) "service-design-4"
["to_ping"]=> string(0) ""
["pinged"]=> string(0) ""
["post_modified"]=> string(19) "2021-12-11 16:28:20"
["post_modified_gmt"]=> string(19) "2021-12-11 16:28:20"
["post_content_filtered"]=> string(0) ""
["post_parent"]=> int(0)
["guid"]=> string(62) 'https://antti.veppiprojektit.fi/?post_type=casestudy&p=59'
["menu_order"]=> int(0)
["post_type"]=> string(9) "casestudy"
["post_mime_type"]=> string(0) ""
["comment_count"]=> string(1) "0"
["filter"]=> string(3) "raw" } }


//todo this is a print out of terms for a three tag post
["name"]=> string(9) "eCommerce"
["name"]=> string(14) "Service Design"
["name"]=> string(20) "Software development"

["slug"]=> string(9) "ecommerce"
["slug"]=> string(14) "service-design"
["slug"]=> string(20) "software-development"



array(3) {
    [0]=> object(WP_Term)#956 (10) {
    ["term_id"]=> int(14)
    ["name"]=> string(9) "eCommerce"
    ["slug"]=> string(9) "ecommerce"
    ["term_group"]=> int(0)
    ["term_taxonomy_id"]=> int(14)
    ["taxonomy"]=> string(11) "subcategory"
    ["description"]=> string(0) ""
    ["parent"]=> int(0)
    ["count"]=> int(5)
    ["filter"]=> string(3) "raw" }
    [1]=> object(WP_Term)#955 (10) {
    ["term_id"]=> int(13)
    ["name"]=> string(14) "Service Design"
    ["slug"]=> string(14) "service-design"
    ["term_group"]=> int(0)
    ["term_taxonomy_id"]=> int(13)
    ["taxonomy"]=> string(11) "subcategory"
    ["description"]=> string(0) ""
    ["parent"]=> int(0)
    ["count"]=> int(4)
    ["filter"]=> string(3) "raw" }
    [2]=> object(WP_Term)#950 (10) {
    ["term_id"]=> int(12)
    ["name"]=> string(20) "Software development"
    ["slug"]=> string(20) "software-development"
    ["term_group"]=> int(0)
    ["term_taxonomy_id"]=> int(12)
    ["taxonomy"]=> string(11) "subcategory"
    ["description"]=> string(0) ""
    ["parent"]=> int(0)
    ["count"]=> int(6)
    ["filter"]=> string(3) "raw" } }


    WP_Query Object ( [query] => Array ( [post_type] => casestudy ) [query_vars] => Array ( [post_type] => casestudy [error] => [m] => [p] => 0 [post_parent] => [subpost] => [subpost_id] => [attachment] => [attachment_id] => 0 [name] => [pagename] => [page_id] => 0 [second] => [minute] => [hour] => [day] => 0 [monthnum] => 0 [year] => 0 [w] => 0 [category_name] => [tag] => [cat] => [tag_id] => [author] => [author_name] => [feed] => [tb] => [paged] => 0 [meta_key] => [meta_value] => [preview] => [s] => [sentence] => [title] => [fields] => [menu_order] => [embed] => [category__in] => Array ( ) [category__not_in] => Array ( ) [category__and] => Array ( ) [post__in] => Array ( ) [post__not_in] => Array ( ) [post_name__in] => Array ( ) [tag__in] => Array ( ) [tag__not_in] => Array ( ) [tag__and] => Array ( ) [tag_slug__in] => Array ( ) [tag_slug__and] => Array ( ) [post_parent__in] => Array ( ) [post_parent__not_in] => Array ( ) [author__in] => Array ( ) [author__not_in] => Array ( ) [ignore_sticky_posts] => [suppress_filters] => [cache_results] => 1 [update_post_term_cache] => 1 [lazy_load_term_meta] => 1 [update_post_meta_cache] => 1 [posts_per_page] => 10 [nopaging] => [comments_per_page] => 50 [no_found_rows] => [order] => DESC ) [tax_query] => WP_Tax_Query Object ( [queries] => Array ( ) [relation] => AND [table_aliases:protected] => Array ( ) [queried_terms] => Array ( ) [primary_table] => wp_posts [primary_id_column] => ID ) [meta_query] => WP_Meta_Query Object ( [queries] => Array ( ) [relation] => [meta_table] => [meta_id_column] => [primary_table] => [primary_id_column] => [table_aliases:protected] => Array ( ) [clauses:protected] => Array ( ) [has_or_relation:protected] => ) [date_query] => [request] => SELECT SQL_CALC_FOUND_ROWS wp_posts.ID FROM wp_posts WHERE 1=1 AND wp_posts.post_type = 'casestudy' AND (wp_posts.post_status = 'publish') ORDER BY wp_posts.post_date DESC LIMIT 0, 10 [posts] => Array ( [0] => WP_Post Object ( [ID] => 59 [post_author] => 1 [post_date] => 2021-12-10 15:45:34 [post_date_gmt] => 2021-12-10 15:45:34 [post_content]