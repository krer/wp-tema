<?php

function admin_head() { ?>
		<style>
			/* Include stylesheet */
			<?php include(TEMPLATEPATH . "/admin/admin.css"); ?>
		</style>

	<?php 
	}
	
	$themename = "True colors";
	$shortname = "tc";

	function generate_page($options){
		global $themename;
		?>
			<div id="tc-wrap">
    			<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
						<h2 id="pagetitle"><?php echo $themename; ?> settings</h2>
						<?php if ( $_REQUEST['saved'] ) { ?><div class="update"><?php echo $themename; ?>'s options has been updated!</div><?php } ?>
     						<table class="maintable">
							<?php foreach ($options as $value) { ?>
									<?php if ( $value['type'] <> "heading" ) { ?>
										<tr class="mainrow">
										<td class="titledesc"><?php echo $value['name']; ?></td>
										<td class="forminp">
									<?php } ?>	
									<?php
										switch ( $value['type'] ) {
										case 'text':
									?>
		        							<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option($value['id']); } else { echo $value['std']; } ?>">
									<?php
										break;
										case 'textarea':
										$ta_options = $value['options'];
									?>
										<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="<?php echo $ta_options['cols']; ?>" rows="8"><?php  if( get_option($value['id']) != "") { echo stripslashes(get_settings($value['id'])); } else { echo $value['std']; } ?></textarea>
									<?php
										break;
										case "checkbox":
										if(get_option($value['id'])) { $checked = "checked=\"checked\""; } else { $checked = ""; }
									?>
		            				<input type="checkbox" class="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
									<?php
										break;
										case "heading":
									?>
										</table> 
		    									<h3 class="admintitle"><?php echo $value['name']; ?></h3>
										<table class="maintable">
									<?php
										break;
										default:
										break;
									} ?>
									<?php if ( $value['type'] <> "heading" ) { ?>
										<span><?php echo $value['desc']; ?></span>
										</td></tr>
									<?php } ?>	
							<?php } ?>
							</table>
							<p class="submit">
								<input name="save" type="submit" value="Save changes">    
								<input type="hidden" name="action" value="save">
							</p>
            </form>
</div><!--#tc-wrap-->
 <?php
}
	
	$options = array();	
	$options[] = array(	"name" => "General",
						"type" => "heading");
	$options[] = array(	"name" => "Custom logo",
						"desc" => "Enter the link to your logo.",
						"id" => $shortname."_logo",
						"std" => "",
						"type" => "text");
	$options[] = array(	"name" => "Custom favicon",
						"desc" => "Enter the link to your favicon.",
						"id" => $shortname."_favicon",
						"std" => "",
						"type" => "text");
							
	$options[] = array(	"name" => "Social networks",
						"type" => "heading");
	$options[] = array(	"name" => "Twitter username",
						"desc" => "Enter your twitter username here.",
						"id" => $shortname."_twitter",
						"std" => "",
						"type" => "text");
	$options[] = array(	"name" => "Facebook username",
						"desc" => "Enter your facebook username here.",
						"id" => $shortname."_facebook",
						"std" => "",	
						"type" => "text");
	$options[] = array(	"name" => "Email",
						"desc" => "Enter your email here.",
						"id" => $shortname."_email",
						"std" => "",	
						"type" => "text");		
							
	$options[] = array(	"name" => "Copyright",
						"type" => "heading");
	$options[] = array(	"name" => "Footer copyright text",
						"desc" => "Enter the text you wish to use in the footer.",
						"id" => $shortname."_copytext",
						"std" => "",
						"type" => "textarea");		
							
							
	function index_options() {
		global $options;
		generate_page($options);
	}
	
	function add_admin() {
		global $themename, $options;
		if ( $_GET['page'] == "options") {
			if ( 'save' == $_REQUEST['action'] ) {
					foreach ($options as $value) {
							update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
					}
					
					foreach ($options as $value) {
						if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); }
					}
					header("Location: admin.php?page=options&saved=true");								
				die;
			}
		}
		add_menu_page("Main Options", "Theme Options", 'edit_themes', 'options', 'index_options');
	}
	
add_action('admin_menu', 'add_admin');
add_action('admin_head', 'admin_head');	

?>