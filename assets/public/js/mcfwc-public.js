!(function(s, e, t, i) {
    "use strict";

    function o(e, t) {
        (this.$body = s("body")),
        (this.$clbtn = s(".cloasebtn")),
        (this.$keepshop = s(".whmckeepshooping")),
        (this.$elem = s(e)),
        (this.options = s.extend({}, this.config, t)),
        (this.$toggler = this.$body.find(this.options.button || ".open")),
        this.initialize();
    }
    (o.prototype.classes = {
        show: "pm_show",
        hide: "pm_hide",
        overlay: "pm_overlay",
        open: "pm_open"
    }),
    (o.prototype.initialize = function() {
        if ((this.initializeEvents(), this.$body.find("." + this.classes.overlay).length < 1)) {
            var e = s("<div>").addClass(this.classes.overlay + " " + this.classes.hide);
            this.$body.append(e);
        }
    }),
    (o.prototype.initializeEvents = function() {
        var s = this;
        this.$toggler.on("click", function() {
                s.toggleMenu("show");
            }),
            this.$clbtn.on("click", function() {
                s.toggleMenu("hide");
            }),
            this.$keepshop.on("click", function() {
                s.toggleMenu("hide");
            }),
            this.$body.on("click", "." + s.classes.overlay, function() {
                s.toggleMenu("hide");
            }),
            this.$clbtn.on("click", "." + s.classes.overlay, function() {
                s.toggleMenu("hide");
            }),
            this.$keepshop.on("click", "." + s.classes.overlay, function() {
                s.toggleMenu("hide");
            });
    }),
    (o.prototype.toggleMenu = function(s) {
        var e = "show" == s ? "addClass" : "removeClass";
        this.$elem[e](this.classes.open), this.toggleOverlay(s);
    }),
    (o.prototype.toggleOverlay = function(s) {
        var e = this,
            t = e.$body.find("." + e.classes.overlay);
        "show" == s
            ?
            t.addClass(e.classes.show).removeClass(e.classes.hide) :
            (t.removeClass(this.classes.show),
                setTimeout(function() {
                    t.addClass(e.classes.hide);
                }, 500));
    }),
    (s.fn.pushmenu = function(s) {
        return this.each(function() {
            new o(this, s);
        });
    });
})(jQuery, window, document),
(function(s) {
    "use strict";
    s("#pm_menu").pushmenu({
        button: "#open"
    }), s("#pm_menu").pushmenu({
        button: ".cart_menu_li"
    });
})(jQuery);


(function($) {
    "use strict";
    jQuery(function($) {
        $(document.body).on('wc_fragments_refreshed', function() {
            $('.shopping-cart').css('opacity', 1);
            $('.cart_menu_li').css('opacity', 1);
        });
    });

})(jQuery);

