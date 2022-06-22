<?php
require_once 'connexion.php';
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
                <div class="container-fluid" style="margin-top:2%">

                    <a href="./formmedicament.php"><button type="button" class="btn btn-primary">Ajouter une nouvelle fiche medicament</button> </a>   

                    <?php

                       $sql = "SELECT id,nom,description,token,prix,stock,reference,created_at,update_at  FROM  medicament ";
                       $retval = mysqli_query( $conn, $sql );
                       if(! $retval ) {  ?>
                          <div class="alert alert-danger" role="alert">
                                  <a href="#" class="alert-link">L'affichage  a échoué</a>
                           </div>
                       <?php  }else{   ?>


                          <table class="table">
                              <thead class="thead-light">
                                               <tr>
                                                              <th scope="col">ID</th>
                                                              <th scope="col">NOM</th>
                                                              <th scope="col">DESCRIPTION</th>
                                                              <th scope="col">TOKEN</th>
                                                              <th scope="col">PRIX</th>
                                                              <th scope="col">STOCK</th>
                                                              <th scope="col">REFERENCE</th>
                                                              <th scope="col">CREATED_AT</th>
                                                              <th scope="col">UPDATE_AT</th>
                                                              <th scope="col">ACTION</th>
                                                </tr>
                             </thead>
                             <tbody>
                                 
                                  <?php   while($row = mysqli_fetch_array($retval)) {  ?>

                                    <tr>
                                        <th scope="row"><?= $row["id"]  ?> </th>
                                        <td><?= $row["nom"]  ?></td>
                                        <td><?= $row["description"]  ?></td>
                                        <td><?= $row["token"]  ?></td>
                                        <td><?= $row["prix"]  ?></td>
                                        <td><?= $row["stock"]  ?></td>
                                        <td><?= $row["reference"]  ?></td>
                                        <td><?= $row["created_at"]  ?></td>
                                        <td><?= $row["update_at"]  ?></td>

                                        <td><a href="./edit-fiche-medicament.php?id_medicament=<?= $row["id"] ?>"><button type="button" class="btn btn-primary">Modifier la fiche medicament</button> </a> 

                                        <a href="./delete-fiche-medicament.php?id_medicament=<?= $row["id"] ?>"><button type="button" class="btn btn-primary">Supprimer la fiche medicament</button> </a>   </td>

                                        
                                    </tr>
                   
                                   <?php   }   ?>                             
                           
                            
                             </tbody>

                            </table> 

                           <?php   }   ?>

                      
                          <?php mysqli_close($conn);    ?>                       
                     
                </div>
            </div>
        </div>
        <?php  include 'templates/footer.php'; ?>
    </body>
</html>