<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
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
                        <li class="active">
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
                <div class="mainContent">				<input type="hidden" name="foo" value="<?php if(isset($email)){echo $email;}?>" />
				<input type="hidden" name="foo" value="<?php if(isset($token)){echo $token;}?>" />
                    <h1 class="login">Reset Password</h1>
					
				    <?php
					
					session_start();
					
					if(!isset($_SESSION['reset'])){
						$_SESSION['reset'] = false;
					}	
					if(empty($_SESSION['email'])){
						$_SESSION['email'] = $_GET['email'];
					}
					
					if(isset($_GET['token']) || isset($_SESSION['reset'])){
						
						$token = $_GET['token'];
						$email = $_GET['email'];
						
						$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];
						require_once($WebsiteRoot . '/includes/dataConnect.php');
						
						$sql = "SELECT email, token FROM reset_password WHERE email = '$email' AND date_created >= now() - INTERVAL 1 DAY";
						$rs = mysqli_query($conn, $sql);
									
						if(mysqli_num_rows($rs) == 1 || isset($_SESSION['reset'])){
							
							$row = mysqli_fetch_row($rs);	
							$checkToken = $row[1];
							
							if(password_verify($token, $row[1]) || isset($_SESSION['reset'])){
								$_SESSION['reset'] = true;
					?>					
						<ul class="loginForm">    						<form id="form1" onsubmit ="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					 								<li class = "labels">Enter New Password:</li>

								<li class="inputs"><input type = "password" name = "Password-req" id="password" maxlength="18" /><label>Password</label></li>

								<li class="inputs"><input type = "password" name = "Confirm_Password-req" id="confirm_password" maxlength="18"/><label>Confirm Password</label></li>
							<span class = "table-row"></span>   
							<li class = "loginButton" ><button type="submit" name="submit" value="Send">Send</button></li>						</form>
						</ul>					<?php
							}	
						}else{
					?>
					<ul class="loginForm">    
						<li class = "labels">Invalid Token!</li>
                    </ul>
					<?php
						}
					
					}
									$WebsiteRoot = $_SERVER['DOCUMENT_ROOT'];						include($WebsiteRoot . '/includes/validate.php');						include($WebsiteRoot . '/includes/setPassword.php');						if(isset($messages)){											foreach($messages as $key => $value){														echo '<font color="red">' . $value . '</font>';								echo '</br>';							}						}
						//echo uniqid('id',true);											?>					
                </div>
            </div>
            <div class="col-xs-0 col-sm-1 col-lg-2 sidenav"></div>
        </div>
    </div>
    <nav class="navbar navbar-footer navbar-inverse"></nav>
</body>
</html>