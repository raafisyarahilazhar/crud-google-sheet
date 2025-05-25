<?php
require 'google-sheet-client.php';
$service = getSheetService();

$input = json_decode(file_get_contents('php://input'), true);

$response = $service->spreadsheets_values->get(getSpreadsheetId(), 'Sheet1');
$data = $response->getValues();

$requests = [];
for ($i = 1; $i < count($data); $i++) {
    if ($data[$i][0] == $input['id']) {
        $requests[] = new Google_Service_Sheets_Request([
            'deleteDimension' => [
                'range' => [
                    'sheetId' => 0,
                    'dimension' => 'ROWS',
                    'startIndex' => $i,
                    'endIndex' => $i + 1
                ]
            ]
        ]);
        break;
    }
}

if ($requests) {
    $batchUpdateRequest = new Google_Service_Sheets_BatchUpdateSpreadsheetRequest(['requests' => $requests]);
    $service->spreadsheets->batchUpdate(getSpreadsheetId(), $batchUpdateRequest);
    echo json_encode(['message' => 'Data berhasil dihapus']);
} else {
    echo json_encode(['error' => 'ID tidak ditemukan']);
}
