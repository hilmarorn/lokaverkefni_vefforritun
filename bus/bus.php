<!DOCTYPE html>
<html lang="is">
	<head>
		<meta charset="utf-8"/>
		<link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
		<meta name="description" content="Strætó upplýsingar/Bus information"/>
		<meta name="keywords" content="Bus, Strætó, Strætisvagn, Upplýsingar, Info, Information"/>
		<title>Bus routes</title>
	</head>
	<body>
		<div id="wrap">
			<div class="headDiv">
				<div id="logoSide">
					<img src="../Logo.png" alt="DILogo" title="Iceland Expedition">
				</div>
				<div class="heading">
					<h1>Bus routes</h1>
				</div>
			</div>
			<?php include('../partials/header.php');?>
			<div class="busCont">
				<div id="selectBus">
					<select id="busSelect">
						<option value="" disabled="disabled" selected="selected">- Choose a route -</option>
						<option value="1">Route 1</option>
						<option value="2">Route 2</option>
						<option value="3">Route 3</option>
						<option value="4">Route 4</option>
						<option value="5">Route 5</option>
						<option value="6">Route 6</option>
						<option value="11">Route 11</option>
						<option value="12">Route 12</option>
						<option value="13">Route 13</option>
						<option value="14">Route 14</option>
						<option value="15">Route 15</option>
						<option value="18">Route 18</option>
						<option value="19">Route 19</option>
						<option value="24">Route 24</option>
						<option value="28">Route 28</option>
						<option value="35">Route 35</option>
						<option value="43">Route 43</option>
						<option value="44">Route 44</option>
						<option value="51">Route 52</option>
						<option value="52">Route 52</option>
						<option value="56">Route 56</option>
						<option value="57">Route 57</option>
						<option value="58">Route 58</option>
						<option value="72">Route 72</option>
						<option value="78">Route 78</option>
						<option value="79">Route 79</option>
					</select>
				</div>
				<div id="content">
			
				</div>
			</div>
			<div class="busMap">
				<div class="clear"></div>
				<div id="map-canvas"></div>
				<div class="clear"></div>
			</div>
			
		</div>
		<?php include('../partials/footer.php');?>
		<script src="../js/jquery-2.0.3.min.js"></script>
		<script src="js/busInfo.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
	</body>
</html>
