<?php

/** @var PDO $database */
$database = require_once dirname(__FILE__) . '/../utils/database.utils.php';

$query = $database->prepare('SELECT * FROM `messagechat`');
$query->execute();
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
        isset($_POST['messageFormContent']) && !empty($_POST['messageFormContent'])) {

        $query = $database->prepare('INSERT INTO `messagechat` (`messageUser`, `messageContent`) VALUES (:title, :content)');
        $res = $query->execute([
            'title' => $_POST['messageFormTitle'],
            'content' => $_POST['messageFormContent'],
        ]);
        header("Location:index.php/?page=read-message");
    }

}

?>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <form action="index.php/?page=read-message" method="post">
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
