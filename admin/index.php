<?php

function tc_admin_head() { ?>
		<style>
		#tc-wrap { width: 740px; }
		#pagetitle { font-style: italic; margin: 0;  color: #464646; font: italic 24px/35px Georgia,"Times New Roman","Bitstream Charter",Times,serif; padding-top: 14px; text-shadow: 0 1px 0 #fff; }
		.admintitle { margin: 0px; padding: 10px; font-family: Georgia, serif; font-weight: normal; letter-spacing: 1px; font-size: 18px; border: 1px solid #e4e4e4; border-bottom: 0; background:#eee;  }
		.maintable { background: #f9f9f9; margin-bottom: 20px; border: 1px solid #e4e4e4; }
		.mainrow { padding: 10px; border-bottom: 1px solid #e4e4e4; float: left; }
		.mainrow:last-child { border: 0; }
		.titledesc { font-size: 12px; font-weight: 700; width: 180px; float: left;  }
		.forminp { width: 740px; }
		.forminp input, .forminp select, .forminp textarea { background: #fff; background: #f3f3f3; width: 280px; padding: 4px; font-size: 12px; float: left; }
		.forminp span { font-size: 11px; float: right; width: 220px; }
		.info { background: #FFFFCC; border: 1px dotted #D8D2A9; padding: 10px; color: #333; }
		.forminp .checkbox { width: 20px }
		.info a { color: #333; text-decoration: none; border-bottom: 1px dotted #333 }
		.info a:hover { color: #666; border-bottom: 1px dotted #666; }
		.warning { background: #FFEBE8; border: 1px dotted #CC0000; padding: 10px; color: #333; font-weight: bold; }
		</style>

	<?php 
	}
	
	$themename = "True colors";
	$shortname = "tc";

	function tc_generate_page($options){
		global $themename;
		?>
			<div id="tc-wrap">
    			<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
						<h2 id="pagetitle"><?php echo $themename; ?> settings</h2>
						<?php if ( $_REQUEST['saved'] ) { ?><div style="clear:both;height:20px;"></div><div class="warning"><?php echo $themename; ?>'s options has been updated!</div><?php } ?>
						<?php if ( $_REQUEST['reset'] ) { ?><div style="clear:both;height:20px;"></div><div class="warning"><?php echo $themename; ?>'s options has been reset!</div><?php } ?>	
						<!--START: GENERAL SETTINGS-->
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
							<div style="clear:both;"></div>
						<!--END: GENERAL SETTINGS-->
            </form>
</div><!--wrap-->
<div style="clear:both;height:20px;"></div>
 <?php
}
	
	$tcoptions = array();	
	$tcoptions[] = array(	"name" => "General",
							"type" => "heading");
	$tcoptions[] = array(	"name" => "Custom logo",
							"desc" => "Enter the link to your logo.",
							"id" => $shortname."_logo",
							"std" => "",
							"type" => "text");
	$tcoptions[] = array(	"name" => "Custom favicon",
							"desc" => "Enter the link to your favicon.",
							"id" => $shortname."_favicon",
							"std" => "",
							"type" => "text");
							
	$tcoptions[] = array(	"name" => "Social networks",
							"type" => "heading");
	$tcoptions[] = array(	"name" => "Twitter username",
							"desc" => "Enter your twitter username here.",
							"id" => $shortname."_twitter",
							"std" => "",
							"type" => "text");
	$tcoptions[] = array(	"name" => "Facebook username",
							"desc" => "Enter your facebook username here.",
							"id" => $shortname."_facebook",
							"std" => "",	
							"type" => "text");
	$tcoptions[] = array(	"name" => "Email",
							"desc" => "Enter your email here.",
							"id" => $shortname."_email",
							"std" => "",	
							"type" => "text");		
							
	$tcoptions[] = array(	"name" => "Copyright",
							"type" => "heading");
	$tcoptions[] = array(	"name" => "Footer copyright text",
							"desc" => "Enter the text you wish to use in the footer.",
							"id" => $shortname."_copytext",
							"std" => "",
							"type" => "textarea");		
							
							
	function tc_index_options() {
		global $tcoptions;
		tc_generate_page($tcoptions);
	}
	
	function tc_add_admin() {
		global $themename,$tcoptions;
		if ( $_GET['page'] == "tc-options") {
			if ( 'save' == $_REQUEST['action'] ) {
					foreach ($tcoptions as $value) {
							update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
					}
					
					foreach ($tcoptions as $value) {
						if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); }
					}
					header("Location: admin.php?page=tc-options&saved=true");								
				die;
			}
		}
		add_menu_page("Main Options", "Theme Options", 'edit_themes', 'tc-options', 'tc_index_options');
	}
	
add_action('admin_menu', 'tc_add_admin');
add_action('admin_head', 'tc_admin_head');	

?>