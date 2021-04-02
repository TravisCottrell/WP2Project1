<?php
include 'data.inc.php';
    
asort($countries);

// we will display the filtered array
$filtered = array();
// first see if we should filter the countries
if (isset($_GET['countryCode'])) {

    // loop thru each image in dataset and see if its country matches request
    foreach ($images as $img) {
        
        if ($img['countryCode'] == $_GET['countryCode']) {
            // we have a match so add that image to filtered array
            $filtered[$img['id']] = $img;
            $requestedCountry = $countries[$_GET['countryCode']];
        }
    }

}
else {
    // no filter was specified so show all images in dataset
    $filtered = $images;
}

?>


<html>
<title>Country images page</title>
<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/mystyle.css" />
</head>
<style>

</style>

<body  >
    <?php include 'header.inc.php'; ?>

<div class="container-fluid" style="width: 80%;">
    <div class="row" >
        
            
        <div class="col-md-2" >
            <div class="card">
                <div class="card-header" style="color: blue; background: lightblue;">Countries</div>
                    <ul class="list-group">
                        <?php foreach ($countries as $key => $value) { ?>           
                            <li class="list-group-item">
                            <a href="country.php?countryCode=<?php echo $value["countryCode"]; ?>"><?php echo $value["countryName"]; ?></a>
                            </li>
                            <?php } ?>
                    </ul>
                </div>
            </div>
            <!--side bar-->


            <div class='col-md-8'  >
                <div class="row" >
                        <?php foreach ($filtered as $img) { 
                            echo "<div class='col-md-3'>"; ?>
                        <ul style="list-style-type: none;">
                            <li>
                                <a href="travel-image.php?id=<?php echo $img['id']; ?>" class="img-responsive">
                                    <img src="travel-images/square-medium/<?php echo $img['path']; ?>" alt="<?php echo $img['title']; ?>">
                                
                                </a>
                            </li>  
                        </ul>      
                        <?php echo "</div>"; }?>
                </div>
            </div>
            <!--picture display-->


                <div class='col-md-2' >
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $requestedCountry['countryName']; ?></h2>
                            <ul class="details-list">
                               
                                <li>Country Code: <a ><?php echo $requestedCountry['countryCode']; ?></a></li><br>
                                <li>City Capital: <a ><?php echo $requestedCountry['capitalCity']; ?></a></li><br>
                                <li>Capital Code: <a ><?php echo $requestedCountry['capitalCode']; ?></a></li><br>
                                <li>population: <a ><?php echo $requestedCountry['population']; ?></a></li> 
                                <li>continent: <a ><?php echo $requestedCountry['continent']; ?></a></li> 
                                <li>currency: <a ><?php echo $requestedCountry['currency']; ?></a></li> 
                                <li>area(sq km): <a ><?php echo $requestedCountry['area']; ?></a></li> 
                            </ul>
                        </div>
                    </div>
                </div> 
                <!--right info display-->
        
           
    </div>       
</div>   

<?php include 'footer.inc.php'; ?>


    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js" ></script>
</body>

</html>