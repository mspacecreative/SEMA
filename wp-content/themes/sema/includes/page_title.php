<div class="et_pb_title_container">
	<?php
	
	global $post;     // if outside the loop
	
	if ( is_page() && $post->post_parent ) { ?>
	    <h1 class="entry-title">
	    	<span style="color: #999;" class="parent-title"><?php echo get_the_title( $post->post_parent ); ?></span><span class="title-spacer"><?php _e(' &nbsp;'); ?></span><span class="child-title"><?php echo the_title(); ?></span>
	    	<div class="shadow-cover"></div>
	    </h1>
	
	<?php } else { ?>
	    <h1 class="entry-title">
	    	<span style="color: #000;" class="parent-title"><?php echo get_the_title(); ?></span>
	    	<div class="shadow-cover"></div>
	    </h1>
	<?php }
	?>
</div>