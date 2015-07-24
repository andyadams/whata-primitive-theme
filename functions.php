<?php

add_action( 'init', 'wp_theme_display_theme' );

/**
 * To use this theme, you need to set up a database "wp_example" with a table called "wp_posts" (Whata Primitive Posts)
 * and give it a column 'post_title'
 */
function wp_theme_display_theme() {
	$hostname = 'localhost';
	$user = 'username';
	$pass = 'password';
	$database = 'wp_example';

	$db_connection = new PDO( "mysql:host=" . $hostname . ";dbname=" . $database, $user, $pass );

	$results = $db_connection->query( 'SELECT post_title FROM wp_posts WHERE 1 ORDER by rand() LIMIT 1' );

	$post_title = $results[0]['post_title'];
	?>
	<!doctype html>
	<html>
	    <head>
	        <title>WP CMS</title>
	        <link rel="stylesheet" href="style.css">
	    </head>
	    <body>
	        <h1><?php echo $post_title; ?></h1>
	    </body>
	</html>

	<?php
}