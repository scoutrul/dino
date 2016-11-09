<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=1200, initial-scale=0.2, maximum-scale=1">


<meta name="apple-mobile-web-app-capable" content="yes">
<title>
	<?php
 
		global $page, $paged;
	 
		wp_title( '|', true, 'right' );
	 
		bloginfo( 'name' );
	 
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
	 
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'starkers' ), max( $paged, $page ) );
 
    ?>
</title>

<?php if(of_get_option('favicon') != ''){ ?>
	<link rel="icon" href="<?php echo of_get_option('favicon', "" ); ?>" type="image/x-icon" />
	<?php } else { ?>
	<link rel="icon" href="<?php bloginfo( 'template_url' ); ?>/favicon.ico" type="image/x-icon" />
<?php } ?>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.8.3.js"></script>

<script src="<?php bloginfo('template_directory'); ?>/js/zoomsl-3.0.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.nivo.slider.pack.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/superfish-modified.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.cycle2.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.cycle2.carousel.min.js"></script>


<!--[if lt IE 9]>
    <script src="<?php bloginfo('template_directory'); ?>/js/respond.min.js"></script>
<![endif]-->


	<script>
		$(window).load(function() {
	       $('#slideshow').nivoSlider({
				effect: '<?php echo of_get_option('sl_effect'); ?>',
				animSpeed: <?php echo of_get_option('sl_animation_speed'); ?>,
				pauseTime: <?php echo of_get_option('sl_pausetime'); ?>,
				controlNav: false,
				directionNav: <?php echo of_get_option('sl_dir_nav'); ?>
		   });
	    });

    	
    	$(function(){
    			
    		$('#footer_widget > li > h3').append('<span class="icon-plus-sign"></span>');
    		$('#sidebar > li > h3').append('<span class="icon-plus-sign"></span>');
        
        $('#vitrina .partnerka, #main-content > .partnerka, .table_price .partnerka, #vitrina_inn .partnerka,#sidebar_slider_wrapp .slider_rotator.partnerka').each(function() {
    			var part = $(this).find('.partnerka_url').text();
    			$(this).find('.wpshop_bag .wpshop_buy .line_1 td.wpshop_button').html('<a href="'+part+'" target="_blank"><span><?php _e( 'Купить', 'wp-shop' ); ?></span></a>');
    		}); 
    		$('.table_price tbody .partnerka').each(function() {
    			var part = $(this).find('.partnerka_url').text();
    			$(this).find('td.wpshop_buttons .wpshop_bag .wpshop_buy .line_1 td.wpshop_button').html('<a href="'+part+'" target="_blank"><span><?php _e( 'Купить', 'wp-shop' ); ?></span></a>');
    		});
    	
    		$('#vitrina_inn #item .wpshop_buy,#rotator #item_rotator .wpshop_buy,.vitrina_element .wpshop_buy, #rotator_sidebar .slider_rotator .wpshop_buy').each(function() {
    			$("tr:first",this).each(function(){
    				$(this).addClass('first_price');
    			 });
    		});
    				
    		$('.table_price > tbody > tr > td').has('div.wpshop_bag').addClass('price_col');
    		$('.table_price > tbody > tr > td').has('div.img').addClass('img_col');
    		$('#sidebar > li:has(div.search)').addClass('li_search');
    		
    		$('#sidebar li.menu-item:has(ul.sub-menu)').addClass('parent_dir');
    		$('#sidebar > li:not(:has(h3))').addClass('no_title');
    		$('#sidebar li.cat-item:has(ul.children)').addClass('parent_dir');
    		$('#sidebar li.parent_dir > ul').before('<span class="grower"></span>');
    		$('.grower').click(function() {
    			$(this).toggleClass('bounce');
    			$(this).parent('#sidebar li').find('> ul').slideToggle(600);
    		});
    		
    		$('.single_bread a:last').addClass('last_bread');
    		$('.single_bread span:last').addClass('last_arrow');
    		
    		$('.wpshop_button a').html('<span>Купить</span>');
    		
    		var banner_count = $('#banner_center').children().length-1;
    		var banner_mar = $('#banner_center .banner_item:last').css('margin-left');
    		var banner_width = $('.banner_item').width();
    		var banner_rez = banner_count * banner_width + parseInt(banner_mar) * (banner_count-1);
    		$('#banner_center').css('width',banner_rez);
    			
    		$('form input#search').addClass('active');
    			
    		$.fn.clearDefault = function(){
    			return this.each(function(){
    				var default_value = $(this).val();
    				$(this).focus(function(){
    					if ($(this).val() == default_value) $(this).val("");
    				});
    				$(this).blur(function(){
    					if ($(this).val() == "") $(this).val(default_value);
    				});
    			});
    		};	
    		
    		$('form input#search').clearDefault();
    		
    		var $comment_form = jQuery('form#commentform');
    		$comment_form.find('input, textarea').each(function(index,domEle){
    			var $et_current_input = jQuery(domEle),
    				$et_comment_label = $et_current_input.siblings('label'),
    				et_comment_label_value = $et_current_input.siblings('label').text();
    			if ( $et_comment_label.length ) {
    				$et_comment_label.hide();
    				if ( $et_current_input.siblings('span.required') ) { 
    					et_comment_label_value += $et_current_input.siblings('span.required').text();
    					$et_current_input.siblings('span.required').hide();
    				}
    				$et_current_input.val(et_comment_label_value);
    			}
    		}).live('focus',function(){
    			var et_label_text = jQuery(this).siblings('label').text();
    			if ( jQuery(this).siblings('span.required').length ) et_label_text += jQuery(this).siblings('span.required').text();
    			if (jQuery(this).val() === et_label_text) jQuery(this).val("");
    		}).live('blur',function(){
    			var et_label_text = jQuery(this).siblings('label').text();
    			if ( jQuery(this).siblings('span.required').length ) et_label_text += jQuery(this).siblings('span.required').text();
    			if (jQuery(this).val() === "") jQuery(this).val( et_label_text );
    		});

    		$comment_form.find('input#submit').click(function(){
    			if (jQuery("input#url").val() === jQuery("input#url").siblings('label').text()) jQuery("input#url").val("");
    		});
    		
    			
    		if ($('#slider_wrapp').length > 0) {
    			$('#menu-wrap-wide').addClass('gray');
    		}	
    		
    		if($("#main_widgets").children().length > 0){
    			$('#slideshow').addClass('narrow');
    		}
    		
    		$('.new_label').html('New');
    		$('.sale_label').html('Sale!');
    		
    		$(".container_img").imagezoomsl({ 
    			zoomrange: [1, 3],
    			zoomstart: 1.5,
    			innerzoom: true,
    			magnifierborder: "none"
    		});
    		
    		$(".thumb_img img").click(function(){
    			var that = this;
    			$(".container_img").fadeOut(600, function(){
    				$(this).attr("src", 	   $(that).attr("src"))
    				.attr("data-large", $(that).attr("data-tmb-large"))
    				.fadeIn(1000);				
    			});
    			return false;

    		});
    		
    		$('#galery_wrapp div:nth-child(4n+6)').addClass('four_img');
    		
    	});
    	
    	$(window).resize(function(){
    		var banner_count = $('#banner_center').children().length-1;
    		var banner_mar = $('#banner_center .banner_item:last').css('margin-left');
    		var banner_width = $('.banner_item').width();
    		var banner_rez = banner_count * banner_width + parseInt(banner_mar) * (banner_count-1);
    		$('#banner_center').css('width',banner_rez);
    	});

    </script>

