<?php
	require "myAccountBtn.php";
	//require "signUpBtn.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Burger Vacation</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&key=AIzaSyAgOq4l4yhnnfXK4Pf0cJSXVhguDHFZtgk"></script>

<!--
 <script src="http://www.google.com/jsapi/"></script>
 -->

<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="dropdown.css">
<link rel="stylesheet" href="animate.css">
<script src="map.js"></script>
<script src="main.js"></script>
</head>

<body onload="initialize();">

<!-- navi -->
<div class="header">
	<div class="header_content">
		<ul class="list">
			<li><a href="#signUp">SIGN UP</a></li>
			<li>|</li>
			<li onclick="display(0)"><a href="#">MY ACCOUNT</a></li>
		</ul><br/>
		<div class="row">
			<div class="col-xs-4">
				<img src="img/logo.png" class="img-rounded logo" alt="BurgerVacation Logo">
			</div>
			<div class="col-xs-8 rightText">
			</div>
		</div>
		<div class="row aniview" av-animation="fadeInDown" id="account">
			<div class="col-xs-5">
				<span class="glyphicon glyphicon-remove-circle right" id="removeIcon" onclick="display(1)"></span>
				<form class="form-horizontal" role="form" action="" method="post">
					<div class="form-group">
						<!-- username -->
						<input type="text" class="form-control" placeholder="User Name" name="userName">
						<!-- password -->
						<input type="password" class="form-control" placeholder="Password" name="password">
					</div>
					<?php echo $errorAccountMsg ?>
					<div class="rightText">
						<button type="submit" id="myAccountBtn" name="myAccountBtn" class="btn btn-primary">Submit</button><br/>
						<button type="button" class="btn btn-default">Send your password?</button>
					</div>
				</form>
			</div>
			<div class="col-xs-7">
			</div>
		</div>
	</div>
</div>

<!-- featured products -->
<div class="featuredProduct">
	<!-- <div class="container fp_margin"> -->
	<table class="table fp_table">
		<tbody>
			<tr>
				<td style="width:330px">
					<img src="img/fp_burger1.png" id="show1" class="fadeout">
					<img src="img/fp_burger2.png" id="show2" class="fadein">
				</td>
				<td>
					<h2><i id="fp_burgerName"></i></h2>
					<p><i id="fp_burgerExp"></i></p>
				</td>
			</tr>
		</tbody>			
	</table>		
</div>

<!-- main -->
<div class="left">
	<ul id="flip" class="dropmenu">
		<li><a href="#">Burgers</a>
			<ul>
			    <li><a href="#">Cheese</a></li>
			    <li><a href="#">Double</a></li>
			    <li><a href="#">Teriyaki</a></li>
			    <li><a href="#">Vage</a></li>
		    </ul>
		</li>
		<li><a href="#">Fries</a>
			<ul>
			    <li><a href="#">Poutine</a></li>
			    <li><a href="#">Onion</a></li>
			    <li><a href="#">Normal</a></li>
		    </ul>
		</li>
		<li><a href="#">Drink</a>
			<ul>
			    <li><a href="#">Coke</a></li>
			    <li><a href="#">Coffee</a></li>
			    <li><a href="#">Orange</a></li>
			    <li><a href="#">Milk</a></li>
		    </ul>
		</li>
		<li><a href="#">Salad</a>
			<ul>
			    <li><a href="#">Avocado</a></li>
			    <li><a href="#">Seafood</a></li>
		    </ul>
		</li>
	</ul>
</div>

<div class="rightText display">
	<img id="lettuce" src="img/lettuce.jpg" alt="Lettuce"> 
	<img id="humburger" src="img/hamburger.jpg" alt="BurgerVacation"><br/>
</div></br>

<!-- Footer  -->
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-7">
				<h3 id="signUp">Sign Up</h3>
				<form id="signUpForm" class="form-horizontal" role="form" action="" method="post">
					<div class="form-group formInput">
						<div class="row">
							<div class="col-xs-6">
								<!-- username -->
								<span class="glyphicon glyphicon-user"><label>User Name</label></span>
								<input type="text" name="userName" class="form-control" placeholder="User Name" value="<?= $userName; ?>">
							</div>
							<div class="col-xs-6">
								<!-- Phone Number -->
								<span class="glyphicon glyphicon-phone"><label>Phone Number</label></span>
								<input type="tel" name="phoneNumber" class="form-control" placeholder="e.g.)604842****" value="<?= $phoneNumber; ?>">
							</div>
						</div><br/>
						<div class="row">
							<div class="col-xs-6">
								<!-- username -->
								<span class="glyphicon glyphicon-envelope"><label>Email</label></span>
								<input type="email" name="email" class="form-control" placeholder="e.g.)sample@gmial.com" value="<?= $email; ?>">
							</div>
						<div class="col-xs-6">
							<!-- password -->
							<span class="glyphicon glyphicon-lock"><label>Password</label></span>
							<input type="password" name="password" class="form-control" placeholder="Password" value="<?= $password; ?>">
						</div>
					</div>
				</div>
				<!--
				<div><font color="#FA1E3B"><?php echo $errorMessage ?></font></div>
				<div><font color="#1EFA51"><?php echo $successMessage ?></font></div>
				-->
				<div><font id="signUpMessage"></font></div>
				<div class="rightText">
					<button type="submit" id="signUpBtn" name="signUpBtn" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
		<div class="col-sm-5">
			<h3>Location</h3>
			<div class="centerText">
				<div id="map_canvas"></div>
			</div>
			<span class="glyphicon glyphicon-phone"><label> 604-620-1111</label></span></br>
			<span class="glyphicon glyphicon-map-marker"><label> 609 WestHastings St, Vancouver BC</label></span></br>
		</div>
		</div>
	</div>
</div>

<!-- featured product animation -->
<script src="featuredProducts.js"></script>
</body>
</html>
