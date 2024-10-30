<?php

class MCFWC_cartFrontend
{
    public $action;
    function __construct()
    {
        
        add_filter('woocommerce_add_to_cart_fragments', array(
            $this,
            'add_to_cart_fragments'
        ), 10, 1);
        add_filter('woocommerce_update_order_review_fragments', array(
            $this,
            'add_to_cart_fragments'
        ), 10, 1);
        

        add_action('wp_ajax_get_refresh_fragments', array(
            $this,
            'get_refreshed_fragments'
        ));
        add_action('wp_ajax_nopriv_get_refresh_fragments', array(
            $this,
            'get_refreshed_fragments'
        ));
        
        add_action('wp_ajax_remove_item', array(
            $this,
            'cart_remove_item'
        ));
        add_action('wp_ajax_nopriv_remove_item', array(
            $this,
            'cart_remove_item'
        ));
        
        // Prevent Refresh from Adding Another Product in WooCommerce
        add_action('woocommerce_add_to_cart_redirect', array(
            $this,
            'prevent_add_to_cart_on_redirect'
        ));
        
    }
    
    
    
    
    public function get_cart_footer_content()
    {
        
        
        ob_start();
        WC()->cart->calculate_shipping();
        
        $packages = WC()->shipping()->get_packages();
        $package  = $packages[0];
        
        $chosen_method = isset(WC()->session->chosen_shipping_methods[0]) ? WC()->session->chosen_shipping_methods[0] : '';
        $product_names = array();
        
        if (count($packages) > 1) {
            foreach ($package['contents'] as $item_id => $values) {
                $product_names[$item_id] = $values['data']->get_name() . ' &times;' . $values['quantity'];
            }
            $product_names = apply_filters('woocommerce_shipping_package_details_array', $product_names, $package);
        }
        
        $args = array(
            'package' => $package,
            'available_methods' => $package['rates'],
            'show_package_details' => count($packages) > 1,
            'show_shipping_calculator' => apply_filters('woocommerce_shipping_show_shipping_calculator', true, 0, $package),
            'package_details' => implode(', ', $product_names),
            'index' => 0,
            'chosen_method' => $chosen_method,
            'formatted_destination' => WC()->countries->get_formatted_address($package['destination'], ', '),
            'has_calculated_shipping' => WC()->customer->has_calculated_shipping()
        );
        
        extract($args);
        
        
        $formatted_destination    = isset($formatted_destination) ? $formatted_destination : WC()->countries->get_formatted_address($package['destination'], ', ');
        $has_calculated_shipping  = !empty($has_calculated_shipping);
        $show_shipping_calculator = !empty($show_shipping_calculator);
        $calculator_text          = '';
        $toggle_html              = false;

        $val = get_option('whmcmiscellaneous');
        $shipto = isset($val['shipto']) ? $val['shipto'] : esc_html__('Shipping to','mini-cart-for-woocommerce');
        $notfshopads = isset($val['notfshopads']) ? $val['notfshopads'] : esc_html__('No shipping options were found for','mini-cart-for-woocommerce');
        $calculate = isset($val['calculate']) ? $val['calculate'] : esc_html__('Calculate','mini-cart-for-woocommerce');

        ?>



    <div class="whmc-carts-content">
        <div class="whmc-shippicngcal-content">

    <?php
        if ($available_methods):?>
        <ul id="shipping_method" class="woocommerce-shipping-methods">
            <?php
            foreach ($available_methods as $method):?>
                <li>
                    <?php
                if (1 < count($available_methods)) {
                    printf('<input type="radio" name="shipping_method[%1$d]" data-index="%1$d" id="shipping_method_%1$d_%2$s" value="%3$s" class="shipping_method" %4$s />', $index, esc_attr(sanitize_title($method->id)), esc_attr($method->id), checked($method->id, $chosen_method, false)); // WPCS: XSS ok.
                } else {
                    printf('<input type="hidden" name="shipping_method[%1$d]" data-index="%1$d" id="shipping_method_%1$d_%2$s" value="%3$s" class="shipping_method" />', $index, esc_attr(sanitize_title($method->id)), esc_attr($method->id)); // WPCS: XSS ok.
                }
                printf('<label for="shipping_method_%1$s_%2$s">%3$s</label>', $index, esc_attr(sanitize_title($method->id)), wc_cart_totals_shipping_method_label($method)); // WPCS: XSS ok.
                do_action('woocommerce_after_shipping_rate', $method, $index);?>
                </li>
            <?php
            endforeach;?>
        </ul>

        <?php
            $toggle_html .= '<div class="shippignsto_whmc">';
            if ($formatted_destination) {
                $toggle_html .= sprintf(esc_html__(''.$shipto.'  %s.', 'mini-cart-for-woocommerce') . ' ', '<strong>' . esc_html($formatted_destination) . '</strong>');
                $calculator_text = esc_html__('Change address', 'mini-cart-for-woocommerce');
            } else {
                $toggle_html .= wp_kses_post(apply_filters('woocommerce_shipping_estimate_html', __('Shipping options will be updated during checkout.', 'mini-cart-for-woocommerce')));
            }
            $toggle_html .= '</div>';
        else:

            if (!$has_calculated_shipping || !$formatted_destination):
                if ('no' === get_option('woocommerce_enable_shipping_calc')) {
                    $toggle_html .= wp_kses_post(apply_filters('woocommerce_shipping_not_enabled_on_cart_html', __(''.$calculate.'', 'mini-cart-for-woocommerce')));
                } else {
                    $toggle_html .= wp_kses_post(apply_filters('woocommerce_cart_no_shipping_available_html', sprintf(esc_html__(''.$notfshopads.' %s.', 'mini-cart-for-woocommerce') . ' ', '<strong>' . esc_html($formatted_destination) . '</strong>')));
                }
            else:
                // Translators: $s shipping destination.
                $toggle_html .= wp_kses_post(apply_filters('woocommerce_cart_no_shipping_available_html', sprintf(esc_html__(''.$notfshopads.' %s.', 'mini-cart-for-woocommerce') . ' ', '<strong>' . esc_html($formatted_destination) . '</strong>')));
                $calculator_text = esc_html__('Enter a different address', 'mini-cart-for-woocommerce');
            endif;
            
        endif;

        if ($show_shipping_calculator):

            ob_start();
            woocommerce_shipping_calculator($calculator_text);
            $toggle_html .= ob_get_clean();

        endif;

        echo $toggle_html;?>

    </div>

    </div>
    <?php
 
        return ob_get_clean();
        
    }
    
    
    function shippingcostsd()
    {
        ob_start();
        WC()->cart->calculate_shipping();
        
        $val = get_option('whmcmiscellaneous');
        $calculate = isset($val['calculate']) ? $val['calculate'] : esc_html__('Calculate','mini-cart-for-woocommerce');




        $packages          = WC()->shipping()->get_packages();
        $package           = $packages[0];
        $available_methods = $package['rates'];?><span class='shippingfree'><?php
        if ($available_methods) {
            $shiippingvaluessd = WC()->cart->get_cart_shipping_total();
        } else {
            $formatted_destination = WC()->countries->get_formatted_address($package['destination'], ', ');
            if (!$formatted_destination) {
                $shiippingvaluessd = wp_kses_post(apply_filters('woocommerce_shipping_not_enabled_on_cart_html', __(''.$calculate.'', 'mini-cart-for-woocommerce')));
            } else {


                $shiippingvaluessd = wp_kses_post( apply_filters( 'woocommerce_shipping_may_be_available_html', __( ''.$calculate.'', 'mini-cart-for-woocommerce') ) );

            }
        }?></span><?php
        ob_get_clean();
        return $shiippingvaluessd;
    }
    
    
    
    
    
