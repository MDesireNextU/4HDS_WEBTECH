<?php
require_once 'connexion.php';

$id_user = $_GET["id_user"];

if(empty($id_user)){

         header('Location:  listing_users.php');
         exit;
}

if(isset($_POST)  && !empty($_POST)){

      // var_dump($_POST);

      $control_form_err = false;

     

      if(! get_magic_quotes_gpc() ) {
        $nom = addslashes ($_POST['nom']);
        $prenom = addslashes ($_POST['prenom']);
        $token = addslashes ($_POST['token']);
        $role = addslashes ($_POST['role']);
        $created_at = addslashes ($_POST['created_at']);
        $update_at = addslashes ($_POST['update_at']);
        $id_user = addslashes ($_POST['id_user']);
     } else {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $token = $_POST['token'];
        $role = $_POST['role'];
        $created_at = $_POST['created_at'];
        $update_at = $_POST['update_at'];
        $id_user = $_POST["id_user"];
     }

     if(!empty($nom)  &&  !empty($prenom) && !empty($token) && !empty($role) && !empty($created_at) && !empty($update_at)){

        $sql = " UPDATE  users  SET   nom='".$nom."',prenom='".$prenom."',token='".$token."',role='".$role."',created_at='".$created_at."',update_at='".$update_at."' WHERE  id='".$id_user."' ";
        $retval = mysqli_query( $conn, $sql );
   
        if(! $retval ) {
                $control_form_err = true;
         }

     }

}

$sql = " SELECT id,nom,prenom,token,role,created_at,update_at FROM  users  WHERE id='".$id_user."' ";
$retval = mysqli_query( $conn, $sql );

$results = array();
if($retval){

    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
        $results[] = $row;
    }

    if(count($results)<=0){

        header('Location:  listing_users.php');
        exit;
    }
   
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
         <?php  include 'templates/head.php'; ?>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
            <?php  include 'templates/menu.php'; ?>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                  <?php  include 'templates/nav.php'; ?>
                <!-- Page content-->
                <div class="container-fluid">
                    <h2>Créer un nouveau profil user</h2>

                <form  action ="<?php $_PHP_SELF ?>" method= "POST">


                    <?php   if(isset($_POST)  && !empty($_POST)){  ?>

                      <?php   if(!$control_form_err){  ?>

                      <div class="alert alert-success" role="alert">
                          <a href="#" class="alert-link">La modification a été effectuer avec succès</a>
                      </div>

                      <?php   }  ?> 

                      <?php   if($control_form_err){  ?>

                      <div class="alert alert-danger" role="alert">
                          <a href="#" class="alert-link">L'enregistrement a échoué</a>
                      </div>

                      <?php   }  ?>  

                    <?php   }  ?>  
                      <div class="form-group">
                           <label for="labelNom">Nom</label>
                           <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer le nom" value="<?= $results[0]["nom"]; ?>">
                           <?php   if(isset($_POST['nom'])  && empty($_POST['nom'])){  ?>

                            <div class="alert alert-danger" role="alert">
                                     <a href="#" class="alert-link">Le nom ne doit pas etre vide</a>
                             </div>

                           <?php   }  ?> 
                       
                       </div>
                       <div class="form-group">
                           <label for="labelPrenom">Prenom</label>
                           <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrer le prenom" value="<?= $results[0]["prenom"]; ?>">
                       
                       </div>

                       <?php   if(isset($_POST['prenom'])  && empty($_POST['prenom'])){  ?>

                          <div class="alert alert-danger" role="alert">
                               <a href="#" class="alert-link">Le prenom ne doit pas etre vide</a>
                          </div>

                       <?php   }  ?> 

                       <div class="form-group">
                           <label for="labeltoken">token</label>
                           <input type="text" class="form-control" id="token" name="token" placeholder="Entrer le token" value="<?= $results[0]["token"]; ?>">
                       
                       </div>

                       <?php   if(isset($_POST['token'])  && empty($_POST['token'])){  ?>

                          <div class="alert alert-danger" role="alert">
                               <a href="#" class="alert-link">Le token ne doit pas etre vide</a>
                          </div>

                       <?php   }  ?> 

                       <div class="form-group">
                           <label for="labelrole">role</label>
                           <input type="text" class="form-control" id="role" name="role" placeholder="Entrer le role" value="<?= $results[0]["role"]; ?>">
                       
                       </div>

                       <?php   if(isset($_POST['role'])  && empty($_POST['role'])){  ?>

                          <div class="alert alert-danger" role="alert">
                               <a href="#" class="alert-link">Le role ne doit pas etre vide</a>
                          </div>

                       <?php   }  ?> 

                       <div class="form-group"  style="margin-bottom:1%">
                           <label for="labelDate">Date création profil</label>                         
                           <div class="input-group">
                                 <input type="date" placeholder="Choisir une date" class="form-control" id="created_at" name="created_at" value="<?= $results[0]["created_at"]; ?>">        
                            </div>  
                            
                            <?php   if(isset($_POST['created_at'])  && empty($_POST['created_at'])){  ?>

                               <div class="alert alert-danger" role="alert">
                                   <a href="#" class="alert-link">La date ne doit pas etre vide</a>
                               </div>

                            <?php   }  ?> 
                       
                       </div>

                       <div class="form-group"  style="margin-bottom:1%">
                           <label for="labelDate2">Mis à jour</label>                         
                           <div class="input-group">
                                 <input type="date" placeholder="Choisir une date" class="form-control" id="update_at" name="update_at" value="<?= $results[0]["update_at"]; ?>">        
                            </div>  
                            
                            <?php   if(isset($_POST['update_at'])  && empty($_POST['update_at'])){  ?>

                               <div class="alert alert-danger" role="alert">
                                   <a href="#" class="alert-link">La date ne doit pas etre vide</a>
                               </div>

                            <?php   }  ?> 
                       
                       </div>

                       <input type="hidden"  name = "id_user"  value="<?= $id_user ?>"  />

                       <button type="submit" class="btn btn-primary">Enregister</button>
                 </form>
                   
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <?php  include 'templates/footer.php'; ?>
    </body>
</html>