<?php
 /*
 Шаблон отображения одиночной записи
 */
 ?>
 
<?php get_header(); ?>
<div class="container relat clearfix">



	<?php if( get_post_type() != 'post' ){ include  ('shop_post.php'); 
		} else {?>
			<?php get_template_part( 'content', get_post_format() ); ?>
	<?php } ?>




</div><!--.container-->	
<?php get_footer(); ?>

