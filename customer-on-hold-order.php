<?php
/**
 * Customer on-hold order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-on-hold-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

/*
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<?php
	/* translators: %s: Order ID. */
	echo '<h1 class="title">' . wp_kses_post( sprintf( __( 'Your Order #%s has been placed', 'woocommerce' ), $order->get_order_number() ) ) . '</h1>';
?>

<p class="on-hold-content"><?php esc_html_e( 'The ultimate natural energy boost is on its way. Straight to you. Soon you will enjoy B FNKY’s naturally ebergizing skincare. Enjoy every moment of it.', 'woocommerce' ); ?> <a href="<?php echo esc_url( $order->get_view_order_url() ) ?>"><?php _e('Track my order.', 'bfnky') ?></a></p>

<?php

/*
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
 * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
 * @since 2.5.0
 */
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );
?>

<div class="after-wrapper">
	<h3 class="after-wrapper__header"><?php _e('Need Help?', 'bfnky') ?></h3>
	<p style="margin-bottom: 0"><?php _e('Feel free to contact us with any questions you might have.', 'bfnky') ?></p>
	<p style="margin-bottom: 34px"><?php _e('Also, you can manage your account directly on our website!', 'bfnky') ?></p>
	<p><a class="button-1"><?php _e('Contact us', 'bfnky') ?></a></p>
</div>	

<div class="insta-wrapper">
	<h3 class="insta-wrapper__header"><?php _e('Follow us on Instagram @bfnky', 'bfnky') ?></h3>
	<?php $insta = get_field('gallery', 'option'); ?>
	<?php if($insta): ?>
		<div class="insta-wrapper__slide">
			<?php $i = 0 ?>
			<?php foreach($insta as $photo): ?>
				<div class="insta-wrapper__slide--photo" style="background-image: url(<?php echo $photo['photo']['sizes']['medium'] ?>)">
					<span class="insta-wrapper__slide--name">@<?php the_field('instagram-name', 'option') ?></span>
				</div>
				<?php $i++ ?>
				<?php if($i == 3): ?>
					<?php break ?>
				<?php endif ?>
			<?php endforeach ?>
		</div>
	<?php endif ?>
</div>	

<?php
/**
 * Show user-defined additional content - this is set in each email's settings.
 */
if ( $additional_content ) {
	echo wp_kses_post( wpautop( wptexturize( $additional_content ) ) );
}

/*
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
