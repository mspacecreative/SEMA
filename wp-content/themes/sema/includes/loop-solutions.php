<?php
$loop = new WP_Query( array( 'post_type' => 'solutions', 'posts_per_page' => -1, 'order' => 'ASC' ) );
    if ( $loop->have_posts() ) : ?>
    <div class="solutions_grid clearfix">
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        
		<div class="solutions_grid_box">
			<?php
			if ( has_post_thumbnail() ) { 
				the_post_thumbnail('medium', array('class' => 'solution-thumb'));
			}
			?>
			<h3><?php the_title(); ?></h3>
			
			<?php if( have_rows('grid_content_box') ):
				while( have_rows('grid_content_box') ): the_row(); ?>
					
					<?php if ( get_sub_field('subtitle') ): ?>
					<span style="color: #000; text-transform: uppercase;"><strong><?php the_sub_field('subtitle'); ?></span>
					<?php else : ?>
					<span style="color: #000;"><strong>BEST FOR</strong></span>
					<?php endif; ?>
					
					<p><?php the_sub_field('best_for_content'); ?></p>
						
					<?php if ( get_sub_field('learn_more_button') == 'external' ): ?>
						
					<?php if( have_rows('external_link_button') ): 
						while( have_rows('external_link_button') ): the_row(); ?>
						
						<a class="et_pb_button hide-on-desktop alt" style="font-size: 16px;" href="<?php the_sub_field('link_url'); ?>"><?php the_sub_field('link_label'); ?></a>
						
						<?php endwhile;
					endif; ?>
						
						<?php else : ?>
						<?php $title = get_the_title(); ?>
						<a data-icon="C" class="et_pb_button hide-on-desktop" style="font-size: 16px;" href="#<?php echo sanitize_title_with_dashes( $title ); ?>">Learn More</a>
						
					<?php endif; ?>
						
				<?php endwhile; ?>
			<?php endif; ?>
			
		</div><!-- end solutions_grid_box -->
		
        <?php endwhile; ?>
	</div>
	
	<div class="solutions_blurbs">
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
	
		<?php if ( get_field('show_post', $post->ID ) ): ?>
		<?php $title = get_the_title(); ?>
		<div id="<?php echo sanitize_title_with_dashes( $title ); ?>" <?php post_class( 'blurb' ); ?>>
			<h2><?php the_title(); ?></h2>
			
			<div class="clearfix">
				<?php the_field('summary_content'); ?>
				
				<?php if ( has_post_thumbnail() ) { 
					the_post_thumbnail('medium', array('class' => 'solution-thumb'));
				} ?>
				
				<?php if ( get_field('cta_button_type') == 'external' ): ?>
				
				<?php if( have_rows('cta_button_content') ): 
				while( have_rows('cta_button_content') ): the_row(); ?>
				
				<div>
					<a class="et_pb_button hide-on-desktop" style="font-size: 16px;" href="<?php the_sub_field('external_button_link'); ?>" target="_blank"><?php the_sub_field('cta_button_label'); ?></a>
					
					<a class="et_pb_button hide-on-desktop" style="font-size: 16px; margin-left: 15px;" href="<?php echo home_url('get-a-demo'); ?>"><?php esc_html_e('Get a Demo'); ?></a>
				</div>
				
				<?php endwhile;
				endif; ?>
				
				<?php elseif ( get_field('cta_button_type') == 'default' ): ?>
				
				<?php if( have_rows('cta_button_content') ): 
				while( have_rows('cta_button_content') ): the_row(); ?>
				
				<div>
					<a class="et_pb_button hide-on-desktop" style="font-size: 16px;" href="<?php the_permalink(); ?>"><?php the_sub_field('cta_button_label'); ?></a>
					
					<a class="et_pb_button hide-on-desktop" style="font-size: 16px; margin-left: 15px;" href="<?php echo home_url('get-a-demo'); ?>"><?php esc_html_e('Get a Demo'); ?></a>
				</div>
				
				<?php endwhile;
				endif; ?>
				
				<?php elseif ( get_field('cta_button_type') == 'internal' ): ?>
				
				<?php if( have_rows('cta_button_content') ): 
				while( have_rows('cta_button_content') ): the_row(); ?>
				
				<div>
					<a class="et_pb_button hide-on-desktop" style="font-size: 16px;" href="<?php the_sub_field('internal_button_link'); ?>"><?php the_sub_field('cta_button_label'); ?></a>
					
					<a class="et_pb_button hide-on-desktop" style="font-size: 16px; margin-left: 15px;" href="<?php echo home_url('get-a-demo'); ?>"><?php esc_html_e('Get a Demo'); ?></a>
				</div>
				
				<?php endwhile;
				endif; ?>
				
				<?php endif; ?>
			</div>
			
		</div>
		<?php endif; ?>
		
	<?php endwhile; ?>
	</div>
	
    <?php endif;
wp_reset_postdata(); ?>