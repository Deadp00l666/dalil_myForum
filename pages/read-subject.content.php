<?php
/** @var PDO $database */
$database = require_once dirname(__FILE__) . '/../utils/database.utils.php';

$query = $database->prepare('SELECT * FROM `subject` WHERE `subjectId` = :id');
$query->execute([
    'id' => $_GET['id'],
]);

$row = $query->fetch();
var_dump($row);
?>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <h1><?php echo $row['subjectName']; ?></h1>
            <div><?php echo nl2br($row['subjectContent']); ?></div>
        </div>
    </div>
</div>