<?php if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) wp_enqueue_script('comment-reply'); ?>
<?php wp_head();?>

</head>
<body class=''>

<? (is_home()) ? "home" : "no" ?>

	<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); ?>

    
    <div id="menu-wrap-wide" class="clearfix">
        <div class="container relat">
            <div id="menu-wrap">    

                <div class="clear"></div>
            </div>
        </div>  
    </div>


	<div id="header_wrapp" class="clearfix">
		<div class="container relat">
			<?php   wp_nav_menu( 
									array( 
										'container'       => 'div',
										'container_class' => 'menu_top',
										'fallback_cb' => 'false',
										'theme_location' => 'top',
										'menu_id' => '',
										'menu_class' => '',
										'depth' => 1
									)	   
						);	
			?>	

			<div class="logo">
				<a href="<?php bloginfo('url'); ?>/" id="logo"><img src="<?php bloginfo('template_url'); ?>/images/dinomebel.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a>
			</div>

        <div class="header_line">
        	<div class="callcenter">
        		<strong>Клиентская служба:</strong>
        		<span class="callnumber">(926)402-31-02</span>
        		<span><a href="mailto:dino@dinomebel.ru">dino@dinomebel.ru</a></span>
            	<div class="slogan">
                    <img src="<?php bloginfo('template_directory'); ?>/images/slogan.png" alt="Подарите детям комфорт с Дино!">  
                </div>
            </div>
            <div class="callcenter">
                <strong>Адрес магазина:</strong>
                <span class="shopadress">г.Москва, Студеный проезд, 7а<br> ТЦ "Большая медведица" </span>
                <span>с 10:00 до 20:00 &nbsp;&nbsp;&nbsp; +7(985) 812-43-82</span>
            </div>
        	<div id="cart_box" class="floatRight relat">
        			<?php $full_path=get_option("wpshop.cartpage",'{sitename}/cart');?>
        		<a id="cart_arrow" href="<?php echo $full_path;?>" class="cart_link" >
        			<div id="wpshop_minicart"></div>
        		</a>
        		<img src="<?php bloginfo('template_directory'); ?>/images/cart.png" class="cart_pic"/>
        	</div>
        </div>
			<?php get_search_form(); ?>



			<ul class="services">
			    <li><img src="<?php bloginfo('template_url'); ?>/images/s_gar.png" alt="" /><br>
			    Гарантия<br>качества</li>
			    <li><img src="<?php bloginfo('template_url'); ?>/images/s_love.png" alt="" /><br>
			    Довольные<br>клиенты</li>
			    <li><img src="<?php bloginfo('template_url'); ?>/images/s_pay.png" alt="" /><br>
			    Гибкая<br>оплата</li>
			    <li><img src="<?php bloginfo('template_url'); ?>/images/s_obmen.png" alt="" /><br>
			    Обмен и возврат -<br>по букве закона</li>
			</ul>

        </div>
    </div>
	
			
	