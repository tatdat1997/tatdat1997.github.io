<?php  
include'../../connect/connectDB.php';
session_start();
if(isset($_POST['add'])){
	$ansA = $_POST['A'];						// lấy giá trị của các câu hỏi
	$ansB = $_POST['B'];						//
	$ansC = $_POST['C'];						//
	$ansD = $_POST['D'];						//
	$trueA = (isset($_POST['trueA']))?1:0;		// kiểm tra đáp án là đáp án đúng sai
	$trueB = (isset($_POST['trueB']))?1:0;		// 
	$trueC = (isset($_POST['trueC']))?1:0;		//
	$trueD = (isset($_POST['trueD']))?1:0;		//

	$sql_id = mysqli_query($con,"SELECT * FROM tb_question ORDER BY id_question DESC LIMIT 1"); //lấy id câu hỏi vừa tạo
	$row = mysqli_fetch_array($sql_id);
	$id_question = $row['id_question'];
		//thêm đáp án khi hơn 4 đáp án
	if(isset($_POST['answer'])){
	$ansAnswer = $_POST['answer'];
	$trueA = (isset($_POST['trueAnswer']))?1:0;
										//nếu đáp án khác rỗng thì insert vào CSDL
	$sql_A = ($ansAnswer != "")?mysqli_query($con,"INSERT INTO tb_answer VALUES (NULL, '$id_question','$ansAnswer','$trueA')"):0;
	}
	$sql_A = ($ansA != "")?mysqli_query($con,"INSERT INTO tb_answer VALUES (NULL, '$id_question','$ansA','$trueA')"):0;	
	$sql_B = ($ansB != "")?mysqli_query($con,"INSERT INTO tb_answer VALUES (NULL, '$id_question','$ansB','$trueB')"):0;
	$sql_C = ($ansC != "")?mysqli_query($con,"INSERT INTO tb_answer VALUES (NULL, '$id_question','$ansC','$trueC')"):0;
	$sql_D = ($ansD != "")?mysqli_query($con,"INSERT INTO tb_answer VALUES (NULL, '$id_question','$ansD','$trueD')"):0;	

	$_SESSION['finish'] = 1;

	header('location: /create-quest/user/view/createanswer.php');
}
if(isset($_POST['cancel'])){
	unset($_SESSION['finish']);
	header('location: ../view/menu-user.php');
}
if(isset($_POST['add_ans'])){
		// lấy giá trị của các câu hỏi
	$ansA = $_POST['A'];
	$ansB = $_POST['B'];
	$ansC = $_POST['C'];
	$ansD = $_POST['D'];
		// kiểm tra đáp án là đáp án đúng sai
	$trueA = (isset($_POST['trueA']))?1:0;
	$trueB = (isset($_POST['trueB']))?1:0;
	$trueC = (isset($_POST['trueC']))?1:0;
	$trueD = (isset($_POST['trueD']))?1:0;
	$sql_id = mysqli_query($con,"SELECT * FROM tb_question ORDER BY id_question DESC LIMIT 1");
	$row = mysqli_fetch_array($sql_id);
	$id_question = $row['id_question'];
		//nếu đáp án khác rỗng thì insert vào CSDL
	$sql_A = ($ansA != "")?mysqli_query($con,"INSERT INTO tb_answer VALUES (NULL, '$id_question','$ansA','$trueA')"):0;;
	$sql_B = ($ansB != "")?mysqli_query($con,"INSERT INTO tb_answer VALUES (NULL, '$id_question','$ansB','$trueB')"):0;
	$sql_C = ($ansC != "")?mysqli_query($con,"INSERT INTO tb_answer VALUES (NULL, '$id_question','$ansC','$trueC')"):0;
	$sql_D = ($ansD != "")?mysqli_query($con,"INSERT INTO tb_answer VALUES (NULL, '$id_question','$ansD','$trueD')"):0;
		//thêm đáp án khi hơn 4 đáp án
	$ansAnswer = $_POST['answer'];
	$trueA = (isset($_POST['trueAnswer']))?1:0;
	$sql_A = ($ansAnswer != "")?mysqli_query($con,"INSERT INTO tb_answer VALUES (NULL, '$id_question','$ansAnswer','$trueA')"):0;
	// $_SESSION['finish'] = 0;
	header('location: ../view/createanswer.php');
}
if(isset($_POST['add_finish'])){
	unset($_SESSION['finish']);
	header('location: /create-quest/user/view/createQuest.php');
}
?>