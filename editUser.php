<?php 
	//include 'includes\accountSQL.php';
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	//include($WebsiteRoot . '/includes/validate.php');
	include ($WebsiteRoot . '/includes/editUserSQL.php');		
	$_SESSION['selfEdit'] = false;
	if(!empty($_SESSION['state'])){				
		$State = $_SESSION['state'];	

		switch ($State){						
		case "New South Wales":				
		$NSW = 'selected="selected"';					
		break;				
		case "Australian Capital Territory":					
		$ACT = 'selected="selected"';					
		break;				
		case "Queensland":					
		$QLD = 'selected="selected"';					
		break;				
		case "Northern Territory":					
		$NT = 'selected="selected"';					
		break;				
		case "Tasmania":					
		$TAS = 'selected="selected"';					
		break;				
		case "Victoria":					
		$VIC = 'selected="selected"';					
		break;				
		case "South Australia":					
		$SA = 'selected="selected"';					
		break;				
		case "Western Australia":					
		$WA = 'selected="selected"';					
		break;		
		}	
	}

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
	<script type="text/javascript">
	function enableEdit() {
		document.getElementById("First_Name-req-alpha").disabled = false;
		document.getElementById("Last_Name-req-alpha").disabled = false;
		document.getElementById("Address-req-alphachar").disabled = false;
		document.getElementById("Postcode-req-num").disabled = false;
		document.getElementById("State-req").disabled = false;
		document.getElementById("Company_Name-req-alphachar").disabled = false;
		document.getElementById("EMail-req-email").disabled = false;
		document.getElementById("Phone-req-num").disabled = false;
		document.getElementById("submit").classList.remove("hidden");
		document.getElementById("enableEdit").classList.add("hidden");
		document.getElementById("cancelEdit").classList.remove("hidden");
	}
	
	function disableEdit() {
		document.getElementById("Company_Name-req-alphachar").disabled = true;
		document.getElementById("EMail-req-email").disabled = true;
		document.getElementById("Phone-req-num").disabled = true;
		document.getElementById("First_Name-req-alpha").disabled = true;
		document.getElementById("Last_Name-req-alpha").disabled = true;
		document.getElementById("Address-req-alphachar").disabled = true;
		document.getElementById("Postcode-req-num").disabled = true;
		document.getElementById("State-req").disabled = true;
		document.getElementById("enableEdit").classList.remove("hidden");
		document.getElementById("cancelEdit").classList.add("hidden");
	}
	
	window.onload = disableEdit;
	var myForm = document.getElementById('accounts');

	myForm.addEventListener('submit', function(){
	return confirm('Are you sure you want to make the changes?');
	}, false);

	</script>
