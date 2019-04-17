<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta charset="UTF-8 ">
    <title>this is a bootstrap project</title>
</head>

<body>



  <?php include_once 'navbar.php'; ?>
 
  <?php 
  $nameErr = $emailErr = $passErr="";
  
  $name = $email =  $password = "";

 if(isset($_POST['submit']) ){
       
             if (empty($_POST["name"])) {
                $nameErr = "Name is required";
             }else{
               $name = $_POST["name"];
             }


             //password matching
             if (empty($_POST["password1"]) || empty($_POST["password2"] )) {
               $passErr = "password filed is empty";
           }
           else{
             if($_POST["password1"] == $_POST["password2"]){
               $password = $_POST["password2"]; 
               
             }
             else{
               $passErr = "password1 and password2 didnt match";
           }

         }

       //inserting into database


      if (empty($_POST["email"])) {
                $emailErr = "email is required";
             }else{
              $email  = $_POST["email"];
             }
        
       
        

       
  
        //connection
        $conn= mysqli_connect('localhost','root','','test');
     if($conn==false){
     die("ERROR:could not connect. ".mysqli_connect_error());
     }
     $sql="INSERT INTO `a`( `name`,`email`,`password` ) VALUES ( '$name', '$email','$password')";
    if(mysqli_query($conn, $sql)){
       //echo "Data are inserted successfully.";
     
    }
    else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
      mysqli_close($conn);
    
       }

         

 }
     

 
  ?>



 <div class="container">
   <div class="jumbotron">
     <form method = "POST" action = "insert_sign_in.php">
      <h1>Please sign in</h1>
      <div class="form-group">
        <label for="name">Enter Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
        <small class="form-text text-muted" ><?php echo $nameErr;  ?></small>
      </div>
       <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
       </div>
       <div class="form-group">
          <label for="Password1">Password</label>
           <input type="password" class="form-control" id="Password1" name="password1" placeholder="Password">
           <small class="form-text text-muted" ><?php echo $passErr;  ?></small>
        </div>
        <div class="form-group">
          <label for="Password2">Confirm Password</label>
           <input type="password" class="form-control" id="Password2" name="password2" placeholder="Password again">
           <small class="form-text text-muted" ><?php echo $passErr;  ?></small>
        </div>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
     </form>
   </div>
 </div>


</body>

</html>
