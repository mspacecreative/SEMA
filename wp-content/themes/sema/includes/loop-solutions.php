<?php
$loop = new WP_Query( array( 'post_type' => 'solutions', 'posts_per_page' => -1, 'order' => 'ASC' ) );
    if ( $loop->have_posts() ) : ?>
    <div class="solutions_grid clearfix">
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        
		<div class="solutions_grid_box">
			<h3><?php the_title(); ?></h3>
			<span><strong>BEST FOR</strong></span>
			
			<?php if( have_rows('grid_content_box') ): 
			
				while( have_rows('grid_content_box') ): the_row(); ?>
				<p><?php the_sub_field('best_for_content'); ?></p>
				<a class="et_pb_button hide-on-desktop" style="font-size: 15px;" href="#<?php the_sub_field('learn_more_button'); ?>">LEARN MORE</a>
				<?php endwhile; ?>
				
			<?php endif; ?>
			
		</div><!-- end solutions_grid_box -->
		
        <?php endwhile; ?>
	</div>
	
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
	
	<div class="solutions_blurbs">
		<div class="blurb">
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
			
			<?php if( have_rows('external_link') ): 
			while( have_rows('external_link') ): the_row(); ?>
			
			<?php if ( get_sub_field('external_link_label') ): ?>
			
			<a class="et_pb_button hide-on-desktop" style="font-size: 15px;" href="<?php the_sub_field('external_link_button'); ?>"><?php the_sub_field('external_link_label'); ?></a>
			
			<?php else : ?>
			
			<a class="et_pb_button hide-on-desktop" style="font-size: 15px;" href="<?php the_sub_field('external_link_button'); ?>">LEARN MORE</a>
			
			<?php endif; ?>
			
			<?php endwhile;
			endif; ?>
			
		</div>
	</div>
	
	<?php endwhile; ?>
	
    <?php endif;
wp_reset_postdata(); ?>