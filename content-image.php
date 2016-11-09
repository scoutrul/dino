<?php
 /*
 Цикл одиночной записи с миниатюрой
 */
 ?>

 <?php $category = get_the_category( $post->ID);?>
<div class="single_bread"><?php echo is_wp_error( $cat_parents = get_category_parents($category[0]->cat_ID, TRUE, '<span> >> </span>') ) ? '' : $cat_parents;?></div>		
<div class="clear"></div>

<div id="main-content" class="narrow <?php if (of_get_option('blog_sidebar_pos')=='right') {echo ' floatLeft';} else {echo 'floatRight';} ?>">

	<?php wp_reset_query();
	while ( have_posts() ) : the_post(); ?>
	
	<?php $posttags = get_the_tags();?>	

	
	<div id="single_wrapper" class="single_img">
	
		<?php $thumbnail = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ),full);
			$thumbnail1 = get_post_meta($post->ID, 'Thumbnail', true);
			$new = get_post_meta($post->ID, 'new', true);
			$old_price = get_post_meta($post->ID, 'old_price', true);
			$similar_products = get_post_meta($post->ID, 'similar_products', true);
			$similar_tag_name = get_post_meta($post->ID, 'similar_tag_name', true);
			if( !empty ($thumbnail )){?>
			<div class="img">
				<img src="<?php echo $thumbnail[0]; ?>" width="240" title="<?php the_title(); ?>" alt="<?php the_title(); ?>"/>
				<?php if($new == 1) echo '<div class="new_label"></div>';?>
				<?php if(!empty($old_price)) echo '<div class="sale_label"></div>'; ?>
			</div>
			<?php } elseif(!empty ($thumbnail1)){?>
				<div class="img">
					<img src="<?php echo $thumbnail1; ?>" width="240" title="<?php the_title(); ?>" alt="<?php the_title(); ?>"/>
					<?php if($new == 1) echo '<div class="new_label"></div>';?>
					<?php if(!empty($old_price)) echo '<div class="sale_label"></div>'; ?>
				</div>
			<?php } else {?>
				<div class="img">
					<a class="no_foto"></a>
					<?php if($new == 1) echo '<div class="new_label"></div>';?>
					<?php if(!empty($old_price)) echo '<div class="sale_label"></div>'; ?>
				</div>
		<?php } ?>
		
		<h2 class="page_title"><?php the_title(); ?></h2>
		<?php $part_url = get_post_meta($post->ID, 'part_url', true);?>
		
		<script>
			$(function(){
				var part = '<?php echo $part_url;?>';
				if(part !='') {
					$('#single_wrapper > div > .wpshop_bag .wpshop_buy td.wpshop_button').html('<a href="'+part+'" target="_blank"><span><?php _e( 'Купить', 'wp-shop' ); ?></span></a>');
				}
						
			});
		</script>
		<div class="floatRight bottom40">
			<?php if(!empty($old_price)){ ?>
				<div class="floatRight old_price">
					<span class="through"><?php echo $old_price; ?></span> <?php _e( 'старая цена', 'wp-shop' ); ?>
				</div>
			<?php } ?>
			<?php if(is_plugin_active('wp-shop-original/wp-shop.php')) { echo $GLOBALS['wpshop_obj']->GetGoodWidget(); }?>
		</div>
		
		<div id="desc" class="just clearRight">	
			<?php the_content(); ?>
		</div>
		
		<?php edit_post_link(__('Редактировать','wp-shop')); ?>
	<?php endwhile; // end of the loop. ?>
	<?php if($similar_products == 1) {?>
		<div class="clear bottom40"></div>
		<h2 class="page_title similar_text"><?php _e( 'Похожие товары:', 'wp-shop' ); ?></h2>
		<?php 	$tag_ids = '';
			$arg ['orderby'] = 'rand';
			$arg ['order'] = 'DESC';
			$arg ['post_status'] = 'publish';
			$arg ['showposts'] = 12;
			$arg ['post__not_in'] = array($post->ID);
		if ( !empty($similar_tag_name) ) {	
			$arg ['tag'] = $similar_tag_name;
		} else {
			if ( !empty($posttags) ) { 
				$count=0;
				foreach($posttags as $tag) {
					$count++;
					if ($count !=1) {$tag_ids .= ',';}
					$tag_ids .= $tag->term_id;
				}
				$arg ['tag__in'] = array($tag_ids);
			} else { $arg ['cat'] = $category[0]->cat_ID;}
		}	
		?>	
		
		
		<div id="rotator_cont">
			<div id="rotator" class="cycle-slideshow" data-cycle-fx=carousel data-cycle-timeout=5000 data-cycle-slides="div#item_rotator" data-cycle-next="#prev_rotator" data-cycle-prev="#next_rotator">
				<?php wp_reset_postdata();
				global $wp_query;
				$wp_query = new WP_Query($arg);?>	
					<?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
						<div id="item_rotator" style="height:320px;">
							<?php $thumbnail = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ),full);
							$thumbnail1 = get_post_meta($post->ID, 'Thumbnail', true);
							$new = get_post_meta($post->ID, 'new', true);
							$old_price = get_post_meta($post->ID, 'old_price', true);
							if( !empty ($thumbnail )){?>
								<div class="img">
									<a href="<?php the_permalink() ?>">
										<img src="<?php echo $thumbnail[0]; ?>" width="128" title="<?php the_title(); ?>" alt="<?php the_title(); ?>"/>
										<?php if($new == 1) echo '<div class="new_label"></div>';?>
										<?php if(!empty($old_price)) echo '<div class="sale_label"></div>'; ?>
									</a>
								</div>
							<?php } elseif(!empty ($thumbnail1)){?>
								<div class="img">
									<a href="<?php the_permalink() ?>">
										<img src="<?php echo $thumbnail1; ?>" width="128" title="<?php the_title(); ?>" alt="<?php the_title(); ?>"/>
										<?php if($new == 1) echo '<div class="new_label"></div>';?>
										<?php if(!empty($old_price)) echo '<div class="sale_label"></div>'; ?>
									</a>
								</div>
							<?php } else {?>
								<div class="img">
									<a href="<?php the_permalink() ?>" class="no_foto_rot">
										<?php if($new == 1) echo '<div class="new_label"></div>';?>
										<?php if(!empty($old_price)) echo '<div class="sale_label"></div>'; ?>
									</a>
								</div>
							<?php } ?>
							
							<a id="item_title" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
																					
							<div class="price_box">
								<?php if(is_plugin_active('wp-shop-original/wp-shop.php')) { echo $GLOBALS['wpshop_obj']->GetGoodWidget(); }?>
							</div>
														
						</div><!--#item-->
					<?php endwhile; else: // end of the loop. ?>
						<h2><?php _e( 'По данным критериям товаров не найдено', 'wp-shop' ); ?></h2>
					<?php endif;  ?>
					</div>
				<a id="prev_rotator" href="#"></a>
				<a id="next_rotator" href="#"></a>
			</div>		
		<?php } ?>	
	</div><!--#single_wrapper-->				
	<div class="clear"></div>
	<?php wp_reset_query(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div id="comments_bar"><?php comments_template( '', true ); ?></div>
	<?php endwhile; // end of the loop. ?>
	<?php endif; // end of the loop. ?>
	<div class="clear bottom40"></div>	
</div><!--#main-content-->
<?php get_sidebar(); ?>