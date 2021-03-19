<?php
/** @var PDO $database */
$database = require_once dirname(__FILE__) . '/../utils/database.utils.php';

$deleteCategory = $database->prepare('DELETE FROM `categories` WHERE  `categories`.`id` = :catid');
$deleteCategory->execute ([
    'catid' => $_GET['catid'],
]);

$deleteSubject = $database->prepare(' DELETE FROM `subject` WHERE `subject`.`catid` = :catid ');
$deleteSubject->execute([
    'catid' => $_GET['catid'],
]);

header("Location: ./?page=admin");

?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">
            <p>La catégorie a été effacé.</p>
        </div>
    </div>
</div>
