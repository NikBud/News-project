<?php

    function get($login){
        $open = fopen("users.csv", "r");
        if (!$open){
            return NULL;
        }
        fgetcsv($open, 1000, ",");
        
        while (($data = fgetcsv($open, 1000, ",")) !== FALSE) 
        {
            if ($data[0] == $login){
                fclose($open);
                return $data[1];
            }
        }
        fclose($open);
        return NULL;
    }

    function exist($login){
        $open = fopen("users.csv", "r");
        if (!$open){
            return FALSE;
        }
        fgetcsv($open, 1000, ",");
        
        while (($data = fgetcsv($open, 1000, ",")) !== FALSE) 
        {
            if ($data[0] == $login){
                fclose($open);
                return TRUE;
            }
        }
        fclose($open);
        return FALSE;
    }

    function loginOK($login, $mdp){
        $ifExists = exist($login);
        if (!$ifExists){
            return FALSE;
        }
        $mdpDB = get($login);

        if ($mdp == $mdpDB){
            return TRUE;
        }
        return FALSE;
    }

    $response = array();

    if(isset($_POST["email"])){
        $exists = loginOK($_POST["email"], $_POST["password"]);
        if($exists === TRUE){
            $response["credentialsOk"] = 1;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);
?>