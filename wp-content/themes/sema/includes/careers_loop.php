<h3 style="border-bottom: 1px solid #e9e9e9; padding-bottom: 10px;">Current career opportunities</h3>
<?php 
$args = array(
	'numberposts'	=> -1,
	'post_type'		=> 'careers',
);

$the_query = new WP_Query( $args );

if( $the_query->have_posts() ): ?>
<ul>
	<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
	
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	
	<?php endwhile; else : ?>
	<p style="font-style: italic;"><?php _e('There are no open positions at this time.'); ?></p>
</ul>
<?php endif; ?>
<?php wp_reset_query(); ?>