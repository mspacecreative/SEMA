<?php
$loop = new WP_Query( array( 'post_type' => 'solutions', 'posts_per_page' => -1 ) );
    if ( $loop->have_posts() ) : ?>
    <div class="solutions_grid clearfix">
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <div class="solutions_grid_box">
			<h4><?php the_title(); ?></h4>
			<span><strong>BEST FOR</strong></span><br />
			
			<?php if( have_rows('grid_content_box') ): 
			
				while( have_rows('grid_content_box') ): the_row(); ?>
				<p><?php the_sub_field('best_for_content'); ?></p>
				<a class="et_pb_button hide-on-desktop" style="font-size: 15px;" href="#<?php the_sub_field('learn_more_button'); ?>">LEARN MORE</a>
				<?php endwhile; ?>
				
			<?php endif; ?>
			
		</div>
        <?php endwhile; ?>
	</div>
    <?php endif;
wp_reset_postdata(); ?>