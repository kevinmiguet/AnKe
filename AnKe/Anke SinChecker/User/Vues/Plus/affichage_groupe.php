
		<div id="wrap">
			<h3>Groupe</h3>
			<form method="post" action="../../Controleurs/historique.php">
			
			<?php 	
				
			
				if (isset($_SESSION['groupe-msg'])){
					echo "<p>Message: </p> ";
					echo '<div class="statusmsg">'.$_SESSION['groupe-msg'].'</div>';
					
				}
				elseif (!empty($_SESSION['urls']) && !empty($_SESSION['extraits']) && !empty($_SESSION['titres'])){
						$n=count($_SESSION['urls']);
						echo "<p> Les extraits et urls du groupe :</p>";
						for ($i=0;$i<$n;$i++){
							$j= $i+1;
							echo "Titre :".$_SESSION['titres'][$i]."</br>";	
							echo "Url n°".$j.": <input type=\"text\" value=\"".$_SESSION['urls'][$i]."\" size=\"50\"/></br>";	
							echo " Extrait n°".$j.": <textarea>".$_SESSION['extraits'][$i]."</textarea></br></br>";	
						}
						unset($_SESSION['urls']);
						unset($_SESSION['extraits']);
						unset($_SESSION['titres']);
					}
		
			
				elseif(isset($_SESSION['noms-groupe']) && !empty($_SESSION['noms-groupe'])){
					
					echo "<p> Sélectionnez le groupe auquel vous voulez adhérer :</p>";
					$n=count($_SESSION['noms-groupe']);
					echo "<form method=\"post\" action=\"../../Controleurs/groupe.php\">";
					echo "<label>Groupes :</label> ";
					//echo "<select name=\"groupe_nom\">";
							
							for ($i=0;$i<$n;$i++){
								echo "<option value=\"".$_SESSION['noms-groupe'][$i]."\">".ucfirst($_SESSION['noms-groupe'][$i])."</option>";
							}
					//echo "</select>";
					echo "</form>";
					echo "<input type=\"submit\" value=\"Adhérer au groupe\"/><br/><br/>";
					unset($_SESSION['noms-groupe']);
				}
				unset($_SESSION['groupe-msg']);
				
			?>
			
				
			</form>
		</div>
</html>
