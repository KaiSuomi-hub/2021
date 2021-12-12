<?php

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
$table_name = $wpdb->prefix . "id";
$wpdb->insert($table_name, array('postid' => $postid,'posttopic' => $topic));//new table!


//*and  to check if the post id already shown

$count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $wpdb->wpid WHERE postid = %d", $postid));
if($count == 1){
echo 'true';
}else{
echo 'false'; }

$data = $wpdb->get_results("SELECT * FROM " . $table_prefix . "team_data" . $filter . $order, ARRAY_A);
