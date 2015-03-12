<?php get_header(); ?>
	
  <div id="main"<?php if ( !is_single() ) : ?> class="excerpt"<?php endif; ?>>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
									
			<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title() ?></a></h1>

			<?php if ( is_single() ) : ?>
  			<?php the_content() ?>
      <?php else : ?>
  			<?php the_excerpt() ?>
			<?php endif; ?>
			
		</article>
		
		<?php // comments_template() ?>
		
		<?php endwhile; ?>	
		
		<?php else : ?>
		
		<article class="post-not-found">
			  <h1><?php _e('404 - Page Not Found', 'simonbelair'); ?></h1>
		</article>
		
		<?php endif; ?>

  </div>

<?php get_footer();