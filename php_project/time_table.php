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
 

          $sql = "INSERT INTO test_dt(created_at)
VALUES(NOW())";
							 
                             


           if(mysqli_query($conn, $sql)){
                 echo "New record created successfully";
                    } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
              }
