<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styling.css">
<body style="background-color:#D7BDE2;"
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
    
    $img = $_POST['image'];
    $folderPath = "image/";
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = 'logo.png';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
  
   

   
    echo '<div class ="bottom">';
    echo '<br>';
    echo '<center><i><h1 style="color:darkblue">';
    print_r($fileName);
    echo '</center></i></h1>';
    echo '</br>';
    
    echo '<br>';
    echo '<center><i><h1 style="color:darkblue">Your file has been uploaded successfully</center></i></h1>';
    echo '</br>';

    echo '<br>';
    echo '<center><i><h1><a href="run.php">Click here for testing</a></center></i></h1>';

    echo '</br>';
    echo '</div>';

    
   
?>
</body>
</html>
