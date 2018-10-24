<div class="et_pb_title_container">
	<?php
	
	global $post;     // if outside the loop
	
	if ( is_page() && $post->post_parent ) { ?>
	    <h1 class="entry-title version-2">
	    	<span style="color: #00a3d6;" class="parent-title"><?php echo get_the_title( $post->post_parent ); ?></span><span class="title-spacer"><?php _e(' &nbsp;'); ?></span><span class="child-title" style="text-transform: uppercase;"><?php echo the_title(); ?></span>
	    </h1>
	
	<?php } else { ?>
	    <h1 class="entry-title version-2">
	    	<span style="color: #000;" class="parent-title"><?php echo get_the_title(); ?></span>
	    </h1>
	<?php }
	?>
</div>