<?php

 /** @var PDO $database */
 $database = require_once dirname(__FILE__) . '/../utils/database.utils.php';

 $query = $database->prepare('SELECT * FROM `subject`');
 $query->execute();
 ?>

 <div class="container my-5">
     <div class="row">
         <div class="col">

             <table class="table">
                 <thead>
                 <tr>
                     <th scope="col">#</th>
                     <th scope="col">Title</th>
                     <th scope="col">Actions</th>
                 </tr>
                 </thead>
                 <tbody>
                 <?php while (($row = $query->fetch())) { ?>

                     <tr>
                         <th scope="row"><?php echo $row['subjectId']; ?></th>
                         <td><a href="index.php/?page=read-subject&id=<?php echo $row['subjectId']; ?>"><?php echo $row['subjectName']; ?></a></td>
                         <td>
                             <a href="index.php/?page=delete-subject&id=<?php echo $row['subjectId']; ?>" class="btn btn-danger">Effacer</a>
                         </td>
                     </tr>

                 <?php } ?>

                 </tbody>
             </table>

         </div>
     </div>
 </div>
