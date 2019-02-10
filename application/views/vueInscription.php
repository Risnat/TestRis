



 <div class= "row">
    <div class="col-sm-12">
        <p><span class="error"> Tous les champs sont  obligatoires</span></p>
  <form action="" method="post">
    <div class="form-group">
      <label class="control-label col-sm-4" for="usrEmail"> Email :</label>
      <div class="col-sm-6">
          <input type="email" class="form-control" name="usrEmail" placeholder="Saisir email" value="<?php echo set_value('valid_email_field'); ?>" >
     </div>
   </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="pwd"> Nouveau mot de passe :</label>
      <div class="col-sm-6">
         <input type="password" class="form-control" name="pwd" placeholder="Saisir le mot de passe"> 
      </div>
    </div>
    <div class= "row">
      <div class="col-sm-12">
          <?php echo form_error('pwd');?>
         <br>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="pwdConf"> Confirmer le mot de passe :</label>
      <div class="col-sm-6">
         <input type="password" class="form-control" name="pwdConf" placeholder="Saisir le mot de passe"> 
      </div>
    </div>
    <div class= "row">
      <div class="col-sm-12">
          <?php echo form_error('pwdConf');?>
         <br>
      </div>
    </div>
    <div class= "row">
      <div class="col-sm-12">  <button type="submit" class="btn btn-default" >Valider</button> 
      </div>
    </div>

   
 
  </form>  

      </div>
    </div>




