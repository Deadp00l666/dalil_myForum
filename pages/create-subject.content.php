<?php

if (isset($_POST['subjectForm'])) {
    if (isset($_POST['subjectFormTitle']) && !empty($_POST['subjectFormTitle']) &&
        isset($_POST['subjectFormContent']) && !empty($_POST['subjectFormContent'])) {

        /** @var PDO $database */
        $database = require_once dirname(__FILE__) . '/../utils/database.utils.php';

        $query = $database->prepare('INSERT INTO `subject` (`subjectId`, `subjectName`, `subjectContent`) VALUES(:id, :title, :content)');
        $res = $query->execute([
            'id' => $_POST['subjectId'],
            'title' => $_POST['subjectFormTitle'],
            'content' => $_POST['subjectFormContent'],
        ]);
    }

}

?>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <form action="/?page=create-subject" method="post">
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
