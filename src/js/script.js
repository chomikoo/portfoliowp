jQuery(function($){
	'use strict'
	
	// console.log('Hello from script.js');
	let windowH = $(window).outerHeight();
	$('header').css({height: windowH});


	// Sticky Nav
	//=============
	const navbar = $('#top_nav');
	let navbarOffset = navbar.offset().top;
	function stickyNav() {
		// console.log('aa', window.scrollY , navbarOffset);
		if( window.scrollY >= navbarOffset ) {
			document.body.style.paddingTop = navbar.offsetHeight + 'px';
			navbar.addClass('sticky');
		} else {
			document.body.style.paddingTop = 0;
			navbar.removeClass('sticky');
		}
	}

	window.addEventListener('scroll', function() {
		stickyNav();
	})

	// Toggle hamburger class
	//========================
	$('.btn--hamburger').on('click', function(){
		toggleMenu();
	});

	function toggleMenu() {
		$('body').toggleClass('noScroll');
		$('.btn--hamburger').toggleClass('active');
		$('#top_nav').toggleClass('active');
	}


	$('#header').on('mousemove', function(event) {
		let windowWidth = $(window).width();
		let windowHeight = $(window).height();
		console.log(windowWidth, windowHeight);
		
		let mouseXpercentage = Math.round(event.pageX / windowWidth * 100);
		let mouseYpercentage = Math.round(event.pageY / windowHeight * 100);
		
		$('header').css('background', 'radial-gradient(ellipse farthest-corner at ' + mouseXpercentage + '% ' + mouseYpercentage + '%, #173563, #091426)');
	  });


	//Hover SVG Icons
	//================
	$('.about__skill').on('mouseover', function() {
		let pathArr = $(this).find('path'); 
		// console.log(pathArr)
		pathArr.map(function(i, path) {
			let fillColor = $(this).data('fill');
			$(this).css({
				'fill': fillColor,
				'stroke': 'transparent',
			});
		});

	});

	//Smooth scroll
	//==============
	$('a[href*="#"]')
	.not('[href="#"]')
	.not('[href="#0"]')
	.click(function(e) {
		e.preventDefault();
		let target = $(this.hash);
		// console.log(target);
			$('html, body').animate({
				scrollTop: target.offset().top
			}, 1000);
			toggleMenu();
	});

	//ScrollReveal Init
	//==============

	window.sr = ScrollReveal();

	sr.reveal('.reveal-left', { orgin: 'left' });
	sr.reveal('.reveal-right',{ orgin: 'right' });



	// Cookie notification
	//=====================
	function createCookie(name, value, days) {
		var date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		var expires = "; expires=" + date.toGMTString();
		document.cookie = name + "=" + value + expires + "; path=/";
	}
	
	function readCookie(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') c = c.substring(1, c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
		}
		return null;
	}
	
	
	function checkCookies() {
		if (readCookie('cookies_accepted') != 'true') {
			var message_container = document.createElement('div');
			message_container.id = 'cookies-message-container';
			var html_code = '<div id="cookies-message" class="cookie-message">Ta strona internetowa używa plików cookies (tzw. ciasteczka) w celach statystycznych <a href="http://wszystkoociasteczkach.pl" target="_blank">Więcej informacji</a><a href="javascript:closeCookieInfo()" id="accept-cookies-checkbox" name="accept-cookies" class="accept-btn">Ok!</a><img src = "http://thecraftchop.com/files/images/cookie_head.svg" class ="cookiemonster" alt = "Cookie_monster"></div>';
			message_container.innerHTML = html_code;
			document.body.appendChild(message_container);
		}
	}
	
	function closeCookieInfo() {
		createCookie('cookies_accepted', 'true', 365);
		document.querySelector('#cookies-message-container').remove();
	};
	
	window.onload = checkCookies;

})