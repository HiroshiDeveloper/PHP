<?php
	require "signUpBtn.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Burger Vacation</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&key=AIzaSyAgOq4l4yhnnfXK4Pf0cJSXVhguDHFZtgk"></script>

<!--
 <script src="http://www.google.com/jsapi/"></script>
 -->

<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="dropdown.css">
<script src="map.js"></script>
</head>

<body onload="initialize();">

<!-- navi -->
<div class="header">
	<div class="header_content">
		<ul class="list">
			<li data-toggle="modal" data-target="#modal-signUp"><a href="#signUp">SIGN UP</a></li>
			<li>|</li>
			<li data-toggle="modal" data-target="#modal-myAccout"><a href="#">MY ACCOUNT</a></li>
			<li>|</li>
			<li><a href="#">WISHLIST</a></li>
		</ul>
		<div class="row">
			<div class="col-xs-4">
				<img src="img/logo.jpg" class="img-rounded logo" alt="BurgerVacation Logo">
			</div>
			<div class="col-xs-8 rightText">
				<!-- <br/>
				<div >
					<span class="glyphicon glyphicon-phone"><label> 604-620-1111</label></span><br/>
					<span class="glyphicon glyphicon-map-marker"><label> 609 West Hastings St., Vancouver BC</label></span>
				</div> -->
			</div>
		</div>
	</div>
</div>


<!-- Modal my account-->
<div class="modal" id="modal-myAccout" tabindex="-1">
	<div class="modal-dialog">
		<!-- modal contents -->
		<div class="modal-content">
			<!-- modal header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="modal-label">Your Account</h4>
			</div>
			<!-- modal body -->
			<div class="modal-body">
				<form class="form-horizontal" role="form">
					<!-- username -->
					<div class="form-group">
						<label class="col-sm-3 control-label">User Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" placeholder="User Name">
						</div>
					</div>
					<!-- password -->
					<div class="form-group">
						<label class="col-sm-3 control-label">Password</label>
						<div class="col-sm-9">
							<input type="password" class="form-control" placeholder="Password">
						</div>
					</div>
					<div class="rightText">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- featured products -->
<div class="component featuredProduct">
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
	<img id="humburger" src="img/hamburger.jpg" alt="BurgerVacation"><br/>
</div></br>

<!-- Footer  -->
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-7">
				<h3 id="signUp">Sign Up</h3>
				<form class="form-horizontal" role="form" action="" method="post">
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
						<div><font color="#FA1E3B"><?php echo $errorMessage ?></font></div>
						<div><font color="#1EFA51"><?php echo $successMessage ?></font></div>
				
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