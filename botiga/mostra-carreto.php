<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container-fluid  overflow-hidden">
    <div class="row justify-content-center text-center">
        <h1>CARRETO</h1>
        <div class="row col-sm-10 col-md-7 col-lg-6 col-12 justify-content-center text-center">

            <?php
            carreto();
            function carreto()
            {
                $minLength = 0;
                include 'connexioBDD.php';
                $codisIn = implode(', ', $_SESSION["carreto"]);
                if (count($_SESSION["carreto"]) > $minLength) {
                    $sql = 'SELECT * FROM productes WHERE id IN(' . $codisIn . ')';
                    $result = $conn->query($sql);
                    $total = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $qtItems = contarElementsRepetits($_SESSION["carreto"], $row["id"]);
                            echo pintarItemCarreto($row["id"], $row["nom"], $row["src"], $row["preu"], $qtItems);
                            $total += $row["preu"] *  $qtItems;
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();

                    echo '<h3 class="row justify-content-center bg-dark text-white border border-3 border-secondary-subtle m-2" style="height: 50px;">total : ' . $total . '</h3>';
                }
            }

            function contarElementsRepetits($array, $valorComprovant)
            {
                $elementsRepetits = array_count_values($array);
                $valor = "" . $valorComprovant;
                return $elementsRepetits[$valor];
            }

            function pintarItemCarreto($id, $nom, $src, $preu, $qtItems)
            {
                return '<div class="row justify-content-center bg-dark border border-3 border-secondary-subtle m-2" style="height: 100px;" >
                                <a class ="row justify-content-around align-items-center text-white text-decoration-none" href = "' . './fitxa.php?codi=' . $id . '">
                                    <div class="row col h-100" >
                                        <img  class="col img-fluid" src="' . $src . '" alt="foto">
                                    </div>
                                    <h2 class="col">' . $nom . '</h2>
                                    <h2 class="col">' . $preu . '</h2>
                                    <h2 class="col">x' . $qtItems . '</h2>
                                </a>
                            </div>';
            }

            ?>
        </div>

        <div class="row justify-content-center m-2">
            <form action="eliminar-carreto.php" method="get" class="col-5">
                <input type="submit" name="compraRealitzada" value="comprar productes" class="col-12"
                       style="height:2rem;">
            </form>
            <button class="col-5">
                <a class="row justify-content-around text-black text-decoration-none" href="./llista.php">tornar a sa
                    galeria</a>
            </button>
        </div>
    </div>
</div>
</body>
</html>