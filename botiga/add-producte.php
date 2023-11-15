<?php
include 'connexioBDD.php';
$select = 'SELECT MAX(id) as id FROM productes';
$result = $conn->query($select);
$id = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"] + 1;
    }
}

if (isset($_POST["submit"])) {
    $nom = $_POST["nom"];
    $preu = floatval($_POST["preu"]);
    $descripcio = $_POST["descripcio"];
    if ($_FILES["files"]["error"] > 0) {
        echo "Error: error durant la carrega de l'arxiu codi Error : " . $_FILES["files"]["error"];
        exit;
    }
    if (valorsValides($nom, $preu, $descripcio)) {

        $fileType = pathinfo($_FILES["files"]["name"], PATHINFO_EXTENSION);
        if ($fileType != "jpg") {
            //msg error
            echo "la imatge ha de ser format 'jpg'";
            exit;
        }
        $nomArxiu = "camisa" . $id . ".jpg";
        $target_dir = "./imatges/";
        $src = $target_dir . $nomArxiu;
        moureArxiu($target_dir, $nomArxiu);
        $insert = 'INSERT into productes (nom,src,preu,descripcio) values ("' . $nom . '","' . $src . '","' . $preu . '","' . $descripcio . '")';
        $result = $conn->query($insert);
        header('Location: llista.php');
    }
    echo "Error,camps amb contingut invalid";

}

function valorsValides($nom, $preu, $descripcio)
{
    $preuMin = 0.00;
    $nomValid = isset($nom) && !empty($nom);
    $preuValid = isset($preu) && $preu > $preuMin;
    $descripcioValid = isset($descripcio) && !empty($descripcio);
    echo "nomValid: ".$nomValid ." preuValid : ".$preuValid." descripcioValida: ".$descripcioValid;
    return $nomValid && $preuValid && $descripcioValid;
}

function moureArxiu($ruta, $nomArxiu)
{
    move_uploaded_file($_FILES["files"]["tmp_name"], $ruta . $nomArxiu);
}


?>