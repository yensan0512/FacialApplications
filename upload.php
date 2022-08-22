
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styling.css">
<body style="background-color:powderblue;"
overflow=auto>
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
}

/* Style the header */


/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 30px 20px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}


.title {
    position: absolute;
	top: 100px;
    left: 700px;
	font-size:40px;
   
}

.word {
    position: absolute;
    top: 180px;
    left: 320px;
	font-size:25px;
}


.button {
    background-color: #06E5F3 ;
    border: none;
    color: white;
    padding: 30px 60px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 40px;
    margin: 350px 200px;
    cursor: pointer;
  }

.footer{
 	position: absolute;
    top: 1100px;
	left :380px;
	}


img { 
	position: absolute;
    top: 300px;
	left :650px;
	border-radius: 50%;
}

.right{
    position: absolute;
    right: 5px;
    width: 1350px;
    border: 3px solid #73AD21;
    padding: 20px;
    height : 350px;
    background-color:black;
}

.sym li{
    font-size: 30px;

}

.bottom{
    position: absolute;
    top: 300px;
    width: 1700px;
    
    

}
</style>



<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
</head>
<body>

<div class="title">Facial Application</div>
<div class="word" style="text-align:center">Our system consists of Age Wrinkle Analysis and Face Beauty Score. Have fun with the test.</div>


<div class="topnav">
  <a href="index.php">Home</a>
  <a href="wrinkle.php">Age Wrinkle Analysis</a>
  <a href="beauty.php">Face Beauty Score</a>
  <!--<a href="acne.php">Acne Analysis</a>-->
</div>

</head>
<body>
<?php

echo '<div class ="bottom">';
echo'<h1 style="color:#2C3E50; text-shadow: 0px 0px;">';
$target_dir = "image/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "";
        $uploadOk = 1;
    } else {
        echo "<center>File is not an image.</center>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "<center>Sorry, file already exists.</center>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<center>Sorry, your file is too large.</center>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<center>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</center>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<center>Sorry, your file was not uploaded.</center>";
// if everything is ok, try to upload file
} else {
    #if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], 'image/logo.png')){
        echo '<br>';
        echo "<center><i>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</i></center>";
        echo '</br>';
    } else {
        echo "<center>Sorry, there was an error uploading your file.</font></center>";
    }
}
echo'</h1>';

// This is the data you want to pass to Python
#$result = system('python C:/xampp/htdocs/faceDetection/app.py ' . escapeshellarg(json_encode($data)));

// Decode the result
#$resultData = json_decode($result, true);

// This will contain: array('status' => 'Yes!')
#var_dump($resultData);
echo '<br>';
echo '<center><i><h1 style="text-shadow: 0px 0px;"><a href="run_b.php">Click here for testing</center></i></h1></a>';
echo '</br>';
echo '</div>';
    
#$output = shell_exec("python app.py");
#var_dump($output);

?>
</body>
</html>