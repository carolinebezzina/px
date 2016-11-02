<?php 

	session_start();
	//include 'includes\accountSQL.php';
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	require_once($WebsiteRoot . '/includes/loggedIn.php');
	require_once($WebsiteRoot . '/includes/checkAdmin.php');
	include($WebsiteRoot . '/includes/validate.php');
	include ($WebsiteRoot . '/includes/editUserSQL.php');	
	include ($WebsiteRoot . '/includes/accountUpdate.php');		
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
    <link href="style.css?version=51" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Galdeano" rel="stylesheet">
	<script src="gen_validatorv4.js" type="text/javascript"></script>
	<script type="text/javascript">
	function enableEdit() {			
		document.getElementById("emergencyName").disabled = false;
		document.getElementById("emergencyPhone").disabled = false;				
		document.getElementById("First_Name-req-alpha").disabled = false;
		document.getElementById("Last_Name-req-alpha").disabled = false;
		document.getElementById("Address-req-alphanum").disabled = false;
		document.getElementById("Postcode-req-num").disabled = false;
		document.getElementById("State-req").disabled = false;
		document.getElementById("Company_Name-req-alphanum").disabled = false;
		document.getElementById("EMail-req-email").disabled = false;
		document.getElementById("Phone-req-num").disabled = false;
		document.getElementById("newusertype").disabled = false;	
		document.getElementById("Suburb-req-alpha").disabled = false;
		document.getElementById("submit").classList.remove("hidden");
		document.getElementById("enableForm").classList.add("hidden");
		document.getElementById("cancelEdit").classList.remove("hidden");
		document.getElementById("delete").classList.remove("hidden");
	}
	
	function disableEdit() {
				
		document.getElementById("emergencyName").disabled = true;
		document.getElementById("emergencyPhone").disabled = true;
		document.getElementById("Company_Name-req-alphanum").disabled = true;
		document.getElementById("EMail-req-email").disabled = true;
		document.getElementById("Phone-req-num").disabled = true;
		document.getElementById("First_Name-req-alpha").disabled = true;
		document.getElementById("Last_Name-req-alpha").disabled = true;
		document.getElementById("Address-req-alphanum").disabled = true;
		document.getElementById("Postcode-req-num").disabled = true;
		document.getElementById("newusertype").disabled = true;
		document.getElementById("Suburb-req-alpha").disabled = true;
		document.getElementById("State-req").disabled = true;
		document.getElementById("enableForm").classList.remove("hidden");
		document.getElementById("cancelEdit").classList.add("hidden");
		document.getElementById("delete").classList.add("hidden");
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
                    <span class="icon-bar"></span></button> <a class="navbar-brand hidden-xs hidden-sm" href="index.php">South Coast Tyre Recycling</a><a class="navbar-brand visible-xs menu">Menu</a>
                </div>
                <div class="collapse navbar-collapse" id="loginNavbar">
                    <ul class="nav navbar-nav navbar-right">

                    <!-- If not logged in -->

                    <?php if ($_SESSION["customer"] == false && $_SESSION["user"] == false && $_SESSION["admin"] == false) {echo "

                        <li>

                            <a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a>

                        </li>

                        <li>

                            <a href='registration.php'><span class='glyphicon glyphicon-user'></span> Register</a>

                        </li>

                    ";}?>

                    <!-- If logged in as customer -->

                    <?php if ($_SESSION["customer"] == true) {echo "



                    ";}?>

                    <!-- If logged in as admin -->

                    <?php if ($_SESSION["admin"] == true) {echo "

                        <li class='active'>

                            <a href='editUser.php'>Edit Users</a>

                        </li>

                        <li>

                            <a href='editPage.php'>Edit Pages</a>

                        </li>

                    ";}?>

                    <!-- If logged in as employee or admin -->

                    <?php if ($_SESSION["user"] == true || $_SESSION["admin"] == true) {echo "

                        <li>

                            <a href='jobSheet.php'>Job Sheets</a>

                        </li>

                    ";}?>

                    <!-- If logged in -->

                    <?php if ($_SESSION["customer"] == true || $_SESSION["user"] == true || $_SESSION["admin"] == true) {echo "

                        <li>

                            <a href='booking.php'>Bookings</a>

                        </li>

                        <li>

                            <a href='accounts.php'><span class='glyphicon glyphicon-user'></span> Account</a>

                        </li>

                        <li>

                            <a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a>

                        </li>

                    ";}?>

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
             
                <div class="mainContent">
					<h1>Edit User</h1>
					<form name = "fillform" id="fillform" method="POST" action="includes\editUserFormSQL.php">
					<ul class="users">
							<li>
								<span class = "labels">User List:</span> 
								<div class="inputs">								
									<div class="left-column">
										<select class="form-control" name='user' size="5">						
											<?php
												
											while ($row = mysqli_fetch_array($rs)) {
												echo "<option value='" . $row['email'] . "'>" . $row['email'] . "</option>";
											}
											?>
										</select>
									</div>	
									<div class="right-column selectUserBtn">
										<button class="btn btn-primary" type ="submit" id="fillform" name ="fillform" size = "6">Select User</button>
									</div>
									
								</div>				
							</li>
					</ul>						
					</form>
			        <form name="accounts"id="accounts" method="post" onsubmit="return confirm('Are you sure you want to make these changes?');" action="" accept-charset="UTF-8">
						<ul class="users">
							<li>
								<span class = "labels">Selected User:</span> 
								<div class="inputs">								
									<div class="left-column">
										<input class="form-control" type = "text" name = "selected" id="selected" value ="<?php if(!empty($_SESSION['selected'])){echo $_SESSION['selected'];} ?>"  readonly maxlength="64"/>								
									</div>						
									
								</div>				
							</li>
							<hr />
							<li>
								<input type = "hidden" name ="submitted" id="submitted" value="1"/>	
								<span class = "labels">Full Name:</span>
 								<div class="inputs">
                                    <div class="left-column">
										<input class="form-control" type = "text" name = "First_Name-req-alpha" id="First_Name-req-alpha" value ="<?php if(!empty($_SESSION['fname'])){echo $_SESSION['fname'];} ?>"   maxlength="45"/>
										<label for="First_Name-req-alpha">First Name</label> 
									</div>
									<div class="right-column">
										<input class="form-control" type = "text" name = "Last_Name-req-alpha" id="Last_Name-req-alpha" value ="<?php if(!empty($_SESSION['lname'])) {echo $_SESSION['lname'];} ?>"   maxlength="45"/>
										<label for="Last_Name-req-alpha">Last Name</label>
									</div>
								</div>
							</li>
							<li>
								<span class = "labels">Company Name:</span>
								<div class="inputs">
									<input class="form-control" type = "text" name = "Company_Name-req-alphanum" id="Company_Name-req-alphanum" value ="<?php if(!empty($_SESSION['business'])){echo $_SESSION['business'];} ?>" maxlength="100"/><label for="Company_Name-req-alphachar" class="visible-xs">Company Name</label> 
								</div>
							</li>
							<li>
								<span class="labels">Email Address:</span>
								<div class="inputs">
                                    <div class="left-column">
										<input class="form-control" type = "email" name = "EMail-req-email" id="EMail-req-email" value ="<?php if(!empty($_SESSION['emailTwo'])){echo $_SESSION['emailTwo'];} ?>" maxlength="64"/>
										<label for="EMail-req-email" class="visible-xs">Email Address</label> 
									</div>
									<div class="right-column">
                                        <label>Note: Email is also your username!</label>
                                    </div>
                                </div>
							</li>
	                        <li>
	                          	<span class="labels">Phone Number:</span>
		                        <div class="inputs">
		                        	<input class="form-control" type = "text" name = "Phone-req-num" id="Phone-req-num" value ="<?php if(!empty($_SESSION['phone'])){echo $_SESSION['phone'];} ?>"    maxlength="12"/>
									<label for="phone" class="visible-xs">Phone Number</label>
								</div>
							</li>
							<li>
								<span class="labels">Address:</span>
								<div class="inputs">
								    <div class="left-column">
										<input class="form-control" type = "text" name = "Address-req-alphanum" id="Address-req-alphanum" value ="<?php if(!empty($_SESSION['address'])){echo $_SESSION['address'];} ?>" maxlength="80"/>
										<label for="address">Address</label> 
										
										<select class="form-control" name="State-req" id="State-req">										
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
                                		<label for="State-req">State</label> 
                                	</div>
								<div class="right-column">
								
									<input class="form-control" type = "text" name = "Suburb-req-alpha" id="Suburb-req-alpha" value ="<?php if(!empty($_SESSION['suburb'])) {echo $_SESSION['suburb'];} ?>" maxlength="60"/>

									<label for="address">Suburb</label>

									<input class="form-control" type = "text" name = "Postcode-req-num" id="Postcode-req-num" value ="<?php if(!empty($_SESSION['postcode'])) {echo $_SESSION['postcode'];} ?>" maxlength="4"/>
									<label for="postcode">Postcode</label> 
								</div>
							</li>
							<li>
								<span class="labels">Emergency Contact:</span>
								
								<div class="inputs">
								
									<div class="left-column">

											<input class="form-control" type = "text" name = "Emergency_Contact_Name-alpha" id="emergencyName" value ="<?php if(!empty($_SESSION['emName'])) {echo $_SESSION['emName'];} ?>" maxlength="45"/>

											<label for="address">Full Name</label>

										
									</div>
									<div class="right-column">
										
											<input class="form-control" type = "text" name = "Emergency_Phone-num" id="emergencyPhone" value ="<?php if(!empty($_SESSION['emPhone'])) {echo $_SESSION['emPhone'];} ?>" maxlength="12"/>

											<label for="address">Phone Number</label>

									</div>
								</div>
							
							</li>	
							<li>
								<span class="labels">User Type:</span>
								
								<div class="inputs">
								
									<div class="left-column">

											<input class="form-control" type = "text" name = "User_Type-req" id="emergencyName" value ="<?php if(!empty($_SESSION['userType'])) {echo $_SESSION['userType'];} ?>" maxlength="45" readonly />

											<label for="address">Current User Type</label>

										
									</div>
									<div class="right-column">
										
											<select class="form-control" name = "newusertype" id = "newusertype">
												<option value = "4" selected> --No Change--</option>
												<option value = "2"> Customer</option>
												<option value = "1"> Employee</option>
												<option value = "0"> Administrator</option>
											</select>
										

											<label for="address">Change to:</label>
									</div>
								</div>
							
							</li>
							<li>
								<span class="labels">Options :</span>
								
								<div class="inputs">
								
									<div class="left-column buttons">
									<button type="button" id="enableForm" class="btn btn-primary" onclick="enableEdit()">Edit Details</button>
										<button type="button" id="cancelEdit" class="hidden btn btn-primary" type="reset" onclick="window.location.reload()">Cancel Edit</button>									
									</div>
									<div class="right-column buttons">
										<button type ="submit" id="submit" class="hidden btn btn-primary" name ="submit" size = "6">Submit</button>
									</div>
									<button type ="submit" id="delete" class="btn btn-danger" class="hidden" name="delete">DELETE USER</button>
								</div>
							
							</li>
						</ul>	
					</form>
					
					<?php 
						errorMsg($messages);
					?>
					
					<script type="text/javascript">
						var frmvalidator = new Validator("accounts");
						
						frmvalidator.addValidation("First_Name-req-alpha", "req", "Please enter your First Name!");
						frmvalidator.addValidation("First_Name-req-alpha", "alpha", "First Name can only contain letters!");
						
						frmvalidator.addValidation("Last_Name-req-alpha", "req", "Please enter your Last Name!");
						frmvalidator.addValidation("Last_Name-req-alpha", "alpha", "Last Name can only contain letters!");
						
						frmvalidator.addValidation("Company_Name-req-alphanum", "req", "Please enter your Company Name!");
						frmvalidator.addValidation("Company_Name-req-alphanum", "alnum_s", "Company Name can only contain letters, numbers and spaces!");
						
						frmvalidator.addValidation("EMail-req-email", "req", "Please enter your E-Mail!");
						frmvalidator.addValidation("EMail-req-email", "email", "Please enter your E-Mail!");
						
						frmvalidator.addValidation("Phone-req-num", "req", "Please enter your Phone Number!");
						frmvalidator.addValidation("Phone-req-num", "num", "Phone Number can only contain numbers!");
						
						frmvalidator.addValidation("State-req", "dontselect=selectreq", "Please select a state!");
						
						frmvalidator.addValidation("Address-req-alphanum", "req", "Please enter your Address!");
						frmvalidator.addValidation("Address-req-alphanum", "alnum_s", "Address can only contain letters, numbers and spaces!");
						
						frmvalidator.addValidation("Suburb-req-alpha", "req", "Please enter your Suburb!");
						frmvalidator.addValidation("Suburb-req-alpha", "alpha_s", "Suburb can only contain letters and spaces!");
						
						frmvalidator.addValidation("Postcode-req-num", "req", "Please enter your Postcode!");
						frmvalidator.addValidation("Postcode-req-num", "num", "Postcode can only contain numbers!");					
	
							
					</script>
					
                </div>
            </div>
            <div class="col-xs-0 col-sm-1 col-lg-2 sidenav"></div>
        </div>
    </div>
    <footer></footer>  
</body>
</html>