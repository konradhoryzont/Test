<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package coach
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<title>Vineta - Multipurpose eCommerce</title>
	<meta name="author" content="themesflat.com">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description"
		content="Themesflat Vineta - A modern and versatile eCommerce template designed for various online stores, including fashion, furniture, electronics, and more. SEO-friendly, fast-loading, and highly customizable.">
<!-- font -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/fonts.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/font-icons.css">
<!-- css -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/swiper-bundle.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/animate.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/styles.css">


	<!-- Favicon and Touch Icons  -->
	<link rel="shortcut icon" href="images/logo/favicon.png">
	<link rel="apple-touch-icon-precomposed" href="images/logo/favicon.png">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'coach' ); ?></a>

	<header id="header" class="header-default">
	<!-- <header id="masthead" class="site-header"> -->
		

		
	<!-- #masthead -->
	<!-- </header> -->

	<body class="font-4 primary-4">

  <!-- RTL -->
  <a href="javascript:void(0);" id="toggle-rtl" class="tf-btn animate-btn"><span>RTL</span></a>
  <!-- /RTL  -->

  <!-- Scroll Top -->
  <button id="goTop">
    <span class="border-progress"></span>
    <span class="icon icon-arrow-right"></span>
  </button>

  <!-- preload -->
  <div class="preload preload-container">
    <div class="preload-logo">
      <div class="spinner"></div>
    </div>
  </div>
  <!-- /preload -->

  <div id="wrapper">
    <!-- Header -->
    <!-- <header id="header" class="header-default"> -->
            <div class="container">
                <div class="row wrapper-header align-items-center">
                    <div class="col-md-4 col-3 d-xl-none">
                        <a href="#mobileMenu" class="mobile-menu" data-bs-toggle="offcanvas" aria-controls="mobileMenu">
                            <i class="icon icon-categories1"></i>
                        </a>
                    </div>
                    <div class="col-xl-2 col-md-4 col-6">
						<div class="site-branding">
								<?php
								the_custom_logo();
								if ( is_front_page() && is_home() ) :
									?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php
								else :
									?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
									<?php
								endif;
								$coach_description = get_bloginfo( 'description', 'display' );
								if ( $coach_description || is_customize_preview() ) :
									?>
									<p class="site-description"><?php echo $coach_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
								<?php endif; ?>
							</div><!-- .site-branding -->
                        <!-- <a href="index.html" class="logo-header">
                            <img src="images/bannerlogo.png" alt="logo" class="logo">
                        </a> -->
                    </div>

			

						<div class="col-xl-8 d-none d-xl-block">

							

							<nav class="box-navigation text-center">
								<ul class="box-nav-menu">
									<?php
									$menu_name = 'primary';
									if ( has_nav_menu( $menu_name ) ) {
										wp_nav_menu( array(
											'theme_location' => $menu_name,
											'container'      => false,
											'items_wrap'     => '%3$s',
											'walker'         => new Simple_Menu_Walker(),
											'depth'          => 0
										));
									} else {
										// Fallback jeśli nie ma menu
										echo '<li class="menu-item"><a href="' . home_url() . '" class="item-link">Home</a></li>';
										echo '<li class="menu-item"><a href="#" class="item-link">Menu nie przypisane</a></li>';
									}
									?>
								</ul>
							</nav>
						</div>
                    <div class="col-xl-2 col-md-4 col-3">
                        <ul class="nav-icon d-flex justify-content-end align-items-center">
                            <li class="nav-search">
                                <a href="#search" data-bs-toggle="modal" class="nav-icon-item">
                                    <i class="icon icon-search"></i>
                                </a>
                            </li>
                            <li class="nav-account">
                                <a href="#login" data-bs-toggle="offcanvas" aria-controls="login" class="nav-icon-item">
                                    <i class="icon icon-user"></i>
                                </a>
                            </li>
                            <li class="nav-wishlist">
                                <a href="wish-list.html" class="nav-icon-item">
                                    <i class="icon icon-heart"></i>
                                    <span class="count-box">0</span>
                                </a>
                            </li>
                            <li class="nav-cart">
                                <a href="#shoppingCart" data-bs-toggle="offcanvas" class="nav-icon-item">
                                    <i class="icon icon-cart"></i>
                                    <span class="count-box">0</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- /Header -->
