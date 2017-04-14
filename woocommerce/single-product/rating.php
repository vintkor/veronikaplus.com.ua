<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.3.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

$brand = $product->get_attribute( 'pa_brand' );
echo ( $brand ) ? '<p class="product_brand">' . $brand . "</p>" : '<p class="product_brand product_brand-hidden">.</p>';

if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' )
	return;

echo '<div class="product_review">';
echo '<img class="product_review_image" src="' . get_template_directory_uri() . '/app/img/heart.png">';
echo '(' . $product->get_review_count() . ') Отзывов';
echo "</div>";
