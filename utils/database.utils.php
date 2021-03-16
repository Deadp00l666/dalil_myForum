<?php
try {

  $database = new PDO('mysql:host=localhost;dbname=myForum;charset=utf8', 'root', '');


} catch (Exception $exception) {
    var_dump($exception);
    exit;
}

return $database;
 ?>
