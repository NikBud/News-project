<?php
$id = $_GET['id']; 


function getNewsById($id) {
    if (($handle = fopen("news_test.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if ($data[0] == $id) {
                return $data;
            }
        }
        fclose($handle);
    }
    return null;
}

$news = getNewsById($id);
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $news[1]; ?></title>
    <link rel="stylesheet" type="text/css" href="styles.css">


    
</head>
<body>
    <div class="full-news">	
        <h1><?php echo $news[0]; ?></h1>
    
        <p><?php echo $news[1]; ?></p>
    
        <div class="container">
            <img src="<?php echo htmlspecialchars($news[2], ENT_QUOTES, 'UTF-8'); ?>" alt="Описание изображения" width="500" >
        </div>
        
        <p><?php echo $news[7]; ?></p>

        
        <div class="auteur-date">
            <?php echo $news[5]; ?>
            <br>
            <?php echo $news[4]; ?>
        </div>

        <a href="index.php">Retour à la page principale</a>
    </div>
</body>
</html>

