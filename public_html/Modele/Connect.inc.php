<?php
$user="user2";
$passwd="sfrappez";
$err=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);

try {
    $conn = new PDO("mysql:host=localhost;dbname=db_benevoles;charset=UTF8",$user,$passwd,$err);
}
catch (PDOException $e){
	echo "Serveur indisponible : ".$e->getMessage()."<br>";
	var_dump($err);
	die();

}

?>