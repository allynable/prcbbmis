<!DOCTYPE html>
<html lang="en">

<head>
	<title>Philippine Red Cross Blood Bank Management Information System</title>
	<link rel="icon" type="image/png" href="img/PRClogo.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>

</head>

<body>


	<div class="container-fluid header">
		<div class="row">
			<div class="col-lg-1" id="image"><img src="./img/PRClogo.png" width="90px" height="90px" /></div>

			<div class="col-lg-11" id="label">
				<p><span style="font-size:42px; letter-spacing: 1px; font-weight: bold">PHILIPPINE RED CROSS</span><br>
					&nbsp;&nbsp;<span style="font-size:18px;padding-top:0px; letter-spacing: 1px">10th LACSON STREET, BACOLOD CITY, 6100 NEGROS OCCIDENTAL</span>
					<a href="./mapout/mapout.php"><img src="./img/map.png" class="pull-right" alt="icon" width="30px" height="30px" /></a>
			</div>

		</div>
	</div>

	<div class="row" style="padding-bottom: 0px;">
		<div class="col-lg-8 text-center content">
			<br><br>
			<img src="./img/1.png" style="width: 600px" /><br />
		</div>
		<div class="col-lg-4" style="background-color: #ff3333;"><br>
			<div class="container loginContainer">
				<div class="card card-container">
					<img id="profile-img" class="profile-img-card" src="./img/give.png" />
					<p id="profile-name" class="profile-name-card"></p>
					<form class="form-signin" name="loginform" method="POST" action="./php/checklogin.php">
						<span id="reauth-email" class="reauth-email"></span>
						<input type="text" id="inputText" name="username" class="form-control" placeholder="Username" required autofocus>
						<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
						<div id="remember" class="checkbox">
							<label>
								<input type="checkbox" class="checkbox-control" value="remember-me"> Remember me
							</label>
						</div>
						<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Log in</button>
					</form><!-- /form -->
				</div><!-- /card-container -->
			</div>
			<br>
			<br>
			<br><!-- /container -->
		</div>
	</div>
	<?php
	include('footer.php');
	?>
</body>

</html>