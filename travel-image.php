<?php
include 'data.inc.php';


$defaultId = 22;

// first find out which image was requested
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    if (! array_key_exists($id, $images)) {
        $id = $defaultId;
    }
}
else {
    $id = $defaultId;
}

$requested = $images[$id];
    
?>

<html>
<title>Image Detail Page</title>
<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />

    <link rel="stylesheet" href="css/mystyle.css" />
    
</head>

<body>
    <?php include 'header.inc.php'; ?>
<div class="container-fluid" style="width: 80%">
    <div class="row">
        <div class="col-md-2">
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
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-9">
                        <img class="img-responsive" src="travel-images/medium/<?php echo $requested['path']; ?>" alt="<?php echo $requested['title']; ?>">
                        <p class="description"><?php echo $requested['description']; ?></p>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $requested['title']; ?></h2>
                                <ul class="details-list">
                                    <li>Photo By: <a ><?php echo $requested['userName']; ?></a></li><br>
                                    <li>latitude: <a ><?php echo $requested['latitude']; ?></a></li><br>
                                    <li>longitude: <a ><?php echo $requested['longitude']; ?></a></li><br>
                                    <li>Country: <a ><?php echo $requested['countryCode']; ?></a></li><br>
                                    <li>City: <a ><?php echo $requested['cityCode']; ?></a></li> 
                                </ul>
                            </div>
                        </div>
                    </div>
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