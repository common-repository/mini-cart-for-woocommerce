<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @since      2.0.4
 *
 * @package    mini-cart-for-woocommerce
 * @subpackage mini-cart-for-woocommerce/admin
 */

class WHMC_Admin_Light
{

    /**
     * The ID of this plugin.
     *
     * @since    2.0.4
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    2.0.4
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    2.0.4
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
        define('WHMC_PAGE_ID', 'whmc_menu');
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-whmc-admin-sidepanel.php';

        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-whmc-settings.php';

        $plugin_name = new WHMC_Admin_Sidebar();

        add_action('admin_enqueue_scripts', array(
            $this,
            'whmc_admin_theme_style'
        ));

        add_action('login_enqueue_scripts', array(
            $this,
            'whmc_admin_theme_style'
        ));
        add_action('admin_head', array(
            $this,
            'whmc_admicss'
        ));


    }

    public function whmc_admin_theme_style()
    {


    if ( sanitize_title(isset($_GET['page'])) && strpos((sanitize_title($_GET['page'])), WHMC_PAGE_ID) !== false) {

            echo '<style>.update-nag,.updated,.notice.notice-info{ display: none ; }.notice.notice-success.settings-error {display: block}</style>';
        }
    }
    /**
     * Register the stylesheets for the admin area.
     *
     * @since    2.0.4
     */
    public function enqueue_styles()
    {

    if ((isset($_GET['page']) && strpos($_GET['page'], WHMC_PAGE_ID) !== false)){
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_style("fonticonpicker", MCFWC_LIGHT_URL . 'assets/admin/css/jquery.fonticonpicker.min.css', array() , $this->version, 'all');
        wp_enqueue_style($this->plugin_name, MCFWC_LIGHT_URL . 'assets/admin/css/admin.css', array() , $this->version, 'all');

    }
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    2.0.4
     */
    public function enqueue_scripts()
    {
    if ( sanitize_title(isset($_GET['page'])) && strpos((sanitize_title($_GET['page'])), WHMC_PAGE_ID) !== false) {

    wp_enqueue_script("jquery-fonticonpicker", MCFWC_LIGHT_URL . 'assets/admin/js/jquery.fonticonpicker.min.js', array('jquery',) ,  $this->version, true);
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_media();
        wp_enqueue_script('whmc-media-js', MCFWC_LIGHT_URL . 'assets/admin/js/media.js', array('jquery') , $this->version, true);

        wp_enqueue_media();
        wp_enqueue_script('media-upload');
        
        wp_enqueue_script($this->plugin_name, MCFWC_LIGHT_URL . 'assets/admin/js/whmc-admin.js', array('jquery') , $this->version, true);
        }
    }


    /**
     * Setting link.
     *
     * @since    2.0.4
     */

    public function plugin_settings_link($links)
    {
        if (!function_exists('run_mini-cart-for-woocommerce'))
        {
            return array_merge(array(
                '<a href="' . admin_url('admin.php?page=whmc_menu') . '">' . esc_html__('Settings', 'mini-cart-for-woocommerce') . '</a>',
                '<a class="qr_pro_link" href="https://sharabindu.com/plugins/woo-header-mini-cart/">' . esc_html__('Get Pro', 'mini-cart-for-woocommerce') . '</a>',
            ) , $links);
        }
        else
        {
            return $links;
        }
    }

    /**
     * Admin Notice
     *
     * @since    2.0.4
     */

    function woo_admin_notices()
    {

        if (!class_exists('WooCommerce'))
        {

            echo '<div class="error">
        <p>' . esc_html__('Mini Cart for WooCommerce Plugin is activated but not effective. It requires WooCommerce in order to work', 'mini-cart-for-woocommerce') . '</p>
        </div>';
        }

        if (class_exists('mini-cart-for-woocommerce')){

            echo '<div class="notice notice-warning is-dismissible">
        <p>' . esc_html__('Please deactivate "Mini Cart for WooCommerce" plugin Free Version, because you are using Pro version', 'mini-cart-for-woocommerce') . '</p>
        </div>';
        }

    }

    public function mcfwc__admin_menu()
    {
        if (!function_exists('run_mini-cart-for-woocommerce'))
        {

     add_menu_page(esc_html__('Mini Cart', 'mini-cart-for-woocommerce') , esc_html__('Mini Cart', 'mini-cart-for-woocommerce') , 'manage_options', 'whmc_menu', array(
         $this,
         'mcfwc___menu_func'
     ),'dashicons-cart',59 );

        }
    }

    /**
     * mini-cart-for-woocommerce Optin page admin form
     */
    public function mcfwc___menu_func()
    {
        $minicart_image_url = MCFWC_LIGHT_URL . 'assets/admin/img/';

        require MCFWC_LIGHT_PATH . 'admin/partials/whmc-data.php';
    ?>

<div class="whmc_tirmoof_admin_wrapper">
  <ul class="whmc__nav_bar">
     <li>
      <a href="https://wordpress.org/support/plugin/mini-cart-for-woocommerce/" target="_blank"> <?php echo esc_html__('Support', 'mini-cart-for-woocommerce') ?> </a>
    </li>   
    <li>
      <a href="https://sharabindu.com/plugins/woo-header-mini-cart/" target="_blank"> <?php echo esc_html__('Get Pro', 'mini-cart-for-woocommerce') ?> </a>
    </li>

    <li>
      <a href="https://woominicart.dipashi.com/wp-admin/admin.php?page=whmc_menu" target="_blank"> <?php echo esc_html__('Admin Demo(Pro)', 'mini-cart-for-woocommerce') ?> </a>
    </li>
    <li>
      <a href="https://woominicart.sharabindu.com/" target="_blank"> <?php echo esc_html__('Frontend Demo(Pro)', 'mini-cart-for-woocommerce') ?> </a>
    </li>

    <li>
      <a href="https://woominicart.sharabindu.com/docs/introduction/" target="_blank"> <?php echo esc_html__('Docs', 'mini-cart-for-woocommerce') ?> </a>
    </li>

  </ul>
  <ul class="whmc_hdaer_cnt">
    <li>
      <img src=" <?php echo MCFWC_LIGHT_URL . 'assets/admin/img/mnin.png' ?>" alt="Logo">
    </li>
    <li class="whmc_fd_cnt">
      <h3> <?php echo esc_html__('Mini Cart for WooCommerce ', 'mini-cart-for-woocommerce')?> <sup> <?php echo  MCFWC_LIGHT_VERSION;?> </sup>
      </h3>
      <small> <?php echo esc_html__('Ajax Mini Cart Plugin for WooCommerce', 'mini-cart-for-woocommerce') ?> </small>
    </li>
  </ul>
</div>
<div class="whmcwraper">
                  
  <div class="tab-nav">
    <ul>
      <li class="active">
        <a href="#tab1"> <?php echo esc_html("Menu Cart Icon", "mini-cart-for-woocommerce") ?> </a>
      </li>
      <li>
        <a href="#tab2"> <?php echo esc_html("Footer Cart Icon", "mini-cart-for-woocommerce") ?> </a>
      </li>
      <li>
        <a href="#tab3"> <?php echo esc_html("Side Cart", "mini-cart-for-woocommerce") ?> </a>
      </li>
      <li>
        <a href="#tab4"> <?php echo esc_html("Notification Box(Pro)", "mini-cart-for-woocommerce") ?> </a>
      </li>
      <li>
        <a href="#tab5"> <?php echo esc_html("Miscellaneous", "mini-cart-for-woocommerce") ?> </a>
      </li>
    </ul>
  </div>

 <div class="tab-content">

    <div class="tab1-tab active">
        <div class="conatcinerwrapper">
          <div class="col-md-8"> 
            <form method="post" action="options.php" class="whmc_menucart">
            <?php

            settings_fields("whmc_menu");
            do_settings_sections('whmc_admin_sec');

            ?> <div class="whmbtnsubit">
              <button type="submit" id="osiudi" class="button button-primary"> <?php echo esc_html__('Save Changes','mini-cart-for-woocommerce') ?> <span class="whmc_sdhicrt"></span>
              </button>
              <span class="whmcr_djkfhjhj"></span>
            </div>
        </form>
          </div>
          <div class="col-md-4">
            <div class="previewsidebar">
              <div class="menucartprev">
                <span id="kkkpreview">Preview</span>
                <span id="<?php echo $fcp_icon_option ?>" class="kkkpreview">This is a Premium Icon</span>
                <div class="cart_menu_li menu-link">
                  <div id="menuiconwrap" class="">
                    <span class="<?php echo $fcp_icon_option ?>" id="menuiconid">
                    </span>
                    <span class="mini-cart-count">
                      <span class="cart_count_header">5</span>
                    </span>
                    <div id="cart_count_total">
                      <span class="cart_count_total"> <?php echo wc_price('80') ?> </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="tab2-tab">

      <div class="conatcinerwrapper">
        <div class="col-md-7"> 
    <form method="post" action="options.php" class="whmc_menucart">
            <?php   
            settings_fields("whmc_option");
            do_settings_sections('whmc_admin_fsec');

        ?> <div class="whmbtnsubit">
            <button type="submit" id="osiudi" class="button button-primary"> <?php echo esc_html__('Save Changes','mini-cart-for-woocommerce') ?> <span class="whmc_sdhicrt"></span>
            </button>
            <span class="whmcr_djkfhjhj"></span>
          </div>
              </form>
        </div>

        <div class="col-md-5">
          <div class="previewsidebar">
            <div class="footercartprev">
              <span id="kkkpreviewss">Preview</span>
                <span id="<?php echo $wmhc_footer_bag_ficon ?>" class="kkkpreviewss">This is a Premium Icon</span>
               <?php 
         echo '<div class="shopping-cart" id="open"><span class="'.$wmhc_footer_bag_ficon.'" style="font-size:'.$fcp_cart_size.'px;color:'.$fcp_cart_color.';" id="footercraticos"></span><span id="mini-cart-count_footer">7</span></div>';?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="tab3-tab">
      <div class="conatcinerwrapper">
        <div class="col-md-7">
          <form method="post" action="options.php" class="whmc_sidebarsfrm"> <?php 
            settings_fields('whmc_sidepanel');
            do_settings_sections('whmc_admin_sec_sidepanel');
            ?> <div class="whmbtnsubit">
              <button type="submit" id="osiudi" class="button button-primary"> <?php echo esc_html__('Save Changes','mini-cart-for-woocommerce') ?> <span class="whmcsidebars_sdhi"></span>
              </button>
              <span class="whmcsidebars_djkfhjhj"></span>
            </div>
            <div class="wmcbtnfix">
              <button type="submit" id="osiudi" class="button button-primary"> <?php echo esc_html__('Save Changes','mini-cart-for-woocommerce') ?> <span class="whmcsidebars_sdhi"></span>
              </button>
              <span class="whmcsidebars_djkfhjhj"></span>
            </div>
          </form>
        </div>
        <div class="col-md-5">
          <div class="previewsidebar">
            <div id="pm_menu" class="whmc-body">
              <div class="whmc_top_part" style="background:<?php echo $wmhcside_toppart_bg ?>">
                <div class="cloasebtnwrap">
                  <span class="cloasebtn">×</span>
                </div>
                <div class="whmtitr" style="color:<?php echo $wmhcside_toppart_txt ?>"> <?php echo esc_html__($wmhcside_toppartycart,'mini-cart-for-woocommerce');?> </div>
                <div class="whmtopcatrs">
                  <div class="carttxtbtnwrap">
            <span class="carttxtbtn"><i class="<?php echo $fcp_top_icon; ?>" style="color:<?php echo($wmhcside_toppart_icon);?>" id="carttxtbtn"></i></span>
                  </div>
                  <div class="carttxtbtnwraptct">
                    <span id="topart_count_s">2</span>
                    <span id="topart_counts" style="color:<?php echo $wmhcside_toppart_txt ?>"> <?php echo esc_html__($wmhcside_toppart_txtcu,'mini-cart-for-woocommerce');?> </span>
                  </div>
                </div>
              </div>
              <div class="whmc-cart-item-wrap" id="emtyad">
                <div class="whmc-mini-cart">
                  <div class="whmc-cart-items" data-itemid="13263" data-ckey="f23077b60542b92033df4d2e208706de">
                    <div class="whmc-cart-items-inner">
                      <div class="whmimagewrapper">
                        <div class="whmcremovesd">
                          <div class="wc_remove_btn">
                            <a>
                              <span class="icon_cancel-circle"></span>
                            </a>
                          </div>
                        </div>
                        <div class="cart_image_iem">
                          <img width="150" height="150" src="<?php echo MCFWC_LIGHT_URL ?>/assets/admin/img/album-1-2-150x150.jpg" class="attachment-thumbnail size-thumbnail" sizes="(max-width: 150px) 100vw, 150px">
                        </div>
                      </div>
                      <div class="whmc-item-desc">
                        <div class="whmcitemprem">
                          <div class="cart-item-data-field">
                            <a href="#">Beanie</a>
                          </div>
                          <div class="whmc-item-price">
                            <span class="onlyprice"> <?php echo wc_price('18'); ?> </span>
                            <span class="quantitywithprice">1 × <?php echo wc_price('18'); ?> </span>
                            <span class="subtoroprce"> <?php echo wc_price('18'); ?> </span>
                          </div>
                        </div>
                        <div class="whmcqrtpricewrapper">
                          <div class="whmc-item-qty">
                            <span class="whmc-qty-minus whmc-qty-chng icon_minus"></span>
                            <input type="number" name="whmc-qty-input" class="whmc-qty" step="1" min="0" max="14" value="1" placeholder="" inputmode="numeric">
                            <span class="whmc-qty-plus whmc-qty-chng icon_plus"></span>
                          </div>
                          <div class="whmcsavevalus">
                            <span class="leftwrapperd">
                              <span id="whmcpercenleft">10%</span>
                              <span id="whmcvaluesaouleft"> <?php echo wc_price('2') ?> </span>
                            </span>
                            <span id="whmcvalues"> <?php echo $whmcvalues?> </span>
                            <span class="rightwrapperd">
                              <span id="whmcvaluesaout"> <?php echo wc_price('2') ?> </span>
                              <span id="whmcpercenright">10%</span>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="whmc-cart-items">
                    <div class="whmc-cart-items-inner">
                      <div class="whmimagewrapper">
                        <div class="whmcremovesd">
                          <div class="wc_remove_btn">
                            <a>
                              <span class="icon_cancel-circle"></span>
                            </a>
                          </div>
                        </div>
                        <div class="cart_image_iem">
                          <img width="150" height="150" src="<?php echo MCFWC_LIGHT_URL ?>/assets/admin/img/beanie-2-2-150x150.jpg" class="attachment-thumbnail size-thumbnail" sizes="(max-width: 150px) 100vw, 150px">
                        </div>
                      </div>
                      <div class="whmc-item-desc">
                        <div class="whmcitemprem">
                          <div class="cart-item-data-field">
                            <a href="#">Album</a>
                          </div>
                          <div class="whmc-item-price">
                            <span class="onlyprice"> <?php echo wc_price('15'); ?> </span>
                            <span class="quantitywithprice">2 × <?php echo wc_price('15'); ?> </span>
                            <span class="subtoroprce"> <?php echo wc_price('30'); ?> </span>
                          </div>
                        </div>
                        <div class="whmcqrtpricewrapper">
                          <div class="whmc-item-qty">
                            <span class="whmc-qty-minus whmc-qty-chng icon_minus"></span>
                            <input type="number" name="whmc-qty-input" class="whmc-qty" step="1" min="0" max="14" value="2" placeholder="" inputmode="numeric">
                            <span class="whmc-qty-plus whmc-qty-chng icon_plus"></span>
                          </div>
                          <div class="whmcsavevalus"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="whmc-bottom-part">
                <div class="whmc-cpn-resp" style="display:none"></div>
                <div class="couplonfield">
                  <div class="allpliedcoupon">
                    <span class="icon_d-1" id="cpnicon" style="color: <?php echo $whmc_coupon_iconcolor ?>">
                    </span>
                    <ul class="whmc-applied-cpns">
                      <li class="" cpcode="sharabindu">sharabindu <span class="whmc-remove-cpn icon_cancel-circle"></span>
                      </li>
                    </ul>
                  </div>
                  <div class="whmc_applypromocode">
                    <span class="whmaplycoupletxt"> <?php echo esc_html__($wmhc_applycoupon_value,'mini-cart-for-woocommerce') ?> </span>
                  </div>
                </div>
                <div class="whmc-coupon">
                  <div class="whmc-couponwrapper">
                    <div class="whmc_applypromocode">
                      <span class="icon_arrow-left2"></span>
                    </div>
                    <div class="whmc-coupon-field">
                      <input type="text" id="whmc-coupon-code" placeholder="<?php echo $whmc_cmplacehlder; ?>" style="border-top-left-radius: <?php echo $whmc_cppbrius; ?>px;border-bottom-left-radius: <?php echo $whmc_cppbrius; ?>px">
                      <button id="whmc_cmbrnabels" class="whmc-coupon-submit whmc-button" style="background:<?php echo $whmc_cmbtnbg; ?>;border-top-right-radius: <?php echo $whmc_cppbrius; ?>px;border-bottom-right-radius: <?php echo $whmc_cppbrius; ?>px"> <?php echo $whmc_cmbrnabel; ?> </button>
                    </div>
                    <ul class="whmc-applied-cpns" style="display:none">
                      <li></li>
                    </ul>
                    <div class="whmc-coupon-row" style="background:<?php echo $whmccoupon_modalibg; ?>">
                      <p class="wmcocodes whmctopfils">
                        <span class="wmcocodeicon">
                          <i class="<?php echo $whmc_coupon_modalicon; ?>" style="color:<?php echo $whmc_cmoiconclr; ?>"></i>
                        </span>
                        <input class="whmc-cr-code" type="text" value="2fv34wbu" readonly="">
                      </p>
                      <span>
                        <img class="whmccouponimages" src="<?php echo MCFWC_LIGHT_URL ?>/assets/admin/img/3-min.png" alt="2fv34wbu">
                      </span>
                      <p class="wmcocodes whmctopas">
                        <span class="wmcocodeicon">
                          <i class="<?php echo $whmc_coupon_modalicon; ?>" style="color:<?php echo $whmc_cmoiconclr; ?>"></i>
                        </span>
                        <input class="whmc-cr-code" type="text" value="2fv34wbu" readonly="">
                      </p>
                      <p class="whmc-cr-desc">Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                    <div class="whmc-coupon-row" style="background:<?php echo $whmccoupon_modalibg; ?>">
                      <p class="wmcocodes whmctopfils">
                        <span class="wmcocodeicon">
                          <i class="<?php echo $whmc_coupon_modalicon; ?>" style="color:<?php echo $whmc_cmoiconclr; ?>"></i>
                        </span>
                        <input class="whmc-cr-code" type="text" value="kt34ugm9" readonly="">
                      </p>
                      <span>
                        <img class="whmccouponimages" src="<?php echo MCFWC_LIGHT_URL ?>/assets/admin/img/5-min.png" alt="kt34ugm9">
                      </span>
                      <p class="wmcocodes whmctopas">
                        <span class="wmcocodeicon">
                          <i class="<?php echo $whmc_coupon_modalicon; ?>" style="color:<?php echo $whmc_cmoiconclr; ?>"></i>
                        </span>
                        <input class="whmc-cr-code" type="text" value="kt34ugm9" readonly="">
                      </p>
                      <p class="whmc-cr-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                    </div>
                    <div class="whmc-coupon-row" style="background:<?php echo $whmccoupon_modalibg; ?>">
                      <p class="wmcocodes whmctopfils">
                        <span class="wmcocodeicon">
                          <i class="<?php echo $whmc_coupon_modalicon; ?>" style="color:<?php echo $whmc_cmoiconclr; ?>"></i>
                        </span>
                        <input class="whmc-cr-code" type="text" value="s45g4gtc" readonly="">
                      </p>
                      <p class="whmc-cr-desc"></p>
                      <span>
                        <img class="whmccouponimages" src="<?php echo MCFWC_LIGHT_URL ?>/assets/admin/img/2-min.png" alt="s45g4gtc">
                      </span>
                      <p class="wmcocodes whmctopas">
                        <span class="wmcocodeicon">
                          <i class="<?php echo $whmc_coupon_modalicon; ?>" style="color:<?php echo $whmc_cmoiconclr; ?>"></i>
                        </span>
                        <span>
                          <input class="whmc-cr-code" type="text" value="s45g4gtc" readonly="">
                      </p>
                      <p class="whmc-cr-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                    </div>
                    <div class="whmc-coupon-row" style="background:<?php echo $whmccoupon_modalibg; ?>">
                      <p class="wmcocodes whmctopfils">
                        <span class="wmcocodeicon">
                          <i class="<?php echo $whmc_coupon_modalicon; ?>" style="color:<?php echo $whmc_cmoiconclr; ?>"></i>
                        </span>
                        <span>
                          <input class="whmc-cr-code" type="text" value="zwvc2wy6" readonly="">
                        </span>
                      </p>
                      <span>
                        <img class="whmccouponimages" src="<?php echo MCFWC_LIGHT_URL ?>/assets/admin/img/1-min.png" alt="zwvc2wy6">
                      </span>
                      <p class="wmcocodes whmctopas">
                        <span class="wmcocodeicon">
                          <i class="<?php echo $whmc_coupon_modalicon; ?>" style="color:<?php echo $whmc_cmoiconclr; ?>"></i>
                        </span>
                        <span>
                          <input class="whmc-cr-code" type="text" value="zwvc2wy6" readonly="">
                        </span>
                      </p>
                      <p class="whmc-cr-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                    </div>
                  </div>
                </div>
                <div class="whmc-buy-summary">
                  <div class="whmc-cart-subtotal-wrap">
                    <span style="color: <?php echo esc_attr($wmhc_cart_side_subtotal); ?>;font-size:<?php echo esc_attr($wmhc_cart_side_subtoral_font); ?>px">
                      <label class="whmc-total-label"> <?php echo esc_html__($sidepanels_subtototal_value,'mini-cart-for-woocommerce'); ?> </label>
                    </span>
                    <span class="whmc-subtotal-amount"> <?php echo wc_price('48'); ?> </span>

                  </div>


                  <div class="shippinfrescla">
                    <span class="shippinfrwrap">
                      <label class="shippinfresclalabel"> <?php echo esc_html__($wmhc_shipping_value,'mini-cart-for-woocommerce'); ?> </label>
                      <span class="<?php echo $whmc_shipicon ?>" id="shipcion">
                      </span>
                    </span>
                    <span class="shippingfree"> <?php echo wc_price('20'); ?> </span>
                  </div>
                  <div class="taxrates">
                    <span>
                      <label> <?php echo esc_html__($wmhcside_btm_shipping,'mini-cart-for-woocommerce'); ?> </label>
                    </span>
                    <span class="taxtgfree"> <?php echo wc_price('5.80'); ?> </span>
                  </div>
                  <div class="whmc-cart-discount-wrap">
                    <span>
                      <label> <?php echo esc_html__($wmhcside_btm_discount,'mini-cart-for-woocommerce'); ?> </label>
                    </span>
                    <span class="whmc-cart-discount-amount">
                      <span class="icon_minus" id="dicicnsd"></span> <?php echo wc_price('10'); ?> </span>


                  </div>
<?php echo '<small id="whmcstxt">'.$wmhc_subcstxt.'</small>'; ?>

                  <div class="whmc-cart-total-wrap" id="totalcla">
                    <span>
                      <label> <?php echo esc_html__($wmhcside_btm_total,'mini-cart-for-woocommerce'); ?> </label>
                    </span>
                    <span class="whmc-cart-total-amount"> <?php echo wc_price('63.80'); ?> </span>
                  </div>
                  <div class="whmc_ft-buttons-con">
                    <a href="#" class="chekouttxtvalues">
                      <div class="wmcchevkoutprocess">
                        <div class="icons" id="whmccheicobs">
                          <i class="fcp_icon_7"></i>
                        </div>
                        <div class="wmctitel"> <?php echo esc_html__($options_chekout_text_value,'mini-cart-for-woocommerce'); ?> </div>
                        <div class="amounts"> <?php echo wc_price('63.80'); ?> </div>
                      </div>
                    </a>
                  </div>
                  <a id="whmckeepshooping"> <?php echo esc_html__($whmc_keepshop_text_value,'mini-cart-for-woocommerce'); ?> </a>


                </div>
                <div class="backtopreb">
                  <span class="icon_arrow-left2" title="Back to Main Page"></span>
                </div>
                <div class="whmc-cart-item-wrap" id="borderbtnnine">
                  <div class="whmc-empty-cart">
                    <div class="whmrmtycart-zero-state">
                      <div class="whmrmtycart-icon-cart">
                        <i class="<?php echo $emptyicons ?>" id="emptrarticos" style="color: <?php echo $emptyicclr;?>">
                        </i><?php $id = attachment_url_to_postid( $wmhupimage);$imgalt = get_post_meta( $id, '_wp_attachment_image_alt', true );?> <div class="wmcemptyimg">
                          <img src="<?php echo $wmhupimage ?>" alt="<?php echo $imgalt; ?>">
                        </div>
                      </div>
                      <div class="whmrmtycart-zero-state-title"> <?php echo esc_html__($whmx_no_cart_text_value, 'mini-cart-for-woocommerce');?> </div>
                      <div class="whmrmtycart-zero-state-text"> <?php echo esc_html__($whmcfillcart, 'mini-cart-for-woocommerce');?> </div>
                      <a class="whmrmtycart-button" style="background:<?php echo $whmcemptyspbtbg?>;
    color:<?php echo $whmcemptyspbtclr?>;border-radius:<?php echo $whmcemptyspbris?>px;"> <?php echo esc_html__($whmcemptyshopbrn, 'mini-cart-for-woocommerce');?> </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab4-tab">
      <div class="conatcinerwrapper">
        <div class="col-md-5"><?php
            settings_fields('whmc_notification');
            do_settings_sections('whmc_admin_sec_notification');
            ?>
        </div>
        <div class="col-md-7">
          <div class="previewsidebar">
            <div class="prevnotifu">
              <div class="notofivationwrapper">
                <ul>
                  <li class="noticon">
                    <span class="dashicons dashicons-saved"></span>
                  </li>
                  <li class="notimag">
                    <img width="150" height="150" src="<?php echo MCFWC_LIGHT_URL ?>/assets/admin/img/beanie-2-2-150x150.jpg" class="attachment-thumbnail size-thumbnail">
                  </li>
                  <li class="notpruct">Polo <span class="addesdsucss"> <?php echo $notifications_rang_value ?> </span>
                  </li>
                </ul>
                <div class="adminprogress"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab5-tab">
      <div class="poytgwbemfn">
          <form method="post" action="options.php" class="whmc-notificabox"> <?php
            settings_fields('whmcmiscellaneous');
            do_settings_sections('whmcmiscellaneous_secs');
            ?> <div class="whmbtnsubit">
              <button type="submit" id="osiudi" class="button button-primary"> <?php echo esc_html__('Save Changes','mini-cart-for-woocommerce') ?> <span class="whmcnotific_sdhi"></span>
              </button>
              <span class="whmcnotific_djkfhjhj"></span>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>

          
         <?php
    } // end sandbox_theme_display
    

    public function adminFooterText()
    {
        if (isset($_GET['page']) && strpos($_GET['page'], MCFWC_LIGHT_PLUGIN_ID) !== false)
        {

    ?>

       <div id="footer_contaciner" role="contentinfo">
               <p id="" class=""><?php echo esc_html__('Thank you for using', 'mini-cart-for-woocommerce') ?> <strong><?php echo esc_html__('Mini Cart For WooCommerce', 'mini-cart-for-woocommerce') ?></strong> <span class="dashicons dashicons-smiley"></span> &nbsp;&nbsp;
<?php echo esc_html__('Talk to us at ','mini-cart-for-woocommerce')?><a href="https://wordpress.org/support/plugin/mini-cart-for-woocommerce/">Support</a><?php echo esc_html__(' for any plugin related issues. Please give our plugin a 5-star rating on','mini-cart-for-woocommerce')?> <a class="mini-cart-for-woocommerce_dash_strat" href="https://wordpress.org/support/plugin/mini-cart-for-woocommerce/reviews/" target="_blank"><i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i></a> <a href="https://wordpress.org/support/plugin/mini-cart-for-woocommerce/reviews/" target="_blank" rel="noopener noreferrer"><?php echo esc_html__('WordPress.org', 'mini-cart-for-woocommerce') ?></a> <?php echo esc_html__('if you benefit from using the plugin. It will motivate our efforts  ', 'mini-cart-for-woocommerce') ?></p>
  
           <div class="clear"></div>
       </div>
   <?php
        }
    }


   /**
     * Whmc Optin page admin form
     */

    public function whmc_admicss()
    {  
require MCFWC_LIGHT_PATH . 'admin/partials/whmc-data.php';

    if (isset($_GET['page']) && strpos($_GET['page'], WHMC_PAGE_ID) !== false){
        ?>
 <style>  

.notofivationwrapper ul {
    box-shadow: -2px 5px 12px <?php echo $notification_boxshadow;?>;
    background: <?php echo $notifications_bg_color;?>;
}
li.notpruct,li.notpruct span{
    color:<?php echo $notifications_title_color;?>;
}
 li.noticon span {
    color: <?php echo $suceess_icon_color;?>;
    border: 3px solid <?php echo $suceess_icon_color;?>;
}  
.adminprogress {
    background:<?php echo $progress_color;?>;;
}    

.shopping-cart{
    left: <?php echo $left;?>;
    right: <?php echo $right;?>;
    bottom: <?php echo $bottom;?>;
    margin: <?php echo $postion_range_bottom;?>% <?php echo $postion_range;?>%;
        background: <?php echo $fcp_cart_bgs;?>;
}
  .cloasebtnwrap {
    <?php echo $cloasebtnwrap;
     ?>
}

#mini-cart-count_footer{
     color:<?php echo $whmc_cart_bubble_color;
     ?>;
     background:<?php echo $fcp_cart_bubble_bg_color;
     ?>;
}

 .whmc-coupon.sidecartright,.whmc-modal.sidecartright{
    <?php echo $whmcmodel_r_position;
     ?>
}
 span#topart_count_s {
     position: <?php echo $static;
     ?>;
     color:<?php echo $wmhcside_topbtxbclr ?>;
     background:<?php echo $wmhcside_toppartbbclr ?>;
}
 #pm_menu,.whmc-empty-cart{
     height: <?php echo $height ?>;
     background: <?php echo $wmhc_cart_side_top_background ?> 
}
 .whmc-cart-items {
     border-bottom-style:<?php echo $wmhc_middleborder;
     ?>;
     border-bottom-color:<?php echo $wmhc_cart_side_border_btm;
     ?>;
}
 .whmc-cart-total-wrap {
     border-top-style:<?php echo $wmhc_cartttlborder;
     ?>;
     border-top-color:<?php echo $wmhc_cartttlborclr;
     ?>;
}
 .whmc-cart-item-wrap{
     border-bottom: 1px <?php echo $wmhc_bottomborder;
     ?> <?php echo $wmhc_bottmborderclr;
     ?> 
}
 .whmc-item-qty{
     border: 1px solid <?php echo $whmc_qrtborder;
     ?>;
     border-radius:<?php echo $whmc_qrtborderradis;
     ?>px;
}
 .whmc-item-qty .whmc-qty[type=number]{
     border-left: 1px solid <?php echo $whmc_qrtborder;
     ?>;
     border-right: 1px solid <?php echo $whmc_qrtborder;
     ?>;
}
 .cart-item-data-field a{
     color: <?php echo $wmhc_cart_side_text_color?>;
     font-size: <?php echo $wmhc_cart_side_text_size;
    ?>px;
}
 .whmc-item-price span{
     color: <?php echo $wmhc_cart_side_price_color?> ;
     font-size: <?php echo $wmhc_cart_side_price_size;
    ?>px;
}
 .whmc-cart-subtotal-wrap{
     color: <?php echo $wmhc_cart_side_subtotal;
     ?>;
     font-size: <?php echo $wmhc_cart_side_subtoral_font;?>px
}
 .taxrates{
     color: <?php echo $wmhc_shipping_Color;
     ?>;
     font-size: <?php echo $wmhc_cart_shipping_font;
    ?>px
}
 .whmc-cart-discount-wrap span{
     color: <?php echo $wmhc_discount_color;
     ?>;
     font-size: <?php echo $wmhc_cart_discount_font;
    ?>px
}
 #totalcla span{
     color: <?php echo $wmhc_total_color;
     ?>;
     font-size: <?php echo $wmhc_cart_total_font;
    ?>px;
}
.whmc_ft-buttons-con a{
     background: <?php echo $wmhc_cart_side_button_color;
     ?>;
         border:2px solid <?php echo $whmc_cartborderclr;
     ?>;
    border-radius: <?php echo $whmc_cartborderrdis;?>px;
}
 .cart_image_iem img {
     border-radius: <?php echo $whmc_side_img_brious;
     ?>px;
}
 .whmc_ft-buttons-con a .wmcchevkoutprocess .icons i,.whmc_ft-buttons-con a .wmcchevkoutprocess .wmctitel,.whmc_ft-buttons-con a .wmcchevkoutprocess .amounts span{
     color: <?php echo $wmhc_cart_side_button_text_color;
    ?>;
}
.whmcsavevalus, .whmcsavevalus span {
    font-size:  <?php echo $whmc_svaevluft;?>px;
    color:  <?php echo $whmc_svaecolor;?>;
}

