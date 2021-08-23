<?php
/**
 * Email Styles
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-styles.php.
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
	exit;
}

// Load colors.
$bg        = get_option( 'woocommerce_email_background_color' );
$body      = get_option( 'woocommerce_email_body_background_color' );
$base      = get_option( 'woocommerce_email_base_color' );
$base_text = wc_light_or_dark( $base, '#202020', '#ffffff' );
$text      = get_option( 'woocommerce_email_text_color' );

// Pick a contrasting color for links.
$link_color = wc_hex_is_light( $base ) ? $base : $base_text;

if ( wc_hex_is_light( $body ) ) {
	$link_color = wc_hex_is_light( $base ) ? $base_text : $base;
}

$bg_darker_10    = wc_hex_darker( $bg, 10 );
$body_darker_10  = wc_hex_darker( $body, 10 );
$base_lighter_20 = wc_hex_lighter( $base, 20 );
$base_lighter_40 = wc_hex_lighter( $base, 40 );
$text_lighter_20 = wc_hex_lighter( $text, 20 );
$text_lighter_40 = wc_hex_lighter( $text, 40 );

// !important; is a gmail hack to prevent styles being stripped if it doesn't like something.
// body{padding: 0;} ensures proper scale/positioning of the email in the iOS native email app.
?>

#wrapper {
	background-color: <?php echo esc_attr( $bg ); ?>;
	margin: 0;
	padding: 70px 0;
	-webkit-text-size-adjust: none !important;
	width: 100%;
}

#template_container {
	box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1) !important;
	background-color: <?php echo esc_attr( $body ); ?>;
	border: 1px solid <?php echo esc_attr( $bg_darker_10 ); ?>;
	border-radius: 3px !important;
}

#template_header {
	background-color: <?php echo esc_attr( $base ); ?>;
	border-radius: 3px 3px 0 0 !important;
	color: <?php echo esc_attr( $base_text ); ?>;
	border-bottom: 0;
	font-weight: bold;
	line-height: 100%;
	vertical-align: middle;
	font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
}

#template_header h1,
#template_header h1 a {
	color: <?php echo esc_attr( $base_text ); ?>;
	background-color: inherit;
}

#template_header_image img {
	width: 150px;
	height: auto;
	display: block;
	margin: auto;
}

#template_footer #credit {
	border: 0;
	color: <?php echo esc_attr( $text_lighter_40 ); ?>;
	font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
	font-size: 12px;
	line-height: 150%;
	text-align: center;
	padding: 24px 0;
}

#template_footer #credit p {
	margin: 0 0 16px;
}

#body_content {
	background-color: <?php echo esc_attr( $body ); ?>;
}

.link {
	color: <?php echo esc_attr( $link_color ); ?>;
}

#header_wrapper {
	padding: 36px 48px;
	display: block;
}

a {
	color: <?php echo esc_attr( $link_color ); ?>;
	font-weight: normal;
	text-decoration: underline;
}

img {
	border: none;
	display: inline-block;
	font-size: 14px;
	font-weight: bold;
	height: auto;
	outline: none;
	text-decoration: none;
	text-transform: capitalize;
	vertical-align: middle;
	margin-<?php echo is_rtl() ? 'left' : 'right'; ?>: 10px;
	max-width: 100%;
	height: auto;
}

.insta-wrapper__slide--photo::before {
	content: "";
	background-image: url("../../img/svg/instagram-icon.svg");
	height: 20px;
	width: 20px;
	position: absolute;
	left: 10px;
	top: 10px;
	display: block;
	background-size: contain;
	background-position: center;
}

* {
	font-family: 'AktivGroteskCorp', sans-serif;
	font-size: 14px;
	line-height: 28px;
	color: black;
	margin-top: 0;
}

.title {
	font-weight: 400;
	color: black;
	line-height: 61.7px;
	font-size: 46px;
	letter-spacing: -2.3px;
	margin-bottom: 20px;
	margin-top: 2.5em;
}

.on-hold-content {
	margin: 3em 0;
}

.addresses__wrapper {
	display: flex!important;
	justify-content: space-between!important;
}

.addresses__wrapper--shipping, .addresses__wrapper--billing {
	width: 50%;
} 

.addresses__wrapper--shipping h2, .addresses__wrapper--billing h2 {
	margin: 0;
} 

.productlist__header {
	border-bottom: solid 1px black;
	margin-bottom: 2em;
	margin-top: 5em;
}

.productlist__header--recap {
	font-size: 26px;
	letter-spacing: -0.5px;
	display: inline-block;
}

.productlist__header--track {
	font-size: 18px;
	color: #4AEB70;
	float: right;
	display: inline-block;
}

.productlist__wrapper {
	min-height: 110px;
	position: relative;
}

.productlist__wrapper--image {
	width: 110px;
	height: 110px;
	padding-right: 50px;
	display: inline-block;
	vertical-align: top;
}

.productlist__wrapper--content {
	display: inline-block;
	vertical-align: top;
	width: 70%;
}

.productlist__wrapper--image img {
	width: 100%;
}

.productlist__wrapper--content--title {
	margin-bottom: 0;	
	font-weight: bold;
}

.productlist__wrapper--content--price {
	position: absolute;
	bottom: 0;
	margin-bottom: 0;
}

.ordersummary {
	width: 100%;
	padding-top: 1em;
	padding-bottom: 1em;
	border-top: solid 1px black;
	margin-top: 2em;
}

.ordersummary--right {
	text-align: right;
}

.after-wrapper {
	text-align: center;
	margin-top: 3em;
}

.button-1 {
	font-weight: 400;
	font-size: 11.2px;
	letter-spacing: 1.5px;
	line-height: 16px;
	text-transform: uppercase;
	display: inline-block;
	text-align: center;
	color: white !important;
	padding: 20px 48px;
	background-color: black;
	border-radius: 0;
	transition-duration: 0.4s;
	border: none;
	text-decoration: none;
}

.after-wrapper__header {
	font-weight: 400;
	color: black;
	margin-bottom: 16px;
	line-height: 42px;
	font-size: 26px;
	letter-spacing: -0.5px;
}

address {
	font-style: normal;
}

body {
	padding: 0;
	width: 600px;
	margin: auto;
	display: block;
}

.footer {
	padding: 2em;
	background-color: black;
}

.footer * {
	color: white;
	font-size: 11px;
	margin-bottom: 0;
}

.insta-wrapper {
	padding: 2em;
	margin-top: 5em;
	background-color: #F9F9F9;
}

.insta-wrapper__slide {
	display: flex!important;
	justify-content: space-between!important;
	margin: 0 -10px;
}

.insta-wrapper__header {
	color: black;
	font-weight: 400;
	font-size: 18px;
	font-stretch: normal;
	line-height: 46px;
	letter-spacing: -0.78px;
	text-align: center;
	margin-bottom: 5px;
}

.insta-wrapper__slide--photo {
	width: 33%;
	height: 180px;
	background-size: cover;
	background-position: center;
	margin: 0 10px;
	position: relative;
}

.insta-wrapper__slide--name {
	transform: rotate(270deg);
	color: white;
	font-size: 7px;
	position: absolute;
	left: 5px;
	bottom: 15px;
	letter-spacing: 0.54px;
}
<?php
