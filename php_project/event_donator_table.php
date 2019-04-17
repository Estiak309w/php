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
 

          $sql = "CREATE TABLE  `event_donator`(
		                     
                             full name varchar(15) NOT NULL,
							 email varchar(25) NOT NULL,
							 address varchar(25) NOT NULL,
							 city varchar(25) NOT NULL,
							 card name varchar(15) NOT NULL,
                             card number varchar(15) NOT NULL,
							 expire month DATE,
							 amount int(8) NOT NULL, 
                             event title varchar(25) NOT NULL,
							 PRIMARY KEY(`email`)
							 
                             )";
                             


           if(mysqli_query($conn, $sql)){
                 echo "New record created successfully";
                    } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
              }
