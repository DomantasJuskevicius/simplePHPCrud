<?php
include_once './includes/navbar.php';
require_once __DIR__.'/records/records.php';

$record = [
    'id' => '',
    'name' => '',
    'email' => '',
    'phone' => '',
    'address' => '',
    'datetime' => '',
];

$errors = [
    'name' => '',
    'email' => '',
    'phone' => '',
    'address' => '',
    'datetime' => '',
];
$isValid = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $record = array_merge($record, $_POST);
    $record = createRecord($_POST);

    // $isValid = validateData($record, $errors);

    // if($isValid){
    //     $record = createRecord($_POST);

    //     header("Location: index.php");
    // }
}
?>

<?php
include_once './includes/form.php';
include_once './includes/footer.php';
?>