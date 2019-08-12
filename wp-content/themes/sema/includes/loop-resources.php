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
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			</div>
			<?php } ?>
		</div>
        
    <?php endwhile;
    
endif; wp_reset_query(); ?>

<div id="instafeed">
	<div class="grid-sizer"></div>
	<div class="gutter-sizer"></div>
	
	<?php 
	$loop = new WP_Query( array( 'post_type' => 'resources', 'posts_per_page' => -1 ) );
	    if ( $loop->have_posts() ) :
	        while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<div class="grid-item">
				<div class="grid-inner">
    					<?php if ( has_post_thumbnail() ) {
    					    $image = get_field('case_study');
				            if ( $image ): ?>
				            <div class="normal-image">
    					        <?php echo the_post_thumbnail(); ?>
    					    </div>
    					    <?php else : ?>
    					    <?php echo the_post_thumbnail('resource-thumb'); ?>
    					    <?php endif; ?>
    					<?php } ?>
						<div class="card-content">
							<?php 
							$terms = get_the_terms( $post->ID, 'categories' );
							if ( $terms ) { ?>
							<p style="padding: 0; margin-bottom: 15px; font-size: 14px; display: block;">
							<?php 
								foreach ( $terms as $term ) {
									echo esc_html_e('Resource Type: '); echo '<a href="'.get_term_link($term).'">' . $term->name . '</a>';
								} ?>
							</p>
							<?php } ?>
							<h3><?php the_title(); ?></h3>
							<?php
							if( has_excerpt() ) { 
								the_excerpt(); 
							} else {
								the_content();
							}
							?>
							<?php if ( get_field('anchor_link') ): ?>
							<div>
								<a class="et_pb_button et_pb_custom_button_icon" data-icon="E" style="color: #ffffff; padding: .3em 2em .3em .7em; background-color: #cc9901; transition: 0.25s ease-in-out; margin-top: 15px; display: inline-block;" href="/solutions/#<?php the_field('anchor_link'); ?>"><?php _e('Learn More'); ?></a>
							</div>
							<?php elseif ( get_field('external_link') ): ?>
							<div>
								<a class="et_pb_button et_pb_custom_button_icon" data-icon="E" style="color: #ffffff; padding: .3em 2em .3em .7em; background-color: #cc9901; transition: 0.25s ease-in-out; margin-top: 15px; display: inline-block;" href="<?php the_field('external_link'); ?>" target="_blank"><?php _e('Learn More'); ?></a>
							</div>
							<?php else : ?>
							<div>
								<a class="et_pb_button et_pb_custom_button_icon" data-icon="E" style="color: #ffffff; padding: .3em 2em .3em .7em; background-color: #cc9901; transition: 0.25s ease-in-out; margin-top: 15px; display: inline-block;" href="<?php the_permalink(); ?>"><?php _e('Learn More'); ?></a>
							</div>
							<?php endif; ?>
						</div>
				</div>
			</div>
			<?php endwhile; 
		endif; wp_reset_postdata();
	?>
	
</div>