<?php

// Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

  if ( post_password_required() ) { ?>
  	<div class="help">
    	<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'simonbelair'); ?></p>
  	</div>
  <?
    return;
  }
?>

<?php // You can start editing here. ?>

<?php if ( have_comments() ) : ?>
	
	<h3 id="comments" class="h2"><?php comments_number(__('<span>No</span> Responses', 'simonbelair'), __('<span>One</span> Response', 'simonbelair'), __('<span>%</span> Responses', 'simonbelair') );?> <?php _e('to', 'simonbelair'); ?> &#8220;<?php the_title(); ?>&#8221;</h3>

	<nav id="comment-nav">
		<ul class="clear">
	  		<li><?php previous_comments_link() ?></li>
	  		<li><?php next_comments_link() ?></li>
	 	</ul>
	</nav>
	
	<ol class="commentlist">
		<?php wp_list_comments('type=comment&callback=bones_comments'); ?>
	</ol>
	
	<nav id="comment-nav">
		<ul class="clear">
	  		<li><?php previous_comments_link() ?></li>
	  		<li><?php next_comments_link() ?></li>
		</ul>
	</nav>
  
	<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
    	<?php // If comments are open, but there are no comments. ?>

	<?php else : // comments are closed ?>
	<?php // If comments are closed. ?>
	<p class="nocomments"><?php _e('Comments are closed.', 'simonbelair'); ?></p>

	<?php endif; ?>

<?php endif; ?>


<?php if ( comments_open() ) : ?>

<section id="respond">

	<h3 id="comment-form-title" class="h2"><?php comment_form_title( __('Leave a Reply', 'simonbelair'), __('Leave a Reply to %s', 'simonbelair') ); ?></h3>

	<div id="cancel-comment-reply">
		<p class="small"><?php cancel_comment_reply_link(); ?></p>
	</div>

	<form action="<?= get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

	<?php if ( is_user_logged_in() ) : ?>

	<p class="comments-logged-in-as"><?php _e('Logged in as', 'simonbelair'); ?> <a href="<?= get_option('siteurl'); ?>/wp-admin/profile.php"><?= $user_identity; ?></a>. <a href="<?= wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php _e('Log out', 'simonbelair'); ?> &raquo;</a></p>

	<?php else : ?>
	
	<ul id="comment-form-elements" class="clear">
		
		<li>
		  <label for="author"><?php _e('Name', 'simonbelair'); ?> <?php if ($req) echo "(required)"; ?></label>
		  <input type="text" name="author" id="author" value="<?= esc_attr($comment_author); ?>" placeholder="<?php _e('Your Name', 'simonbelair'); ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
		</li>
		
		<li>
		  <label for="email"><?php _e('Mail', 'simonbelair'); ?> <?php if ($req) echo "(required)"; ?></label>
		  <input type="email" name="email" id="email" value="<?= esc_attr($comment_author_email); ?>" placeholder="<?php _e('Your Email', 'simonbelair'); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
		  <small><?php _e('(will not be published)', 'simonbelair'); ?></small>
		</li>
		
		<li>
		  <label for="url"><?php _e('Website', 'simonbelair'); ?></label>
		  <input type="url" name="url" id="url" value="<?= esc_attr($comment_author_url); ?>" placeholder="<?php _e('Your Website', 'simonbelair'); ?>" tabindex="3" />
		</li>
		
	</ul>

	<?php endif; ?>
	
	<p><textarea name="comment" id="comment" placeholder="<?php _e('Your Comment Here...', 'simonbelair'); ?>" tabindex="4"></textarea></p>
	
	<p>
	  <input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment', 'simonbelair'); ?>" />
	  <?php comment_id_fields(); ?>
	</p>
	
	<p id="allowed_tags"><strong>XHTML:</strong> <?php _e('You can use these tags:', 'simonbelair'); ?> <code><?= allowed_tags(); ?></code></p>
	
	<?php do_action('comment_form', $post->ID); ?>
	
	</form>
	
</section>

<?php endif; // if you delete this the sky will fall on your head ?>
