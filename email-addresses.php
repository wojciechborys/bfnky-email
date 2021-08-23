<?php
/**
 * Email Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-addresses.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$text_align = is_rtl() ? 'right' : 'left';
$address    = $order->get_formatted_billing_address();
$shipping   = $order->get_formatted_shipping_address(); ?>

<div id="addresses">
	<div class="addresses__wrapper">
		<div class="addresses__wrapper--billing">
			<h2><?php esc_html_e( 'Billing address', 'woocommerce' ); ?></h2>

			<address class="address">
				<?php echo wp_kses_post( $address ? $address : esc_html__( 'N/A', 'woocommerce' ) ); ?>
				<?php if ( $order->get_billing_phone() ) : ?>
					<?php echo wc_make_phone_clickable( $order->get_billing_phone() ); ?>
				<?php endif; ?>
				<?php if ( $order->get_billing_email() ) : ?>
					<?php echo esc_html( $order->get_billing_email() ); ?>
				<?php endif; ?>
			</address>
		</div>
		<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() && $shipping ) : ?>
			<div class="addresses__wrapper--shipping">
				<h2><?php esc_html_e( 'Shipping address', 'woocommerce' ); ?></h2>

				<address class="address"><?php echo wp_kses_post( $shipping ); ?></address>
			</div>
		<?php endif; ?>
	</div>
</div>
