<?php
$uploadInfo = array();
$imageID;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clientName = $_FILES["file1"]["name"];
    $imageID = $clientName[0];
    $uploadInfo[$imageID]["path"] = $imageID;
    if(isset($_POST["title"])){
         $uploadInfo[$imageID]["title"] = $_POST["title"];
    }
    if(isset($_POST["description"])){
         $uploadInfo[$imageID]["description"] = $_POST["description"];
    }
    if(isset($_POST["userName"])){
         $uploadInfo[$imageID]["userName"] = $_POST["userName"];
    }
    if(isset($_POST["city"])){
        $uploadInfo[$imageID]["city"] = $_POST["city"];
   }
   if(isset($_POST["uploadedBy"])){
    $uploadInfo[$imageID]["uploadedBy"] = $_POST["uploadedBy"];
    }

}
else{
    $imageID = 1;
    $uploadInfo[$imageID]["title"] = "";
    $uploadInfo[$imageID]["description"] = "";
    $uploadInfo[$imageID]["userName"] = "";
    $uploadInfo[$imageID]["city"] = "";
    $uploadInfo[$imageID]["uploadedBy"] = "";

}

function moveFile($fileToMove, $destination, $fileType) {
   $validExt = array("jpg", "png");
   $validMime = array("image/jpeg","image/png");

   // make an array of two elements, first=filename before extension, 
   // and the second=extension
   $components = explode(".", $destination);
   // retrieve just the end component (i.e., the extension)
   $extension = end($components);
   
   
   // check to see if file type is a valid one
   if (in_array($fileType,$validMime) && in_array($extension, $validExt)) {
      echo $destination . ' Uploaded successfully<br/>';
      move_uploaded_file($fileToMove, "user-uploads/" . $destination) 
         or die("error");
   }
   else
   echo 'Invalid file type=' . $fileType . '  Extension=' . $extension . '<br/>';

   
}


?>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Upload page</title>   
   
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
   <link rel="stylesheet" href="css/mystyle.css" />
</head>


<body>
<?php include 'header.inc.php'; ?>

<div class="container-fluid" style="width: 80%">
    <div class='row'>
    <div class="col-md-3"  style="text-align: right">            
            <?php 
            // if the form was	posted,	process the upload
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // check if user uploaded multiple files
                if (is_array($_FILES["file1"]["error"])) {
                    $count=0;
                    // loop through each uploaded file
                    foreach ($_FILES["file1"]["error"]  as $error) {
                    if ($error == UPLOAD_ERR_OK) {
                        $clientName = $_FILES["file1"]["name"][$count];
                        $serverName = $_FILES["file1"]["tmp_name"][$count];
                        $fileType = $_FILES["file1"]["type"][$count];
                        moveFile($serverName, $clientName, $fileType);
                        $count++;
                    }
                    }
                }
                else {
                    // user only uploaded a single file
                    if ($_FILES["file1"]["error"] == UPLOAD_ERR_OK) {
                    $clientName = $_FILES["file1"]["name"];
                    $serverName = $_FILES["file1"]["tmp_name"];
                    $fileType = $_FILES["file1"]["type"];
                    moveFile($serverName, $clientName, $fileType);
                    
                    }
                }
                
            }

            
            ?>
            <form enctype="multipart/form-data" method="post">
            <div class="form-group">
                Title: <input type="text" name="title"><br>
                Description: <input type="text" name="description"><br>
                City: <input type="text" name="city"><br>
                Uploaded By: <input type="text" name="uploadedBy"><br>
                Photo by: <input type="text" name="userName"><br>
                <label for="file1">Upload a file</label>
                <input type="file" name="file1[]" id="file1" multiple />
                <p class="help-block" id="errordiv">Browse for a file and post it to the server.</p>
        </div>
        <input type="submit" />
        </form>
        
    </div>     
        


    <div class="col-md-1" > </div> 
            
            
                
    <div class="col-md-4"  >                 
        <img class="img-responsive" src="user-uploads/<?php echo $uploadInfo[$imageID]['path']; ?>" alt="<?php echo $uploadInfo[$imageID]['title']; ?>">
        <p class="description"><?php echo $uploadInfo[$imageID]['description']; ?></p>
    </div>                 

    <div class="col-md-1" > </div>               
                            
    <div class="col-md-3"  >
        <h2 class="card-title"><?php echo $uploadInfo[$imageID]['title']; ?></h2>
        <ul class="details-list">
            <li>Uploaded By: <a ><?php echo $uploadInfo[$imageID]['uploadedBy']; ?></a></li><br>
            <li>Photo By: <a ><?php echo $uploadInfo[$imageID]['userName']; ?></a></li><br>
            <li>City: <a ><?php echo $uploadInfo[$imageID]['city']; ?></a></li><br>
        </ul>
    </div>
                
                    
                
                
                    
            
    </div>
</div>

<?php include 'footer.inc.php'; ?>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js" ></script>

</body>
</html>
