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
<script src="js/responsiveslides.min.js"></script>
<script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
</script>
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
	      <div class="slider">
	   <div class="callbacks_container">
	      <ul class="rslides" id="slider">
	        <li><img src="images/banner.jpg" class="img-responsive" alt=""/>
	        	<div class="button">
			      <a href="#" class="hvr-shutter-out-horizontal">Watch Now</a>
			    </div>
			</li>
	        <li><img src="images/banner1.jpg" class="img-responsive" alt=""/>
	        	<div class="button">
			      <a href="#" class="hvr-shutter-out-horizontal">Watch Now</a>
			    </div>
			</li>
	        <li><img src="images/banner2.jpg" class="img-responsive" alt=""/>
	        	<div class="button">
			      <a href="#" class="hvr-shutter-out-horizontal">Watch Now</a>
			    </div>
			</li>
	      </ul>
	    </div>
	    <div class="banner_desc">
			    	<div class="col-md-9">
			    		<ul class="list_1">
			    			<li>Published <span class="m_1">Feb 20, 2015</span></li>
			    			<li>Updated <span class="m_1">Feb 20 2015</span></li>
			    			<li>Rating <span class="m_1"><img src="images/rating.png" alt=""/></span></li>
			    		</ul>
			    	</div>
			    	<div class="col-md-3 grid_1">
			    		<ul class="list_1 list_2">
			    			<li><i class="icon1"> </i><p>2,548</p></li>
			    			<li><i class="icon2"> </i><p>215</p></li>
			    			<li><i class="icon3"> </i><p>546</p></li>
			    		</ul>
			    	</div>
			    </div>
      </div>
      <div class="content">
      	<div class="box_1">
      	 <h1 class="m_2">Featurd Movies</h1>
      	 <div class="search">
		    <form>
				<input type="text" value="Search..." onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
				<input type="submit" value="">
		    </form>
		</div>
		<div class="clearfix"> </div>
		</div>
		<div class="box_2">
			<div class="col-md-5 grid_3">
			  <div class="row_1">
			  <div class="col-md-6 grid_4"><a href="single.php">
				  <div class="grid_2">
					<img src="images/pic1.jpg" class="img-responsive" alt=""/>
					<div class="caption1">
						<ul class="list_3">
				    		<li><i class="icon5"> </i><p>3,548</p></li>
				    	</ul>
				    	<i class="icon4"> </i>
				    	<p class="m_3">Guardians of the Galaxy</p>
					</div>
				   </div>
				   <div class="grid_2 col_1">
					<img src="images/pic2.jpg" class="img-responsive" alt=""/>
					<div class="caption1">
						<ul class="list_3">
				    		<li><i class="icon5"> </i><p>3,548</p></li>
				    	</ul>
				    	<i class="icon4"> </i>
				    	<p class="m_3">Guardians of the Galaxy</p>
					</div>
				   </div>
			   </a></div>
			   <div class="col-md-6 grid_7">
				   <div class="col_2">
				   	    <ul class="list_4">
			    			<li><i class="icon1"> </i><p>2,548</p></li>
			    			<li><i class="icon2"> </i><p>215</p></li>
			    			<li><i class="icon3"> </i><p>546</p></li>
			    			<li>Rating : &nbsp;&nbsp;<p><img src="images/rating1.png" alt=""/></p></li>
			    			<li>Release Date : &nbsp;<span class="m_4">Mar 15, 2015</span> </li>
			    			<div class="clearfix"> </div>
			    		</ul>
			    		<div class="m_5"><a href="single.php"><img src="images/pic3.jpg" class="img-responsive" alt=""/></a></div>
				   </div>
			 </div>
			   <div class="clearfix"> </div>
			   </div>
			   <div class="row_2">
			   	<a href="single.php"><img src="images/pic4.jpg" class="img-responsive" alt=""/></a>
			   </div>
			</div>
			<div class="col-md-5 content_right">
			 <div class="row_3">
			  <div class="col-md-6 content_right-box"><a href="single.php">
				<div class="grid_2">
				<img src="images/pic6.jpg" class="img-responsive" alt=""/>
				<div class="caption1">
						<ul class="list_5">
				    		<li><i class="icon5"> </i><p>3,548</p></li>
				    	</ul>
				    	<i class="icon4 icon6"> </i>
				    	<p class="m_3">Guardians of the Galaxy</p>
				</div>
			    </div>
			   </a></div>
			   <div class="col-md-6 grid_5"><a href="single.php">
				<div class="grid_2">
				<img src="images/pic7.jpg" class="img-responsive" alt=""/>
				<div class="caption1">
						<ul class="list_5">
				    		<li><i class="icon5"> </i><p>3,548</p></li>
				    	</ul>
				    	<i class="icon4 icon6"> </i>
				    	<p class="m_3">Guardians of the Galaxy</p>
				</div>
			    </div>
			   </a></div>
			   <div class="clearfix"> </div>
			   </div>
			   <div class="video">
			      <iframe width="100%" height="" src="https://www.youtube.com/embed/s1QeoSedWmM" frameborder="0" allowfullscreen></iframe>
			  </div>
			  <div class="row_5">
			  	<div class="col-md-6">
					<div class="col_2">
				   	    <ul class="list_4">
			    			<li><i class="icon1"> </i><p>2,548</p></li>
			    			<li><i class="icon2"> </i><p>215</p></li>
			    			<li><i class="icon3"> </i><p>546</p></li>
			    			<li>Rating : &nbsp;&nbsp;<p><img src="images/rating1.png" alt=""></p></li>
			    			<div class="clearfix"> </div>
			    		</ul>
			    		
				   </div>
			   </div>
			   <div class="col-md-6 m_6"><a href="single.php">
				  <img src="images/pic8.jpg" class="img-responsive" alt=""/>
			   </a></div>
			  </div>
			</div>
			<div class="col-md-2 grid_6">
				<div class="m_7"><a href="single.php"><img src="images/pic9.jpg" class="img-responsive" alt=""/></a></div>
				<div class="caption1">
						<ul class="list_5">
				    		<li><i class="icon5"> </i><p>3,548</p></li>
				    	</ul>
				    	<i class="icon4 icon6"> </i>
				    	<p class="m_3">Guardians of the Galaxy</p>
				</div>
				<div class="col_2 col_3">
				   	    <ul class="list_4">
			    			<li><i class="icon1"> </i><p>2,548</p></li>
			    			<li><i class="icon2"> </i><p>215</p></li>
			    			<li><i class="icon3"> </i><p>546</p></li>
			    			<li>Rating : &nbsp;&nbsp;<p><img src="images/rating1.png" alt=""></p></li>
			    			<li>Release : &nbsp;<span class="m_4">Mar 15, 2015</span> </li>
			    			<div class="clearfix"> </div>
			    		</ul>
			    		<div class="m_8"><a href="single.php"><img src="images/pic10.jpg" class="img-responsive" alt=""/></a></div>
			    </div>
			</div>
			<div class="clearfix"> </div>
		</div>
      </div>
   </div>
 </div>

<!-- Footer Starts -->
<?php include_once $PHYSICAL_PATH . "includes/common/footer.php"; ?>
<!-- Footer Ends -->
</body>
</html>