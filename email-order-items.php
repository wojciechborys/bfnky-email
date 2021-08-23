<?php
/**
 * Email Order Items
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-order-items.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

$text_align  = is_rtl() ? 'right' : 'left';
$margin_side = is_rtl() ? 'left' : 'right'; ?>

<div class="productlist__header">
	<p class="productlist__header--recap"><?php _e('Order', 'bfnky') ?></p>
	<a class="productlist__header--track" href="<?php echo esc_url( $order->get_view_order_url() ) ?>"><?php _e('Track order', 'bfnky') ?></a>
</div>

<?php 
	foreach ( $items as $item_id => $item ) :
		$product       = $item->get_product();
		$sku           = '';
		$purchase_note = '';
		$image         = '';

		if ( ! apply_filters( 'woocommerce_order_item_visible', true, $item ) ) {
			continue;
		}

		if ( is_object( $product ) ) {
			$sku           = $product->get_sku();
			$purchase_note = $product->get_purchase_note();
			$image         = $product->get_image( $image_size );
		}

		?>
		<div class="<?php echo esc_attr( apply_filters( 'woocommerce_order_item_class', 'order_item', $item, $order ) ); ?>">
			
			<div class="productlist__wrapper">
				<div class="productlist__wrapper--image">
					<?php if ( $show_image ) {
						echo wp_kses_post( apply_filters( 'woocommerce_order_item_thumbnail', $image, $item ) );
					} ?>
				</div>

				<div class="productlist__wrapper--content">
					<p class="productlist__wrapper--content--title">
					<?php			
					// Product name.
					echo wp_kses_post( apply_filters( 'woocommerce_order_item_name', $item->get_name(), $item, false ) ); ?>
					</p>

					<p class="productlist__wrapper--content--quantity"><?php echo __('Quantity: ', 'bfnky') . wp_kses_post( apply_filters( 'woocommerce_email_order_item_quantity', $item->get_quantity(), $item ) ); ?></p>

					<?php // allow other plugins to add additional product information here.
					do_action( 'woocommerce_order_item_meta_start', $item_id, $item, $order, $plain_text );

					wc_display_item_meta( $item, array(
						'label_before' => '<strong class="wc-item-meta-label" style="float: left; margin-right: .25em; clear: both">',
					) );

					// allow other plugins to add additional product information here.
					do_action( 'woocommerce_order_item_meta_end', $item_id, $item, $order, $plain_text );

					?>
				<div>

				<p class="productlist__wrapper--content--price"><?php echo wp_kses_post( wc_price( round( $item->get_subtotal(), wc_get_price_decimals() ) ) ); ?></p>
			</div>
		</div>
		<?php

		if ( $show_purchase_note && $purchase_note ) {
			?>
			<div>
				<div>
					<?php
					echo wp_kses_post( wpautop( do_shortcode( $purchase_note ) ) );
					?>
				</div>
			</div>

			<?php
		}
		?>

	<?php endforeach; ?>
