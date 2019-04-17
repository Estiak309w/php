  <?php     
        $servername = "localhost";
        $username = "root";
         $password = "";
          $dbname = "test";

          // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);

           // Check connection
            if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
              }
            echo "Connected successfully";
 

          $sql = "CREATE TABLE  `donator`(
		                     id int(11) NOT NULL AUTO_INCREMENT,
                             name varchar(25) NOT NULL,
                             card_number varchar(25) NOT NULL,
							 amount int(8) NOT NULL, 
                             PRIMARY KEY(`id`)
							 
                             )";
                             


           if(mysqli_query($conn, $sql)){
                 echo "New record created successfully";
                    } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
              }
