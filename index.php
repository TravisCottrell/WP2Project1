<html>
<title>Home Page</title>
<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/mystyle.css" />

    
</head>
<style>
.container1 {
  width: 20%;
  /* for example */
  margin: auto;
}

.carousel img {
  margin: auto;
}
</style>

<body>
    <?php include 'header.inc.php'; ?>
<div class="container1">
    <div id="carouselcontainer" class="carousel slide" style="text-align: center;"data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselcontainer" data-slide-to="0" class="active"></li>
            <li data-target="#carouselcontainer" data-slide-to="1"></li>
            <li data-target="#carouselcontainer" data-slide-to="2"></li>
            <li data-target="#carouselcontainer" data-slide-to="3"></li>
        </ol>
        <div class = "carousel-inner"  role="listbox">
            <div class="carousel-item active item">
                <a href="browse-images.php?countryFilter=&cityFilter="><img class="d-block w-100"  src="travel-images/square-medium/222222.jpg" alt="first slide">
                <div class= "carousel-caption">
                    <h3>Browse Images</h3>
                    <p>Browse all the Images</p>
                </div>
                </a>
            </div>
            <div class="carousel-item item">
                <a href="country.php?countryCode=CA"><img class="d-block w-100"  src="travel-images/square-medium/6114850721.jpg" alt="second slide">
                <div class= "carousel-caption">
                    <h3>Countries</h3>
                    <p>Info on the countries</p>
                </div>
                </a>
            </div>
            <div class="carousel-item item">
            <a href="travel-image.php"><img  class="d-block w-100" src="travel-images/square-medium/6114859969.jpg" alt="third slide">
                <div class= "carousel-caption">
                    <h3>Single image info page</h3>
                    <p>para</p>
                </div>
                </a>
            </div>
            <div class="carousel-item item">
            <a href="upload.php"><img  class="d-block w-100" src="travel-images/square-medium/6119130918.jpg" alt="third slide">
                <div class= "carousel-caption">
                    <h3>Upload Image</h3>
                    <p>upload an image</p>
                </div>
                </a>
            </div>
            <a class="carousel-control-prev"  href="#carouselcontainer" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon"  ></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselcontainer" role="button" data-slide="next">
                <span class="carousel-control-next-icon" ></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<?php include 'footer.inc.php'; ?>
        
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js" ></script>
</body>

</html>
