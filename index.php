<?php
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','');
define('DB_PASS','');
define('DB_NAME','');
// Establish database connection.
try
{
    $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,
    DB_USER, DB_PASS,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    
    $sql = "SELECT * FROM users WHERE user_name = :user_name";
    $query = $dbh -> prepare($sql);
    //$query -> bindParam(':user_name', $user_name, PDO::PARAM_STR);
    //$user_name = "John Doe";
    $query -> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    if($query -> rowCount() > 0)
    {
    foreach($results as $result)
    {
    echo $result -> user_id. "<br>";
    echo $result -> user_name . "<br>";
    echo $result -> user_email . "<br>";
    
    }
    $json = json_encode($result);
    echo($json);
    }

}
catch (PDOException $e)
{
    exit("Error: " . $e->getMessage());
}

