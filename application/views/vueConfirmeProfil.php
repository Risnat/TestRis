



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
            <h3> votre profil en résumé</h3>
               <div class= "row">       
                   <p> Nom : <?php echo $this->session->nom;?></p>    
               </div>
               <div class= "row">
                     <p> Prenom : <?php echo $this->session->prenom;?></p>  
               </div>
                 <div class= "row">
                     <p> Communauté: <?php if ($this->session->communaute==1) {echo "professeur";}
                                                elseif ($this->session->communaute==2) {echo "eleve";}
                                                elseif ($this->session->communaute==3) {echo "étudiant";}
                                               else {echo "autre";}?></p>  
               </div>
                <a href="<?= site_url('accueilCovoit');?>"><button type="button" class="btn btn-info btn-lg">Continuer</button></a>
</div>




 							 

