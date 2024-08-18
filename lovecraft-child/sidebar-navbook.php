<script type="text/javascript"> setSidebar(); </script>
<!-- <p>	This is: sidebar-navbook </p> -->
<?php
get_sidebar( "choose_language" );



//else :

//if ( !is_single( 'cf_quote' ) ) {
if ( is_singular(  ) ) {
	get_sidebar( "post_navigation" );
}

/*if ( is_home(  ) ) {
	get_sidebar( "jump_page" );
}*/
//endif;

if ( is_home() || is_archive() || is_tag( ) || is_search( ) /*|| is_taxonomy( "news_cat" )*/) {
	get_template_part( 'pagination' );
}


?>
