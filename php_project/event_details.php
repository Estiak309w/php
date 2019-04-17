<?php
session_start();
?>
<?php include "navbar.php" ?>

<table class="table table-striped">                     
    <div class="table responsive">
        <thead>
            <tr>
             
              <th>Title</th>
              <th>Location</th>
              <th>target</th>
              <th>type</th>
              <th>created_at</th>
            </tr>
        </thead>
        <tbody>

<?php  
$conn= mysqli_connect('localhost','root','','test');
if($conn==false){
 die("ERROR:could not connect. ".mysqli_connect_error());
}
 $email= $type ="";
$user = array();


	$sql="SELECT * FROM event";

	if($result=mysqli_query($conn,$sql)){
    if(mysqli_num_rows($result)>0){
    	while($row=mysqli_fetch_array($result)){
				echo '<tr>
                  <td scope="row">' . $row["title"]. '</td>
                  <td>' . $row["location"] .'</td>
                  <td>' . $row["target"] .'</td>
                  <td> '.$row["type"] .'</td>
                  <td> '.$row["created_at"] .'</td>
                  </tr>';
			}
		}
	}
else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

?>


</tbody>
    </div>
</table>

<div class="container">

  <div class="text-right"><a href="payment.php"  class="btn btn-primary">Donate</a></div>
	<a href="body.php"><img class="card-img-top" align="center" style="height:50px ;width:50px ;" src="img/back.png"></a>

  
	
</div>

<?php  include("footer.php")?>