<?php

namespace models;

use core\Model;

/**
 * Модель для занесения данных и их валидации
 */
class MainPageModel extends Model
{

    /**
     * Метод обработки пришедших данных изи контроллера
     */
    public function checkValuesAndSet(string $arr)
    {
        $arrOfData = json_decode($arr, true);

        $arrOfError = [];

        $logString = date('j of F Y, \a\\t g.i a", time()') . $arr;

        foreach ($arrOfData as $key => $value) {
            switch ($key) {
                case "name":
                    if (!preg_match("/^[А-Яа-я]+$/", $value)) {
                        $arrOfError['nameError'] = 'Введено некорректное имя';
                    }
                    break;
                case "phone":
                    if (strlen($value) < 11) {
                        $arrOfError['phoneError'] = 'Введен некорректный номер телефона';
                    }
                    break;
                case "email":
                    if (!preg_match("/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u", $value)) {
                        $arrOfError['emailError'] = "Введен некорректный Email адрес";
                    }
                    break;
            }
        }

        if (!empty($arrOfError)) {
            $logString .= serialize($arrOfError) . "Данные занесены не были" . "\n";
            $file = fopen(__DIR__ . '/../logs/log', 'a+');
            fwrite($file, $logString);
            echo json_encode($arrOfError);
            return;
        }


        $this->appendData('Sheet1', [
            $arrOfData['name'],
            $arrOfData['phone'],
            $arrOfData['email'],
            $arrOfData['date'],
        ]);

        $logString .= "Данные успешно проши валидацию. Данные были успешно занесены" . "\n";
        $file = fopen(__DIR__ . '/../logs/log', 'a+');
        fwrite($file, $logString);

        echo json_encode("Пользователи успешно добавлены");
    }

}