<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php
$PhotoBroad_values = get_option('PhotoBroad_framework_values');
if ( !is_array( $PhotoBroad_values ) ) $PhotoBroad_values = array();
if( array_key_exists( 'general_custom_favicon' , $PhotoBroad_values) && !empty( $PhotoBroad_values['general_custom_favicon'] ) ){ ?>
<link rel="shortcut icon" href="<?php echo $PhotoBroad_values['general_custom_favicon'];  ?>" />
<?php } ?>
<?php wp_head(); ?>
<?php
if( array_key_exists( 'style_custom_css' , $PhotoBroad_values) && !empty( $PhotoBroad_values['style_custom_css'] ) ){
echo '<style type="text/css">'."\n";
echo stripslashes( $PhotoBroad_values['style_custom_css'] )."\n";
echo '</style>'."\n";
}
?>
</head>
<body <?php body_class(); ?>>
	<div class="top-bar"></div>
	<div class="header clearfix">
		<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php
				if( array_key_exists( 'general_text_logo' , $PhotoBroad_values ) && $PhotoBroad_values['general_text_logo'] == 'on' ){
					echo esc_attr( get_bloginfo( 'name', 'display' ) );
				} else {
					if ( !empty( $PhotoBroad_values['general_custom_logo'] ) ){
						echo '<img src="'.get_bloginfo("template_url").'/timthumb.php?src='.$PhotoBroad_values['general_custom_logo'].'&amp;q=100&amp;h=41" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" />';
					} else {
			?>
				<img src="<?php echo get_bloginfo("template_url"); ?>/images/logo.png" width="157" height="41" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
			<?php
					}
				}
			?></a></h1>
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'menu' ) ); ?>
		<div class="sch"><?php get_search_form(); ?></div>
	</div>