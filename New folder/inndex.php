<?php

$con = mysqli_connect("localhost","root","root");
mysqli_select_db($con,"v-u-a-p");

if(isset($_POST['submit']))
{
	$name = $_FILES['file']['name'];
	$temp = $_FILES['file']['tmp_name'];
    $ttitle =$_POST["Title"];
    $pprice =  $_POST["Price"];
      echo $ttitle. "and ".$pprice;
	move_uploaded_file($temp,"uploaded/".$name);
	$url = "http://localhost/uploaded/$name";
	mysqli_query($con,"INSERT INTO `videos` VALUE ('','$name','$url')");



          ////////// create new brand directory if not exist
   $dir = "$name";
//$file_to_write = 'test.txt';
//$content_to_write = "The content";

if( is_dir($dir) === false )
{
    mkdir($dir);
}

//$file = fopen($dir . '/' . $file_to_write,"w");

// a different way to write content into
// fwrite($file,"Hello World.");

//fwrite($file, $content_to_write);

// closes the file
//fclose($file);
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Video Upload And Playback Tutorial</title>
<style type="text/css">
.galary {
	color: #C0C;
}
</style>
</head>

<body>
<h3><a href="ima.php" class="galary">Show Galary</a>
</h3>


  <form action="inndex.php" method="POST" enctype="multipart/form-data">
    <p>
      <input type="file" name="file" />
    </p>


<label for="Title">

  Ttitle
  <input type="text" name="Title" id="Title">
      <br>
      <br>
</label>

  <label for="Price">Price
      <input type="text" name="Price" id="Price">
</label>
<p>
  <input type="submit" name="submit" value="Upload!" />
</p>
   </form>

   <?php

  if(isset($_POST['submit']))
{
	echo "<br />".$name." has been uploaded";
}

?>


</body>
</html>