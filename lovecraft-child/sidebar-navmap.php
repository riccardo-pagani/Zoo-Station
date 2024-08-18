<script type="text/javascript"> setSidebar(); </script>

<!-- <p>	This is: sidebar-navmap </p> -->

<?php
get_sidebar( "choose_language_map" );

if ( is_singular(  ) ) {
	get_sidebar( "post_navigation" );
}

if ( is_home() || is_archive() || is_tag( )) {
	get_template_part( 'pagination' );
}
?>
<div>
	<p class="text_menu">
		|  Hover on a marker to visualize a quote, click or tap on the map to make it disappear.
	</p>
</div>
