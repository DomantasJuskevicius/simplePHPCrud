<?php
include_once './includes/navbar.php';
require __DIR__.'/records/records.php';

if(!isset($_GET['id'])){
    include "./includes/notFound.php";
    exit;
}
$recordId = $_GET['id'];
$record = getSingleRecord($recordId);

if(!$record){
    include "./includes/notFound.php";
    exit;
}

$errors = [
    'name' => '',
    'email' => '',
    'phone' => '',
    'address' => '',
    'date' => '',
];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $record = array_merge($record, $_POST);

    $isValid = validateData($record, $errors);

    if($isValid){
        $record = updateRecord($_POST, $recordId);
        header("Location: index.php");
    }
}
?>

<?php
include './includes/form.php';
include_once './includes/footer.php';
?>