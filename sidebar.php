
		<div class="sidebar principal">
			<h1 id="demande-de-rendez-vous">Demande de rendez-vous</h1>
			<div class="form-rdv">
			<?php
			$c = do_shortcode( '[contact-form subject="Acupuncture Montréal RDV" to="info@simonbelair.ca"] [contact-field label="Nom" type="name" required="true" /] [contact-field label="Courriel" type="email" required="true" /] [contact-field label="Téléphone" type="text" /] [contact-field label="J’aimerais un rendez-vous" type="select" options="Demain,Cette semaine,La semaine prochaine,Un peu plus tard" /] [contact-field label="Mes symtômes en bref" type="textarea" required="true" /] [/contact-form]' );
			$c = str_replace( 'Submit &#187;', 'SOUMETTRE', $c );
			echo $c;
			?>
			</div>

      <!-- <h3>Pour toute autre information</h3>
      <p class="adresse"><a href="mailto:&#x69;&#x6E;&#x66;&#x6F;&#x40;&#x73;&#x69;&#x6D;&#x6F;&#x6E;&#x62;&#x65;&#x6C;&#x61;&#x69;&#x72;&#x2E;&#x63;&#x61;"><strong>Simon Bélair, Acupuncteur</strong> <i class="fa fa-envelope"></i></a><br>
      483, boul. St-Joseph, Est<br>
      Montréal (Québec) H2J 1J8<br>
      514 794-4410<br>
      Metro Laurier</p> -->

		</div>
