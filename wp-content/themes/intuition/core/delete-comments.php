<?php 
require_once( $_SERVER['DOCUMENT_ROOT'] . '/fiamma/miweb/wp-config.php' );
$comment_identificador = $_POST['identificador'];
$post_id = $_POST['post_id'];
global $wpdb;

echo $comment_identificador;

$wpdb->delete('comments', array('id'=> $comment_identificador));


/* ------ REDIRECCIÓN ------ */

$my_query="SELECT guid
			FROM wp_posts
			WHERE ID='".$post_id."'";

$url = $wpdb->get_results($my_query);
foreach($url as $item) {
	$return = "Location: ".$item->guid;
break;
}

header($return);

?>