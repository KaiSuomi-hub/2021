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
[term_taxonomy_id] => 13,
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



echo(array_column($terms, 'name',))[2]; //*this prints out the name of tag in specified object