<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/common/constants.php";
include_once $PHYSICAL_PATH. "includes/dao/movieDAO.php";

$loggedIn = false;
if(isLoggedIn()){
	$loggedIn = true;
}

if(!$loggedIn){
	header("Location: " . $STATIC_URL . "index.php");
}

$userInfo = $_SESSION;
$movieObj= new movieDAO();
$url=$movieObj->generatePDF();
?>

<!DOCTYPE HTML>
<html>
<head>
<!-- Header Starts -->
<?php include_once $PHYSICAL_PATH . "includes/common/header.php"; ?>
<!-- Header Ends -->
<link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css' />
</head>
<body>
<div class="container">
	<div class="container_wrap">
		<!-- Navbar goes  here -->
		<?php include_once $PHYSICAL_PATH . "includes/common/navigation.php"; ?>
	      <div class="content">
      	     <div class="register">
		  	  <form method="post" action="services/rest_signup.php">
				    <div class="register-top-grid">
					 <img id="profile-img" class="profile-img-card" height="250" width="250" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" />
            <p id="profile-name" class="profile-name-card"></p>
                        <h3>Personal Information</h3>
                         <div>
                            <span>Name<label></label></span>
                            <input type="text" name="name" id="name" value="<?php echo $userInfo['name']; ?>" disabled>
                         </div>
                         <div>
                             <span>Email Address<label></label></span>
                             <input type="text" name="email" id="email" value="<?php echo $userInfo['email']; ?>" disabled>
                         </div>
                       
					 </div>
				     <div class="register-bottom-grid">
						    
                             <div>
                                 <span>Preferences<label></label></span>
                                 <input type="text" name="preferences" id="preferences"   value="<?php echo $userInfo['preferences']; ?>"  disabled>
                             </div>
							 <div>
								<span>Username<label></label></span>
								<input type="text" name="dob" id="dob"  value="<?php echo $userInfo['username']; ?>"  disabled>
							 </div>

							 <div class="clearfix"> </div>

					 </div>

                     <div class="clearfix"> </div>
                  <div class="down_btn"><a class="btn1" href="<?php echo $url ?>" target="_blank"><span> </span>Download Recommendations</a></div>
               </form> <!--form ends-->
		      </div><!-- registration ends-->
          </div>
    </div>
</div>
<!-- Footer Starts -->
<?php include_once $PHYSICAL_PATH . "includes/common/footer.php"; ?>
<!-- Footer Ends -->
</body>
</html>