<?php
 $name = $email = $password1 = $password1 = "";
 
 $name = "akash";
 $email = "es@gmail.com";
 $password1 = 1234;
 $password2 = 1234;
$conn= mysqli_connect('localhost','root','','test');
    if($conn==false){
    die("ERROR:could not connect. ".mysqli_connect_error());
    }
    $sql="INSERT INTO `user` ( `name`,`email`,`password1`,`password2` ) VALUES ( '$name', '$email', '$password1', '$password2')";
   if(mysqli_query($conn, $sql)){
      echo "Data are inserted successfully.";
    
   }
   else{
     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
   mysqli_close($conn);
 }
?>
