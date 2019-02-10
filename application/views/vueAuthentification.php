



 <div class= "row">
    <div class="col-sm-12">
        <p><span class="error"> Tous les champs sont  obligatoires</span></p>
  <form action="" method="post">
    <div class="form-group">
      <label class="control-label col-sm-4" for="usrMail"> </label>
      <div class="col-sm-6">
          <input type="email" class="form-control" name="usrMail" placeholder="Saisir email" value="<?php echo set_value('valid_email_field'); ?>" >
     </div>
   </div>
   <div class= "row">
      <div class="col-sm-12">
          <?php echo form_error('usrMail');?>
         <br>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="pwd"> </label>
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
   
    <div class= "row">
      <div class="col-sm-12">  <button type="submit" class="btn btn-default" >Valider</button> 
      </div>
    </div>

  
  </form>  

 </div>
</div>




