<?php get_header( 'clean' ); ?>

<div class="wrapper section">

	<div class="section-inner group">


		<div class="content">

			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :

					the_post();

					?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'post single' ); ?>>

						<div class="post-inner">

							<div class="post-header">

								<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>


									<?php if ( is_single() ) lovecraft_post_meta(); ?>


							</div><!-- .post-header -->

							<?php if ( get_the_content() ) : ?>

								<div class="post-content entry-content">

									<?php

									the_content();

									wp_link_pages( array(
										'before'		=> '<p class="page-links"><span class="title">' . __( 'Pages:', 'lovecraft' ) . '</span>',
										'after'			=> '</p>',
										'link_before'	=> '<span>',
										'link_after'	=> '</span>',
										'separator'		=> '',
										'pagelink'		=> '%',
										'echo'			=> 1,
									) );
									?>

								</div><!-- .post-content -->

								<?php
							endif;

							the_tags( '<div class="post-tags">', '', '</div>' );

							?>

						</div><!-- .post-inner -->

								<?php	comments_template( '', true ); ?>

					</article><!-- .post -->

					<?php
				endwhile;
			endif;
			?>

		</div><!-- .content -->

		<?php if ( get_page_template_slug() !== 'full-width-page-template.php' ) : ?>
			<?php get_sidebar( 'blog' ); ?>
		<?php endif; ?>

	</div><!-- .section-inner -->

</div><!-- .wrapper -->

<?php get_footer(); ?>
