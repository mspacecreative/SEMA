<?php $loop = new WP_Query( array( 'post_type' => 'resources', 'posts_per_page' => -1 ) );
if ( $loop->have_posts() ) : ?>
<div class="button-group filters-button-group">
	<button class="button is-checked">All Types</button>
	<?php
	$terms = get_the_terms( 'resources', 'categories' ); 
	if ( $terms ) { ?>
		<?php foreach ( $terms as $term ) { ?>
		<button class="button" data-filter=".<?php echo $term->slug ?>"><?php echo $term->name ?></li>
		<?php } ?>
	<?php } ?>
</div>

<div class="grid">
	<div class="grid-sizer"></div>
	<div class="gutter-sizer"></div>
	<?php 
	while ( $loop->have_posts() ) : $loop->the_post();
	        $terms = get_the_terms( $post->ID, 'categories' );
			if ( $terms ) {
				foreach ( $terms as $term ) { ?>
				<div class="resource-item <?php echo $term->slug ?>">
				<?php } ?>
			<?php } ?>
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
			<?php endwhile; ?>
</div>
<?php endif; wp_reset_postdata(); ?>
