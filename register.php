<?php include_once "/var/www/mdb/includes/common/constants.php";

$loggedIn = false;
if(isLoggedIn()){
	$loggedIn = true;
}

?>
<!DOCTYPE HTML>
<html>
<head>
<!-- Header Starts -->
<?php include_once $PHYSICAL_PATH . "includes/common/header.php"; ?>
<!-- Header Ends -->
</head>
<body>
<div class="container">
	<div class="container_wrap">
		<div class="header_top">
		    <div class="col-sm-3 logo"><a href="index.php"><img src="images/logo.png" alt=""/></a></div>
		    <div class="col-sm-6 nav">
			  <ul>
				 <li> <span class="simptip-position-bottom simptip-movable" data-tooltip="comic"><a href="movie.php"> </a></span></li>
				 <li><span class="simptip-position-bottom simptip-movable" data-tooltip="movie"><a href="movie.php"> </a> </span></li>
				 <li><span class="simptip-position-bottom simptip-movable" data-tooltip="video"><a href="movie.php"> </a></span></li>
				 <li><span class="simptip-position-bottom simptip-movable" data-tooltip="game"><a href="movie.php"> </a></span></li>
				 <li><span class="simptip-position-bottom simptip-movable" data-tooltip="tv"><a href="movie.php"> </a></span></li>
				 <li><span class="simptip-position-bottom simptip-movable" data-tooltip="more"><a href="movie.php"> </a></span></li>
			 </ul>
			</div>
			<div class="col-sm-3 header_right">
				<ul class="header_right_box">
					<?php if($loggedIn){ ?>
						<li><img src="images/p1.png" alt=""/></li>
						<li><p><a href="login.php"><?php echo $_SESSION["username"] ?> </a> | <a href="logout.php">Logout</a></p></li>
						<li class="last"><i class="edit"> </i></li>
					<?php }else{ ?>
						<li><p><a href="login.php">Login | Signup</a></p></li>
					<?php } ?>
					<div class="clearfix"> </div>
				</ul>
			</div>
			<div class="clearfix"> </div>
	      </div>
	      <div class="content">
      	     <div class="register">
		  	  <form id="signupForm" method="post" action="services/rest_signup.php">
				    <div class="register-top-grid">
                        <h3>Personal Information</h3>
                         <div>
                            <span>Name<label>*</label></span>
							 <!--/^[a-zA-Z]*$/-->
                            <input type="text" name="name" pattern="[a-zA-Z]{2,}" id="name" required >
                         </div>
                         <div>
                             <span>Email Address<label>*</label></span>
                             <input type="text" name="email" id="email" required>
                         </div>
                         <div class="clearfix"> </div>
                           <a class="news-letter" href="#">
                             <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
                           </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>Login Information</h3>
                             <div>
								 <!--pattern="/^[a-zA-Z0-9]*$/" -->
                                 <span>Username<label>*</label> [Alphanumeric]</span>
                                 <input type="text" name="username" pattern="[a-zA-Z0-9]{2,}" id="username" required>
                             </div>
							 <div>
								<span>Password<label>*</label></span>
								<input type="password" name="password" id="password" required>
							 </div>
							 <div>
								<span>Confirm Password<label>*</label></span>
								<input type="password" name="confirm_password" id="confirm_password" required>
								<div class="errorMsg" style="color: red; display:none">Password did not match!</div>
							 </div>
							 <div class="clearfix"> </div>
					 </div>
                     <div class="clearfix"> </div>
                     <div class="register-but">
                           <input type="submit" value="submit">
                           <div class="clearfix"> </div>
                    </div>
               </form> <!--form ends-->
		      </div><!-- registration ends-->
          </div>
    </div>
</div>
<!-- Footer Starts -->
<?php include_once $PHYSICAL_PATH . "includes/common/footer.php"; ?>
<!-- Footer Ends -->

<script>
	$(document).ready(function(){
		$('form').submit( function(e){
			var password = $("#password").val();
			var confirm_password = $("#confirm_password").val();

			console.log("Password " + password);
			console.log("Confirm " + confirm_password);
			if( password != confirm_password){
				$(password).focus();
				$(confirm_password).focus();
				$(".errorMsg").show();
				e.preventDefault();
			}
		});

	});
</script>
</body>
</html>