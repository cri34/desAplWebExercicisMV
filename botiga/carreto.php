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
      <h1>CARRETO</h1>
      <div class="row col-sm-10 col-md-7 col-lg-6 col-12 justify-content-center text-center">
      
<?php
include 'connexioBDD.php';
session_start();
if(isset($_GET["compraRealitzada"])){
  session_destroy();
}else{
  introduirArticleCarreto();
  carreto($conn);
}

function introduirArticleCarreto(){
  if(isset($_GET["codi"])){
    if(!isset($_SESSION["carreto"])){
         $_SESSION["carreto"] = array();
     } 
     $length = count($_SESSION["carreto"]);
     $_SESSION["carreto"][$length] = $_GET["codi"];
 }
}

function carreto($conn){


$codisIn = implode(', ', $_SESSION["carreto"]);
$sql = 'SELECT * FROM productes WHERE id IN('.$codisIn.')';
$result = $conn->query($sql);
$total=0;
//adaptar para carreto.php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo '
          <div class="row justify-content-center bg-dark border border-3 border-secondary-subtle m-2" style="height: 50px;" >
          <a class ="row justify-content-around text-white text-decoration-none" href = "'.'./fitxa.php?codi='.$row["id"].'">
              <img  class= col "img-fluid" style="height: 50px; width: 50px;" src="'.$row["src"].'" alt="foto">
              <h3 class="col">'.$row["nom"].'</h3>
              <h2 class="col">'.$row["preu"].'</h2>
            </a>
          </div>
      ';
      $total += $row["preu"]; 
    }
  } else {
    echo "0 results";
  }
  $conn->close();

  echo'<h3 class="row justify-content-center bg-dark text-white border border-3 border-secondary-subtle m-2" style="height: 50px;">total : '.$total.'</h3>';
}
?> 
      </div>

      <div class="row justify-content-center m-2">
        <form action="carreto.php" method="get" class="col-5">
          <input type="submit" name="compraRealitzada" value="comprar productes" class="col-12" style="height:2rem;">
        </form>
        <button class="col-5">
          <a class="row justify-content-around text-black text-decoration-none" href="./llista.php">tornar a sa galeria</a>
        </button>
      </div>
    </div> 
</div>
</body>
</html>
