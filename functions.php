    ////// chech file exits  ////////
    <?php
 function isfileexit($file_name,$tablename)
 {
    $isfileexit = FALSE;
    $query = mysqli_query($conn,"SELECT * FROM `$tablename`");
    while($row = mysqli_fetch_assoc($query))
    {
	$id = $row['id'];
	if($file_name == $row['name'])
         {
       $isfileexit = ture;
       echo "file name already exist ";
         }
    }

    return  $isfileexit;
}

   ?>