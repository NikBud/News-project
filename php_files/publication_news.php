<?php

$newsData = [];
if (($handle = fopen("../csv_files/news.csv", "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        $newsData[] = [
            'image' => $data[2],
            'title' => $data[0], 
            'content' => $data[1],
            'date' => $data[3]
        ];
    }
    fclose($handle);
}


header('Content-Type: application/json');
echo json_encode($newsData);

?>