<?php
  include"../../connect/connectDB.php";
  include"anti.php";
  session_start();
  if(isset($_POST['login'])){
    $account  = sanitize(cleanInput($_POST['account']));
    $password = sanitize(cleanInput(md5($_POST['password'])));
    if($account == "" || $password ==""){
      $message= '<div id="result">Vui lòng nhập đầy đủ thông tin</div>';
    }else{

      $sql = mysqli_query($con,"SELECT count(*) as total FROM tb_user WHERE account ='$account'");
      $row = mysqli_fetch_assoc($sql);

      if($row['total'] == 1 ){
        $sqls = mysqli_query($con,"SELECT * FROM tb_user WHERE account ='$account'");
        $rows = mysqli_fetch_assoc($sqls);
        if($password == $rows['password']){
          $_SESSION['id_user'] = $rows['id_user']; 
          header('Location: ../view/menu-user.php');
        }else{ 
          echo"<script>alert('Tài khoản hoặc mật khẩu không chính xác');
              window.location.assign('../view/formlogin.html');</script>";
        }
      }else{
        echo"<script>alert('Tài khoản không tồn tại');
              window.location.assign('../view/formlogin.html');</script>";
      }
    }
  }
  if(isset($_POST['register'])){
    header('Location: ../view/register.php');
  }
?>

