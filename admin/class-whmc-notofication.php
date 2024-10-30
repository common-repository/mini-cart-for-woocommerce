<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @since      5.0.0
 *
 * @package    WHMC
 * @subpackage WHMC/admin
 */

class WHMC_Notifationlight
{

    /**
     * The ID of this plugin.
     *
     * @since    5.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */

    public function __construct()
    {
        add_action('admin_init', array(
            $this,
            'whmc_notification_settings_page'
        ));

    }

    public function whmc_notification_settings_page()
    {

        register_setting("whmc_notification", "whmc_notification", array(
            $this,
            'whmc_notification_page_sanitize'
        )); // sanitize_callback);
        

        add_settings_section("notification_section_setting", " ", array(
            $this,
            'settting_sec_func'
        ) , 'whmc_admin_sec_notification');

        add_settings_field("notification_enabes_whmc", esc_html__("Disable Notification Box?", "mini-cart-for-woocommerce") , array(
            $this,
            "notification_enabes_whmc"
        ) , 'whmc_admin_sec_notification', "notification_section_setting");

        add_settings_field("notification_position", esc_html__("Box Position", "mini-cart-for-woocommerce") , array(
            $this,
            "notification_position"
        ) , 'whmc_admin_sec_notification', "notification_section_setting");

        add_settings_field("wmhc_notification_added_text", esc_html__("Text after product name", "mini-cart-for-woocommerce") , array(
            $this,
            "wmhc_notification_added_text"
        ) , 'whmc_admin_sec_notification', "notification_section_setting");

        add_settings_field("notification_title_color", esc_html__("Title Color", "mini-cart-for-woocommerce") , array(
            $this,
            "notification_title_color"
        ) , 'whmc_admin_sec_notification', "notification_section_setting");

        add_settings_field("notification_background_color", esc_html__("Box Background", "mini-cart-for-woocommerce") , array(
            $this,
            "notification_background_color"
        ) , 'whmc_admin_sec_notification', "notification_section_setting");

        add_settings_field("notification_boxshadow", esc_html__("Box Shadow Color", "mini-cart-for-woocommerce") , array(
            $this,
            "notification_boxshadow"
        ) , 'whmc_admin_sec_notification', "notification_section_setting");

        add_settings_field("notification_timing", esc_html__("Display Time", "mini-cart-for-woocommerce") , array(
            $this,
            "notification_timing"
        ) , 'whmc_admin_sec_notification', "notification_section_setting");

        add_settings_field("suceess_icon_color", esc_html__("Icon Color", "mini-cart-for-woocommerce") , array(
            $this,
            "suceess_icon_color"
        ) , 'whmc_admin_sec_notification', "notification_section_setting");

        add_settings_field("notification_progress_bar_color", esc_html__("Progress Bar Color", "mini-cart-for-woocommerce") , array(
            $this,
            "notification_progress_bar_color"
        ) , 'whmc_admin_sec_notification', "notification_section_setting");

        add_settings_field("notification_round_bar", esc_html__("Round Box Design", "mini-cart-for-woocommerce") , array(
            $this,
            "notification_round_bar"
        ) , 'whmc_admin_sec_notification', "notification_section_setting");

    }

    /**
     * This function is a callback function of  add seeting section
     */

    public function settting_sec_func()
    {

        echo "<div class='hmprefr'>This is Premium Features</div>";
    }

    public function settting_sec_func_header()
    {

        return true;
    }

    public function wmhc_notification_added_text()
    {
        $notifications_rang_value = esc_html__('added successfully','mini-cart-for-woocommerce');

        printf('<input type="text" value="%s" id="wmhc_notification_added_text">', $notifications_rang_value);

    }

    public function notification_title_color()
    {

        $notifications = get_option('whmc_notification');
        $notifications_rang_value = '#4c4c4c';

        printf('<input type="text" value="%s"  class="notification_title_color" id="notification_title_color">', $notifications_rang_value);

    }

    public function notification_background_color()
    {
        $notifications_rang_value = '#68d619';

        printf('<input type="text" value="%s"  class="notification_bg_color" id="notification_background_color">', $notifications_rang_value);

    }
    public function notification_boxshadow()
    {
        $notifications_rang_value = '#fff';

        printf('<input type="text" value="%s"  class="notification_bg_color" id="notification_boxshadow">', $notifications_rang_value);

    }

