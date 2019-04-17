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
 

          $sql = "CREATE TABLE  `event`(
                             title varchar(25) NOT NULL,
							 location varchar(20) NOT NULL,
                             target int(10) NOT NULL,
							 type varchar(10) NOT NULL,
							 created_at DATETIME
                             
                             )";
                             


           if(mysqli_query($conn, $sql)){
                 echo "New record created successfully";
                    } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
              }
