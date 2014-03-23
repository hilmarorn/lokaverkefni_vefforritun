<!DOCTYPE html>
<html lang="is">
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css" media="all"/>
		<link rel="stylesheet" href="../css/start/jquery-ui-1.10.3.custom.css"/>
		<script src="../js/jquery-2.0.3.min.js"></script>
		<script src="../js/jquery-ui-1.10.3.custom.js"></script>
		<title>Weather</title>
		<meta name="description" content="Upplýsingar um veður/Weather Information"/>
		<meta name="keywords" content="Weather,Veður,Information,Upplýsingar"/>
	</head>
	<body>
		<div id="wrap">
			<div class="headDiv"><div id="logoSide"><img src="../Logo.png" alt="DILogo" title="Iceland Expedition"></div>
			<div class="heading"><h1>Weather</h1></div></div>			
			<?php include('../partials/header.php');?>
			<div id="weatherSet">
				<div id="stations">
					<select id="stationNR">
						<option value="422">Akureyri</option>
						<option value="4614">Ásbyrgi</option>
						<option value="571">Egilsstaðir</option>
						<option value="36519">Gullfoss</option>
						<option value="4060">Hallormsstaður</option>
						<option value="31392">Hellisheiði</option>
						<option value="705">Höfn í Hornafirði</option>
						<option value="2642">Ísafjörður</option>
						<option value="990">Keflavíkurflugvöllur</option>
						<option value="1" selected="selected">Reykjavík</option>
						<option value="178">Stykkishólmur</option>
						<option value="6015">Vestmannaeyjar</option>
						<option value="1596">Þingvellir</option>
					</select>
				</div>
				<div id="lang">
					<div><input type="radio" name="language" value="is" id="langIS">
					<label for="langIS">Íslenska</label></div>
					<div><input type="radio" name="language" value="en" id="langEN" checked="checked">
					<label for="langEN">English</label></div>				
				</div>
			</div>
			<div id="content">
			</div>
			<div id="slider">
			</div>
		</div>
		<?php include('../partials/footer.php');?>
		<script src="js/weather.js"></script>
	</body>
</html>
