<?php
/**
 * Email Header
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-header.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 4.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
		<title><?php echo get_bloginfo( 'name', 'display' ); ?></title>
		<style>
			@font-face {
				font-family: "AktivGroteskCorp";
				src: url("../../fonts/AktivGroteskCorp-Bold.woff2") format("woff2");
				font-style: normal;
				font-weight: 700;
			}

			@font-face {
				font-family: "AktivGroteskCorp";
				src: url("../fonts/AktivGroteskCorp-Regular.woff2") format("woff2");
				font-style: normal;
				font-weight: 400;
			}

			@font-face {
				font-family: "AktivGroteskCorp";
				src: url("../../fonts/AktivGroteskCorp-Medium.woff2") format("woff2");
				font-style: normal;
				font-weight: 500;
			}

		</style>
	</head>
	<body>
		<div id="wrapper" dir="<?php echo is_rtl() ? 'rtl' : 'ltr'; ?>">
			<div id="template_header_image">
				<?php if ( $img = get_option( 'woocommerce_email_header_image' ) ) {
					echo '<p style="margin-top:0;"><img src="' . esc_url( $img ) . '" alt="' . get_bloginfo( 'name', 'display' ) . '" /></p>';
				} ?>
			</div>
