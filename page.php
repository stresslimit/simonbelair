<?php get_header(); ?>

	<div id="main">

		<?php while (have_posts()) : the_post(); ?>
		
		<article class="<?php echo $post->post_name; ?>" <?php post_class() ?>>
			
			<?php if ( is_front_page() ) : ?>

				<div id="home-banners">

					<div id="controls"><b><a href="#slideA" class="jump">●</a><a href="#slideB" class="jump">●</a><a href="#slideC" class="jump">●</a></b></div>

					<a id="slideA" class="home-slider main-image" href="<?php echo site_url( '/traitements/acupuncture' ) ?>">
						<h1>Qu’est-ce que l’acupuncture?</h1>
						<img src="<?php bloginfo('template_url') ?>/images/content/SB-WWW-Acupuncture-AvecTitre.jpg">
					</a>

					<a id="slideB" class="home-slider main-image" href="<?php echo site_url( '/traitements/qi-gong' ) ?>">
						<h1>Qu’est-ce que le&nbsp;tuina?</h1>
						<img src="<?php bloginfo('template_url') ?>/images/content/SB-WWW-QiGong-AvecTitre.jpg">
					</a>

					<a id="slideC" class="home-slider main-image" href="<?php echo site_url( '/traitements/tui-na' ) ?>">
						<h1>Qu’est-ce que le&nbsp;Qi&nbsp;gong?</h1>
						<img src="<?php bloginfo('template_url') ?>/images/content/SB-WWW-Tuina-AvecTitre.jpg">
					</a>

				</div> <!-- close home-banners -->


				<?php the_content() ?>

			<?php else : ?>

				<?php if ( has_post_thumbnail() ) : ?><div class="main-image"><?php the_post_thumbnail( 'main-image' ) ?></div><?php endif; ?>

				<h1><?php the_title() ?></h1>
				<?php the_content() ?>

			<?php endif; ?>
			
		</article>

		<?php endwhile; ?>

	</div>

<?php get_footer();
