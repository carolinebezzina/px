<!DOCTYPE html>
<html lang="en">
<head>
    <title>Booking - South Coast Tyre Recycling</title>
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
                            <a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
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
                    <a class="left carousel-control" data-slide="prev" href="#myCarousel" role="button"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span> <span class="sr-only">Previous</span></a> <a class="right carousel-control" data-slide="next" href= "#myCarousel" role="button"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span> <span class=                   "sr-only">Next</span></a>
                </div>
                <div class="mainContent">
					<h2>Booking</h2>
			         <form name ="bookings" id="bookings" onSubmit="" method="post" action="newBooking.php" accept-charset="UTF-8">
						<ul class = "booking">
							<li>
								<span class="labels">Company Name:</span>
								<div class="inputs">
									<input type="text" name="companyName" id="companyName" value ="" maxlength="80" />
									<label class="visible-xs" for="contactName">Company Name</label> 
									<input type="hidden" name="submitted" id="submitted" value="1"/>
							</li>
							<li>
								<span class = "labels">Address:</span>
								<div class="inputs">
									<div class="left-column">
										<input type="text" name="address" id="address" value ="" maxlength="50" /> 
										<br/><label for="address">Address</label>
										<br/><input type="text" name="postcode" id="postcode" value ="" maxlength="4" /> 
										<br/><label for="postcode">Postcode</label>
									</div>
									<div class="right-column">
										<input type="text" name="state" id="state" value ="" maxlength="10" />
										<br/><label for="state">State</label> 
									</div>
								</div>
							</li>
							<li>
								<span class="labels">Email Address:</span>
								<div class="inputs">
									<input type="email" name="email" id="eMail" value ="" maxlength="50" />
									<label class="visible-xs" for="email">Email Address</label> 
								</div>
							</li>
							<li>
								<span class="labels">Contact Name:</span>
								<div class="inputs">
									<input type="text" name="contactName" id="contactName" value ="" maxlength="50" />
									<label class="visible-xs" for="contactName">Contact Name</label> 
								</div>
							</li>
							<li>
								<span class="labels">Contact Number:</span>
								<div class="inputs">
									<input type="text" name="phone" id="contactNumber" value ="" maxlength="12" />
									<label class="visible-xs" for="phone">Contact Number</label>
								</div>	
							</li>
							<li>
								<span class="labels">Tyres:</span>
								<div class="inputs">
									<div class="left-column">
										<select id = "type">
										<option name="selectOne" value="Select One" >--------Select--------</option>
										<option name="truck" value="Truck Tyres" >Truck Tyres</option>
										<option name="tractor" value="Tractor Tyres" >Tractor Tyres</option>
										<option name="motorbike" value="Motorbike Tyres" >Motorbike Tyres</option>
										<option name="car" value="car Tyres">Car Tyres</option>
										</select>
										<br/><label for="type">Type</label> 
									</div>
									<div class="right-column">
										<input type="text" name="tyreQuantity" id="quantity" value ="" maxlength="50"/>
										<br/><label for="tyreQuantity">Quantity</label> 
									</div>
								</div>
							</li>
							<li>
								<span class="labels">Preferred Pick-Up Date:</span>
								<div class="inputs">
									<input type = "date" name = "date" id="readydate" />
									<label class="visible-xs" for="readydate">Preferred Pick-Up Date</label> 
								</div>
							</li>
							<li>
								<input type ="submit" name ="editSubmit" value ="Submit" />	
								<input type="reset" value="Reset" size />	 
							</li>		
						</ul>
					</form>		
                </div>
                <div class="col-xs-1 col-md-2 sidenav"></div>
            </div>
        </div>
	</div>
	<nav class="navbar navbar-footer navbar-inverse">
	</nav>
	
	
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
	frmvalidator.addValidation("state", "req", "Please enter a state");
	//validate email
	frmvalidator.addValidation("eMail", "req", "Please enter an email");
	frmvalidator.addValidation("eMail", "email", "Incorrect form of email - example@example.example");
	//validate contact name
	frmvalidator.addValidation("contactName", "req", "Please enter a person to contact");
	//validate contact number
	frmvalidator.addValidation("contactNumber", "req", "Please enter a contact number");
	frmvalidator.addValidation("contactNumber", "numeric", "Incorrect characters within in phone number");
	//validate type of tyres	
	frmvalidator.addValidation("type","dontselect=Select One","Please select a type of tyre");
	//validate quantity
	frmvalidator.addValidation("quantity","req", "Please enter the amount of tyres");
	frmvalidator.addValidation("quantity","numeric", "Tyre Quantity must be a number");
	//validate pick up date
	frmvalidator.addValidation("readydate","req","Please enter your preferred date");
	

	</script>
	
	
	
</body>
</html>