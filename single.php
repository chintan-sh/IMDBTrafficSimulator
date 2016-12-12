<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/common/constants.php";
include $PHYSICAL_PATH.'/includes/dao/movieDAO.php';

$loggedIn = false;
if(isLoggedIn()){
	$loggedIn = true;
}

$id= $_GET['id'];
$movieDao= new movieDAO();
$movieDetails= $movieDao->getMovieById($id);
foreach($movieDetails as $m){
	$movieList= $m;
}
$randomMovieList= $movieDao->getSideMovies();


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
			<div class="movie_top">
				<div class="col-md-9 movie_box">
					<div class="grid images_3_of_2">
						<div class="movie_image">
							<span class="movie_rating"><?php echo $m['imdbRating']?></span>
							<img src=<?php echo $m['Poster']?> class="img-responsive" alt=""/>
						</div>

					</div>
					<div class="desc1 span_3_of_2">
						<p class="movie_option"><strong>Title: </strong> <a href="#"><?php echo $m['Title'] ?></a></p>
						<p class="movie_option"><strong>Country: </strong> <a href="#"><?php echo $m['Country'] ?></a></p>
						<p class="movie_option"><strong>Year: </strong><?php echo $m['Year'] ?></p>
						<p class="movie_option"><strong>Category: </strong><a href="#"><?php echo $m['Genre'] ?></a>
						<p class="movie_option"><strong>Release date: </strong><?php echo $m['Country'] ?></p>
						<p class="movie_option"><strong>Director: </strong><a href="#"><?php echo $m['Director'] ?></a></p>
						<p class="movie_option"><strong>Actors: </strong><a href="#"><?php echo $m['Actors'] ?></a>
						<p class="movie_option"><strong>Rated: </strong><?php echo $m['Rated'] ?></p>
<!--						<div class="down_btn"><a class="btn1" href="#"><span> </span>Watch</a></div>-->
					</div>
					<div class="clearfix"> </div>
					<p class="m_4"><?php echo $m['Plot'] ?></p>


				</div>
				<div class="col-md-3">
					<?php
						foreach ($randomMovieList as $mov){
							echo " <div class='movie_img'>
 								<div class='grid_2'>
									<a href='".$STATIC_URL."single.php?id=". $mov['imdbID'] ."'><img src='".$mov['Poster']."' class='img-responsive' alt=''></a>
									<div class='caption1'>
										<ul class='list_5 list_7'>
											<li><i class='icon5'> </i><p>'".$mov['imdbRating']."'</p></li>
										</ul>
										<i class='icon4 icon6 icon7'> </i>
										<p class='m_3'>'".$mov['Title']."'</p>
									</div>
								</div>
							</div>";
						}
					?>
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