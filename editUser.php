<?php 
	//include 'includes\accountSQL.php';
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	//include($WebsiteRoot . '/includes/validate.php');
	include ($WebsiteRoot . '/includes/editUserSQL.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit User - South Coast Tyre Recycling</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Galdeano" rel="stylesheet">
</head>
<body>
    <div class="container-fluid text-center">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-target="#loginNavbar"
                    data-toggle="collapse" type="button"><span class="icon-bar"></span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button> <a class="navbar-brand hidden-xs" href="index.html">South Coast Tyre Recycling</a><a class="navbar-brand visible-xs menu">Menu</a>
                </div>
                <div class="collapse navbar-collapse" id="loginNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                        </li>
                        <li>
                            <a href="registration.php"><span class="glyphicon glyphicon-user"></span> Register</a>
                        </li>
                    </ul>
                    <hr class="visible-xs">
                    <ul class="nav navbar-nav visible-xs">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a href="services.html">Services</a>
                        </li>
                        <li>
                            <a href="why.html">Why?</a>
                        </li>
                        <li>
                            <a href="about.html">About Us</a>
                        </li>
                        <li>
                            <a href="contact.html">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row content">
            <div class="col-xs-0 col-sm-1 col-lg-2 sidenav"></div>
            <div class="col-xs-12 col-sm-10 col-lg-8 text-left">
                <header>
                    <div class="navContainer">
                        <nav class="navbar navbar-default">
                            <div class="hidden-xs" id="mainNavbar">
                                <ul class="nav nav-tabs navbar-right">
                                    <li>
                                        <a href="index.html">Home</a>
                                    </li>
                                    <li>
                                        <a href="services.html">Services</a>
                                    </li>
                                    <li>
                                        <a href="why.html">Why?</a>
                                    </li>
                                    <li>
                                        <a href="about.html">About Us</a>
                                    </li>
                                    <li>
                                        <a href="contact.html">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </header>
                <div class="carousel slide" data-ride="carousel" id="myCarousel">
                    <ol class="carousel-indicators">
                        <li class="active" data-slide-to="0" data-target="#myCarousel"></li>
                        <li data-slide-to="1" data-target="#myCarousel"></li>
                        <li data-slide-to="2" data-target="#myCarousel"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active"><img alt="Image1" src="img/01.jpg"></div>
                        <div class="item"><img alt="Image2" src="img/02.jpg"></div>
                        <div class="item"><img alt="Image3" src="img/03.jpg"></div>
                    </div>
                    <a class="left carousel-control" data-slide="prev" href="#myCarousel" role="button"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span> <span class="sr-only">Previous</span></a> <a class="right carousel-control" data-slide="next" href= "#myCarousel" role="button"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span> <span class= "sr-only">Next</span></a>
                </div>
                <div class="mainContent">
					<h1>Edit User</h1>
					<form name = "fillform" id="fillform" method="POST" action="includes\editUserFormSQL.php">
						<label for="dropdown"> User List: </label>
						<select name='user'>						
							<?php
								
							while ($row = mysqli_fetch_array($rs)) {
								echo "<option value='" . $row['email'] . "'>" . $row['email'] . "</option>";
							}
							?>
						</select>
							
						<input type ="submit" id="fillform" name ="fillform" value ="Select User" size = "6"/>				
					</form>
					
			        <form name="accounts"id="accounts" method="post" action="includes\accountUpdate.php" accept-charset="UTF-8">
						<ul class="users">
							<li>
								<input type = "hidden" name ="submitted" id="submitted" value="1"/>	
								<span class = "labels">Full Name:</span>
 								<div class="inputs">
                                    <div class="left-column">
										<input type = "text" name = "fName" id="Fname" value ="<?php if(!empty($_SESSION['fname'])){echo $_SESSION['fname'];} ?>"   maxlength="40"/>
										<br/><label for="fname">First Name</label> 
									</div>
									<div class="right-column">
										<input type = "text" name = "lName" id="lName" value ="<?php if(!empty($_SESSION['lname'])) {echo $_SESSION['lname'];} ?>"   maxlength="40"/>]
										<br/><label for="lname">Last Name</label>
									</div>
								</div>
							</li>
							<li>
								<span class = "labels">Company Name:</span>
								<div class="inputs">
									<input type = "text" name = "cName" id="cName" value ="<?php if(!empty($_SESSION['business'])){echo $_SESSION['business'];} ?>" maxlength="50"/><label for="cname" class="visible-xs">Company Name</label> 
								</div>
							</li>
							<li>
								<span class="labels">Email Address:</span>
								<div class="inputs">
                                    <div class="left-column">
										<input type = "email" name = "eMail" id="eMail" value ="<?php if(!empty($_SESSION['email'])){echo $_SESSION['email'];} ?>" maxlength="50"/>
										<label for="email" class="visible-xs">Email Address</label> 
									</div>
									<div class="right-column">
                                        <label>Note: Email is also your username!</label>
                                    </div>
                                </div>
							</li>
	                        <li>
	                          	<span class="labels">Phone Number:</span>
		                        <div class="inputs">
		                        	<input type = "phone" name = "phone" id="phoneNum" value ="<?php if(!empty($_SESSION['phone'])){echo $_SESSION['phone'];} ?>"    maxlength="12"/>
									<label for="phone" class="visible-xs">Phone Number</label>
								</div>
							</li>
							<li>
								<span class="labels">Address:</span>
								<div class="inputs">
								    <div class="left-column">
										<input type = "text" name = "address" id="address" value ="<?php if(!empty($_SESSION['address'])){echo $_SESSION['address'];} ?>" maxlength="50"/>
										<br/><label for="address">Address</label> 
										<br/>
										<select name="state" id="state" value ="<?php if(!empty($_SESSION['state'])) {echo $_SESSION['state'];} ?>">
                                            <option name="select" value="Select One" >-------------Select-------------</option>
                                            <option name="act">Australian Capital Territory</option>
                                            <option name="nsw">New South Wales</option>
                                            <option name="nt">Northern Territory</option>
                                            <option name="qld">Queensland</option>
                                            <option name="sa">South Australia</option>
                                            <option name="tas">Tasmania</option>
                                            <option name="vic">Victoria</option>
                                            <option name="wa">Western Australia</option>
                                		</select>
                                		<br/><label for="state">State</label> 
                                	</div>
								<div class="right-column">
									<input type = "text" name = "pcode" id="pcode" value ="<?php if(!empty($_SESSION['postcode'])) {echo $_SESSION['postcode'];} ?>" maxlength="50"/>
									<br/><label for="postcode">Postcode</label> 
								</div>
							</li>
							<li>
								<input type ="submit" id="submit" class="hidden" name ="editSubmit" value ="Submit" size = "6"/>
							</li>						
						</ul>			
					</form>
					<button id="enableEdit" onclick="enableEdit()">Edit Details</button>
                    <button id="cancelEdit" class="hidden" onclick="disableEdit()">Cancel Edit</button> 

					<script type="text/javascript">
					function enableEdit() {
						document.getElementById("Fname").disabled = false;
						document.getElementById("lName").disabled = false;
						document.getElementById("address").disabled = false;
						document.getElementById("pcode").disabled = false;
						document.getElementById("state").disabled = false;
						document.getElementById("cName").disabled = false;
						document.getElementById("eMail").disabled = false;
						document.getElementById("phoneNum").disabled = false;
						// document.getElementById("password").disabled = false;
						document.getElementById("submit").classList.remove("hidden");
                        document.getElementById("enableEdit").classList.add("hidden");
                        document.getElementById("cancelEdit").classList.remove("hidden");
					}
					
					function disableEdit() {
						document.getElementById("Fname").disabled = true;
						document.getElementById("lName").disabled = true;
						document.getElementById("address").disabled = true;
						document.getElementById("pcode").disabled = true;
						document.getElementById("state").disabled = true;
						document.getElementById("cName").disabled = true;
						document.getElementById("eMail").disabled = true;
						document.getElementById("phoneNum").disabled = true;
						// document.getElementById("password").disabled = true;
						document.getElementById("enableEdit").classList.remove("hidden");
                        document.getElementById("cancelEdit").classList.add("hidden");
					}
					
					window.onload = disableEdit;
					
					
					var myForm = document.getElementById('accounts');

					myForm.addEventListener('submit', function(){
					return confirm('Are you sure you want to make the changes?');
					}, false);
	
					</script>
                </div>
            </div>
            <div class="col-xs-0 col-sm-1 col-lg-2 sidenav"></div>
        </div>
    </div>
    <nav class="navbar navbar-footer navbar-inverse"></nav>
</body>
</html>