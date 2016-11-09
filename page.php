<?php
 /*
 Шаблон страницы с сайдбаром
 */
 ?>
 
<?php get_header(); ?>
<div class="container relat clearfix">
	<div id="main-content" class="narrow <?php if (of_get_option('blog_sidebar_pos')=='right') {echo ' floatLeft';} else {echo 'floatRight';} ?>">
		<?php get_template_part( 'loop', 'page' ); ?>
	</div>
	<?php get_sidebar(); ?>
</div><!--.container-->	
<?php get_footer(); ?>
