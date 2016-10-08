<?php
	include('validate.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home - South Coast Tyre Recycling</title>
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
                    <span class="icon-bar"></span></button> <a class="navbar-brand hidden-xs" href="index.html">South Coast Tyre Recycling</a>
                </div>
                <div class="collapse navbar-collapse" id="loginNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                        </li>
                        <li class = "active">
                            <a href="register.html"><span class="glyphicon glyphicon-user"></span> Register</a>
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
                                    <li class="active">
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
                        <div class="item active"><img alt="Image1" src="img/home/02.jpg"></div>
                        <div class="item"><img alt="Image2" src="img/home/01.jpg"></div>
                        <div class="item"><img alt="Image3" src="img/home/03.jpg"></div>
                    </div>
                    <a class="left carousel-control" data-slide="prev" href="#myCarousel" role="button"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span> <span class="sr-only">Previous</span></a> <a class="right carousel-control" data-slide="next" href=   "#myCarousel" role="button"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span> <span class=                   "sr-only">Next</span></a>
                </div>
                <div class="mainContent">
					<h1> Customer Registration</h1>
					<?php 
					if(isset($messages)){
						foreach($messages as $key => $value){
							echo '<font color="red">' . $value . '</font>';
							echo '</br>';
						}
					}
					?>
			        <form name="registration" id="registration" onSubmit="" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  accept-charset="UTF-8">
						
						<input type = "hidden" name ="submitted" id="submitted" value="1"/>
								
						<ul class = "registration">
							<span class = "table-row"></span>
							<li class = "labels">Full Name:</li>
							<li class="inputs"><input type = "text" name = "First_Name-req-alpha" id="First_Name-req-alpha" maxlength="40"/><span class="required"><?php if(isset($reqfirst)){echo htmlentities($reqfirst); }?></span><label>First Name</label></li>
							<li class="inputs"><input type = "text" name = "Last_Name-req-alpha" id="lName" maxlength="40"/><span class="required"><?php if(isset($reqLast)){echo htmlentities($reqLast); }?></span><label>Last Name</label></li>
							<span class = "table-row"></span>
							<li class = "labels">Company Name:</li>
							<li class="inputs"><input type = "text" name = "Company_Name-req-alphachar" id="cName" maxlength="50"/><span class="required"><?php if(isset($reqCompany)){echo htmlentities($reqCompany); }?></span><label class = "hidden">Company Name</label></li>
							<span class = "table-row"></span>
							<li class = "labels">Email Address:</li>
							<li class="inputs"><input type = "email" name = "Email-req-email" id="eMail" maxlength="50"/><span class="required"><?php if(isset($reqEmail)){echo htmlentities($reqEmail); }?></span><label class = "hidden">Email Address</label>
							</li>
							<li class="inputs"><label>Note: E-Mail is also your username!</label></li>
							<span class = "table-row"></span>
							<li class = "labels">Phone Number:</li>
							<li class="inputs"><input type = "text" name = "Phone-req-num" id="phone" maxlength="12/><span class="required"><?php if(isset($reqPhone)){echo htmlentities($reqPhone); }?></span><label class = "hidden">Phone Number</label></li>
							<span class = "table-row"></span>
							<li class = "labels">Address:</li>
							<li class="inputs"><input type = "text" name = "Address-req-alphachar" id="address" value="<?php  ?>" maxlength="80"/><span class="required"><?php if(isset($reqAddress)){echo htmlentities($reqAddress); }?></span><label >Address</label></li>
							<span class = "table-row"></span>
							<li class="mobile-hide"></li>
							<li class="inputs"><input type = "text" name = "State-req-alpha" id="state" maxlength="50"/><span class="required"><?php if(isset($reqState)){echo htmlentities($reqState); }?></span><label>State</label></li>
							<li class="inputs"><input type = "text" name = "Postcode-req-num" id="pcode" maxlength="50"/><span class="required"><?php if(isset($reqPostcode)){echo htmlentities($reqPostcode); }?></span><label>Postcode</label></li>
							<span class = "table-row"></span>
							<li class = "labels">Password:</li>
							<li class="inputs"><input type = "password" name = "Password-req" id="password" maxlength="18"/><span class="required"><?php if(isset($reqPassword)){echo htmlentities($reqPassword); }?></span><label>Password</label></li>
							<li class="inputs"><input type = "password" name = "Confirm_Password-req" id="confirm_password" maxlength="18"/><span class="required"><?php if(isset($reqConfirm) || isset($match)){echo htmlentities($reqConfirm) . htmlentities($match);  }?></span><label>Confirm Password</label></li>
							<span class = "table-row"></span>
							<li class="inputs"><input type ="submit" name ="submit" value ="Submit" size = "6"/></li>
							<li class="inputs"><input type="reset" value="Reset" size ="6"/></li>
						</ul>				
					</form>	
                </div>
            </div>
            <div class="col-xs-0 col-sm-1 col-lg-2 sidenav"></div>
        </div>
    </div>
    <nav class="navbar navbar-footer navbar-inverse"></nav>
</body>
</html>