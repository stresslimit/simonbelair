
<?php get_sidebar() ?>

		<footer class="clearfix">
			<nav id="footer_menu" role="navigation">
        <h3 class="mobileonly">Menu</h3>
				<?php wp_nav_menu(array('menu' => 'primary')) ?>
			</nav>

      <h3 class="mobileonly"><?php _e('Contact', 'simonbelair'); ?></h3>
			<div class="sidebar adresse">
				<p>
          <a href="mailto:&#x69;&#x6E;&#x66;&#x6F;&#x40;&#x73;&#x69;&#x6D;&#x6F;&#x6E;&#x62;&#x65;&#x6C;&#x61;&#x69;&#x72;&#x2E;&#x63;&#x61;"><strong>Simon Bélair, <?php _e('Acupuncturist', 'simonbelair'); ?></strong> <i class="fa fa-envelope"></i></a><br>
  				6955 Christophe-Colomb, Bureau 104<br>
  				Montréal (Québec) H2S 2H4<br>
  				514-794-4410<br>
  				<a href="https://www.google.com/maps/place/6955+Christopher+Columbus+Ave/@45.5411968,-73.6086822,15z/data=!4m2!3m1!1s0x4cc919401c00b139:0xb397af1d29064429" target="_blank"><?php _e('View a map', 'simonbelair'); ?></a><br>
        <a href="mailto:&#x69;&#x6E;&#x66;&#x6F;&#x40;&#x73;&#x69;&#x6D;&#x6F;&#x6E;&#x62;&#x65;&#x6C;&#x61;&#x69;&#x72;&#x2E;&#x63;&#x61;"><strong>&#x69;&#x6E;&#x66;&#x6F;&#x40;&#x73;&#x69;&#x6D;&#x6F;&#x6E;&#x62;&#x65;&#x6C;&#x61;&#x69;&#x72;&#x2E;&#x63;&#x61;</strong> <i class="fa fa-envelope"></i></a><br>
      </p>

				© 2003-<?php echo date('Y') ?> Simon Bélair, <?php _e('Acupuncturist', 'simonbelair'); ?>
			</div>
		</footer>
	
	</div> <?php // end .container ?>
	
<?php wp_footer() ?>

<script>
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-321819-18']);
_gaq.push(['_trackPageview']);
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
</body>
</html>