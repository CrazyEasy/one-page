<main>

    <?php

    include 'add-ons/token/config.php';

    $pdo_sql = "mysql:host=$sql_host;dbname=$sql_dbname";
    $pdo = new PDO($pdo_sql, $sql_username, $sql_password);

    $sql = "SELECT data, category, timestamp FROM token_data";
    foreach ($pdo->query($sql) as $row) {
        echo $row['data']." - ".$row['category']."<br />";
        echo "Timestamp: ".$row['timestamp']."<br /><br />";
    }
    
    ?>

</main>
