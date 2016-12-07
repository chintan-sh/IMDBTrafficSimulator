<?php include_once "/var/www/mdb/includes/common/constants.php";

$loggedIn = false;
if(isLoggedIn()){
	$loggedIn = true;
	header("Location: ". $STATIC_URL ."index.php");
	die();
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
		 <!-- Navbar goes  here -->
		 <?php include_once $PHYSICAL_PATH . "includes/common/navigation.php"; ?>
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
			window.location = "movie.php";
		}else {
			$(".errorMsg").show();
		}
	}
</script>
</body>
</html>