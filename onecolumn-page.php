<?php
/*
 Template Name: На всю ширину страницы без сайдбара
 */
?>

<?php get_header(); ?>
<div class="container relat clearfix">
	<div id="main-content" class="fullwidth">
		<?php get_template_part( 'loop', 'page' ); ?>
	</div>
</div><!--.container-->	
<?php get_footer(); ?>