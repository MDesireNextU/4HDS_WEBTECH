<?php
include_once("connexion.php");
if (isset($_POST) && !empty($_POST)){
    $submission_date = $_POST['crea_compte'];
    if(! get_magic_quotes_gpc() ) {
            $nom_medicament = addslashes($_POST['nom_medicament']);
        } else {
            $nom_medicament = $_POST['nom_medicament'];
        }
        $description = $_POST['description'];
        $token = $_POST['token'];
        $prix = $_POST['prix'];
        $stock = $_POST['stock'];
        $reference = $_POST['reference'];
        $created_at = $_POST['created_at'];
        $update_at = $_POST['update-at'];
        $sql = "INSERT INTO medicament".
        "(nom,description,token,prix,stock,reference,created_at,update_at) "."VALUES ".
        "('$nom_medicament','$description','$token','$prix','$stock','$reference','$created_at','$update_at')";
        mysqli_select_db( $conn, 'medicament');
        $retval = mysqli_query( $conn,$sql );

        if(! $retval) {
            die("Could not enter the data: " . mysqli_error($conn));
        }
        echo "Données insérées avec succés !";
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form medicament</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <a href="formmatiere.php">form matiere</a>
    <a href="formmedicament.php">form medicament</a>
    <a href="formsalles.php">form salles</a>
    <a href="listing_medicament.php">select nom medicament</a>
    <a href="listing_matiere.php">select matiere</a>
    <a href="listing_salle.php">select salle</a>


        <form method = "post" action = "<?php $PHP_SELF ?>">
            <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
                <tr>
                    <td width = "250">Nom</td>
                    <td><input name = "nom_medicament" type = "text" id = "nom_medicament">
                </tr>
                <tr>
                    <td width = "250">description</td>
                    <td><input name = "description" type = "text" id = "description">
                </tr>
                <tr>
                    <td width = "250">token</td>
                    <td><input name = "token" type = "text" id = token">
                </tr>
                <tr>
                    <td width = "250">prix</td>
                    <td><input name = "prix" type = "text" id = "prix">
                </tr>
                <tr>
                    <td width = "250">stock</td>
                    <td><input name = "stock" type = "text" id = "stock">
                </tr>
                <tr>
                    <td width = "250">reference</td>
                    <td><input name = "reference" type = "text" id = "reference">
                </tr>
                <tr>
                    <td width = "250">Date de création [ yyyy-mm-dd ]</td>
                    <td><input name = "created_at" type = "date" id = "created_at">
                </tr>
                <tr>
                    <td width = "250">Mis a jour [ yyyy-mm-dd ]</td>
                    <td><input name = "update_at" type = "date" id = "update_at">
                </tr>
                <tr>
                    <td width = "250"> </td>
                    <td><input name = "add" type = "submit" id = "add" value = "Envoyer"></td>
                </tr>
            </table>
        </form>
    </body>
</html>