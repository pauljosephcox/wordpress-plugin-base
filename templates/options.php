<?php
/**
 * Plugin Options Page
 * 
 */
 ?>
<div class="wrap">
    
    <h2><?php _e('Base Plugin'); ?></h2>
    	    	
	<div>
	
		<div id="post-body" class="columns-3">
			
			<!-- main content -->
			<div id="post-body-content">
				
				<div class="meta-box">
					
					<form method="post" action="options.php">

    					<?php settings_fields('plugin_starter_options'); ?>
    					<?php do_settings_sections('plugin_starter_options'); ?>

    					<h2><?php _e('Settings'); ?></h2>

    					<table class="form-table">
    						<tbody>
    							<tr valign="top">
    								<th scope="row"><label for="plugin_starter_test">Test</label></th>
    								<td>
										<input type="text" class="regular-text" id="plugin_starter_test" name="plugin_starter_test" value="<?php echo esc_attr( get_option('plugin_starter_test') ); ?>">
									</td>
    							</tr>
    							<tr valign="top">
    								<th scope="row"><label for="plugin_starter_test2">Test 2</label></th>
    								<td>
										<input type="text" class="regular-text" id="plugin_starter_test2" name="plugin_starter_test2" value="<?php echo esc_attr( get_option('plugin_starter_test2') ); ?>">
									</td>
    							</tr>
    						</tbody>
    					</table>

    					<?php submit_button(); ?>

					</form>
					
				</div><!-- .meta-box -->
				
			</div><!-- post-body-content -->
			
			
		</div><!-- #post-body .metabox-holder .columns-2 -->
		
		<br class="clear">
		
	</div><!-- #poststuff -->
			
</div> <!-- .wrap -->