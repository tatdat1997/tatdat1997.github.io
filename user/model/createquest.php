<?php  
include'../../connect/connectDB.php';
session_start();
if(isset($_POST['add'])){
	if (isset($_SESSION['chooseSub'])) {
		$chooseSub = $_SESSION['chooseSub'] ;
	}
	$level = $_POST['level'];
	$quest = $_POST['quest'];
	if($quest ==""){
		echo"<script>alert('Vui lòng điền câu hỏi');
          window.location.assign('../view/createquest.php');</script>";
	}else{
		$sql  = mysqli_query($con,"INSERT INTO tb_question VALUES (NULL, '$quest','$level','$chooseSub')");
		header('location:../view/createanswer.php');
		echo"<script>window.location.assign('../view/createanswer.php');</script>";
	}
}
if(isset($_POST['cancel'])){
	header('location: ../view/chooseSubject.php');
	unset($_SESSION['chooseSub']);
}
?>