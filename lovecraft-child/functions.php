<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'lovecraft_genericons' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION

// POST THUMBNAILS
add_theme_support( 'post-thumbnails', [ 'post', 'page' ] );
set_post_thumbnail_size( 88, 88, true );

add_image_size( 'post-image', 900, 9999, true );
add_image_size( 'post-image-cover', 1280, 9999, true );
add_image_size( 'post-list-image', 400, 200, true );

/* ---------------------------------------------------------------------------------------------
   ENQUEUE STYLES
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'lovecraft_load_style' ) ) :
	function lovecraft_load_style() {

		$dependencies = array();
		$theme_version = wp_get_theme( 'lovecraft' )->get( 'Version' );

		/**
		 * Translators: If there are characters in your language that are not
		 * supported by the theme fonts, translate this to 'off'. Do not translate
		 * into your own language.
		 */
		/* if ( 'off' !== _x( 'on', 'Google Fonts: on or off', 'lovecraft' ) ) {
			wp_register_style( 'lovecraft_googlefonts', 'fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@1,700&display=swap' );
			$dependencies[] = 'lovecraft_googlefonts';
		} */


		wp_register_style( 'lovecraft_genericons', get_template_directory_uri() . '/assets/css/genericons.min.css' );
		$dependencies[] = 'lovecraft_genericons';

		wp_enqueue_style( 'lovecraft_style', get_stylesheet_uri(), $dependencies, $theme_version );

	}
	add_action( 'wp_enqueue_scripts', 'lovecraft_load_style' );
endif;

/* new */
function lovecraft_child_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . '/style.css' );
    wp_enqueue_style( 'quotes-ui', get_stylesheet_directory_uri() . '/dc.css' );
}

add_action( 'wp_enqueue_scripts', 'lovecraft_child_theme_enqueue_styles' );

/* ---------------------------------------------------------------------------------------------
   ABILITA L'IMPORTAZIONE DI FILE SVG
   --------------------------------------------------------------------------------------------- */

function cc_mime_types($mimes) {
 $mimes['svg'] = 'image/svg+xml';
 return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/* -------------------------------------------
Limita la lunghezza di excerpt
----------------------------------------------*/

function get_excerpt() {
$excerpt = get_the_content();
$excerpt = preg_replace(" ([.*?])",'',$excerpt);
$excerpt = strip_shortcodes($excerpt);
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, 150);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
$excerpt = $excerpt.'... <a href="'.get_the_permalink().'">more</a>';
return $excerpt;
}

/* ------------------------------------------
In quotetex cerca la keyword e restituisce
keyword in bold nel testo
---------------------------------------------*/

function get_quote_chunks($text, $key) {
  $length_text = strlen($text);
  $length_key = strlen($key);
  $pos = strpos($text, $key);
  $chunks = array ( "" , "" );

  $chunks[0] = substr( $text, 0, $pos);
  $start = $pos + $length_key;
  $end = $length_text - $start;
  $chunks[1] = substr( $text, $start, $end);

  return $chunks;
}

