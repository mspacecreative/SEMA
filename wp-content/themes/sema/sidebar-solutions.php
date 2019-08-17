<?php
if ( ( is_single() || is_page() ) && 'et_full_width_page' === get_post_meta( get_queried_object_id(), '_et_pb_page_layout', true ) )
	return;

if ( is_active_sidebar( 'sidebar-solutions' ) ) : ?>
	<div id="sidebar">
		<?php dynamic_sidebar( 'sidebar-solutions' ); ?>
	</div> <!-- end #sidebar -->
<?php
endif;
