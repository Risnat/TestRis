<div class="container" id="containerRechercher">
    <div class= "row">
    <div class="container">
      <h2>Trajets possibles  </h2>
      <form  method="post" >                                                                                      
        <div class="table-responsive">          
        <table class="table table-hover">
        <thead>
          <tr>
          <th>Départ</th>
          <th>Destination</th>
          <th>Date</th>
          <th>Heure</th>
          <th>Communaute</th>
          <th>Niveau</th>
          <th>Choix  </th>
         </tr>
        </thead>
    
        <?php
            $numSelect=-1;
            foreach($results as $trajet)
            {$numSelect=$numSelect+1;
   
          ?>
        <tbody>
           <tr>
              <td><?php  if ($trajet->vers_lycee==0) {echo $trajet->adresse_formatee;}
                                              else {echo "Lycée";} ?></td>
              <td><?php   if ($trajet->vers_lycee==1) {echo  $trajet->adresse_formatee;}
                                              else {echo "Lycée"; }?></td>
              <td><?php  echo $trajet->date_trajet; ?></td>
              <td><?php  echo $trajet->heure_trajet; ?></td>
              <td><?php  echo $trajet->nom_communaute; ?></td>
              <td><?php  echo $trajet->niveau; ?></td>
              <td><div class="form-group"><input name="choixTrajet" type="checkbox" class="form-control" value="<?php echo $numSelect;?>"></div></td>
            </tr>
        </tbody> 
        <?php
        }
        ?>
   </table>
  </div>
  <button type="submit" class="btn btn-default" data-dismiss="form">Accepter</button>
</form>
</div>   
</div>  
</div>