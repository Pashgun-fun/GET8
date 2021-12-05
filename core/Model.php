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
        /**
         * Создаём подключение к гугл клиенту, для работы с его сервисами
         */
        $client = new Google_Client();
        /**
         * Подключаемся к названию проекта
         */
        $client->setApplicationName('Google Sheets and PHP');
        $client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
        /**
         * Задаём тип доступа
         */
        $client->setAccessType('offline');
        /**
         * Подключаем файл с параметрами подключения
         */
        $client->setAuthConfig(__DIR__ . "/../credentials.json");

        $service = new Google_Service_Sheets($client);
        /**
         * ID для подключения
         */
        $spreadSheetId = "192WTENvUnkN7dE5DLsX_hha0Sl4Zb-cYhFMp7rcK08o";
        /**
         * Переменная куда будут заноситься интервал ячеек для работы
         */
        $range = $rangeCells;
        /**
         * Переменная для значений, которые будут заноситься
         */
        $values = [$valuesCells];

        /**
         * Отправляем данные в саму таблицу
         */
        $body = new Google_Service_Sheets_ValueRange([
            'values' => $values
        ]);

        /**
         * Параметры для занесения данных
         */
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