<?php 

session_start();
	
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	
	require_once($WebsiteRoot. '/includes/noCache.php');
	include($WebsiteRoot . '/includes/validate.php');
	require_once($WebsiteRoot . '/includes/loggedIn.php');
	
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
			<input type = "submit" class="btn btn-primary" name ="" value ="List All Bookings" />
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
    <link href="style.css" rel="stylesheet">
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
									<input type="text" name="companyName-req-alphanum" id="companyName-req-alphanum" value="" maxlength="80" />
									<label class="visible-xs" for="contactName">Company Name</label> 
									<input type="hidden" name="submitted" id="submitted" value="1"/>
							</li>
							<li>
								<span class = "labels">Address:</span>
								<div class="inputs">
									<div class="left-column">
										<input type="text" name="address-req-alphanum" id="address-req-alphanum" value="" maxlength="50" /> 
										<br/><label for="address">Address</label><br/>
																	
									     <select name="State-req" id="State-req" >
                                            <option name="select" value="selectreq" >-------------Select-------------</option>
                                            <option name="act" value="Australian Capital Territory"  >Australian Capital Territory</option>
                                            <option name="nsw" value="New South Wales">New South Wales</option>
                                            <option name="nt" value="Northern Territory" >Northern Territory</option>
                                            <option name="qld" value="Queensland" >Queensland</option>
                                            <option name="sa" value="South Australia" >South Australia</option>
                                            <option name="tas" value="Tasmania" >Tasmania</option>
                                            <option name="vic" value="Victoria" >Victoria</option>
                                            <option name="wa" value="Western Australia" >Western Australia</option>
                                        </select>
										<br/><label for="state">State</label> 
									</div>
									
									<div class="right-column">
										<input type="text"name="Suburb-req-alpha" id="suburb-req-alpha" maxlength="50" value="" maxlength="10" />
										<br/><label for="suburb">Suburb</label> 
										<br/><input type="text" name="postcode-req-num" id="postcode-req-num"  value="" maxlength="4" size ="12" /> 
										<br/><label for="postcode">Postcode</label>
									</div>
								</div>
							</li>
							<li>
								<span class="labels">Email Address:</span>
								<div class="inputs">
									<input type="email" name="Email-req-email" id="Email-req-email" value=""  maxlength="50" />
									<label class="visible-xs" for="email">Email Address</label> 
								</div>
							</li>
							<li>
								<span class="labels">Contact Name:</span>
								<div class="inputs">
									<input type="text" name="contactName-req-alpha" id="contactName-req-alpha" value="" maxlength="50" />
									<label class="visible-xs" for="contactName">Contact Name</label> 
								</div>
							</li>
							<li>
								<span class="labels">Contact Number:</span>
								<div class="inputs">
									<input type="text" name="phone-req-num" id="phone-req-num" value="" maxlength="12" />
									<label class="visible-xs" for="phone">Contact Number</label>
								</div>	
							</li>
							<li>
								<span class="labels">Tyres:</span>
								<div class="inputs">
									<div class="left-column">
										<select name="type-req" id = "type-req">
										<option name="selectOne" value="selectreq" >--------Select--------</option>
										<option name="truck" value="Truck Tyres"  >Truck Tyres</option>
										<option name="tractor" value="Tractor Tyres"  >Tractor Tyres</option>
										<option name="motorbike" value="Motorbike Tyres"  >Motorbike Tyres</option>
										<option name="car" value="Car Tyres"  >Car Tyres</option>
										</select>
										<br/><label for="type">Type</label> 
									</div>
									<div class="right-column">
										<input type="text" name="quantity-req-num" id="quantity-req-num" value="" maxlength="50"/>
										<br/><label for="tyreQuantity">Quantity</label> 
									</div>
								</div>
							</li>
							<li>
								<span class="labels">Preferred Pick-Up Date:</span>
								<div class="inputs">
									<input type = "date" name = "readydate-req" id="readydate-req" value=""/>
									<label class="visible-xs" for="readydate">Preferred Pick-Up Date</label> 
								</div>
							</li>
							<li>
								<input class="btn btn-primary" type ="submit" name ="submit" value ="Submit" />	
								<input type="reset" class="btn btn-primary" value="Reset" size />	 
							</li>		
						</ul>
					</form>
					<?php 
					if(isset($messages)){
						foreach($messages as $key => $value){
							echo '<font color="red">' . $value . '</font>';
							echo '</br>';
						}
					}else
						{
							header ("Location: viewBooking.php");
						}
					?>
					
					<form action = "viewBooking.php">
					<input type = "submit" class="btn btn-primary" name ="" value ="View My Bookings" />
					</form>
					
					<br/>
					
					<?php
						
						userButtons();
						
					?>
					
                </div>
                <div class="col-xs-1 col-md-2 sidenav"></div>
            </div>
					
			
        </div>
	</div>

	<script type="text/javascript">
	var frmvalidator = new Validator("bookings");
	//validate company name
	frmvalidator.addValidation("companyName", "req", "Please enter your company Name");
	//validate address
	frmvalidator.addValidation("address", "req", "Please enter your address");
	//validate postcode
	frmvalidator.addValidation("postcode", "req", "Please enter your postcode");
	frmvalidator.addValidation("postcode", "maxlen=4", "Required length is 4");
	frmvalidator.addValidation("postcode", "numeric", "Please enter a number");
	//validate state
	frmvalidator.addValidation("state","dontselect=Select One","Please select a state");
	//validate suburb
	frmvalidator.addValidation("suburb", "req", "Please enter your suburb");
	//validate email
	frmvalidator.addValidation("email", "req", "Please enter an email");
	frmvalidator.addValidation("email", "email", "Incorrect form of email - example@example.example");
	//validate contact name
	frmvalidator.addValidation("contactName", "req", "Please enter a person to contact");
	//validate contact number
	frmvalidator.addValidation("phone", "req", "Please enter a contact number");
	frmvalidator.addValidation("phone", "numeric", "Incorrect characters within in phone number");
	//validate type of tyres	
	frmvalidator.addValidation("type","dontselect=Select One","Please select a type of tyre");
	//validate quantity
	frmvalidator.addValidation("quantity","req", "Please enter the amount of tyres");
	frmvalidator.addValidation("quantity","numeric", "Tyre Quantity must be a number");
	//validate pick up date
	frmvalidator.addValidation("readydate","req","Please enter your preferred date");
	</script>
	
	<?php 
	$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
	include_once($WebsiteRoot . '/newBooking.php');
	?>
    <footer></footer>  	
</body>
</html>