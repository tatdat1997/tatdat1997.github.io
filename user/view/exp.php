
<?php  
include"../../connect/connectDB.php"; 
session_start();
if(isset($_SESSION['answer'])){
	$answer = array();
	$answer = $_SESSION['answer'];
	$array_json = json_decode($answer);
	for ($i=0; $i < sizeof($array_json) ; $i++) { 
		echo $array_json[$i];
		echo '--------------<br>';
	}
}
?>