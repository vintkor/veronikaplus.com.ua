<?php
/**
 * The template for displaying product widget entries
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
global $woocommerce;

$is_cart = null;
$cart_contents = $woocommerce->cart->cart_contents;
foreach ($cart_contents as $item) {
    if( $item['product_id'] == $product->id ) {
        $is_cart = true;
    }
}

?>

<div class="col-md-3 padding-0 one_product">
    <div <?php post_class(''); ?>>
    <?php
        $badges = get_field('product_badge');
        if( $badges ) {
            foreach ( $badges as $badge ) {
                echo '<span class="product_badge_' . $badge . '"></span>';
            }
        }
    ?>
	<a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="woocommerce-LoopProduct-link"></a>
	<?php echo $product->get_image(); ?>
	<h2 class="woocommerce-loop-product__title"><?php echo $product->get_name(); ?></h2>
	
	<?php //if ( ! empty( $show_rating ) ) : ?>
		<?php //echo wc_get_rating_html( $product->get_average_rating() ); ?>
	<?php //endif; ?>
    <?php
        echo '<div class="product_review">';
        echo '<img class="product_review_image" src="' . get_template_directory_uri() . '/app/img/heart.png">';
        echo '(' . $product->get_review_count() . ') Отзывов';
        echo "</div>";
    ?>
	<?php echo $product->get_price_html(); ?>
    <?php
        echo apply_filters( 'woocommerce_loop_add_to_cart_link',
            sprintf( '<a rel="nofollow" title="Добавить в корзину" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="add_to_cart_btn product_type_simple add_to_cart_button pull-right ajax_add_to_cart %s">
                    <img src="%s/app/img/cart-icon-btn.png">
                </a>',
                esc_url( $product->add_to_cart_url() ),
                esc_attr( isset( $quantity ) ? $quantity : 1 ),
                esc_attr( $product->get_id() ),
                esc_attr( $product->get_sku() ),
                esc_attr( ( $is_cart ) ? 'is_cart' : '' ),
                esc_html( get_template_directory_uri() )
            ),
        $product );
    ?>
    </div>
</div>
