<?php 

$host = "localhost";
$db_name = "csm";
$user = "root";
$password = "";

date_default_timezone_set('Asia/Dhaka');

try {
    $pdo = new PDO("mysql:host={$host};dbname={$db_name}", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $m) { 
    echo "Connection Failed: " . $m->getMessage();
}

//Count any column value for user table
    function stRowCount($col,$val){
        global $pdo;
        $stm = $pdo->prepare("SELECT $col FROM user WHERE $col = ?");
        $stm->execute(array($val));
        $count = $stm->RowCount();
        return $count;
    }





?>
