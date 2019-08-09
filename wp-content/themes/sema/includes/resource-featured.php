<?php
$args = array(
    'numberposts'	=> -1,
    'post_type'		=> 'resources',
    'meta_key'		=> 'featured_resource',
    'meta_value'	=> 'true'
);
$arr_posts = new WP_Query( $args );
 
if ( $arr_posts->have_posts() ) :
 
    while ( $arr_posts->have_posts() ) :
        $arr_posts->the_post(); ?>
        
        <div class="featured-resource-container clearfix">
			<div class="et_pb_column_1_2">
				<?php the_content(); ?>
			</div>
			<?php if ( has_post_thumbnail() ) { ?>
			<div class="et_pb_column_1_2">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?>
			</div>
			<?php } ?>
		</div>
        
    <?php endwhile;
    
endif; wp_reset_query(); ?>