



<div class="container"> <!-- definition du container du jumbotron de page-->
	<div class= "row">
		<div class="col-md-12">
	      <div class="jumbotron"> 
		    <h2>Covoiturage pendant les travaux au lycée</h2>
	      </div>
        </div>
    </div>
</div>


<div class="container" id="containerProfil"> <!-- definition du container du milieu de page-->
	<div class= "row">
            <h3> votre profil</h3>
              <form class=form-horizontal  method="post">
              	 <p><span class="error"> tous les  champs sont  obligatoires</span></p>
                 <div class= "row">
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="nom"> Nom :</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="nom"  value="<?php echo $this->session->nom;?>" default="<?php echo $this->session->nom;?>" required >
                      </div>
                    </div>
                  </div>
                
                  <div class= "row">
                     <div class="form-group">
                       <label class="control-label col-sm-4" for="prenom"> Prénom :</label>
                         <div class="col-sm-8">
                            <input type="text" class="form-control" name="prenom"  value="<?php echo $this->session->prenom;?>" default="<?php echo $this->session->prenom;?>" required >
                         </div>
                     </div>
                  </div>   
                  <div class= "row">
                     <div class="form-group">
                        <label class="control-label col-sm-4" for="dateNaiss"> Date de naissance :</label>
                        <div class="col-sm-8">
                          <input type="date" class="form-control datepicker" name="dateNaiss" value="<?php echo $this->session->date_naissance;?>" selected="<?php echo $this->session->date_naissance;?>" required>
                        </div>
                     </div>
                  </div>
                  <div class= "row">
				            <div class="form-group">
 				           	 <label class="control-label col-sm-4" for="communaute"> Communauté :</label>
  					          	<select name="communaute">
 						          	 <option value="1"  <?php if ($this->session->communaute==1) {echo "selected";}?> >Professeur</option>
 						          	 <option value="2" <?php if ($this->session->communaute==2) {echo "selected";}?>>Eleve</option>
 						           	 <option value="3" <?php if ($this->session->communaute==3) {echo "selected";}?>>Etudiant</option>
 						           	 <option class="divider"></option> 
 						           	 <option value="4" <?php if ($this->session->communaute==4) {echo "selected";}?>>Autre</option>
						            </select>
				            </div>
			           </div>
			           <div class= "row">
                    <div class="form-group">
                     <label class="control-label col-sm-4" for="niveau"> Niveau :  </label>
                    <div class="col-sm-8"> <p><?php echo $this->session->niveau;?></p>
                   </div>
                  </div>
                </div>
                  <div class= "row">
                      <div class="form-group">
                        <label class="control-label col-sm-4" for="telCovoit"> Téléphone :</label>
                            <div class="col-sm-8">
                               <input type="text"  class="form-control " name="telCovoit" value="<?php echo $this->session->tel;?>"  required>
                            </div>
                      </div>
                  </div>
                  <div class= row>
                        <div class="checkbox-group">
                            <label class="control-label col-sm-4" for="accept_comm"> Accepte de voyager hors communauté  :</label>
                                  <div class="col-sm-2">
                                     <input type="checkbox"  class="checkbox " name="accept_comm"   <?php if ($this->session->entre_communaute==1) {echo "checked";} else {echo "unchecked";}?> >
                                  </div>
                        </div>
                        <div class="checkbox-group">
                             <label class="control-label col-sm-4" for="peut_conduire"> Peut conduire :</label>
                                 <div class="col-sm-2">
                                     <input type="checkbox"  class="checkbox" name="peut_conduire"  <?php if ($this->session->peut_conduire==1) {echo "checked";} else {echo "unchecked";}?> >
                                 </div>
                        </div>
                  </div>
                     <div row>
                       <div class="col-sm-offset-2" >
                          <button type="submit" class="btn btn-default" data-dismiss="form">Valider</button>
                       </div>
                      </div>
            </form>  
        </div>
    </div>






<a name="#debutant"><?php $_SESSION['niveau']="debutant";?></a>
<a name="#initie"><?php $_SESSION['niveau']="initie";?></a>
<a name="#confirme"><?php $_SESSION['niveau']="confirme";?></a>
<a name="#expert"><?php $_SESSION['niveau']="expert";?></a>
<a name="#ambassadeur"><?php $_SESSION['niveau']="ambassadeur";?></a>
 							 

