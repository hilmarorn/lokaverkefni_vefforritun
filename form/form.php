<?php
	include 'php/database.php';
	$db = new Database();
?>
<!DOCTYPE html>
<html lang="is">
	<head>
		<meta charset="utf-8"/>
		<link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
		<meta name="description" content="Skráning á reynslu/Post experience"/>
		<meta name="keywords" content="Reynsla,Experience,Post,Skráning"/>
		<title>Experience</title>
	</head>
	<body>
		<div id="wrap">
			<div class="headDiv">
				<div id="logoSide">
					<img src="../Logo.png" alt="DILogo" title="Iceland Expedition">
				</div>
				<div class="heading">
					<h1>Experience</h1>
				</div>
			</div>			
			<?php include('../partials/header.php');?>
			<?php $db->addEvent();?>
			<form method="post">
				<div class="formClass">
					<div class="labelDiv">
						<label for="title">Title: </label>
					</div>
					<div class="inputDiv">
						<input type="text" id="title" name="title" value="<?php $db->getInput('title');?>">
					</div>
				</div>
				<div class="error">
					<?php if(isset($_POST['error_title'])) {
						echo $_POST['error_title'];
						};?>
				</div>
				<div class="formClass">
					<div class="labelDiv">
						<label for="name">Name: </label>
					</div>
					<div class="inputDiv">
						<input type="text" id="name" name="name" value="<?php $db->getInput('name');?>">
					</div>
				</div>
				<div class="error">
					<?php if(isset($_POST['error_name'])) {
						echo $_POST['error_name'];
						};?>
				</div>
				<div class="formClass">
					<div class="labelDiv">
						<label for="email">Email: </label>
					</div>
					<div class="inputDiv">
						<input type="text" id="email" name="email" value="<?php $db->getInput('email');?>">
					</div>
				</div>
				<div class="error">
					<?php if(isset($_POST['error_email'])) {
						echo $_POST['error_email'];
						};?>
				</div>
				<div class="formClass">
					<div class="labelDiv">
						<label for="country">Country: </label>
					</div>
					<div class="inputDiv">
						<input type="text" id="country" name="country" value="<?php $db->getInput('country');?>">
					</div>
				</div>
				<div class="error">
					<?php if(isset($_POST['error_country'])) {
						echo $_POST['error_country'];
						};?>
				</div>
				<div class="formClass">
					<div class="labelDiv">
						<label for="description">Your experience: </label>
					</div>
					<div class="inputDiv">
						<textarea id="description" name="description" value="<?php $db->getInput('description');?>"></textarea>
					</div>
				</div>
				<div class="error">
					<?php if(isset($_POST['error_description'])) {
						echo $_POST['error_description'];
						};?>
				</div>
				<input type="submit" name="submit" id="button">
				<div class="formClass" id="messPost">
						<?php if(isset($_POST['messageDone'])) {
						echo $_POST['messageDone'];
						};?>
				</div>
			</form>
			<div class="eventList">
				<p>Stories of travelers:</p>
				<?php foreach($db->getEvents() as $event): ?>
				<div id="showEvents">
					<h4>
						<a href="descriptions.php?id=<?php echo $event['id'];?>">
							<?php echo $event['title'];?>
						</a>
					</h4>
				</div>
			<?php endforeach;?></div>
		</div>
		<?php include('../partials/footer.php');?>
		<script src="../js/jquery-2.0.3.min.js"></script>
	</body>
</html>