(function($) {
    "use strict";

    $(document).ready(function() {
        //Block cart on fragment refresh
        $(document.body).on('wc_fragment_refresh', block_cart);

        //Block Cart
        function block_cart() {

            $('.whmc-body').addClass('whmc-loader');
        }

        //Unblock cart
        function unblock_cart() {

            $('.whmc-body').removeClass('whmc-loader');

        }
        //Unblock cart
        $(document.body).on('wc_fragments_refreshed wc_fragments_loaded updated_checkout', function() {

            unblock_cart();

        });


        // refresh fragment on document load
        $(document.body).trigger('wc_fragment_refresh');
        var ajaxUrl = whmc_frontend_js_obj.ajax_url;
        var wpNonce = whmc_frontend_js_obj.ajax_nonce;

        $(document).on('click', '.whmc-remove', function(e) {
            e.preventDefault();

            $('.whmc-body').addClass('whmc-loader');

            var cart_item_id = $(this).attr("data-cart_item_id"),
                cart_item_key = $(this).attr("data-cart_item_key"),
                product_container = $(this).parents('.whmc-body');

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: ajaxUrl,
                data: {
                    action: "remove_item",
                    cart_item_id: cart_item_id,
                    cart_item_key: cart_item_key,
                    wp_nonce: wpNonce
                },
                success: function(response) {

                    if (!response || response.error) {
                        return;
                    }
                    var fragments = response.fragments;

                    // Replace fragments
                    if (fragments) {
                        $.each(fragments, function(key, value) {
                            $(key).replaceWith(value);
                        });
                    }


                },
                complete: function() {
                    $(document.body).trigger('wc_fragments_refreshed');
                    $('.whmc-body').removeClass('whmc-loader');
                    $(".whmc-cpn-resp").html("Product remove Successfully");
                    $(".whmc-cpn-resp").fadeIn().delay(2000).fadeOut();
                    $(".whmc-cpn-resp").css({
                        'background-color': '#0f834d',
                        'color': '#fff'
                    });
                }
            });
        });

        $(document.body).trigger('wc_fragment_refresh');
        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: {
                action: 'get_refresh_fragments',
                wp_nonce: wpNonce
            },
            success: function(response) {

                if (response.fragments) {

                    //Set fragments
                    $.each(response.fragments, function(key, value) {
                        $(key).replaceWith(value);
                    });

                    if (('sessionStorage' in window && window.sessionStorage !== null)) {

                        sessionStorage.setItem(wc_cart_fragments_params.fragment_name, JSON.stringify(response.fragments));
                        sessionStorage.setItem(wc_cart_fragments_params.cart_hash_key, response.cart_hash);
                        localStorage.setItem(wc_cart_fragments_params.cart_hash_key, response.cart_hash);

                        if (response.cart_hash) {
                            sessionStorage.setItem('wc_cart_created', (new Date()).getTime());
                        }
                    }
                    $(document.body).trigger('wc_fragments_refreshed');
                }
            },
            complete: function() {
                $(document.body).trigger('wc_fragments_refreshed');
            }
        });


        // Apply Discount Coupons
        $('body').find('.whmc-coupon-submit').on('click', function(e) {
            e.preventDefault();
            var couponCode = jQuery("#whmc-coupon-code").val();
            var couponsd = jQuery("#whmc-coupon-code");
            var $button = $(this);
            $button.addClass('whmc-button-loading');
            $.ajax({
                url: ajaxUrl,
                type: 'POST',
                data: {
                    action: "add_coupon_code",
                    couponCode: couponCode,
                    wp_nonce: wpNonce
                },
                success: function(response) {
                    $(".whmc-cpn-resp").html(response.msg);
                    if (response.result == 'not valid' || response.result == 'already applied') {
                        $(".whmc-cpn-resp").css({
                            'background-color': '#e2401c',
                            'color': '#fff'
                        });

                    } else {
                        $(".whmc-cpn-resp").css({
                            'background-color': '#0f834d',
                            'color': '#fff'
                        });
                    }
                    $button.removeClass('whmc-button-loading');
                    $('.whmc-coupon-field').find('#whmc-coupon-code').val('');
                    $('.whmc-coupon').removeClass('sidecartright').delay(10000);
                    $(".whmc-cpn-resp").delay(2000).slideDown();

                },

                complete: function() {
                    $(document.body).trigger('wc_fragment_refresh');

                    $(".whmc-cpn-resp").delay(2000).slideUp();

                }

            });
            //$('.whmc-coupon-field').find('#whmc-coupon-code').val('');

        });



        // Remove Applied Discount Coupons
        $('body').on('click', '.whmc-remove-cpn', function() {
            $('.whmc-body').addClass('whmc-loader');
            var couponCode = $(this).parent('li').attr('cpcode');

            $.ajax({
                url: ajaxUrl,
                type: 'POST',
                data: {
                    action: "remove_coupon_code",
                    couponCode: couponCode,
                    wp_nonce: wpNonce
                },
                success: function(response) {
                    $(".whmc-cpn-resp").html(response);
                    $(".whmc-cpn-resp").css({
                        'background-color': '#0f834d',
                        'color': '#fff'
                    });
                    $(".whmc-cpn-resp").delay(2000).slideDown();
                    $('.whmc-coupon').removeClass('sidecartright').delay(10000);
                    $('.whmc-body').removeClass('whmc-loader');
                },
                complete: function() {
                    $(document.body).trigger('wc_fragment_refresh');

                    $(".whmc-cpn-resp").delay(2000).slideUp();

                }

            });

        });


        /* Increment Cart Item Quantity */
        $("body").on("click", ".whmc-qty-plus", function(e) {

            var input = $(this).closest('.whmc-cart-items').find("input.whmc-qty:not(:disabled)");

            if (input) {
                var pre = parseInt(input.val());
                input.val(pre + 1);
                input.trigger("change");
            }

        });

        /* Decrement Cart Item Quantity */
        $("body").on("click", ".whmc-qty-minus", function(e) {

            var input = $(this).closest('.whmc-cart-items').find("input.whmc-qty:not(:disabled)");

            if (input) {
                var pre = parseInt(input.val()) - 1;

                // Do Nothing if Only 1 Item Left in Cart
                if (pre > 0) {
                    input.val(pre);
                    input.trigger("change");
                }
            }
        });

        // Quantity change 
        $('body').on('change', 'input[name="whmc-qty-input"]', function() {

            $('.whmc-body').addClass('whmc-loader');
            var item_id = $(this).closest('.whmc-cart-items').data('itemid');
            var qty = $(this).val();
            var ckey = $(this).closest('.whmc-cart-items').data('ckey');

            $(this).prop('disabled', true);

            $.ajax({
                url: ajaxUrl,
                type: 'POST',
                data: 'action=change_item_qty&ckey=' + ckey + '&qty=' + qty + '&wp_nonce=' + wpNonce,
                success: function(response) {

                    $(".whmc-cpn-resp").html(response.msgup);

                    $(".whmc-cpn-resp").css({
                        'background-color': '#0f834d',
                        'color': '#fff'
                    });
                    $(this).prop('disabled', false);
                    $('.whmc-body').removeClass('whmc-loader');
                    $(".whmc-cpn-resp").delay(2000).slideDown();
                },
                complete: function() {
                    $(document.body).trigger('wc_fragment_refresh');

                    $(".whmc-cpn-resp").delay(2000).slideUp();

                }

            });

        });
    });

})(jQuery);




