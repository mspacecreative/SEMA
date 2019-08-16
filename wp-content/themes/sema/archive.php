<?php get_header(); ?>

<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
				<div class="et_pb_title_container">
				    <h1 class="entry-title">
				    <span class="parent-title">
				    <?php echo esc_html_e('Resource Type'); ?>
				    </span>
				    <span class="title-spacer"><?php _e(' &nbsp;'); ?></span><span class="child-title">
				    <?php echo single_term_title( '', false ); ?>
				    </span>
				    </h1>
				</div>
				<div style="padding: 50px 0 0;">
				    <?php get_template_part('includes/loop-archive-resources'); ?>
				</div>
			</div>
			<?php get_sidebar('resources'); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php

get_footer();