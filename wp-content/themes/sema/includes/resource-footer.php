<?php
$args = array(
    'post_type' => 'resources',
    'posts_per_page' => 1,
    'meta_query' => array( 
      array(
        'key' => '_thumbnail_id'
      ),
      array(
        'key' => 'footer_cta',
        'value' => '1'
      ),
      array(
        'key' => 'content'
      ),
      array(
        'key' => 'resource_button_type',
        'value' => 'external'
      )
    )
);
$arr_posts = new WP_Query( $args );
 
if ( $arr_posts->have_posts() ) :
 
    while ( $arr_posts->have_posts() ) :
        $arr_posts->the_post(); ?>
        
        <div class="featured-resource-footer clearfix">
			<?php
			$external = get_field('resource_button_type') == 'external' );
			if ( $external ): ?>
			<h2><?php esc_html_e('Featured Resource: '); ?><a style="color: #0072d6;" href="<?php the_field('external_link'); ?>" target="_blank"><?php the_title(); ?></a></h2>
			<?php else : ?>
			<h2><?php esc_html_e('Featured Resource: '); ?><a style="color: #0072d6;" href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php endif; ?>
			<?php if ( get_field('content') ):
			the_field('content');
			else :
			the_excerpt();
			endif; ?>
			<?php if ( $external ): ?>
			<a class="et_pb_button et_pb_custom_button_icon" data-icon="E" style="display: inline-block;" href="<?php the_field('external_link'); ?>" target="_blank"><?php _e('Learn More'); ?></a>
			<?php else : ?>
			<a class="et_pb_button et_pb_custom_button_icon" data-icon="E" style="display: inline-block;" href="<?php the_permalink(); ?>"><?php _e('Learn More'); ?></a>
			<?php endif; ?>
		</div>
        
    <?php endwhile;
    
endif; wp_reset_query(); ?>