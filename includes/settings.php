<?php
if( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class Coastalynk_Email_Settings
 */
class Coastalynk_Email_Settings {

	private $page_tab;
    
    /**
     * Constructor function
     */
    public function __construct() {

        $this->page_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'general';
        add_action( 'admin_menu', [ $this, 'setting_menu' ], 1001 );
        add_action( 'admin_post_save_coastalynk_settings', [ $this, 'save_coastalynk_settings' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'add_admin_scripts' ] );

    }
    
    /**
     * Adds frontend scripts
     */
    public function add_admin_scripts() {
        
        wp_enqueue_style( 'cem-admin-css', CEM_ASSETS_URL . 'css/admin.css', [], time(), null );
        wp_enqueue_script( 'cem-admin-js', CEM_ASSETS_URL . 'js/admin.js', [ 'jquery' ], time(), true );

        wp_localize_script( 'cem-admin-js', 'CEM_Email', [
            'ajaxURL'       => admin_url( 'admin-ajax.php' )
           ] );
    }

    /**
     * Add new setting menu under WooCommerce menu
     */
    public function setting_menu() {
        
        /**
         * Add Setting Page
         */
        add_menu_page(
            __( 'Email Settings', "coastalynk-emails" ),
            __( 'Email Settings', "coastalynk-emails" ),
            'manage_options',
            'coastalynk-email-settngs',
            [ $this, 'load_setting_menu' ]
        );
    }
	

	/**
     * Save custom settings
     */
    public function save_coastalynk_settings() {

        $url = admin_url('admin.php');
        $url = add_query_arg( 'page', 'coastalynk-email-settngs', $url );

        $current_tab = isset( $_POST['current_tab'] ) ? $_POST['current_tab'] : '';
        if( $current_tab === 'sts_email' ) {

            $coastalynk_sts_email_subject = isset( $_POST['coastalynk_sts_email_subject'] ) ? sanitize_textarea_field( stripslashes_deep( $_POST['coastalynk_sts_email_subject'] ) ) : '';
            $coastalynk_sts_body = isset( $_POST['coastalynk_sts_body'] ) ? wp_kses_post( stripslashes_deep( $_POST['coastalynk_sts_body'] ) ) : '';

            update_option( 'coastalynk_sts_email_subject', $coastalynk_sts_email_subject );
            update_option( 'coastalynk_sts_body', $coastalynk_sts_body );
            $url = add_query_arg( 'tab', 'sts_email', $url );
        }

        if( $current_tab === 'sbm_email' ) {

            $coastalynk_sbm_email_subject = isset( $_POST['coastalynk_sbm_email_subject'] ) ? sanitize_textarea_field( stripslashes_deep( $_POST['coastalynk_sbm_email_subject'] ) ) : '';
            $coastalynk_sbm_body = isset( $_POST['coastalynk_sbm_body'] ) ? wp_kses_post( stripslashes_deep( $_POST['coastalynk_sbm_body'] ) ) : '';

            update_option( 'coastalynk_sbm_email_subject', $coastalynk_sbm_email_subject );
            update_option( 'coastalynk_sbm_body', $coastalynk_sbm_body );
            $url = add_query_arg( 'tab', 'sbm_email', $url );
        }

        if( $current_tab === 'general' ) {

            update_option( 'coatalynk_finance_admin_email', sanitize_text_field( $_POST['coatalynk_finance_admin_email'] ) );
            update_option( 'coatalynk_nimasa_admin_email', sanitize_text_field( $_POST['coatalynk_nimasa_admin_email'] ) );
            update_option( 'coatalynk_site_admin_email', sanitize_text_field( $_POST['coatalynk_site_admin_email'] ) );
            update_option( 'coatalynk_npa_admin_email', sanitize_text_field( $_POST['coatalynk_npa_admin_email'] ) );
            $url = add_query_arg( 'tab', 'general', $url );
        }

        $url = add_query_arg( 'updated', 1, $url );
        wp_redirect( $url );
        exit;
    }

    /**
     * Load settings page content
     */
    public function load_setting_menu() {
        
		$settings_sections = array(
            'general' => array(
                'title' => __( 'General Settings', "coastalynk-emails" ),
                'icon' => 'fa-cog',
            ),
            
            'sts_email' => array(
                'title' => __( 'STS Email', "coastalynk-emails" ),
                'icon' => 'fa-info',
            ),

             'sbm_email' => array(
                'title' => __( 'SBM Email', "coastalynk-emails" ),
                'icon' => 'fa-info',
            ),
        );

		$settings_sections = apply_filters( 'sts_settings_sections', $settings_sections );
        
       
        ?>
		<div class="wrap">
			<div id="icon-options-general" class="icon32"></div>
			<h2><?php _e( 'Coastalynk Email Settings', "coastalynk-emails" ); ?></h2>
		
			<div class="nav-tab-wrapper">
				<?php
					foreach( $settings_sections as $key => $section ) {
				?>
						<a href="?page=coastalynk-email-settngs&tab=<?php echo $key; ?>"
							class="nav-tab <?php echo $this->page_tab == $key ? 'nav-tab-active' : ''; ?>">
							<i class="fa <?php echo $section['icon']; ?>" aria-hidden="true"></i>
							<?php _e( $section['title'], 'coastalynk-emails' ); ?>
						</a>
                <?php
                    }
                ?>
			</div>
		
			<?php
					foreach( $settings_sections as $key => $section ) {
						if( $this->page_tab == $key ) {
							$key = str_replace( '_', '-', $key );
							include( 'views/' . $key . '.php' );
						}
					}
					?>
		</div>
        <?php
    }
}

new Coastalynk_Email_Settings();