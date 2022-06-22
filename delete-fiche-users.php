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

$id_users = $_GET["id_users"];
echo $id_users ;
$sql = 'DELETE FROM users where ID='.$id_users;


if ($retval = mysqli_query( $conn, $sql )){

    printf('Deleted successfully');
}



?>
<a href="./listing_users.php"><button type="button" class="btn btn-primary">retour</button> </a>
</body>
</html>
