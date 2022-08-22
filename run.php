
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
    left: 300px;
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

.bottom{
 	position: absolute;
    top: 700px;
	left :500px;
	}

.footer{
 	position: absolute;
    top: 1100px;
	left :300px;
	}


img { 
	position: absolute;
    top: 300px;
	left :650px;
	border-radius: 50%;
}


.error{
  position: absolute;
  top: 800px;
	left :300px;

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

<?php
// error_reporting(E_ALL);

// // create a new cURL resource
// $ch = curl_init();

// // set URL and other appropriate options
// curl_setopt($ch, CURLOPT_URL, "http://127.0.0.1:5000/user/Nicholas/");
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_HEADER, 0);

// // grab URL and pass it to the browser
// curl_exec($ch);
// $output = curl_exec($ch);

// if($output == FALSE) {
// 	echo" cURL ERROR :".curl_error($ch);
// }
// // close cURL resource, and free up system resources
// curl_close($ch);
// print_r($output);
echo'<h1 style="color:#2C3E50">';
$url = "http://127.0.0.1:5000/check/";

//The data you want to send via POST
$fields = [
];

//$blank = implode(PHP_EOL, $fields);
//url-ify the data for the POST
$fields_string = http_build_query($fields);
  

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
//$blank = implode(PHP_EOL, $fields_string);
//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//execute post

$result = curl_exec($ch);
echo '<div class="error">';
if($result == FALSE) {
	echo" cURL ERROR :".curl_error($ch);
}
echo '</div>';


echo '<p id="borderimg1">';
echo '<center>';
echo '<img src="image/logo.png" width="400" height="400">';
echo '</center>';
echo '</p>';
echo '<div class="bottom">';
//$jsondata = file_get_contents($fields);
$obj = json_decode($fields_string,true);
echo "<pre>";
print_r($obj);


echo '<br>';
echo '</br>';

print $result;
echo '<br>';
echo '</br>';
echo '</div>';

echo '<div class="footer">';
echo '<center>';

echo 'Ps : It is the biological test for age, please dont take it as serious.';
echo '</center>';
echo '</br>';
echo '</h1>';
echo '</div>';


?>
</body>
</html>