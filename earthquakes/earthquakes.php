<!DOCTYPE html>
<html lang="is">
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css" media="all"/>
		<title>Earthquakes</title>
		<meta name="description" content="Upplýsingar um jarðskjálfta/Earthquake information"/>
		<meta name="keywords" content="Earthquake,Jarðskjálftar,Information,Upplýsingar,Quake,Temblor,Seism"/>
	</head>
	<body>
		<div id="wrap">
			<div class="headDiv">
				<div id="logoSide">
					<img src="../Logo.png" alt="DILogo" title="Iceland Expedition">
				</div>
				<div class="heading">
					<h1>Earthquakes</h1>
				</div>
			</div>
			<?php include('../partials/header.php');?>
			<div id="content">
				
			</div>
			<div class="eqMap">
				<p>Here you can see all the earthquakes from the last 48 hours. Click on the red dots to get more information.</p>
				<div class="clear"></div>
				<div id="map-canvas"></div>
				<div class="clear"></div>
			</div>
		</div>
		<?php include('../partials/footer.php');?>
		<script src="../js/jquery-2.0.3.min.js"></script>
		<script src="js/earth.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
	</body>
</html>
