<?php 
    include"../../connect/connectDB.php"; 
    session_start();
?>
<?php 

if(isset($_POST['createQuest'])){
    $subject = $_POST['subject'];
    $total_quest = $_POST['total_quest'];
    $easy  = $_POST['easy'];
    $diff  = $_POST['diff'];
    $Ediff = $_POST['Ediff'];
    $total = $easy + $diff + $Ediff;
    if($total_quest >= $total){
        $easy += $total_quest - $total;

        $sql_easy  = mysqli_query($con,"SELECT * FROM tb_question WHERE level = 1 AND id_subject = '$subject' ORDER BY RAND() LIMIT $easy");
        $sql_diff  = mysqli_query($con,"SELECT * FROM tb_question WHERE level = 2 AND id_subject = '$subject' ORDER BY RAND() LIMIT $diff");
        $sql_Ediff = mysqli_query($con,"SELECT * FROM tb_question WHERE level = 3 AND id_subject = '$subject' ORDER BY RAND() LIMIT $Ediff");
        $data = array();
        $i = 0;
        while ($row_easy = mysqli_fetch_array($sql_easy)) {
             $data[$i] = $row_easy['id_question'];
             $i++;
        }
        while ($row_diff = mysqli_fetch_array($sql_diff)) {
             $data[$i] = $row_diff['id_question'];
             $i++;
        }
        while ($row_Ediff = mysqli_fetch_array($sql_Ediff)) {
             $data[$i] = $row_Ediff['id_question'];
             $i++;
        }
        $leg=sizeof($data);
        $string = '[';
        for ($i=0; $i < $leg; $i++) { 
            $string .= '"'.$data[$i].'",';
        }
        $string = substr($string, 0,-1);
        $string .=']';
        $_SESSION['string'] = $string;
        $_SESSION['leg'] = $leg;
        header('location: /create-quest/user/view/createExam.php');
    }else{
        echo"<script>alert('Số câu hỏi yêu cầu không hợp lệ! Vui lòng thạo tác lại.');
          window.location.assign('../view/chooseSub.php');</script>";
    }
}
if(isset($_POST['cancel'])){
    header('location: /create-quest/user/view/menu-user.php');
}
?>