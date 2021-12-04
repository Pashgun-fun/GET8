<?php

namespace core;

require __DIR__ . '/../vendor/autoload.php';

use Google_Client;
use Google_Service_Sheets;
use Google_Service_Sheets_ValueRange;

/**
 * Модель в которую складываются все общие методы для моделей
 */
class Model
{
    /**
     * Логика занесения данных в Google Sheet API
     */
    public function appendData(string $rangeCells, array $valuesCells)
    {
        $client = new Google_Client();
        $client->setApplicationName('Google Sheets and PHP');
        $client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
        $client->setAccessType('offline');
        $client->setAuthConfig(__DIR__ . "/../credentials.json");

        $service = new Google_Service_Sheets($client);
        $spreadSheetId = "192WTENvUnkN7dE5DLsX_hha0Sl4Zb-cYhFMp7rcK08o";
        $range = $rangeCells;
        $values = [$valuesCells];

        $body = new Google_Service_Sheets_ValueRange([
            'values' => $values
        ]);

        $params = [
            'valueInputOption' => 'RAW'
        ];

        $service->spreadsheets_values->append(
            $spreadSheetId,
            $range,
            $body,
            $params
        );
    }
}