<!DOCTYPE html>
<html lang="is">
	<head>
		<meta charset="utf-8">
		<link href="../css/style.css" type="text/css" rel="stylesheet" media="all"/>
		<meta name="description" content="Upplýsingar um flug/Flight information">
		<meta name="keywords" content="Flug,Flights,International,Keflavik,Airport,Flugvöllur,Information,Upplýsingar">
		<title>Flights</title>
	</head>
	<body>
		<div id="wrap">
			<div class="headDiv">
				<div id="logoSide">
					<img src="../Logo.png" alt="DILogo" title="Iceland Expedition">
				</div>
				<div class="heading">
					<h1>Flights</h1>
				</div>
			</div>		
			<?php include '../partials/header.php'; ?>
			<div id="boxRadio"><div class="radioCont">	
				<input type="radio" name="language" value="is" id="langIS">
				<label for="langIS">Íslenska</label>
				<input type="radio" name="language" value="en" id="langEN" checked>
				<label for="langEN">English</label>
			</div>
			<div class="radioCont">
				<input type="radio" name="flight-type" value="departures" id="depTime" checked>
				<label for="depTime" id="depLabel">Brottfarir</label>
				<input type="radio" name="flight-type" value="arrivals" id="arrTime">
				<label for="arrTime" id="arrLabel">Komur</label>
			</div></div>
			<div id="contentFlight">
			
			</div>
		</div>
		<?php include('../partials/footer.php');?>
		<script src="../js/jquery-2.0.3.min.js"></script>
		<script src="js/flights.js"></script>
	</body>
</html>
