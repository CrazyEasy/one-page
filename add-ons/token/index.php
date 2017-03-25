<main>

    <?php

    include 'add-ons/token/config.php';

    $pdo_sql = "mysql:host=$sql_host;dbname=$sql_dbname";
    $pdo = new PDO($pdo_sql, $sql_username, $sql_password);
    
    ?>

    
</main>
