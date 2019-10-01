<?php  
	include"../../connect/connectDB.php"; 
	session_start();
	$num 	 = $_SESSION['num'];
	$id_quest   = $_SESSION['quest'];
	$subject = $_SESSION['subject'];

	if(isset($_POST['edit'])){
		$A = array('A','B','C','D','E','F','G','H','I','J','K','L');
		$quest_new = $_POST['quest'];
		$sql = "UPDATE tb_question SET content = '$quest_new' WHERE id_question = $id_quest";
		$result = mysqli_query($con,$sql);
		for ($i=0; $i < $num; $i++) { 
			$answer = $A[$i];
			echo $ans = $_POST['ans'.$answer];
			$sqls = mysqli_query($con,"UPDATE tb_answer SET `answer` = '$ans' WHERE `id_question` = '$quest'");
		}
		unset($_SESSION['quests']);
		header('location: ../view/answer_control.php?id_subject='.$subject);
	}
	if(isset($_POST['cancel'])){
		unset($_SESSION['quests']);
		header('location: ../view/answer_control.php?id_subject='.$subject);
	}
	if(isset($_GET['id_quest_delete'])){
		$id_quest   = $_SESSION['quest'];

		$sql_ans   = mysqli_query($con,"DELETE FROM tb_answer WHERE id_question =  $id_quest");
		$sql_quest = mysqli_query($con,"DELETE FROM tb_question WHERE id_question =  $id_quest");
		unset($_SESSION['quests']);
		header('location: ../view/answer_control.php?id_subject='.$subject);
	}
?>