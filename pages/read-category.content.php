<?php

/** @var PDO $database */
$database = require_once dirname(__FILE__) . '/../utils/database.utils.php';

$query = $database->prepare('SELECT * FROM `subject` WHERE `catid` =' . $_GET['catid']);
$query->execute([
    'catid' => $_GET['catid'],
]);
var_dump($query);
?>

<div class="container my-5">
    <div class="row">
        <div class="col">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                </tr>
                </thead>
                <tbody>
                <?php while (($row = $query->fetch())) { ?>

                    <tr>
                        <th scope="row"><?php echo $row['subjectId']; ?></th>
                        <td><a href="index.php/?page=read-subject&id=<?php echo $row['subjectId']; ?>"><?php echo $row['subjectName']; ?></a></td>
                    </tr>

                <?php } ?>

                </tbody>
            </table>

        </div>
    </div>
</div>
