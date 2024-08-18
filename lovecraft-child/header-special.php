<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">

		<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<?php
		if ( function_exists( 'wp_body_open' ) ) {
			wp_body_open();
		}
		?>


		<!-- <header class="header-wrapper grad-header"> -->
			<header class="hdr">

			<!-- <div class="header section small-padding"> -->

				<!-- <div class="section-inner hdr-inner"> -->
					<div class="hdr-inner">

				<!-- Qui comincia l'header originale -->
					<?php

					$custom_logo_id 	= get_theme_mod( 'custom_logo' );
					$legacy_logo_url 	= get_theme_mod( 'lovecraft_logo' );
					$blog_title_elem 	= ( ( is_front_page() || is_home() ) && ! is_page() ) ? 'h1' : 'div';
					$blog_title_class 	= $custom_logo_id ? 'blog-logo' : 'blog-title';

					$blog_title 		= get_bloginfo( 'title' );
					$blog_description 	= get_bloginfo( 'description' );

					if ( $custom_logo_id  || $legacy_logo_url ) :

						$custom_logo_url = $legacy_logo_url ? $legacy_logo_url : wp_get_attachment_image_url( $custom_logo_id, 'full' );

						?>
						<div class="<?php echo esc_attr( $blog_title_class ); ?>">
							<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img src="<?php echo esc_url( $custom_logo_url ); ?>">
								<span class="screen-reader-text"><?php echo $blog_title; ?></span>
							</a>
							<!-- <div class="blog-tagline">Visual footnotes to Wir Kinder vom Bahnhof Zoo</div> -->
							<?php if ( $blog_description ) : ?>
								<p class="blog-tagline"><?php echo $blog_description; ?></p>
							<?php endif; ?>
						</div>

						<!-- hard coded tag-line -->



						<!-- fine hard coded tag-line -->

					<?php elseif ( $blog_description || $blog_title ) : ?>

						<!-- Titolo dinamico -->
												<<?php echo $blog_title_elem; ?> class="<?php echo esc_attr( $blog_title_class ); ?>">
													<a href="<?php echo esc_url( home_url() ); ?>" rel="home"><?php echo $blog_title; ?></a>
												</<?php echo $blog_title_elem; ?>>

												<?php if ( $blog_description ) : ?>
													<h4 class="blog-tagline"><?php echo $blog_description; ?></h4>
												<?php endif; ?>
						<!-- Titolo dinamico -->

					<?php endif; ?>

					<!-- Qui comincia l'header hard coded -->
<!-- .hdr-inner -->

<!-- .hdr-inner -->





			<!-- </div> --> <!-- .header -->




			<div class="toggles group"><!-- .toggles -->

				<button type="button" class="nav-toggle toggle">
					<div class="bar"></div>
					<div class="bar"></div>
					<div class="bar"></div>
					<span class="screen-reader-text"><?php _e( 'Toggle the mobile menu', 'lovecraft' ); ?></span>
				</button>
				<!-- niente search form per questo header -->

				<!-- niente search form per questo header -->
			</div><!-- .toggles -->


			<!-- MOBILE/main menu-->
			<ul class="main-menu">

				<?php if ( has_nav_menu( 'primary' ) ) {

					$menu_args = array(
						'container' 		=> '',
						'items_wrap' 		=> '%3$s',
						'theme_location' 	=> 'primary',
					);

					wp_nav_menu( $menu_args );

				} else {

					$list_pages_args = array(
						'container' => '',
						'title_li' 	=> '',
					);

					wp_list_pages( $list_pages_args );

				} ?>
				<!-- MOBILE/main menu-->




			<!-- dentro a header INIZIO -->
			<div class="navi">



						</div><!-- .navi -->
							<!-- dentro a header FINE -->


						</div><!-- .website-title -->



</div><!-- .hdr-inner -->



<!-- TEST navigazione book -->

<!-- TEST navigazione book -->


		</header><!-- .header-wrapper -->


		<!-- TEST navigazione book -->

		<!-- MOBILE menu-->
		<ul class="mobile-menu">

			<?php if ( has_nav_menu( 'primary' ) ) {

				$menu_args = array(
					'container' 		=> '',
					'items_wrap' 		=> '%3$s',
					'theme_location' 	=> 'primary',
				);

				wp_nav_menu( $menu_args );

			} else {

				$list_pages_args = array(
					'container' => '',
					'title_li' 	=> '',
				);

				wp_list_pages( $list_pages_args );

			} ?>
			<!-- MOBILE menu-->

		</ul>

<!-- niente search form per questo header -->
<!-- .mobile-search -->
<!-- niente search form per questo header -->

<!-- MAIN menu-->

		<!-- MAIN menu-->

		<!-- TEST navigazione book -->


		<!-- hero image for statc pages -->
		<!-- hero image for statc pages -->





<!-- MENU NAVIGAZIONE inizio -->
		<!-- <div class="navigation bg-white no-padding"> -->
			<div class="no-padding">

			<div class="section-inner group">




		</div><!-- .navigation -->
		<!-- MENU NAVIGAZIONE fine -->

		<main id="site-content">
