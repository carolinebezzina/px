<?php 
	//include 'includes\accountSQL.php';
	include 'includes\editUserSQL.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Users - South Coast Tyre Recycling</title>
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
					<h2>Edit User</h2>
						<table class="users">
						<form name = "fillform" id="fillform" method="POST" action="includes\editUserFormSQL.php">
						<tr>
							<td><label for="dropdown"> User List: </label></td>
							<td><select name='user'>						
								<?php
								while ($row = mysqli_fetch_array($rs)) {
									echo "<option value='" . $row['username'] . "'>" . $row['username'] . " - " . $row['first_name'] . "</option>";
								}
								?>
								</select>
							</td>
							<td><input type ="submit" id="fillform" name ="fillform" value ="Select User" size = "6"/></td>
						</tr>
						
					</form>
					
			         <form name="accounts"id="accounts" method="post" action="accountUpdate.php" accept-charset="UTF-8">
						<fieldset>
						
								<tr>
									<td><input type = "hidden" name ="submitted" id="submitted" value="1"/></td>
								</tr>
								<tr>	
									<td><label for="fname"> First Name:</label> </td>
								</tr>
								<tr>
									<td><input type = "text" name = "fName" id="Fname" value ="<?php if(!empty($_SESSION['fname'])){echo $_SESSION['fname'];} ?>"   maxlength="40" style="width: 200px;"/></td>
								</tr>
								<tr>
									<td><label for="lname"> Last Name:</label> </td>
								</tr>
								<tr>
									<td><input type = "text" name = "lName" id="lName" value ="<?php if(!empty($_SESSION['lname'])) {echo $_SESSION['lname'];} ?>"   maxlength="40" style="width: 200px;"/></td>
								</tr>
								<tr>
									<td><label for="address"> Address: </label> </td>
								</tr>
								<tr>
									<td><input type = "text" name = "address" id="address" value ="<?php if(!empty($_SESSION['address'])){echo $_SESSION['address'];} ?>" maxlength="50" style="width: 250px;"/></td>
								</tr>
								<tr>
									<td><label for="postcode"> Postcode: </label></td> 
								</tr>
								<tr>
									<td><input type = "text" name = "pcode" id="pcode" value ="<?php if(!empty($_SESSION['postcode'])) {echo $_SESSION['postcode'];} ?>" maxlength="50" style="width: 80px;"/></td>
								</tr>
								<tr>
									<td><label for="state"> State: </label> </td>
								</tr>
								<tr>
									<td><input type = "text" name = "state" id="state" value ="<?php if(!empty($_SESSION['state'])) {echo $_SESSION['state'];} ?>"maxlength="50" style="width: 200px;"/></td>
								</tr>
								<tr>
									<td><label for="cname"> Company Name: </label> </td>
								</tr>
								<tr>
									<td><input type = "text" name = "cName" id="cName" value ="<?php if(!empty($_SESSION['business'])){echo $_SESSION['business'];} ?>" maxlength="50" style="width: 200px;"/></td>
								</tr>
								<tr>
									<td><label for="email"> Email Address: </label> </td>
								</tr>
								<tr>
									<td><input type = "email" name = "eMail" id="eMail" value ="<?php if(!empty($_SESSION['email'])){echo $_SESSION['email'];} ?>"    maxlength="50" style=" width: 200px;"/></td>
								</tr>
								<tr>
									<td><p><i>Note: E-Mail is also your username!</i></p></td>
								</tr>
								<tr>
									<td><label for="phone"> Phone Number: </label> </td>
								</tr>
								<tr>
									<td><input type = "phone" name = "phone" id="phoneNum" value ="<?php if(!empty($_SESSION['phone'])){echo $_SESSION['phone'];} ?>"    maxlength="12" style="width: 200px;"/></td>
								</tr>
								<td><input type ="submit" id="submit" name ="editSubmit" value ="Submit" size = "6"/>									
						</fieldset>
					</form>
					
					<button onclick="enableEdit()">Edit Details</button> 
					</td>
					</tr>
					</table>
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
						document.getElementById("password").disabled = false;
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
						document.getElementById("password").disabled = true;
					}
					
					window.onload = disableEdit;
					
					
					var myForm = document.getElementById('accounts');

					myForm.addEventListener('submit', function(){
					return confirm('Are you sure you want to make the changes?');
					}, false);
	
					</script>
					
					</script>
										
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-0 col-sm-1 col-lg-2 sidenav"></div>
        </div>
    </div>
    <nav class="navbar navbar-footer navbar-inverse"></nav>
</body>
</html>