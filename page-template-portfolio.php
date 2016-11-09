<?php 
/*
Template Name: Витрина
*/
?>

<?php 
$et_ptemplate_settings = array();
$et_ptemplate_settings = maybe_unserialize( get_post_meta($post->ID,'et_ptemplate_settings',true) );
$et_ptemplate_showthumb = isset( $et_ptemplate_settings['et_ptemplate_showthumb'] ) ? (bool) $et_ptemplate_settings['et_ptemplate_showthumb'] : false;
$et_ptemplate_showtitle = isset( $et_ptemplate_settings['et_ptemplate_showtitle'] ) ? (bool) $et_ptemplate_settings['et_ptemplate_showtitle'] : false;
$et_ptemplate_showdesc = isset( $et_ptemplate_settings['et_ptemplate_showdesc'] ) ? (bool) $et_ptemplate_settings['et_ptemplate_showdesc'] : false;
$et_ptemplate_price = isset( $et_ptemplate_settings['et_ptemplate_price'] ) ? (bool) $et_ptemplate_settings['et_ptemplate_price'] : false;
$et_ptemplate_order = isset( $et_ptemplate_settings['et_ptemplate_order'] ) ? (int) $et_ptemplate_settings['et_ptemplate_order'] : 1;
$et_ptemplate_orderby = isset( $et_ptemplate_settings['et_ptemplate_orderby'] ) ? (string) $et_ptemplate_settings['et_ptemplate_orderby'] : date;
$gallery_tags = isset( $et_ptemplate_settings['et_ptemplate_tags'] ) ? (array) $et_ptemplate_settings['et_ptemplate_tags'] : array();
$gallery_cats = isset( $et_ptemplate_settings['et_ptemplate_gallerycats'] ) ? (array) $et_ptemplate_settings['et_ptemplate_gallerycats'] : array();
$et_ptemplate_gallery_perpage = isset( $et_ptemplate_settings['et_ptemplate_gallery_perpage'] ) ? (int) $et_ptemplate_settings['et_ptemplate_gallery_perpage'] : 12;
$et_ptemplate_words = isset( $et_ptemplate_settings['et_ptemplate_words'] ) ? (int) $et_ptemplate_settings['et_ptemplate_words'] : 30;
$et_ptemplate_height = isset( $et_ptemplate_settings['et_ptemplate_height'] ) ? (int) $et_ptemplate_settings['et_ptemplate_height'] : 350;
$et_ptemplate_column = isset( $et_ptemplate_settings['et_ptemplate_column'] ) ? (int) $et_ptemplate_settings['et_ptemplate_column'] : 1;
$et_ptemplate_main_cont = isset( $et_ptemplate_settings['et_ptemplate_main_cont'] ) ? (int) $et_ptemplate_settings['et_ptemplate_main_cont'] : 1;
$et_ptemplate_field_value = isset( $et_ptemplate_settings['et_ptemplate_field_value'] ) ? (string) $et_ptemplate_settings['et_ptemplate_field_value'] : '';
?>

<?php get_header(); ?>
<div class="container relat clearfix">

