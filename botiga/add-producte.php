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
        $codeErrorFile = "error durant la carrega de l'arxiu codi Error : " . $_FILES["files"]["error"];
        setcookie("ErrorCodeFile", $codeErrorFile);
       header('Location: alta-producte.php');
       exit;
    }
    if (valorsValides($nom, $preu, $descripcio)) {

        $fileType = pathinfo($_FILES["files"]["name"], PATHINFO_EXTENSION);
        if (!fileTypeValid($fileType)) {
            $errorFileType = "el tipus d'arxiu de la imatge es incorrecte nomes s'acepten formats d'imatge";
            setcookie("ErrorFileTypeInvalid", $errorFileType);
            header('Location: alta-producte.php');
            exit;
        }
        $nomArxiu = "camisa" . $id . ".".$fileType;
        $target_dir = "./imatges/";
        $src = $target_dir . $nomArxiu;
        moureArxiu($target_dir, $nomArxiu);
        $insert = 'INSERT into productes (nom,src,preu,descripcio) values ("' . $nom . '","' . $src . '","' . $preu . '","' . $descripcio . '")';
        $result = $conn->query($insert);
        header('Location: llista.php');
        exit;
    }
    $errorInputsInvalid = "Error,camps amb contingut invalid";
    setcookie("ErrorInputsInvalid", $errorInputsInvalid);
    header('Location: alta-producte.php');
    //echo "Error,camps amb contingut invalid";

}
function fileTypeValid($fileType){
    $typeToCheck= strtolower($fileType);
    $validTipes = ["png","jpg","gif","tif","bmp"];
    $lenght = count($validTipes);
    for($i = 0;$i < $lenght;$i++){
        if($validTipes[$i] === $typeToCheck)
            return true;
    }
    return false;
}
function valorsValides($nom, $preu, $descripcio)
{
    $preuMin = 0.00;
    $preuMax = 100;
    $nomValid = isset($nom) && !empty($nom);
    $preuValid = isset($preu) && $preu > $preuMin && $preu < $preuMax;
    $descripcioValid = isset($descripcio) && !empty($descripcio);
    //echo "nomValid: ".$nomValid ." preuValid : ".$preuValid." descripcioValida: ".$descripcioValid;
    return $nomValid && $preuValid && $descripcioValid;
}

function moureArxiu($ruta, $nomArxiu)
{
    move_uploaded_file($_FILES["files"]["tmp_name"], $ruta . $nomArxiu);
}


?>