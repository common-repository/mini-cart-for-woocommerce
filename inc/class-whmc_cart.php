<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that inc attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @since      5.0.0
 *
 * @package    WHMC
 * @subpackage WHMC/inc
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      5.0.0
 * @package    WHMC
 * @subpackage WHMC/inc
 */
class whmc_lightCart {
	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    5.0.0
	 */

	 function __construct(){

	 	add_action('wp_ajax_nopriv_item_added', array( $this , 'addedtocart_sweet_message'));
	 	
	 	add_action('wp_ajax_item_added', array( $this ,'addedtocart_sweet_message'));

	 	add_action( 'wc_ajax_ace_add_to_cart', array( $this ,'ace_ajax_add_to_cart_handler' ));

	 	add_action( 'wc_ajax_nopriv_ace_add_to_cart', array( $this ,'ace_ajax_add_to_cart_handler' ));
	 	
	 	add_action( 'woocommerce_add_to_cart_fragments', array( $this ,'ace_ajax_add_to_cart_add_fragments' ));
	 

	 	add_filter( "woocommerce_loop_add_to_cart_args", array( $this ,'filter_wc_loop_add_to_cart_args'), 20, 2 );

		add_action( 'wp_head', array( $this ,'ace_product_page_head' ));
	}
/**
 * Add fragments for notices.
 */
function ace_ajax_add_to_cart_add_fragments( $fragments ) {
	$all_notices  = WC()->session->get( 'wc_notices', array() );
	$notice_types = apply_filters( 'woocommerce_notice_types', array( 'error', 'success', 'notice' ) );

	ob_start();
	foreach ( $notice_types as $notice_type ) {
		if ( wc_notice_count( $notice_type ) > 0 ) {
			wc_get_template( "notices/{$notice_type}.php", array(
				'notices' => array_filter( $all_notices[ $notice_type ] ),
			) );
		}
	}
	$fragments['notices_html'] = ob_get_clean();

	wc_clear_notices();

	return $fragments;
}
	function filter_wc_loop_add_to_cart_args( $args, $product ) {
	    if ( $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ) 
	    {
	        $args['attributes']['data-product_name'] = $product->get_name();
	        $args['attributes']['data-product_image'] = wp_get_attachment_image_url( $product->get_image_id(), 'thumbnail');   
	    }
	    return $args;
	}


	// Wordpress Ajax PHP

	function addedtocart_sweet_message() {
	    echo isset($_POST['id']) && $_POST['id'] > 0 ? (int) esc_attr($_POST['id']) : false;
	    die();
	}


	/**
	 * Add to cart handler.
	 */
	function ace_ajax_add_to_cart_handler() {
		
	WC_Form_Handler::add_to_cart_action();
	WC_AJAX::get_refreshed_fragments();
	}

