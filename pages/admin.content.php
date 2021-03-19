<?php

 /** @var PDO $database */
 $database = require_once dirname(__FILE__) . '/../utils/database.utils.php';

 $query = $database->prepare('SELECT * FROM `subject`');
 $query->execute();

 $data = $database->prepare('SELECT * FROM `categories`');
 $data->execute();

 $chat = $database->prepare('SELECT * FROM `messagechat`');
 $chat->execute();
 ?>

<!-- list category  -->
<div class="container my-5">
    <div class="row">
        <div class="col">

            <table class="table table-dark table-striped">
                <thead>
                <tr>
                    <th scope="col">Catégories</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php while (($list = $data->fetch())) { ?>

                    <tr>
                        <td><a href="/?page=read-category&catid=<?php echo $list['id']; ?>"><?php echo $list['title']; ?></a></td>
                        <td>
                            <a href="/?page=delete-category&catid=<?php echo $list['id']; ?>" class="btn btn-danger">Effacer la categorie</a>
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

             <table class="table table-dark table-striped">
                 <thead>
                   <tr>
                       <th scope="col">Sujet</th>
                       <th scope="col">Actions</th>
                   </tr>
                 </thead>
                 <tbody>
                 <?php while (($row = $query->fetch())) { ?>

                     <tr>
                         <td><a href="/?page=read-subject&id=<?php echo $row['subjectId']; ?>&subid=<?php echo $row['subjectId']; ?>"><?php echo $row['subjectName']; ?></a></td>
                         <td>
                             <a href="/?page=delete-subject&id=<?php echo $row['subjectId']; ?>" class="btn btn-danger">Effacer le sujet</a>
                         </td>
                     </tr>

                 <?php } ?>

                 </tbody>
             </table>

         </div>
     </div>
 </div>

<!-- list message -->
<div class="container my-5">
    <div class="row">
        <div class="col">

            <table class="table table-dark table-striped">
                <thead>
                  <tr>
                      <th scope="col"> Pseudo</th>
                      <th scope="col">Messages</th>
                      <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php while (($msg = $chat->fetch())) { ?>

                    <tr>
                        <th scope="row"><?php echo $msg['messageUser']; ?></th>
                        <td><a href="/?page=read-subject&id=<?php echo $msg['subid']; ?>&subid=<?php echo $msg['subid']; ?>"><?php echo $msg['messageContent']; ?></a></td>
                        <td>
                            <a href="/?page=delete-message&id=<?php echo $msg['subid']; ?>" class="btn btn-danger">Effacer le message</a>
                        </td>
                    </tr>

                <?php } ?>

                </tbody>
            </table>

        </div>
    </div>
</div>
