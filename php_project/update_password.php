<?php
session_start();
?>

<?php include("navbar.php") ?>

<?php 
$old_pass=$new_pass1=$new_pass2=$passErr=$password=$db_password="";
$name=$_SESSION["name"];


$conn= mysqli_connect('localhost','root','','test');
if($conn==false){
 die("ERROR:could not connect. ".mysqli_connect_error());
}

if(isset($_POST['update']) ){
						 //password matching..........................................
if (empty($_POST["new_pass1"]) || empty($_POST["new_pass2"]) || empty($_POST['old_pass'])) {
 $passErr = "password filed is empty";
}
else{
 if($_POST["new_pass1"] == $_POST["new_pass2"]){
	 $password = $_POST["new_pass2"]; 
	 $old_pass = $_POST['old_pass'];

 }
 else{
	
	$passErr = "password1 and password2 didnt match";
}

}


//checking old password......................................................
$sql = "SELECT * FROM `j` WHERE `name`='$name'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) >0){
      while($row=mysqli_fetch_assoc($result)){
        $db_password = $row['password']; 
                
      }
    }

if($db_password==$old_pass){
	$sql2 = "UPDATE `j` SET `password`='$password' WHERE `name`='$name'";

	if (mysqli_query($conn, $sql2)) {
		header("Location: admin_page.php");
	} else {
		echo "Error updating record: " . $conn->error;
	}

}else{
	$passErr="old password mismatch";
}


mysqli_close($conn);


}
 ?>
<body>


	<div class="container">
		<div class="jumbotron">

			<form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<h1>Change Password</h1>
				<form>
                    <div class="form-group">
						<label for="password1">Old Password</label>
						<input type="password" name="old_pass" class="form-control" id="password1" placeholder="Password">
						<small id="" class="form-text text-muted"><?php echo '$passErr'; ?></small>
					</div>
					
					<div class="form-group">
						<label for="password1">New Password</label>
						<input type="password" name="new_pass1" class="form-control" id="password1" placeholder="Password">
						<small id="" class="form-text text-muted"><?php echo "$passErr"; ?></small>
					</div>
					<div class="form-group">
						<label for="password2">Confirm Password</label>
						<input type="password"name="new_pass2" class="form-control" id="password2" placeholder="confirm Password">
						<small id="" class="form-text text-muted"><?php echo "$passErr"; ?></small>
					</div>


					<button type="submit" name="update" class="btn btn-primary">Submit</button>

				</form>
			</div>
		</div>   
<?php include("footer.php") ?>
