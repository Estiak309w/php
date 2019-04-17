<?php 
include("navbar.php");
?>

<table class="table table-striped">                     
    <div class="table responsive">
        <thead>
            <tr>
             
              <th>Name</th>
              <th>Amount</th>
             
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


	$sql="SELECT * FROM donator";

	if($result=mysqli_query($conn,$sql)){
    if(mysqli_num_rows($result)>0){
    	while($row=mysqli_fetch_array($result)){
				echo '<tr>
                  <td scope="row">' . $row["name"]. '</td>
                  <td>' . $row["amount"] .'</td>
              
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

  
	<a href="user.php"><img class="card-img-top" align="center" style="height:50px ;width:50px ;" src="img/back.png"></a>

  
	
</div>

<?php  include("footer.php")?>






