<?php
require 'google-sheet-client.php';
$service = getSheetService();

$input = json_decode(file_get_contents('php://input'), true);

$response = $service->spreadsheets_values->get(getSpreadsheetId(), 'Sheet1');
$data = $response->getValues();

for ($i = 1; $i < count($data); $i++) {
    if ($data[$i][0] == $input['id']) {
        $range = "Sheet1!A" . ($i + 1) . ":C" . ($i + 1);
        $values = [[$input['id'], $input['name'], $input['email']]];
        $body = new Google_Service_Sheets_ValueRange(['values' => $values]);
        $params = ['valueInputOption' => 'RAW'];
        $service->spreadsheets_values->update(getSpreadsheetId(), $range, $body, $params);

        echo json_encode(['message' => 'Data berhasil diperbarui']);
        exit;
    }
}

echo json_encode(['error' => 'ID tidak ditemukan']);
