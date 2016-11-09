<?php class SliderWidget extends WP_Widget
{
    function SliderWidget(){
		$widget_ops = array('description' => __( 'отображает горизонтальный слайдер товаров в сайдбаре', 'wp-shop' ));
		$control_ops = array('width' => 400, 'height' => 500);
		parent::WP_Widget(false,$name=__( 'Слайдер товаров в сайдбаре', 'wp-shop' ),$widget_ops,$control_ops);
	}

  /* Displays the Widget in the front-end */
    function widget($args, $instance){
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : esc_html( $instance['title'] ) );
		$sliderCat = empty($instance['sliderCat']) ? '' : esc_attr($instance['sliderCat']);
		$sliderTag = empty($instance['sliderTag']) ? '' : esc_attr($instance['sliderTag']);
		$sliderTimeout = empty($instance['sliderTimeout']) ? 0 : esc_attr($instance['sliderTimeout']);
		$sliderElem = empty($instance['sliderElem']) ? 1 : esc_attr($instance['sliderElem']);
		$sliderHeight = empty($instance['sliderHeight']) ? 400 : esc_attr($instance['sliderHeight']);
		
	?>
<div class="clear"></div>	
<li id="sidebar_slider_wrapp">
	<?php if ( $title )
	echo $before_title . $title . $after_title; ?>
	<div class="slider_sidebar_wrapp">
	<div id="rotator_sidebar" class="cycle-slideshow"
	data-cycle-fx=carousel
    data-cycle-timeout=<?php echo $sliderTimeout ?>
    data-cycle-carousel-visible=<?php echo $sliderElem ?>
    data-cycle-auto-height=false
	data-cycle-slides="div.slider_rotator"
	data-cycle-next="#prev_sidebar"
    data-cycle-prev="#next_sidebar"
	data-cycle-carousel-vertical=true
	>
		<?php wp_reset_postdata();
			global $post;
			global $wp_query_slider;
			$wp_query_slider = new WP_Query( array ( 'orderby' => 'rand', 'order' => 'DESC','post_status'=>'publish', 'post_type'=>'post', 'posts_per_page'=>12, 'cat'=>"$sliderCat",'tag_id'=>"$sliderTag",'meta_query'=>array('relation' => 'OR',array ('key' =>'sklad_1' , 'value' =>0,'type' => 'NUMERIC', 'compare' => '>'),array( 'key' => 'sklad_1','value' => '','compare' => 'NOT EXISTS'),array( 'key' => 'sklad_1','value' => '','compare' => '='))));
				if ($wp_query_slider->have_posts()) : while ($wp_query_slider->have_posts()) : $wp_query_slider->the_post(); ?>
					<?php $part_url = get_post_meta($post->ID, 'part_url', true);?>
					<div class="slider_rotator <?php if ($part_url !=''){echo 'partnerka';}?>" style="height:<?php echo $sliderHeight ?>px;" >
						<?php if ($part_url !=''){?>
								<div class="partnerka_url" style="display:none" rel="nofollow"><!--noindex--><?php echo $part_url;?><!--/noindex--></div>
							<?php } ?>
						<?php $thumbnail_slider = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ),full);
							$thumbnail1_slider = get_post_meta($post->ID, 'Thumbnail', true);
							$new = get_post_meta($post->ID, 'new', true);
							$old_price = get_post_meta($post->ID, 'old_price', true);
							if( !empty ($thumbnail_slider )){?>
								<div class="img">
									<a href="<?php the_permalink() ?>">
										<img src="<?php echo $thumbnail_slider[0]; ?>" width="150" title="<?php the_title(); ?>" alt="<?php the_title(); ?>"/>
										<?php if($new == 1) echo '<div class="new_label"></div>';?>
										<?php if(!empty($old_price)) echo '<div class="sale_label"></div>'; ?>
									</a>
								</div>
							<?php } elseif(!empty ($thumbnail1_slider)){?>
								<div class="img">
									<a href="<?php the_permalink() ?>">
										<img src="<?php echo $thumbnail1_slider; ?>" width="150" title="<?php the_title(); ?>" alt="<?php the_title(); ?>"/>
										<?php if($new == 1) echo '<div class="new_label"></div>';?>
										<?php if(!empty($old_price)) echo '<div class="sale_label"></div>'; ?>
									</a>
								</div>
							<?php } else {?>
								<div class="img">
									<a href="<?php the_permalink() ?>" class="no_foto_small">
										<?php if($new == 1) echo '<div class="new_label"></div>';?>
										<?php if(!empty($old_price)) echo '<div class="sale_label"></div>'; ?>
									</a>
								</div>
							<?php } ?>
						
						
						<a class="item_title" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
						
						<div class="clear"></div>
						
						<div class="price_box">
							<?php if(!empty($old_price)){ ?>
								<div class="floatLeft old_price">
									<span class="through"><?php echo $old_price; ?></span> <?php _e( 'старая цена', 'wp-shop' ); ?>
								</div>
								<div class="highlite_price"><?php if(is_plugin_active('wp-shop-original/wp-shop.php')) { echo $GLOBALS['wpshop_obj']->GetGoodWidget(); }?></div>
							<?php } else {?>
								<?php if(is_plugin_active('wp-shop-original/wp-shop.php')) { echo $GLOBALS['wpshop_obj']->GetGoodWidget(); }?>
							<?php } ?>	
						</div>	
										
					</div><!--#item-->	
					
			<?php endwhile; else: // end of the loop. ?>
			<h2><?php _e( 'По данным критериям товаров не найдено', 'wp-shop' ); ?></h2>
			<?php endif;  ?>
	</div>
	<a id="prev_sidebar" href="#"></a>
	<a id="next_sidebar" href="#"></a>

	<div class="clear"></div>
	</div> <!--.slider_sidebar_wrapp-->
