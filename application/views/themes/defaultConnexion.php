<!DOCTYPE html> 
<html> 
	<head>
		<title><?php echo $titre; ?></title>
		<!-- NR différence avec index.php conséquences ???-->
		<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset; ?>" />
		
		<!-- NR a mettre dans tous les templates pour le bon fonctionnement e bootstrap ???-->

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- NR chargement des css ???-->

<?php foreach($css as $url): ?>
		<link rel="stylesheet" type="text/css"  href="<?php echo $url; ?>" />
<?php endforeach; ?>

	</head>

	<body>
		<!-- NR a mettre dans tous les templates pour le bon fonctionnement de bootstrap ???-->
	  <div class="container" id="containerAuthentification"> <!-- definition du container du formaulaire-->
		<div id="contenu">
			<?php echo $output; ?>
		</div>
	  </div>
		
<?php foreach($js as $url): ?>
		<script type="text/javascript" src="<?php echo $url; ?>"></script> 
<?php endforeach; ?>

		<!-- NR a mettre dans tous les templates pour le bon fonctionnement e bootstrap ???-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>

</html>