<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/mdb/includes/common/constants.php";
include $PHYSICAL_PATH.'/includes/dao/movieDAO.php';

$loggedIn = false;
if(isLoggedIn()){
	$loggedIn = true;
}

$genre = $_GET["g"];

$movieDao= new movieDAO();
// $moviesList = "";
//if(trim($genre)!=""){
//	$moviesList = $movieDao->getMoviesByGenre($genre);
//}

//if(empty($moviesList) || trim($genre) == "" ){
//	$moviesList= $movieDao->getRandomMovies();
//	echo "<pre>"; print_r($moviesList); echo "</pre>";
//}

$moviesList= $movieDao->getRandomMovies();
$sideMoviesList= $movieDao->getSideMovies();

$movies = array();
if (isset($_SESSION['preferences']) && trim($_SESSION['preferences']) != "" ) {
	$preferences = explode(",",$_SESSION['preferences']);
	if(count($preferences) < 2){
		$preferences[1] = 'Adventure';
	}

	foreach ($preferences as $singlePreference){
		//echo $singlePreference;
		$allMovies = $movieDao->getRecommendation($singlePreference);
		foreach ($allMovies as $key=>$oneMovie ){
			array_push($movies, $oneMovie);
		}
	}
}


//
//echo "<pre>"; print_r($movies); echo "</pre>";
//
//exit();

?>
<!DOCTYPE HTML>
<html>
<head>
	<!-- Header Starts -->
	<?php include_once $PHYSICAL_PATH."includes/common/header.php"; ?>
	<!-- Header Ends -->
</head>
<body>
<div class="container">
	<div class="container_wrap">
		<!-- Navbar goes  here -->
		<?php include_once $PHYSICAL_PATH."includes/common/navigation.php"; ?>
		<div class="content">
			<h1 class="m_3">Now in the Movie</h1>
			<div class="movie_top">
				<div class="col-md-9 movie_box">
					<!-- Movie variant with time -->
					<?php
					foreach ($moviesList as $m){
						echo "<div style='height: 240px;' class='movie movie-test movie-test-dark movie-test-left'>
								<div style='height:240px;' class='movie__images'>
									<a href='single.php?id=".$m['imdbID']."' class='movie-beta__link'></a>
										<img style='height:230px; width:170px;' alt='' src='".$m['Poster']."' class='img-responsive' alt=''/>
									</a>
								</div>
								<div class='movie__info'>
									<a href='single.php' class='movie__title'>". $m['Title']. "</a>
									<p class='movie__time'>". $m['Runtime']. "</p>
									<p class='movie__option'>".$m['Genre']."</p>
										<ul class='list_6'>
											<li><i class='icon1'> </i><p>".$m['imdbVotes']."</p></li>
											<li><i class='icon3'> </i><p>".rand(100,10000)."</p></li>
											<li>Rating : &nbsp;&nbsp;<p>". $m['imdbRating'] ."</p></li>
											<div class='clearfix'> </div>
										</ul>
								</div>
								<div class='clearfix'> </div>
                              </div>";
					}
					?>
					<!-- Movie variant with time -->
				</div>
				<div class="col-md-3">
					<?php
					foreach ($sideMoviesList as $m) {
						echo "	<div style='height: 220px;' class='movie_img' ><div class='grid_2' >
										<img style='height:220px; width: 210px;'src = '".$m['Poster']."' class='img-responsive' alt ='' >
										<div class='caption1' >
											<ul class='list_5 list_7' >
												<li ><i class='icon5' > </i ><p >".rand(100,10000)."</p ></li >
											</ul >
											<i class='icon4 icon6 icon7' > </i >
											<p class='m_3' >".$m['Title']."</p >
										</div >
									</div >
								</div>
							  ";
					}
					?>
				</div>
				<div class="clearfix"> </div>
			</div>
			<h3 class="recent">Recommended for you</h3>
			<script type="text/javascript" src="js/jquery.flexisel.js"></script>

			<ul id="flexiselDemo1">
				<?php if (isset($_SESSION['preferences'])){ ?>
					<?php $count = 0; ?>
					<?php foreach ($movies as $key=>$oneMovie ){ ?>
						<?php  if ($count < 5){ ?>
							<li>
								<a href="<?php echo $STATIC_URL?>single.php?id=<?php echo $oneMovie["imdbID"]?>"><div style="height:240px; width:250px"><img src="<?php echo $oneMovie['Poster'] ?>"   style="overflow:hidden;" class="img-responsive"/></div></a>
								<!--								<div class="grid-flex">-->
								<!--									<a href="--><?php //echo $STATIC_URL?><!--single.php?id=--><?php //echo $oneMovie["imdbID"]?><!--">--><?php //echo $oneMovie['Title'] ?><!--</a>-->
								<!--									<p>--><?php //echo $oneMovie['Released'] ?><!-- | --><?php //echo $oneMovie['Runtime'] ?><!--</p>-->
								<!--								</div>-->
							</li>
						<?php } $count++ ; ?>
					<?php } ?>
				<?php }else{ ?>
					<li><img src="images/1.jpg" class="img-responsive"/><div class="grid-flex"><a href="#">Syenergy 2mm</a><p>22.10.2014 | 14:40</p></div></li>
					<li><img src="images/2.jpg" class="img-responsive"/><div class="grid-flex"><a href="#">Surf Yoke</a><p>22.01.2015 | 14:40</p></div></li>
					<li><img src="images/3.jpg" class="img-responsive"/><div class="grid-flex"><a href="#">Salty Daiz</a><p>22.10.2013 | 14:40</p></div></li>
					<li><img src="images/4.jpg" class="img-responsive"/><div class="grid-flex"><a href="#">Cheeky Zane</a><p>22.10.2014 | 14:40</p></div></li>
					<li><img src="images/5.jpg" class="img-responsive"/><div class="grid-flex"><a href="#">Synergy</a><p>22.10.2013 | 14:40</p></div></li>
				<?php } ?>
			</ul>
			<script type="text/javascript">
				$(window).load(function() {
					$("#flexiselDemo1").flexisel({
						visibleItems: 4,
						animationSpeed: 1000,
						autoPlay: true,
						autoPlaySpeed: 3000,
						pauseOnHover: true,
						enableResponsiveBreakpoints: true,
						responsiveBreakpoints: {
							portrait: {
								changePoint:480,
								visibleItems: 1
							},
							landscape: {
								changePoint:640,
								visibleItems: 2
							},
							tablet: {
								changePoint:768,
								visibleItems: 3
							}
						}
					});
				});
			</script>
		</div>
	</div>
</div>
<!-- Footer Starts -->
<?php include_once $PHYSICAL_PATH . "includes/common/footer.php"; ?>
<!-- Footer Ends -->
</body>
</html>