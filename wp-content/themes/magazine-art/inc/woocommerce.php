<?php
/**
* Change WC hooks
*/

/**
* Layout
*
* @see  magazineart_before_content()
* @see  magazineart_after_content()
* @see  woocommerce_breadcrumb()
* @see  magazineart_shop_messages()
*/

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);  /* Remove the sidebar */
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
add_action('woocommerce_before_main_content', 'magazineart_before_content', 10);
add_action('woocommerce_after_main_content', 'magazineart_after_content', 10);

/* Remove Related Products and move it below product.*/
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action('woocommerce_after_single_product', 'woocommerce_output_related_products', 20);

/* Remove title on shop main */
add_filter('woocommerce_show_page_title', 'magazineart_woocommerce_hide_page_title');


/**
* Remove title on shop main
*
* @return bool
*/
function magazineart_woocommerce_hide_page_title()
{
    return false;
}
add_filter('woocommerce_breadcrumb_defaults', 'magazineart_woocommerce_breadcrumbs');
function magazineart_woocommerce_breadcrumbs()
{
    return array(
                'delimiter'   => '  ',
                'wrap_before' => ' <ul id="breadcrumbs" class="breadcrumbs woocommerce-breadcrumb" itemprop="breadcrumb">',
                'wrap_after'  => '</ul> ',
                'before'      => '<li class="item-home">',
                'after'       => '</li>',
                'home'        => _x('Home', 'breadcrumb', 'magazine-art'),
              );
            }


if (! function_exists('magazineart_before_content')) {
    /**
    * Before Content
    * Wraps all WooCommerce content in wrappers which match the theme markup
    *
    * @since   1.0.0
    * @return  void
    */
    function magazineart_before_content()
    {?>
      <div  class="sub_banner" >
        <div  class="top-bar" >
          <div class="top-bar-left top-bar-title">
            <h1 class="text-uppercase text-center medium-text-left large-text-left"><?php woocommerce_page_title(); ?></h1>
          </div>
          <div class="top-bar-right">
            <div class="breadcrumb-wrap">
            <?php woocommerce_breadcrumb(); ?>
          </div>
        </div>
      </div>
      </div>
      <div class="grid-container shop-main-warp  ">
        <div class="grid-x grid-padding-x">
          <div class="cell large-auto small-24">
    <?php
    }
}

if (! function_exists('magazineart_after_content')) {
    /**
    * After Content
    * Closes the wrapping divs
    *
    * @since   1.0.0
    * @return  void
    */
    function magazineart_after_content()
    {
      ?>
  </div>
  </div>
  </div>
<?php
    }
}


if (! function_exists('magazineart_content_wrapper_start')) {
    /**
    * Before single Content
    *
    * @since   1.0.0
    * @return  void
    */
    function magazineart_content_wrapper_start()
    {
        echo ' <div class="single-product-warp">';
    }
}

if (! function_exists('magazineart_content_wrapper_end')) {
    /**
    * After Content
    * Closes the wrapping divs
    *
    * @since   1.0.0
    * @return  void
    */
    function magazineart_content_wrapper_end()
    {
        echo "</div>";
    }
}
