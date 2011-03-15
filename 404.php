<?php 
/*
 * Template for displaying 404 pages
 */

get_header();
	
// Include the error page
include_once(TEMPLATEPATH . "/page-error.php");
		
get_sidebar();

get_footer();

?>