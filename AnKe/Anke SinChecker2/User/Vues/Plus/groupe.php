<!--PAGE DE CONSULTATION HISTORIQUE-->

<?php
	session_start();
	
	header('Content-Type:text/html; charset=UTF-8');

?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<link href="../css/style.css" type="text/css" rel="stylesheet" />
		
	</head>
	
	<body>
		 
		<div id="header">
        <h3> AnKe SinChecker > Groupe</h3>
		</div>
		<a href="disconnect.php"><input type="submit" value="Se déconnecter"/></a></br>
		
		<div id="wrap">
			<h3>Groupe</h3>
			<p>Que souhaitez-vous faire ?</p>
			
					
				<form method="post" action="../../Controleurs/groupe.php">
					<li><label>Voir les extraits et les urls du groupe </label> <input type="submit" name="consulter" value="Consulter"/></li><br/><br/>
				</form>
			
				<form method="post" action="../../Controleurs/envoi-invitation.php">
					<li><label>Envoyer une invitation à un utilisateur pour rejoindre le groupe: </label></br>
					<input type="text" name="invitation" value="Tapez nom utilisateur" onfocus="this.value='';" id="input1" /></li>
					<input type="submit" value="Inviter"/><br/><br/>
				</form>
			
			
					<li><label>Si vous n'êtes membre d'aucun groupe, joignez-en un ou créez-en un! </label></br>
					<p>(Remarque: Vous ne pouvez être membre de deux groupes)</p>
					
				<form method="post" action="../../Controleurs/joindre-groupe.php">
					<input type="submit" name="joindre" value="Joindre"/><br/>
				</form>
					
				<form method="post" action="../../Controleurs/groupe.php">
					<input type="submit" name="supprimer" value="Supprimer mon compte"  onSubmit="return confirm('Etes-vous sûr(e) de vouloir supprimer votre compte?')"/><br/>
				</form>
				
				<form method="post" action="../../Controleurs/creer-groupe.php">
					<input type="submit" value="Créer"/>
					<input type="text" name="create_groupe" value="Tapez un nom de groupe" onfocus="this.value='';" id="input2" required /></li>
				</form>
			<br/><br/>
	
		</div>

</html>
