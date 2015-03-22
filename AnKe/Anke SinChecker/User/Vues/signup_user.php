<?php
	
	header('Content-Type:text/html; charset=UTF-8');
	
?>
		<div id="wrap">
			<h3>Inscription</h3>
			<p>Veuillez renseigner un identifiant, une adresse email et un mot de passe :</p>
			<form method="post" action="../Controleurs/index.php?page=user">
					
					
					<label>Votre identifiant : </label> <input type="text" name="login" required title="Uniquement lettres, chiffres et _"/><span class="error">*</span></br>
					<label>Votre adresse email : </label> <input type="text" name="email" required title=" Format adresse : example@example.fr"/><span class="error">*</span></br>
					<label>Réécrivez votre adresse email : </label> <input type="text" name="email2" required /><span class="error">*</span></br>
					<label>Votre mot de passe : </label> <input type="password" name="password" required title="mot de passe de 6 à 10 caractères" pattern=".{6,10}" maxlength="10"/><span class="error">*</span></br>
					<label>Réécrivez votre mot de passe : </label> <input type="password" name="password2" required  pattern=".{6,10}" maxlength="10"/><span class="error">*</span></br>
					<p><span class="error">* champ obligatoire</span></p>
					
					<div id="input_wrap">
					<input type="submit" name="valider" value="S'inscrire"/><br/><br/>
					</div>
			</form>
		</div>
			
	
