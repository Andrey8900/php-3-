<?php

$address = '/code/birthdays.txt';

$name = readline("Введите имя: ");
$date = readline("Введите дату рождения в формате ДД-ММ-ГГГГ: ");

if(validate($date)){
    $data = $name . ", " . $date . "\r\n";

    $fileHandler = fopen($address, 'a');
    
    if(fwrite($fileHandler, $data)){
        echo "Запись $data добавлена в файл $address";
    }
    else {
        echo "Произошла ошибка записи. Данные не сохранены";
    }
    
    fclose($fileHandler);
}
else{
    echo "Введена некорректная информация";
}

function validate(string $date): bool {
    $dateBlocks = explode("-", $date);

    if(count($dateBlocks) !== 3){
        return false;
    }

    list($day, $month, $year) = $dateBlocks;

    if(!is_numeric($day) || !is_numeric($month) || !is_numeric($year)){
        return false;
    }

    $day = (int)$day;
    $month = (int)$month;
    $year = (int)$year;

    if($year > date('Y') || $year < 1900) {
        return false;
    }

    if($month < 1 || $month > 12) {
        return false;
    }

    if($day < 1 || $day > 31) {
        return false;
    }

    if(!checkdate($month, $day, $year)) {
        return false;
    }

    return true;
}
