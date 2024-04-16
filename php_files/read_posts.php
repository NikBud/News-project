<?php

// Устанавливаем тип контента в текст, чтобы упростить вывод
header('Content-type: text/html; charset=utf-8');

$file = '../csv_files/data.txt';

// Проверяем, существует ли файл
if (file_exists($file)) {
    // Читаем содержимое файла
    $posts = file_get_contents($file);

    // Разделяем записи по двойному переводу строки
    $postsArray = explode("\n\n", $posts);
    
    // Выводим каждую запись
    foreach ($postsArray as $post) {
        if (trim($post) != "") {
            echo nl2br($post) . "<hr>";
        }
    }
} else {
    echo "Файл с публикациями не найден.";
}
?>

