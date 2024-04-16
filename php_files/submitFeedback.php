<?php

    function createRecordCSV($data){
        $open = fopen("../csv_files/posts.csv", "a");
        fputcsv($open, $data["vals"]);
        fclose($open);
        return TRUE;
    }

    session_start();
    $response = array();

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $json_data = file_get_contents("php://input");
        $data = json_decode($json_data, true);

        createRecordCSV($data);
        $name = $data["vals"][0];
        $response = [
            'message' => "Спасибо, {$name}! Ваш отзыв был получен."
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
?>

