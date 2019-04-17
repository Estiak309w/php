
<?php
session_start();
?>
 <html>
   
   <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta charset="UTF-8 ">
   </head>

  <?php 
include_once("navbar.php");
 ?>

<?php 
$nameErr =  $passErr=  "";

$name ="";
$password =$result=$row="";

if(isset($_POST['login']) ){

 if (empty($_POST["name"])) {
  $nameErr = "Name is required";
}else{
 $name = $_POST["name"];
}
if (empty($_POST["password"])) {
  $passErr = "password is required";
}else{
 $password = $_POST["password"];
}


        //connection
$conn= mysqli_connect('localhost','root','','test');
if($conn==false){
 die("ERROR:could not connect. ".mysqli_connect_error());
}
if(!empty($name) &&  !empty($password)){

     

    $sql="SELECT * FROM j WHERE name='$name' AND password='$password'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) >0){
      while($row=mysqli_fetch_assoc($result)){
        //check if login person is admin then redirect to admin page
        if($row['type']=='admin'){
          $_SESSION["name"] = $row["name"];
          $_SESSION['email']=$row['email'];
          $_SESSION['login']="login";
          header("Location: admin_page.php");

        }
        if($row['type']=='user'){//normal user are redirected to user page
          $_SESSION["name"] = $row["name"];
          $_SESSION['email']=$row['email'];
          $_SESSION['login']="login";
          header("Location: user.php");
        }
      }

      
      

    }

    else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
      mysqli_close($conn);    
    }


  }          


else{
  $insertErr = "insert data first ";
}

}
?>

	
	<body>

  <div class="container">
    <div class="jumbotron">

   	<form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         <h1>Login </h1>
         <form>
                         
                   <div class="form-group">
                    <label for="name">Enter your name</label>
                     <input type="text" name="name" id="name" class="form-control" placeholder="your name">  
                   </div>
                  
                  <div class="form-group">
                      <label for="password">Password</label>
                       <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                  </div>
                  
                  
                      <button type="submit" name="login" class="btn btn-primary">Login</button>
                      <p>don't have an account?<a href="reg.php">sign in here</a></p>
            
      </form>
      </div>
   </div>   
    

</body>




  <?php 
include_once("footer.php");
 ?>