(function($) {
    "use strict";
    jQuery(function($) {
        if (typeof wc_add_to_cart_params === 'undefined')
            return false;
        $(document.body).on('added_to_cart', function(a, b, c, d) {

            var prod_id = d.data('product_id'); // Get the product name
            var prod_qty = d.data('quantity'); // Get the quantity
            var prod_name = d.data('product_name'); // Get the product name
            var prod_img = d.data('product_image');


            $.ajax({
                type: 'POST',
                url: wc_add_to_cart_params.ajax_url,
                data: {
                    'action': 'item_added',
                    'id': prod_id
                },
                success: function(response) {
                    if (response == prod_id) {
                        $('#pm_menu').addClass(whmcnotify.whmcpmopen);
                        $('.pm_overlay').addClass(whmcnotify.whmcpmshoe);
                        $('.pm_overlay').removeClass(whmcnotify.whmcpmhide);
						
                    }
                }
            });
        });
    });


    jQuery(function($) {

        $('form.cart').on('submit', function(e) {
            e.preventDefault();
            $('.single_add_to_cart_button ').addClass('whmc-spinner');
            $('.single_add_to_cart_button ').removeClass('added');

            var form = $(this);
            form.block({
                message: null,
                overlayCSS: {
                    background: '#fff',
                    opacity: 0.6
                }
            });

            var formData = new FormData(form[0]);
            formData.append('add-to-cart', form.find('[name=add-to-cart]').val());

            // Ajax action.
            $.ajax({
                url: wc_add_to_cart_params.wc_ajax_url.toString().replace('%%endpoint%%', 'ace_add_to_cart'),
                data: formData,
                type: 'POST',
                processData: false,
                contentType: false,
                complete: function(response) {
                    response = response.responseJSON;

                    if (!response) {
                        return;
                    } else {

                        $('#pm_menu').addClass(whmcnotify.whmcpmopen);
                        $('.pm_overlay').addClass(whmcnotify.whmcpmshoe);
                        $('.pm_overlay').removeClass(whmcnotify.whmcpmhide);
                    }

                    if (response.error && response.product_url) {
                        window.location = response.product_url;
                        return;
                    }

                    // Redirect to cart option
                    if (wc_add_to_cart_params.cart_redirect_after_add === 'yes') {
                        window.location = wc_add_to_cart_params.cart_url;
                        return;
                    }

                    var $thisbutton = form.find('.single_add_to_cart_button');
                    $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);

                    // Remove existing notices
                    $('.woocommerce-error, .woocommerce-message, .woocommerce-info').remove();

                    // Add new notices
                    form.closest('.product').before(response.fragments.notices_html)

                    form.unblock();
                    $('.single_add_to_cart_button ').removeClass('whmc-spinner');
                    $('.single_add_to_cart_button ').addClass('added');

                }
            });
        });
    });

})(jQuery);