<script src="js/addinput.js"></script>
		<script src="js/jquery-1.11.2.min.js"></script>
			
		<h2>Formulaire d'inscription</h2>
		
		 <form method="post" action="../../Admin/Controleurs/index.php?page=questionnaire">
			
				<label>Sexe :</label>
					<input type="radio" name="sexe" value="sexe~homme" id="homme" required value="homme"/>
						<label for="homme">Homme</label>
					<input type="radio" name="sexe" value="sexe~femme" id="femme"/>
						<label for="femme">Femme</label><br />
					
					
				<label> Age : </label>
					<input type="text" name="age" maxlength="2" required /></br>
				
			
				<label>Langue maternelle</label>
					<select name="langue_maternelle" id="langue_maternelle">
						<option value="langue_maternelle~Français" >Français</option>
						<option value="langue_maternelle~Chinois">Chinois</option>
						<option value="langue_maternelle~Autre">Autre</option>
						
						<div id="Autre15857">
							<input type="text" name="langue_maternelle_Autre" id="Autre15857" maxlength="100" />
						</div>				
					</select></br>
					
					
					<label>Profil utilisateur</label> 
						<select name="profil_utilisateur" id="profil_utilisateur">
							<option value="profil_utilisateur~apprenant(e)">Apprenant(e)</option>
							<option value="profil_utilisateur~Enseignant(e)">Enseignant(e)</option>
							<option value="profil_utilisateur~Tuteur(trice)">Tuteur(trice)</option>
							<option value="profil_utilisateur~Chercheur(euse)">Chercheur(euse)</option>
						</select></br>
							
							
						<label>Apprenant</label> 
						<select name="apprenant" id="apprenant">
							<option value="apprenant~collège">Collège</option>
							<option value="apprenant~Lycée">Lycée</option>
							<option value="apprenant~Supérieur">Supérieur</option>
							<option value="apprenant~Autre">Autre</option>
								
							<div id="Autre29102">
								<input type="text" name="apprenant~Autre" id="Autre29102"/>
							</div>	
						</select></br>
									
									
						<label>Collège</label> 
						<select name="college" >
							<option value="college~6e">6e</option>
							<option value="college~5e">5e</option>
							<option value="college~4e">4e</option>
							<option value="college~3e">3e</option>
						</select></br>
								
								
						<label>Lycée</label> 
						<select name="lycee">
							<option value="lycee~Seconde">Seconde</option>
							<option value="lycee~Première">Première</option>
							<option value="lycee~Terminale">Terminale</option>
							<option value="lycee~BTS">BTS</option>
							<option value="lycee~Classes préparatoires">Classes préparatoires</option>
						</select></br>
						
						
						<label>Chinois mandarin</label> 
						<select name="chinois_mandarin" id="chinois_mandarin">
							<option value="chinois_mandarin~lv1">LV1</option>
							<option value="chinois_mandarin~LV2">LV2</option>
							<option value="chinois_mandarin~LV3">LV3</option>
							<option value="chinois_mandarin~Section internationale">Section internationale</option>
						</select></br>
								
								
						<label>Académie du collège/lycée : </label>
							<input type="text" name="academie_du_college/lycee" maxlength="100"/></br>
						
				
						<label >Etablissement </label>
							<input type='radio' name="etablissement" value="etablissement~école" id="ecole" required value="etablissement.école">
								<label for="ecole">Ecole</label>
							<input type='radio' name="etablissement" value="etablissement~université" id="université">
								<label for="université">Université</label>
							<div id="ecole1">
								<input type="text" name="etablissement~autre" id="ecole1" maxlength="100"/>
							</div>
							<div id="université1">
								<input type="text" name="etablissement~autre" id="université1" maxlength="100"/>
							</div></br>
							
							
						<label>Ville : </label>
							<input type="text" name="ville" required maxlength="100"/></br>
							
						
						<label>Dans quel cadre étudiez-vous le chinois?</label>
						<select name="dans_quel_cadre_etudiez-vous_le_chinois?" id="dans_quel_cadre_étudiez-vous_le_chinois?">
							<option value="lea (langues etrangère appliquée)">LEA (Langues Etrangère Appliquée)</option>
							<option value="LLCER (Langue, Littérature, Cultures Etrangères et Régionales)">LLCER (Langue, Littérature, Cultures Etrangères et Régionales)</option>
							<option value="Master de chinois ">Master de chinois </option>
							<option value="Master MEEF chinois">Master MEEF chinois</option>
						</select></br>
							
							
						<label>Autre cadre</label> 
						<select name="autre_cadre" id="autre_cadre">
							<option value="lansad (langue pour spécialistes des autres disciplines, langue en option)">LANSAD (LANgue pour Spécialistes des Autres Disciplines, langue en option)</option>
							<option value="Autre">Autre</option>
							
							<div id="Autre15116">
								<input type="text" name="autre_cadre~Autre" id="Autre15116"/>
							</div>	
						</select></br>
								
								
						<label>Niveau</label> 
						<select name="niveau" id="niveau">
							<option value="niveau~débutant">Débutant</option>
							<option value="niveau~En continuation">En continuation</option>
						</select></br>
								
			
						<label>Méthodes utilisées</label></br>
							<textarea name="methodes_utilisees" required maxlength="255"/></textarea></br>
							
							
						<label>Enseigant</label>
							<input type="checkbox" name="enseignant" value="enseignant~secondaire" id="secondaire"> <label for="secondaire" required value="secondaire"> Secondaire</label>
							<input type="checkbox" name="enseignant" value="enseignant~superieur" id="superieur"> <label for="superieur"> Supérieur</label>
						<select name="enseigant" id="enseigant">
							<option value="enseignant~Vacataire">Vacataire</option>
							<option value="enseignant~Stagiaire">Stagiaire</option>
						</select></br>
						
						
						<label>Certifié(e)</label> 
						<select name="certifie" id="certifie">
							<option value="certifie~oui">Oui</option>
							<option value="certifie~Non">Non</option>
							<option value="certifie~Autre">Autre</option>
							
							<div id="Autre265">
								<input type="text" name="certifie~Autre" id="Autre265"/>
							</div>	
						</select></br>
								
							
							
							
							
						<label>Titulaire CAPES</label> 
						<input type='radio' name="titulaire_capes" value="capes_interne" id="interne" >
							<label for="interne">Interne</label>
						<input type='radio' name="titulaire_capes" value="capes_externe" id="externe">
							<label for="externe">Externe</label></br>
							
							<div id="Année9413">
								<label>Année d'obtention : </label><input type="text" name="titulaire_capes~annee" id="Année9413" maxlength="4"/>
							</div>
							<div id="Année9414">
								<label>Année d'obtention : </label><input type="text" name="titulaire_capes~annee" id="Année9414" maxlength="4"/>
							</div>
							
								
								
								
								
						<label>Titulaire du CAPET</label> 
						<input type='radio'name="titulaire_du_capet" value="capet_interne" id="interne" >
							<label for="interne">Interne</label>
						<input type='radio' name="titulaire_du_capet" value="capet_externe" id="externe">
							<label for="externe">Externe</label></br>
									
							<div id="Année18497">
								<label>Année d'obtention : </label><input type="text" name="titulaire_du_capet~annee" id="Année18497" maxlength="4"/>
							</div>
							<div id="Année18498">
								<label >Année d'obtention : </label ><input type="text" name="titulaire_du_capet~annee" id="Année18498" maxlength="4"/>
							</div>
							
							
									
									
							<label>Professeur(e) agrégé(e)</label>
							<li><label>Année d'agrégation: </label></li>
								<input type="text" name="professeur_agrege~annee" maxlength="4"/></br>
								
							
							
							
							<label>Etablissement principal</label>
								<li><label>Nom :</label>
									<input type="text"  name="etablissement_principal~nom" maxlength="100"/></li>
								<li><label>Académie :</label>
									<input type="text"  name="etablissement_principal~academie" maxlength="100"/></li>
								<li><label>Ville :</label>
									<input type="text"  name="etablissement_principal~ville" maxlength="100"/></li>
									
						
						
						
							<label>Enseignez-vous dans un autre établissement?</label>
							<input type='radio' name="enseignez-vous_dans_un_autre_etablissement?" value="autre_etablissement~Oui" id="oui" required value="oui"/>
								<label for="oui">Oui</label> 
							<input type='radio' name="enseignez-vous_dans_un_autre_etablissement?" value="autre_etablissement~non">
								<label for="non">Non</label></br>
								
							<div id="etablissement_secondaire_1">
								<li><label>Etablissement secondaire 1 : </label>
								<input type="text" name="si_oui_(1)~etablissement_secondaire_1" maxlength="200"/></li></br>
								<li><label>Académie : </label><input type="text"  name="si_oui_(1)~academie" maxlength="100"/></li></br>
								<li><label>Ville : </label><input type="text"  name="si_oui_(1)~ville" maxlength="100"/></li></br>
							
								<li><label>Etablissement secondaire 2 : </label>
								<input type="text" name="si_oui_(2)" maxlength="200"/></li></br>
								<li><label>Académie : </label><input type="text" name="si_oui_(2)~academie" maxlength="100"/></li></br>
								<li><label>Ville : </label><input type="text" name="si_oui_(2)~ville" maxlength="100"/></li></br>
							</div>
							
							
							
							<label>Contrat doctoral</label> 
							<input type='radio'name="contrat_doctoral" value="contrat_doctoral~oui" id="oui" required value="oui">
								<label for="oui">Oui</label>
							<input type='radio'name="contrat_doctoral" value="contrat_doctoral~non">
								<label for="non">Non</label></br>
								
							<div id="discipline">
								 <li><label>Discipline : </label><input type="text" name="si_oui~discipline" maxlength="200"/></li></br>
							</div>
									
									 
									 
							<label>Poste universitaire</label>
							<input type='radio'name="poste_universitaire" value="poste_universitaire~maitre de conferences" id="maitre de conferences">
								<label for="maitre de conferences">Maître de conférences</label>
							<input type='radio'name="poste_universitaire" value="poste_universitaire~HDR">
								<label for="HDR">HDR</label></br>
									 
								<div id="discipline1">
								 <li><label>Discipline : </label><input type="text" name="poste_universitaire~discipline" id="discipline1" maxlength="200"/></li></br>
								</div> 
								<div id="discipline2">
								 <li><label>Discipline : </label><input type="text"  name="poste_universitaire~discipline" id="discipline2" maxlength="200"/></li></br>
								</div>
							
							
							
							<label>Doctorat</label>	
								<li><label>Discipline : </label><input type="text" name="doctorat~discipline" maxlength="200"/></li>
								<li><label>Année d'obtention: </label><input type="text" name="doctorat~annee" maxlength="4"/></li></br>	 
								
								
								
								
							<label>Professeur des universités</label>
								<li><label>Discipline actuelle: </label><input type="text" name="professeur_des_universites~discipline" maxlength="200"/></li>
								<li><label>Discipline du doctorat: </label><input type="text" name="professeur_des_universites~doctorat" maxlength="200"/></li>
								<li><label>Année d'obtention: </label><input type="text" name="professeur_des_universites~annee" maxlength="4"/></li></br>
							
							
							
							
							<label>Chercheur</label>
								<li><label>Discipline actuelle: </label><input type="text" name="chercheur_(1)~discipline" maxlength="200"/></li>
								<li><label>Discipline du doctorat: </label><input type="text" name="chercheur_(1)~doctorat" maxlength="200"/></li>
								<li><label>Année d'obtention: </label><input type="text" name="chercheur_(1)~annee" maxlength="4"/></li></br>
								<li><label>Etablissement: </label><input type="text" name="chercheur_(2)~etablissement" maxlength="200"/></li>
								<li><label>Ville: </label><input type="text" name="chercheur_(2)~ville" maxlength="100"/></li>
								
								
								
							<label>Chercheur indépendant</label>
							<select name="Chercheur indépendant" id="chercheur_independant">
								<option value="chercheur_independant~oui">Oui</option>
								<option value="chercheur_independant~Non">Non</option>
								<option value="chercheur_independant~Autre">Autre</option>
								
								<div id="Autre27993">
									<input type="text" name="chercheur_independant~Autre" id="Autre27993"/>
								</div>
							</select></br>
							
							
							
							<label>Objectifs :</label>
							<li><label>Exposez les objectifs de votre projet ainsi que les données que vous souhaiteriez exploiter dans le cadre de cette étude ?  : </label></br>
							<textarea name="objectifs" required min="10" /></textarea></br>
							
							
							
							
							<label>Dans le cadre de toute communication et publication, je m’engage à citer Anke :</label>
							<input type='radio'name="dans_le_cadre_de_toute_communication_et_publication,_je_m’engage_a_citer_anke" value="publication_anke~j’accepte" id="j'accepte" required value="j'accepte">
								<label for="j'accepte">J’accepte</label>
							<input type='radio'name="dans_le_cadre_de_toute_communication_et_publication,_je_m’engage_a_citer_anke" value="publication_anke~je refuse" id="je refuse">
								<label for="je refuse">Je refuse</label>
					
							<div id="engagement">
								<input type='checkbox'name="dans_le_cadre_de_toute_communication_et_publication,_je_m’engage_a_citer_anke~engagement" value="publication_anke~s'engage" id="s'engage sur l'honneur"><label for="s'engage"> Je m'engage sur l'honneur </label>
							</div>
							
									
									
									
				</br><input type="submit" name="envoyer" value="Envoyer"/><br/><br/>
			</form>
