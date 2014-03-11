
		<div class="sidebar main">
			<h1>Prenez un rendez-vous</h1>
			<div class="form-rdv">
			<?php
			$c = do_shortcode( '[contact-form subject="Acupuncture Montréal RDV" to="info@simonbelair.ca"] [contact-field label="Nom" type="name" required="true" /] [contact-field label="Courriel" type="email" required="true" /] [contact-field label="Téléphone" type="text" /] [contact-field label="J’aimerais un rendez-vous" type="select" options="Demain,Cette semaine,La semaine prochaine,Un peu plus tard" /] [contact-field label="Mes symtômes en bref" type="textarea" required="true" /] [/contact-form]' );
			$c = str_replace( 'Submit &#187;', 'SOUMETTRE', $c );
			echo $c;
			?>
			</div>

			<!-- <h3>Derniers tweets</h3> -->

		</div>
