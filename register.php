<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/mdb/includes/common/constants.php";

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
						 <div>
							<span>Preferences<label>*</label></span>
							 <select id="preferences" name="preferences[]" multiple required="required">
								 <option value="Crime">Crime</option>
								 <option value="Thriller">Thriller</option>
								 <option value="Comedy">Comedy</option>
								 <option value="Documentary">Documentary</option>
								 <option value="History">History</option>
								 <option value="Musical">Musical</option>
								 <option value="Romance">Romance</option>
								 <option value="Horror">Horror</option>
							 </select>
						 </div>
                         <div class="clearfix"> </div>
<!--                           <a class="news-letter" href="#">-->
<!--                             <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>-->
<!--                           </a>-->
					 </div>
				     <div class="clearfix"> </div>
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