/* ---------------------------------------------------------------------------------------------
   REGISTER WIDGET AREAS
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'lovecraft_sidebar_registration' ) ) :
	function lovecraft_sidebar_registration() {

		register_sidebar( array(
			'name' 			=> __( 'Sidebar', 'lovecraft' ),
			'id' 			=> 'sidebar',
			'description' 	=> __( 'Widgets in this area will be shown in the sidebar.', 'lovecraft' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div></div>',
		) );

		register_sidebar( array(
			'name' 			=> __( 'Footer One', 'lovecraft' ),
			'id' 			=> 'footer-one',
			'description' 	=> __( 'Widgets in this area will be shown in the left footer column.', 'lovecraft' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div></div>',
		) );

		register_sidebar( array(
			'name' 			=> __( 'Footer Two', 'lovecraft' ),
			'id' 			=> 'footer-two',
			'description' 	=> __( 'Widgets in this area will be shown in the middle footer column.', 'lovecraft' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div></div>',
		) );

		register_sidebar( array(
			'name' 			=> __( 'Footer Three', 'lovecraft' ),
			'id' 			=> 'footer-three',
			'description' 	=> __( 'Widgets in this area will be shown in the right footer column.', 'lovecraft' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div></div>',
		) );

    register_sidebar( array(
			'name' 			=> __( 'Sidebar for Quotes', 'lovecraft' ),
			'id' 			=> 'sidebar-book',
			'description' 	=> __( 'Widgets in this area will be shown in the sidebar for Book.', 'lovecraft' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div></div>',
		) );

    register_sidebar( array(
			'name' 			=> __( 'Sidebar for Blog', 'lovecraft' ),
			'id' 			=> 'sidebar-blog',
			'description' 	=> __( 'Widgets in this area will be shown in the sidebar for Blog.', 'lovecraft' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div></div>',
		) );

    register_sidebar( array(
			'name' 			=> __( 'Sidebar for Pages', 'lovecraft' ),
			'id' 			=> 'sidebar-page',
			'description' 	=> __( 'Widgets in this area will be shown in the sidebar for Blog.', 'lovecraft' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div></div>',
		) );

    register_sidebar( array(
			'name' 			=> __( 'Sidebar Nav for Quotes', 'lovecraft' ),
			'id' 			=> 'sidebar-navbook',
			'description' 	=> __( 'Widgets in this area will be shown in the navigation for Book.', 'lovecraft' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div></div>',
		) );

    register_sidebar( array(
			'name' 			=> __( 'Sidebar Nav for Legals', 'lovecraft' ),
			'id' 			=> 'sidebar-legals',
			'description' 	=> __( 'Widgets in this area will be shown in the navigation for Legals.', 'lovecraft' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div></div>',
		) );

	}
	add_action( 'widgets_init', 'lovecraft_sidebar_registration' );
endif;


/* ---------------------------------------------------------------------------------------------
   DELIST DEFAULT WIDGETS REPLACE BY THEME ONES
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'lovecraft_modify_widgets' ) ) :
	function lovecraft_modify_widgets() {

		// Register custom widgets
		register_widget( 'Lovecraft_Recent_Posts' );
		register_widget( 'Lovecraft_Recent_Comments' );

		// Unregister replaced Core widgets
		unregister_widget( 'WP_Widget_Recent_Posts' );
		unregister_widget( 'WP_Widget_Recent_Comments' );

	}
	add_action( 'widgets_init', 'lovecraft_modify_widgets' );
endif;

/* ---------------------------------------------------------------------------
  Enqueue scrypt per funzioni gestione lingue
------------------------------------------------------------------------------*/

function language_scripts() {
  if ( !is_single( 'cf_quote' ) && !is_archive( 'cf_quote' ) ) {
    return;
  }
  wp_enqueue_script( 'setLanguageID', get_stylesheet_directory_uri() . '/assets/js/cf-scripts.js' );
}

add_action( 'wp_enqueue_scripts', 'language_scripts', 1 );

function language_scripts_2() {
  //if ( is_archive( 'cf_quote' ) || is_single( 'cf_quote' ) ) {
    wp_enqueue_script( 'setSelect', get_stylesheet_directory_uri() . '/assets/js/cf-scripts.js' );
    wp_enqueue_script( 'doSomething', get_stylesheet_directory_uri() . '/assets/js/cf-scripts.js' );
    wp_enqueue_script( 'loadBook', get_stylesheet_directory_uri() . '/assets/js/cf-scripts.js' );
    // Mappe:
    //wp_enqueue_script( 'initMap', get_stylesheet_directory_uri() . '/assets/js/cf-map-scripts.js' );
    wp_enqueue_script( 'GoogleMap', get_stylesheet_directory_uri() . '/assets/js/cf-gmap-scripts.js' );
    // Effetto slider immagini in Book
    wp_enqueue_script( 'startPage', get_stylesheet_directory_uri() . '/assets/js/dc.js' );
    // Libreria per cluster Google Maps da CDN
    wp_enqueue_script( 'MarkerClusterer', 'https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js' );
    // Libreria D3.js da CDN
    wp_enqueue_script( 'D3.js', 'https://d3js.org/d3.v7.min.js' );
  //}
}

add_action( 'wp_enqueue_scripts', 'language_scripts_2', 10 );



/* ----------------------------------------------------------------------
  Expose Custom Fields to REST API
------------------------------------------------------------------------*/
function expose_meta() {
  register_rest_field( 'post', 'meta', array(
    'get_callback' => function ( $data ) {
      return get_post_meta( $data['id'], '', '' );
      },
    )
  );
}

add_action( 'rest_api_init', 'expose_meta' );


/* -------------------------------------------------------------
 Aumenta il numero di post della query REST - serve per Google Maps
------------------------------------------------------------- */
add_action( 'rest_post_query', 'rest_in_peace' );

/*
 * params is the query array passed to WP_Query
*/
function rest_in_peace( $params ) {
	if ( isset( $params ) AND isset( $params[ 'posts_per_page' ] ) ) {
		$params[ 'posts_per_page' ] = 200;
	}

	return $params;
}


