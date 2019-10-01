<?php 
    include"../../header/header.php";
    include"../../connect/connectDB.php"; 
?>
<br>
<style type="text/css">
    #result_a{
        width: 50%;
        float: left;
    }
    #result_q{
        clear: both;
        font-weight: bold;
    }
<?php  
    function random_answer($id_question,$length_quest){
        include"../../connect/connectDB.php"; 
        $A = array('A','B','C','D','E','F','G','H','I','J','K','L');
        $a = 0;
        $array_ans = array();
        $result ="";
        $sql2 = mysqli_query($con,"SELECT * FROM tb_answer WHERE id_question = '$id_question'");
        while ($rows = mysqli_fetch_assoc($sql2)) {
            $array_ans[$a] = $rows['answer'];
            $a++;
        }
        shuffle($array_ans);
        $string = "";
         for ($j=0; $j < sizeof($array_ans); $j++) { 
                echo '<p id="result_a"><b>' .$A[$j] .'</b>. '.$array_ans[$j].'</p>';
                $string .= $A[$j].'. '.$array_ans[$j].'<br>';
            }
        return $string;
    }
?>
</style>
<!-- action="../../TCPDF-master/examples/example.php" -->
<form method="POST" action="../../TCPDF-master/examples/example.php">
    <div class="container register">
        <div class="row">
            <div class="col-md-9 register-right">
                <div class="content-answer">
                <?php  
                $array = array();
                $array = $_SESSION['random'];
                $No = 1;   
                $array_ans = array();
                $A = array('A','B','C','D','E','F','G','H','I','J','K','L');
                $a = 0;
                for ($i=0; $i < sizeof($array); $i++) { 
                    $sql = mysqli_query($con,"SELECT * FROM tb_question WHERE id_question = '$array[$i]'");
                    $row = mysqli_fetch_assoc($sql);
                    $j=0;
                    echo '<p id="result_q"><b>Câu ' .$No .'</b>. '.$row['content'].'</p>';
                    $answer = random_answer($array[$i],sizeof($array));
                    $No++;
                    $array_ans[$i] = $answer;
                }
                $json = json_encode($array_ans);
                $_SESSION['answer'] = $json;
                ?>
                </div>
            </div>
        </div>
        <br>
        <button class="btn btn-info" name="print"><i class="fa fa-print"></i> In đề</button>
        <button class="btn btn-info" name="print_answer"><i class="fa fa-print"></i> In đáp án</button>
        <button class="btn btn-info" name="add_other"><i class="fa fa-plus"></i> Thêm đề con</button>
        <button class="btn btn-info" name="return"><i class="fa fa-caret-right"></i> Kết thúc</button>
    </div>    
</form>
<br>
<?php 
    include"../../footer/footer.php"
?>