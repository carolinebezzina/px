<?php

	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];	
	include($WebsiteRoot . '/includes/validate.php');	
	include($WebsiteRoot . '/includes/newUser.php');		
	if(isset($_POST['submit'])){				
		 $state = $_POST['State-req'];				
		 switch ($state){				
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
    <title>Registration - South Coast Tyre Recycling</title>
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
	function checkPass()
		{
			var password = document.getElementById('password');
			var checkPassword = document.getElementById('confirm_password');
			var message = document.getElementById('confirmMessage');
		
			var correct = "#66cc66";
			var error = "#ff6666";
			
			if(password.value == checkPassword.value){
			
				checkPassword.style.backgroundColor = correct;
				message.style.color = correct;
				message.innerHTML = "Passwords Do Not Match";
				document.getElementById("submit").disabled = false;
				
			}else{
			
				checkPassword.style.backgroundColor = error;
				message.style.color = error;
				message.innerHTML = "Passwords Do Not Match!";
				document.getElementById("submit").disabled = true;
			}
		}
		

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
                        <li>
                            <a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                        </li>
                        <li class="active">
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
                    <a class="left carousel-control" data-slide="prev" href="#myCarousel" role="button"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span> <span class="sr-only">Previous</span></a> <a class="right carousel-control" data-slide="next" href= "#myCarousel" role="button"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span> <span class=                   "sr-only">Next</span></a>
                </div>
                <div class="mainContent">
					<h1> Customer Registration</h1>
			        <form name="registration" id="registration" onSubmit="" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  accept-charset="UTF-8">
						
						<input type = "hidden" name ="submitted" id="submitted" value="1"/>
								
						<ul class = "registration">
							<li>
                                <span class = "labels">Full Name:</span>
                                <div class="inputs">
                                    <div class="left-column">
                                        <input class="form-control" type="text" name="First_Name-req-alpha" id="First_Name-req-alpha"value="<?php if(isset($_POST['First_Name-req-alpha'])) echo htmlentities($_POST['First_Name-req-alpha']);?>"  maxlength="40"/><span class="required"></span>
                                        <label>First Name</label>
                                    </div>
                                    <div class="right-column">
                                        <input class="form-control" type="text" name="Last_Name-req-alpha" id="lName" value="<?php if(isset($_POST['Last_Name-req-alpha'])) echo htmlentities($_POST['Last_Name-req-alpha']);?>" maxlength="40"/><span class="required"></span>
                                        <label>Last Name</label>
                                    </div>
                                </div>
                            </li>
							<li>
                                <span class = "labels">Company Name:</span>
                                <div class="inputs"><input class="form-control" type="text" name="Company_Name-req-alphanum" id="cName" maxlength="50" value="<?php if(isset($_POST['Company_Name-req-alphanum'])) echo htmlentities($_POST['Company_Name-req-alphanum']);?>"/><span class="required"></span><label class="visible-xs">Company Name</label></div>
                            </li>
							<li>
                                <span class="labels">Email Address:</span>
                                <div class="inputs">
                                    <div class="left-column">
                                        <input class="form-control" type="email" name="Email-req-email" id="eMail" maxlength="50" value="<?php if(isset($_POST['Email-req-email'])) echo htmlentities($_POST['Email-req-email']);?>" /><span class="required"></span><label class="visible-xs">Email Address</label>
                                    </div>
                                    <div class="right-column">
                                        <label>Note: Email is also your username!</label></div>
                                    </div>
                            </li>
							<li>
                                <span class="labels">Phone Number:</span>
                                <div class="inputs"><input class="form-control" type="text" name="Phone-req-num" id="phone" maxlength="12" value="<?php if(isset($_POST['Phone-req-num'])) echo htmlentities($_POST['Phone-req-num']);?>"/><span class="required"></span><label class = "visible-xs">Phone Number</label></div>
                            </li>
							<li>						
                                <span class="labels">Address:</span>
                                <div class="inputs">
                                    <div class="left-column">
                                        <input class="form-control" type="text" name="Address-req-alphanum" id="address"  value="<?php if(isset($_POST['Address-req-alphanum'])) echo htmlentities($_POST['Address-req-alphanum']);?>" maxlength="80"/><span class="required"></span>
                                        <label>Address</label>
                                        <br/>
                                        <select class="form-control" name="State-req" id="State-req" >
                                            <option name="select" value="selectreq" >---Select---</option>
                                            <option name="act" value="Australian Capital Territory" <?php echo $ACT; ?> >ACT</option>
                                            <option name="nsw" value="New South Wales"<?php echo $NSW; ?>>NSW</option>
                                            <option name="nt" value="Northern Territory" <?php echo $NT; ?>>NT</option>
                                            <option name="qld" value="Queensland" <?php echo $QLD; ?>>QLD</option>
                                            <option name="sa" value="South Australia" <?php echo $SA; ?>>SA</option>
                                            <option name="tas" value="Tasmania" <?php echo $TAS; ?>>TAS</option>
                                            <option name="vic" value="Victoria" <?php echo $VIC; ?>>VIC</option>
                                            <option name="wa" value="Western Australia" <?php echo $WA; ?>>WA</option>
                                        </select>
                                        <span class="required"></span>
                                        <br/><label>State</label>
                                    </div>
                                    <div class="right-column">
										<input class="form-control" type="text" name="Suburb-req-alpha" id="suburb" maxlength="50" value="<?php if(isset($_POST['Suburb-req-alpha'])) echo htmlentities($_POST['Suburb-req-alpha']);?>" /><span class="required"></span>
                                        <label>Suburb</label>
										<br/>							
                                        <input class="form-control" type="text" name="Postcode-req-num" id="pcode" maxlength="50" value="<?php if(isset($_POST['Postcode-req-num'])) echo htmlentities($_POST['Postcode-req-num']);?>" /><span class="required"></span>
                                        <label>Postcode</label>
                                    </div>
                                </div>
                            </li>
							<li>
                                <span class="labels">Password:</span>
    							<div class="inputs">
                                    <div class="right-column">
                                        <input class="form-control" type="password" name="Password-req" id="password" onkeyup="checkPass(); return false" maxlength="18"/><span class="required"><?php if(isset($reqPassword)){echo htmlentities($reqPassword); }?></span>
                                        <label>Password</label>
        							</div>
                                    <div class="left-column">
                                        <input class="form-control" type="password" name="Confirm_Password-req" id="confirm_password" onkeyup="checkPass(); return false" maxlength="18"/><span class="required"><?php if(isset($reqConfirm) || isset($match)){echo htmlentities($reqConfirm) . htmlentities($match);  }?></span>
                                        <label>Confirm Password</label>
										<br/>
									    <span id="confirmMessage" class="confirmMessage"></span>
                                    </div>
                                </div>
                            </li>
							<li>
								<span class="labels">Options :</span>
								
								<div class="inputs">
								
									<div class="left-column">
									
									<input class="btn btn-primary" type ="submit" name ="submit" id="submit" value ="Submit" size = "6"/>
										
									</div>
									<div class="right-column">
									
									<input class="btn btn-primary" type="reset" value="Reset" size ="6"/>
									
									</div>
								</div>
							
							</li>
							<li>
                               
                                
                            </li>
						</ul>				
					</form>
					<?php 
					errorMsg($messages);
					?>
					<script type="text/javascript">
							var frmvalidator = new Validator("registration");
							
							frmvalidator.addValidation("First_Name-req-alpha", "req", "Please enter your First Name!");
							frmvalidator.addValidation("First_Name-req-alpha", "alpha", "First Name can only contain letters!");
							
							frmvalidator.addValidation("Last_Name-req-alpha", "req", "Please enter your Last Name!");
							frmvalidator.addValidation("Last_Name-req-alpha", "alpha", "Last Name can only contain letters!");
							
							frmvalidator.addValidation("Company_Name-req-alphanum", "req", "Please enter your Company Name!");
							frmvalidator.addValidation("Company_Name-req-alphanum", "alnum_s", "Company Name can only contain letters, numbers and spaces!");
							
							frmvalidator.addValidation("Email-req-email", "req", "Please enter your E-Mail!");
							frmvalidator.addValidation("Email-req-email", "email", "Please enter your E-Mail!");
							
							frmvalidator.addValidation("Phone-req-num", "req", "Please enter your Phone Number!");
							frmvalidator.addValidation("Phone-req-num", "num", "Phone Number can only contain numbers!");
							
							frmvalidator.addValidation("State-req", "dontselect=selectreq", "Please select a state!");
							
							frmvalidator.addValidation("Address-req-alphanum", "req", "Please enter your Address!");
							frmvalidator.addValidation("Address-req-alphanum", "alnum_s", "Address can only contain letters, numbers and spaces!");
							
							frmvalidator.addValidation("Suburb-req-alpha", "req", "Please enter your Suburb!");
							frmvalidator.addValidation("Suburb-req-alpha", "alpha_s", "Suburb can only contain letters and spaces!");
							
							frmvalidator.addValidation("Postcode-req-num", "req", "Please enter your Postcode!");
							frmvalidator.addValidation("Postcode-req-num", "num", "Postcode can only contain numbers!");
							
							frmvalidator.addValidation("Password-req", "req", "Please enter your Password!");

							frmvalidator.addValidation("Confirm_Password-req", "req", "Please confirm your password!");
							
					</script>
					

                </div>
            </div>
            <div class="col-xs-0 col-sm-1 col-lg-2 sidenav"></div>
        </div>
    </div>
    
</body>
</html>