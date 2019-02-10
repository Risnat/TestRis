



<div id="modal01" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container w3-teal"> 
        
        <h2>Mise  en relation pour le covoiturage choisi</h2>
      </header>
      <div class="w3-container">
      	<h3>Informations sur ce covoiturage </h3>
        <p>Le trajet aura lieu le <?php echo $result->date_trajet." à ".$result->heure_trajet?></p>  
        <p>Vous irez <?php if ($result->vers_lycee==1)      {echo "de ".$result->adresse_formatee." au Lycée";}
        									else	{echo "du lycée à ".$result->adresse_formatee;} 
                        ?></p>
        <p>Votre covoitureur  <?php if ($result->accepte_arret==1) {echo " accepte les arrêts.";}
        										        else {echo "n'accepte pas les arrêts. ";} 
                        ?></p>
        <p>L'adresse électronique de votre coitureur est <?php echo $result->email_covoit?></p>
              
       </div>
       <div class="form-group">
                 <label class="control-label col-sm-2" for="message"> Votre courriel au covoitureur :</label>
                  <div class="col-sm-10">
                       <input type="text" id="inputemail" class="form-control" name="message"  placeholder="Ecrire le message que vous voulez faire  lire au covoitureur" default=<?php echo "nouveau covoitureur inscrit pour le trajet  du ".$result->date_trajet." à ".$result->heure_trajet?> >
                  </div>
        </div>
      <a href="<?= site_url('controlEnvoi');?>"><button type="submit" class="btn btn-default" data-submit="form">Envoyer ce courriel</button>
      <footer class="w3-container w3-teal">
        <p>A bientot sur coup de pouce à le Dantec  </p>
      </footer>
    </div>
  </div>

 
