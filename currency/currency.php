<!DOCTYPE html>
<html lang="is">
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css" media="all"/>
		<title>Currency</title>
		<meta name="description" content="Upplýsingar um gjaldmiðla/Currency Information"/>
		<meta name="keywords" content="Currency,Gjaldmiðlar,Myntbreytir,Converter"/>
		<meta name="author" content="Jón Þór Kristjánsson & Hilmar Örn Hergeirsson"/>
	</head>
	<body>
		<div id="wrap">
			<div class="headDiv"><div id="logoSide"><img src="../Logo.png" alt="DILogo" title="Iceland Expedition"></div>
			<div class="heading"><h1>Currency</h1></div></div>
			<?php include('../partials/header.php');?>
			<div id="content">
				<div class="curr" id="headCurr">
					<label for="Info">Enter amount in the fields below and convert your currency.</label>
				</div>
				<div class="curr">
					<div class="currLabel">
						<label for="ISK">ISK</label>
						<img src="../Flags/iceland.png" alt="Icelandic Flag" title="Icelandic Krona">
					</div>
					<input type="text" id="ISK">
				</div>
				<div class="curr">	
					<div class="currLabel">
						<label for="EUR">EUR</label>
						<img src="../Flags/euro.png" alt="EU Flag" title="Euro">
					</div>
					<input type="text" id="EUR">
				</div>
				<div class="curr">
					<div class="currLabel">
						<label for="USD">USD</label>
						<img src="../Flags/usa.png" alt="USA Flag" title="US Dollar">
					</div>
					<input type="text" id="USD">
				</div>
				<div class="curr">
					<div class="currLabel">
						<label for="GBP">GBP</label>
						<img src="../Flags/uk.png" alt="UK Flag" title="GB Pound">
					</div>
					<input type="text" id="GBP">
				</div>
				<div class="curr">				
					<div class="currLabel">			
						<label for="JPY">JPY</label>
						<img src="../Flags/japan.png" alt="Japan Flag" title="Japanese Yen">
					</div>
					<input type="text" id="JPY">
				</div>
				<div class="curr">				
					<div class="currLabel">
						<label for="DKK">DKK</label>
						<img src="../Flags/denmark.png" alt="Danish Flag" title="Danish Krona">
					</div>
					<input type="text" id="DKK">
				</div>
				<div class="curr">
					<div class="currLabel">
						<label for="SEK">SEK</label>
						<img src="../Flags/sweden.png" alt="Swedish Flag" title="Swedish Krona">
					</div>
					<input type="text" id="SEK">
				</div>
				<div class="curr">
					<div class="currLabel">
						<label for="NOK">NOK</label>
						<img src="../Flags/norway.png" alt="Norwegian Flag" title="Norwegian Krona">
					</div>
					<input type="text" id="NOK">
				</div>
				<div class="curr">
					<div class="currLabel">
						<label for="CHF">CHF</label>
						<img src="../Flags/swiss.png" alt="Swiss Flag" title="Swiss Franc">
					</div>
					<input type="text" id="CHF">
				</div>
				<div id="hidden">
					<div class="curr">
						<div class="currLabel">
							<label for="CAD">CAD</label>
							<img src="../Flags/canada.png" alt="Canadian Flag" title="Canadian Dollar">
						</div>
						<input type="text" id="CAD">
					</div>
					<div class="curr">
						<div class="currLabel">
							<label for="AUD">AUD</label>
							<img src="../Flags/australia.png" alt="Australian Flag" title="Australian Dollar">
						</div>
						<input type="text" id="AUD">	
					</div>
					<div class="curr">
						<div class="currLabel">
							<label for="ZAR">ZAR</label>
							<img src="../Flags/southafrica.png" alt="South African Flag" title="South African Rand">
						</div>
						<input type="text" id="ZAR">	
					</div>
					<div class="curr">
						<div class="currLabel">
							<label for="HKD">HKD</label>
							<img src="../Flags/hongkong.png" alt="Hong Kong Flag" title="Hong Kong Dollar">
						</div>
						<input type="text" id="HKD">	
					</div>
					<div class="curr">
						<div class="currLabel">
							<label for="NZD">NZD</label>
							<img src="../Flags/newzealand.png" alt="new Zealand Flag" title="New Zealand Dollar">
						</div>
						<input type="text" id="NZD">	
					</div>
					<div class="curr">
						<div class="currLabel">
							<label for="PLN">PLN</label>
							<img src="../Flags/poland.png" alt="Polish Flag" title="Polish Zloty">
						</div>
						<input type="text" id="PLN">	
					</div>
					<div class="curr">
						<div class="currLabel">
							<label for="SGD">SGD</label>
							<img src="../Flags/singapore.png" alt="Singapore Flag" title="Singapore Dollar">
						</div>
						<input type="text" id="SGD">	
					</div>
					<div class="curr">
						<div class="currLabel">
							<label for="CNY">CNY</label>
							<img src="../Flags/china.png" alt="Chinese Flag" title="Chinese Yuan">
						</div>
						<input type="text" id="CNY">	
					</div>
					<div class="curr">
						<div id="currMore">
							<label for="More" id="less">See less</label>
						</div>
					</div>
				</div>
				<div class="curr">
					<div id="currMore">
						<label for="More" id="more">See more</label>
					</div>
				</div>
			</div>
		</div>
		<?php include('../partials/footer.php');?>
		<script src="../js/jquery-2.0.3.min.js"></script>
		<script src="js/currency.js"></script>
	</body>
</html>
