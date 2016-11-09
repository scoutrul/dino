<?php
 /*
 Шаблон формы поиска
 */
 ?>
<div class="search">
	<form action="<?php bloginfo('url'); ?>" method="get">
		<input type="hidden" name="post_type" value="post" />
		<input type="text" name="s" id="search" class="floatLeft" value="<?php _e( 'Поиск', 'wp-shop' ); ?>" />
		<input type="submit" name="" value="<?php _e( 'Найти', 'wp-shop' ); ?>" id="submit" >
	</form>
</div>
