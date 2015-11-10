<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title><?php wp_title( ' | ', true, 'right' ) ?></title>
<link rel="icon" href="<?php bloginfo('template_url') ?>/favicon.png" type="image/x-icon">
<link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/favicon.png" type="image/x-icon">
<script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/<?php if ( ICL_LANGUAGE_CODE == 'en' ) { ?>en_US<?php } elseif ( ICL_LANGUAGE_CODE == 'fr' ) { ?>fr_FR<?php } ?>/sdk.js#xfbml=1&version=v2.5";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
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
  			<div class="adresse">
  				<p>
    				6955 Christophe-Colomb, Bureau 104<br>
    				Montréal 514-794-4410
          </p>
        </div>
        <?php $languages = icl_get_languages( 'skip_missing=0' );
		foreach ( $languages as $l ) {
			if ( !$l['active'] )
				echo '<a class="lang" href="'.$l['url'].'">'.$l['native_name'].'</a>';
		} ?>

        <span id="social">
          <a class="cadeau" href="/cadeau"><i class="fa fa-gift"></i></a>
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

