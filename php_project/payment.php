<?php
session_start();
?>

<?php 

include("navbar.php");





$full_name=$type=$amount=$card_number=$card_name=$email=$address=$date="";
$insertErr="";



if(isset($_POST['donate']) ){
	$full_name = $_POST["full_name"];
	$email = $_POST["email"];
	$address = $_POST["address"];
	$card_name = $_POST["card_name"];
	$card_number = $_POST["card_number"];
	$amount = $_POST["amount"];
	$type = $_POST["event_name"] ; 
	$date =  $_POST["month"];
  



	if(!empty($full_name) && !empty($amount) && !empty($card_number) && !empty($card_name) && !empty($email) && !empty($address) && !empty($type) && !empty($date)){

		$conn= mysqli_connect('localhost','root','','test');
		if($conn==false){
			die("ERROR:could not connect. ".mysqli_connect_error());
		}
       //insert donated info into section donator table
		$sql="INSERT INTO `event_donator`( `full name`,`email`,`address`,`city`,`card name`,`card number`,`expire month`,`amount`,`event title`) VALUES ( '$full_name', '$email','$address','$city','$card_name','$card_number','$date','$amount','$type')";


		//insert donated info into only donator  table
		$sql2 = "INSERT INTO `donator`( `name`,`amount`,`card_number` ) VALUES ( '$full_name', '$amount','$card_number')";

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
 	<div class="container-fluid padding">

 		<div class="row padding row mt-3">
 			
 			<div class="col-md-6"><h1>Billing Address</h1>
 				<form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

 					<div class="form-group">
 						<label for="full_name">Full Name</label>
 						<input type="text" name="full_name" id="full_name" class="form-control" placeholder="your name">
 					</div>


 					<div class="form-group">
 						<label for="email">Email address </label>
 						<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">

 					</div>


 					<div class="form-group">
 						<label for="address">address</label>
 						<input type="text" name="address" id="address" class="form-control" placeholder="gulshan 1,bangladesh">
 					</div>


 					<div class="form-group">
 						<label for="city">City</label>
 						<input type="text" name="city" id="city" class="form-control" placeholder="dhaka">
 					</div>

 				</div>


 				<div class="col-md-6">
 					<h1>Payment Method</h1>
 					<h2>Accepted Card</h2>
 					<div class="image">
 						<img src="img/bkash.jpg" style="height: 40px;width:50px ">
 						<img src="img/bitcoin.jpg" style="height: 40px;width:50px ">
 						<img src="img/visa.png" style="height: 40px;width:50px ">
 						<img src="img/mastercard.jpg" style="height: 40px;width:50px ">
 						
 					</div>
 					
 						<div class="form-group">
 							<label for="card_name">Card Name</label>
 							<input type="text" name="card_name" id="card_name" class="form-control" placeholder="estiak emon">
 						</div>


 						<div class="form-group">
 							<label for="card_number">Card Number</label>
 							<input type="text" name="card_number" id="card_number" class="form-control" placeholder="111-22-3333">
 						</div>

 						<div class="form-group">
 							<label for="card_name">Expire month</label>
 							<input type="date" name="month" id="month" class="form-control" >
 						</div>

 						<div class="form-group">
 							<label for="amount">Amount</label>
 							<input type="text" name="amount" id="amount" class="form-control" >
 						</div>


 						<div class="form-group">
 							<label for="event_name">event_name</label>
 							<input type="text" name="event_name" id="event_name" class="form-control" >
 						</div>
 						<button type="submit" name="donate" class="btn btn-info">donate</button>
 					
                        <p><?php echo "$insertErr" ;?></p>
 				</div>

 			 </form>
 			</div>

 		</div>

 	</div>

 <?php 
include("footer.php");
 ?>

 <?php
session_destroy();
?>