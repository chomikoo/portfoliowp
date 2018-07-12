<?php 
/**
*
*	@package Portfolio
*
*	The main template file
*/ ?>

	<footer class="footer">
		
		<p class="footer__copy"> &copy;Portfolio - Szymon Trzepla, Kraków, Poland <?php echo date("Y");  ?></p>
		
	</footer>
		
	<?php wp_footer(); ?>

	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>
	<script>
	WebFont.load({
		google: {
		families: ['Roboto:300,400,700&amp;subset=latin-ext']
		}
	});
	</script>
	</body>
</html>