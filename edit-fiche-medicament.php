<?php
require_once 'connexion.php';

$id_medicament = $_GET["id_medicament"];

if(empty($id_medicament)){

         header('Location:  listing_medicament.php');
         exit;
}

if(isset($_POST)  && !empty($_POST)){

      // var_dump($_POST);

      $control_form_err = false;

     

      if(! get_magic_quotes_gpc() ) {
        $nom = addslashes ($_POST['nom']);
        $description = addslashes ($_POST['description']);
        $token = addslashes ($_POST['token']);
        $prix = addslashes ($_POST['prix']);
        $stock = addslashes ($_POST['stock']);
        $reference = addslashes ($_POST['reference']);
        $created_at = addslashes ($_POST['created_at']);
        $update_at = addslashes ($_POST['update_at']);
        $id_medicament = addslashes ($_POST['id_medicament']);
     } else {
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $token = $_POST['token'];
        $prix = $_POST['prix'];
        $stock = $_POST['stock'];
        $reference = $_POST['reference'];
        $created_at = $_POST['created_at'];
        $update_at = $_POST['update_at'];
        $id_medicament = $_POST["id_medicament"];
     }

     if(!empty($nom)  &&  !empty($description) && !empty($token) && !empty($prix) && !empty($stock) && !empty($reference) && !empty($created_at) && !empty($update_at)){

        $sql = " UPDATE  medicament  SET   nom='".$nom."',description='".$description."',token='".$token."',prix='".$prix."',stock='".$stock."',reference='".$reference."',created_at='".$created_at."',update_at='".$update_at."' WHERE  id='".$id_medicament."' ";
        $retval = mysqli_query( $conn, $sql );
   
        if(! $retval ) {
                $control_form_err = true;
         }

     }

}

$sql = " SELECT id,nom,description,token,prix,created_at,update_at FROM  medicament  WHERE id='".$id_medicament."' ";
$retval = mysqli_query( $conn, $sql );

$results = array();
if($retval){

    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
        $results[] = $row;
    }

    if(count($results)<=0){

        header('Location:  listing_medicament.php');
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
                    <h2>Créer un nouveau profil medicament</h2>

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
                           <label for="labeldescription">description</label>
                           <input type="text" class="form-control" id="description" name="description" placeholder="Entrer le description" value="<?= $results[0]["description"]; ?>">
                       
                       </div>

                       <?php   if(isset($_POST['description'])  && empty($_POST['description'])){  ?>

                          <div class="alert alert-danger" role="alert">
                               <a href="#" class="alert-link">Le description ne doit pas etre vide</a>
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
                           <label for="labelprix">prix</label>
                           <input type="text" class="form-control" id="prix" name="prix" placeholder="Entrer le prix" value="<?= $results[0]["prix"]; ?>">
                       
                       </div>

                       <?php   if(isset($_POST['prix'])  && empty($_POST['prix'])){  ?>

                          <div class="alert alert-danger" role="alert">
                               <a href="#" class="alert-link">Le prix ne doit pas etre vide</a>
                          </div>

                       <?php   }  ?>
                       
                       <div class="form-group">
                           <label for="labelstock">stock</label>
                           <input type="text" class="form-control" id="stock" name="stock" placeholder="Entrer le stock" value="<?= $results[0]["stock"]; ?>">
                       
                       </div>

                       <?php   if(isset($_POST['stock'])  && empty($_POST['stock'])){  ?>

                          <div class="alert alert-danger" role="alert">
                               <a href="#" class="alert-link">Le stock ne doit pas etre vide</a>
                          </div>

                       <?php   }  ?> 

                       <div class="form-group">
                           <label for="labelreference">reference</label>
                           <input type="text" class="form-control" id="reference" name="reference" placeholder="Entrer le reference" value="<?= $results[0]["reference"]; ?>">
                       
                       </div>

                       <?php   if(isset($_POST['reference'])  && empty($_POST['reference'])){  ?>

                          <div class="alert alert-danger" role="alert">
                               <a href="#" class="alert-link">Le reference ne doit pas etre vide</a>
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

                       <input type="hidden"  name = "id_medicament"  value="<?= $id_medicament ?>"  />

                       <button type="submit" class="btn btn-primary">Enregister</button>
                 </form>
                   
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <?php  include 'templates/footer.php'; ?>
    </body>
</html>