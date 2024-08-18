<script type="text/javascript">
    //loadBook();
</script>


	<?php
	$post_format = get_post_format() ? get_post_format() : 'standard';
	$post_type = get_post_type();
	?>

	<div class="post-inner-book">



	<div id='post-<?php the_ID(); ?>' class="x flex quote">
		<div class="a">
			<p class="pg page-num"></p>
		</div>
		<div class="b flex">
			<div class="c">
				<!-- <img src="/wp-content/themes/lovecraft-child/assets/images/01.jpg" alt="" class="im"> -->
				<img src="<?php the_post_thumbnail_url( 'post-image' ); ?>" alt="" class="im">



			</div>
			<div class="d">
				<p class="tx"><a href="<?php the_permalink(); ?>">
	              <spam class="text0"></spam><spam class="keyword"><strong></strong></spam><spam class="text1"></spam>
	              </a></p>
			</div>
		</div>
	</div>



</div>  <!-- .post-inner -->
