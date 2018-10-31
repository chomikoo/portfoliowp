jQuery(function ($) {
	'use strict'

	let windowH = $(window).outerHeight();
	$('header').css({
		height: windowH
	});


	// Sticky Nav
	//=============
	const navbar = $('#top_nav');
	let navbarOffset = navbar.offset().top;

	function stickyNav() {
		// console.log('aa', window.scrollY , navbarOffset);
		if (window.scrollY >= navbarOffset) {
			document.body.style.paddingTop = navbar.offsetHeight + 'px';
			navbar.addClass('sticky');
		} else {
			document.body.style.paddingTop = 0;
			navbar.removeClass('sticky'); 
		}
	}

	window.addEventListener('scroll', function () {
		stickyNav();
	})



	// Toggle hamburger class
	//========================
	$('.btn--hamburger').on('click', function (event) {
		toggleMenu(event);
	});

	function toggleMenu(e) {
		$('body').toggleClass('noScroll');
		$('.btn--hamburger').toggleClass('active');
		$('#top_nav').toggleClass('active');
	}


	//Moving gradient
	//===============

	$('#home').on('mousemove', function (event) {
		let windowWidth = $(window).width();
		let windowHeight = $(window).height();
		// console.log(windowWidth, windowHeight);

		let mouseXpercentage = Math.round(event.pageX / windowWidth * 100);
		let mouseYpercentage = Math.round(event.pageY / windowHeight * 100);

		$('header').css('background', 'radial-gradient(ellipse farthest-corner at ' + mouseXpercentage + '% ' + mouseYpercentage + '%, #173563, #091426)');
	});


	//Hover SVG Icons
	//================
	$('.about__skill').on('mouseover', function () {
		let pathArr = $(this).find('path');
		// console.log(pathArr)
		pathArr.map(function (i, path) {
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
		.click(function (e) {
			e.preventDefault();
			let target = $(this.hash);
			$('html, body').animate({
				scrollTop: target.offset().top
			}, 1000);
		});

	//ScrollReveal Init
	//==============

	window.sr = ScrollReveal();

	sr.reveal('.reveal-left', {
		orgin: 'left'
	});
	sr.reveal('.reveal-right', {
		orgin: 'right'
	});
	sr.reveal('.about__skill', {
		origin: 'right',
		dealy: 500
	});


	// Cookie notification
	//=====================
	function createCookie(name, value, days) {
		var date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		var expires = "; expires=" + date.toGMTString();
		document.cookie = name + "=" + value + expires + "; path=/";
	}

	function readCookie(name) {
		const nameEQ = name + "=";
		const ca = document.cookie.split(';');
		for (var i = 0; i < ca.length; i++) {
			let c = ca[i];
			while (c.charAt(0) == ' ') c = c.substring(1, c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
		}
		return null;
	}

	function closeCookieInfo() {
		createCookie('cookies_accepted', 'true', 365);
		document.querySelector('#cookies-message-container').remove();
	};


	function checkCookies() {
		if (readCookie('cookies_accepted') != 'true') {
			const message_container = document.createElement('div');
			message_container.id = 'cookies-message-container';

			const cookies_message = document.createElement('div');
			cookies_message.id = 'cookies-message';
			cookies_message.className = 'cookie-message';
			cookies_message.innerHTML = 'Ta strona internetowa używa plików cookies (tzw. ciasteczka) w celach statystycznych <a href="http://wszystkoociasteczkach.pl" target="_blank">Więcej informacji</a><img src="http://thecraftchop.com/files/images/cookie_head.svg" class ="cookiemonster" alt="Cookie_monster">';

			const btn = document.createElement('buton');
			btn.id = 'accept-cookies-checkbox';
			btn.className = 'accept-btn';
			btn.innerText = 'Ok!';
			btn.addEventListener('click', closeCookieInfo);

			cookies_message.appendChild(btn);
			message_container.appendChild(cookies_message);
			document.body.appendChild(message_container);
		}
	}

	window.onload = checkCookies;

})