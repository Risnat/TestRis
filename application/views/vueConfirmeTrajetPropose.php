


<div class="container" id="containerRechercher"> 
    <div class= "row">
<div class="container">
  <h2>Trajets possibles  </h2>
 <form  method="post">                                                                                      
  <div class="table-responsive">          
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Départ</th>
        <th>Destination</th>
        <th>Date</th>
        <th>Heure</th>
      </tr>
    </thead>
    
<?php

foreach($results as $trajet)
{
   
    ?>
    <tbody>
      <tr>
        <td><?php  if ($trajet['vers_lycee']==0) {echo $trajet['adresse_formatee'];}
                                              else {echo "Lycée";} ?></td>
        <td><?php   if ($trajet['vers_lycee']==1) {echo $trajet['adresse_formatee'];}
                                              else {echo "Lycée"; }?></td>
        <td><?php  echo $trajet['date_trajet']; ?></td>
        <td><?php  echo $trajet['heure_trajet']; ?></td>
           <td><?php  echo "nombre de passagers : ".$trajet['nbre_passagers']; ?></td>
                   <td><?php   if ($trajet['accepte_arret']==0) {echo "vous n'acceptez pas les arrêts";}
                                              else {echo "vous acceptez les arrêts";}?></td>
       </tr>
    </tbody>
    
<?php
}
?>

 
  </table>
  </div>
     <a href="<?= site_url('accueilCovoit');?>"><button type="button" class="btn btn-info btn-lg">Fermer</button></a>


</div>      
</div> 



   