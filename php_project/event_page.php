<?php
session_start();
?>

<?php include("navbar.php") ?>
<?php 
$title = $location = $target = $event_type = "";
date_default_timezone_set("Asia/Dhaka");

if(isset($_POST['create']) ){
	$title = $_POST["title"];
	$location = $_POST["location"];
	$target = $_POST["target"];
	$event_type = $_POST["event_type"];
      $date = date("Y-m-d H:i:s");




	$conn= mysqli_connect('localhost','root','','test');
	if($conn==false){
		die("ERROR:could not connect. ".mysqli_connect_error());
	}
	if(!empty($title) && !empty($location) && !empty($target) && !empty($event_type)){



		$sql="INSERT INTO `event`( `title`,`location`,`target`,`type` ,`created_at`) VALUES ( '$title', '$location','$target','$event_type','$date')";
		if(mysqli_query($conn,$sql) ){
			header("Location: admin_page.php");

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



<div class="container">
	<div class="jumbotron">

		<form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<h1>Event creation</h1>
			<form>
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" id="title" class="form-control">
				</div>

				<div class="form-group">
					<label for="location">Location</label>
					<input type="text" name="location" id="location" class="form-control">
				</div>

				<div class="form-group">
					<label for="target">Target</label>
					<input type="text" name="target" id="target" class="form-control">
				</div>

				<div class="form-group">
						<label for="type">Event type</label>
						<select class="form-control" id="type" name="event_type" style="width:300px">
							<option value="education">Educational</option>
							<option  value="food">food</option>
							<option  value="health">health</option>
						</select>
				</div>

				<button type="submit" name="create" class="btn btn-primary">create</button> 
			</form>

		</form>
	</div>
</div>




<?php include("footer.php") ?>