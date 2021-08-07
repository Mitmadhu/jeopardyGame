<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<style>
	.home-body{
	background-image: url('includes/images/jeopardyLogo.jpg');
	/*background-color: rgba(255, 0, 0, 0.4);*/
	opacity: 1;
	z-index: -1; 
	background-size: cover;
	background-repeat: no-repeat;
	clear: both;
    width: 100%;
    margin: 0;
    overflow: hidden;
}
</style>
<?php
	require_once 'navbar.php';
?>

<body class="home-body">
	<div class="grid-container">
		<div class="home-head-div">
			<h2 class="head-center" >Welcome <?php echo $_SESSION['name']; ?></h2>
		</div>

		<form action="./game" method="POST" onsubmit="return checkJoinInput()">
			<input type="text" name="code" id="code">
			<div class="button-group align-center">
				<button class="success button start-button large" type="submit">Join room</button>
				<button class="success button start-button large" onclick="return generateCode()">Create Code</button>
			</div>
		</form>
	</div>

</body>
</html>