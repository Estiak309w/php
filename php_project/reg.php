<html>

<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<meta charset="UTF-8 ">
</head>


<?php 
include_once("navbar.php");
?>
<?php 
$nameErr = $emailErr = $passErr= $insertErr=$typeErr= "";

$name ="";
$email ="";
$password = $type ="";

if(isset($_POST['reg']) ){

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
	if(strlen($_POST["password1"])>6){
		if($_POST["password1"] == $_POST["password2"]){
			$password = $_POST["password2"];
		}else{$passErr = "password1 and password2 didnt match";}


	}
	else{

		$passErr = "password length must be greater than 6 digit";
	}

}

			 //inserting into database


if (empty($_POST["email"])) {
	$emailErr = "email is required";
}else{
	$email  = $_POST["email"];
}

if (empty($_POST["type"])) {
	$typeErr = "please select an option";
}else{
	$type  = $_POST["type"];
}

				//connection
$conn= mysqli_connect('localhost','root','','test');
if($conn==false){
 die("ERROR:could not connect. ".mysqli_connect_error());
}
if(!empty($name) && !empty($email) && !empty($type) && !empty($password) ){



		$sql="INSERT INTO `j`( `name`,`email`,`password`,`type` ) VALUES ( '$name', '$email','$password','$type')";
		if(mysqli_query($conn,$sql) ){

			header("Location: login.php");

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
				<h1>REGISTRATION</h1>
				<form>

					<div class="form-group">
						<label for="name">Enter your name</label>
						<input type="text" name="name" id="name" class="form-control" placeholder="your name">
						<small  class="form-text text-muted"><?php echo "$nameErr";  ?></small>

					</div>


					<div class="form-group">
						<label for="email">Email address </label>
						<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
						<small id="emailHelp" class="form-text text-muted"><?php echo "$emailErr";  ?></small>
					</div>


					<div class="form-group">
						<label for="password1">Password</label>
						<input type="password" name="password1" class="form-control" id="password1" placeholder="Password">
						<small id="" class="form-text text-muted"><?php echo "$passErr"; ?></small>
					</div>

					<div class="form-group">
						<label for="password2">Password</label>
						<input type="password"name="password2" class="form-control" id="password2" placeholder="confirm Password">
						<small id="" class="form-text text-muted"><?php echo "$passErr"; ?></small>
					</div>

					<div class="form-group">
						<label for="type">User type:</label>
						<select class="form-control" id="type" name="type" style="width:300px">
							<option value="user">user</option>
							<option  value="volunteer">volunteer</option>
							<option  value="donator">donator</option>
							<option value="admin"> Admin</option>
						</select>
					</div> 


					<button type="submit" name="reg" class="btn btn-primary">Submit</button>

				</form>
			</div>
		</div>   

<?php 
include_once("footer.php");
?>  
</body>
</html>