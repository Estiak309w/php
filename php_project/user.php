<?php
session_start();
?>
<?php 
include("navbar.php");

include "db_connect.php";
$name = $email= $type = "";


?>



<div class="container">
	<h1>WELOCOME TO user page</h1>
</div>

<div class="container"> 
	<div class="container-fluid padding">
		<div class="row padding">

			<div class='col-md-6'>
				
				<a href="update_password.php">Change Password</a><br>
				<?php echo "<a href='donator_list.php' >see our donator </a>" ;?><br>
				
				<?php echo "<a href='adminlogout.php' >Logout </a>" ;?>
				
			</div> 
			<div class="col-md-6">

				<h1>User profile</h1>
				<p>Welcome <h1><?php echo $_SESSION["name"]; ?></h1></p>
				<p>Your email id is :<h1><?php echo $_SESSION["email"]; ?></h1></p>
			</div>

			<div class="col-md-12">

				<h1> Welcome to this page</h1>
				<p>As an user,you can control profile</p>
			</div>
		</div>
	</div>
</div>

<?php include_once("footer.php") ?>