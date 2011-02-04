<?php

function tc_admin_head() { ?>
		<style>
		h2 { margin-bottom: 20px; }
		.title { margin: 0px !important; background: #D4E9FA; padding: 10px; font-family: Georgia, serif; font-weight: normal !important; letter-spacing: 1px; font-size: 18px; }
		.container { background: #EAF3FA; padding: 10px; }
		.maintable { font-family:"Lucida Grande","Lucida Sans Unicode",Arial,Verdana,sans-serif; background: #EAF3FA; margin-bottom: 20px; padding: 10px 0px; }
		.mainrow { padding-bottom: 10px !important; border-bottom: 1px solid #D4E9FA !important; float: left; margin: 0px 10px 10px 10px !important; }
		.titledesc { font-size: 14px; font-weight:bold; width: 220px !important; margin-right: 20px !important; }
		.forminp { width: 700px !important; valign: middle !important; }
		.forminp input, .forminp select, .forminp textarea { margin-bottom: 9px !important; background: #fff; border: 1px solid #D4E9FA; width: 500px; padding: 4px; font-family:"Lucida Grande","Lucida Sans Unicode",Arial,Verdana,sans-serif; font-size: 12px; }
		.forminp span { font-size: 11px !important; font-weight: normal !important; ine-height: 14px !important; }
		.info { background: #FFFFCC; border: 1px dotted #D8D2A9; padding: 10px; color: #333; }
		.forminp .checkbox { width:20px }
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
			<div class="wrap">
    			<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
						<h2><?php echo $themename; ?></h2>
						<?php if ( $_REQUEST['saved'] ) { ?><div style="clear:both;height:20px;"></div><div class="warning"><?php echo $themename; ?>'s Options has been updated!</div><?php } ?>
						<?php if ( $_REQUEST['reset'] ) { ?><div style="clear:both;height:20px;"></div><div class="warning"><?php echo $themename; ?>'s Options has been reset!</div><?php } ?>	
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
		        							<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings($value['id']); } else { echo $value['std']; } ?>" />
									<?php
										break;
										case "checkbox":
										if(get_settings($value['id'])) { $checked = "checked=\"checked\""; } else { $checked = ""; }
									?>
		            				<input type="checkbox" class="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
									<?php
										break;
										case "heading":
									?>
										</table> 
		    									<h3 class="title"><?php echo $value['name']; ?></h3>
										<table class="maintable">
									<?php
										break;
										default:
										break;
									} ?>
									<?php if ( $value['type'] <> "heading" ) { ?>
										<?php if ( $value['type'] <> "checkbox" ) { ?><br/><?php } ?><span><?php echo $value['desc']; ?></span>
										</td></tr>
									<?php } ?>	
							<?php } ?>
							</table>
							<p class="submit">
								<input name="save" type="submit" value="Save changes" />    
								<input type="hidden" name="action" value="save" />
							</p>
							<div style="clear:both;"></div>
						<!--END: GENERAL SETTINGS-->
            </form>
</div><!--wrap-->
<div style="clear:both;height:20px;"></div>
 <?php
}
	
	$tcoptions = array();	
	$tcoptions[] = array(	"name" => "Basic Options",
							"type" => "heading");
	$tcoptions[] = array(	"name" => "Exclude Portfolio from Blog",
							"desc" => "Check this if you wish to exclude your portfolio posts from being displayed in other pages that isn't the portfolio page.",
							"id" => $shortname."_portfolio_exclude",
							"std" => "",
							"type" => "checkbox");
	$tcoptions[] = array(	"name" => "Twitter username",
							"id" => $shortname."_twitter",
							"std" => "",
							"type" => "text");
	$tcoptions[] = array(	"name" => "Facebook username",
							"id" => $shortname."_facebook",
							"std" => "",
							"type" => "text");	
							
							
	function tc_index_options() {
		global $tcoptions;
		tc_generate_page($tcoptions);
	}
	
	function tc_add_admin() {
		global $themename,$tcoptions;
		if ( $_GET['page'] == "tc-options") {
			if ( 'save' == $_REQUEST['action'] ) {
					foreach ($tcoptions as $value) {
						if($value['type'] != 'multicheck'){
							update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
						}else{
							foreach($value['options'] as $mc_key => $mc_value){
								$up_opt = $value['id'].'_'.$mc_key;
								update_option($up_opt, $_REQUEST[$up_opt] );
							}
						}
					}
					foreach ($tcoptions as $value) {
						if($value['type'] != 'multicheck'){
							if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } 
						}else{
							foreach($value['options'] as $mc_key => $mc_value){
								$up_opt = $value['id'].'_'.$mc_key;						
								if( isset( $_REQUEST[ $up_opt ] ) ) { update_option( $up_opt, $_REQUEST[ $up_opt ]  ); } else { delete_option( $up_opt ); } 
							}
						}
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