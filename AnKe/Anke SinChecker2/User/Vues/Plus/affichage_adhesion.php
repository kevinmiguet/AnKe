<!--PAGE DE CONSULTATION INFO GROUPE-->

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
		
		<div id="wrap">
			<h3>Groupe</h3>
			<form method="post" action="../../Controleurs/joindre-groupe.php">
			
			<?php 	
				
			
				if (isset($_SESSION['groupe-msg'])){
					echo "<p>Message: </p> ";
					echo '<div class="statusmsg">'.$_SESSION['groupe-msg'].'</div>';
					
				}
			
				elseif(isset($_SESSION['noms-groupe']) && !empty($_SESSION['noms-groupe'])){
					
					echo "<p> Sélectionnez le groupe auquel vous voulez adhérer :</p>";
					$n=count($_SESSION['noms-groupe']);
					echo "<form method=\"post\" action=\"../../Controleurs/groupe.php\">";
					echo "<label>Groupe(s) :</label> ";
					echo "<select name=\"groupe_nom\">";
							
							for ($i=0;$i<$n;$i++){
								echo "<option value=\"".$_SESSION['noms-groupe'][$i]."\">".ucfirst($_SESSION['noms-groupe'][$i])."</option>";
							}
					echo "</select>";
					echo "<input type=\"submit\" value=\"Adhérer au groupe\"/><br/><br/>";
					echo "</form>";
					unset($_SESSION['noms-groupe']);
				}
				unset($_SESSION['groupe-msg']);
				
			?>
			
			</form>
		</div>
</html>
