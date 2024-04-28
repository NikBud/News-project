
<!DOCTYPE html>
<html>
<head>
    <title>Новости</title>
</head>
<body>
<h1>Новости</h1>
<div id="news-list">
    <?php
    if (($handle = fopen("news_test.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            echo '<div class="news-summary">';
            echo '<h2><a href="news.php?id=' . $data[0] . '">' . $data[0] . '</a></h2>';
            echo '<img src="' . $data[2] . '"width="300">';
            echo '</div>';
        }
        fclose($handle);
    }
    ?>
</div>
</body>
</html>

