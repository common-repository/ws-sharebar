<?php
/*
Plugin Name: WS Sharebar
Plugin URI: https://wordpress.org/plugins/ws-sharebar
Description: WS Sharebar plugin helps to display simple floating social media share buttons.
Version: 1.0        
Author: WebShouters
Author URI: http://www.webshouters.com/
Text Domain: ws-sharebar
*/                                                                                                                                                                                                                                                                                                                                                                                                                                                            
define('WS_SHAREBAR_DIR', plugin_dir_path(__FILE__));
define('WS_SHAREBAR_URL', plugin_dir_url(__FILE__));
define('WS_SHARE_TEXT_DOMAIN', 'ws-sharebar');                                  
//register settings                                                                                                                        
function ws_sharebar_register_settings() {                 
    register_setting( 'ws_sharebar_options_group', 'ws_sharebar_fb_like');
    register_setting( 'ws_sharebar_options_group', 'ws_sharebar_fb_share');
    register_setting( 'ws_sharebar_options_group', 'ws_sharebar_tweet');
    register_setting( 'ws_sharebar_options_group', 'ws_sharebar_linkedin');
    register_setting( 'ws_sharebar_options_group', 'ws_sharebar_google_plus');
    register_setting( 'ws_sharebar_options_group', 'ws_sharebar_pinterest');
    register_setting( 'ws_sharebar_options_group', 'ws_sharebar_margin_top');
    register_setting( 'ws_sharebar_options_group', 'ws_sharebar_margin_left');       
}
//add default setting values on activation
function ws_sharebar_activate() {
    add_option( 'ws_sharebar_fb_like', true);
    add_option( 'ws_sharebar_fb_share', true);
    add_option( 'ws_sharebar_tweet', true);
    add_option( 'ws_sharebar_linkedin', true);
    add_option( 'ws_sharebar_google_plus', true);
    add_option( 'ws_sharebar_pinterest', true);
    add_option( 'ws_sharebar_margin_top', '15');
    add_option( 'ws_sharebar_margin_left', '20');
}

//delete setting and values on deactivation
function ws_sharebar_deactivate() {
    delete_option( 'ws_sharebar_fb_like');
    delete_option( 'ws_sharebar_fb_share');
    delete_option( 'ws_sharebar_tweet');
    delete_option( 'ws_sharebar_linkedin');
    delete_option( 'ws_sharebar_google_plus');
    delete_option( 'ws_sharebar_pinterest');
    delete_option( 'ws_sharebar_margin_top');
    delete_option( 'ws_sharebar_margin_left');
}

function ws_sharebar_register_options_page() {
    add_options_page('WS Sharebar', 'WS Sharebar', 'manage_options', 'ws-sharebar', 'ws_sharebar_options_page');
}


function ws_sharebar_options_page()
{
    ?>
    <div>
        <?php screen_icon(); ?>
        <h2><?php _e('WS Sharebar', WS_SHARE_TEXT_DOMAIN); ?></h2>
        <p><?php _e('WS Sharebar plugin helps to display simple floating social media share buttons.', WS_SHARE_TEXT_DOMAIN); ?> </p>
        <form method="post" action="options.php">
            <?php settings_fields( 'ws_sharebar_options_group' ); ?>
            <h3><?php _e('General Setting', WS_SHARE_TEXT_DOMAIN); ?></h3>

            <p>

                <input type="checkbox" id="ws_sharebar_fb_like" name="ws_sharebar_fb_like" value="true"<?php if (get_option('ws_sharebar_fb_like') == true) echo 'checked="checked" ';?>>
                <label for="ws_sharebar_fb_like"><strong><?php _e('Facebook Like', WS_SHARE_TEXT_DOMAIN); ?></strong></label>

            </p>

            <p>

                <input type="checkbox" id="ws_sharebar_fb_share" name="ws_sharebar_fb_share" value="true"<?php if (get_option('ws_sharebar_fb_share') == true) echo 'checked="checked" ';?>>
                <label for="ws_sharebar_fb_share"><strong><?php _e('Facebook Share', WS_SHARE_TEXT_DOMAIN); ?></strong></label>

            </p>

            <p>

                <input type="checkbox" id="ws_sharebar_tweet" name="ws_sharebar_tweet" value="true"<?php if (get_option('ws_sharebar_tweet') == true) echo 'checked="checked" ';?>>
                <label for="ws_sharebar_tweet"><strong><?php _e('Twitter', WS_SHARE_TEXT_DOMAIN); ?></strong></label>

            </p>

            <p>

                <input type="checkbox" id="ws_sharebar_linkedin" name="ws_sharebar_linkedin" value="true"<?php if (get_option('ws_sharebar_linkedin') == true) echo 'checked="checked" ';?>>
                <label for="ws_sharebar_linkedin"><strong><?php _e('LinkedIn', WS_SHARE_TEXT_DOMAIN); ?></strong></label>

            </p>

            <p>

                <input type="checkbox" id="ws_sharebar_google_plus" name="ws_sharebar_google_plus" value="true"<?php if (get_option('ws_sharebar_google_plus') == true) echo 'checked="checked" ';?>>
                <label for="ws_sharebar_google_plus"><strong><?php _e('Google Plus', WS_SHARE_TEXT_DOMAIN); ?></strong></label>

            </p>

            <p>

                <input type="checkbox" id="ws_sharebar_pinterest" name="ws_sharebar_pinterest" value="true"<?php if (get_option('ws_sharebar_pinterest') == true) echo 'checked="checked" ';?>>
                <label for="ws_sharebar_pinterest"><strong><?php _e('Pinterest', WS_SHARE_TEXT_DOMAIN); ?></strong></label>

            </p>

            <h3><?php _e('Display Setting', WS_SHARE_TEXT_DOMAIN); ?></h3>

            <p>
                <label for="ws_sharebar_margin_top"><strong><?php _e('Top', WS_SHARE_TEXT_DOMAIN); ?> </strong></label>
                <input type="number" id="ws_sharebar_margin_top" name="ws_sharebar_margin_top" style="width: 60px;" min="1" value="<?php echo get_option('ws_sharebar_margin_top'); ?>"> %
            </p>

            <p>
                <label for="ws_sharebar_margin_left"><strong><?php _e('Left', WS_SHARE_TEXT_DOMAIN); ?> </strong></label>
                <input type="number" id="ws_sharebar_margin_left" name="ws_sharebar_margin_left" style="width: 60px;" min="1" value="<?php echo get_option('ws_sharebar_margin_left'); ?>"> px
            </p>

            <?php  submit_button(); ?>

        </form>
    </div>
    <?php
}

add_action( 'admin_init', 'ws_sharebar_register_settings' );
//register activation hook
register_activation_hook( __FILE__, 'ws_sharebar_activate' );
//register deactivation hook
register_deactivation_hook( __FILE__, 'ws_sharebar_deactivate' );
add_action('admin_menu', 'ws_sharebar_register_options_page');
//Add scripts code to footer
add_action( 'wp_footer', 'ws_sharebar_add_code' );
//Add styles to header
add_action( 'wp_head', 'ws_sharebar_add_style_to_head' );

include_once(WS_SHAREBAR_DIR . 'includes/frontend/code.php');


?>