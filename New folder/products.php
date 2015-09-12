<?php

$conn = mysqli_connect("localhost","root","root");
mysqli_select_db($conn,"v-u-a-p");



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

<!--
<h3><a href="ima.php" class="galary">Show Galary</a>
</h3>  -->


  <form action="products.php" method="POST" enctype="multipart/form-data">
    <p>
      insert new product <input type="file" name="file" />



<label for="Title">

  Ttitle
  <input type="text" name="Title" id="Title">
      <br>
      <br>
</label>

  <label for="Price">Price
      <input type="text" name="Price" id="Price">
</label>

  <input type="submit" name="submit" value="Upload!" />
     </p>
   </form>

   <?php

  if(isset($_POST['submit']))
{


    $name = $_FILES['file']['name'];
	$temp = $_FILES['file']['tmp_name'];
    $ttitle =$_POST["Title"];
    $pprice =  $_POST["Price"];
     echo $ttitle. "and ".$pprice;
	move_uploaded_file($temp,"products/".$name);
	$url = "http://localhost/products/$name";
   	mysqli_query($conn,"INSERT INTO `products` VALUE ('','1','$url','$ttitle','$pprice','$name')");

       echo "<br />".$name." has been uploaded";
        header("Location: products.php");
       unset($_POST);

}
 $query = mysqli_query($conn,"SELECT * FROM `products`");

echo "<table width='160' border='1' align='center'>";
while($row = mysqli_fetch_assoc($query))
{
	$id = $row['id'];
	$name = $row['name'];
    $brand_id = $row['brand_id'];


$url = "http://localhost/products/".$name;
echo "<tr>
    <td width='152' height='150'>



      <a href='productdetails.php?id=$id'>
               <img src='$url' width='150' height='150' alt='1' />
         </a>

<a href='viewproduct.php?id=$id'>$name</a><br />
  <a href='deleteproduct.php?id=$id'>delete</a>
     <a style='text-decoration:none;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </a>
     <a href='viewproduct.php?id=$id'> view</a>
	 </td>";

              if($roww = mysqli_fetch_assoc($query))  {
  	$idd = $roww['id'];
	$namee = $roww['brand_id'];

$url = "http://localhost/products/".$namee;

echo "
    <td width='152' height='150'>

   <a href='productdetails.php?id=$idd'>
               <img src='$url' width='150' height='150' alt='1' />
         </a>

 <a href='viewproduct.php?id=$idd'>$namee</a><br />
  <a href='deleteproduct.php?id=$idd'>delete</a>
     <a style='text-decoration:none;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </a>
     <a href='viewproduct.php?id=$idd'> view</a>
    </td>";


    }

  echo "</tr>";
  echo "<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>";
}
echo "</table>";
?>


</body>
</html>