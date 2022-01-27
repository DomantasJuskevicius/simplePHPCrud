<?php
require './records/records.php';
$target_dir = 'records/Files/';
$tmp_name = $_FILES["fileToUpload"]["tmp_name"];
$name = basename($_FILES["fileToUpload"]["name"]);
move_uploaded_file($tmp_name, "$target_dir$name");
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
if(isset($_POST["submit"])) {
    importCSV($target_file);
    header("Location: index.php");
}