    private function checkNonce()
    {
        if (isset($_POST['wp_nonce']) && wp_verify_nonce($_POST['wp_nonce'], 'whmc-frontend-ajax-nonce')) {
            return 'true';
        } else {
            return 'false';
        }
    }
    
    function prevent_add_to_cart_on_redirect($url = false)
    {
        
        if (!empty($url)) {
            return $url;
        }
        return add_query_arg(array(), remove_query_arg('add-to-cart'));
    }
    
    
    public function add_to_cart_fragments($fragments)
    {
        $sidepanels = get_option('whmc_sidepanel');
        $whmx_no_cart_text_value = isset($sidepanels['wmhc_no_cart_text_value']) ? $sidepanels['wmhc_no_cart_text_value'] : esc_html__('Cart is empty.', 'mini-cart-for-woocommerce');
        $whmcfillcart = isset($sidepanels['whmcfillcart']) ? $sidepanels['whmcfillcart'] : esc_html__('Fill your cart with amazing items','mini-cart-for-woocommerce');
        $whmcemptyshopbrn = isset($sidepanels['whmcemptyshopbrn']) ? $sidepanels['whmcemptyshopbrn'] : esc_html__('Shop Now');
    $whmcemptyspbtclr = isset($sidepanels['whmcemptyspbtclr']) ? $sidepanels['whmcemptyspbtclr'] :'#fff';
    $whmcemptyspbtbg = isset($sidepanels['whmcemptyspbtbg']) ? $sidepanels['whmcemptyspbtbg'] :'#1e73be';
    $whmcemptyspbris = isset($sidepanels['whmcemptyspbris']) ? $sidepanels['whmcemptyspbris'] :'6';

    $whmcpricesty = isset($sidepanels['whmcpricesty']) ? $sidepanels['whmcpricesty'] : 'qty';

    $whmcvaluespos = isset($sidepanels['whmcvaluespos']) && $sidepanels['whmcvaluespos'] == 'whmcvaluespos' ? 'checked' : '';
    $wmhupimage = isset($sidepanels['wmhupimage']) ? $sidepanels['wmhupimage'] : '';
    $emptyicons = isset($sidepanels['emptyicons']) ? $sidepanels['emptyicons'] : 'fcp_icon_3';
    $choosetyps = isset($sidepanels['choosetyps']) ? $sidepanels['choosetyps'] : 'icon';

        $emptyicclr = isset($sidepanels['emptyicclr']) ? $sidepanels['emptyicclr'] :'#666666';
        $whmcvalues = isset($sidepanels['whmcvalues']) ? $sidepanels['whmcvalues'] : esc_html__('Save','mini-cart-for-woocommerce');;

        $whmcsavvles = isset($sidepanels['whmcsavvles']) ? $sidepanels['whmcsavvles'] :'percentage';


        WC()->cart->calculate_totals();
        WC()->cart->maybe_set_cart_cookies();
        global $woocommerce;
        ob_start();?>
    <div class="whmc-cart-item-wrap">
     <?php
        if (!WC()->cart->is_empty()) {
            $cart_footer   = $this->get_cart_footer_content();
            $shipppedciors = $this->shippingcostsd();?>
    <div class="whmc-mini-cart">
      <?php $items = WC()->cart->get_cart();
            foreach ($items as $itemKey => $itemVal) {?>
        <div class="whmc-cart-items" data-itemId="<?php echo esc_attr($itemVal['product_id']);?>" data-cKey="<?php
                echo esc_attr($itemVal['key']);?>">
                    <div class="whmc-cart-items-inner">
                        <?php
                $product     = wc_get_product($itemVal['data']->get_id());
                $product_id       = apply_filters('woocommerce_cart_item_product_id', $itemVal['product_id'], $itemVal, $itemKey);
                $getProductDetail = wc_get_product($itemVal['product_id']);


                ?>
<div class="whmimagewrapper">
<div class="whmcremovesd">
<div class="wc_remove_btn">
<?php echo apply_filters('woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="whmc-remove"  aria-label="%s" data-cart_item_id="%s" data-cart_item_sku="%s" data-cart_item_key="%s"><span class="icon_cancel-circle"></span></a>', esc_url(wc_get_cart_remove_url($itemKey)), esc_html__('Remove this item', 'mini-cart-for-woocommerce'), esc_attr($product_id), esc_attr($product->get_sku()), esc_attr($itemKey)), $itemKey); ?>
</div></div>

         <div class="cart_image_iem">
                            <?php
                echo $product->get_image('thumbnail');
            ?></div>
</div>
    <div class="whmc-item-desc">
<div class="whmcitemprem">
<div class="cart-item-data-field" ><a href="<?php  echo esc_url(get_the_permalink($itemVal['product_id']))?>">
<?php echo esc_html__($product->get_name()); ?></a>
</div>

        <div class="whmc-item-price">
        <?php
$wc_product = $itemVal['data'];
$product_price = 
apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($product) , $itemVal, $itemKey);

if($whmcpricesty == 'price'){
echo $product_price;
}if($whmcpricesty == 'qty'){
 echo apply_filters('woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf('%s &times; %s', $itemVal['quantity'], $product_price) . '</span>', $itemVal, $itemKey); 
}if($whmcpricesty == 'subtotal'){
echo WC()->cart->get_product_subtotal($wc_product, $itemVal['quantity']);
} 

                    
        ?>
        </div>
</div>

        </div>

        </div> <!-- whmc-cart-items-inner -->
        </div> <!-- whmc-cart-items -->
      <?php
            }?>
                    </div> 
                    <?php
        } else {

            ?>
    <div class="whmc-empty-cart">
<style>.whmtopcatrs{opacity:0}</style>
<div class="whmrmtycart-zero-state">
<div class="whmrmtycart-icon-cart">

    <?php if($choosetyps == 'icon') {?>
    <i class="<?php echo $emptyicons ?>" style="color: <?php echo $emptyicclr;?>"></i>
    <?php }if($choosetyps == 'image'){

    $id  = attachment_url_to_postid( $wmhupimage);


    $imgalt = get_post_meta( $id, '_wp_attachment_image_alt', true );

    ?>
    <div class="wmcemptyimg">
    <img src="<?php echo $wmhupimage ?>" alt="<?php echo $imgalt; ?>"> 
    </div>  
    <?php } ?>
    </div>
        <div class="whmrmtycart-zero-state-title"><?php echo esc_html__($whmx_no_cart_text_value, 'mini-cart-for-woocommerce');?></div>
        <div class="whmrmtycart-zero-state-text"><?php echo esc_html__($whmcfillcart, 'mini-cart-for-woocommerce');?></div>
        <a href="<?php echo wc_get_page_permalink( 'shop' ) ?>" class="whmrmtycart-button" style="background:<?php echo $whmcemptyspbtbg?>;
    color:<?php echo $whmcemptyspbtclr?>;border-radius:<?php echo $whmcemptyspbris?>px;"><?php echo esc_html__($whmcemptyshopbrn, 'mini-cart-for-woocommerce');?></a>
    </div>

    </div>
      <?php
        }
        ?>
            </div>