</li><!-- #slider_wrapp-->	
<?php wp_reset_query(); ?>
<?php
		
	}

  /*Saves the settings. */
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = stripslashes($new_instance['title']);
		$instance['sliderCat'] = esc_attr($new_instance['sliderCat']);
		$instance['sliderTag'] = esc_attr($new_instance['sliderTag']);
		$instance['sliderTimeout'] = esc_attr($new_instance['sliderTimeout']);
		$instance['sliderElem'] = esc_attr($new_instance['sliderElem']);
		$instance['sliderHeight'] = esc_attr($new_instance['sliderHeight']);				
		return $instance;
	}

  /*Creates the form for the widget in the back-end. */
    function form($instance){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array('title'=>'', 'sliderCat' => '', 'sliderTag' => '', 'sliderTimeout'=>0, 'sliderElem'=>1));
		$title = esc_html($instance['title']);
		$sliderCat = esc_attr($instance['sliderCat']);
		$sliderTag = esc_attr($instance['sliderTag']);
		$sliderTimeout = esc_attr($instance['sliderTimeout']);
		$sliderElem = esc_attr($instance['sliderElem']);
		$sliderHeight = esc_attr($instance['sliderHeight']);
		# Title
		echo '<p><label for="' . $this->get_field_id('title') . '">' . __( 'Заголовок:', 'wp-shop' ) . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></p>'; ?>
		
		<?php	# quantity of items
		echo '<p><label for="' . $this->get_field_id('sliderElem') . '">' .  __( 'Количество товаров в слайдере:', 'wp-shop' ) . '</label><input class="widefat" id="' . $this->get_field_id('sliderElem') . '" name="' . $this->get_field_name('sliderElem') . '" type="text" value="' . $sliderElem . '" /></p>';
		# height of items
		echo '<p><label for="' . $this->get_field_id('sliderHeight') . '">' .  __( 'Высота товара:', 'wp-shop' ) . '</label><input class="widefat" id="' . $this->get_field_id('sliderHeight') . '" name="' . $this->get_field_name('sliderHeight') . '" type="text" value="' . $sliderHeight . '" /></p>';
		# timeout
		echo '<p><label for="' . $this->get_field_id('sliderTimeout') . '">' . __( 'Таймаут слайдере:', 'wp-shop' ) . '</label><input class="widefat" id="' . $this->get_field_id('sliderTimeout') . '" name="' . $this->get_field_name('sliderTimeout') . '" type="text" value="' . $sliderTimeout . '" /></p>';
		# Category
		echo '<p><label for="' . $this->get_field_id('sliderCat') . '">' . __( 'Категория товаров:', 'wp-shop' ) . '</label><input class="widefat" id="' . $this->get_field_id('sliderCat') . '" name="' . $this->get_field_name('sliderCat') . '" type="text" value="' . $sliderCat . '" /></p>';
		# Tag
		echo '<p><label for="' . $this->get_field_id('sliderTag') . '">' . __( 'Тег товара:', 'wp-shop' ) . '</label><input class="widefat" id="' . $this->get_field_id('sliderTag') . '" name="' . $this->get_field_name('sliderTag') . '" type="text" value="' . $sliderTag . '" /></p>';
		
	}

}// end AdvWidget class

function SliderWidgetInit() {
	register_widget('SliderWidget');
}

add_action('widgets_init', 'SliderWidgetInit');

?>