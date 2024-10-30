<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @since      5.0.0
 *
 * @package    WHMC
 * @subpackage WHMC/admin
 */

class whmcmiscellaneouslight
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
            'whmc_whmcmiscellaneous'
        ));

    }

    public function whmc_whmcmiscellaneous()
    {

        register_setting("whmcmiscellaneous", "whmcmiscellaneous", array(
            $this,
            'whmcmiscellaneous_page_sanitize'
        ));
        

        add_settings_section("notification_section_setting", " ", array(
            $this,
            'settting_sec_func'
        ) , 'whmcmiscellaneous_secs');

        add_settings_field("whmcmiscellloader", esc_html__("Add To Cart Loader", "mini-cart-for-woocommerce") , array(
            $this,
            "whmcmiscellloader"
        ) , 'whmcmiscellaneous_secs', "notification_section_setting", array('class' =>'adofuifiodu'));


        add_settings_field("enabeloadstore", esc_html__("Enable Loader for Store", "mini-cart-for-woocommerce") , array(
            $this,
            "enabeloadstore"
        ) , 'whmcmiscellaneous_secs', "notification_section_setting");


        add_settings_field("cellmoaderclr", esc_html__("Loader Color", "mini-cart-for-woocommerce") , array(
            $this,
            "cellmoaderclr"
        ) , 'whmcmiscellaneous_secs', "notification_section_setting");

        add_settings_field("changeshiipingcals", esc_html__("Shiiping Calculator(Premium)", "mini-cart-for-woocommerce") , array(
            $this,
            "settting_sec_func_header"
        ) , 'whmcmiscellaneous_secs', "notification_section_setting", array(
            'class' => 'whmc_sidebar_top'
        ));

        add_settings_field("changeshiipingcal", esc_html__("Change form text of  Shiiping calculator", "mini-cart-for-woocommerce") , array(
            $this,
            "changeshiipingcal"
        ) , 'whmcmiscellaneous_secs', "notification_section_setting");



    
    }

    /**
     * This function is a callback function of  add seeting section
     */

    public function settting_sec_func()
    {

        return true;
    }

    public function settting_sec_func_header()
    {

        return true;
    }
    public function changeshiipingcal()
    {

        $shipto = esc_html__('Shipping to','mini-cart-for-woocommerce');
        $notfshopads = esc_html__('No shipping options were found for','mini-cart-for-woocommerce');
        $calculate = esc_html__('Calculate','mini-cart-for-woocommerce');

        printf('<div class="shioldbdhfb"><ul class="topnofici"><li><input type="text" value="%s" placeholder="'.esc_html('Shipping to', 'mini-cart-for-woocommerce').'"class="sidebarinputifeld dfdfss" disabled></li>', $shipto);


        printf('<li><input type="text" value="%s" placeholder="'.esc_html('No shipping options were found for', 'mini-cart-for-woocommerce').'"class="sidebarinputifeld dfdfss" disabled></li>', $notfshopads);
        
        printf('<li><input type="text"  value="%s" placeholder="'.esc_html('Calculate', 'mini-cart-for-woocommerce').'" disabled class="sidebarinputifeld dfdfss"></li></ul>', $calculate);

        echo '<ul class="clcuimage"><img  src="'.MCFWC_LIGHT_URL.'/assets/admin/img/shiplabel.PNG" class="sihdbjfbcb"></ul></div>';

  
}

    public function cellmoaderclr()
    {

        $notifications = get_option('whmcmiscellaneous');
        $notifications_rang_value = isset($notifications['cellmoaderclr']) ? $notifications['cellmoaderclr'] : '#fff';

        printf('<input type="text" name="whmcmiscellaneous[cellmoaderclr]" value="%s"  class="cellmoaderclr" id="cellmoaderclr">', $notifications_rang_value);

    }

    public function suceess_icon_color()
    {

        $notifications = get_option('whmcmiscellaneous');;
        $suceess_icon_color = isset($notifications['suceess_icon_color']) ? $notifications['suceess_icon_color'] : '#fff';

        printf('<input type="text" name="whmcmiscellaneous[suceess_icon_color]" value="%s"  class="progressbar_color" id="suceess_icon_color">', $suceess_icon_color);

    }

    /**
     * This function is a callback function of  add seeting field
     */

    public function whmcmiscellloader()
    {

        $notifications = get_option('whmcmiscellaneous');
        $whmcmiscellloader = isset($notifications['whmcmiscellloader']) ? $notifications['whmcmiscellloader'] : 'icon_s-6';
    ?>
   
<select id="whmcmiscellloader" name="whmcmiscellaneous[whmcmiscellloader]" class="default">
    
    <option value="icon_s-6" <?php echo esc_attr($whmcmiscellloader) == "icon_s-6" ? 'selected' : '';?>>Loader 1</option>

    <option value="icon_s-5" <?php echo esc_attr($whmcmiscellloader) == "icon_s-5" ? 'selected' : '';?>>Loader 2</option>

    <option value="icon_s-3" <?php echo esc_attr($whmcmiscellloader) == "icon_s-3" ? 'selected' : '';?>>Loader 3</option>

    <option value="icon_s-2" <?php echo esc_attr($whmcmiscellloader) == "icon_s-2" ? 'selected' : '';?>>Loader 4</option>

    <option value="icon_spin" <?php echo esc_attr($whmcmiscellloader) == "icon_spin" ? 'selected' : '';?>>Loader 5</option>

    <option value="icon_s-0" <?php echo esc_attr($whmcmiscellloader) == "icon_s-0" ? 'selected' : '';?>>Loader 6</option>       
    </select> <img  src="<?php echo MCFWC_LIGHT_URL ?>/assets/admin/img/loader.PNG" class="sihdbjfbcb"> 
    <p class="whmc_description" ><?php echo esc_html__('Add spinner loader to Add Cart button for single product page', 'mini-cart-for-woocommerce') ?></p>
<?php

    }
    public function enabeloadstore()
    {

        $notifications = get_option('whmcmiscellaneous');

        printf('<input type="checkbox" name="whmcmiscellaneous[enabeloadstore]" class="whmc_apple-switch"  value="enabeloadstore" %s id="enabeloadstore"><p class="whmc_description" >'.esc_html__("Add spinner loader to Add Cart button for Store products", "mini-cart-for-woocommerce").'</p>', (isset($notifications['enabeloadstore']) && $notifications['enabeloadstore'] === 'enabeloadstore') ? 'checked' : '');

    }

    /**
     * admin form field validation
     */

    public function whmcmiscellaneous_page_sanitize($input)
    {
        $sanitary_values = array();
        if (isset($input['whmcmiscellloader']))
        {
            $sanitary_values['whmcmiscellloader'] = $input['whmcmiscellloader'];
        }
        if (isset($input['enabeloadstore']))
        {
            $sanitary_values['enabeloadstore'] = $input['enabeloadstore'];
        }
        if (isset($input['cellmoaderclr']))
        {
            $sanitary_values['cellmoaderclr'] = $input['cellmoaderclr'];
        }
        if (isset($input['calculate']))
        {
            $sanitary_values['calculate'] = $input['calculate'];
        }
        if (isset($input['notfshopads']))
        {
            $sanitary_values['notfshopads'] = $input['notfshopads'];
        }
        if (isset($input['shipto']))
        {
            $sanitary_values['shipto'] = $input['shipto'];
        }
        return $sanitary_values;
    }

}

if(class_exists('whmcmiscellaneouslight')){

    new whmcmiscellaneouslight;
}