    <?php
        
        $cart_body_contents                   = ob_get_clean();
        $fragments['div.whmc-cart-item-wrap'] = $cart_body_contents;
        $fragments['div.whmc-carts-content']  = '<div class="whmc-carts-content">' . $cart_footer . '</div>';
        $fragments['span.shippingfree']       = '<span class="shippingfree">' . $shipppedciors . '</span>';
        
        $fragments['span#mini-cart-count_footer'] = '<span id="mini-cart-count_footer">' . WC()->cart->get_cart_contents_count() . '</span>';
        
        $fragments['span.mini-cart-count']  = '<span class="mini-cart-count"><span class="cart_count_header">' . WC()->cart->get_cart_contents_count() . '</span></span>';

       $fragments['span.cart_count_total'] = '<span class="cart_count_total">' .wc_price(WC()->cart->cart_contents_total) . '</span>';
        
        
        // Update subtotal Amount
        $get_totals                             = WC()->cart->get_totals();
        $cart_total                             = $get_totals['subtotal'];
        $cart_discount                          = $get_totals['discount_total'];
        $final_subtotal                         = $cart_total - $cart_discount;
        $subtotal                               = "<span class='whmc-subtotal-amount'>" . WC()->cart->get_cart_subtotal() . "</span>";
        $fragments['span.whmc-subtotal-amount'] = $subtotal;
        