	function ace_product_page_head(){
	    require MCFWC_LIGHT_PATH . 'admin/partials/whmc-data.php';

	 ?>

		<style type="text/css">
		<?php if($notification_enabes_whmc == 'no'){ ?>
		.swal2-popup.swal2-toast.swal2-icon-success.swal2-show {
		    background: <?php echo $notifications_bg_color; ?>;
		}
		h2#swal2-title {
		    color: <?php echo $notifications_title_color; ?>;
		}
		.swal2-timer-progress-bar {
		    background: <?php echo $progress_color; ?> !important;

		}
		.swal2-popup.swal2-toast.swal2-icon-success.swal2-show {
			<?php if($notification_round_bar == 'checked'){ ?>
		    border-radius: 0px;
			<?php } ?>
			box-shadow: 1px 1px 10px <?php echo $notification_boxshadow ?> !important;

		}
		.swal2-icon.swal2-success .swal2-success-ring{
			border: .25em solid <?php echo $suceess_icon_color; ?> !important;
		}
		.swal2-icon.swal2-success [class^=swal2-success-line] {
		    background-color: <?php echo $suceess_icon_color; ?> !important;
		}

	<?php } ?>
    .shopping-cart{
    left: <?php echo $left;
     ?>;
    right: <?php echo $right;
     ?>;
    bottom: <?php echo $bottom;?>;
    margin: <?php echo $postion_range_bottom;?>% <?php echo $postion_range;?>%;
    background: <?php echo $fcp_cart_bgs;?>;
}
#menuiconid{
	color: <?php echo $wmhc_header_bubble_color;?>;
	font-size: <?php echo $fcp_menu_cart_size;?>px;
}
 #pm_menu.pm_open {
    <?php echo $cart_position;
     ?>
}
 #pm_menu {
    <?php echo $cart_positionanimat;
     ?>
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
 .whmc-coupon,.whmc-modal {
     <?php echo $whmcmodel_position;
     ?>
}
 .whmc-coupon.sidecartright,.whmc-modal.sidecartright{
    <?php echo $whmcmodel_r_position;
     ?>
}
 span#topart_count_s {
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
     color: <?php echo $wmhc_cart_side_price_color?> !important;
     font-size: <?php echo $wmhc_cart_side_price_size;
    ?>px!important;
}
.whmc-cart-subtotal-wrap, .whmc-subtotal-amount span{
     color: <?php echo $wmhc_cart_side_subtotal;
     ?>!important;
     font-size: <?php echo $wmhc_cart_side_subtoral_font;
    ?>px!important;
}
 .taxrates,span.taxtgfree span{
     color: <?php echo $wmhc_shipping_Color;
     ?> !important ;

     font-size: <?php echo $wmhc_cart_shipping_font;
    ?>px!important;
}
 .whmc-cart-discount-wrap span{
     color: <?php echo $wmhc_discount_color;
     ?>!important;
     font-size: <?php echo $wmhc_cart_discount_font;
    ?>px!important;
}
 #totalcla span{
     color: <?php echo $wmhc_total_color;
     ?>!important;
     font-size: <?php echo $wmhc_cart_total_font;
    ?>px!important;
}
.whmc_ft-buttons-con a{
     background: <?php echo $wmhc_cart_side_button_color;
     ?>!important;
         border:2px solid <?php echo $whmc_cartborderclr;
     ?>!important;
     border-radius: <?php echo $whmc_cartborderrdis;
     ?>px;
}
 .cart_image_iem img {
     border-radius: <?php echo $whmc_side_img_brious;
     ?>px;
}
 .whmc_ft-buttons-con a .wmcchevkoutprocess .icons i,.whmc_ft-buttons-con a .wmcchevkoutprocess .wmctitel,.whmc_ft-buttons-con a .wmcchevkoutprocess .amounts span{
     color: <?php echo $wmhc_cart_side_button_text_color;
    ?>!important;
}
 .whmc-body.whmc-loader:after, .whmc-carts-content.whmc-processing:after{
     content: '\<?php echo $loadeclass;?>';
     color: <?php echo $loadclr;?>;
}
.whmc-spinner:after {
     content: '\<?php echo $cellloader;?>';
     color: <?php echo $cellmoaderclr;?>;
}

<?php if($enabeloadstore == 'checked'){ ?>
	a.button.product_type_simple.add_to_cart_button.ajax_add_to_cart.loading:after {
     content: '\<?php echo $cellloader;?>';
     color: <?php echo $cellmoaderclr;?>;
     right: 9px;
	top:auto;
    position: absolute;
    font-family: whmcicon;
    font-size: 19px;
    -webkit-animation: 2s linear infinite whmc-spin;
    animation: 2s linear infinite whmc-spin;
    z-index: 9;
    transform: translate(-50%.-50%);
	background-color: transparent;
	width: auto;
    height:auto;
}
<?php } ?>
.shippinfrescla, span#shipcion, .shippingfree span{
    color: <?php echo esc_attr($wmhc_cart_shipping); ?> !important;
    font-size: <?php echo esc_attr($wmhc_cart_side_shipping_font) ?>px !important;
}
.whmcsavevalus, .whmcsavevalus span {
    font-size:  <?php echo $whmc_svaevluft;?>px !important;
    color:  <?php echo $whmc_svaecolor;?> !important;
}

span.cart_count_header,span.icon_minus,span.cart_count_total .amount{
      color: <?php echo $wmhc_header_text_color;?>;
          }
span.cart_count_header{
background: <?php echo $wmhch_bubbles_color;?>;
color:  <?php echo $wmhch_bubbles_txt;?>;
}
.cart_menu_li.li_two #menuiconid,.cart_menu_li.li_three #menuiconid,.cart_menu_li #menuiconid{
color: <?php echo $wmhc_header_bubble_color;?>;
font-size:<?php echo $fcp_menu_cart_size;?>px;
}
span.cart_count_total .amount{
font-size: <?php echo $fcp_menu_txt_size;?>px;
}
                </style>




</style>
	<?php

	}

}


if(class_exists("whmc_lightCart")){

	new whmc_lightCart;
}