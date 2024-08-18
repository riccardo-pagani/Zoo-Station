<?php
$myClasses = array(
    'post',
    'blog-box',
);
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( $myClasses ); ?>>

	<?php
	$post_format = get_post_format() ? get_post_format() : 'standard';
	$post_type = get_post_type();
	?>

	<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>

		<figure class="post-image">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'post-list-image' ); ?>
			</a><!-- .featured-media -->
		</figure><!-- .post-image -->

	<?php endif; ?>

	<!-- <div class="post-inner post-inner-blog"> -->
  <div class="post-inner post-inner-blog">


		<?php if ( $post_format !== 'aside' ) : ?>

			<div class="post-header">

				<?php if ( get_the_title() ) : ?>

					<h2 class="post-title post-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					<?php	endif; ?>



        <p class="meta">By: <?php the_author_posts_link() ?> | <?php the_time('F jS, Y'); ?></p>

			</div><!-- .post-header -->

		<?php endif; ?>

		<?php if ( get_the_content() ) : ?>

			<p class="post-content entry-content post-content-blog">

        <?php
        $exc = '';
        echo get_excerpt( $exc );
        ?>

			</p>

			<?php
		endif;

		/*if ( $post_type === 'post' && $post_format === 'aside' ) {
			lovecraft_post_meta();
		}*/

		?>

    <div>

      <p class='cat post-tags'>Category: <?php the_terms( $post->ID, 'news_cat', '', ' ' ) ?></p>


    </div>

	</div><!-- .post-inner -->


</div><!-- .post -->
