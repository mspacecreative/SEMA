<?php

get_header();

$show_default_title = get_post_meta( get_the_ID(), '_et_pb_show_title', true );

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">
	<?php
		if ( et_builder_is_product_tour_enabled() ):
			// load fullwidth page in Product Tour mode
			while ( have_posts() ): the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
					<div class="entry-content">
					<?php
						the_content();
					?>
					</div> <!-- .entry-content -->

				</article> <!-- .et_pb_post -->

		<?php endwhile;
		else:
	?>
	<?php if ( get_field('content_width') ): ?>
	<div class="container full-width">
	<?php else : ?>
	<div class="container">
	<?php endif; ?>
		<div id="content-area" class="clearfix">
			<div id="left-area">
			<a style="font-weight: 500; display: inline-block; margin: 0 0 50px;" href="<?php echo home_url('solutions#rapid-growth'); ?>"><?php esc_html_e('&laquo; Back to Solutions'); ?></a>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php if (et_get_option('divi_integration_single_top') <> '' && et_get_option('divi_integrate_singletop_enable') == 'on') echo(et_get_option('divi_integration_single_top')); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>

					<div class="entry-content">
					<?php
						do_action( 'et_before_content' );

						the_content();
						
						if( have_rows('apply_now_button') ): 
						
							while( have_rows('apply_now_button') ): the_row(); 
								
								// vars
								$button_label = get_sub_field('button_label');
								$button_address = get_sub_field('submission_email_address'); ?>
						
								<p style="margin-top: 15px;">
								    <a class="et_pb_button et_pb_custom_button_icon et_pb_bg_layout_dark no_hover" href="mailto:<?php echo $button_address; ?>" data-icon="E">
									<?php echo $button_label; ?>
								    </a>
								</p>
						
							<?php endwhile; ?>
							
						<?php endif; ?>

						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
					?>
					</div> <!-- .entry-content -->
					<div class="et_post_meta_wrapper">
					<?php
					if ( et_get_option('divi_468_enable') == 'on' ){
						echo '<div class="et-single-post-ad">';
						if ( et_get_option('divi_468_adsense') <> '' ) echo( et_get_option('divi_468_adsense') );
						else { ?>
							<a href="<?php echo esc_url(et_get_option('divi_468_url')); ?>"><img src="<?php echo esc_attr(et_get_option('divi_468_image')); ?>" alt="468" class="foursixeight" /></a>
				<?php 	}
						echo '</div> <!-- .et-single-post-ad -->';
					}
				?>

					<?php if (et_get_option('divi_integration_single_bottom') <> '' && et_get_option('divi_integrate_singlebottom_enable') == 'on') echo(et_get_option('divi_integration_single_bottom')); ?>

					<?php
						if ( ( comments_open() || get_comments_number() ) && 'on' == et_get_option( 'divi_show_postcomments', 'on' ) ) {
							comments_template( '', true );
						}
					?>
					</div> <!-- .et_post_meta_wrapper -->
				</article> <!-- .et_pb_post -->

			<?php endwhile; ?>
			<a style="font-weight: 500;" href="<?php echo home_url('solutions#rapid-growth'); ?>"><?php esc_html_e('&laquo; Back to Solutions'); ?></a>
			</div> <!-- #left-area -->

			<?php get_sidebar('solutions'); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
	<?php endif; ?>
</div> <!-- #main-content -->

<?php

get_footer();