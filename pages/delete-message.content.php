<?php
/** @var PDO $database */
$database = require_once dirname(__FILE__) . '/../utils/database.utils.php';

$deleteComment = $database->prepare('DELETE FROM `messagechat` WHERE `subid` = :id');
$deleteComment->execute([
    'id' => $_GET['id'],
]);

header("Location: ./?page=admin");

?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">
            <p>Le message a été effacé.</p>
        </div>
    </div>
</div>
