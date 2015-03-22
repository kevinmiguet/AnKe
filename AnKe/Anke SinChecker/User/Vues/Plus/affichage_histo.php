
		<div id="wrap">
			<h3>Historique</h3>
			<p>Que souhaitez-vous faire ?</p>
			<form method="post" action="../../Controleurs/historique.php">
					
					
			<p> Vos extraits et vos url :</p>
			
			
			<?php 	
					$n=count($_SESSION['urls']);
					
					for ($i=0;$i<$n;$i++){
						$j= $i+1;
						echo "Titre : ".$_SESSION['titres'][$i]."</br>";	
						echo "Url n°".$j.": <input type=\"text\" value=\"".$_SESSION['urls'][$i]."\" size=\"50\"/></br>";	
						echo " Extrait n°".$j.": <textarea>".$_SESSION['extraits'][$i]."</textarea></br></br>";	
					}
					unset($_SESSION['urls']);
					unset($_SESSION['extraits']);
					unset($_SESSION['titres']);
			?>
			</form>
		</div>
</html>
