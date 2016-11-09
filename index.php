<?php
 /*
Основной шаблон
 */
 ?>

<?php get_header(); ?>
<div id="page-wrap">
 <div class="main-width">
	<?php get_sidebar(); ?>
	<div id="main-content" class="narrow">
		<?php get_template_part( 'loop', 'index' ); ?>
	</div>
</div><!--.main-width--> 

<?php get_footer(); ?>