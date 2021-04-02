<?php
include 'data.inc.php';
    


// we will display the filtered array
$filtered = array();

// first see if we should filter the countries
if (isset($_GET['countryFilter']) && $_GET['countryFilter'] != "") {
    
        // loop thru each image in dataset and see if its country matches request
        foreach ($images as $img) {
            
            if ($img['countryCode'] == $_GET['countryFilter']) {
                
                // we have a match so add that image to filtered array
                $filtered[$img['id']] = $img;
            }
        }
    

}
//check if a filter is needed for cities
if (isset($_GET['cityFilter']) && $_GET['cityFilter'] != "") {
    //check if theres a country filter
    if ($_GET['countryFilter'] == ""){
        // loop thru each image in dataset and see if its city matches request
        foreach ($images as $img) {
            if ($img['cityCode'] == $_GET['cityFilter']) {
                
                // we have a match so add that image to filtered array
                $filtered[$img['id']] = $img;
            }
        }
    }
    else{
        //get a list of all the images for the city
        foreach ($images as $img) {
            if ($img['cityCode'] == $_GET['cityFilter']) {
                
                // all images for the city
                $cityToFilter[$img['id']] = $img;
                
            }
        }
        //loop through current filtered array
        foreach ($filtered as $img) {
            //loop through city images array
            foreach($cityToFilter as $cf){
                //check if the countyCode from the filtered array matches the cities country and if the filtered array mathces the city code
                if ($img['countryCode'] == $cf['countryCode'] && $img["cityCode"] == $cf["cityCode"]) {
                    
                    // we have a match so add that image to filtered array
                    $filtered[$cf['id']] = $cf;
                }
                else{
                    //if they did no match remove it from the filtered array
                    unset($filtered[$img['id']]);
                }
            }
        }
        if(empty($filtered)){
            header("Location: error.php"); 
            exit();
        }
    }
}

//if theres no filter
if ($_GET['countryFilter'] == "" && $_GET['cityFilter'] == "") {
    // no filter was specified so show all images in dataset
    $filtered = $images;
}

?>


<html>
<title>Browse images page</title>
<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/mystyle.css" />
</head>


<body>
    <?php include 'header.inc.php'; ?>

<div class="container-fluid" style="width: 80%;">
    
<form action="browse-images.php" method="get">
  <label for="countryFilter">country:</label>
  <select name="countryFilter" id="countryFilter">
  <option value="" selected>all</option>
    <?php foreach ($countries as $key => $value) { ;?> 
              <option  value="<?php echo $value["countryCode"]; ?>"  > <?php echo $value["countryName"]; ?></option>
               
          <?php } ?> 
  </select>

  <label for="cityFilter">city:</label>
  <select name="cityFilter" id="cityFilter">
  <option value="" selected>all</option>
    <?php foreach ($cities as $key => $value) { ;?> 
              <option  value="<?php echo $value["cityCode"]; ?>"  > <?php echo $value["cityName"]; ?></option>
               
          <?php } ?> 
  </select>
  <input type="submit" value="Submit">
</form>
    
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
        
        
        
            <div class="col-md-10" >
                <div class="row">
                    
                            <?php foreach ($filtered as $img) { ?>

                            <ul style="list-style-type: none;">
                                <li>
                                    <a href="travel-image.php?id=<?php echo $img['id']; ?>" class="img-responsive">
                                        <img src="travel-images/square-medium/<?php echo $img['path']; ?>" alt="<?php echo $img['title']; ?>">
                                        <div class="caption">
                                            <div class="blur"></div>
                                            <div class="caption-text"></div>
                                        </div>
                                    </a>
                                </li>  
                            </ul>      
                            <?php  } ?>
                </div>
            </div> 
            
              
        </div>   
    </div>       
</div>   

<?php include 'footer.inc.php'; ?>



    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js" ></script>
</body>

</html>