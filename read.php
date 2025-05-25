<?php
require 'google-sheet-client.php';
$service = getSheetService();

$response = $service->spreadsheets_values->get(getSpreadsheetId(), 'Sheet1');
$data = $response->getValues();

$headers = $data[0];
$results = [];

for ($i = 1; $i < count($data); $i++) {
    $results[] = array_combine($headers, $data[$i]);
}

header('Content-Type: application/json');
echo json_encode($results);
