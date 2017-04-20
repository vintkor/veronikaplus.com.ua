<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if( is_single() ):?>
<div class="col-md-12">
    <div class="row">
<?php else: ?>
<div class="col-md-3 col-sm-4 widget__filter">
<?php dynamic_sidebar('woo_filter'); ?>
</div>
<div class="col-md-9 col-sm-8">
    <div class="row">
<?php endif; ?>
