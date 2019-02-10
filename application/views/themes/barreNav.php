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
					<li> <a href="<?= site_url('accueilCovoit');?>">Accueil</a> </li>
					<li> 
						<a href="<?= site_url('controlProposerTrajet');?>">Proposer un trajet </a>
					</li>
					<li> <a  href="<?= site_url('controlRechercherTrajet');?>">Rechercher un trajet </a>
					</li>
					<li class="dropdown-menu-right"><!-- menu proposer les deux options d'authentifications-->
						<a class="dropdown-toggle" data-toggle="dropdown" href="<?= site_url('accueilCovoit'); ?>">Se connecter <b class="caret"></b></a>
						<ul class="dropdown-menu">
							
							<li><a href="<?= site_url('controlInscription');?>"><button type="button" class="btn btn-info btn-lg">Inscription</button></a></li>	
							<li class="divider"></li> 
							<li><a href="<?= site_url('controlAuthentification');?>"><button type="button" class="btn btn-info btn-lg">Authentification</button></a></li>
							<li class="divider"></li> 
							<li><a href="<?= site_url('controlDeconnexion');?>"><button type="button" class="btn btn-info btn-lg">Déconnexion</button></a></li>						
						</ul>
					</li>
					
					<li> <a href="<?= site_url('controlTableauBord');?>"> <?php echo $this->session->identCovoit;?> </a>	</li>
				</ul>
				<form class="navbar-form navbar-right" action = "<?= site_url('accueilCovoit');?>" role="form">
					<div class="input-group">
						<input type="text" style="width:150px" class="input-sm form-control" placeholder="Recherche">
						<span class="input-group-btn">

							<button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span> Chercher</button>

						</span>
					</div>
				</form>
			</div>
</nav>