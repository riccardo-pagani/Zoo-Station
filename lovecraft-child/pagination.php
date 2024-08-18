
<!-- <div class="pagination"> -->
<div class="page_nav">
	<?php
	/**
	* Pagination Bar
	**/
/*
	    global $wp_query;
	    $total_pages = $wp_query->max_num_pages;
	    if ($total_pages > 1){
	        $current_page = max(1, get_query_var('paged'));
	        echo paginate_links(array(
	            'base' => get_pagenum_link(1) . '%_%',
	            'format' => '/page/%#%',
	            'current' => $current_page,
	            'total' => $total_pages,
	        ));
	    }
*/


//echo '<div class="page_nav">';
			global $wp_query;
			$total_pages = $wp_query->max_num_pages;
			if ($total_pages > 1){
			  $current_page = max(1, get_query_var('paged'));

			  echo paginate_links(array(
			      //'base' => get_pagenum_link(1) . '%_%',
			      //'format' => '/page/%#%',

						// Altrimenti non funzionava con search
						'base'      => @add_query_arg( 'paged', '%#%' ),
        		'format'    => '',

			      'current' => $current_page,
			      'total' => $total_pages,
						'mid_size' => 1,
			      'prev_text' => '◄', // old ◄
			      'next_text' => '►' // old ►
			    ));


			}
//echo '</div>';



	?>

</div>
