<?php
	$headers = 'From:noreply.ankesinchecker@gmail.com' . "\r\n"; // Définition du header
	ini_set( 'sendmail_from', "adm.ankesinchecker@gmail.com" ); // Adresse qui envoie les emails
	ini_set( 'SMTP', "smtp.gmail.com" );  // Mon service d'envoi de mail (Gmail)
	ini_set( 'smtp_port', 25 );			// Port

?>
