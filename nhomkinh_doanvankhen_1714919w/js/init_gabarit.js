/*
 * Require jQuery JavaScript Library
 * http://jquery.com/
 *
 * Copyright Â© 2013 MBA MultimĂ©dia (www.mba-multimedia.com)
 * 
 * Version : 02/09/2013
 *
 */

// permettre l'utilisation "normale" de jQuery Ă  l'intĂ©rieur
jQuery(document).ready(function($) {

	function cadreOn() {
		$(this).addClass('on');
	}

	function cadreOff() {
		$(this).removeClass('on');
	}

	function cadreClick() {
		var t = $(this).find('a').attr('target') ? $(this).find('a').attr('target') : '_top';
		$(this).find('a').click(function(event){ event.preventDefault (); });
		window.open($(this).find('a').attr('href'), t);
	}

	$('.element').each(function(){
		$(this).hover(cadreOn, cadreOff).click(cadreClick);
	});

	jQuery(window).load(function () {
        if (jQuery().flexslider) {
            var e = jQuery(".flexslider");
            e.fitVids().flexslider({
                slideshowSpeed: e.attr("data-speed"),
                animationDuration: 400,
                animation: "slide",
                video: true,
                useCSS: false,
                prevText: '<i class="icon-chevron-left"></i>',
                nextText: '<i class="icon-chevron-right"></i>',
                touch: false,
                animationLoop: true,
                smoothHeight: true,
                start: function (e) {
                    e.removeClass("loading")
                }
            })
        }
    });

	// Parralaxe
	var debug = true;

	// Amplitude max du mouvement (0=fixe)
	var amplitudeMouvementMax = 20;
	
	// Coef de modif de vitesse (ex. pour varier la vitesse en fonction de la profondeur)
	var coefPlan1 = 3;
	var coefPlan2 = 1;
	var coefPlan3 = 2;
	
	//var height = amplitudeMouvementMax / 1000;
	var width  = amplitudeMouvementMax / 1000;
	
	// --- Gestion des mouvements
	$("#container").bind("mousemove",function(e){

		//console.info("mousemove");
	
		// Calcul dĂ©placement X et Y de la souris depuis le centre de la fenetre
		var pageX = e.pageX - ($(window).width() / 2);
		var newHorizontalBgPos = (width * pageX * -1);
		
		//console.log('new background-position-x : ' + (50 + newHorizontalBgPos * coefPlan1/2) + "%");
		
		// Mouvement des plans parallaxe
		// --- en POURCENTAGE (depuis milieu) et en PIXELS (top)
		//$('#p1').css("background-position-x", (50 + newHorizontalBgPos * coefPlan1/2) + "%");
		//$('#p2').css("background-position-x", (50 + newHorizontalBgPos * coefPlan2/2) + "%");
		$('#plan1').css("background-position", (50 + newHorizontalBgPos * coefPlan1/1) + "% top");
		$('#plan2').css("background-position", (50 + newHorizontalBgPos * coefPlan2/2) + "% top");
		//$('#p3').css("background-position", (50 + newHorizontalBgPos * coefPlan3/3) + "% bottom");

	});
	
}); 