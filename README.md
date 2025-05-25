Struktur Folder
create.php
read.php
update.php
delete.php
google-sheet-client.php
credentials.json ← file dari Google Cloud
composer.json
vendor/ ← hasil dari composer install

 Install dependencies menggunakan Composer
 composer require google/apiclient:^2.0

Buat file Google Spreadsheet
https://docs.google.com/spreadsheets/d/1AbCDefGhIjKlMnOpQrstUVwxyz12345678/edit#gid=0
1AbCDefGhIjKlMnOpQrstUVwxyz12345678 -> Ini adalah Spreadsheet ID

Setup Google Cloud & API
1. Buat Project Google Cloud
Buka: https://console.cloud.google.com/
Klik Select project → New Project
Beri nama dan buat project baru

2. Aktifkan API
Aktifkan API berikut:
Google Sheets API
Google Drive API
Klik "Enable" pada kedua API.

3. Buat Service Account
Masuk ke menu IAM & Admin → Service Accounts
Klik Create Service Account
Isi:
Name: sheet-access
Role: Editor
Setelah dibuat, buka tab Keys
Klik Add Key → Create new key → JSON
File JSON akan otomatis terunduh → simpan dengan nama credentials.json di folder proyek kamu

Ubah google-sheet-client.php

function getSpreadsheetId() {
    return 'ISI_DENGAN_SPREADSHEET_ID_ANDA';
}