        // Update Total Amount
        $cartTotal                                = '<span class="whmc-cart-total-amount">' . WC()->cart->get_total() . '</span>';
        $fragments['span.whmc-cart-total-amount'] = $cartTotal;
        $current_shipping_cost                    = WC()->cart->get_cart_shipping_total();
        
        
        $taxTotal                                    = '<span class="taxtgfree"><bdi>' . WC()->cart->get_cart_tax() . '</bdi></span>';
        // Update Discount Amount
        $discounts                                   = WC()->cart->get_discount_total();
        $discount                                    = get_option('woocommerce_tax_display_cart') === 'incl' ? $discounts + WC()->cart->get_discount_tax() : $discounts;
        $discountTotal                               = '<span class="whmcdicamount">' . wc_price(get_option('woocommerce_tax_display_cart') === 'incl' ? $discounts + WC()->cart->get_discount_tax() : $discounts) . '</span>';
        $fragments['span.whmcdicamount'] = $discountTotal;
        $fragments['span.taxtgfree']                 = $taxTotal;
        
        // Update Applied Coupon
        $applied_coupons = WC()->cart->get_applied_coupons();
        ob_start();
        if (!empty($applied_coupons)) {?>

                <ul class='whmc-applied-cpns'>
                    <?php
            foreach ($applied_coupons as $cpns) {?>
                        <li class='' cpcode='<?php
                echo esc_attr($cpns);?>'><?php
                echo esc_attr($cpns);?> <span class='whmc-remove-cpn  icon_cancel-circle'></span></li>
                        <?php
            }?>
                </ul>
                <?php
        } else {
            echo '<ul class="whmc-applied-cpns" style="display: none;"><li></li></ul>';
        }
        $cart_cpn = ob_get_clean();
        
