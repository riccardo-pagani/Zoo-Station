<!-- Nuovo header -->
<?php get_header( 'clean' ); ?>

<!-- <p>	This is : index.php </p> -->

<!-- Menu aggiuntivo di navigazione -->
<div class="hdr-inner-nav">
<?php get_sidebar( 'navbook' ); ?>
</div>

<!-- funzioni js per settaggio lingua e rienpimento libro -->
<script type="text/javascript">
    setLanguageID();
    startPage();
</script>

<!-- <p>This is: index.php</p> -->


<!-- <div class="wrapper section"> -->
  <div class="wrapper">


	<div class="section-inner group">



		<!-- <div class="content"> -->
      <div id="content">


			<?php

			$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
      $archive_title = '';
			$archive_subtitle = '';
			$archive_description = get_the_archive_description();

			if ( 1 < $paged || is_archive() || is_search() ) {

				if ( $wp_query->max_num_pages && $paged != $wp_query->max_num_pages ) {
					$archive_subtitle = sprintf( _x( 'Page %1$s of %2$s', 'Translators: %1$s = current page, %2$s = max number of pages', 'lovecraft' ), $paged, $wp_query->max_num_pages );
				}

				if ( is_archive() ) {
					$archive_title = get_the_archive_title();
				} elseif ( is_search() ) {
					$archive_title = sprintf( _x( 'Search results: "%s"', 'Translators: %s = search query text', 'lovecraft' ), get_search_query() );
				}

			}

			if ( $archive_title ) : ?>


				<div class="archive-header">

					<h1 class="archive-title">

						<?php echo $archive_title; ?>

						<?php if ( $archive_subtitle ) : ?>
							<span><?php echo $archive_subtitle; ?></span>
						<?php endif; ?>

					</h1>

					<?php if ( $archive_description ) : ?>

						<div class="archive-description">
							<?php echo wp_kses_post( wpautop( $archive_description ) ); ?>
						</div><!-- .archive-description -->

					<?php endif; ?>

				</div><!-- .archive-header -->

			<?php endif; ?>

<!-- RESET QUERY -->
<?php // wp_reset_query(); ?>
<!-- RESET QUERY -->

<!-- QUERY ordinata per numero di pagina -->
            <?php
            // Query ordinata per numero di pagina
            /* $the_query = new WP_Query(array(
              'post_type' => 'post',
              'post_per_page' => -1,
              'meta_key' => 'de_cf_page_num',
              'orderby' => 'meta_value_num',
              'order' => 'ASC'
            )); */
            ?>
<!-- QUERY ordinata per numero di pagina -->



<!-- Loop normale -->
			<?php if ( have_posts() ) : ?>
				<div class="posts" id="posts">
					<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'content-quote', get_post_format() );
					endwhile;
					?>
<!-- Loop normale -->

<!--	Loop odinato per numero pagina -->
          <?php
          // if ( $the_query->have_posts() ) : ?>
          <!--	<div class="posts" id="posts"> -->
          <?php /* while ( $the_query->have_posts( ) ) : $the_query->the_post();
              get_template_part( 'content-quote', get_post_format() );
            endwhile; */ ?>
<!--	Loop odinato per numero pagina -->



				</div><!-- content -->

				<?php
			elseif ( is_search() ) :
				?>

				<article class="post single">

					<div class="post-inner">

						<div class="post-content">

							<p><?php _e( 'No results. Try again, would you kindly?', 'lovecraft' ); ?></p>

							<?php get_search_form(); ?>

						</div><!-- .post-content -->

					</div><!-- .post-inner -->

				</article><!-- .post -->

			<?php endif; ?>

			<script type="text/javascript">
          //loadBook();
      </script>



			<?php // get_template_part( 'pagination' ); ?>

<!-- Book's Credits -->
<div class="credits bookCredits">
  <span>All quotes are from: </span><span class="bkCredits"></span>
</div>
<!-- End of Book's Credits -->


		</div><!-- content index-->

    <script type="text/javascript">
        loadBook();
    </script>

<?php get_sidebar( 'book' ); ?>

	</div><!-- section-inner group -->

</div><!-- .wrapper -->

<?php get_footer(); ?>
