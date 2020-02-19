<?php
    $connect = mysqli_connect("localhost","root","ITIintake40","cafeteria_php");
    $query   = "SELECT email FROM users";
    if ($result=mysqli_query($connect,$query))
      {
      // Fetch one and one row
      while ($row=mysqli_fetch_row($result))
        {
         $emails = $row;
        }
      // Free result set
      mysqli_free_result($result);
    }



if (in_array($_GET['email'], $emails)) {
   echo "this email already exists";
}

?>