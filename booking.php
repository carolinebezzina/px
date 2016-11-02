<?php 

session_start();
	
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	
	require_once($WebsiteRoot. '/includes/noCache.php');
	include($WebsiteRoot . '/includes/validate.php');
	require_once($WebsiteRoot . '/includes/loggedIn.php');
	include($WebsiteRoot . '/newBooking.php');
	

	
		if (($_SESSION["customer"] == false ) && ($_SESSION["user"] == false ) && ($_SESSION["admin"] == false ))

    {

        header("Location: http://www.southcoasttyrerecycling.com.au");

        exit;

    }
	
	if(isset($_POST['submit']))
	{				
		 $state = $_POST['State-req'];				
		 switch ($state)
		 {				
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
				
		$type = $_POST['type-req'];
		switch($type)
		{
			case "Truck Tyres":
			$truck = 'selected="selected"';
			break;
			case "Tractor Tyres":
			$tractor = 'selected="selected"';
			break;
			case "Motorbike Tyres":
			$motorbike = 'selected="selected"';
			break;
			case "Car Tyres":
			$car = 'selected="selected"';
			break;
		}
	}

	function userButtons(){
		
		if(isset($_SESSION['admin'])){
			
			echo '
			<form action = "listBooking.php">
			<button type = "submit" class="btn btn-primary" name ="">List All Bookings</button>
			</form>
			<br/>';
			
		}
					
		
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bookings - South Coast Tyre Recycling</title>
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

                        <li>

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

                        <li class='active'>

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
                <div class="mainContent" >
					<h1>Bookings</h1>
			         <form name ="bookings" id="bookings" onSubmit="" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" accept-charset="UTF-8">
						<ul class = "booking">
							<li>
								<span class="labels">Company Name:</span>
								<div class="inputs">
									<input class="form-control"type="text" name="companyName-req-alphanum" id="companyName-req-alphanum" value="<?php if(isset ($_POST['companyName-req-alphanum'])) {echo htmlentities( $_POST['companyName-req-alphanum']);} ?>" maxlength="100" />
									<label class="visible-xs" for="contactName">Company Name</label> 
									<input type="hidden" name="submitted" id="submitted" value="1"/>
								</div>
							</li>
							<li>
								<span class = "labels">Address:</span>
								<div class="inputs">
									<div class="left-column">
										<input class="form-control" type="text" name="address-req-alphanum" id="address-req-alphanum" value="<?php if(isset ($_POST['address-req-alphanum'])) {echo htmlentities( $_POST['address-req-alphanum']);} ?>" maxlength="80" /> 
										<label for="address">Address</label>
																	
									     <select class="form-control" name="State-req" id="State-req" value = "<?php if(isset ($_POST['State-req'])) {echo htmlentities( $_POST['State-req']);} ?>">
                                            <option name="select" value="selectreq" >------------Select------------</option>
                                            <option name="act" value="ACT"  >ACT</option>
                                            <option name="nsw" value="NSW">NSW</option>
                                            <option name="nt" value="NT" >NT</option>
                                            <option name="qld" value="QLD" >QLD</option>
                                            <option name="sa" value="SA" >SA</option>
                                            <option name="tas" value="TAS" >TAS</option>
                                            <option name="vic" value="VIC" >VIC</option>
                                            <option name="wa" value="WA" >WA</option>
                                        </select>
										<label for="state">State</label> 
									</div>
									
									<div class="right-column">
										<input class="form-control"type="text"name="Suburb-req-alpha" id="suburb-req-alpha" maxlength="60" value="<?php if(isset ($_POST['Suburb-req-alpha'])) {echo htmlentities( $_POST['Suburb-req-alpha']);} ?>"  />
										<label for="suburb">Suburb</label> 
										<input class="form-control"type="text" name="postcode-req-num" id="postcode-req-num"  value="<?php if(isset ($_POST['postcode-req-num'])) {echo htmlentities( $_POST['postcode-req-num']);} ?>" maxlength="4"  /> 
										<label for="postcode">Postcode</label>
									</div>
								</div>
							</li>
							<li>
								<span class="labels">Email Address:</span>
								<div class="inputs">
									<input class="form-control"type="email" name="Email-req-email" id="Email-req-email" value="<?php if(isset ($_POST['Email-req-email'])) {echo htmlentities( $_POST['Email-req-email']);} ?>"  maxlength="45" />
									<label class="visible-xs" for="email">Email Address</label> 
								</div>
							</li>
							<li>
								<span class="labels">Contact Name:</span>
								<div class="inputs">
									<input class="form-control"type="text" name="contactName-req-alpha" id="contactName-req-alpha" value="<?php if(isset ($_POST['contactName-req-alpha'])) {echo htmlentities( $_POST['contactName-req-alpha']);} ?>" maxlength="45" />
									<label class="visible-xs" for="contactName">Contact Name</label> 
								</div>
							</li>
							<li>
								<span class="labels">Contact Number:</span>
								<div class="inputs">
									<input class="form-control"type="text" name="phone-req-num" id="phone-req-num" value="<?php if(isset ($_POST['phone-req-num'])) {echo htmlentities( $_POST['phone-req-num']);} ?>" maxlength="12" />
									<label class="visible-xs" for="phone">Contact Number</label>
								</div>	
							</li>
							<li>
								<span class="labels">Tyres:</span>
								<div class="inputs">
									<div class="left-column">
										<select class="form-control"  name="type-req" id = "type-req" value="<?php if(isset ($_POST['type-req'])) {echo htmlentities( $_POST['type-req']);} ?>">
										<option name="selectOne" value="selectreq" >------------Select------------</option>
										<option name="truck" value="Truck Tyres"  >Truck Tyres</option>
										<option name="tractor" value="Tractor Tyres"  >Tractor Tyres</option>
										<option name="motorbike" value="Motorbike Tyres"  >Motorbike Tyres</option>
										<option name="car" value="Car Tyres"  >Car Tyres</option>
										</select>
										<label for="type">Type</label> 
									</div>
									<div class="right-column">
										<input class="form-control"type="text" name="quantity-req-num" id="quantity-req-num" value="<?php if(isset ($_POST['quantity-req-num'])) {echo htmlentities( $_POST['quantity-req-num']);} ?>" maxlength="3"/>
										<label for="tyreQuantity">Quantity</label> 
									</div>
								</div>
							</li>
							<li>
								<span class="labels">Preferred Pick-Up Date:</span>
								<div class="inputs">
									<input class="form-control"type = "date" name = "readydate-req" id="readydate-req" value="<?php if(isset ($_POST['readydate-req'])) {echo htmlentities( $_POST['readydate-req']);} ?>"/>
									<label class="visible-xs" for="readydate">Preferred Pick-Up Date</label> 
								</div>
							</li>
							<li>
								<span class="labels">Options:</span>
								<div class="inputs">
									<div class="left-column buttons">
										<button type="reset" class="btn btn-primary">Reset</button>
									</div>
									<div class="right-column buttons">									
										<button class="btn btn-primary" type ="submit" name ="submit">Submit</button>
									</div>
								</div>
								
							</li>		
						</ul>
					</form>
					<?php 
					if(isset($messages)){
						foreach($messages as $key => $value){
							echo '<font color="red">' . $value . '</font>';
							echo '</br>';
								
						}
					}
					
					?>
						<ul class = "booking">
							<li>
							<span class="labels">View Bookings:</span>
								<div class="inputs">
									<div class="left-column bookingBtn">
										<?php
											userButtons();							
										?>
									</div>
									<div class="right-column bookingBtn">
										<form action = "viewBooking.php">
										<button type = "submit" class="btn btn-primary" name ="">View My Bookings</button>
										</form>
									</div>
								</div>					
							</li> 
						</ul>
					</div>
                <div class="col-xs-1 col-md-2 sidenav"></div>
            </div>
					
			
        </div>
	</div>

	<script type="text/javascript">
	var frmvalidator = new Validator("bookings");
	//validate company name
	frmvalidator.addValidation("companyName-req-alphanum", "req", "Please enter your company Name");
	//validate address
	frmvalidator.addValidation("address-req-alphanum", "req", "Please enter your address");
	//validate postcode
	frmvalidator.addValidation("postcode-req-num", "req", "Please enter your postcode");
	frmvalidator.addValidation("postcode-req-num", "maxlen=4", "Required length is 4");
	frmvalidator.addValidation("postcode-req-num", "numeric", "Please enter a number");
	//validate state
	frmvalidator.addValidation("State-req","dontselect=Select One","Please select a state");
	//validate suburb
	frmvalidator.addValidation("Suburb-req-alpha", "req", "Please enter your suburb");
	//validate email
	frmvalidator.addValidation("Email-req-emai", "req", "Please enter an email");
	frmvalidator.addValidation("Email-req-emai", "email", "Incorrect form of email - example@example.example");
	//validate contact name
	frmvalidator.addValidation("contactName-req-alpha", "req", "Please enter a person to contact");
	//validate contact number
	frmvalidator.addValidation("phone-req-num", "req", "Please enter a contact number");
	frmvalidator.addValidation("phone-req-num", "numeric", "Incorrect characters within in phone number");
	//validate type of tyres	
	frmvalidator.addValidation("type-req","dontselect=Select One","Please select a type of tyre");
	//validate quantity
	frmvalidator.addValidation("quantity-req-num","req", "Please enter the amount of tyres");
	frmvalidator.addValidation("quantity-req-num","numeric", "Tyre Quantity must be a number");
	//validate pick up date
	frmvalidator.addValidation("readydate-req","req","Please enter your preferred date");
	</script>
	

    <footer></footer>  	
</body>
</html>