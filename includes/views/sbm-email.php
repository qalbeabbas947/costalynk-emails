<?php
/**
 * Token Generation Email UI/UX
 */

/**
 * Abort if this file is accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coastalynk_sbm_email  = get_option( 'coastalynk_sbm_email' );
$coastalynk_sbm_email_subject  = get_option( 'coastalynk_sbm_email_subject' );
$coastalynk_sbm_email_subject = !empty( $coastalynk_sbm_email_subject ) ? $coastalynk_sbm_email_subject : __( 'Coastalynk SBM Alert - [port]', 'coastalynk-emails' );
$coastalynk_sbm_complete_email_subject  = get_option( 'coastalynk_sbm_complete_email_subject' );
$coastalynk_sbm_complete_email_subject = !empty( $coastalynk_sbm_complete_email_subject ) ? $coastalynk_sbm_complete_email_subject : __( 'Coastalynk SBM Complete Alert - [port]', 'coastalynk-emails' );
$coastalynk_sbm_complete_body  = get_option( 'coastalynk_sbm_complete_body' );
$coastalynk_sbm_complete_email_default  = __( "Dear Sir/Madam,
<br>
<p>This is an automatic notification from Coastalynk Maritime Intelligence regarding a Single Buoy Mooring (sbm) operation detected at [port] is complete.</p><br>
<h3>General Detail:</h3>
<p>Date/Time (UTC): [last_updated]</p>
<p>Location: ([lat], [lon]) (Lagos Offshore)</p>
<p>Distance Between Vessels: [distance]</p>
<p>Port Reference: [port]</p>
<h3>Vessel Detail</h3>
<p>Name: [name] | IMO: [imo] | MMSI: [mmsi]</p>
<p>Type: [type] | Flag: <img src='[country_flag]' width='30px' alt='[country_iso]' /></p>
<p>Status: [navigation_status]</p>
<p>Before Draught: [before_draught]</p>
<p>After Draught: [after_draught]</p>
<br>
<p>View on Coastalynk Map(<a href='[sbm-page-url]'>Click Here</a>)</p>
<br>
<p>This notification is part of Coastalynk\'s effort to provide real-time intelligence to support anti-bunkering enforcement, maritime security, and revenue protection.</p>
<br>
<p>Regards,</p>
<p>Coastalynk Maritime Intelligence</p>", 'coastalynk-emails' );
$coastalynk_sbm_complete_body = !empty( $coastalynk_sbm_complete_body ) ? $coastalynk_sbm_complete_body : $coastalynk_sbm_complete_email_default;

$coastalynk_sbm_body  = get_option( 'coastalynk_sbm_body' );
$coastalynk_sbm_email_default  = __( "Dear Sir/Madam,
<br>
<p>This is an automatic notification from Coastalynk Maritime Intelligence regarding a Single Buoy Mooring (sbm) operation detected at [port].</p><br>
<h3>General Detail:</h3>
<p>Date/Time (UTC): [last_updated]</p>
<p>Location: ([lat], [lon]) (Lagos Offshore)</p>
<p>Distance Between Vessels: [distance]</p>
<p>Port Reference: [port]</p>
<h3>Vessel Detail</h3>
<p>Name: [name] | IMO: [imo] | MMSI: [mmsi]</p>
<p>Type: [type] | Flag: <img src='[country_flag]' width='30px' alt='[country_iso]' /></p>
<p>Status: [navigation_status]</p>
<p>Before Draught: [before_draught]</p>
<p>After Draught: [after_draught]</p>
<br>
<p>View on Coastalynk Map(<a href='[sbm-page-url]'>Click Here</a>)</p>
<br>
<p>This notification is part of Coastalynk\'s effort to provide real-time intelligence to support anti-bunkering enforcement, maritime security, and revenue protection.</p>
<br>
<p>Regards,</p>
<p>Coastalynk Maritime Intelligence</p>", 'coastalynk-emails' );
$coastalynk_sbm_body = !empty( $coastalynk_sbm_body ) ? $coastalynk_sbm_body : $coastalynk_sbm_email_default;
?>
<div style="padding:20px 0;">
    <form method="post" action="<?php echo admin_url('admin-post.php'); ?>">
        <table class="form-table">
            <tbody>
                <tr>
                    <td width="70%" style="vertical-align: top;" valign="top">
                        <table class="form-table">
                            <tbody>
                                <tr>
                                    <th colspan="2"><h2><?php _e('SBM Start Email', 'coastalynk-emails' )?></h2></th>
                                </tr>
                                <tr>
                                    <th><label for="coastalynk_sbm_email_subject"><?php _e('Email Subject', 'coastalynk-emails' )?></label></th>
                                    <td>
                                        <?php echo sprintf( '<input type="text" value="%s" id="coastalynk_sbm_email_subject" name="coastalynk_sbm_email_subject" class="regular-text">', esc_html( $coastalynk_sbm_email_subject ) ); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="coastalynk_sbm_body"><?php _e('Email Message', 'coastalynk-emails' )?></label></th>
                                    <td>
                                        <?php wp_editor( wp_specialchars_decode( $coastalynk_sbm_body ), "coastalynk_sbm_body", $settings = array( 'textarea_rows' => 6 ) ); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="2"><h2><?php _e('SBM Start Complete', 'coastalynk-emails' )?></h2></th>
                                </tr>
                                <tr>
                                    <th><label for="coastalynk_sbm_complete_email_subject"><?php _e('Email Subject', 'coastalynk-emails' )?></label></th>
                                    <td>
                                        <?php echo sprintf( '<input type="text" value="%s" id="coastalynk_sbm_complete_email_subject" name="coastalynk_sbm_complete_email_subject" class="regular-text">', esc_html( $coastalynk_sbm_complete_email_subject ) ); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="coastalynk_sbm_complete_body"><?php _e('SBM Complete Email Message', 'coastalynk-emails' )?></label></th>
                                    <td>
                                        <?php wp_editor( wp_specialchars_decode( $coastalynk_sbm_complete_body ), "coastalynk_sbm_complete_body", $settings = array( 'textarea_rows' => 6 ) ); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <div class="submit">
                                            <input type="hidden" value="sbm_email" name="current_tab">
                                            <input type="hidden" name="action" value="save_coastalynk_settings">
                                            <input type="submit" name="save_cl_settings" class="button-primary" value="<?php _e( 'Update Settings', 'coastalynk-emails' ); ?>">
                                        </div>
                                        <?php wp_nonce_field( 'save_cl_settings_nonce' ); ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td width="30%" valign="top">
                        <p><?php _e( 'Email subject and message can be personalize by using following placeholders:', 'coastalynk-emails' ); ?></p>
                        <p><strong>[uuid]</strong>: <?php _e( 'Vessel UUID,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[name]</strong>: <?php _e( 'Vessel Name,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[mmsi]</strong>: <?php _e( 'Vessel MMSI,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[imo]</strong>: <?php _e( 'Vessel IMO,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[country_iso]</strong>: <?php _e( 'Vessel Country Code,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[country_flag]</strong>: <?php _e( 'Vessel Country Flag,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[type]</strong>: <?php _e( 'Vessel Type,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[type_specific]</strong>: <?php _e( 'Vessel Specific Type,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[lat]</strong>: <?php _e( 'Vessel Latitude,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[lon]</strong>: <?php _e( 'Vessel Longitude,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[speed]</strong>: <?php _e( 'Vessel Speed,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[navigation_status]</strong>: <?php _e( 'Vessel Navigation Status,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[after_draught]</strong>: <?php _e( 'After Vessel Draught,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[before_draught]</strong>: <?php _e( 'Before Vessel Draught,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[last_position_UTC]</strong>: <?php _e( 'Vessel Last Position,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[port]</strong>: <?php _e( 'Port Name.', 'coastalynk-emails' ); ?></p>   
                        <p><strong>[port_id]</strong>: <?php _e( 'Port ID,', 'coastalynk-emails' ); ?></p>   
                        <p><strong>[distance]</strong>: <?php _e( 'Distance between vessels.', 'coastalynk-emails' ); ?></p> 
                        <p><strong>[sbm-page-url]</strong>: <?php _e( 'Vessel Page URL.', 'coastalynk-emails' ); ?></p>   
                        <p><strong>[last_updated]</strong>: <?php _e( 'Last Updated.', 'coastalynk-emails' ); ?></p>   
                        <p>&nbsp;</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>    
</div>