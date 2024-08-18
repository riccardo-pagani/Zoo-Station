<!-- Blocco Post Nav -->



<?php if ( is_single() ) :
	$prev_post = get_previous_post();
	$next_post = get_next_post();
	if ( $prev_post || $next_post ) : ?>
	<div class="post-nav">
		<!-- <div class="post-navigation-inner"> -->
			<?php if ( $prev_post ) : ?>
				<a href="<?php the_permalink( $prev_post->ID ); ?>">
					<!-- <div class="post-nav-prev"> -->
						<div class="arrow-left">◄</div><!-- <div class="signage">&nbsp;previous</div> --> <!-- ◄ ► no:◀ ▶-->
					<!-- </div> -->
				</a>
			<?php endif; ?>
			<?php if ( $next_post ) : ?>
				<a href="<?php the_permalink( $next_post->ID ); ?>">
					<!-- <div class="post-nav-next"> -->
						<!-- <div class="signage">next&nbsp;</div> --> <div class="arrow-right">►</div>
					<!-- </div> -->
				</a>
			<?php endif; ?>
		<!--</div> --> <!-- .post-navigation-inner -->
	</div><!-- .post-navigation -->
<?php	endif; ?>
<?php endif; ?>
<!-- Blocco Post Nav -->
