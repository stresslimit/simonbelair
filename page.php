<?php get_header(); ?>

	<div id="main">

		<?php while (have_posts()) : the_post(); ?>
		
		<article class="<?php echo $post->post_name; ?>" <?php post_class() ?>>
			
			<?php if ( is_front_page() ) : ?>

				<div id="home-banners">

					<div id="controls"><b><a href="#slideA" class="jump">●</a><a href="#slideB" class="jump">●</a><a href="#slideC" class="jump">●</a></b></div>

					<?php $lang = ''; if ( ICL_LANGUAGE_CODE == 'en' )
						$lang .= '/' . ICL_LANGUAGE_CODE; ?>

					<a id="slideA" class="home-slider main-image" href="<?php echo site_url( $lang . '/' . __('treatments', 'simonbelair') . '/acupuncture' ) ?>">
						<h1><?php _e('What is acupuncture?', 'simonbelair'); ?></h1>
						<img src="<?php bloginfo('template_url') ?>/images/content/SB-WWW-Acupuncture-AvecTitre.jpg">
					</a>

					<a id="slideB" class="home-slider main-image" href="<?php echo site_url( $lang . '/' . __('treatments', 'simonbelair') . '/qi-gong' ) ?>">
						<h1><?php _e('What is &nbsp;tuina?', 'simonbelair'); ?></h1>
						<img src="<?php bloginfo('template_url') ?>/images/content/SB-WWW-QiGong-AvecTitre.jpg">
					</a>

					<a id="slideC" class="home-slider main-image" href="<?php echo site_url( $lang . '/' . __('treatments', 'simonbelair') . '/tui-na' ) ?>">
						<h1><?php _e('What is&nbsp;Qi&nbsp;gong?', 'simonbelair'); ?></h1>
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
