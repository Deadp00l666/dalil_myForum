<?php
/** @var PDO $database */
$database = require_once dirname(__FILE__) . '/../utils/database.utils.php';

$deleteSubject = $database->prepare('DELETE FROM `subject` WHERE `subjectId` = :id');
$deleteSubject->execute([
    'id' => $_GET['id'],
]);

$deleteComment = $database->prepare('DELETE FROM `messagechat` WHERE `subid` = :id');
$deleteComment->execute([
    'id' => $_GET['id'],  
]);


?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">
            <p>Le sujet a été effacé.</p>
        </div>
    </div>
</div>
