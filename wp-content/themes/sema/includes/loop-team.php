<?php if ( get_field('team_grouping_title', 'options') ): ?>
	<h1>
		<?php the_field('team_grouping_title', 'options'); ?>
	</h1>
<?php endif; ?>

<div class="team-container clearfix">
	<?php 
	
	$args = array(
		'numberposts'	=> -1,
		'post_type'		=> 'team',
		'meta_key'		=> 'team_category',
		'meta_value'  	=> 'Team'
	);
	
	
	// query
	$the_query = new WP_Query( $args );
	
	
	if( $the_query->have_posts() ):
		while( $the_query->have_posts() ) : $the_query->the_post(); ?>
			
			<div class="team-member">
				
				<!--<button class="read-bio"><i class="fa fa-plus"></i></button>
				<div class="bio-overlay">
					<div class="bio-container">
						<i class="fa fa-close close-button"></i>
						<?php if( get_field('bio_question') ): ?>
							<h3 style="margin: 0 0 10px;"><?php the_field('bio_question'); ?></h3>
						<?php endif; ?>
						<?php the_content(); ?>
					</div>
				</div>-->
				<?php if ( get_field('linkedin_link') ): ?>
				<a href="<?php the_field('linkedin_link'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<?php endif; ?>
				<div class="hover-overlay"></div>
				<div class="member-name">
					<h4><?php the_title(); ?></h4>
					<?php if( get_field('position_title') ): ?>
						<p><?php the_field('position_title'); ?></p>
					<?php endif; ?>
				</div>
				<?php if ( has_post_thumbnail() ) { ?>
				
					<?php the_post_thumbnail('headshot'); ?>
				
				<?php }
				
				else { ?>
				<img src="<?php bloginfo('stylesheet_directory'); ?>/img/placeholders/portrait_placeholder.jpg" alt="<?php the_title(); ?>" />
				<?php } ?>
				
			</div>
			
		<?php endwhile; ?>
	<?php endif; ?>
	<?php wp_reset_query(); ?>
</div>

<h1><?php the_field('scientific_advisory_board_title', 'options'); ?></h1>

<div class="team-container clearfix">
	<?php 
	
	$args = array(
		'numberposts'	=> -1,
		'post_type'		=> 'team',
		'meta_key'		=> 'team_category',
		'meta_value'  	=> 'Scientific Advisory Board'
	);
	
	
	// query
	$the_query = new WP_Query( $args );
	
	
	if( $the_query->have_posts() ):
		while( $the_query->have_posts() ) : $the_query->the_post(); ?>
			
			<div class="team-member">
				
				<!--<button class="read-bio"><i class="fa fa-plus"></i></button>
				<div class="bio-overlay">
					<div class="bio-container">
						<i class="fa fa-close close-button"></i>
						<?php if( get_field('bio_question') ): ?>
							<h3 style="margin: 0 0 10px;"><?php the_field('bio_question'); ?></h3>
						<?php endif; ?>
						<?php the_content(); ?>
					</div>
				</div>-->
				<a href="<?php the_field('linkedin_link'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<div class="hover-overlay"></div>
				<div class="member-name">
					<h4><?php the_title(); ?></h4>
					<?php if( get_field('position_title') ): ?>
						<p><?php the_field('position_title'); ?></p>
					<?php endif; ?>
				</div>
				<?php if ( has_post_thumbnail() ) { ?>
				
					<?php the_post_thumbnail('headshot'); ?>
				
				<?php }
				
				else { ?>
				<img src="<?php bloginfo('stylesheet_directory'); ?>/img/placeholders/portrait_placeholder.jpg" alt="<?php the_title(); ?>" />
				<?php } ?>
				
			</div>
			
		<?php endwhile; ?>
	<?php endif; ?>
	<?php wp_reset_query(); ?>
</div>