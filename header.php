<?php 
/**
*
*	@package Portfolio
*
*	Template - Heder
*/
 ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>">

	<?php if( is_search() ) { ?>
	<meta name="robots" content="noindex, nofollow" />
	<?php } ?>


	<!-- wp head -->
	<?php wp_head(); ?>
	<meta name="viewport" content="width=device-width">

	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo THEME_URL ?>favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo THEME_URL ?>favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo THEME_URL ?>favicons/favicon-16x16.png">

	<title>
		<?php echo get_bloginfo('name'); ?>
	</title>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
	    crossorigin="anonymous">



		
    <!--    Google Analytics-->
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-98710488-1', 'auto');
        ga('send', 'pageview');
    </script>
    <script type="text/javascript">
        window.smartlook || (function(d) {
            var o = smartlook = function() {
                    o.api.push(arguments)
                },
                h = d.getElementsByTagName('head')[0];
            var c = d.createElement('script');
            o.api = new Array();
            c.async = true;
            c.type = 'text/javascript';
            c.charset = 'utf-8';
            c.src = 'https://rec.smartlook.com/recorder.js';
            h.appendChild(c);
        })(document);
        smartlook('init', 'f5ef9f37533b377bc76fdbde2c49a5b7c677654c');
    </script>
</head>

<body <?php body_class(); ?>>


	<header id="home" class="header">
		<div class="hero ">
			<div class="headers">
				<h1 class="page-title">Front-End Developer</h1>
				<h2 class="sub-title">Szymon
					<span class="text-blink">Trzepla</span>
					</h3>
			</div>

			<button class="btn--hamburger">
				<span class="bar"></span>
				<span class="bar"></span>
				<span class="bar"></span>
			</button>

			<nav id="top_nav" class="top_nav ">

				<?php
					wp_nav_menu( array( 
						'theme_location' => 'top-menu', 
						'container' => false,
						'menu_class' => 'top_nav__list container' ) ); 
				?>

			</nav>

			<a href="#about" class="arrow-down fas fa-angle-down" aria-hidden="true"></a>
		</div>
	</header>