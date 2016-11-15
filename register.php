<?php include_once "/var/www/mdb/includes/common/constants.php"; ?>
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
				 <li><img src="images/p1.png" alt=""/></li>
				 <li><p><a href="login.php">Carol Varois</a></p></li>
				 <li class="last"><i class="edit"> </i></li>
				 <div class="clearfix"> </div>
			   </ul>
			</div>
			<div class="clearfix"> </div>
	      </div>
	      <div class="content">
      	     <div class="register">
		  	  <form method="post" action="services/rest_signup.php">
				    <div class="register-top-grid">
                        <h3>Personal Information</h3>
                         <div>
                            <span>Name<label>*</label></span>
                            <input type="text" name="name" id="name">
                         </div>
                         <div>
                             <span>Email Address<label>*</label></span>
                             <input type="text" name="email" id="email">
                         </div>
                         <div class="clearfix"> </div>
                           <a class="news-letter" href="#">
                             <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
                           </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>Login Information</h3>
                             <div>
                                 <span>Username<label>*</label></span>
                                 <input type="text" name="username" id="username">
                             </div>
							 <div>
								<span>Password<label>*</label></span>
								<input type="password" name="password" id="password">
							 </div>
							 <div>
								<span>Confirm Password<label>*</label></span>
								<input type="password" name="confirm_password" id="confirm_password">
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
</body>
</html>