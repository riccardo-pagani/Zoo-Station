<?php
// Template Name: One Column Page
// Template Post Type: page
?>


<?php get_header( 'special' ); ?>

<!-- <p>	This is page-one-column.php </p> -->

<!-- Menu aggiuntivo di navigazione per mappa e timeline-->


<!-- <div class="wrapper section"> -->

<div class="section-inner group">
		<!-- 	<div> -->
<!-- <p>This is: page.one_column.php</p> -->
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>

							<?php if ( get_the_content() ) : ?>
									<?php the_content(); ?>
								<?php	endif; ?>
								<?php
endwhile;
			endif;
			?>

		</div><!-- .section-inner -->

		<?php if ( get_page_template_slug() !== 'full-width-page-template.php' ) : ?>
			<?php // get_sidebar( 'page' ); ?>
		<?php endif; ?>

	<!-- </div> --><!-- .wrapper -->
</div>

<?php get_footer(); ?>
