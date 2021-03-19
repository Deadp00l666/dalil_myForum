<?php

 /** @var PDO $database */
 $database = require_once dirname(__FILE__) . '/../utils/database.utils.php';

 $query = $database->prepare('SELECT * FROM `subject`');
 $query->execute();

 $data = $database->prepare('SELECT * FROM `categories`');
 $data->execute();
 ?>

<!-- list category  -->
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
                <?php while (($list = $data->fetch())) { ?>

                    <tr>
                        <th scope="row"><?php echo $list['id']; ?></th>
                        <td><a href="/?page=read-category&catid=<?php echo $list['id']; ?>"><?php echo $list['title']; ?></a></td>
                        <td>
                            <a href="/?page=delete-category&catid=<?php echo $list['id']; ?>" class="btn btn-danger">Effacer</a>
                        </td>
                    </tr>

                <?php } ?>

                </tbody>
            </table>

        </div>
    </div>
</div>

<!-- list subject -->
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
                         <td><a href="/?page=read-subject&id=<?php echo $row['subjectId']; ?>&subid=<?php echo $row['subjectId']; ?>"><?php echo $row['subjectName']; ?></a></td>
                         <td>
                             <a href="/?page=delete-subject&id=<?php echo $row['subjectId']; ?>" class="btn btn-danger">Effacer</a>
                         </td>
                     </tr>

                 <?php } ?>

                 </tbody>
             </table>

         </div>
     </div>
 </div>
