<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @since      5.0.0
 *
 * @package    WHMC
 * @subpackage WHMC/admin
 */

class WHMC_Admin_Sidebar
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
            'whmc_sidepanel_settings_page'
        ));

    }

    public function whmc_sidepanel_settings_page()
    {

        register_setting("whmc_sidepanel", "whmc_sidepanel", array(
        $this,
        'whmc_sidepanel_page_sanitized'
        ));

        add_settings_section("sidepanel_section_setting", " ", array(
        $this,
        'settting_sec_func'
        ) , 'whmc_admin_sec_sidepanel');


        add_settings_field("wmhc_sidebar_toppart", esc_html__("Top Part", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_sidebar_top"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_top'
        ));
        add_settings_field("wmhc_remobetippar", esc_html__("Remove Top part", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_remobetippar"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");

        add_settings_field("wmhcside_toppart_bg", esc_html__("Top Background", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhcside_toppart_bg"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");

        add_settings_field("wmhc_sidebartop_icon", esc_html__("Top Icon (Premium)", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_top_icon"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmpropanel'
        ));

        add_settings_field("wmhcside_toppart_icon", esc_html__("Icon Color", "mini-cart-for-woocommerce") , array($this,"wmhcside_toppart_icon") , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array('class' => 'wmhcside_toppart_icon'
        ));
        add_settings_field("wmhcside_topcartcnt", esc_html__("Remove cart count", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhcside_topcartcnt"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");


        add_settings_field("wmhcside_toppart_txt", esc_html__("Text Color", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhcside_toppart_txt"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");

        add_settings_field("wmhcside_toppartbbclr", esc_html__("Buble Background", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhcside_toppartbbclr"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'wmhcside_topcartcnt'
        ));

        add_settings_field("wmhcside_topbtxbclr", esc_html__("Buble Text Color", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhcside_topbtxbclr"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'wmhcside_topcartcnt'
        ));

        add_settings_field("wmhcside_toppart_txtcu", esc_html__("Cart items", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhcside_toppart_txtcu"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");
        add_settings_field("wmhcside_toppartycart", esc_html__("Cart Heading", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhcside_toppartycart"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");


        add_settings_field("wmhc_sidebar_top", esc_html__(" Middle Part", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_sidebar_top"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_top'
        ));



        add_settings_field("whmc_side_img_brious", esc_html__("Product Image Border Radius(px)", "mini-cart-for-woocommerce") , array(
        $this,
        "whmc_side_img_brious"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");

        add_settings_field("whmc_side_priceqty", esc_html__("Price Style", "mini-cart-for-woocommerce") , array(
        $this,
        "whmc_side_priceqty"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");
        add_settings_field("whmc_displaqtry", esc_html__("Enable Quantity box (Pro)", "mini-cart-for-woocommerce") , array($this,"whmc_displaqtry"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array('class' => 'whmpropanel'
        ));
        add_settings_field("whmc_side_svaevlue", esc_html__("Save Value (Pro)", "mini-cart-for-woocommerce") , array(
        $this,
        "whmc_side_svaevlue"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmpropanel'
        ));

        add_settings_field("whmc_svaevluft", esc_html__("Font Size (Save Value)", "mini-cart-for-woocommerce") , array(
        $this,
        "whmc_svaevluft"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmcvaluespos'
        ));

        add_settings_field("whmc_svaecolor", esc_html__("Color (Save Value)", "mini-cart-for-woocommerce") , array(
        $this,
        "whmc_svaecolor"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmcvaluespos'
        ));

        add_settings_field("whmcvaluespos", esc_html__("Value Position", "mini-cart-for-woocommerce") , array(
        $this,
        "whmcvaluespos"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmcvaluespos'
        ));

        add_settings_field("whmc_qrtborder", esc_html__("Quantity Border Color", "mini-cart-for-woocommerce") , array(
        $this,
        "whmc_qrtborder"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmcqrtybox'
        ));


        add_settings_field("whmc_qrtborderradis", esc_html__("Quantity Border Radius(px)", "mini-cart-for-woocommerce") , array(
        $this,
        "whmc_qrtborderradis"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmcqrtybox'
        ));

        add_settings_field("wmhc_cart_side_text_color", esc_html__("Product Title Color", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_cart_side_text_color"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");

        add_settings_field("wmhc_cart_side_text_size", esc_html__("Product Title Font", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_cart_side_text_size"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");

        add_settings_field("wmhc_cart_side_price_color", esc_html__("Price Color", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_cart_side_price_color"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");
        add_settings_field("wmhc_cart_side_price_size", esc_html__("Price Font Size", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_cart_side_price_size"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");
        add_settings_field("wmhc_middleborder", esc_html__("Border", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_middleborder"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");
        add_settings_field("wmhc_middleborderclr", esc_html__("Border Color", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_middleborderclr"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");
        add_settings_field("wmhc_sidebar_bottom", esc_html__(" Bottom Part", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_sidebar_bottom"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_top'
        ));
        add_settings_field("wmhc_bottomborder", esc_html__("Border", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_bottomborder"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");
        add_settings_field("wmhc_bottmborderclr", esc_html__("Border Color", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_bottmborderclr"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");


        add_settings_field("wmhc_coupon_icons", esc_html__("Coupon icon (Pro)", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_coupon_icons"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_copin pomobles'
        ));


        add_settings_field("wmhc_coupon_imodla", esc_html__("Coupon Modal (Pro)", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_coupon_imodla"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_copin wmhcdiscount pomobles'
        ));


        add_settings_field("wmhc_cart_side_subtotal", esc_html__("Sub Total", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_cart_side_subtotal"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_copin'
        ));

        add_settings_field("wmhc_cart_shipping", esc_html__("Shipping (Pro)", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_cart_shipping"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_copin pomobles'
        ));

        add_settings_field("wmhcside_btm_shipping", esc_html__("Tax  (Pro)", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhcside_btm_shipping"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_copin pomobles'
        ));

        add_settings_field("wmhcside_btm_discount", esc_html__("Discount  (Pro)", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhcside_btm_discount"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_copin wmhcdiscount pomobles'
        ));
        add_settings_field("wmhc_cart_side_customtxt", esc_html__("Custom Text", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_cart_side_customtxt"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_copin'
        ));
        add_settings_field("wmhcside_btm_total", esc_html__("Total ", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhcside_btm_total"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_copin'
        ));

        add_settings_field("wmhc_cart_side_button_text_color", esc_html__("Checkout Button", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_cart_side_button_text_color"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_copin'
        ));

        add_settings_field("wmhc_cart_side_text_change", esc_html__("Keep Shopping", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_cart_side_text_change"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_copin'
        ));
        add_settings_field("wmhc_cart_emptycart", esc_html__("Empty Cart", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_cart_emptycart"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_copin'
        ));

        add_settings_field("wmhc_sidebar_gse", esc_html__("General Settings", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_sidebar_gse"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_top'
        ));

        add_settings_field("wmhc_cart_side_position", esc_html__("Change sidebar position?", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_cart_side_position"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");

        add_settings_field("wmhc_cart_side_autup", esc_html__("Stop Auto Open?", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_cart_side_autup"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");
        add_settings_field("wmhc_wrapper_bg", esc_html__("Mini Cart Background", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_wrapper_bg"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");

        add_settings_field("wmhcsidebarstyles", esc_html__("Sidebar Box Style", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhcsidebarstyles"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");

        add_settings_field("wmhcsidebaropstls", esc_html__("Sidebar Open Style", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhcsidebaropstls"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");

        add_settings_field("wmhcsidebarclstls", esc_html__("Sidebar Close Style", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhcsidebarclstls"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");


        add_settings_field("wmhc_wrapperloader", esc_html__("Loader", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_wrapperloader"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");


        add_settings_field("wmhc_locar", esc_html__("Loader Color", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_locar"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");

    }

    /**
     * This function is a callback function of  add seeting section
     */

    public function wmhc_sidebar_bottom()
    {
        return true;
    }
    public function wmhc_sidebar_top()
    {
        return true;
    }
    public function wmhc_sidebar_gse()
    {
        return true;
    }
    public function settting_sec_func()
    {
        return true;
    }

    public function whmc_svaecolor(){
        $sidepanels = get_option('whmc_sidepanel');

        $whmc_svaecolor = isset($sidepanels['whmc_svaecolor']) ? $sidepanels['whmc_svaecolor'] : '#34dd16';

    printf('<input type="text" name="whmc_sidepanel[whmc_svaecolor]" value="%s"  class="side_bottom_color" id="whmc_svaecolor">', $whmc_svaecolor);
    }

    public function wmhc_coupon_icons(){

        $whmc_coupon_icon = 'icon_d-1';
        $whmc_coupon_iconcolor = '#929292';
        $wmhc_applycoupon_value = esc_html__('Apply Coupon?','mini-cart-for-woocommerce');
    ?> 
    <ul class="whmc_ptc_wrape_tb"><li><strong class="whmc_ptc_tb"><label><?php echo esc_html('Choose a Icon','mini-cart-for-woocommerce') ?></label></strong>

    <select id="whmc_coupon_icon" class='default'>
    
     <option value="icon_d-1">icon 1</option>    
     <option value="icon_d-2">icon 2</option>    
    <option value="icon_d-4">icon 3</option>         
    <option value="icon_d-3">icon 4</option>         
    <option value="icon_d-5">icon 5</option>
    <option value="icon_d-7">icon 6</option>         
    <option value="icon_d-8">icon 7</option>         
    <option value="icon_d-9">iicon 8</option>         
    <option value="icon_d-10">icon 9</option>         
    <option value="icon_d-11">icon 10</option>     
    <option id="defaulrts" value="whmcNone">None</option>  

    </select></li>
    <?php

    printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Icon Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" value="%s"  class="side_bottom_color" id="whmc_coupon_iconcolor"></li>', $whmc_coupon_iconcolor);

    printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Text", "mini-cart-for-woocommerce").': </label></strong><input type="text"  value="%s"  placeholder="'.esc_html__('Apply Coupon?','mini-cart-for-woocommerce').'" id="wmhc_applycoupon_value"></li>', $wmhc_applycoupon_value);

    printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Disable this field", "mini-cart-for-woocommerce").':</label></strong><input type="checkbox" class="whmc_apple-switch" id="wmhc_cart_coupon_remove" checked></li></ul>',);


    }

public function wmhcsidebarstyles(){

        $sidepanels = get_option('whmc_sidepanel');

        $wmhcsidebarstyles = isset($sidepanels['wmhcsidebarstyles']) ? $sidepanels['wmhcsidebarstyles'] : 'one'; ?>

<select name="whmc_sidepanel[wmhcsidebarstyles]" id="wmhcsidebarstyles">
    
     <option value="one" <?php
        echo esc_attr($wmhcsidebarstyles) == "one" ? 'selected' : '';?>>Full</option> 

    <option value="two" <?php
        echo esc_attr($wmhcsidebarstyles) == "two" ? 'selected' : '';?>>Small</option> 
        </select>   
        <?php
}
public function wmhcsidebarclstls(){

        $sidepanels = get_option('whmc_sidepanel');

        $wmhcsidebarclstls = isset($sidepanels['wmhcsidebarclstls']) ? $sidepanels['wmhcsidebarclstls'] : 'backSlideOut'; ?>

<select name="whmc_sidepanel[wmhcsidebarclstls]" id="wmhcsidebarclstls">
    
     <option value="backSlideOut" <?php
        echo esc_attr($wmhcsidebarclstls) == "backSlideOut" ? 'selected' : '';?>>Left Out</option> 
    
     <option value="backSlideOutRight" <?php
        echo esc_attr($wmhcsidebarclstls) == "backSlideOutRight" ? 'selected' : '';?>>Right Out</option>

    <option value="backTopOut" <?php
        echo esc_attr($wmhcsidebarclstls) == "backTopOut" ? 'selected' : '';?>>Top Out</option> 
    <option value="backBottomOut" <?php
        echo esc_attr($wmhcsidebarclstls) == "backBottomOut" ? 'selected' : '';?>>Bottom Out</option> 
        </select>   
        <?php
}public function wmhcsidebaropstls(){

        $sidepanels = get_option('whmc_sidepanel');

        $wmhcsidebaropstls = isset($sidepanels['wmhcsidebaropstls']) ? $sidepanels['wmhcsidebaropstls'] : 'backSlideIn'; ?>

<select name="whmc_sidepanel[wmhcsidebaropstls]" id="wmhcsidebaropstls">
    
     <option value="backSlideIn" <?php
        echo esc_attr($wmhcsidebaropstls) == "backSlideIn" ? 'selected' : '';?>>Left In</option> 
    
     <option value="backSlideRight" <?php
        echo esc_attr($wmhcsidebaropstls) == "backSlideRight" ? 'selected' : '';?>>Right In</option>

    <option value="backTopIn" <?php
        echo esc_attr($wmhcsidebaropstls) == "backTopIn" ? 'selected' : '';?>>Top In</option> 

    <option value="backBottomIn" <?php
        echo esc_attr($wmhcsidebaropstls) == "backBottomIn" ? 'selected' : '';?>>Bottom In</option> 
        </select>   
        <?php
}
public function wmhc_coupon_imodla(){

        $sidepanels = get_option('whmc_sidepanel');

        $whmc_coupon_icon = isset($sidepanels['whmc_coupon_modalicon']) ? $sidepanels['whmc_coupon_modalicon'] : 'icon_d-9';
        $whmc_coupon_position = isset($sidepanels['whmc_coupon_position']) ? $sidepanels['whmc_coupon_position'] : 'bottom';

        $whmc_cmoiconclr = isset($sidepanels['whmc_cmoiconclr']) ? $sidepanels['whmc_cmoiconclr'] : '#dd1313';        
        $whmccoupon_modalibg = isset($sidepanels['whmccoupon_modalibg']) ? $sidepanels['whmccoupon_modalibg'] : '#fff';
        $whmc_cmplacehlder = isset($sidepanels['whmc_cmplacehlder']) ? $sidepanels['whmc_cmplacehlder'] : 'Input coupon code';
        $whmc_cmbrnabel = isset($sidepanels['whmc_cmbrnabel']) ? $sidepanels['whmc_cmbrnabel'] : 'Apply';
        $whmc_cmbtnbg = isset($sidepanels['whmc_cmbtnbg']) ? $sidepanels['whmc_cmbtnbg'] : '#1851a7';
        $whmc_cppbrius = isset($sidepanels['whmc_cppbrius']) ? $sidepanels['whmc_cppbrius'] : '50';

    printf('<ul class="whmc_ptc_wrape_tb"><li><strong class="whmc_ptc_tb"><label>'.esc_html__("Placeholder Text", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[whmc_cmplacehlder]" value="%s" id="whmc_cmplacehlder"></li>', $whmc_cmplacehlder);

    printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Button Label", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[whmc_cmbrnabel]" value="%s" id="whmc_cmbrnabel"></li>', $whmc_cmbrnabel);    
    printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Button Background", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[whmc_cmbtnbg]" value="%s"  class="side_bottom_color" id="whmc_cmbtnbg"></li>', $whmc_cmbtnbg);

        printf('<li><strong class="whmc_ptc_tb"><label for="wmhc__text_size">'.esc_html__("Border Radius (px)", "mini-cart-for-woocommerce").'</label></strong><input type="range" name="whmc_sidepanel[whmc_cppbrius]" min="1" max="50" value="%s" oninput="wcppbrius.value = this.value" id="whmc_cppbrius"><output id="wcppbrius">%s<output></li>',$whmc_cppbrius, $whmc_cppbrius);
    ?> 
    <li><strong class="whmc_ptc_tb"><label><?php echo esc_html('Icon before coupon Code?','mini-cart-for-woocommerce') ?></label></strong>

    <select id="whmc_coupon_modalicon"  class="default" name="whmc_sidepanel[whmc_coupon_modalicon]">
    
     <option value="whmcNone" <?php
        echo esc_attr($whmc_coupon_icon) == "whmcNone" ? 'selected' : '';?>>whmcNone</option>     
     <option value="icon_d-1" <?php
        echo esc_attr($whmc_coupon_icon) == "icon_d-1" ? 'selected' : '';?>>icon 1</option>       
     <option value="icon_d-2" <?php
        echo esc_attr($whmc_coupon_icon) == "icon_d-2" ? 'selected' : '';?>>icon 2</option>    

    <option value="icon_d-4" <?php
        echo esc_attr($whmc_coupon_icon) == "icon_d-4" ? 'selected' : '';?>>icon 3</option>         
    <option value="icon_d-3" <?php
        echo esc_attr($whmc_coupon_icon) == "icon_d-3" ? 'selected' : '';?>>icon 4</option>         
    <option value="icon_d-5" <?php
        echo esc_attr($whmc_coupon_icon) == "icon_d-5" ? 'selected' : '';?>>icon 5</option>              
    <option value="icon_d-7" <?php
        echo esc_attr($whmc_coupon_icon) == "icon_d-7" ? 'selected' : '';?>>icon 6</option>         
    <option value="icon_d-8" <?php
        echo esc_attr($whmc_coupon_icon) == "icon_d-8" ? 'selected' : '';?>>icon 7</option>         
    <option value="icon_d-9" <?php
        echo esc_attr($whmc_coupon_icon) == "icon_d-9" ? 'selected' : '';?>>icon 8</option>         
    <option value="icon_d-10" <?php
        echo esc_attr($whmc_coupon_icon) == "icon_d-10" ? 'selected' : '';?>>icon 9</option>         
    <option value="icon_d-11" <?php
        echo esc_attr($whmc_coupon_icon) == "icon_d-11" ? 'selected' : '';?>>icon 10</option>     


    </select></li>

    <li class="copcopos">
      <strong class="whmc_ptc_tb"><label><?php echo esc_html('Coupon Code Position','mini-cart-for-woocommerce') ?></label></strong>
  
<select name="whmc_sidepanel[whmc_coupon_position]" id="whmc_coupon_position">
    
     <option value="top" <?php
        echo esc_attr($whmc_coupon_position) == "top" ? 'selected' : '';?>>Top</option>
     <option value="bottom" <?php
        echo esc_attr($whmc_coupon_position) == "bottom" ? 'selected' : '';?>>Bottom</option>
    </select>

    </li>
    <?php

    printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Icon Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[whmc_cmoiconclr]" value="%s"  class="side_bottom_color" id="whmc_cmoiconclr"></li>', $whmc_cmoiconclr);

    printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Box Background", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[whmccoupon_modalibg]" value="%s"  class="side_bottom_color" id="whmccoupon_modalibg"></li>', $whmccoupon_modalibg);
    printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Hide all my coupons", "mini-cart-for-woocommerce").':</label></strong><input type="checkbox" name="whmc_sidepanel[wmhc_hideall_my_coupon]" class="whmc_apple-switch"  value="wmhc_hideall_my_coupon" %s id="wmhc_hideall_my_coupon"></li>', (isset($sidepanels['wmhc_hideall_my_coupon']) && $sidepanels['wmhc_hideall_my_coupon'] == 'wmhc_hideall_my_coupon') ? 'checked' : '');

    printf('<li class="rmimdhgr"><strong class="whmc_ptc_tb"><label>'.esc_html__("Remove Image", "mini-cart-for-woocommerce").':</label></strong><input type="checkbox" name="whmc_sidepanel[wmhc_cpnimgaehide]" class="whmc_apple-switch"  value="wmhc_cpnimgaehide" %s id="wmhc_cpnimgaehide"></li>', (isset($sidepanels['wmhc_cpnimgaehide']) && $sidepanels['wmhc_cpnimgaehide'] == 'wmhc_cpnimgaehide') ? 'checked' : '');

    printf('<li class="rmidesvbfd"><strong class="whmc_ptc_tb"><label>'.esc_html__("Remove coupon description", "mini-cart-for-woocommerce").':</label></strong><input type="checkbox" name="whmc_sidepanel[wmhc_hide_copnds]" class="whmc_apple-switch"  value="wmhc_hide_copnds" %s id="wmhc_hide_copnds"></li></ul>', (isset($sidepanels['wmhc_hide_copnds']) && $sidepanels['wmhc_hide_copnds'] == 'wmhc_hide_copnds') ? 'checked' : '');

    }



    public function wmhc_top_icon()
    {

        $options = get_option('whmc_sidepanel');;
        $fcp_icon_option = isset($options['fcp_top_icon']) ? $options['fcp_top_icon'] : '';

    ?>

    <select id="fcp_top_icon"  class="default">
        <option value="whmcNone" selected>None</option>
    <option value="fcp_icon_1">Default Icon</option>  
    <option value="fcp_icon_2">fcp_icon_2</option>    
    <option value="fcp_icon_3">fcp_icon_3</option>    
    <option value="fcp_icon_4">fcp_icon_4</option>    
    <option value="fcp_icon_5">fcp_icon_5</option>    
    <option value="fcp_icon_6">fcp_icon_6</option>    
    <option value="fcp_icon_7">fcp_icon_7</option>    
    <option value="fcp_icon_8">fcp_icon_8</option>

    <option value="fcp_icon_11" >fcp_icon_11</option>   

    <option value="icon_45">icon_45</option>  

    <option value="icon_38">icon_38</option>
   
    <option value="icon_39">icon_39</option>
   
    <option value="icon_40">icon_40</option>

    <option value="icon_41">icon_41</option>

    <option value="fcp_icon_9">fcp_icon_9</option> 

    <option value="fcp_icon_10">fcp_icon_10</option>  
    <option value="fcp_icon_12">fcp_icon_12</option>    
    <option value="fcp_icon_13">fcp_icon_13</option>    
    <option value="fcp_icon_14">fcp_icon_14</option>    
    <option value="fcp_icon_15">fcp_icon_15</option>    
    <option value="fcp_icon_16">fcp_icon_16</option>    
    <option value="fcp_icon_17">fcp_icon_17</option>    
    <option value="fcp_icon_18">fcp_icon_18</option>    
    <option value="fcp_icon_19">fcp_icon_19</option>          
    <option value="fcp_icon_20">fcp_icon_20</option>
         
    <option value="icon_19">icon_19</option>

    <option value="icon_20">icon_20</option>        
    <option value="icon_21">icon_21</option>               
    <option value="icon_254">icon_254</option>        
      
    <option value="icon_25">icon_25</option>  
              
    <option value="icon_26">icon_26</option>        
    <option value="icon_27">icon_27</option>        
    <option value="icon_28">icon_28</option>        
    <option value="icon_29">icon_29</option>    

    <option value="icon_30">icon_30</option>
    
    <option value="icon_31">icon_31</option>  
  
    <option value="icon_34">icon_34</option>
    
    <option value="icon_35">icon_35</option>

    <option value="icon_37">icon_37</option>
    
    <option value="icon_43">icon_43</option>
 
    <option value="icon_46">icon_46</option> 
    <option value="icon_44" >icon_44</option> 

  </select>
        
            <?php
    }

    public function wmhcside_toppart_bg()
    {
        $sidepanels = get_option('whmc_sidepanel');

        $wmhcside_toppart_bg = isset($sidepanels['wmhcside_toppart_bg']) ? $sidepanels['wmhcside_toppart_bg'] : '#efefef';

        printf('<input type="text" name="whmc_sidepanel[wmhcside_toppart_bg]" value="%s"  class="side_bottom_color" id="wmhcside_toppart_bg">', $wmhcside_toppart_bg);

  }
    public function wmhcside_toppart_icon()
    {
        $sidepanels = get_option('whmc_sidepanel');

        $wmhcside_toppart_icon = isset($sidepanels['wmhcside_toppart_icon']) ? $sidepanels['wmhcside_toppart_icon'] : '#a5a5a5';

        printf('<input type="text" name="whmc_sidepanel[wmhcside_toppart_icon]" value="%s"  class="side_bottom_color" id="wmhcside_toppart_icon">', $wmhcside_toppart_icon);


  } 
    public function wmhcside_toppart_txt()
    {
        $sidepanels = get_option('whmc_sidepanel');

        $wmhcside_toppart_txt = isset($sidepanels['wmhcside_toppart_txt']) ? $sidepanels['wmhcside_toppart_txt'] : '#505050';

        printf('<input type="text" name="whmc_sidepanel[wmhcside_toppart_txt]" value="%s"  class="side_bottom_color" id="wmhcside_toppart_txt">', $wmhcside_toppart_txt);
  }    public function wmhcside_toppartbbclr()
    {
        $sidepanels = get_option('whmc_sidepanel');

        $wmhcside_toppartbbclr = isset($sidepanels['wmhcside_toppartbbclr']) ? $sidepanels['wmhcside_toppartbbclr'] : '';

        printf('<input type="text" name="whmc_sidepanel[wmhcside_toppartbbclr]" value="%s"  class="side_bottom_color" id="wmhcside_toppartbbclr">', $wmhcside_toppartbbclr);
  } public function wmhcside_topbtxbclr()
    {
        $sidepanels = get_option('whmc_sidepanel');

        $wmhcside_topbtxbclr = isset($sidepanels['wmhcside_topbtxbclr']) ? $sidepanels['wmhcside_topbtxbclr'] : '';

        printf('<input type="text" name="whmc_sidepanel[wmhcside_topbtxbclr]" value="%s"  class="side_bottom_color" id="wmhcside_topbtxbclr">', $wmhcside_topbtxbclr);
  } 
    public function wmhcside_toppart_txtcu()
    {
        $sidepanels = get_option('whmc_sidepanel');
        $wmhcside_toppart_txtcu = isset($sidepanels['wmhcside_toppart_txtcu']) ? $sidepanels['wmhcside_toppart_txtcu'] : esc_html__('Cart items','mini-cart-for-woocommerce');
        printf('<input type="text" name="whmc_sidepanel[wmhcside_toppart_txtcu]" value="%s" placeholder="'.esc_html('Cart Items', 'mini-cart-for-woocommerce').'" id="wmhcside_toppart_txtcu">', $wmhcside_toppart_txtcu);
  }
    public function wmhcside_toppartycart()
    {
        $sidepanels = get_option('whmc_sidepanel');
        $wmhcside_toppartycart = isset($sidepanels['wmhcside_toppartycart']) ? $sidepanels['wmhcside_toppartycart'] : esc_html__('Your Cart','mini-cart-for-woocommerce');
        printf('<input type="text" name="whmc_sidepanel[wmhcside_toppartycart]" value="%s" placeholder="'.esc_html('Your Cart', 'mini-cart-for-woocommerce').'" id="wmhcside_toppartycart">', $wmhcside_toppartycart);
  } 


    public function wmhc_middleborderclr()
    {

        $sidepanels = get_option('whmc_sidepanel');


        $wmhc_cart_side_border_btm = isset($sidepanels['wmhc_cart_side_border_btm']) ? $sidepanels['wmhc_cart_side_border_btm'] : '#efefef';

        printf('<input type="text" name="whmc_sidepanel[wmhc_cart_side_border_btm]" value="%s"  class="side_bottom_color" id="wmhc_cart_side_border_btm">', $wmhc_cart_side_border_btm);

    }
    public function wmhc_middleborder()
    {

        $sidepanels = get_option('whmc_sidepanel');


        $wmhc_middleborder = isset($sidepanels['wmhc_middleborder']) ? $sidepanels['wmhc_middleborder'] : 'dotted';
?>

<select name="whmc_sidepanel[wmhc_middleborder]" id="wmhc_middleborder">
    
    <option value="solid " <?php
        echo esc_attr($wmhc_middleborder) == "solid " ? 'selected' : '';?>><?php echo esc_html__('Solid','mini-cart-for-woocommerce') ?></option>    
    <option value="dotted " <?php
        echo esc_attr($wmhc_middleborder) == "dotted " ? 'selected' : '';?>><?php echo esc_html__('Dotted','mini-cart-for-woocommerce') ?></option>    
    <option value="dashed " <?php
        echo esc_attr($wmhc_middleborder) == "dashed " ? 'selected' : '';?>><?php echo esc_html__('Dashed ','mini-cart-for-woocommerce') ?></option>       
    <option value="none " <?php
        echo esc_attr($wmhc_middleborder) == "none " ? 'selected' : '';?>><?php echo esc_html__('None ','mini-cart-for-woocommerce') ?></option>



    </select>
<?php

    }

    public function wmhc_bottmborderclr()
    {

        $sidepanels = get_option('whmc_sidepanel');


        $wmhc_bottmborderclr = isset($sidepanels['wmhc_bottmborderclr']) ? $sidepanels['wmhc_bottmborderclr'] : '#ccc';

        printf('<input type="text" name="whmc_sidepanel[wmhc_bottmborderclr]" value="%s"  class="side_bottom_color" id="wmhc_bottmborderclr">', $wmhc_bottmborderclr);

    }
    public function wmhc_bottomborder()
    {

        $sidepanels = get_option('whmc_sidepanel');


        $wmhc_bottomborder = isset($sidepanels['wmhc_bottomborder']) ? $sidepanels['wmhc_bottomborder'] : 'dotted';
?>

<select name="whmc_sidepanel[wmhc_bottomborder]" id="wmhc_bottomborder">
    
    <option value="solid" <?php
        echo esc_attr($wmhc_bottomborder) == "solid" ? 'selected' : '';?>><?php echo esc_html__('Solid','mini-cart-for-woocommerce') ?></option>    
    <option value="dotted" <?php
        echo esc_attr($wmhc_bottomborder) == "dotted" ? 'selected' : '';?>><?php echo esc_html__('Dotted','mini-cart-for-woocommerce') ?></option>    
    <option value="dashed" <?php
        echo esc_attr($wmhc_bottomborder) == "dashed" ? 'selected' : '';?>><?php echo esc_html__('Dashed ','mini-cart-for-woocommerce') ?></option>    
    <option value="none" <?php
        echo esc_attr($wmhc_bottomborder) == "none" ? 'selected' : '';?>><?php echo esc_html__('None ','mini-cart-for-woocommerce') ?></option>



    </select>
<?php

    }
    public function wmhc_wrapperloader()
    {

        $sidepanels = get_option('whmc_sidepanel');

        $wmhc_wrapperloader = isset($sidepanels['wmhc_wrapperloader']) ? $sidepanels['wmhc_wrapperloader'] : 'icon_s-6';
?>

<select id="wmhc_wrapperloader" name="whmc_sidepanel[wmhc_wrapperloader]" class="default">
    
    <option value="icon_s-6" <?php echo esc_attr($wmhc_wrapperloader) == "icon_s-6" ? 'selected' : '';?>>Loader 1</option>

    <option value="icon_s-5" <?php echo esc_attr($wmhc_wrapperloader) == "icon_s-5" ? 'selected' : '';?>>Loader 2</option>

    <option value="icon_s-3" <?php echo esc_attr($wmhc_wrapperloader) == "icon_s-3" ? 'selected' : '';?>>Loader 3</option>

    <option value="icon_s-2" <?php echo esc_attr($wmhc_wrapperloader) == "icon_s-2" ? 'selected' : '';?>>Loader 4</option>

    <option value="icon_spin" <?php echo esc_attr($wmhc_wrapperloader) == "icon_spin" ? 'selected' : '';?>>Loader 5</option>

    <option value="icon_s-0" <?php echo esc_attr($wmhc_wrapperloader) == "icon_s-0" ? 'selected' : '';?>>Loader 6</option>       
    </select>
<?php

    }

    
    public function wmhc_cart_side_subtotal()
    {

        $sidepanels = get_option('whmc_sidepanel');

        $wmhc_cart_side_subtotal = isset($sidepanels['wmhc_cart_side_subtotal']) ? $sidepanels['wmhc_cart_side_subtotal'] : '';

        $wmhc_cart_side_subtoral_font = isset($sidepanels['wmhc_cart_side_subtoral_font']) ? $sidepanels['wmhc_cart_side_subtoral_font'] : '14';


        $sidepanels_subtototal_value = isset($sidepanels['wmhc_subtototal_value']) ? $sidepanels['wmhc_subtototal_value'] : esc_html__('Sub total','mini-cart-for-woocommerce');

        printf('<ul class="whmc_ptc_wrape_tb"><li><strong class="whmc_ptc_tb"><label>'.esc_html__("Title", "mini-cart-for-woocommerce").': </label></strong>
        <input type="text" name="whmc_sidepanel[wmhc_subtototal_value]" value="%s"  placeholder="Sub total" id="wmhc_subtototal_value"></li>', $sidepanels_subtototal_value);

        printf('<li><strong class="whmc_ptc_tb"><label >'.esc_html__("Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[wmhc_cart_side_subtotal]" value="%s"  class="side_bottom_color" id="wmhc_cart_side_subtotal"></<li>', $wmhc_cart_side_subtotal);

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Font Size (Px)", "mini-cart-for-woocommerce").'</label></strong><input type="number" name="whmc_sidepanel[wmhc_cart_side_subtoral_font]" value="%s" id="wmhc_cart_side_subtoral_font"></li>', $wmhc_cart_side_subtoral_font);

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Disable this field", "mini-cart-for-woocommerce").':</label></strong><input type="checkbox" name="whmc_sidepanel[wmhc_cart_subtotal_remove]" class="whmc_apple-switch" id="wmhc_cart_subtotal_remove" value="wmhc_cart_subtotal_remove" %s ></li></ul>', (isset($sidepanels['wmhc_cart_subtotal_remove']) && $sidepanels['wmhc_cart_subtotal_remove'] == 'wmhc_cart_subtotal_remove') ? 'checked' : '');

    }  
    public function wmhc_cart_side_customtxt()
    {
    $sidepanels = get_option('whmc_sidepanel');

    $wmhc_subcstxt = isset($sidepanels['wmhc_subcstxt']) ? $sidepanels['wmhc_subcstxt'] : esc_html__('Shipping & taxes may be re-calculated at checkout','mini-cart-for-woocommerce');
        printf('<input type="text" name="whmc_sidepanel[wmhc_subcstxt]" value="%s" id="wmhc_subcstxt" class="widefat">', $wmhc_subcstxt);
 }
    public function wmhc_cart_shipping()
    {

        $wmhc_cart_shipping = '';

        $wmhc_cart_side_shipping_font = '14';

        $wmhc_shipping_value = esc_html__('Shipping','mini-cart-for-woocommerce');
        $whmc_shipicon = 'icon_pen';
        printf('<ul class="whmc_ptc_wrape_tb"><li><strong class="whmc_ptc_tb"><label>'.esc_html__("Title", "mini-cart-for-woocommerce").': </label></strong><input type="text"  value="%s"  placeholder="Shipping" id="wmhc_shipping_value"></li>', $wmhc_shipping_value);

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" value="%s"  class="side_bottom_color" id="wmhc_cart_shipping"></<li>', $wmhc_cart_shipping);

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Font Size", "mini-cart-for-woocommerce").'</label></strong><input type="number" value="%s" id="wmhc_cart_side_shipping_font"></li>', $wmhc_cart_side_shipping_font);

?>
<li><strong class="whmc_ptc_tb"><label><?php echo esc_html('Icon','mini-cart-for-woocommerce') ?></label></strong>

    <select id="whmc_shopicon"  class="default">
     
     <option value="icon_pen">Icon 1</option>       
     <option value="icon_local_shipping">Icon 2</option>    

    <option value="icon_t-10">Icon 3</option>         
    <option value="icon_t-9">Icon 4</option>         
    <option value="icon_ship">Icon 5</option>              
    <option value="icon_rocket">Icon 6</option>         
     <option value="whmcNone">None</option>

    </select>
</li>

<?php
        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Disable this field", "mini-cart-for-woocommerce").':</label></strong><input type="checkbox" class="whmc_apple-switch" id="wmhc_cart_shipping_remove" checked></li></ul>');


    }

    public function wmhcside_btm_shipping()
    {

        $wmhcside_btm_shipping = esc_html__('Tax','mini-cart-for-woocommerce');

        $wmhc_cart_shipping_font = '14';

        $wmhc_shipping_Color = '0';

        printf('<ul class="whmc_ptc_wrape_tb"><li><strong class="whmc_ptc_tb"><label>'.esc_html__("Title", "mini-cart-for-woocommerce").': </label></strong>
        <input type="text" value="%s"  placeholder="Tax" id="wmhcside_btm_shipping"></li>', $wmhcside_btm_shipping);

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Text Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" value="%s"  class="side_bottom_color" id="wmhc_shipping_Color"></<li>', $wmhc_shipping_Color);

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Font size", "mini-cart-for-woocommerce").'</label></strong><input type="number" value="%s" id="wmhc_cart_shipping_font"></li>', $wmhc_cart_shipping_font);

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Disable this field", "mini-cart-for-woocommerce").':</label></strong><input type="checkbox" name="whmc_sidepanel[wmhc_cart_tax_remove]" class="whmc_apple-switch" id="wmhc_cart_tax_remove" checked></li></ul>');
    }

    public function wmhcside_btm_discount()
    {

        $sidepanels = get_option('whmc_sidepanel');

        $wmhcside_btm_discount = isset($sidepanels['wmhcside_btm_discount']) ? $sidepanels['wmhcside_btm_discount'] :  esc_html__('Discount','mini-cart-for-woocommerce');

        $wmhc_cart_discount_font = isset($sidepanels['wmhc_cart_discount_font']) ? $sidepanels['wmhc_cart_discount_font'] : '14';

        $wmhc_discount_color = isset($sidepanels['wmhc_discount_color']) ? $sidepanels['wmhc_discount_color'] : '0';

        printf('<ul class="whmc_ptc_wrape_tb"><li><strong class="whmc_ptc_tb"><label>'.esc_html__("Title", "mini-cart-for-woocommerce").'</label></strong>
        <input type="text" name="whmc_sidepanel[wmhcside_btm_discount]" value="%s"  placeholder="Discount" id="wmhcside_btm_discount"></li>', $wmhcside_btm_discount);

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Text Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[wmhc_discount_color]" value="%s"  class="side_bottom_color" id="wmhc_discount_color"></<li>', $wmhc_discount_color);

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Font Size", "mini-cart-for-woocommerce").'</label></strong><input type="number" name="whmc_sidepanel[wmhc_cart_discount_font]" value="%s" id="wmhc_cart_discount_font"></li>', $wmhc_cart_discount_font);

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Add the minus icon:", "mini-cart-for-woocommerce").':</label></strong><input type="checkbox" name="whmc_sidepanel[wmhcdicminusicon]" class="whmc_apple-switch" value="wmhcdicminusicon" %s id="wmhcdicminusicon"></li></ul>', (isset($sidepanels['wmhcdicminusicon']) && $sidepanels['wmhcdicminusicon'] == 'wmhcdicminusicon') ? 'checked' : '');
    }

    public function wmhcside_btm_total()
    {

        $sidepanels = get_option('whmc_sidepanel');

        $wmhcside_btm_total = isset($sidepanels['wmhcside_btm_total']) ? $sidepanels['wmhcside_btm_total'] : esc_html__('Total','mini-cart-for-woocommerce');

        $wmhc_cart_total_font = isset($sidepanels['wmhc_cart_total_font']) ? $sidepanels['wmhc_cart_total_font'] : '14';

        $wmhc_total_color = isset($sidepanels['wmhc_total_color']) ? $sidepanels['wmhc_total_color'] : '';
        $wmhc_cartttlborclr = isset($sidepanels['wmhc_cartttlborclr']) ? $sidepanels['wmhc_cartttlborclr'] : '';


        $wmhc_cartttlborder = isset($sidepanels['wmhc_cartttlborder']) ? $sidepanels['wmhc_cartttlborder'] : 'dashed';

        printf('<ul class="whmc_ptc_wrape_tb"><li><strong class="whmc_ptc_tb"><label>'.esc_html__("Title", "mini-cart-for-woocommerce").' </label></strong><input type="text" name="whmc_sidepanel[wmhcside_btm_total]" value="%s"  placeholder="'.esc_html__("Total ", "mini-cart-for-woocommerce").'" id="wmhcside_btm_total"></li>', $wmhcside_btm_total);

        printf('<li><strong class="whmc_ptc_tb"><label >'.esc_html__("Text Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[wmhc_total_color]" value="%s"  class="side_bottom_color" id="wmhc_total_color" ></<li>', $wmhc_total_color);

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Font Size", "mini-cart-for-woocommerce").'</label></strong><input type="number" name="whmc_sidepanel[wmhc_cart_total_font]" value="%s" id="wmhc_cart_total_font"></li>', $wmhc_cart_total_font);

?>
<li><strong class="whmc_ptc_tb"><label ><?php echo esc_html__("Border", "mini-cart-for-woocommerce");?></label></strong>
<select name="whmc_sidepanel[wmhc_cartttlborder]" id="wmhc_cartttlborder">
    
    <option value="solid " <?php
        echo esc_attr($wmhc_cartttlborder) == "solid " ? 'selected' : '';?>><?php echo esc_html__('Solid','mini-cart-for-woocommerce') ?></option>    
    <option value="dotted " <?php
        echo esc_attr($wmhc_cartttlborder) == "dotted " ? 'selected' : '';?>><?php echo esc_html__('Dotted','mini-cart-for-woocommerce') ?></option>    
    <option value="dashed " <?php
        echo esc_attr($wmhc_cartttlborder) == "dashed " ? 'selected' : '';?>><?php echo esc_html__('Dashed ','mini-cart-for-woocommerce') ?></option>        
    <option value="none " <?php
        echo esc_attr($wmhc_cartttlborder) == "none " ? 'selected' : '';?>><?php echo esc_html__('None ','mini-cart-for-woocommerce') ?></option>



    </select></li>

  <?php  
        printf('<li><strong class="whmc_ptc_tb"><label >'.esc_html__("Border Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[wmhc_cartttlborclr]" value="%s"  class="side_bottom_color" id="wmhc_cartttlborclr"></<li>', $wmhc_cartttlborclr);

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Disable this field", "mini-cart-for-woocommerce").':</label></strong><input type="checkbox" name="whmc_sidepanel[wmhc_cart_total_remove]" class="whmc_apple-switch" id="wmhc_cart_total_remove" value="wmhc_cart_total_remove" %s></li></ul>',(isset($sidepanels['wmhc_cart_total_remove']) && $sidepanels['wmhc_cart_total_remove'] == 'wmhc_cart_total_remove') ? 'checked' : '');


}

    public function wmhc_cart_side_button_text_color()
    {

        $sidepanels = get_option('whmc_sidepanel');
        $sidepanels_rang_value = isset($sidepanels['wmhc_cart_side_button_text_color']) ? $sidepanels['wmhc_cart_side_button_text_color'] : '#fff';

        $wmhc_cart_side_button_color = isset($sidepanels['wmhc_cart_side_button_color']) ? $sidepanels['wmhc_cart_side_button_color'] :'#1e73be';

        $sidepanels_chekout_text_value = isset($sidepanels['wmhc_chekout_text_value']) ? $sidepanels['wmhc_chekout_text_value'] : esc_html__('Checkout','mini-cart-for-woocommerce');

        $whmc_cartborderrdis = isset($sidepanels['whmc_cartborderrdis']) ? $sidepanels['whmc_cartborderrdis'] : '6';
        $whmc_cartborderclr = isset($sidepanels['whmc_cartborderclr']) ? $sidepanels['whmc_cartborderclr'] : '';

        printf('<ul class="whmc_ptc_wrape_tb"><li><strong class="whmc_ptc_tb"><label >'.esc_html__("Checkout Button Text", "mini-cart-for-woocommerce").'</label></strong>
        <input type="text" name="whmc_sidepanel[wmhc_chekout_text_value]" value="%s"  placeholder="Checkout" id="wmhc_chekout_text_value"></li>', $sidepanels_chekout_text_value);

        printf('<li><strong class="whmc_ptc_tb"><label> '.esc_html__("Remove Cart Icon", "mini-cart-for-woocommerce").':</label></strong><input type="checkbox" name="whmc_sidepanel[wmhc_chkcaricon]" id="wmhc_chkcaricon" class="whmc_apple-switch"  value="wmhc_chkcaricon" %s></li>', (isset($sidepanels['wmhc_chkcaricon']) && $sidepanels['wmhc_chkcaricon'] == 'wmhc_chkcaricon') ? 'checked' : '');
        printf('<li><strong class="whmc_ptc_tb"><label> '.esc_html__("Remove Cart Amount", "mini-cart-for-woocommerce").':</label></strong><input type="checkbox" name="whmc_sidepanel[wmhc_chkbtnamot]" id="wmhc_chkbtnamot" class="whmc_apple-switch"  value="wmhc_chkbtnamot" %s></li>', (isset($sidepanels['wmhc_chkbtnamot']) && $sidepanels['wmhc_chkbtnamot'] == 'wmhc_chkbtnamot') ? 'checked' : '');


        printf('<li><strong class="whmc_ptc_tb"><label for="wmhc__text_size">'.esc_html__("Background", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[wmhc_cart_side_button_color]" value="%s"  class="side_button_color" id="wmhc_cart_side_button_color"></li>', $wmhc_cart_side_button_color);

        printf('<li><strong class="whmc_ptc_tb"><label for="wmhc__text_size">'.esc_html__("Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[wmhc_cart_side_button_text_color]" value="%s"  class="side_bottom_text_color" id="wmhc_cart_side_button_text_color"></li>', $sidepanels_rang_value);


        printf('<li><strong class="whmc_ptc_tb"><label for="wmhc__text_size">'.esc_html__("Border Radius (px)", "mini-cart-for-woocommerce").'</label></strong><input type="range" name="whmc_sidepanel[whmc_cartborderrdis]" min="1" max="50" value="%s" oninput="outrupbtsd.value = this.value" id="whmc_cartborderrdis"><output id="outrupbtsd">%s<output></li>',$whmc_cartborderrdis, $whmc_cartborderrdis);

        printf('<li><strong class="whmc_ptc_tb"><label for="wmhc__text_size">'.esc_html__("Border Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[whmc_cartborderclr]" value="%s"  class="side_bottom_text_color" id="whmc_cartborderclr"></li></ul>', $whmc_cartborderclr);
    }

    public function whmc_svaevluft()
    {

        $sidepanels = get_option('whmc_sidepanel');
        $whmc_svaevluft = isset($sidepanels['whmc_svaevluft']) ? $sidepanels['whmc_svaevluft'] : '13';
        printf('<input type="range" name="whmc_sidepanel[whmc_svaevluft]" min="1" max="50" value="%s" oninput="outrufnt.value = this.value" id="whmc_svaevluft"><output id="outrufnt">%s<output>',$whmc_svaevluft, $whmc_svaevluft);

    }
    public function wmhc_cart_side_text_color()
    {

        $sidepanels = get_option('whmc_sidepanel');
        $sidepanels_rang_value = isset($sidepanels['wmhc_cart_side_text_color']) ? $sidepanels['wmhc_cart_side_text_color'] : '#3a3a3a';

        printf('<input type="text" name="whmc_sidepanel[wmhc_cart_side_text_color]" value="%s"  class="side_text_color" id="wmhc_cart_side_text_color">', $sidepanels_rang_value);


    }


    public function wmhc_cart_side_text_size()
    {

        $sidepanels = get_option('whmc_sidepanel');
        $wmhc_cart_side_text_size = isset($sidepanels['wmhc_cart_side_text_size']) ? $sidepanels['wmhc_cart_side_text_size'] : '16';

        printf('<input type="number" name="whmc_sidepanel[wmhc_cart_side_text_size]" value="%s" id="wmhc_cart_side_text_size">', $wmhc_cart_side_text_size);

    }



    public function wmhc_cart_side_price_color()
    {

        $sidepanels = get_option('whmc_sidepanel');
        $wmhc_cart_side_price_color = isset($sidepanels['wmhc_cart_side_price_color']) ? $sidepanels['wmhc_cart_side_price_color'] : '#3a3a3a';

        printf('<input type="text" name="whmc_sidepanel[wmhc_cart_side_price_color]" value="%s"  class="side_text_color" id="wmhc_cart_side_price_color">', $wmhc_cart_side_price_color);


    }


    public function wmhc_cart_side_price_size()
    {

        $sidepanels = get_option('whmc_sidepanel');
        $wmhc_cart_side_price_size = isset($sidepanels['wmhc_cart_side_price_size']) ? $sidepanels['wmhc_cart_side_price_size'] : '15';


        printf('<input type="number" name="whmc_sidepanel[wmhc_cart_side_price_size]" value="%s"  id="wmhc_cart_side_price_size">', $wmhc_cart_side_price_size);

    }


    public function wmhc_cart_side_text_change()
    {

        $sidepanels = get_option('whmc_sidepanel');


        $whmc_keepshop_text_value = isset($sidepanels['whmc_keepshop_text_value']) ? $sidepanels['whmc_keepshop_text_value'] : 'Keep Shopping';    
        $whmclinkbehavior = isset($sidepanels['whmclinkbehavior']) ? $sidepanels['whmclinkbehavior'] : 'close';


        printf('<ul class="whmc_ptc_wrape_tb" ><li><strong class="whmc_ptc_tb"><label>'.esc_html__("Remove Keep Shopping", "mini-cart-for-woocommerce").'</label></strong><input type="checkbox" name="whmc_sidepanel[wmhc_cart_side_hide_kshop]" class="whmc_apple-switch" id="wmhc_cart_side_hide_kshop" value="wmhc_cart_side_hide_kshop" %s></li>', (isset($sidepanels['wmhc_cart_side_hide_kshop']) && $sidepanels['wmhc_cart_side_hide_kshop'] == 'wmhc_cart_side_hide_kshop') ? 'checked' : '');
        printf('<li><strong class="whmc_ptc_tb"><label >'.esc_html__("Button Label", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[whmc_keepshop_text_value]" value="%s"  placeholder="Keep Shopping" id="whmc_keepshop_text_value"></li>', $whmc_keepshop_text_value);

        ?><li><strong class="whmc_ptc_tb"><label ><?php echo esc_html__("Link behavior", "mini-cart-for-woocommerce")?></label></strong>
<select name="whmc_sidepanel[whmclinkbehavior]" id="whmclinkbehavior">
    
    <option value="close" <?php
        echo esc_attr($whmclinkbehavior) == "close" ? 'selected' : '';?>><?php echo esc_html__('Close Sidebar','mini-cart-for-woocommerce') ?></option>    
    <option value="shoplink" <?php
        echo esc_attr($whmclinkbehavior) == "shoplink " ? 'selected' : '';?>><?php echo esc_html__('Shop link','mini-cart-for-woocommerce') ?></option>    
    </select></li></ul>
    <?php }


    public function wmhc_cart_emptycart()
    {

        $sidepanels = get_option('whmc_sidepanel');

        $sidepanels_no_cart_text_value = isset($sidepanels['wmhc_no_cart_text_value']) ? $sidepanels['wmhc_no_cart_text_value'] : esc_html__('Cart is empty.','mini-cart-for-woocommerce');

        $whmcfillcart = isset($sidepanels['whmcfillcart']) ? $sidepanels['whmcfillcart'] : esc_html__('Fill your cart with amazing items','mini-cart-for-woocommerce');
        $whmcemptyshopbrn = isset($sidepanels['whmcemptyshopbrn']) ? $sidepanels['whmcemptyshopbrn'] : esc_html__('Shop Now');
        $whmcemptyspbtclr = isset($sidepanels['whmcemptyspbtclr']) ? $sidepanels['whmcemptyspbtclr'] :'#fff';
        $whmcemptyspbtbg = isset($sidepanels['whmcemptyspbtbg']) ? $sidepanels['whmcemptyspbtbg'] :'#1e73be';
        $emptyicclr = isset($sidepanels['emptyicclr']) ? $sidepanels['emptyicclr'] :'#666666';
        $whmcemptyspbris = '6';
        $wmhupimage = MCFWC_LIGHT_URL.'assets/admin/img/logo.png';
        $choosetyps = 'none';


     $emptyicons = isset($options['emptyicons']) ? $options['emptyicons'] : 'fcp_icon_3'; ?>
   <ul class="whmc_ptc_wrape_tb" >
    <li ><strong class="whmc_ptc_tb" style="color:#c7463d"><label><?php echo esc_html__("Choose Media (Pro)", "mini-cart-for-woocommerce"); ?>:</label></strong>
    <select id="choosetyps">
    <option value="icon">Icon</option>  
    <option value="image">Image</option>  
    <option value="none" selected>None</option>
</select>
    </li>

    <li class="choosetypsiocn"><strong class="whmc_ptc_tb"  style="color:#c7463d"><label><?php echo esc_html__("Icon (Pro)", "mini-cart-for-woocommerce"); ?>:</label></strong>

    <select id="emptyicons"  class="default">
    <option value="fcp_icon_1">Icon 1</option>    
    <option value="fcp_icon_2">Icon 2</option>    
    <option value="fcp_icon_3">Icon 3</option>    
    <option value="fcp_icon_4">Icon 4</option>    
    <option value="fcp_icon_5">Icon 5</option>    
    <option value="fcp_icon_6">Icon 6</option>    
    <option value="fcp_icon_7">Icon 7</option>    
    <option value="fcp_icon_8">Icon 8</option>
    <option value="fcp_icon_11" >Icon 9</option>   
    <option value="icon_45">Icon 10</option>  
    <option value="icon_38">Icon 11</option>
    <option value="icon_39">Icon 12</option>
    <option value="icon_40">Icon 13</option>
    <option value="icon_41">Icon 14</option>
    <option value="fcp_icon_9">Icon 15</option> 
    <option value="fcp_icon_10">Icon 16</option>  
    <option value="fcp_icon_12">Icon 17</option>    
    <option value="fcp_icon_13">Icon 18</option>    
    <option value="fcp_icon_14">Icon 19</option>    
    <option value="fcp_icon_15">Icon 20</option>    
    <option value="fcp_icon_16">Icon 21</option>    
    <option value="fcp_icon_17">Icon 22</option>    
    <option value="fcp_icon_18">>Icon 23</option>    
    <option value="fcp_icon_19">Icon 24</option>
    <option value="fcp_icon_20">Icon 25</option>
    <option value="icon_19">Icon 26</option>
    <option value="icon_20">Icon 27</option>        
    <option value="icon_21">Icon 28</option>
    <option value="icon_254">Icon 29</option>        
    <option value="icon_25">Icon 30</option>  
    <option value="icon_26">Icon 31</option>        
    <option value="icon_27">Icon 32</option>        
    <option value="icon_28">Icon 33</option>        
    <option value="icon_29">Icon 34</option>    
    <option value="icon_30">Icon 35</option>
    <option value="icon_31">Icon 36</option>  
    <option value="icon_34">Icon 37</option>
    <option value="icon_35">Icon 38</option>
    <option value="icon_37">Icon 39</option>
    <option value="icon_43">Icon 40</option>
    <option value="icon_46">Icon 41</option> 
    <option value="icon_44">Icon 42</option> 
  </select></li>
        
            <?php
        printf('<li  class="choosetypsimage"><strong class="whmc_ptc_tb"  style="color:#c7463d"><label>'.esc_html__("Upload Image (Pro)", "mini-cart-for-woocommerce").':</label></strong><input class="master_widefat" id="wmhupimage" type="text" value="%s"/><input id="wmhupimagesd" type="button" class="button button-primary" value="Insert Image" /></li>',$wmhupimage);

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Empty Title", "mini-cart-for-woocommerce").':</label></strong><textarea rows="3" cols="40" name="whmc_sidepanel[wmhc_no_cart_text_value]" id="wmhc_no_cart_text_value" placeholder="Cart is empty...">%s</textarea></li>', $sidepanels_no_cart_text_value);
        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Empty Subtitle", "mini-cart-for-woocommerce").':</label></strong><textarea rows="3" cols="40" name="whmc_sidepanel[whmcfillcart]" id="whmcfillcart" placeholder="Fill your cart with amazing items">%s</textarea></li>', $whmcfillcart);

        printf('<li><strong class="whmc_ptc_tb"><label >'.esc_html__("Shop Button", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[whmcemptyshopbrn]" value="%s"  id="whmcemptyshopbrn" placeholder="Shop Now"></li>', $whmcemptyshopbrn);

        printf('<li class="cgiseiconre"><strong class="whmc_ptc_tb"><label >'.esc_html__("Icon Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[emptyicclr]" value="%s" id="emptyicclr" class="side_text_color" ></li>', $emptyicclr);

        printf('<li><strong class="whmc_ptc_tb"><label >'.esc_html__("Button Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[whmcemptyspbtclr]" value="%s" id="whmcemptyspbtclr" class="side_text_color" ></li>', $whmcemptyspbtclr);

        printf('<li><strong class="whmc_ptc_tb"><label >'.esc_html__("Button Background", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[whmcemptyspbtbg]" value="%s" id="whmcemptyspbtbg"  class="side_text_color" ></li>', $whmcemptyspbtbg);

        printf('<li><strong class="whmc_ptc_tb"><label for="wmhc__text_size">'.esc_html__("Border Radius (px)", "mini-cart-for-woocommerce").'</label></strong><input type="range" name="whmc_sidepanel[whmcemptyspbris]" min="1" max="50" value="%s"  id="whmcemptyspbris" oninput="bris.value = this.value"><output id="bris">%s<output></li></ul>',$whmcemptyspbris, $whmcemptyspbris);

    }
    public function wmhc_cart_side_autup()
    {

        $sidepanels = get_option('whmc_sidepanel');

        printf('<input type="checkbox" name="whmc_sidepanel[wmhc_cart_side_autup]" class="whmc_apple-switch"  value="wmhc_cart_side_autup" %s><p class="whmc_description">'.esc_html__("The sidebar opens automatically after carting a product, click to close it", "mini-cart-for-woocommerce").'</p>', (isset($sidepanels['wmhc_cart_side_autup']) && $sidepanels['wmhc_cart_side_autup'] === 'wmhc_cart_side_autup') ? 'checked' : '');

    }public function wmhc_remobetippar()
    {

        $sidepanels = get_option('whmc_sidepanel');

        printf('<input type="checkbox" name="whmc_sidepanel[wmhc_remobetippar]" class="whmc_apple-switch" id="wmhc_remobetippar"  value="wmhc_remobetippar" %s><p class="whmc_description">'.esc_html__("click to remove top part", "mini-cart-for-woocommerce").'</p>', (isset($sidepanels['wmhc_remobetippar']) && $sidepanels['wmhc_remobetippar'] === 'wmhc_remobetippar') ? 'checked' : '');

    }  public function wmhcside_topcartcnt()
    {

        $sidepanels = get_option('whmc_sidepanel');

        printf('<input type="checkbox" name="whmc_sidepanel[wmhcside_topcartcnt]" class="whmc_apple-switch" id="wmhcside_topcartcnt"  value="wmhcside_topcartcnt" %s><p class="whmc_description">'.esc_html__("click to remove Cart Count", "mini-cart-for-woocommerce").'</p>', (isset($sidepanels['wmhcside_topcartcnt']) && $sidepanels['wmhcside_topcartcnt'] === 'wmhcside_topcartcnt') ? 'checked' : '');

    }    

    public function wmhc_wrapper_bg()
    {

        $sidepanels = get_option('whmc_sidepanel');


        $wmhc_cart_side_top_background = isset($sidepanels['wmhc_cart_side_top_background']) ? $sidepanels['wmhc_cart_side_top_background'] : '#fff';
        
        
        printf('<input type="text" name="whmc_sidepanel[wmhc_cart_side_top_background]" value="%s"  class="side_bottom_color" id="wmhc_cart_side_top_background">', $wmhc_cart_side_top_background);

    }   

    public function wmhc_locar()
    {

        $sidepanels = get_option('whmc_sidepanel');


        $loadclr = isset($sidepanels['loadclr']) ? $sidepanels['loadclr'] : '#000';
        
        
        printf('<input type="text" name="whmc_sidepanel[loadclr]" value="%s"  class="side_bottom_color" id="loadclr">', $loadclr);

    }
    public function wmhc_cart_side_position()
    {

        $sidepanels = get_option('whmc_sidepanel');

        printf('<input type="checkbox" name="whmc_sidepanel[wmhc_cart_side_position]" class="whmc_apple-switch"  value="wmhc_cart_side_position" %s><p class="whmc_description">'.esc_html__("Click to change sidebar from left to right,Default:Left", "mini-cart-for-woocommerce").'</p>', (isset($sidepanels['wmhc_cart_side_position']) && $sidepanels['wmhc_cart_side_position'] === 'wmhc_cart_side_position') ? 'checked' : '');

    }

    public function whmc_qrtborder()
    {         $options = get_option('whmc_sidepanel');
        $whmc_qrtborder = isset($options['whmc_qrtborder']) ? $options['whmc_qrtborder'] : '';
        printf('<input type="text" name="whmc_sidepanel[whmc_qrtborder]" value="%s"  class="side_text_color" id="whmc_qrtborder">', $whmc_qrtborder);
}    public function whmc_qrtborderradis()
    {         $options = get_option('whmc_sidepanel');
        $whmc_qrtborderradis = isset($options['whmc_qrtborderradis']) ? $options['whmc_qrtborderradis'] : '6';
        printf('<input type="range" name="whmc_sidepanel[whmc_qrtborderradis]" min="0" max="50" value="%s" oninput="outrup.value = this.value" id="whmc_qrtborderradis"><output id="outrup">%s<output>',$whmc_qrtborderradis, $whmc_qrtborderradis);
}
    public function whmc_side_priceqty()

    {   
        $options = get_option('whmc_sidepanel');
        $whmcpricesty = isset($options['whmcpricesty']) ? $options['whmcpricesty'] : 'qty';

        ?>
 <select name="whmc_sidepanel[whmcpricesty]" id="whmcpricesty">
    
    <option value="price" <?php
        echo esc_attr($whmcpricesty) == "price" ? 'selected' : '';?>><?php echo esc_html__('Product Price','mini-cart-for-woocommerce') ?></option>    
    <option value="qty" <?php
        echo esc_attr($whmcpricesty) == "qty" ? 'selected' : '';?>><?php echo esc_html__('Qty & price','mini-cart-for-woocommerce') ?></option>    
    <option value="subtotal" <?php
        echo esc_attr($whmcpricesty) == "subtotal" ? 'selected' : '';?>><?php echo esc_html__('Product subtotal','mini-cart-for-woocommerce') ?></option>
    </select>
<?php
    }

    public function whmc_displaqtry()

    { ?>
  <select id="whmc_displaqtry">
    
    <option value="yes"><?php echo esc_html__('Yes','mini-cart-for-woocommerce') ?></option>    
    <option value="no" selected><?php echo esc_html__('No','mini-cart-for-woocommerce') ?></option>       
    </select>
<?php
}


public function whmc_side_svaevlue()

    { ?>
  <select id="whmcsavvles">
    
    <option value="percentage"><?php echo esc_html__('Percentage','mini-cart-for-woocommerce') ?></option>    
    <option value="values"><?php echo esc_html__('Value','mini-cart-for-woocommerce') ?></option>    
    <option value="none" selected><?php echo esc_html__('None','mini-cart-for-woocommerce') ?></option>    
    </select>
<?php

        printf('<input type="text" value="%s" id="whmcvaluesfggg" placeholder="Save!">',esc_html__('Save','mini-cart-for-woocommerce'));



    }

public function whmcvaluespos(){

        printf('<input type="checkbox" id="whmcvaluespos" name="whmc_sidepanel[whmcvaluespos]" class="whmc_apple-switch"  value="whmcvaluespos" %s>', (isset($sidepanels['whmcvaluespos']) && $sidepanels['whmcvaluespos'] === 'whmcvaluespos') ? 'checked' : '');
    } 

    public function whmc_side_img_brious()
    {

        $options = get_option('whmc_sidepanel');
        $whmc_side_img_brious = isset($options['whmc_side_img_brious']) ? $options['whmc_side_img_brious'] : '10';
        printf('<input type="range" name="whmc_sidepanel[whmc_side_img_brious]" min="1" max="50" value="%s" oninput="outrups.value = this.value" id="whmc_side_img_brious"><output id="outrups">%s<output>',$whmc_side_img_brious, $whmc_side_img_brious);


    }

    /**
     * admin form field validation
     */

    public function whmc_sidepanel_page_sanitized($input)
    {
        $sanitary_values = array();

        if (isset($input['wmhc_cart_side_position']))
        {
            $sanitary_values['wmhc_cart_side_position'] = $input['wmhc_cart_side_position'];
        }
        if (isset($input['wmhc_cart_side_autup']))
        {
            $sanitary_values['wmhc_cart_side_autup'] = $input['wmhc_cart_side_autup'];
        }

        if (isset($input['wmhc_cart_side_text_color']))
        {
            $sanitary_values['wmhc_cart_side_text_color'] = $input['wmhc_cart_side_text_color'];
        }

        if (isset($input['wmhc_cart_side_button_text_color']))
        {
            $sanitary_values['wmhc_cart_side_button_text_color'] = $input['wmhc_cart_side_button_text_color'];
        }

        if (isset($input['wmhc_no_cart_text_value']))
        {
            $sanitary_values['wmhc_no_cart_text_value'] = sanitize_text_field($input['wmhc_no_cart_text_value']);
        }

        if (isset($input['wmhc_chekout_text_value']))
        {
            $sanitary_values['wmhc_chekout_text_value'] = sanitize_text_field($input['wmhc_chekout_text_value']);
        }

        if (isset($input['wmhc_subtototal_value']))
        {
            $sanitary_values['wmhc_subtototal_value'] = sanitize_text_field($input['wmhc_subtototal_value']);
        }

        if (isset($input['wmhc_cart_side_button_color']))
        {
            $sanitary_values['wmhc_cart_side_button_color'] = $input['wmhc_cart_side_button_color'];
        }


        if (isset($input['wmhc_cart_side_top_background']))
        {
            $sanitary_values['wmhc_cart_side_top_background'] = $input['wmhc_cart_side_top_background'];
        }

        if (isset($input['whmc_side_img_brious']))
        {
            $sanitary_values['whmc_side_img_brious'] = $input['whmc_side_img_brious'];
        }
        if (isset($input['wmhc_cart_side_text_size']))
        {
            $sanitary_values['wmhc_cart_side_text_size'] = $input['wmhc_cart_side_text_size'];
        }
        if (isset($input['wmhc_cart_side_price_size']))
        {
            $sanitary_values['wmhc_cart_side_price_size'] = $input['wmhc_cart_side_price_size'];
        }
        if (isset($input['wmhc_cart_side_price_color']))
        {
            $sanitary_values['wmhc_cart_side_price_color'] = $input['wmhc_cart_side_price_color'];
        }
        if (isset($input['wmhc_cart_side_border_btm']))
        {
            $sanitary_values['wmhc_cart_side_border_btm'] = $input['wmhc_cart_side_border_btm'];
        }
        if (isset($input['wmhc_cart_side_subtoral_font']))
        {
            $sanitary_values['wmhc_cart_side_subtoral_font'] = $input['wmhc_cart_side_subtoral_font'];
        }
        if (isset($input['wmhc_cart_side_subtotal']))
        {
            $sanitary_values['wmhc_cart_side_subtotal'] = $input['wmhc_cart_side_subtotal'];
        }
        if (isset($input['wmhc_cart_side_hide_kshop']))
        {
            $sanitary_values['wmhc_cart_side_hide_kshop'] = $input['wmhc_cart_side_hide_kshop'];
        }
        if (isset($input['whmc_keepshop_text_value']))
        {
            $sanitary_values['whmc_keepshop_text_value'] = $input['whmc_keepshop_text_value'];
        }

        if (isset($input['wmhcside_toppart_txtcu']))
        {
            $sanitary_values['wmhcside_toppart_txtcu'] = $input['wmhcside_toppart_txtcu'];
        }

        if (isset($input['wmhcside_toppart_txt']))
        {
            $sanitary_values['wmhcside_toppart_txt'] = $input['wmhcside_toppart_txt'];
        }

        if (isset($input['wmhcside_toppart_icon']))
        {
            $sanitary_values['wmhcside_toppart_icon'] = $input['wmhcside_toppart_icon'];
        }

        if (isset($input['wmhcside_toppart_bg']))
        {
            $sanitary_values['wmhcside_toppart_bg'] = $input['wmhcside_toppart_bg'];
        }

        if (isset($input['wmhcside_btm_shipping']))
        {
            $sanitary_values['wmhcside_btm_shipping'] = $input['wmhcside_btm_shipping'];
        }
        if (isset($input['wmhc_cart_shipping_font']))
        {
            $sanitary_values['wmhc_cart_shipping_font'] = $input['wmhc_cart_shipping_font'];
        }
        if (isset($input['wmhc_shipping_Color']))
        {
            $sanitary_values['wmhc_shipping_Color'] = $input['wmhc_shipping_Color'];
        }
        if (isset($input['whmc_coupon_icon']))
        {
            $sanitary_values['whmc_coupon_icon'] = $input['whmc_coupon_icon'];
        }
        if (isset($input['whmc_cmoiconclr']))
        {
            $sanitary_values['whmc_cmoiconclr'] = $input['whmc_cmoiconclr'];
        }
        if (isset($input['wmhc_cart_shipping']))
        {
            $sanitary_values['wmhc_cart_shipping'] = $input['wmhc_cart_shipping'];
        }
        if (isset($input['wmhc_cart_side_shipping_font']))
        {
            $sanitary_values['wmhc_cart_side_shipping_font'] = $input['wmhc_cart_side_shipping_font'];
        }
        if (isset($input['wmhc_shipping_value']))
        {
            $sanitary_values['wmhc_shipping_value'] = $input['wmhc_shipping_value'];
        }

        if (isset($input['wmhcside_btm_discount']))
        {
            $sanitary_values['wmhcside_btm_discount'] = $input['wmhcside_btm_discount'];
        }

        if (isset($input['wmhc_cart_discount_font']))
        {
            $sanitary_values['wmhc_cart_discount_font'] = $input['wmhc_cart_discount_font'];
        }

        if (isset($input['wmhc_discount_color']))
        {
            $sanitary_values['wmhc_discount_color'] = $input['wmhc_discount_color'];
        }

        if (isset($input['wmhc_total_color']))
        {
            $sanitary_values['wmhc_total_color'] = $input['wmhc_total_color'];
        }

        if (isset($input['wmhc_cart_total_font']))
        {
            $sanitary_values['wmhc_cart_total_font'] = $input['wmhc_cart_total_font'];
        }

        if (isset($input['wmhcside_btm_total']))
        {
            $sanitary_values['wmhcside_btm_total'] = $input['wmhcside_btm_total'];
        }
        if (isset($input['wmhc_cart_subtotal_remove']))
        {
            $sanitary_values['wmhc_cart_subtotal_remove'] = $input['wmhc_cart_subtotal_remove'];
        }
        if (isset($input['wmhc_cart_shipping_remove']))
        {
            $sanitary_values['wmhc_cart_shipping_remove'] = $input['wmhc_cart_shipping_remove'];
        }
        if (isset($input['wmhc_cart_tax_remove']))
        {
            $sanitary_values['wmhc_cart_tax_remove'] = $input['wmhc_cart_tax_remove'];
        }
        if (isset($input['wmhc_applycoupon_value']))
        {
            $sanitary_values['wmhc_applycoupon_value'] = $input['wmhc_applycoupon_value'];
        }
        if (isset($input['wmhc_cart_coupon_remove']))
        {
            $sanitary_values['wmhc_cart_coupon_remove'] = $input['wmhc_cart_coupon_remove'];
        }
        if (isset($input['wmhc_hideall_my_coupon']))
        {
            $sanitary_values['wmhc_hideall_my_coupon'] = $input['wmhc_hideall_my_coupon'];
        }
        if (isset($input['wmhc_remobetippar']))
        {
            $sanitary_values['wmhc_remobetippar'] = $input['wmhc_remobetippar'];
        }
        if (isset($input['wmhcside_toppartycart']))
        {
            $sanitary_values['wmhcside_toppartycart'] = $input['wmhcside_toppartycart'];
        }
        if (isset($input['whmc_cartborderclr']))
        {
            $sanitary_values['whmc_cartborderclr'] = $input['whmc_cartborderclr'];
        }

        if (isset($input['whmc_cartborderrdis']))
        {
            $sanitary_values['whmc_cartborderrdis'] = $input['whmc_cartborderrdis'];
        }

        if (isset($input['wmhcside_topbtxbclr']))
        {
            $sanitary_values['wmhcside_topbtxbclr'] = $input['wmhcside_topbtxbclr'];
        }
        if (isset($input['wmhcside_toppartbbclr']))
        {
            $sanitary_values['wmhcside_toppartbbclr'] = $input['wmhcside_toppartbbclr'];
        }

        if (isset($input['wmhcside_topcartcnt']))
        {
            $sanitary_values['wmhcside_topcartcnt'] = $input['wmhcside_topcartcnt'];
        }
        if (isset($input['wmhcsidebarstyles']))
        {
            $sanitary_values['wmhcsidebarstyles'] = $input['wmhcsidebarstyles'];
        }
        if (isset($input['wmhcsidebaropstls']))
        {
            $sanitary_values['wmhcsidebaropstls'] = $input['wmhcsidebaropstls'];
        }

        if (isset($input['wmhcsidebarclstls']))
        {
            $sanitary_values['wmhcsidebarclstls'] = $input['wmhcsidebarclstls'];
        }
        if (isset($input['wmhc_cartttlborder']))
        {
            $sanitary_values['wmhc_cartttlborder'] = $input['wmhc_cartttlborder'];
        }
        if (isset($input['wmhc_cartttlborclr']))
        {
            $sanitary_values['wmhc_cartttlborclr'] = $input['wmhc_cartttlborclr'];
        }
        if (isset($input['wmhc_middleborder']))
        {
            $sanitary_values['wmhc_middleborder'] = $input['wmhc_middleborder'];
        }
        if (isset($input['wmhc_bottomborder']))
        {
            $sanitary_values['wmhc_bottomborder'] = $input['wmhc_bottomborder'];
        }
        if (isset($input['wmhc_bottmborderclr']))
        {
            $sanitary_values['wmhc_bottmborderclr'] = $input['wmhc_bottmborderclr'];
        }

        if (isset($input['wmhc_chkbtnamot']))
        {
            $sanitary_values['wmhc_chkbtnamot'] = $input['wmhc_chkbtnamot'];
        }
        if (isset($input['wmhc_chkcaricon']))
        {
            $sanitary_values['wmhc_chkcaricon'] = $input['wmhc_chkcaricon'];
        }
        if (isset($input['whmcfillcart']))
        {
            $sanitary_values['whmcfillcart'] = $input['whmcfillcart'];
        }
        if (isset($input['whmcemptyshopbrn']))
        {
            $sanitary_values['whmcemptyshopbrn'] = $input['whmcemptyshopbrn'];
        }
        
        if (isset($input['whmcemptyspbtclr']))
        {
            $sanitary_values['whmcemptyspbtclr'] = $input['whmcemptyspbtclr'];
        }
        if (isset($input['whmcemptyspbtbg']))
        {
            $sanitary_values['whmcemptyspbtbg'] = $input['whmcemptyspbtbg'];
        }
        if (isset($input['whmcemptyspbris']))
        {
            $sanitary_values['whmcemptyspbris'] = $input['whmcemptyspbris'];
        }
        if (isset($input['wmhc_cpnimgaehide']))
        {
            $sanitary_values['wmhc_cpnimgaehide'] = $input['wmhc_cpnimgaehide'];
        }
        if (isset($input['whmc_cmplacehlder']))
        {
            $sanitary_values['whmc_cmplacehlder'] = $input['whmc_cmplacehlder'];
        }
        if (isset($input['whmc_cmbrnabel']))
        {
            $sanitary_values['whmc_cmbrnabel'] = $input['whmc_cmbrnabel'];
        }
        if (isset($input['whmc_cmbtnbg']))
        {
            $sanitary_values['whmc_cmbtnbg'] = $input['whmc_cmbtnbg'];
        }
        if (isset($input['whmc_shipicon']))
        {
            $sanitary_values['whmc_shipicon'] = $input['whmc_shipicon'];
        }
        if (isset($input['whmc_cppbrius']))
        {
            $sanitary_values['whmc_cppbrius'] = $input['whmc_cppbrius'];
        }
        if (isset($input['wmhc_wrapperloader']))
        {
            $sanitary_values['wmhc_wrapperloader'] = $input['wmhc_wrapperloader'];
        }
        if (isset($input['loadclr']))
        {
            $sanitary_values['loadclr'] = $input['loadclr'];
        }
        if (isset($input['emptyicons']))
        {
            $sanitary_values['emptyicons'] = $input['emptyicons'];
        }
        if (isset($input['wmhupimage']))
        {
            $sanitary_values['wmhupimage'] = $input['wmhupimage'];
        }
        if (isset($input['emptyicclr']))
        {
            $sanitary_values['emptyicclr'] = $input['emptyicclr'];
        }
        if (isset($input['choosetyps']))
        {
            $sanitary_values['choosetyps'] = $input['choosetyps'];
        }
        if (isset($input['whmcvalues']))
        {
            $sanitary_values['whmcvalues'] = $input['whmcvalues'];
        }
        if (isset($input['whmcvaluespos']))
        {
            $sanitary_values['whmcvaluespos'] = $input['whmcvaluespos'];
        }
        if (isset($input['wmhcdicminusicon']))
        {
            $sanitary_values['wmhcdicminusicon'] = $input['wmhcdicminusicon'];
        }
        if (isset($input['whmc_svaevluft']))
        {
            $sanitary_values['whmc_svaevluft'] = $input['whmc_svaevluft'];
        }
        if (isset($input['whmc_svaecolor']))
        {
            $sanitary_values['whmc_svaecolor'] = $input['whmc_svaecolor'];
        }
        if (isset($input['whmclinkbehavior']))
        {
            $sanitary_values['whmclinkbehavior'] = $input['whmclinkbehavior'];
        }
        if (isset($input['whmcpricesty']))
        {
            $sanitary_values['whmcpricesty'] = $input['whmcpricesty'];
        }
        if (isset($input['wmhc_subcstxt']))
        {
            $sanitary_values['wmhc_subcstxt'] = $input['wmhc_subcstxt'];
        }
        if (isset($input['wmhc_cart_total_remove']))
        {
            $sanitary_values['wmhc_cart_total_remove'] = $input['wmhc_cart_total_remove'];
        }
        return $sanitary_values;
    }

}

if(class_exists('WHMC_Admin_Sidebar')){

    new WHMC_Admin_Sidebar();
}

