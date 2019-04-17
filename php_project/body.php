
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta charset="UTF-8 ">
    <title>this is a bootstrap project</title>
</head>

<body>
  <?php include_once 'navbar.php'; ?>
  <div class="container">
  	<h1 align="center">This Is  A Non Profitable Organization</h1>
  </div>






<?php include_once("section_donate.php"); ?>


<div class="container"> 
	<div class="container-fluid padding">
		<div class="row padding row mt-3">
			<div class="col-md-12">
				<div class="card" >
					<a href="body.php"><img class="card-img-top"  style="height:175px" src="img/volunteer.jpg"></a>
					<div class="card-body">
						<h4 class="card-title">
							Become Volunteer
						</h4>
						<p class="card-text">we will be pleased , if you join with us ,in such a great work and serve the children</p>
						<a href="reg.php"  class="btn btn-outline-primary">Join Us</a>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>



<?php include("event_inside_body.php") ?>

<?php include_once("footer.php")  ?>
</body>
</html>
