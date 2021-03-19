<?php

/** @var PDO $database */
$database = require_once dirname(__FILE__) . '/../utils/database.utils.php';

$query = $database->prepare('SELECT * FROM `subject` WHERE `catid` =' . $_GET['catid']);
$query->execute([
    'catid' => $_GET['catid'],
]);
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
                        <td><a href="/?page=read-subject&id=<?php echo $row['subjectId']; ?>&subid=<?php echo $row['subjectId']; ?>"><?php echo $row['subjectName']; ?></a></td>
                    </tr>

                <?php } ?>

                </tbody>
            </table>

        </div>
    </div>
</div>

<?php
$curentcatid = $_GET['catid'];
if (isset($_POST['subjectForm'])) {
    if (isset($_POST['subjectFormTitle']) && !empty($_POST['subjectFormTitle']) &&
        isset($_POST['subjectFormContent']) && !empty($_POST['subjectFormContent'])) {


        $query = $database->prepare('INSERT INTO `subject`(`subjectName`, `subjectContent`, `catid`) VALUES (:title, :content, :catid)');
        $query->execute([
            'title' => $_POST['subjectFormTitle'],
            'content' => $_POST['subjectFormContent'],
            'catid' => $curentcatid,
        ]);

         header("Location: ./?page=read-category&catid=$curentcatid");

    }

}

?>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <form  method="post">
                <div class="mb-3">
                    <label for="subjectFormTitle" class="form-label">Titre du sujet</label>
                    <input type="text" class="form-control" id="subjectFormTitle" name="subjectFormTitle">
                </div>
                <div class="mb-3">
                    <label for="subjectFormContent" class="form-label">Contenu du sujet</label>
                    <textarea class="form-control" id="subjectFormContent" rows="10" name="subjectFormContent"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success" name="subjectForm">
                        Créer un nouveau sujet
                    </button>
                </div>
            </form>


        </div>
    </div>
</div>
