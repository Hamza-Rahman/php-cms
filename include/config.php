<?php

// 	$db['db_host'] = 'localhost';
// 	$db['db_user'] = 'root';
// 	$db['db_pass'] = '';
// 	$db['db_name'] = 'cms';

// 	foreach($db as $key => $value){
// 		define(strtoupper($key), $value);
// 	}


// $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);



try{
	$conn = new PDO("mysql:host=localhost;dbname=cms","root","");
}
catch(PDOException $e){

 	die("Connection is error".$e->getmessage());

}

?>