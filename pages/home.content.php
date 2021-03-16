<?php

/** @var PDO $database */
$database = require_once dirname(__FILE__) . '/../utils/database.utils.php';

$query = $database->prepare('SELECT * FROM `subject`');
$query->execute();
?>

<?php while (($row = $query->fetch())) { ?>

        <div class="container my-5">
            <div class="row">
                <div class="col">
                    <a href="index.php/?page=read-subject&id=<?php echo $row['subjectId']; ?>"><h2><?php echo $row['subjectName']; ?></h2></a>
                </div>
            </div>
        </div>

<?php } ?>