        $fragments['ul.whmc-applied-cpns'] = $cart_cpn;

        $fragments['.shipingcountry']      = WC()->customer->get_shipping_country();
        ;
        
        // Update the Items Count In the Cart
        $fragments['.whmc-cart-qty-count']   = '<span class="whmc-cart-qty-count">' . esc_html__('Quantity: ', 'mini-cart-for-woocommerce') . WC()->cart->get_cart_contents_count() . '</span>';

        $fragments['span#topart_count_s'] = '<span id="topart_count_s">' . count(WC()->cart->get_cart()) . '</span>';
        
        // Cart Basket Items Count
        $fragments['.whmc-item-count-wrap .whmc-cart-item-count'] = '<span class="whmc-cart-item-count">' . WC()->cart->get_cart_contents_count() . '</span>';
        
        if (WC()->cart->get_cart_contents_count() == 1) {
            $itemsname = esc_html__('item', 'mini-cart-for-woocommerce');
        } else {
            $itemsname = esc_html__('items', 'mini-cart-for-woocommerce');
        }
        
        $fragments['.mini-cart-item-number'] = '<span class="mini-cart-item-number">' . $itemsname . '</span>';

        return $fragments;
    }
    
    
    public function get_refreshed_fragments()
    {
        
        if ($this->checkNonce == 'false') {
            return false;
        }
        
        WC_AJAX::get_refreshed_fragments();
    }
    
    public function cart_remove_item()
    {
        
        if ($this->checkNonce == 'false') {
            return false;
        }
        
        ob_start();
        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            if ($cart_item['product_id'] == $_POST['cart_item_id'] && $cart_item_key == $_POST['cart_item_key']) {
                WC()->cart->remove_cart_item($cart_item_key);
            }
        }
        
        WC()->cart->calculate_totals();
        WC()->cart->maybe_set_cart_cookies();
        
        woocommerce_mini_cart();
        
        $mini_cart = ob_get_clean();
        
        // Fragments and mini cart are returned
        $data = array(
            'fragments' => apply_filters('woocommerce_add_to_cart_fragments', array(
                'div.widget_shopping_cart_content' => '<div class="widget_shopping_cart_content">' . $mini_cart . '</div>'
            )),
            'cart_hash' => apply_filters('woocommerce_add_to_cart_hash', WC()->cart->get_cart_for_session() ? md5(json_encode(WC()->cart->get_cart_for_session())) : '', WC()->cart->get_cart_for_session())
        );
        
        wp_send_json($data);
        
        die();
    }
    
}

new MCFWC_cartFrontend();