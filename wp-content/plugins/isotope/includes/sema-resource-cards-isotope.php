<?php
$args = array(
    'post_type' => 'resources',
    'posts_per_page' => 1,
    'meta_query' => array( 
      array(
        'key' => '_thumbnail_id'
      ),
      array(
        'key' => 'featured_resource',
        'value' => '1'
      )
    )
);
$arr_posts = new WP_Query( $args );
 
if ( $arr_posts->have_posts() ) :
 
    while ( $arr_posts->have_posts() ) :
        $arr_posts->the_post(); ?>
        
        <div class="featured-resource-container clearfix max-width-800">
			<?php if ( get_field('resource_button_type') == 'external' ): ?>
			<h3><?php esc_html_e('Featured Resource: '); ?><a style="color: #0072d6;" href="<?php the_field('external_link'); ?>" target="_blank"><?php the_title(); ?></a></h3>
			<div class="two_third">
				<?php the_excerpt(); ?>
				<a class="et_pb_button et_pb_custom_button_icon" data-icon="E" style="margin-top: 15px; display: inline-block;" href="<?php the_field('external_link'); ?>" target="_blank"><?php _e('Learn More'); ?></a>
			</div>
			<?php if ( has_post_thumbnail() ) { ?>
			<div class="one_third last">
				<a href="<?php the_field('external_link'); ?>" target="_blank"><?php the_post_thumbnail(); ?></a>
			</div>
			<?php } ?>
			<?php elseif ( get_field('resource_button_type') == 'internal' ): ?>
			<h3><?php esc_html_e('Featured Resource: '); ?><a style="color: #0072d6;" href="<?php the_field('internal_page'); ?>"><?php the_title(); ?></a></h3>
			<div class="two_third">
				<?php the_excerpt(); ?>
				<a class="et_pb_button et_pb_custom_button_icon" data-icon="E" style="margin-top: 15px; display: inline-block;" href="<?php the_field('internal_page'); ?>"><?php _e('Learn More'); ?></a>
			</div>
			<?php if ( has_post_thumbnail() ) { ?>
			<div class="one_third last">
				<a href="<?php the_field('internal_page'); ?>"><?php the_post_thumbnail(); ?></a>
			</div>
			<?php } ?>
			<?php else : ?>
			<h3><?php esc_html_e('Featured Resource: '); ?><a style="color: #0072d6;" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<div class="two_third">
				<?php the_excerpt(); ?>
				<a class="et_pb_button et_pb_custom_button_icon" data-icon="E" style="margin-top: 15px; display: inline-block;" href="<?php the_permalink(); ?>"><?php _e('Learn More'); ?></a>
			</div>
			<?php if ( has_post_thumbnail() ) { ?>
			<div class="one_third last">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			</div>
			<?php } ?>
			<?php endif; ?>
		</div>
        
    <?php endwhile;
    
endif; wp_reset_query(); ?>

<div id="stick-here-mobile"></div>

<div class="mobile-filter">
    <button>Filter</button>
</div>

<div id="stick-here"></div>

<div class="button-group filters-button-group">
	<button class="button is-checked">All Types</button>
	<?php
	// your taxonomy name
	$tax = 'types';

	// get the terms of taxonomy
	$terms = get_terms( $tax, $args = array(
	  'hide_empty' => false, // do not hide empty terms
	));

	// loop through all terms
	foreach( $terms as $term ) {
		echo '<button class="button" data-filter=".' . $term->slug . '">' . $term->name . '</button>';
	} ?>
</div>

<div id="instafeed" class="iso-grid">
	<div class="grid-sizer"></div>
	<div class="gutter-sizer"></div>
	<?php 
	$loop = new WP_Query( array( 'post_type' => 'resources', 'posts_per_page' => -1 ) );
	    if ( $loop->have_posts() ) :
	        while ( $loop->have_posts() ) : $loop->the_post();
	        $terms = get_the_terms( $post->ID, 'types' );
			if ( $terms ) {
				foreach ( $terms as $term ) { ?>
				<div class="resource-item grid-item <?php echo $term->slug ?>">
				<?php } ?>
			<?php } ?>
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
							<?php 
							$terms = get_the_terms( $post->ID, 'types' );
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
							<?php 
							$terms = get_the_terms( $post->ID, 'types' );
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
							<?php 
							$terms = get_the_terms( $post->ID, 'types' );
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
							<?php 
							$terms = get_the_terms( $post->ID, 'types' );
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
