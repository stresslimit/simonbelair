<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title><?php wp_title( ' | ', true, 'right' ) ?></title>
<link rel="icon" href="<?php bloginfo('template_url') ?>/favicon.png" type="image/x-icon">
<link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/favicon.png" type="image/x-icon">

<?php wp_head() ?>

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="<?php bloginfo('template_url') ?>/js/selectivizr.js"></script>
<![endif]-->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-55411861-1', 'auto');
  ga('send', 'pageview');

</script>

</head>
<body <?php body_class() ?>>

	<div class="container">

	<header>

			<h1>
        <a href="<?php echo home_url() ?>" id="logo">Simon Bélair, Ac.</a>
  			<div class="adresse">
  				<p>
    				6955 Christophe-Colomb, Bureau 104<br>
    				Montréal 514-794-4410
          </p>
        </div>
        <span id="social">
          <a href="/cadeau"><img class="gift-cert-icon" src="<?php echo get_template_directory_uri() ?>/images/gift-cert.svg"></a>
          <a href="https://www.facebook.com/SimonBelairAc"><i class="fa fa-facebook-square"> </i> </a>
          <a href="https://twitter.com/Acupuncture_Mtl"><i class="fa fa-twitter-square"> </i> </a>
          <a href="mailto:info@simonbelair.ca"><i class="fa fa-envelope"> </i> </a>
        </span>
      </h1>

			<nav id="main_menu" class="main">
				<?php wp_nav_menu( array( 'menu' => 'primary', 'container_class' => 'menu-principal-container' ) ) ?>
			</nav>

      <nav id="mobile_menu" class="mobileonly">
        <a href="tel:514-794-4410"><i class="fa fa-phone"></i> <?php _e('Contact', 'simonbelair'); ?></a>
        <a href="#demande-de-rendez-vous"><?php _e('Request an appointment', 'simonbelair'); ?> <i class="fa fa-plus-square"></i></a>
      </nav>

      <nav id="jumptomenu" class="mobileonly"><a href="#footer_menu"><i class="fa fa-bars"></i></a></nav>

	</header>

