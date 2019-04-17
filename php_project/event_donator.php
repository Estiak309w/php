<?php
session_start();
?>

<?php include('navbar.php') ?>

<?php  

$name=$title=$amount=$card_number="";


if(isset($_POST['donate']) ){
	$name = $_POST["name"];
	$amount = $_POST["amount"];
	$card_number = $_POST["card_number"];
	$title = $_SESSION["title"]; 




	if(!empty($name) && !empty($amount) && !empty($card_number)){

		$conn= mysqli_connect('localhost','root','','test');
		if($conn==false){
			die("ERROR:could not connect. ".mysqli_connect_error());
		}
       //insert donated info into event donator table
		$sql="INSERT INTO `event_donator`( `name`,`event_name`,`amount`,`card number` ) VALUES ( '$name', '$title','$amount','$card_number')";


		//insert donated info into only donator  table
		$sql2 = "INSERT INTO `donator`( `name`,`amount`,`card_number` ) VALUES ( '$name', '$amount','$card_number')";

		if(mysqli_query($conn,$sql) ){
			if(mysqli_query($conn,$sql2) ){

			header("Location: body.php");
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


<div class="container">
		<div class="jumbotron">

			<form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<h1>welcome</h1>
				<form>

					<div class="form-group">
						<label for="name">Enter your name</label>
						<input type="text" name="name" id="name" class="form-control" placeholder="your name">
						

					</div>


					<div class="form-group">
						<label for="amount">Amount </label>
						<input type="text" class="form-control" name="amount" id="amount" aria-describedby="emailHelp" placeholder="Enter amount">		
					</div>

					<div class="form-group">
						<label for="card_number">Enter card number </label>
						<input type="text" class="form-control" name="card_number" id="card_number" aria-describedby="emailHelp" placeholder="your card number">		
					</div>
					
					<button type="donate" name="donate" class="btn btn-primary">donate</button>

				</form>
			</div>
		</div>   

<?php include('footer.php') ?>
<?php session_destroy(); ?>