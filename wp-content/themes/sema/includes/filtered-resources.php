<div class="product-loading"><i class="fa fa-spinner fa-pulse" aria-hidden="true"></i></div>
<div id="response">
	<?php
	$post_type = 'resources';
	 
	// Get all the taxonomies for this post type
	$taxonomies = get_object_taxonomies( array( 'post_type' => $post_type, 'order' => 'DESC', ) );
	 
	foreach( $taxonomies as $taxonomy ) :
	
		$terms = get_terms( $taxonomy );
		
		foreach( $terms as $term ) : ?>
		
		        <?php
		        $args = array(
		                'post_type' => 'resources',
		                'posts_per_page' => -1,
		                'tax_query' => array(
		                    array(
		                        'taxonomy' => $taxonomy,
		                        'field' => 'slug',
		                        'terms' => $term->slug
		                    )
		                )
		 
		            );
		        $posts = new WP_Query($args);
		        if( $posts->have_posts() ): ?>
				<ul class="products-list clearfix">
					<?php while( $posts->have_posts() ) : $posts->the_post(); ?>
							
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
												<?php echo the_post_thumbnail('resource-thumb'); ?>
											</a>
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
														<a class="et_pb_button et_pb_custom_button_icon" data-icon="E" style="color: #ffffff; padding: .3em 2em .3em .7em; background-color: #cc9901; transition: 0.25s ease-in-out; margin-top: 15px; display: inline-block;" href="/solutions-2/#<?php the_field('anchor_link'); ?>"><?php _e('Learn More'); ?></a>
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
						
					<?php endwhile; 
				endif; ?>
				</ul>
		<?php endforeach;
	endforeach; ?>
</div>