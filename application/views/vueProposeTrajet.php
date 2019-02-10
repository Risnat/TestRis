<div class="container" id="containerRechercher"> 
	<div class= "row">
		<div class="col-md-6">
           <img src="../assets/images/covoit2.jpg" class="img-responsive" alt="Covoiturage" style="width:100%"" >
        </div>
        <div class="col-md-6">
            <h3> Trajet proposé </h3>
             <form class=form-horizontal  method="post">
              	 <p><span class="error">* champ obligatoire</span></p>
              <div class="form-group">
                 <label class="control-label col-sm-4" for="departProp"> Départ :</label>
                  <div class="col-sm-8">
                     <input type="text" class="form-control" name="departProp"  placeholder="Lycée/Saisir la destination"   >
                  </div>
              </div>
              <div class="form-group">
                 <label class="control-label col-sm-4" for="destinationProp"> Destination : </label>
                  <div class="col-sm-8">
                     <input type="text" class="form-control" name="destinationProp" placeholder="Lycée/Saisir la destination"  >
                  </div> 
              </div>
              <div class="form-group">
                  <label class="control-label col-sm-4" for="dateProp"> Date :</label>
                   <div class="col-sm-8">
                     <input type="date" class="form-control datepicker" name="dateProp" value="<?php echo set_value('date("d-m-Y")');?>"  >   
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-sm-4" for="heureProp"> Heure :</label>
                   <div class="col-sm-8">
                      <input type="time" step ="10:0:0" class="form-control timepicker" name="heureProp"   > 
                   </div>
               </div>
              
		    	<div class= "row">
			    	<div class="form-group">
 					   <label class="control-label col-sm-4" for="nbpassagersProp"> Nombre de passagers  :</label>
 					    <div class="col-sm-8">
  						  <select name="nbpassagersProp" >
 							 <option value="1" >1</option>
 							 <option value="2" >2</option>
 							 <option  value="3" selected>3</option>
 							 <option class="divider"></option> 
 							 <option value="4">4</option>
 							 <option value="5">5</option>
					   	  </select>
					    </div>
				    </div>
			        <div class= "row">
                 		<div class="checkbox">
                 			<label class="control-label col-sm-4" for="accepteArret"> Accepte des arrêts</label>
                  				<div class="col-sm-8">
                    				<input type="checkbox" class= "checkbox" checked name="accepteArret" >
                				</div>
              			</div>
              		</div>
             	</div>
             
                	<button type="submit" class="btn btn-default" data-dismiss="form">Proposer</button>
         	 </form>  
        </div>
    </div>
</div>


