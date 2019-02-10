<div class="container" id="containerRechercher"> 
	<div class= "row">
		<div class="col-md-6">
           <img src="../assets/images/covoit2.jpg" class="img-responsive" alt="Covoiturage" style="width:100%"" >
        </div>
        <div class="col-md-6">
            <h3> <?php echo $inviteMessage?> </h3>
             <form class=form-horizontal  method="post">
              	 <p><span class="error">* champ obligatoire</span></p>
              <div class="form-group">
                 <label class="control-label col-sm-4" for="departRech"> Départ :</label>
                  <div class="col-sm-8">
                     <input type="text" class="form-control" name="departRech"  placeholder="Lycée/Saisir la destination"   >
                  </div>
              </div>
              <div class="form-group">
                 <label class="control-label col-sm-4" for="destinationRech"> Destination : </label>
                  <div class="col-sm-8">
                     <input type="text" class="form-control" name="destinationRech" placeholder="Lycée/Saisir la destination"  >
                  </div> 
              </div>
              <div class="form-group">
                  <label class="control-label col-sm-4" for="dateRech"> Date :</label>
                   <div class="col-sm-8">
                     <input type="date" class="form-control datepicker" name="dateRech" value="<?php echo set_value('date("d-m-Y")');?>"  >   
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-sm-4" for="heureRech"> Heure :</label>
                   <div class="col-sm-8">
                      <input type="time" step ="10:0:0" class="form-control timepicker" name="heureRech" value="<?php echo set_value('07:10');?>"  > 
                   </div>
               </div>
              
		   
             
                 <a href="<?= site_url('controlConfirmeTrajet');?>">	<button type="submit" class="btn btn-default" data-dismiss="form">Rechercher </button>
         	 </form>  
        </div>
    </div>
</div>


