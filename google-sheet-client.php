<?php
require 'vendor/autoload.php';

function getClient() {
    $client = new Google_Client();
    $client->setApplicationName('Google Sheets CRUD');
    $client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
    $client->setAuthConfig('credentials.json');
    $client->setAccessType('offline');
    return $client;
}

function getSheetService() {
    $client = getClient();
    return new Google_Service_Sheets($client);
}

function getSpreadsheetId() {
    return '1XyS88PH8FKuGW-Qg7ZBi966Qc26tJvLopcHEBAqOLes';
}
