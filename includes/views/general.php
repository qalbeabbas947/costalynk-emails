<?php
/**
 * Abort if this file is accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$coatalynk_site_admin_email 	= get_option( 'coatalynk_site_admin_email' );
$coatalynk_npa_admin_email 	    = get_option( 'coatalynk_npa_admin_email' );

?>
<div id="general_settings" class="cs_ld_tabs"> 
    <form method="post" action="<?php echo admin_url('admin-post.php'); ?>">
        <table class="setting-table-wrapper">
            <tbody>
                <tr> 
                    <td width="30%" align="left" valign="top">
						<strong><label align="left" for="coatalynk_site_admin_email"><?php _e( 'Site Admin Email', 'coastalynk-emails' ); ?></label></strong>
					</td>
                    <td width="70%">
                        <input type="text" id="coatalynk_site_admin_email" name="coatalynk_site_admin_email" value="<?php echo get_option( 'coatalynk_site_admin_email' ); ?>">
                        <p class="description" style="font-weight: normal;">
                            <?php echo __('Enter the site admin email address.', "coastalynk-emails" ); ?>
                        </p>
                    </td>    
                </tr>   
                <tr> 
                    <td width="30%" align="left" valign="top"> 
						<strong><label align="left" for="coatalynk_npa_admin_email"><?php _e( 'NPA Admin Email', 'coastalynk-emails' ); ?></label></strong>
					</td>
                    <td width="70%">
                        <input type="text" id="coatalynk_npa_admin_email" name="coatalynk_npa_admin_email" value="<?php echo get_option( 'coatalynk_npa_admin_email' ); ?>">
                        <p class="description" style="font-weight: normal;">
                            <?php echo __('Enter the NPA Email Address.', 'coastalynk-emails' ); ?>
                        </p>
                    </td>    
                </tr>
				       
            </tbody>
        </table>
        
        <div class="submit-button" style="padding-top:10px">
            <input type="hidden" value="general" name="current_tab">
            <input type="hidden" name="action" value="save_coastalynk_settings">
            <input type="submit" name="save_settings" class="button-primary" value="<?php _e('Update Settings', 'cs_ld_addon' ); ?>">
        </div>
        <?php wp_nonce_field( 'save_settings_nonce' ); ?>
    </form>
</div>