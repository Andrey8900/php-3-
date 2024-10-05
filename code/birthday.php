<?php

function congratulateBirthday($fileName) {
    $today = date('d-m');
    $file = fopen($fileName, 'r');
    
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $data = explode(', ', trim($line));
            if (count( $data) == 2) {
                list($name, $birthDate) =  $data;
                $dayAndMonth = substr($birthDate, 0, 5);
                
                if ($dayAndMonth == $today) {
                    echo "Сегодня день рождения у:  $name\n";
                }
            }
        }
        fclose($file);
    } else {
        echo "Не удалось открыть файл.";
    }
}

congratulateBirthday('birthdays.txt');

