<div class="et_pb_title_container">
	<?php
	
	global $post;     // if outside the loop
	
	if ( is_page()) { ?>
	    <h1 class="entry-title version-2">
	    	<span style="color: #000;" class="parent-title"><?php echo get_the_title(); ?></span>
	    </h1>
	<?php }
	?>
</div>