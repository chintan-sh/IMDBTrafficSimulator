<div class="header_top">
    <div class="col-sm-3 logo"><a href="index.php"><img src="images/logo.png" alt=""/></a></div>
    <div class="col-sm-6 nav">
        <ul>
            <li> <span class="simptip-position-bottom simptip-movable" data-tooltip="comic"><a href="movie.php"> </a></span></li>
            <li><span class="simptip-position-bottom simptip-movable" data-tooltip="movie"><a href="movie.php"> </a> </span></li>
            <li><span class="simptip-position-bottom simptip-movable" data-tooltip="video"><a href="movie.php"> </a></span></li>
            <li><span class="simptip-position-bottom simptip-movable" data-tooltip="game"><a href="movie.php"> </a></span></li>
            <li><span class="simptip-position-bottom simptip-movable" data-tooltip="tv"><a href="movie.php"> </a></span></li>
            <!--<li><span class="simptip-position-bottom simptip-movable" data-tooltip="more"><a href="movie.php"> </a></span></li>-->
        </ul>
    </div>
    <div class="col-sm-3 header_right">
        <ul class="header_right_box">
            <?php if($loggedIn){ ?>
                <li><img src="images/p1.png" alt=""/></li>
                <li><p><a href="login.php"><?php echo ucfirst($_SESSION["name"]) ?> </a> | <a href="logout.php">Logout</a></p></li>
                <!--<li class="last"><i class="edit"> </i></li>-->
            <?php }else{ ?>
                <li><p><a href="login.php">Login | Signup</a></p></li>
            <?php } ?>
            <div class="clearfix"> </div>
        </ul>
    </div>
    <div class="clearfix"> </div>
</div>