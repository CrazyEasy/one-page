<main>
<?php 
    include 'add-ons/token/config.php';

    $pdo_sql = "mysql:host=$sql_host;dbname=$sql_dbname";
    $pdo = new PDO($pdo_sql, $sql_username, $sql_password);
    
    
    $result = mysql_query("SELECT * FROM token_tokens");
    if($result)
    {
        echo "Tabelle \"token_tokens\" existiert bereits!";
    }
    else
    {
        $sql = "CREATE TABLE `$sql_dbname`.`token_tokens` ( `token` TEXT NOT NULL , `type` TEXT NOT NULL , `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;";
        $result = mysqli_query($pdo, $sql)
        or die("Datenbank konnte nicht erstellt werden: " . mysql_error());
    }
    
?>

</main>