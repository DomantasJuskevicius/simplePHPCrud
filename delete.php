<?php
require __DIR__.'/records/records.php';
if(!isset($_POST['id'])){
    include "./includes/notFound.php";
    exit;
}

$recordId = $_POST['id'];
deleteRecord($recordId);


header ("Location: index.php");
?>