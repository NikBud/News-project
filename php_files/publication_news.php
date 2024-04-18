<?php

$newsData = [];
if (($handle = fopen("../csv_files/news.csv", "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, "\t")) !== false) {
        $newsData[] = [
            'image' => $data[3],   // тут я не знаю как картинки разместить на сайте ((
            'title' => $data[0], 
            'content' => $data[1] 
        ];
    }
    fclose($handle);
}


header('Content-Type: application/json');
echo json_encode($newsData);

?>