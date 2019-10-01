<?php  
	session_start();
	if(isset($_POST['create'])){
		$random = $_POST['random'];
		if($random =='process'){
			header('location:../view/createExam.php');
		}else{
			$array = explode(',',$random);
			$_SESSION['random']	= $array;
			header('location:../view/showExam.php');
		}
	}
	if(isset($_POST['cancel'])){
	header('location: /create-quest/user/view/menu-user.php');
	}
?>