<div id="instafeed">
	<div class="grid-sizer"></div>
	<div class="gutter-sizer"></div>
	
	<?php 
	$loop = new WP_Query( array( 'post_type' => 'resources', 'posts_per_page' => -1 ) );
	    if ( $loop->have_posts() ) :
	        while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<div class="grid-item">
				<div class="grid-inner">
					<?php if ( has_post_thumbnail() ) { ?>
					<a href="<?php the_permalink(); ?>">
						<?php echo the_post_thumbnail(); ?>
					</a>
					<?php } ?>
						<div class="card-content">
							<?php 
							$terms = get_the_terms( $post->ID, 'categories' );
							if ( $terms ) {
								foreach ( $terms as $term ) {
									echo esc_html_e('Resource Type: '); echo '<a href="'.get_term_link($term).'">' . $term->name . '</a>';
								}
							} ?>
							<h3><?php the_title(); ?></h3>
							<?php
							if( has_excerpt() ) { 
								the_excerpt(); 
							} else {
								the_content();
							}
							?>
							<div>
								<a style="color: #ffffff; padding-left: 0.7em; padding-right: 2em; background-color: #cc9901; transition: 0.25s ease-in-out;" href="<?php the_permalink(); ?>"><?php _e('Learn More'); ?></a>
							</div>
						</div>
				</div>
			</div>
			<?php endwhile; 
		endif; wp_reset_postdata();
	?>
	
</div>