/* -------------------------------------------------------------
 COMMENTS
------------------------------------------------------------- */
/* Abilitare commenti a single-cf_quote.php */
add_post_type_support( 'single-news', 'comments' );
// Sets the comments to allowed by default
function turn_on_comments() {
   update_option('default_comment_status', 'open');
}
add_action('update_option', 'turn_on_comments');

/*function cyb_comments_off( $data ) {
    if( $data['post_type'] == 'post' ) {
        $data['comment_status'] = "closed";
        $data['ping_status'] = "open";
    }
    return $data;
}
add_filter( 'wp_insert_post_data', 'cyb_comments_off' );*/

/* Toglie il campo website dal comment form */
add_filter('comment_form_default_fields', 'unset_url_field');
function unset_url_field($fields){
    if(isset($fields['url']))
       unset($fields['url']);
       return $fields;
}

/* Adegua la checkbox al campo website eliminato */
add_filter( 'comment_form_default_fields', 'wc_comment_form_change_cookies' );
function wc_comment_form_change_cookies( $fields ) {
	$commenter = wp_get_current_commenter();

	$consent   = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

	$fields['cookies'] = '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
					 '<label for="wp-comment-cookies-consent">'.__('Save my name and email in this browser for the next time I comment.', 'lovecraft').'</label></p>';
	return $fields;
}

/* -------------------------------------------------------------
 Estendere la Query ai Custom Fields
------------------------------------------------------------- */
/* aggiunge nuove variabili alla query*/
function cf_register_query_vars( $vars ) {
  $vars[] = 'de_cf_text';
  $vars[] = 'de_cf_keyword';
  $vars[] = 'de_cf_pag_num';
  $vars[] = 'en_cf_text';
  $vars[] = 'en_cf_keyword';
  $vars[] = 'en_cf_pag_num';
  $vars[] = 'it_cf_text';
  $vars[] = 'it_cf_keyword';
  $vars[] = 'it_cf_pag_num';
  $vars[] = 'lan';
  $vars[] = 'lng';
  return $vars;
}
add_filter( 'query_vars', 'cf_register_query_vars' );

/* -------------------------------------------------------------
 Ordina la Query in base al numero di pagina
------------------------------------------------------------- */
function change_posts_order( $query) {
    if ( ( $query->is_home() || $query->is_archive() ) && $query->is_main_query() && !$query->is_post_type_archive( 'news' )) {
    $query->set( 'post_per_page', -1 );
    $query->set( 'post_per_archive_page', -1 );
    $query->set( 'meta_key', 'de_cf_page_num' );
    $query->set( 'orderby', 'meta_value_num' );
    $query->set( 'order', 'ASC' );
  }
}
add_action( 'pre_get_posts', 'change_posts_order' );

/* -------------------------------------------------------------
 Extend Tags to Pages
------------------------------------------------------------- */
function extend_tags() {
    // Add tag metabox to page
    register_taxonomy_for_object_type('post_tag', 'page');
    // Add category metabox to page
    //register_taxonomy_for_object_type('category', 'page');
}
 // Add to the admin_init hook of your theme functions.php file
add_action( 'init', 'extend_tags' );

/* -------------------------------------------------------------
 Enable Widget for Tags displayed as a list
------------------------------------------------------------- */
require_once( get_stylesheet_directory() . '/class-wp-widget-tag-list.php' );

function register_tag_lists_widget() {
    register_widget( 'WP_Widget_Tag_List' );
}
add_action( 'widgets_init', 'register_tag_lists_widget' );

/* -------------------------------------------------------------
 Widget to display custom taxonomy list
------------------------------------------------------------- */
add_action("widgets_init", array('Widget_Custom_tax_tag_cloud', 'register'));
class Widget_Custom_tax_tag_cloud {
    function control(){
        echo 'No control panel';
    }
    function widget($args){
        echo $args['before_widget'];
        echo $args['before_title'] . 'News Catgories:' . $args['after_title'];
        $cloud_args = array('taxonomy' => 'news_cat');
        wp_tag_cloud( $cloud_args );
        echo $args['after_widget'];
    }
    function register(){
        register_sidebar_widget('Widget name', array('Widget_Custom_tax_tag_cloud', 'widget'));
        register_widget_control('Widget name', array('Widget_Custom_tax_tag_cloud', 'control'));
    }
}

/* -------------------------------------------------------------
 Get the right prev/next post link when order posts by menu_order
------------------------------------------------------------- */

