
<!DOCTYPE html>
<html>
<head>
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


h1 {
    position: absolute;
    top: 20%;
    left: 48%;
    transform: translateX(-48%) translateY(-20%);
   
}

h3{
    position: absolute;
    top: 35%;
    left: 40%;
    transform: translateX(-40%) translateY(-35%);
}


.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 30px 60px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 40px;
    margin: 350px 250px;
    cursor: pointer;
  }


.name{
    text-align:center;
    font-size:25px;
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

<h1>Face Beauty Score</h1>
<h3 style="text-align:center">Rate your face in 1-5. How beautiful are you according to science?  
Upload photo or use your camera to upload a clear photo of your face, or use your profile picture on facebook.
Your data is safe - We will never store your private info.
</h3>



<div class="topnav">
  <a href="index.php">Home</a>
  <a href="wrinkle.php">Age Wrinkle Analysis</a>
  <a href="beauty.php">Face Beauty Score</a>
  <!--<a href="acne.php">Acne Analysis</a>-->
</div>

</body>
</html>

<a href="capture.php" class="button">Capture Image</a>
<a href="display.html" class="button">Upload Image</a>

<footer>
    <div class="name" >Created by: Woo Yen San &copy  2019</div>
</footer>
</body>


</html>

