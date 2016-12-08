<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/mdb/includes/common/constants.php";
include_once $PHYSICAL_PATH. "includes/dao/movieDAO.php";

//echo $_SERVER['DOCUMENT_ROOT'];
$loggedIn = false;
if(isLoggedIn()){
	$loggedIn = true;
}

//"Drama", , "Sci-Fi"

$array = array("Crime", "Thriller", "Comedy", "Horror");
$k = array_rand($array);
$v = $array[$k];

$movieObj = new movieDAO();
$allMovies = $movieObj->getMoviesByGenre($v);
$movies = array();
foreach ($allMovies as $key=>$oneMovie ){
	array_push($movies, $oneMovie);
}

//echo "<pre>"; print_r($movies); echo "</pre>";
//
//exit();
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
		<!-- Navbar goes  here -->
		<?php include_once $PHYSICAL_PATH . "includes/common/navigation.php"; ?>
		<div class="slider">
		   <div class="callbacks_container">
			  <ul class="rslides" id="slider">
				<li><img src="images/banner.jpg" class="img-responsive" alt=""/>
					<div class="button">
					  <a href="https://www.youtube.com/watch?v=2WhQcK-Zaok" target="_blank" class="hvr-shutter-out-horizontal">Watch Now</a>
					</div>
				</li>
				<li><img src="images/banner1.jpg" class="img-responsive" alt=""/>
					<div class="button">
					  <a href="https://www.youtube.com/watch?v=pbI980iUb78" target="_blank" class="hvr-shutter-out-horizontal">Watch Now</a>
					</div>
				</li>
				<li><img src="images/banner2.jpg" class="img-responsive" alt=""/>
					<div class="button">
					  <a href="https://www.youtube.com/watch?v=mg2xtVYgQhI" target="_blank" class="hvr-shutter-out-horizontal">Watch Now</a>
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
			 <h1 class="m_2">Featured Movies</h1>
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
			  <!--1st pit-->
			  <div class="row_1">
				  <div class="col-md-6 grid_4">
					  <div class="grid_2">
							<a href="<?php echo $STATIC_URL?>single.php?id=<?php echo $movies[8]["imdbID"]?>"><img src="<?php echo $movies[8]["Poster"]?>" height="166px" width="181px" class="img-responsive" alt=""/></a>
							<div class="caption1">
								<ul class="list_3">
									<li><i class="icon5"> </i><p><?php echo $movies[8]["imdbVotes"]?></p></li>
								</ul>
								<i class="icon4"> </i>
								<p class="m_3"><?php echo $movies[8]["Title"]?></p>
							</div>
					   </div>
					   <div class="grid_2 col_1">
						   <a href="<?php echo $STATIC_URL?>single.php?id=<?php echo $movies[9]["imdbID"]?>"><img src="<?php echo $movies[9]["Poster"]?>" height="166px" width="181px" class="img-responsive" alt=""/></a>
							<div class="caption1">
								<ul class="list_3">
									<li><i class="icon5"> </i><p><?php echo $movies[9]["imdbVotes"]?></p></li>
								</ul>
								<i class="icon4"> </i>
								<p class="m_3"><?php echo $movies[9]["Title"]?></p>
							</div>
					   </div>
				   </div>
				   <div class="col-md-6 grid_7">
					   <div class="col_2">
							<ul class="list_4">
								<li><i class="icon1"> </i><p><?php echo $movies[2]["imdbVotes"]?></p></li>
								<li><i class="icon2"> </i><p><?php echo(rand(10,100)); ?></p></li>
								<li><i class="icon3"> </i><p><?php echo $movies[2]["imdbRating"]?></p></li>
								<li>Rating : &nbsp;&nbsp;<p><img src="images/rating1.png" alt=""/></p></li>
								<li>Release Date : &nbsp;<span class="m_4"><?php echo $movies[2]["Released"]?></span> </li>
								<div class="clearfix"> </div>
							</ul>
							<div class="m_5"><a href="<?php echo $STATIC_URL?>single.php?id=<?php echo $movies[2]["imdbID"]?>"><img src="<?php echo $movies[2]["Poster"] ?>" class="img-responsive" alt=""/></a></div>
					   </div>
				   </div>
				   <div class="clearfix"> </div>
			   </div>
			   <div class="row_2">
				   <a href="<?php echo $STATIC_URL?>single.php?id=<?php echo $movies[8]["imdbID"]?>"><img src="images/pic4.jpg" class="img-responsive" alt=""/></a>
			   </div>
			</div>
			<div class="col-md-5 content_right">
			 <div class="row_3">
			  <div class="col-md-6 content_right-box">
					<div class="grid_2">
						<a href="<?php echo $STATIC_URL?>single.php?id=<?php echo $movies[14]["imdbID"]?>"><img src="<?php echo $movies[14]["Poster"] ?>" class="img-responsive" alt=""/></a>
						<div class="caption1">
							<ul class="list_5">
								<li><i class="icon5"> </i><p><?php echo $movies[14]["imdbVotes"] ?></p></li>
							</ul>
							<i class="icon4 icon6"> </i>
							<p class="m_3"><?php echo $movies[14]["Title"] ?></p>
						</div>
					</div>
			  </div>
			   <div class="col-md-6 grid_5">
					<div class="grid_2">
						<a href="<?php echo $STATIC_URL?>single.php?id=<?php echo $movies[13]["imdbID"]?>"><img src="<?php echo $movies[13]["Poster"]?>" class="img-responsive" alt=""/></a>
						<div class="caption1">
								<ul class="list_5">
									<li><i class="icon5"> </i><p>3,548</p></li>
								</ul>
								<i class="icon4 icon6"> </i>
								<p class="m_3"><?php echo $movies[13]["Title"]?></p>
						</div>
					</div>
			   </div>
			   <div class="clearfix"> </div>
			   </div>
			   <div class="video">
			      <iframe width="100%" height="" src="https://www.youtube.com/embed/GokKUqLcvD8" frameborder="0" allowfullscreen></iframe>
			  </div>
			  <div class="row_5">
			  	<div class="col-md-6">
					<div class="col_2">
				   	    <ul class="list_4">
			    			<li><i class="icon1"> </i><p><?php echo $movies[5]["imdbVotes"]?></p></li>
			    			<li><i class="icon2"> </i><p><?php echo(rand(10,100)); ?></p></li>
			    			<li><i class="icon3"> </i><p>513</p></li>
			    			<li>Rating : &nbsp;&nbsp;<p><img src="images/rating1.png" alt=""></p></li>
			    			<div class="clearfix"> </div>
			    		</ul>
			    		
				   </div>
			   </div>
			   <div class="col-md-6 m_6">
					   <a href="<?php echo $STATIC_URL?>single.php?id=<?php echo $movies[5]["imdbID"]?>"><img src="<?php echo $movies[5]["Poster"]?>" class="img-responsive" alt=""/></a>
			   </div>
			  </div>
			</div>
			<div class="col-md-2 grid_6">
				<div class="m_7"><a href="<?php echo $STATIC_URL?>single.php?id=<?php echo $movies[11]["imdbID"]?>"><img src="<?php echo $movies[11]["Poster"]?>" class="img-responsive" alt=""/></a></div>
				<div class="caption1">
						<ul class="list_5">
				    		<li><i class="icon5"> </i><p><?php echo $movies[11]["imdbVotes"]?></p></li>
				    	</ul>
				    	<i class="icon4 icon6"> </i>
				    	<p class="m_3"><?php echo $movies[11]["Title"]?></p>
				</div>
				<div class="col_2 col_3">
				   	    <ul class="list_4">
			    			<li><i class="icon1"> </i><p><?php echo $movies[12]["imdbVotes"]?></p></li>
			    			<li><i class="icon2"> </i><p><?php echo(rand(10,100)); ?></p></li>
			    			<li><i class="icon3"> </i><p>1123</p></li>
			    			<li>Rating : &nbsp;&nbsp;<p><img src="images/rating1.png" alt=""></p></li>
			    			<li>Release : &nbsp;<span class="m_4"><?php echo $movies[12]["Released"]?></span> </li>
			    			<div class="clearfix"> </div>
			    		</ul>
			    		<div class="m_8"><a href="<?php echo $STATIC_URL?>single.php?id=<?php echo $movies[12]["imdbID"]?>"><img src="<?php echo $movies[12]["Poster"]?>" class="img-responsive" alt=""/></a></div>
			    </div>
			</div>
			<div class="clearfix"> </div>
		</div><!--box 2-->
      </div>
   </div>
 </div>

<!-- Footer Starts -->
<?php include_once $PHYSICAL_PATH . "includes/common/footer.php"; ?>
<!-- Footer Ends -->
</body>
</html>