var responsiveflagMenu = false;
var responsiveflagFooter = false;
var responsiveflagSidebar = false;

function menuChange (status){
	if(status == 'enable'){
	$('#menu-wrap').removeClass('desktop').addClass('mobile').find('#menu-trigger').show();
	$(' #menu-custom').removeAttr('style');
	$('#menu-trigger span').removeClass('icon-minus-sign-alt').addClass('icon-plus-sign-alt');
	$('.mobile #menu-trigger').on('click touchstart', function() {
			var catUl = $(this).next('ul#menu-custom');
			var anotherFirst = $('.header-button').find('ul');
			var anotherSecond = $('#header').find('#cart_block');
			if (anotherFirst.is(':visible')) {
				anotherFirst.slideUp(),
				$('.header-button').find('.icon_wrapp').removeClass('active')
			}
			if (anotherSecond.is(':visible')) {
				anotherSecond.slideUp();
				$('#header_user').removeClass('close-cart')
			}
			if(catUl.is(':hidden')) {
				catUl.slideDown(),
				$(this).find('span').removeClass('icon-plus-sign-alt').addClass('icon-minus-sign-alt')	
			}
			else {
				catUl.slideUp(),
				$(this).find('span').removeClass('icon-minus-sign-alt').addClass('icon-plus-sign-alt');
			}
			return false
		}
		)
		$('#menu-wrap.mobile #menu-custom').on('click touchstart', function(e){
			e.stopPropagation();
		});
		
		$('.main-mobile-menu ul ul').addClass('menu-mobile-2'); 
		$('#menu-custom ul ').addClass('menu-mobile-2'); 
		$('#menu-custom  li').has('.menu-mobile-2').prepend('<span class="open-mobile-2 icon-plus"></span>');
		$("#menu-custom   .open-mobile-2").on('click touchstart', function() {
				var catSubUl = $(this).next().next('.menu-mobile-2');
				if(catSubUl.is(':hidden')) {
				catSubUl.slideDown(),
				$(this).removeClass('icon-plus').addClass('icon-minus')	
				}
				else {
					catSubUl.slideUp(),
					$(this).removeClass('icon-minus').addClass('icon-plus');
				}
				return false
		})
		$(document).on('click  touchstart', function(){
			$('.mobile #menu-trigger').find('span').removeClass('icon-minus-sign-alt').addClass('icon-plus-sign-alt'),
			$('.mobile #menu-trigger').next('ul#menu-custom').slideUp();	
		})
		return false;
	}
	else {
		$('#menu-wrap').removeClass('mobile').addClass('desktop'),
		$('#menu-custom  li').has('.menu-mobile-2').children('span').remove(),
		$('#menu-custom  li .menu-mobile-2, #menu-custom').removeAttr('style');
		$("#menu-custom   .open-mobile-2").off();
		$('#menu-wrap').find('#menu-trigger').off().hide();	
	}
}
function menuChangeDo(){
	  container_width = $('body').find('.container').width();
	  if (container_width <= 1169 && responsiveflagMenu == false){
		    menuChange('enable');
			responsiveflagMenu = true;
				
		}
		else if (container_width > 1169){
			menuChange('disable');
	        responsiveflagMenu = false;
		}
}
$(document).ready(menuChangeDo);
$(window).resize(menuChangeDo);

$(document).ready(function(){ 
	$('.header-button').on('click touchstart','.icon_wrapp', function(){
		
		var subUl = $(this).parent('.mobile-link-top').find('ul');
		var anyAnother1 = $('#menu-wrap.mobile #menu-custom'); // close other menus if opened
		if (anyAnother1.is(':visible')) {
			anyAnother1.slideUp(),
			$('.mobile #menu-trigger').find('span').removeClass('icon-minus-sign-alt').addClass('icon-plus-sign-alt');
		} // close ather menus if opened
		if(subUl.is(':hidden')) {
			subUl.slideDown(),
			$(this).addClass('active')	
		}
		else {
			subUl.slideUp(),
			$(this).removeClass('active')
		}
		
		return false;
	});
});

//   TOGGLE FOOTER

	var footer_icon_plus = 'icon-plus-sign';
	var footer_icon_minus = 'icon-minus-sign';

function accordionFooter(status){
		if(status == 'enable'){
			$('#footer_widget > li > h3').on('click', function(){
				$(this).toggleClass('active').parent().find('ul').stop().slideToggle('medium', function(){
					if($(this).closest('li').find('h3').hasClass('active')) {
						$(this).closest('li').find('h3').children('span').removeClass(footer_icon_plus).addClass(footer_icon_minus);
					}
					else {
						$(this).closest('li').find('h3').children('span').removeClass(footer_icon_minus).addClass(footer_icon_plus);	
					}
				});
			})
			$('#footer_widget').addClass('accordion').find('ul').slideUp('fast');
		}else{
			$('#footer_widget > li > h3').removeClass('active').off().parent().find('ul').removeAttr('style').slideDown('fast');
			$('#footer_widget > li > h3 span').removeClass(footer_icon_minus).addClass(footer_icon_plus);
			$('#footer_widget').removeClass('accordion');
		}
	}

function toDoFooter(){
		container_width = $('body').find('.container').width();
		
		if (container_width < 720 && responsiveflagFooter == false){
			 accordionFooter('enable');
			responsiveflagFooter = true;		
		}
		else if (container_width >= 720){
			accordionFooter('disable');
	        responsiveflagFooter = false;
		}
}
$(document).ready(toDoFooter);
$(window).resize(toDoFooter);

//   TOGGLE Sidebar

	var footer_icon_plus = 'icon-plus-sign';
	var footer_icon_minus = 'icon-minus-sign';
	
function accordionSidebar(status){
		
		if(status == 'enable'){
			var sels = "ul,div";
			$('#sidebar > li > h3').on('click', function(){
				$(this).toggleClass('active').parent().children(sels).stop().slideToggle('medium', function(){
					if($(this).closest('li').find('h3').hasClass('active')) {
						$(this).closest('li').find('h3').children('span').removeClass(footer_icon_plus).addClass(footer_icon_minus);
					}
					else {
						$(this).closest('li').find('h3').children('span').removeClass(footer_icon_minus).addClass(footer_icon_plus);	
					}
				});
			})
			$('#sidebar > li').children(sels).slideUp('fast');
			 
		}else{
			var sels = "ul,div";
			$('#sidebar > li > h3').removeClass('active').off().parent().children(sels).removeAttr('style').slideDown('fast');
			$('#sidebar > li > h3 span').removeClass(footer_icon_minus).addClass(footer_icon_plus);
			$('#sidebar > li.no_title > div').slideDown('fast');
		}
	}

function toDoSidebar(){
		container_width = $('body').find('.container').width();
		
		if (container_width <= 720 && responsiveflagSidebar == false){
			accordionSidebar('enable');
			responsiveflagSidebar = true;		
		}
		else if (container_width > 720){
			accordionSidebar('disable');
	        responsiveflagSidebar = false;
		}
}
$(document).ready(toDoSidebar);
$(window).resize(toDoSidebar);