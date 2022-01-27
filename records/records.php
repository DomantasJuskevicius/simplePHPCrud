<?php

function putJson($records)
{
    file_put_contents(__DIR__ . '/records.json', json_encode($records, JSON_PRETTY_PRINT));
}

function importCSV($file_pointer)
{
    $csv = file_get_contents($file_pointer);
    $array = array_map("str_getcsv", explode("\n", $csv));
    file_put_contents(__DIR__ . '/records.json', json_encode($array, JSON_PRETTY_PRINT));
}
function exportCSV($file_pointer)
{
    $records = getRecords();
    $csv = 'exportedData.csv';
    $file_pointer = fopen($csv, 'w');
    foreach ($records as $record) {
        fputcsv($file_pointer, $record);
    }
    fclose($file_pointer);
}

function getRecords()
{
    return json_decode(file_get_contents(__DIR__ . '/records.json'), true);
}

function getSingleRecord($id)
{
    $records = getRecords();
    foreach ($records as $record) {
        if ($record['id'] == $id) {
            return $record;
        }
    }
    return null;
}

function createRecord($data)
{
    $records = getRecords();
    $data['id'] = count($records) + 1;
    $records[] = $data;
    putjson($records);

    return $data;
}

function updateRecord($data, $id)
{
    $updatedRecord = [];
    $records = getRecords();
    foreach ($records as $i => $record) {
        if ($record['id'] == $id) {
            $records[$i] = $updatedRecord = array_merge($record, $data);
        }
    }
    putJson($records);

    return $updatedRecord;
}

function deleteRecord($id)
{
    $records = getRecords();

    foreach ($records as $i => $record) {
        if ($record['id'] == $id) {
            array_splice($records, $i, 1);
        }
    }

    putJson($records);
}


function validateDate($date, $format = 'Y-m-d H:i:s')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

function validateData($data, &$errors)
{
    $isValid = true;

    if (empty($data['name'])) {
        $isValid = false;
        $errors['name'] = 'You must enter your name';
    }
    if (empty($data['email']) || strlen($data['email']) < 6 || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
        $errors['email'] = 'Entered email is not valid';
    }
    if (!filter_var($data['phone'], FILTER_VALIDATE_INT)) {
        $isValid = false;
        $errors['phone'] = 'Enter a valid phone number';
    }
    if (empty($data['address']) || strlen($data['address']) < 6 || strlen($data['address']) > 40) {
        $isValid = false;
        $errors['address'] = 'your address must be between 6 and 40 characters';
    }
    if (empty($data['datetime']) && validateDate($data['datetime'])) {
        $isValid = false;
        $errors['datetime'] = 'Please enter a valid date';
    }

    return $isValid;
}
