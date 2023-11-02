<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$visitas = 1;
if(isset($_COOKIE["visites"])){
    $visitas = $_COOKIE["visites"]+1;
    setcookie("visites",$visitas);
}
setcookie("visites",$visitas);
echo"num = ".$visitas;
?>
</body>
</html>