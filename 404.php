<?php
 /*
 Шаблон страницы 404
 */
 ?>
 
<?php get_header(); ?>
<div class="container relat clearfix">
	<div id="main-content" class="narrow <?php if (of_get_option('blog_sidebar_pos')=='right') {echo ' floatLeft';} else {echo 'floatRight';} ?>">
	<h1 class="page_title"><?php _e( 'Страница не найдена', 'wp-shop' ); ?></h1>
		<p><?php _e( 'Извините, но страница, которую вы запросили, не найдена. Возможно, поиск поможет.', 'wp-shop' ); ?></p>
	</div><!--#main-content-->	
	<?php get_sidebar(); ?>
</div><!--.container-->	
<?php get_footer(); ?>
