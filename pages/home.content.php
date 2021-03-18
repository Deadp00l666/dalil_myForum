<?php

/** @var PDO $database */
$database = require_once dirname(__FILE__) . '/../utils/database.utils.php';

$query = $database->prepare('SELECT * FROM `categories`');
$query->execute([
    
]);
?>

<?php while ($row = $query->fetch()) { ?>

        <div class="container my-5">
            <div class="row">
                <div class="col">
                    <a href="index.php/?page=read-category&catid=<?php echo $row['id']; ?>"><h2><?php echo $row['title']; ?></h2></a>
                </div>
            </div>
        </div>

<?php } ?>

<?php

if (isset($_POST['categoryForm'])) {
    if (isset($_POST['categoryFormTitle']) && !empty($_POST['categoryFormTitle'])) {

        $query = $database->prepare('INSERT INTO `categories` (`title`) VALUES(:title)');
        $res = $query->execute([
            'title' => $_POST['categoryFormTitle'],
        ]);
        header("Refresh:0");
    }

}

?>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <form action="/?page=home" method="post">
                <div class="mb-3">
                    <label for="categoryFormTitle" class="form-label">Titre de la catégorie</label>
                    <input type="text" class="form-control" id="categoryFormTitle" name="categoryFormTitle">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success" name="categoryForm">
                        Créer une nouvelle catégorie
                    </button>
                </div>
            </form>


        </div>
    </div>
</div>
