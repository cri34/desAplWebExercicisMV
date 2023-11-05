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
    <div class="container-fluid overflow-hidden" style="height:100vh;">
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
    
        $sql = "SELECT * FROM productes where id =".$_GET["codi"] ;
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()) {
                echo'
                <div class=" row justify-content-center align-items-center text-center ">
                    <div class =" row col justify-content-center "style="height:100vh;">
                        <div class ="row justify-content-center bg-secondary" >
                            <h1>'.$row["nom"].'</h1>
                            <img class = " w-75 p-2" src="'.$row["src"].'" alt="foto" style = "">
                            <h3>'.$row["preu"].'</h3>
                            <form action = "./carreto.php"  method="get">
                                <input type="hidden" name="codi" value="'.$_GET["codi"].'">
                                <input type="submit"  value="comprar" class="col-10 col-md-4" style="height:2rem;">
                            </form>
                        </div>
                    </div>
                    <div style="height:100vh; " class = " row col-8 justify-content-center align-items-start bg-secondary-subtle">
                        <h1>info producte</h1>
                        <p class="col-10">'.$row["descripcio"].'</p>
                    </div>
                </div>
                ';
            }
        
    ?>

    </div>
</body>
</html>
<?php

?>