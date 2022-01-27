<?php
require './records/records.php';
$target_dir = "records/Files/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
    importCSV($target_file);
    header("Location: index.php");
}
?>