<?php
require_once 'connexion.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$id_medicament = $_GET["id_medicament"];
echo $id_medicament ;
$sql = 'DELETE FROM medicament where ID='.$id_medicament;


if ($retval = mysqli_query( $conn, $sql )){

    printf('Deleted successfully');
}



?>
<a href="./listing_medicament.php"><button type="button" class="btn btn-primary">retour</button> </a>
</body>
</html>
