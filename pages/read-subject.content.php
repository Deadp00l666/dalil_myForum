<?php
/** @var PDO $database */
$database = require_once dirname(__FILE__) . '/../utils/database.utils.php';

$query = $database->prepare('SELECT * FROM `subject` WHERE `subjectId` = :id');
$query->execute([
    'id' => $_GET['id'],
]);

$row = $query->fetch();
?>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <h1><?php echo $row['subjectName']; ?></h1>
            <div><?php echo nl2br($row['subjectContent']); ?></div>
        </div>
    </div>
</div>


<?php

$query = $database->prepare('SELECT * FROM `messagechat` WHERE `subid` =' . $_GET['subid']);
$query->execute([
  'subid' => $_GET['subid'],
]);
?>

<div class="container my-5">
    <div class="row">
        <div class="col">

            <table class="table">
                <thead>
                </thead>
                <tbody>
                <?php while (($row = $query->fetch())) { ?>

                    <tr>
                        <th scope="row"><?php echo $row['messageUser']; ?></th>
                        <td><?php echo $row['messageContent']; ?></td>
                    </tr>

                <?php } ?>

                </tbody>
            </table>

        </div>
    </div>
</div>

<?php

if (isset($_POST['messageForm'])) {
    if (isset($_POST['messageFormTitle']) && !empty($_POST['messageFormTitle']) &&
        isset($_POST['messageFormContent']) && !empty($_POST['messageFormContent']) && isset($_GET['subid']) && !empty($_GET['subid']) ) {

        $query = $database->prepare('INSERT INTO `messagechat` (`messageUser`, `messageContent`, `subid`) VALUES (:title, :content, :subid)');
        $res = $query->execute([
            'title' => $_POST['messageFormTitle'],
            'content' => $_POST['messageFormContent'],
            'subid' => $_GET['subid'],
        ]);
        header("Refresh:0");
    }

}

?>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <form action="/?page=read-subject&id=<?php echo $_GET['subid']; ?>&subid=<?php echo $_GET['subid']; ?>" method="post">
                <div class="mb-3">
                    <label for="messageFormTitle" class="form-label">Pseudo</label>
                    <input type="text" class="form-control" id="messageFormTitle" name="messageFormTitle">
                </div>
                <div class="mb-3">
                    <label for="messageFormContent" class="form-label">Votre message</label>
                    <textarea class="form-control" id="messageFormContent" rows="10" name="messageFormContent"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success" name="messageForm">
                        Envoyer le message
                    </button>
                </div>
            </form>


        </div>
    </div>
</div>
