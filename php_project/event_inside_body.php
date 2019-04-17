<?php include_once("navbar.php") ?>

<script>
		function send_event(array_title){
			window.location ="payment.php?type="+array_title;
		}
	</script>

<?php 
$title =$location = $target =$type=array();
$total_amount = "";
$array_title =$array_location=$array_target=$array_type=$array_created_at= array();
$conn= mysqli_connect('localhost','root','','test');
if($conn==false){
 die("ERROR:could not connect. ".mysqli_connect_error());
}

//this portion will retrieve event info for showing in card
$sql="SELECT * FROM event ORDER BY created_at DESC";

$result = mysqli_query($conn,$sql);
$i=0;
if(mysqli_num_rows($result) >0){
	while($row=mysqli_fetch_assoc($result)){

		
		array_push($array_title, $row["title"]);
		array_push($array_location, $row["location"]);
		array_push($array_target, $row["target"]);
		array_push($array_type, $row["type"]);
		array_push($array_created_at, $row["created_at"]);
	
       
	}
}

function find_sum_from_event($array_title){
//this will pick total amount of money from event donator table
	$conn= mysqli_connect('localhost','root','','test');
	$sql2="SELECT * from event_donator WHERE `event title`='$array_title' ";
	$result2 = mysqli_query($conn,$sql2);
	$total = 0;
	if(mysqli_num_rows($result2) >0){
		while($row2=mysqli_fetch_assoc($result2)){

			$total += $row2["amount"];
		}
	}
	return $total;
}
 ?>

<div class="container"> 
	<div class="container-fluid padding">
		<div class="row padding row mt-3">
			<div class="col-md-6">
				<h1>Donate on recent Events</h1>


				<div class="card" >
					<a href="body.php"><img class="card-img-top"  style="height:175px" src="img/card4.jpg"></a>
					<div class="card-body">
						<h4 class="card-title">
							<?php echo $array_title[0]; ?>
						</h4>
						<p class="card-text"><?php echo $array_location[0] ?></p>
						<p class="card-text">created at:<?php echo $array_created_at[0] ?></p>
						<p class="card-text" style="color: red">target:৳ <?php echo $array_target[0]; ?></p>
						<p class="card-text">Type:<?php echo $array_type[0];  ?></p>
                        <p class="card-text"  style="color: red">Reached:৳<?php echo find_sum_from_event($array_title[0]); ?></p>
						  <?php  $_SESSION["event_title"] = $array_title[0]; ?>
						<a href="payment.php"  class="btn btn-outline-primary">Donate</a>
					</div>

				</div>
			</div>


			<div class="col-md-6">
				<h1>Donate on recent Events</h1>


				<div class="card" >
					<a href="body.php"><img class="card-img-top"  style="height:175px" src="img/card4.jpg"></a>
					<div class="card-body">
						<h4 class="card-title">
							<?php echo $array_title[2]; ?>
						</h4>
						<p class="card-text"><?php echo $array_location[2] ?></p>
						<p class="card-text">created at:<?php echo $array_created_at[2] ?></p>
						<p class="card-text" style="color: red">target:৳ <?php echo $array_target[2]; ?></p>
						<p class="card-text">Type:<?php echo $array_type[2];  ?></p>
                        <p class="card-text"  style="color: red">Reached:৳<?php echo find_sum_from_event($array_title[2]); ?></p>
						 
						  <!-- <div class="text" onclick="send_event(<?php echo $array_title[2];?>)">Buy Now</div> -->
			
					<a href="payment.php"  onclick="send_event(<?php echo $array_title[2];?>)" class="btn btn-outline-primary">Donate</a> 
					</div>

				</div>
			</div></div>
			</div>
		</div>
	</div>
</div>




<div class="container"> 
	<div class="container-fluid padding">
		<div class="row padding row mt-3">
			<div class="col-md-6">
				<div class="card" >
					<a href="body.php"><img class="card-img-top"  style="height:175px" src="img/rangpur.jpg"></a>
					<div class="card-body">
						<h4 class="card-title">
							<?php echo $array_title[1]; ?>
						</h4>
						<p class="card-text"><?php echo $array_location[1] ?></p>
						<p class="card-text">created at:<?php echo $array_created_at[1] ?></p>
						<p class="card-text" style="color: red">target:৳ <?php echo $array_target[1]; ?></p>
						<p class="card-text">Type:<?php echo $array_type[1];  ?></p>
                        <p class="card-text"  style="color: red">Reached:৳<?php echo find_sum_from_event($array_title[1]); ?></p>
						  

						<a href="payment.php"  class="btn btn-outline-primary">Donate</a>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<?php include("footer.php") ?>