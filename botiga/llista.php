<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
   <div class= "container-fluid  overflow-hidden">
    <div class="row justify-content-center text-center">
      <?php
      $servername = "localhost";
      $username = "admin";
      $password = "secret";
      $dbname = "botiga";
      
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
      $sql = "SELECT * FROM productes";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo '
          <a href = "'.'./fitxa.php?codi='.$row["id"].'">
              <div class="bg-success border border-3 border-black m-2" style="width: 200px;" >
                <img  class="img-fluid" style="height: 200px; width: 200px;" src="'.$row["src"].'" alt="foto">
                <h3>'.$row["nom"].'</h3>
                <h2>'.$row["preu"].'</h2>
              </div>
          </a>
          ';
         // echo "id: " . $row["id"]. " - Name: " . $row["nom"]. " src:" . $row["src"]." preu:".$row["preu"]. "<br>";
        }
      } else {
        echo "0 results";
      }
      $conn->close();
      ?>
    </div> 
   </div>
    
</body>
</html>
