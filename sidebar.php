<?php
 /*
 Шаблон сайдбара
 */
 ?>
 
<div id="sidebar" class="<?php if (of_get_option('blog_sidebar_pos')=='right') {echo ' floatRight pleft';} else {echo 'floatLeft pright';} ?>">
	<?php if ( ! dynamic_sidebar( 'secondary-widget-area' ) ) : ?>
		
	<?php endif; // end primary widget area ?>

</div>	