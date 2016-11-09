<div id="menu-wrap-wide"></div>
		
<div id="footer">
	<div class="container relat">
		<div class="footer_flex">
			<?php wp_reset_query(); ?>
			<?php   wp_nav_menu( 
								array( 
										'container' => '',
										'fallback_cb' => 'false',
										'theme_location' => 'footer',
										'menu_id' => 'footer_menu',
										'menu_class' => '',
										'depth' => 1
									)	   
					);
			?>
			

			
			<div id="powered">
				<p class="copyright"><img src="http://dinomebel.ru/wp-content/themes/wp-shop-27/images/dinosmall.png"  alt="">©<?php echo date('Y'); ?>
				<a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a>
				</p>		
			</div>
			</div>	
	</div><!--#footer_inner-->

	
	<?php include('forms.php');?>

</div>	

	
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
<?php if(of_get_option('ga_code')) { ?>
	<?php echo of_get_option('ga_code'); ?>
  <!-- Show Google Analytics -->	
<?php } ?>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter39611340 = new Ya.Metrika({
                    id:39611340,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/39611340" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


</body>
</html>

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.min.css">


<script>
	$(function(){
		var wprop = $('[id ^= wpshop_property_]');
		wprop.appendTo(".shortcode");
	})
</script>
