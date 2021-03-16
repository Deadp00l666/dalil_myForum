<?php

/** @var PDO $database */
$database = require_once dirname(__FILE__) . '/../utils/database.utils.php';

if (isset($_POST['subjectForm'])) {
    if (isset($_POST['subjectFormTitle']) && !empty($_POST['subjectFormTitle']) &&
        isset($_POST['subjectFormContent']) && !empty($_POST['subjectFormContent'])) {

        $query = $database->prepare('UPDATE `subject` SET `subjectName` = :title, `subjectContent` = :content WHERE `subjectId` = :id');
        $res = $query->execute([
            'id' => $_GET['id'],
            'title' => $_POST['subjectFormTitle'],
            'content' => $_POST['subjectFormContent'],
        ]);
    }
}

$query = $database->prepare('SELECT * FROM `subject` WHERE id = :id');
$query->execute([
    'id' => $_GET['id'],
]);

$subject = $query->fetch();

?>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <form action="/?page=update-subject&id=<?php echo $subject['id']; ?>" method="post">
                <div class="mb-3">
                    <label for="subjectFormTitle" class="form-label">Titre</label>
                    <input type="text" class="form-control" id="subjectFormTitle" name="subjectFormTitle" value="<?php echo $subject['title']; ?>">
                </div>
                <div class="mb-3">
                    <label for="subjectFormIllustrationImageUrl" class="form-label">URL de l'image d'illustration</label>
                    <input type="url" class="form-control" id="subjectFormIllustrationImageUrl" name="subjectFormIllustrationImageUrl" value="<?php echo $subject['illustration_image_url']; ?>">
                </div>
                <div class="mb-3">
                    <label for="subjectFormChapeau" class="form-label">Chapeau</label>
                    <textarea class="form-control" id="subjectFormChapeau" rows="3" name="subjectFormChapeau"><?php echo $subject['chapeau']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="subjectFormContent" class="form-label">Contenu</label>
                    <textarea class="form-control" id="subjectFormContent" rows="10" name="subjectFormContent"><?php echo $subject['content']; ?></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success" name="subjectForm">
                        Modifier
                    </button>
                </div>
            </form>


        </div>
    </div>
</div>
