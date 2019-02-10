<div class="container"> <!-- definition du container de la page d'accueil-->

		<nav class="navbar navbar-inverse" role="navigation">  <!-- barre de navigation en noir avec nav-barinverse-->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand">Pouce à Dantec </a>
			</div>

			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li> <a href="index.php">Accueil</a> </li>
					<li> 
						<a href="php/proposertrajet.php">Proposer un trajet </a>
					</li>
					<li> <a  href="php/recherchertrajet.php">Rechercher un trajet </a>
					</li>
					<li class="dropdown-menu-right"><!-- menu proposer les deux options d'authentifications-->
						<a class="dropdown-toggle" data-toggle="dropdown" href="index.php">Se connecter <b class="caret"></b></a>
						<ul class="dropdown-menu">
							
							<li><a href="php/inscription.php"><button type="button" class="btn btn-info btn-lg">Inscription</button></a></li>	
							<li class="divider"></li> 
							<li><a href="php/authentification.php"><button type="button" class="btn btn-info btn-lg">Authentification</button></a></li>					
						</ul>
					</li>
					
					<li> <a href="php/tableaudebord.php"> <?php include "php/traite_ident_covoit.php";?> </a>	</li>
				</ul>
				<form class="navbar-form navbar-right" action = "index.php" role="form">
					<div class="input-group">
						<input type="text" style="width:150px" class="input-sm form-control" placeholder="Recherche">
						<span class="input-group-btn">

							<button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span> Chercher</button>

						</span>
					</div>
				</form>
			</div>
		</nav>
	</div>


<div class="container"> <!-- definition du container du jumbotron de page-->
	<div class= "row">
		<div class="col-md-12">
	<div class="jumbotron"> 
		<h2>Covoiturage pendant les travaux au lycée</h2>
	</div>
</div>
</div>
</div>


<div class="container" id="containerCovoit"> <!-- definition du container du milieu de page-->
    <img src="images/covoit2.jpg" class="img-responsive" alt="Covoiturage" style="width:100%"> 
    <div class="top-right"><a  href="php/recherchertrajet.php">Et vous, où voulez-vous aller ? </a></div>
</div>

	<div id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<left>
				<h6 class="footertext">A propos :</h6></left></div></div>
				<br>
				<div class="row">
				<div class="col-md-4">
					<center>
						<img src="http://www.icone-png.com/png/16/16118.png" class="img-circle" alt="the-brains" width="50px" height="50px">
						<br>
						<h6 class="footertext">infos pratiques</h6>
						<h6><p class="footertext">vraiment pratiques<br></p></h6>
					</center>
				</div>
				<div class="col-md-4">
					<center>
						<img src="http://www.icone-png.com/png/43/43317.png" class="img-circle" alt="..." width="50px" height="50px">
						<br>
						<h6 class="footertext">Qui sommes-nous ?</h6>
						<h6><p class="footertext">Les BTS SIO1<br></p></h6>
					</center>
				</div>
				<div class="col-md-4">
					<center>
						<img src="http://www.icone-png.com/png/54/53683.png" class="img-rounded" alt="..." width="50px" height="50px">
						<br>
						<h6 class="footertext">mentions légales</h6>
					</center>
				</div>
			</div>
		</div>
			<br>
			<div class="row">
					<center><img src="images/logo_fld.jpg" class="img-circle" alt="logo felix" width="50px" height="50px"></center>
   					<center>	<p><a href="#">Contactez-nous</a></p> <p class="footertext">Copyright 2018</p></center>
			</div>
		</div>
	



