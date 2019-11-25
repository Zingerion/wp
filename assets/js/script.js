$(document).ready(function(){

 	$(window).scroll(function() {    
	    var scroll = $(window).scrollTop();

	    if (scroll >= 569) {
	        $(".navbar").addClass("navbar-fixed-top dark-bar");
	    } else {
	        $(".navbar").removeClass("navbar-fixed-top dark-bar");
	    }
	});


	// Smooth Scroll

		$('a[href*="#"]:not([href="#"])').click(function() {
		    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
		        || location.hostname == this.hostname) {

		        var target = $(this.hash);
		        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		           if (target.length) {
		             $('html,body').animate({
		                 scrollTop: (target.offset().top - 452)
		            }, 1000);
		            return false;
		        }
		    }
		});


 	// Popup

 	$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });



 	// Slider

 	$('#workstation-slider').owlCarousel({
	    loop:true,
	    margin:30,
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:2
	        },
	        1000:{
	            items:3
	        }
	    }
	})
	$('#expert-slider').owlCarousel({
	    loop:true,
	    items: 1
	})

 	// height

 	var h = $('.expert').height();
 	$('.expert .col-sm-6 div').height(function (index, height) {
	    return (h);
	});

 	// Menu bar
	$( ".menu" ).click(function() {
		$(this).toggleClass('m c');
		$('.menu span').toggleClass('ion-navicon ion-android-close');
		$('#menu-item').toggleClass( "show-menu hide-menu" );
	});

	$( "#menu-item a" ).click(function() {
		$('.menu').toggleClass('c m');
		$('.menu span').toggleClass('ion-navicon ion-android-close');
		$('#menu-item').toggleClass( "show-menu hide-menu" );
	});

/*
$('.submit_button_hall').on('click', function(e){
		e.preventDefault();
	var data = {
		action: 'flatapp',
		id_user: $('input[name=id_user]').val(),
		phone: $('input[name=phone]').val(),
		id_hall: $('input[name=id_hall]').val(),
		CurrentTime: $('input[name=CurrentTime]').val(),
		TimeBegin: $('input[name=time]').val(),
		TimeEnd: $('input[name=time2]').val(),
		Comment: $('textarea[name=msg]').val()
	};

	$.post(window.wp.ajax_url, data, function(res){
		if(res.success){
			alert("Заявка успешно доставлена");
		}
		else{
			alert("Код ошибки: "+res.err);
		}

	}, 'json');
});*/

});