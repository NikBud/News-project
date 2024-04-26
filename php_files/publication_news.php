<?php

$newsData = [];
$searchStr = strtolower($_GET["search"]);
$theme = $_GET["theme"];

if (($handle = fopen("../csv_files/news.csv", "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        if ((strcasecmp($data[3], $theme) == 0) || (strcasecmp($theme, "Toutes") == 0)){
            if ((strcasecmp($searchStr, "") == 0) || (strpos(strtolower($data[0]), $searchStr) !== false) || (strpos(strtolower($data[1]), $searchStr) !== false)){
                $newsData[] = [
                    'image' => $data[2],
                    'title' => $data[0], 
                    'content' => $data[1],
                    'date' => $data[5],
                ];
            }
        }
    }
    fclose($handle);
}


header('Content-Type: application/json');
echo json_encode($newsData);

?>