</head>
<body>
    <div class="container-fluid text-center">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-target="#loginNavbar"
                    data-toggle="collapse" type="button"><span class="icon-bar"></span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button> <a class="navbar-brand hidden-xs" href="index.php">South Coast Tyre Recycling</a><a class="navbar-brand visible-xs menu">Menu</a>
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
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="services.php">Services</a>
                        </li>
                        <li>
                            <a href="why.php">Why?</a>
                        </li>
                        <li>
                            <a href="about.php">About Us</a>
                        </li>
                        <li>
                            <a href="contact.php">Contact</a>
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
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li>
                                        <a href="services.php">Services</a>
                                    </li>
                                    <li>
                                        <a href="why.php">Why?</a>
                                    </li>
                                    <li>
                                        <a href="about.php">About Us</a>
                                    </li>
                                    <li>
                                        <a href="contact.php">Contact</a>
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
										<input type = "text" name = "First_Name-req-alpha" id="First_Name-req-alpha" value ="<?php if(!empty($_SESSION['fname'])){echo $_SESSION['fname'];} ?>"   maxlength="40"/>
										<br/><label for="First_Name-req-alpha">First Name</label> 
									</div>
									<div class="right-column">
										<input type = "text" name = "Last_Name-req-alpha" id="Last_Name-req-alpha" value ="<?php if(!empty($_SESSION['lname'])) {echo $_SESSION['lname'];} ?>"   maxlength="40"/>
										<br/><label for="Last_Name-req-alpha">Last Name</label>
									</div>
								</div>
							</li>
							<li>
								<span class = "labels">Company Name:</span>
								<div class="inputs">
									<input type = "text" name = "Company_Name-req-alphachar" id="Company_Name-req-alphachar" value ="<?php if(!empty($_SESSION['business'])){echo $_SESSION['business'];} ?>" maxlength="50"/><label for="Company_Name-req-alphachar" class="visible-xs">Company Name</label> 
								</div>
							</li>
							<li>
								<span class="labels">EMail Address:</span>
								<div class="inputs">
                                    <div class="left-column">
										<input type = "email" name = "EMail-req-email" id="EMail-req-email" value ="<?php if(!empty($_SESSION['emailTwo'])){echo $_SESSION['emailTwo'];} ?>" maxlength="50"/>
										<label for="EMail-req-email" class="visible-xs">EMail-req-email Address</label> 
									</div>
									<div class="right-column">
                                        <label>Note: EMail is also your username!</label>
                                    </div>
                                </div>
							</li>
	                        <li>
	                          	<span class="labels">Phone Number:</span>
		                        <div class="inputs">
		                        	<input type = "text" name = "Phone-req-num" id="Phone-req-num" value ="<?php if(!empty($_SESSION['phone'])){echo $_SESSION['phone'];} ?>"    maxlength="12"/>
									<label for="phone" class="visible-xs">Phone Number</label>
								</div>
							</li>
							<li>
								<span class="labels">Address:</span>
								<div class="inputs">
								    <div class="left-column">
										<input type = "text" name = "Address-req-alphachar" id="Address-req-alphachar" value ="<?php if(!empty($_SESSION['address'])){echo $_SESSION['address'];} ?>" maxlength="50"/>
										<br/><label for="address">Address</label> 
										<br/>
										<select name="State-req" id="State-req" >										
                                            <option name="selectreq" value="selectreq" >-------------Select-------------</option>	
											<option name="act" value="Australian Capital Territory" <?php echo $ACT; ?> >Australian Capital Territory</option>   
											<option name="nsw" value="New South Wales"<?php echo $NSW; ?>>New South Wales</option>    
											<option name="nt" value="Northern Territory" <?php echo $NT; ?>>Northern Territory</option>
                                            <option name="qld" value="Queensland" <?php echo $QLD; ?>>Queensland</option>              
											<option name="sa" value="South Australia" <?php echo $SA; ?>>South Australia</option>    
											<option name="tas" value="Tasmania" <?php echo $TAS; ?>>Tasmania</option>                
											<option name="vic" value="Victoria" <?php echo $VIC; ?>>Victoria</option>                 
											<option name="wa" value="Western Australia" <?php echo $WA; ?>>Western Australia</option>
                                		</select>
                                		<br/><label for="State-req">State</label> 
                                	</div>
								<div class="right-column">
								
									<input type = "text" name = "Suburb-req-alpha" id="suburb" value ="<?php echo $suburb; ?>" maxlength="50"/>

									<br/><label for="address">Suburb</label>

									<br/>
									<input type = "text" name = "Postcode-req-num" id="Postcode-req-num" value ="<?php if(!empty($_SESSION['postcode'])) {echo $_SESSION['postcode'];} ?>" maxlength="50"/>
									<br/><label for="postcode">Postcode</label> 
								</div>
							</li>
							<li>
								<input type ="submit" id="submit" class="hidden" name ="editSubmit" value ="Submit" size = "6"/>
							</li>						
						</ul>			
					</form>
					<button id="enableEdit" onclick="enableEdit()">Edit Details</button>
                    <button id="cancelEdit" class="hidden" type="reset" onclick="window.location.reload()">Cancel Edit</button> 
						
					
                </div>
            </div>
            <div class="col-xs-0 col-sm-1 col-lg-2 sidenav"></div>
        </div>
    </div>
    <nav class="navbar navbar-footer navbar-inverse"></nav>
</body>
</html>