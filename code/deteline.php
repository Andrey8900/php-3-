<?php

function deleteLine($fileName, $searchTerm) {
    $fileContents = file($fileName, FILE_IGNORE_NEW_LINES);
    $found = false;

    foreach ($fileContents as $index => $line) {
        if (strpos($line, $searchTerm) !== false) {
            unset($fileContents[$index]);
            $found = true;
            break;
        }
    }

    if ($found) {
        file_put_contents($fileName, implode(PHP_EOL, $fileContents));
        echo "Line containing '$searchTerm' has been deleted.\n";
    } else {
        echo "Line containing '$searchTerm' not found.\n";
    }
}

$searchTerm = readline("Enter name or date to delete: ");
deleteLine('birthdays.txt', $searchTerm);
