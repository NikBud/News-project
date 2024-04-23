<?php

    function createRecordCSV($data){
        $open = fopen("../csv_files/news.csv", "a");
        fputcsv($open, $data["vals"]);
        fclose($open);
        return TRUE;
    }

    session_start();
    $response = array();

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $json_data = file_get_contents("php://input");
        $data = json_decode($json_data, true);
        $data['vals'][] = date('d/m/Y');
        
        createRecordCSV($data);
        $response = [
            "message" => "Спасибо! Ваша статья успешно добавлена."
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
?>