function get_adjacent_join($join) {
  if(is_singular()) {
    //global $wpdb, $post;
    global $wpdb;
    $new_join = $join."INNER JOIN $wpdb->postmeta AS m ON p.ID = m.post_id ";
    return $new_join;
  }
  return $join;
}
add_filter('get_previous_post_join', 'get_adjacent_join');
add_filter('get_next_post_join', 'get_adjacent_join');

function get_next_adjacent_where($where) {
  if(is_singular()) {
    global $wpdb, $post;
    $id = $post->ID;
    $current_page = get_field('de_cf_page_num', $id);
    //echo($current_page);

    $new_where = "WHERE p.post_type = 'post'
      AND p.post_status = 'publish'
      AND (m.meta_key = 'de_cf_page_num'
    	 AND (m.meta_key = 'de_cf_page_num'
    		 AND (m.meta_key = 'de_cf_page_num'
    			  AND CAST(m.meta_value AS CHAR) > '$current_page')))";
    return $new_where;
  }
  return $where;
}
add_filter('get_next_post_where', 'get_next_adjacent_where');

function get_previous_adjacent_where($where) {
  if(is_singular()) {
    global $wpdb, $post;
    $id = $post->ID;
    $current_page = get_field('de_cf_page_num', $id);
    //echo($current_page);

    $new_where = "WHERE p.post_type = 'post'
      AND p.post_status = 'publish'
      AND (m.meta_key = 'de_cf_page_num'
    	 AND (m.meta_key = 'de_cf_page_num'
    		 AND (m.meta_key = 'de_cf_page_num'
    			  AND CAST(m.meta_value AS CHAR) < '$current_page')))";
    return $new_where;
  }
  return $where;
}
add_filter('get_previous_post_where', 'get_previous_adjacent_where');

function get_prev_sort($sort) {
  if(is_singular()) {
    global $wpdb, $post;
    $new_sort = "GROUP BY p.ID ORDER BY m.meta_value DESC";
    return $new_sort;
  }
  return $sort;
}
add_filter('get_previous_post_sort', 'get_prev_sort');

function get_next_sort($sort) {
  if(is_singular()) {
    global $wpdb, $post;
    $new_sort = "GROUP BY p.ID ORDER BY m.meta_value ASC";
    return $new_sort;
  }
  return $sort;
}
add_filter('get_next_post_sort', 'get_next_sort');

/* ---------------------------------------------------------------------------------------------
   COMMENT FUNCTION
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'lovecraft_comment' ) ) :
	function lovecraft_comment( $comment, $args, $depth ) {

		if ( in_array( $comment->comment_type, array( 'pingback', 'trackback' ) ) ) : ?>

			<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
				<?php __( 'Pingback:', 'lovecraft' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'lovecraft' ), '<span class="edit-link">', '</span>' ); ?>
			</li>

			<?php
		else :
			global $post; ?>

			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

				<div id="comment-<?php comment_ID(); ?>" class="comment">

					<?php

					echo get_avatar( $comment, 160 );

					if ( $comment->user_id === $post->post_author ) : ?>

<!--
						<a class="comment-author-icon" href="<?php // echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							<div class="genericon genericon-user"></div>
						</a>
-->

					<?php endif; ?>

					<div class="comment-inner">

						<div class="comment-header">
							<h4><?php echo get_comment_author_link(); ?></h4>
						</div><!-- .comment-header -->

						<div class="comment-content post-content">
							<?php comment_text(); ?>
						</div><!-- .comment-content -->

						<div class="comment-meta">

							<div>
								<div class="genericon genericon-day"></div><a class="comment-date-link" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php echo get_comment_date( get_option( 'date_format' ) ); ?></a>
							</div>

							<?php edit_comment_link( __( 'Edit', 'lovecraft' ), '<div><div class="genericon genericon-edit"></div>', '</div>' ); ?>

							<?php if ( 0 == $comment->comment_approved ) : ?>

								<div class="comment-awaiting-moderation">
									<div class="genericon genericon-show"></div>
									<?php _e( 'Your comment is awaiting moderation.', 'lovecraft' ); ?>
								</div>

								<?php
							else :

								comment_reply_link( array(
									'reply_text' 	=> __( 'Reply', 'lovecraft' ),
									'depth'			=> $depth,
									'max_depth' 	=> $args['max_depth'],
									'before'		=> '<div><div class="genericon genericon-reply"></div>',
									'after'			=> '</div>',
								) );

							endif; ?>

						</div><!-- .comment-meta -->

					</div><!-- .comment-inner -->

				</div><!-- .comment-## -->

			<?php
		endif;

	}
endif;