<div id="main-content" class="<?php if($et_ptemplate_column == 1) echo('fullwidth');?><?php if($et_ptemplate_column == 2) echo('narrow');?> <?php if (of_get_option('blog_sidebar_pos')=='right') {echo ' floatLeft';} else {echo 'floatRight';} ?>">
	
	<?php if($et_ptemplate_main_cont == 1) {?>
		<?php wp_reset_query(); ?>
		<div id="desc">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
				<?php the_content(); ?>
				<?php edit_post_link(__('Редактировать','wp-shop')); ?>
			<?php endwhile; // end of the loop. ?>
			<?php endif; // end of the loop. ?>
		</div>			
		<div class="clear"></div>
	<?php } ?>
	
	<div id="vitrina">
	
		<?php $options = array('post_type' => 'post');?>
		
		<?php $cat_query = '';
			if ( !empty($gallery_cats) ){ $options["cat"] = implode(",", $gallery_cats);
			echo '<!-- '. $options["cat"]  .' -->';}
			else echo '<!-- category is not selected -->';
		?>
		
		<?php $tag_query = '';
			if ( !empty($gallery_tags) ) { $options["tag"] = implode(",", $gallery_tags);
			echo '<!--' . $options["tag"] . '-->';}
			else echo '<!-- tag is not selected -->';
		?>
		
		<?php
			$options["meta_query"][0] = array ('relation' => 'OR',array ('key' =>'sklad_1' , 'value' =>0,'type' => 'NUMERIC', 'compare' => '>'),array( 'key' => 'sklad_1','value' => '','compare' => 'NOT EXISTS'),array( 'key' => 'sklad_1','value' => '','compare' => '='));	
    ?>
    <?php if ( !empty($et_ptemplate_field_value)) 
			{ echo '<!-- field is selected -->';
			$options["meta_query"][1] =array ('key' => $et_ptemplate_field_value , 'value' => array(''), 'compare' => 'NOT IN');
      }			
			else echo '<!-- field is not selected -->';
		?>
    
		<?php 
			if ( $et_ptemplate_orderby == "meta_value_num" ){ $options["meta_key"] = 'cost_1';}
			else echo '<!-- price is not selected -->';
			$options['orderby']=$et_ptemplate_orderby;
			echo '<!--' . $options['orderby'] . ' -->';
		?>
				
		<?php 
			if ( $et_ptemplate_orderby == "meta_value_num" ){ $options["meta_key"] = 'cost_1';}
			else echo '<!-- price is not selected -->';
			$options['orderby']=$et_ptemplate_orderby;
			echo '<!--' . $options['orderby'] . ' -->';
		?>
								
		<?php 
			if ( $et_ptemplate_order == 1 ) { $options["order"]='ASC'; $o1 = ' selected="selected"'; } 
			if ( $et_ptemplate_order == 2 ) { $options["order"]='DESC'; $o2 = ' selected="selected"'; } 
		?>
		
		<?php 
			if ( $et_ptemplate_gallery_perpage == 12 ) { $options["posts_per_page"]=12; $p1 = ' selected="selected"'; } 
			if ( $et_ptemplate_gallery_perpage == 24 ) { $options["posts_per_page"]=24; $p2 = ' selected="selected"'; } 
			if ( $et_ptemplate_gallery_perpage == 48 ) { $options["posts_per_page"]=48; $p3 = ' selected="selected"'; } 
			if ( $et_ptemplate_gallery_perpage == 100 ) { $options["posts_per_page"]=100; $p4 = ' selected="selected"'; } 
		?>
		
		<?php 
			if ( $options["orderby"] == 'title' || $options["orderby"] == 'count_count' || $options['orderby'] == 'id' ) $s1 = ' selected="selected"';
			if ( $options["orderby"] == 'date' ) $s2 = ' selected="selected"';
			if ( $options["orderby"] == 'meta_value_num' ) $s3 = ' selected="selected"';
			if ( $options["orderby"] == 'rand' ) $s4 = ' selected="selected"';
		?>
				
		<?php
			if ($_GET['select'] == 'title') { $options["orderby"] = 'title'; unset($options["meta_key"]); $s1 = ' selected="selected"'; $s2 = ''; $s3 = ''; $s4 = '';}
			if ($_GET['select'] == 'date') { $options["orderby"] = 'date'; unset($options["meta_key"]); $s2 = ' selected="selected"'; $s1 = ''; $s3 = ''; $s4 = ''; }
			if ($_GET['select'] == 'meta_value_num') { $options["orderby"] = 'meta_value_num'; $options["meta_key"] = 'cost_1'; $s3 = ' selected="selected"'; $s2 = ''; $s1 = ''; $s4 = ''; }
			if ($_GET['select'] == 'rand') { $options["orderby"] = 'rand'; unset($options["meta_key"]); $s4 = ' selected="selected"'; $s2 = ''; $s3 = ''; $s1 = ''; }
			
			if ($_GET['order_query'] == 'ASC') { $options["order"] = 'ASC'; $o1 = ' selected="selected"'; $o2 = '';}
			if ($_GET['order_query'] == 'DESC') { $options["order"] = 'DESC'; $o2 = ' selected="selected"'; $o1 = '';}
			
			if ($_GET['per_page'] == '12') { $options["posts_per_page"] = 12; $p1 = ' selected="selected"'; $p2 = ''; $p3 = ''; $p4 = ''; }
			if ($_GET['per_page'] == '24') { $options["posts_per_page"] = 24; $p2 = ' selected="selected"'; $p1 = ''; $p3 = ''; $p4 = '';}
			if ($_GET['per_page'] == '48') { $options["posts_per_page"] = 48; $p3 = ' selected="selected"'; $p2 = ''; $p1 = ''; $p4 = '';}
			if ($_GET['per_page'] == '100') { $options["posts_per_page"] = 100; $p4 = ' selected="selected"'; $p2 = ''; $p3 = ''; $p1 = '';}
		?>
		
		
		<?php $page = is_front_page() ? get_query_var( 'page' ) : get_query_var( 'paged' );?>
		<?php $options["paged"] = $page;?>
		
		
		<form method="get" id="order" class="floatLeft bottom20">  
			Сортировать по:  
			<select name="select" onchange='this.form.submit()'>  
				<option value="title"<?=$s1?>>по заголовку</option>  
				<option value="date"<?=$s2?>>по дате</option>  
				<option value="meta_value_num"<?=$s3?>>по цене</option>  
				<option value="rand"<?=$s4?>>случайно</option>  
			</select>  
			  
			<select name="order_query" class="right15" onchange='this.form.submit()'>  
				<option value="ASC"<?=$o1?>>возрастание</option>  
				<option value="DESC"<?=$o2?>>убывание</option>  
			</select>  
			
			Показать:
			<select name="per_page" onchange='this.form.submit();'>  
				<option value="12"<?=$p1?>>12</option>  
				<option value="24"<?=$p2?>>24</option>  
				<option value="48"<?=$p3?>>48</option>  
				<option value="100"<?=$p4?>>100</option>  
			</select>
			 на странице.
		</form>   
				
		<?php wp_reset_query(); ?>
		
		<?php query_posts($options); ?>
		<?php
		global $wp_query;
		$max = $wp_query->max_num_pages;
		if ($page > $max ){
			wp_reset_query();
			$options["paged"] = 1;
			query_posts($options);
		}
		?>
				
		<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
				
		<div class="clear"></div>
		
		<div id="vitrina_inn" class="clearfix">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
				<?php $part_url = get_post_meta($post->ID, 'part_url', true);?>
				<div id="item"  <?php if ($part_url !=''){echo 'class="partnerka"';}?>>
					<?php if ($part_url !=''){?>
						<div class="partnerka_url" style="display:none" rel="nofollow"><!--noindex--><?php echo $part_url;?><!--/noindex--></div>
					<?php } ?>
					<?php  $new = get_post_meta($post->ID, 'new', true);
					$old_price = get_post_meta($post->ID, 'old_price', true);?>
					<?php if($new == 1) echo '<div class="new_label"></div>';?>
					<?php if(!empty($old_price)) echo '<div class="sale_label"></div>'; ?>
					<?php if (!$et_ptemplate_showthumb) { ?>
						<?php $thumbnail = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ),full);
						$thumbnail1 = get_post_meta($post->ID, 'Thumbnail', true);
												if( !empty ($thumbnail )){?>
							<div class="img">
								<a href="<?php the_permalink() ?>">
									<img src="<?php echo $thumbnail[0]; ?>" width="166" title="<?php the_title(); ?>" alt="<?php the_title(); ?>"/>
								</a>
							</div>
						<?php } elseif(!empty ($thumbnail1)){?>
							<div class="img">
								<a href="<?php the_permalink() ?>">
									<img src="<?php echo $thumbnail1; ?>" width="166" title="<?php the_title(); ?>" alt="<?php the_title(); ?>"/>
								</a>
							</div>
						<?php } else {?>
							<div class="img">
								<a href="<?php the_permalink() ?>" class="no_foto"></a>
							</div>
						<?php } ?>
					<?php } ?>
					
					<?php if ($et_ptemplate_showtitle) { ?>
												
						<a id="item_title" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
								
					<?php } ?>
					
					<?php if ($et_ptemplate_showdesc) { ?>
						<?php $words = explode(" ",strip_tags(get_formatting_content()));
						$content = implode(" ",array_splice($words,0,$et_ptemplate_words));
						echo '<div class="vitrina_text">'.$content;?>
						<a href="<?php the_permalink() ?>" class="more"><?php _e( '...', 'wp-shop' ); ?></a></div>
					<?php } ?>
					
					
					<?php if ($et_ptemplate_price) { ?>
						<div class="price_box">
						
							<?php if(!empty($old_price)){ ?>
								<div class="floatLeft old_price">
									<span class="through"><?php echo $old_price; ?></span> <?php _e( '', 'wp-shop' ); ?>
								</div>
								<div class="highlite_price"><?php if(is_plugin_active('wp-shop-original/wp-shop.php')) { echo $GLOBALS['wpshop_obj']->GetGoodWidget(); }?></div>
							<?php } else {?>
								<?php if(is_plugin_active('wp-shop-original/wp-shop.php')) { echo $GLOBALS['wpshop_obj']->GetGoodWidget(); }?>
							<?php } ?>	
						</div>	
					<?php } ?>
					<?php edit_post_link(__('Редактировать','wp-shop')); ?>
				</div><!--#item-->	
		<?php endwhile; else: // end of the loop. ?>
		<h2><?php _e( 'По данным критериям товаров не найдено', 'wp-shop' ); ?></h2>
		<?php endif;  ?>
		</div>
		<div class="clear"></div>
		<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
	</div><!--#vitrina-->
	<div class="clear"></div>
	
	<?php wp_reset_query(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php if($et_ptemplate_main_cont == 2) {?>
			<div id="desc">
				<?php the_content(); ?>
				<?php edit_post_link(__('Редактировать','wp-shop')); ?>
			</div>			
			<div class="clear"></div>
		<?php } ?>
		<div id="comments_bar"><?php comments_template('', true); ?></div>
	<?php endwhile; // end of the loop. ?>
	<?php endif; // end of the loop. ?>
	<div class="clear bottom40"></div>	
	
</div><!--#main-content-->	

<?php if ($et_ptemplate_column != 1) get_sidebar(); ?>

</div><!--.container-->	

<?php get_footer(); ?>

