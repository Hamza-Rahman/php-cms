
<?php

function user_online(){

	global $conn;

		$session = session_id();
		$time = time();
		$time_out_sec = 30;
		$time_out = $time - $time_out_sec;

		$query = $conn->query("SELECT * FROM user_online WHERE session = '$session'");

		$count = $query->rowCount();

		if($count == NULL){

			$query = $conn->query("INSERT INTO user_online (session, user_time) VALUES('$session', '$time') ");

		}else{
			$query = $conn->query("UPDATE user_online SET user_time = '$time' WHERE session = '$session'");
		}


		$user_online_now = $conn->query("SELECT * FROM user_online WHERE user_time > '$time_out'");
		return $user_count = $user_online_now ->rowCount();

}


function confirmQuery($result){

	global $conn;

		if(!$result){

			echo "QUERRY PROBLEM..\n";
			print_r($conn->errorInfo());
		}	

}


?>