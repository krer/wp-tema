<?php

/* Moves the add page function in the WP dashboard admin menu via WP hook */
add_action('admin_menu', 'truecolors_custom_add_page');

/* Adds page to admin menu */
function truecolors_custom_add_page() {
	add_theme_page('Social', 'Social', 'edit_themes', 'social', 'social_admin');
}

/* Function (as seen above) that runs when the page is accessed */
function social_admin() {

	$tc_twitter_option = 'tc_twitter_name'; // Option name (in db)
	$tc_twitter_hidden_field = 'tc_twitter_hidden';
	$tc_twitter_data_field = 'tc_twitter_field';

	$tc_facebook_option = 'tc_facebook_name'; // Option name (in db)
	$tc_facebook_hidden_field = 'tc_facebook_hidden';
	$tc_facebook_data_field = 'tc_facebook_field';

	/* Read in existing option values from database */
	$tc_twitter_value = get_option($tc_twitter_option); 
	$tc_facebook_value = get_option($tc_facebook_option);

	// Read value and save it in database
	if( $_POST[ $tc_twitter_hidden_field ] == 'yes' && $_POST[ $tc_facebook_hidden_field ] == 'yes') { 
		
		$tc_twitter_value = $_POST[ $tc_twitter_data_field ];
		$tc_facebook_value = $_POST[ $tc_facebook_data_field ];
		update_option($tc_twitter_option, $tc_twitter_value);
		update_option($tc_facebook_option, $tc_facebook_value);

?>
<div class="updated"><p><strong><?php _e('Your options have been saved.', 'mt_trans_domain' ); ?></strong></p></div>
<?php

}

/* Main page */
echo '<div class="wrap">';
echo "<h2>True colors</h2>";

?>

<form name="form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="<?php echo $tc_twitter_hidden_field; ?>" value="yes">
	<input type="hidden" name="<?php echo $tc_facebook_hidden_field; ?>" value="yes">
	<p>Twitter username: 
	<input type="text" name="<?php echo $tc_twitter_data_field; ?>" value="<?php echo $tc_twitter_value; ?>" size="25">
	</p>
	
	<p>Facebook username: 
	<input type="text" name="<?php echo $tc_facebook_data_field; ?>" value="<?php echo $tc_facebook_value; ?>" size="25">
	</p>

<p class="submit">
<input type="submit" name="Submit" value="Update Options">
</p>

</form>
</div>

<?php

}

?>

