<div class="team-container">
	<?php $loop = new WP_Query( array( 'post_type' => 'team', 'posts_per_page' => -1, ) ); ?>
	<?php while ( $loop->have_posts() ) : $loop->the_post();
		if ( has_post_thumbnail() ) { ?>
		<div class="team-member">
			<a href="#"><i class="fa fa-linkedin"></i></a>
			<div class="hover-overlay"></div>
			<div class="member-name">
				<h4><?php the_title(); ?></h4>
				<?php if( get_field('position_title') ): ?>
					<p><?php the_field('position_title'); ?></p>
				<?php endif; ?>
			</div>
			<?php the_post_thumbnail(); ?>
		</div>
		<?php } ?>
	<?php endwhile; wp_reset_query(); ?>
</div>