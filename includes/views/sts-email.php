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

$coastalynk_sts_email  = get_option( 'coastalynk_sts_email' );
$coastalynk_sts_email_subject  = get_option( 'coastalynk_sts_email_subject' );
$coastalynk_sts_email_subject = !empty( $coastalynk_sts_email_subject ) ? $coastalynk_sts_email_subject : __( 'Coastalynk STS Alert - [port]', 'coastalynk-emails' );
$coastalynk_sts_body  = get_option( 'coastalynk_sts_body' );
$coastalynk_sts_email_default  = __( "Dear Sir/Madam,
<br>
<p>This is an automatic notification from Coastalynk Maritime Intelligence regarding a Ship-to-Ship (STS) operation detected at [port].</p><br>
<h3>Event Summary:</h3>
<p>Date/Time (UTC): [last_updated]</p>
<p>Location: ([vessel1_lat], [vessel1_lon]) (Lagos Offshore)</p>
<p>Distance Between Vessels: [distance]</p>
<p>Port Reference: [port]</p>
<h3>Parent Vessel</h3>
<p>Name: [vessel1_name] | IMO: [vessel1_imo] | MMSI: [vessel1_mmsi]</p>
<p>Type: [vessel1_type] | Flag: <img src='[vessel1_country_flag]' width='30px' alt='[vessel1_country_iso]' /></p>
<p>Status: [vessel1_navigation_status]</p>
<p>Current Draught: [vessel1_draught]</p>

<h3>Child Vessel</h3>
<p>Name: [vessel2_name] | IMO: [vessel2_imo] | MMSI: [vessel2_mmsi]</p>
<p>Type: [vessel2_type] | Flag: <img src='[vessel2_country_flag]' width='30px' alt='[vessel2_country_iso]' /></p>
<p>Status: [vessel2_navigation_status]</p>
<p>Current Draught: [vesseld_draught]</p>
<br><br>
<p>View on Coastalynk Map(<a href='[sts-page-url]'>Click Here</a>)</p>
<br>
<p>This notification is part of Coastalynk\'s effort to provide real-time intelligence to support anti-bunkering enforcement, maritime security, and revenue protection.</p>
<br>
<p>Regards,</p>
<p>Coastalynk Maritime Intelligence</p>", 'coastalynk-emails' );
$coastalynk_sts_body = !empty( $coastalynk_sts_body ) ? $coastalynk_sts_body : $coastalynk_sts_email_default;

?>
<div style="padding:20px 0;">
    <form method="post" action="<?php echo admin_url('admin-post.php'); ?>">
        <table class="form-table">
            <tbody>
                <tr>
                    <td style="vertical-align: top;">
                        <table class="form-table">
                            <tbody>
                            <tr>
                                <th scope="row"><label for="coastalynk_sts_email_subject"><?php _e('Email Subject', 'coastalynk-emails' )?></label></th>
                                <td >
                                    <?php echo sprintf( '<input type="text" value="%s" id="coastalynk_sts_email_subject" name="coastalynk_sts_email_subject" class="regular-text">', esc_html( $coastalynk_sts_email_subject ) ); ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="coastalynk_sts_body"><?php _e('Email Message', 'coastalynk-emails' )?></label></th>
                                <td >
                                    <?php wp_editor( wp_specialchars_decode( $coastalynk_sts_body ), "coastalynk_sts_body", $settings = array( 'textarea_rows' => 6 ) ); ?>
                                </td>
                            </tr>
                            
                            </tbody>
                        </table>


                        <div class="submit">
                            <input type="hidden" value="sts_email" name="current_tab">
                            <input type="hidden" name="action" value="save_coastalynk_settings">
                            <input type="submit" name="save_cl_settings" class="button-primary" value="<?php _e( 'Update Settings', 'coastalynk-emails' ); ?>">
                        </div>
                        <?php wp_nonce_field( 'save_cl_settings_nonce' ); ?>
                    </td>
                    <td>
                        <p><?php _e( 'Email subject and message can be personalize by using following placeholders:', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel1_uuid]</strong>: <?php _e( 'Parent Vessel UUID,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel1_name]</strong>: <?php _e( 'Parent Vessel Name,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel1_mmsi]</strong>: <?php _e( 'Parent Vessel MMSI,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel1_imo]</strong>: <?php _e( 'Parent Vessel IMO,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel1_country_iso]</strong>: <?php _e( 'Parent Vessel Country Code,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel1_country_flag]</strong>: <?php _e( 'Parent Vessel Country Flag,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel1_type]</strong>: <?php _e( 'Parent Vessel Type,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel1_type_specific]</strong>: <?php _e( 'Parent Vessel Specific Type,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel1_lat]</strong>: <?php _e( 'Parent Vessel Latitude,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel1_lon]</strong>: <?php _e( 'Parent Vessel Longitude,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel1_speed]</strong>: <?php _e( 'Parent Vessel Speed,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel1_navigation_status]</strong>: <?php _e( 'Parent Vessel Navigation Status,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel1_draught]</strong>: <?php _e( 'Parent Vessel Draught,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel1_last_position_UTC]</strong>: <?php _e( 'Parent Vessel Last Position,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel2_uuid]</strong>: <?php _e( 'Child Vessel UUID,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel2_name]</strong>: <?php _e( 'Child Vessel Name,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel2_mmsi]</strong>: <?php _e( 'Child Vessel MMSI,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel2_imo]</strong>: <?php _e( 'Child Vessel IMO,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel2_country_iso]</strong>: <?php _e( 'Child Vessel Country Code,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel2_country_flag]</strong>: <?php _e( 'Child Vessel Country Flag,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel2_type]</strong>: <?php _e( 'Child Vessel Type,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel2_type_specific]</strong>: <?php _e( 'Child Vessel Specific Type,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel2_lat]</strong>: <?php _e( 'Child Vessel Latitude,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel2_lon]</strong>: <?php _e( 'Child Vessel Longitude,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel2_speed]</strong>: <?php _e( 'Child Vessel Speed,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel2_navigation_status]</strong>: <?php _e( 'Child Vessel Navigation Status,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel2_draught]</strong>: <?php _e( 'Child Vessel Draught,', 'coastalynk-emails' ); ?></p>
                        <p><strong>[vessel2_last_position_UTC]</strong>: <?php _e( 'Child Vessel Last Position,', 'coastalynk-emails' ); ?></p>   
                        <p><strong>[port]</strong>: <?php _e( 'Port Name.', 'coastalynk-emails' ); ?></p>   
                        <p><strong>[port_id]</strong>: <?php _e( 'Port ID,', 'coastalynk-emails' ); ?></p>   
                        <p><strong>[distance]</strong>: <?php _e( 'Distance between vessels.', 'coastalynk-emails' ); ?></p> 
                        <p><strong>[sts-page-url]</strong>: <?php _e( 'Vessel Page URL.', 'coastalynk-emails' ); ?></p>   
                        <p><strong>[last_updated]</strong>: <?php _e( 'Last Updated.', 'coastalynk-emails' ); ?></p>   
                        <p>&nbsp;</p>
                    </td>
                </tr>
            </tbody>
        </table>
        
    </form>

    
</div>