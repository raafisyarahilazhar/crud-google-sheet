<?php
require 'google-sheet-client.php';
$service = getSheetService();

$input = json_decode(file_get_contents('php://input'), true);
$id = time(); // id unik pakai timestamp

$values = [[$id, $input['name'], $input['email']]];
$body = new Google_Service_Sheets_ValueRange(['values' => $values]);

$params = ['valueInputOption' => 'RAW'];
$service->spreadsheets_values->append(getSpreadsheetId(), 'Sheet1', $body, $params);

echo json_encode(['message' => 'Data berhasil ditambahkan', 'id' => $id]);
