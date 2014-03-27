<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php wp_title( ' | ', true, 'right' ) ?>Simon Bélair, Acupuncteur</title>
<link rel="icon" href="<?php bloginfo('template_url') ?>/favicon.png" type="image/x-icon">
<link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/favicon.png" type="image/x-icon">

<?php wp_head() ?>

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="<?php bloginfo('template_url') ?>/js/selectivizr.js"></script>
<![endif]-->

</head>
<body <?php body_class() ?>>

	<div class="container">

	<header>

			<h1>
        <a href="<?php echo home_url() ?>" id="logo">Simon Bélair, Ac.</a>
        <span id="social">
          <a href="https://www.facebook.com/SimonBelairAc"><i class="fa fa-facebook-square"> </i> </a>
          <a href="https://twitter.com/Acupuncture_Mtl"><i class="fa fa-twitter-square"> </i> </a>
          <a href="mailto:info@simonbelair.ca"><i class="fa fa-envelope"> </i> </a>
        </span>
      </h1>
			
			<nav class="main">
				<?php wp_nav_menu(array('menu' => 'primary')) ?>
			</nav>
		
	</header>

