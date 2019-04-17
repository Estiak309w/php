<html>
   
   <head>
      <style>
         .error {color: #FF0000;}
      </style>
   </head>
   
   <body> 
      <?php
         // define variables and set to empty values
         $nameErr = $emailErr = $genderErr = $passErr = $birthErr = $addressErr = $courseErr = $courseErrnum =$lenErr="";
         $name = $email = $gender = $class = $course = $subject = "";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
			 
			 function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
		
         }
			 
			 
			 
            if (empty($_POST["name"])) {
               $nameErr = "Name is required";
            }else {
            	if(strlen($_POST["name"]>6 and $_POST["name"]<15 )){
                $name = test_input($_POST["name"]);
                }else{
                	$lenErr = "length short ot long";
                }
            }
            




             if (empty($_POST["password"])) {
               $passErr = "password is required";
            }else {
               $password = test_input($_POST["password"]);
            }







            if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }else {
               $email = test_input($_POST["email"]);
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
            }






             if (empty($_POST["address"])) {
               $addressErr = "address is required";
            }else {
               $address = test_input($_POST["address"]);
            }

           



            if (empty($_POST["birth"])) {
               $birthErr = "birth is required";
            }else {
               $birth = test_input($_POST["birth"]);
            }




            if (empty($_POST["gender"])) {
               $genderErr = "Gender is required";
            }else {
               $gender = test_input($_POST["gender"]);
            }





            
            if (empty($_POST["course"])) {
               $courseErr = "course field is required";
            }else {
            	
            	if(is_numeric($_POST["course"])){
            		$course = test_input($_POST["course"]);
            		

            	}else{
            		$courseErrnum = "course must be integer";
            	}
               
            }
            
           
            
            
           
         
         
         
		 
		 
		 
		 
		  //connection
        $conn= mysqli_connect('localhost','root','','test');
     if($conn==false){
     die("ERROR:could not connect. ".mysqli_connect_error());
     }
     $sql="INSERT INTO `b`( `name`,`email`,`password` ) VALUES ( '$name', '$email','$password')";
    if(mysqli_query($conn, $sql)){
       //echo "Data are inserted successfully.";
     
    }
    else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
      mysqli_close($conn);
    
       }
		 }
	   
      ?>
		
      <h2>Absolute classes registration</h2>
      
      <p><span class = "error">* required field.</span></p>
      
      <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         <table>
            <tr>
               <td>UserName:</td>
               <td><input type = "text" name = "name">
                  <span class = "error">* <?php   echo $nameErr; echo $lenErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>password: </td>
               <td><input type = "text" name = "password">
                  <span class = "error">* <?php  $passErr=$passErr; echo $passErr; ?></span>
               </td>
            </tr>
            
            <tr>
               <td>Email:</td>
               <td> <input type = "text" name = "email">
                  <span class = "error"><?php  $emailErr=$emailErr; echo $emailErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>Address:</td>
               <td> <textarea name = "address" rows = "5" cols = "40"></textarea>
                     <span class = "error"><?php  $addressErr=$addressErr; echo $addressErr;?></span
               </td>
            </tr>


            <tr>
               <td>date of Birth: </td>
               <td><input type = "date" name = "birth">
                  <span class = "error">* <?php  $birthErr=$birthErr; echo $birthErr;?></span>
               </td>
            </tr>

            
            <tr>
               <td>Gender:</td>
               <td>
                  <input type = "radio" name = "gender" value = "female">Female
                  <input type = "radio" name = "gender" value = "male">Male
                  <span class = "error">* <?php   $genderErr=$genderErr;  echo $genderErr;?></span>
               </td>
            </tr>
            
           <tr>
               <td>number of course enrolled:</td>
               <td> <input type = "text" name = "course">
                  <span class = "error"><?php   $courseErr = $courseErr;  echo $courseErr;   echo $courseErrnum;?></span>
               </td>
            </tr>
            
           
            
            <tr>
               <td>
                  <input type = "submit" name = "submit" value = "register button"> 
               </td>
            </tr>
            
         </table>
      </form>
      
      
      
   </body>
</html>