.whmc-body:after, .whmc-carts-content.whmc-processing:after{
     color: <?php echo $loadclr;
    ?>;
}
.shippinfrescla,span#shipcion{
    color: <?php echo esc_attr($wmhc_cart_shipping); ?>;
    font-size: <?php echo esc_attr($wmhc_cart_side_shipping_font) ?>px;
}

.cart_menu_li.li_two span.cart_count_header,span.mini-cart-item-number,.cart_menu_li span.cart_count_total,.cart_menu_li span.icon_minus{
    color: <?php echo $wmhc_header_text_color;?>;
}
span.cart_count_header,span.cart_count_headers{
    background: <?php echo $wmhch_bubbles_color;?>;
    color:  <?php echo $wmhch_bubbles_txt;?>;
}
.cart_menu_li.li_two #menuiconid,.cart_menu_li.li_three #menuiconid,.cart_menu_li #menuiconid{
    color:<?php echo $wmhc_header_bubble_color;?>;
    font-size:<?php echo $fcp_menu_cart_size;?>px;
}
#menuiconid1,#menuiconid2,#menuiconid3,#menuiconid4{
    color:<?php echo $wmhc_header_bubble_color;?>;
}
span.cart_count_total .amount{
    font-size: <?php echo  $fcp_menu_txt_size;?>px;
}
</style> 

<?php

    } 
    } 
    
}


