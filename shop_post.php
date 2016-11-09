<?php
 /*
 Шаблон отображения корзины и вариантов оплаты
 */
 ?>
 
 <?php while ( have_posts() ) : the_post(); ?>
	<div id="main-content" class="narrow <?php if (of_get_option('blog_sidebar_pos')=='right') {echo ' floatLeft';} else {echo 'floatRight';} ?>">
		<div class="load">
			<h1 class="page_title"><?php the_title(); ?></h1>
			<div class="clear"></div>
			<?php the_content(); ?>


		</div>
	</div><!--#main-content-->	
	<?php get_sidebar(); ?>
<?php endwhile; // end of the loop. ?>