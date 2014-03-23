<?php
	include 'php/database.php';
	$db = new Database();
?>
<!DOCTYPE html>
<html lang="is">
	<head>
		<meta charset="utf-8"/>
		<link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
		<meta name="description" content="Lýsingar á reynslu/Read experiences"/>
		<meta name="keywords" content="Experiences,Reynslur,Skráningar,Read,Lesa"/>
		<title>Descriptions</title>
	</head>
	<body>
		<div id="wrap">
			<div class="headDiv">
				<div id="logoSide">
					<img src="../Logo.png" alt="DILogo" title="Iceland Expedition">
				</div>
				<div class="heading">
					<h1>A story of a traveler</h1>
				</div>
			</div>		
			<?php include('../partials/header.php');?>
			<?php
				$id = (isset($_GET['id'])) ? $_GET['id'] : null;
				$event = $db->getEvent($id);
				
				if($event == false):
					print '<p class="error">No records found with this id.</p>';
				else:?>
					<div class="descriptions">
						<div class="descr">	
							<h3>
								<?php echo $event['title'];?>
							</h3>
						</div>
						<div class="descr">
							<p class="descrTitle">Name:</p>
							<p class="descrCont"><?php echo $event['name'];?></p>
						</div>
						<div class="descr">	
							<p class="descrTitle">Email:</p>
							<p class="descrCont"><?php echo $event['email'];?></p>
						</div>
						<div class="descr">
							<p class="descrTitle">Country:</p>
							<p class="descrCont"><?php echo $event['country'];?></p>
						</div>
						<div class="descr">
							<p class="descrTitle">Experience:</p>
							<p class="descrCont"><?php echo $event['description'];?></p>
						</div>
						<a id="button" href="../form/form.php">Back</a>
					</div>
			<?php endif;?>
		</div>
		<?php include('../partials/footer.php');?>
	</body>
</html>
