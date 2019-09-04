<div id="instafeed" class="iso-grid">
	<div class="grid-sizer"></div>
	<div class="gutter-sizer"></div>
	<?php
	    if ( have_posts() ) :
	        while ( have_posts() ) : the_post(); ?>
			<div class="resource-item grid-item <?php echo $term->slug ?>">
				<?php if ( get_field('resource_image_type') == 'logo' ): ?>
								<div class="grid-inner">
									<div class="normal-image">
									    <?php if ( has_post_thumbnail() ) { ?>
									    	<?php if ( get_field('resource_button_type') == 'external' ): ?>
									    	<a href="<?php the_field('external_link'); ?>" target="_blank">
									    	    <?php echo the_post_thumbnail(); ?>
									    	</a>
									    	<?php elseif ( get_field('resource_button_type') == 'internal' ): ?>
									    	<a href="<?php the_field('internal_page'); ?>">
									    	    <?php echo the_post_thumbnail(); ?>
									    	</a>
									        <?php else : ?>
									    	<a href="<?php the_permalink(); ?>">
									            <?php echo the_post_thumbnail(); ?>
									        </a>
									    	<?php endif; ?>
									    <?php } ?>
									</div>
									<div class="card-content">
										<h3><?php the_title(); ?></h3>
										<?php
										if( has_excerpt() ) { 
											the_excerpt(); 
										} else {
											the_content();
										}
										?>
										<?php if ( get_field('resource_button_type') == 'internal' ): ?>
										<div>
											<a class="et_pb_button et_pb_custom_button_icon" data-icon="E" style="margin-top: 15px; display: inline-block;" href="<?php the_field('internal_page'); ?>"><?php _e('Learn More'); ?></a>
										</div>
										<?php elseif ( get_field('resource_button_type') == 'external' ): ?>
										<div>
											<a class="et_pb_button et_pb_custom_button_icon" data-icon="E" style="margin-top: 15px; display: inline-block;" href="<?php the_field('external_link'); ?>" target="_blank"><?php _e('Learn More'); ?></a>
										</div>
										<?php else : ?>
										<div>
											<a class="et_pb_button et_pb_custom_button_icon" data-icon="E" style="margin-top: 15px; display: inline-block;" href="<?php the_permalink(); ?>"><?php _e('Learn More'); ?></a>
										</div>
										<?php endif; ?>
									</div>
								</div>
				
								<?php elseif ( get_field('resource_image_type') == 'ebook' ): ?>
								<div class="grid-inner">
									<div class="ebook-cover">
									    <?php if ( has_post_thumbnail() ) { ?>
											<?php if ( get_field('resource_button_type') == 'external' ): ?>
											<a href="<?php the_field('external_link'); ?>" target="_blank">
											    <?php echo the_post_thumbnail(); ?>
											</a>
											<?php elseif ( get_field('resource_button_type') == 'internal' ): ?>
											<a href="<?php the_field('internal_page'); ?>">
											    <?php echo the_post_thumbnail(); ?>
											</a>
									        <?php else : ?>
											<a href="<?php the_permalink(); ?>">
										        <?php echo the_post_thumbnail(); ?>
									        </a>
											<?php endif; ?>
									    <?php } ?>
									</div>
									<div class="card-content">
										<h3><?php the_title(); ?></h3>
										<?php
										if( has_excerpt() ) { 
											the_excerpt(); 
										} else {
											the_content();
										}
										?>
										<?php if ( get_field('resource_button_type') == 'internal' ): ?>
										<div>
											<a class="et_pb_button et_pb_custom_button_icon" data-icon="E" style="margin-top: 15px; display: inline-block;" href="<?php the_field('internal_page'); ?>"><?php _e('Learn More'); ?></a>
										</div>
										<?php elseif ( get_field('resource_button_type') == 'external' ): ?>
										<div>
											<a class="et_pb_button et_pb_custom_button_icon" data-icon="E" style="margin-top: 15px; display: inline-block;" href="<?php the_field('external_link'); ?>" target="_blank"><?php _e('Learn More'); ?></a>
										</div>
										<?php else : ?>
										<div>
											<a class="et_pb_button et_pb_custom_button_icon" data-icon="E" style="margin-top: 15px; display: inline-block;" href="<?php the_permalink(); ?>"><?php _e('Learn More'); ?></a>
										</div>
										<?php endif; ?>
									</div>
								</div>
								
								<?php elseif ( get_field('resource_image_type') == 'datasheet' ): ?>
								<div class="grid-inner">
									<?php if ( has_post_thumbnail() ) { ?>
										<?php if ( get_field('resource_button_type') == 'external' ): ?>
										<a href="<?php the_field('external_link'); ?>" target="_blank">
										    <?php echo the_post_thumbnail('resource-thumb'); ?>
										</a>
										<?php elseif ( get_field('resource_button_type') == 'internal' ): ?>
										<a href="<?php the_field('internal_page'); ?>">
										    <?php echo the_post_thumbnail('resource-thumb'); ?>
										</a>
									    <?php else : ?>
										<a href="<?php the_permalink(); ?>">
									        <?php echo the_post_thumbnail('resource-thumb'); ?>
									    </a>
										<?php endif; ?>
									<?php } ?>
									<div class="card-content">
										<h3><?php the_title(); ?></h3>
										<?php
										if( has_excerpt() ) { 
											the_excerpt(); 
										} else {
											the_content();
										}
										?>
										<?php if ( get_field('resource_button_type') == 'internal' ): ?>
										<div>
											<a class="et_pb_button et_pb_custom_button_icon" data-icon="E" style="margin-top: 15px; display: inline-block;" href="<?php the_field('internal_page'); ?>"><?php _e('Learn More'); ?></a>
										</div>
										<?php elseif ( get_field('resource_button_type') == 'external' ): ?>
										<div>
											<a class="et_pb_button et_pb_custom_button_icon" data-icon="E" style="margin-top: 15px; display: inline-block;" href="<?php the_field('external_link'); ?>" target="_blank"><?php _e('Learn More'); ?></a>
										</div>
										<?php else : ?>
										<div>
											<a class="et_pb_button et_pb_custom_button_icon" data-icon="E" style="margin-top: 15px; display: inline-block;" href="<?php the_permalink(); ?>"><?php _e('Learn More'); ?></a>
										</div>
										<?php endif; ?>
									</div>
								</div>
								
								<?php else : ?>
								<div class="grid-inner">
									<div class="resource-bg-img">
									    <?php if ( has_post_thumbnail() ) { ?>
											<?php if ( get_field('resource_button_type') == 'external' ): ?>
											<a href="<?php the_field('external_link'); ?>" target="_blank">
											    <?php echo the_post_thumbnail(); ?>
											</a>
											<?php elseif ( get_field('resource_button_type') == 'internal' ): ?>
											<a href="<?php the_field('internal_page'); ?>">
											    <?php echo the_post_thumbnail(); ?>
											</a>
									        <?php else : ?>
											<a href="<?php the_permalink(); ?>">
										        <?php echo the_post_thumbnail(); ?>
									        </a>
											<?php endif; ?>
									    <?php } ?>
									</div>
									<div class="card-content">
										<h3><?php the_title(); ?></h3>
										<?php
										if( has_excerpt() ) { 
											the_excerpt(); 
										} else {
											the_content();
										}
										?>
										<?php if ( get_field('resource_button_type') == 'internal' ): ?>
										<div>
											<a class="et_pb_button et_pb_custom_button_icon" data-icon="E" style="margin-top: 15px; display: inline-block;" href="<?php the_field('internal_page'); ?>"><?php _e('Learn More'); ?></a>
										</div>
										<?php elseif ( get_field('resource_button_type') == 'external' ): ?>
										<div>
											<a class="et_pb_button et_pb_custom_button_icon" data-icon="E" style="margin-top: 15px; display: inline-block;" href="<?php the_field('external_link'); ?>" target="_blank"><?php _e('Learn More'); ?></a>
										</div>
										<?php else : ?>
										<div>
											<a class="et_pb_button et_pb_custom_button_icon" data-icon="E" style="margin-top: 15px; display: inline-block;" href="<?php the_permalink(); ?>"><?php _e('Learn More'); ?></a>
										</div>
										<?php endif; ?>
									</div>
								</div>
								<?php endif; ?>
			</div>
			<?php endwhile; 
		endif; wp_reset_postdata();
	?>
</div>