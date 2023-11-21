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
      include 'connexioBDD.php';
      $sql = "SELECT * FROM productes";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo '
              <div class="bg-dark border border-3 border-secondary-subtle m-2" style="width: 200px;" >
                <a class ="text-white text-decoration-none" href = "'.'./fitxa.php?codi='.$row["id"].'">
                  <img  class="img-fluid" style="height: 200px; width: 200px;" src="'.$row["src"].'" alt="foto">
                  <h3>'.$row["nom"].'</h3>
                  <h2>'.$row["preu"].'</h2>
                </a>
              </div>
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
