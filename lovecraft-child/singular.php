<!-- Nuovo header -->
<?php get_header( 'clean' ); ?>

<!-- Menu aggiuntivo di navigazione -->
<div class="hdr-inner-nav">
  <?php get_sidebar( 'navbook' ); ?>
</div>

<!-- funzioni js per settaggio lingua e rienpimento libro -->
<script type="text/javascript">
setLanguageID();
//loadBook();
</script>

<!-- <p>Template: singular.php</p> -->

<div class="wrapper wrap">

  <div class="section-inner group">

    <div id="content">

			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					?>

<!-- Blocco di riempimento libro -->
					<div id= 'post-<?php the_ID(); ?>' class="x wkvbz post-custom-fields">

						<blockquote class='quote-text'>
							<spam class='text0'></spam><spam class='keyword'><strong></strong></spam><spam class='text1'></spam>
						</blockquote>
						<p class='page-num quote-text quote-page-number'></p>
					</div>

          <!-- Book's Credits -->
          <div class="credits bookCredits">
            <span>Quote from: </span><span class="bkCredits"></span>
          </div>
          <!-- End of Book's Credits -->

					<script type="text/javascript">
					loadBook();
					</script>
<!-- Blocco di riempimento libro -->


<div class="line"></div>

					<article class="artic-post" id="post-<?php the_ID(); ?>" <?php post_class( 'post single' ); ?>>


<div class="section-inner group">
  <div class="my-tags post-tags">
    <div class="tags-block">
      <p class="tags-text">Tags: <?php the_tags( '<span class="tags-link">', '', '</span>' ); ?></p>
      <p class='cat tags-text'>Category: <?php the_category( ' | ' ) ?></p>
    </div>
  </div>
</div>


						<!-- <div class="post-inner"> -->

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

							?>

					<!--	</div> --><!-- .post-inner -->

						<?php	comments_template( '', true ); ?>

					</article><!-- .post -->

					<?php
				endwhile;
			endif;
			?>

		</div><!-- .content -->

		<?php if ( get_page_template_slug() !== 'full-width-page-template.php' ) : ?>
			<?php get_sidebar( 'book' ); ?>
		<?php endif; ?>

	</div><!-- .section-inner -->


</div><!-- .wrapper -->

<?php get_footer(); ?>
