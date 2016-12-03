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
						<li><p><a href="login.php"><?php echo ucfirst($_SESSION["username"]) ?> </a> | <a href="logout.php">Logout</a></p></li>
						<!--<li class="last"><i class="edit"> </i></li>-->
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
			   <div class="col-md-6 login-left">
			  	 <h3>New Customers</h3>
				 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
				 <a class="acount-btn" href="register.php">Create an Account</a>
			   </div>
			   <div class="col-md-6 login-right">
			  	<h3>Registered Customers</h3>
				<p>If you have an account with us, please log in.</p>
				<form id="loginForm"  method="post"><!--action="services/rest_login.php"-->
				  <div>
					<span>Username<label>*</label></span>
					<input type="text" name="username" id="username">
				  </div>
				  <div>
					<span>Password<label>*</label></span>
					<input type="password" name="password" id="password">
				  </div>
					<div class="errorMsg" style="color: red; display:none">Username/Password did not match!</div>
				  <input type="submit" id="submitBtn" value="Login">
			    </form>
			   </div>	
			   <div class="clearfix"> </div>
		     </div>
           </div>
    </div>
</div>
<!-- Footer Starts -->
<?php include_once $PHYSICAL_PATH . "includes/common/footer.php"; ?>
<!-- Footer Ends -->

<!-- Javascript Goes Here -->
<script type="application/javascript" src="js/ajax.js"></script>
<script>
	$(document).ready(function(){
		$('#loginForm').submit(function(e){
            e.preventDefault();
			authenticate();
		});
	});


	function authenticate() {
		var post_url = "http://localhost/mdb/services/rest_login.php";
		var post_data_url = "username=" + $('#username').val() + "&password=" + $('#password').val();
		postData(post_url, post_data_url, authenticateCallback, true);
	}

	function authenticateCallback(data){
		console.log("Response '"+$.trim(data)+"'");
		if($.trim(data) == "success"){
			window.location = "index.php";
		}else {
			$(".errorMsg").show();
		}
	}
</script>
</body>
</html>