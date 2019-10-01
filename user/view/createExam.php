<?php 
    include"../../connect/connectDB.php"; 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
    <link href="/create-quest/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="/create-quest/css/footer.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/create-quest/css/easyui.css">
    <link rel="stylesheet" type="text/css" href="/create-quest/css/registeruser.css">
    <link rel="stylesheet" type="text/css" href="/create-quest/css/icon.css">
    <link rel="stylesheet" type="text/css" href="/create-quest/css/demo.css">
    <link rel="stylesheet" type="text/css" href="/create-quest/css/header.css">
    <script type="text/javascript" src="/create-quest/js/jquery.min.js"></script>
    <script src="/create-quest/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/create-quest/js/jquery.easyui.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top" id="banner">
    <div class="container">
  <!-- Brand -->
  <a class="navbar-brand" href="../../index.php"><span>TPT</span> Software</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
           <!-- Dropdown -->
        <?php 
          if(isset($_SESSION['id_user'])){
            $id_user = $_SESSION['id_user'];
            $sql = mysqli_query($con,"SELECT * FROM tb_user WHERE id_user ='$id_user'");
            $row = mysqli_fetch_assoc($sql);
        ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            <?php echo $row['name'] ?>
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="/create-quest/user/view/watch_user.php">Tài Khoản Của Tôi</a>
            <a class="dropdown-item" href="/create-quest/user/view/changce_password.php">Đổi Mật Khẩu</a>
            <a class="dropdown-item" href="/create-quest/user/model/logout.php">Đăng xuất</a>
          </div>
        </li>
        <?php 
          }else{

        ?>
        <li class="nav-item">
            <a class="nav-link" href="user/view/formlogin.html">Đăng nhập</a>
          </li>
        <?php
        } ?>
        </ul>
      </div>
        </div>
    </nav>

<br>

<form method="POST" action="../model/createExam.php">
	<div class="container register">
        <h3 class="title-header">Tạo đề thi</h3>
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="../css/img/phoenix.png"/>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="styled">
                        <p class="register-heading">Ghi chú:<br>Bước 1: Chọn chọn Tạo đề<br>Bước 2: Chọn Xem đề</p>
                        </div>
                        <div class="row register-form">
                            <input type="hidden" name="random" id="random" value="process">
                            <button type="button" class="btn btn-success btn-block" onclick="main()">Tạo đề</button>
                            <button class="btn btn-warning btn-block" name="create">Xem đề</button>
                            <button class="btn btn-danger btn-block" name="cancel">Hủy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<br>
<?php 
	include"../../footer/footer.php"
?>
<?php  
    
    // $sql = mysqli_query($con,"SELECT * FROM tb_question ORDER BY id_question ASC");
    // $data = array();
    // $i = 0;
    // while ($row = mysqli_fetch_array($sql)) {
    //      $data[$i] = $row['id_question'];
    //      $i++;
    // }
    // $leg=sizeof($data);
    // $string = '[';
    // for ($i=0; $i < $leg; $i++) { 
    //     $string .= '"'.$data[$i].'",';
    // }
    // $string = substr($string, 0,-1);
    // $string .=']';  
if(isset( $_SESSION['string'])){
    $string = $_SESSION['string'];
    $leg = $_SESSION['leg'];
}
?>
    <script>
        function main(){
            var listQuestion =<?php echo $string; ?>;
            var numberQuestion = <?php echo $leg; ?>;
            var arrResult = myFunction(listQuestion, numberQuestion);
            // document.getElementById("demo").innerHTML = arrResult;
            document.getElementById('random').value= arrResult;
        }
        //numberQuestion use for quanlity number
        function myFunction(listQuestion, numberQuestion) {
            var arrTem = [];
            var arrResult = [];
            //randrom and add item to list
            for (var i = 0; i <numberQuestion; i++) {
                //random tu 1->100
                var num = Math.floor((Math.random() * listQuestion.length) + 1);
                if(checkNumAppear(arrTem, num)){
                    arrTem.push(num);
                }else{
                    //random false, repeat random
                    i--;
                }
            }
            //
            for (var i = 0; i <numberQuestion; i++) {
                arrResult[i] = listQuestion[arrTem[i] - 1];
            }
            return arrResult;
        }
        //listNum is list Number for check, num is number check
        function checkNumAppear(listNum, num){
            for (var i=0;i<listNum.length;i++) {
                if(listNum[i]==num){
                    return false;
                }
            }
            return true;
        }
    </script>
</body>
</html>