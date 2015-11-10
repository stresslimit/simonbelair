
		<div class="sidebar principal">
			<h1 id="demande-de-rendez-vous"><?php _e('Request an appointment', 'simonbelair'); ?></h1>
			<div class="form-rdv">
			<?php $c = do_shortcode( '[contact-form-7 id="784" title="RDV Acupuncture Montreal"]' );
			if ( ICL_LANGUAGE_CODE == 'en' ) :
				$c = str_replace( 'Nom', 'Name', $c );
				$c = str_replace( 'Courriel', 'Email', $c );
				$c = str_replace( 'Téléphone', 'Telephone', $c );
				$c = str_replace( 'J’aimerais un rendez-vous', 'I would like an appointment<br />', $c );
				$c = str_replace( 'Demain', 'Tomorrow', $c );
				$c = str_replace( 'Cette semaine', 'This week', $c );
				$c = str_replace( 'La semaine prochaine', 'Next week', $c );
				$c = str_replace( 'Un peu plus tard', 'A little later', $c );
				$c = str_replace( 'Mes symptômes en bref', 'My symptoms in brief', $c );
				$c = str_replace( 'Soumettre', 'Submit', $c );
			endif; echo $c; ?>
			</div>

<span class="facebook-label">Facebook</span><div class="fb-like" 
data-href="https://facebook.com/SimonBelairAc" 
data-layout="button" 
data-action="like" 
data-show-faces="false">
</div>

<a class="twitter-timeline" 
href="https://twitter.com/Acupuncture_Mtl" 
data-widget-id="541412331868393472" 
data-chrome="transparent"
data-border-color="#ccc"
><?php _e('Tweets by @Acupuncture_Mtl', 'simonbelair'); ?></a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

		</div>