    public function notification_progress_bar_color()
    {

        $notifications_rang_value = '#dd0f0f';

        printf('<input type="text" value="%s"  class="progressbar_color" id="notification_progress_bar_color">', $notifications_rang_value);

    }
    public function suceess_icon_color()
    {

        $suceess_icon_color = '#fff';

        printf('<input type="text" value="%s"  class="progressbar_color" id="suceess_icon_color">', $suceess_icon_color);

    }

    /**
     * This function is a callback function of  add seeting field
     */

    public function notification_position()
    {?>
        
        <select class="notification_position">     
        <option value="top-start"><?php
        esc_html_e('Top Left', 'mini-cart-for-woocommerce');?></option>
        <option value="top"><?php
        esc_html_e('Top Center', 'mini-cart-for-woocommerce');?></option>
        <option value="top-end" selected><?php
        esc_html_e('Top Right', 'mini-cart-for-woocommerce');?></option>
        <option value="center-start"><?php
        esc_html_e('Center Left', 'mini-cart-for-woocommerce');?></option>
        <option value="center"><?php
        esc_html_e('Center Center', 'mini-cart-for-woocommerce');?></option>
        <option value="center-end"><?php
        esc_html_e('Center Right', 'mini-cart-for-woocommerce');?></option>
        <option value="bottom-start"><?php
        esc_html_e('Bottom Left', 'mini-cart-for-woocommerce');?></option>
            <option value="bottom"><?php
        esc_html_e('Bottom Center', 'mini-cart-for-woocommerce');?></option>
            <option value="bottom-end"><?php
        esc_html_e('Bottom Right', 'mini-cart-for-woocommerce');?></option>
            </select>

        <?php

    }
    /**
     * This function is a callback function of  add seeting field
     */

    public function notification_timing()
    {

        $notifications = get_option('whmc_notification');
        $notification_timing = isset($notifications['notification_timing']) ? $notifications['notification_timing'] : '3000';?>
        
            <select name="whmc_notification[notification_timing]" class="whmc_slect_class">
                
            <option value="1500" ><?php
        esc_html_e('1.5s', 'mini-cart-for-woocommerce');?></option>
            <option value="2000"><?php
        esc_html_e('2s', 'mini-cart-for-woocommerce');?></option>
            <option value="3000"><?php
        esc_html_e('3s', 'mini-cart-for-woocommerce');?></option>
    
            <option value="4000"><?php
        esc_html_e('4s', 'mini-cart-for-woocommerce');?></option>
            <option value="5000"><?php
        esc_html_e('5s', 'mini-cart-for-woocommerce');?></option>
            <option value="6000"><?php
        esc_html_e('6s', 'mini-cart-for-woocommerce');?></option>
            <option value="7000"><?php
        esc_html_e('7s', 'mini-cart-for-woocommerce');?></option>
            <option value="8000"><?php
        esc_html_e('8s', 'mini-cart-for-woocommerce');?></option>
            <option value="9000"><?php
        esc_html_e('9s', 'mini-cart-for-woocommerce');?></option>
            <option value="10000"><?php
        esc_html_e('10s', 'mini-cart-for-woocommerce');?></option>
            </select>
            <p class="whmc_description" ><?php echo esc_html__('Notification box persistence time (Seconds)', 'mini-cart-for-woocommerce') ?></p>

        <?php

    }

    public function notification_enabes_whmc()
    {?>

        <select class="notification_enabes_whmc">
            
        <option value="no" selected><?php
        esc_html_e('No', 'mini-cart-for-woocommerce');?></option>
        <option value="yes"><?php
        esc_html_e('Yes', 'mini-cart-for-woocommerce');?></option>
    
        </select>
        <p class="whmc_description" ><?php echo esc_html__('Turn off the notification feature', 'mini-cart-for-woocommerce') ?></p>

    <?php

    }

    public function notification_round_bar()
    {

        printf('<input type="checkbox" class="whmc_apple-switch" id="notification_round_bar"><p class="whmc_description" checked>');

    }

    /**
     * admin form field validation
     */

    public function whmc_notification_page_sanitize($input)
    {

        return true;
    }

}

if(class_exists('WHMC_Notifationlight')){

    new WHMC_Notifationlight;
}