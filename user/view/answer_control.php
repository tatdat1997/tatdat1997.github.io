<?php 
    include"../../connect/connectDB.php"; 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chọn môn</title>
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
            $id_pack = $row['id_pack_subject'];
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
<form method="POST" action="../view/createquest.php">
    <div class="container register">
        <h3 class="title-header">Quản lý câu hỏi</h3>
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="../css/img/phoenix.png"/>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active text-center" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3>Chọn môn học</h3>
                        <div class="input-group-prepend">
                            <?php  
                                $sql = mysqli_query($con,"SELECT * FROM tb_subject WHERE id_pack_subject = '$id_pack' ORDER BY id_subject");       
                            ?>
                            <div class="dropdown" style="margin: auto;">
                                <?php  
                                if(isset($_GET['id_subject'])){
                                    $id_subject = $_GET['id_subject'];
                                    $sql1 = mysqli_query($con,"SELECT * FROM tb_subject WHERE id_subject = '$id_subject' ORDER BY id_subject");
                                    $row1 = mysqli_fetch_assoc($sql1);
                                ?>
                              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"  onclick="$(this).next().toggleClass('show')"><?php echo $row1['name_subject'] ;?></button>
                            <?php }else{
                                ?>
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"  onclick="$(this).next().toggleClass('show')">Môn học</button>
                            <?php
                              } 
                              ?>
                              <!-- <span class="caret"></span></button> -->
                              <ul class="dropdown-menu" style="text-align: center;">
                                <li><a href="/create-quest/user/view/answer_control.php">---------------------</a></li>
                                <?php while ($rows = mysqli_fetch_assoc($sql)) { ?>
                                <li><a href="/create-quest/user/view/answer_control.php?id_subject=<?php echo $rows['id_subject']; ?>"><?php echo $rows['name_subject']; ?></a></li>
                                <?php } ?>
                              </ul>
                            </div>
                            <br>
                        </div>
                            <div>
                            <?php  
                                if(isset($_GET['id_subject'])){
                                    $id_subject = $_GET['id_subject'];
                                    $sql1 = mysqli_query($con,"SELECT * FROM `tb_question` WHERE id_subject = '$id_subject' ORDER BY `id_question` ASC");
                                    $i = 1;
                                    while ($row1 = mysqli_fetch_assoc($sql1)) {
                            ?>
                                <textarea type="text" disabled="disabled" class="form-control col-md-9" aria-label="Text input with dropdown button" name="quest">Câu <?php echo $i.': '.$row1['content'] ?>
                                </textarea>
                                <div class="pd-2 pt-2">
                                <a class="btn btn-primary" href="/create-quest/user/view/update_answer.php?id_question=<?php echo $row1['id_question'];?>">Sửa</a>
                                <a class="btn btn-danger" href="/create-quest/user/model/update_answer.php?id_quest_delete=<?php echo $row1['id_question'];?>">Xóa</a>
                                 </div>
                                <br>
                            <?php
                                    $i++;
                                    }
                                    $_SESSION['subject'] = $id_subject;
                                }
                            ?> 
                            </div>                  
                        <!-- <button class="btn btn-success col-md-4" name="chooseSub">Quản lý câu hỏi</button> -->
                        <button class="btn btn-danger col-md-4" name="cancel">Hủy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php 
    include"../../footer/footer.php"
?>