jQuery(document).ready(function($) {
    'use strict';

    function add_loader() {
        $('.whmc-carts-content').addClass('whmc-processing');
    }

    //Shipping
    /**
     * Object to handle AJAX calls for cart shipping changes.
     */
    var cart_shipping = {

        /**
         * Initialize event handlers and UI state.
         */
        init: function() {
            this.toggle_shipping = this.toggle_shipping.bind(this);
            this.shipping_method_selected = this.shipping_method_selected.bind(this);
            this.shipping_calculator_submit = this.shipping_calculator_submit.bind(this);

            $(document).on(
                'click',
                '.shipping-calculator-button',
                this.toggle_shipping
            );
            $(document).on(
                'change',
                'select.shipping_method, :input[name^=shipping_method]',
                this.shipping_method_selected
            );
            $(document).on(
                'submit',
                'form.woocommerce-shipping-calculator',
                this.shipping_calculator_submit
            );

            $('.shipping-calculator-form').hide();
        },

        /**
         * Toggle Shipping Calculator panel
         */
        toggle_shipping: function() {
            $(document.body).trigger('country_to_state_changed');
            return false;
        },

        /**
         * Handles when a shipping method is selected.
         */
        shipping_method_selected: function() {
            var shipping_methods = {};

            $('select.shipping_method, :input[name^=shipping_method][type=radio]:checked, :input[name^=shipping_method][type=hidden]').each(function() {
                shipping_methods[$(this).data('index')] = $(this).val();
            });

            add_loader();

            var data = {
                security: whmc_frontend_js_obj.update_shipping_method_nonce,
                shipping_method: shipping_methods
            };

            $.ajax({
                type: 'post',
                url: whmc_frontend_js_obj.wc_ajax_url.toString().replace('%%endpoint%%', 'update_shipping_method'),
                data: data,
                dataType: 'html',
                success: function(response) {
                    $(document.body).trigger('wc_fragment_refresh');

                },
                complete: function() {
                    $(document.body).trigger('updated_shipping_method');
                    $('.whmc-modal').removeClass('sidecartright').delay(10000);
                    $(".whmc-cpn-resp").html("Address update");
                    $(".whmc-cpn-resp").fadeIn().delay(2000).fadeOut();
                    $(".whmc-cpn-resp").css({
                        'background-color': '#0f834d',
                        'color': '#fff'
                    });
                }
            });
        },

        /**
         * Handles a shipping calculator form submit.
         *
         * @param {Object} evt The JQuery event.
         */
        shipping_calculator_submit: function(evt) {
            evt.preventDefault();

            var $form = $(evt.currentTarget);

            add_loader();

            // Provide the submit button value because wc-form-handler expects it.
            $('<input />').attr('type', 'hidden')
                .attr('name', 'calc_shipping')
                .attr('value', 'x')
                .appendTo($form);

            // Make call to actual form post URL.
            $.ajax({
                type: $form.attr('method'),
                url: $form.attr('action'),
                data: $form.serialize(),
                dataType: 'html',
                success: function(response) {
                    $(".whmc-cpn-resp").html("Address update");
                    $(".whmc-cpn-resp").fadeIn().delay(2000).fadeOut();
                    $(".whmc-cpn-resp").css({
                        'background-color': '#0f834d',
                        'color': '#fff'
                    });
                    $(document.body).trigger('wc_fragment_refresh');
                    $('.whmc-modal').removeClass('sidecartright').delay(10000);
                },

            });
        }
    };

    if (!(window.wc_checkout_params && wc_checkout_params.is_checkout === "1") && !window.wc_cart_params) {
        cart_shipping.init();
    }

    $(document.body).on('updated_shipping_method', function() {
        $(document.body).trigger('wc_fragment_refresh');

    });


})