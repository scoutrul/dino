<?php class WP_Widget_Text_Slider extends WP_Widget {

	function __construct() {
		$widget_ops = array('classname' => 'widget_text_slider', 'description' => __( 'отображает баннер справа от слайдера', 'wp-shop' ));
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('widget_text_slider', __( 'Баннер справа от слайдера', 'wp-shop' ), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$link = empty($instance['link']) ? '' : esc_url($instance['link']);
		$text = apply_filters( 'widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
		
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; } ?>
			<div class="textwidget_slider">
				<?php  if (!empty($link)) echo '<a href="'.$link.'">'?>
				<?php echo $text; ?>
				<?php  if (!empty($link)) echo '</a>'?>
			</div>
		<?php
		
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['link'] = esc_url($new_instance['link']);
		$instance['text'] =  $new_instance['text'];
				
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'link' => '', 'text' => '' ) );
		$link = esc_url($instance['link']);
		$text = esc_textarea($instance['text']);
?>
		<p><label><?php echo __( 'Url:', 'wp-shop' ); ?></label><input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text"  value="<?php echo $link; ?>"></input></p>
		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
		
<?php
	}
}

function WP_Widget_Text_Slider_Init() {
	register_widget('WP_Widget_Text_Slider');
}

add_action('widgets_init', 'WP_Widget_Text_Slider_Init');

?>