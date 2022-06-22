<?php
include_once("connexion.php");
if (isset($_POST) && !empty($_POST)){
    $submission_date = $_POST['crea_compte'];
    if(! get_magic_quotes_gpc() ) {
            $nom_user = addslashes($_POST['nom_user']);
            $prenom_user = addslashes($_POST['prenom_user']);
        } else {
            $nom_user = $_POST['nom_user'];
            $prenom_user = $_POST['prenom_user'];
        }
        $token = $_POST['token'];
        $role = $_POST['role'];
        $created_at = $_POST['created_at'];
        $update_at = $_POST['update-at'];
        $sql = "INSERT INTO users".
        "(nom,prenom,token,role,created_at,update_at) "."VALUES ".
        "('$nom_user','$prenom_user','$token','$role','$created_at','$update_at')";
        mysqli_select_db( $conn, 'users');
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
    <title>Form user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <a href="formmatiere.php">form matiere</a>
    <a href="formusers.php">form user</a>
    <a href="formsalles.php">form salles</a>
    <a href="listing_users.php">select nom user</a>
    <a href="listing_matiere.php">select matiere</a>
    <a href="listing_salle.php">select salle</a>


        <form method = "post" action = "<?php $PHP_SELF ?>">
            <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
                <tr>
                    <td width = "250">Nom</td>
                    <td><input name = "nom_user" type = "text" id = "nom_user">
                </tr>
                <tr>
                    <td width = "250">Prénom</td>
                    <td><input name = "prenom_user" type = "text" id = "prenom_user">
                </tr>
                <tr>
                    <td width = "250">token</td>
                    <td><input name = "token" type = "text" id = token">
                </tr>
                <tr>
                    <td width = "250">role</td>
                    <td><input name = "role" type = "text" id = "role">
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