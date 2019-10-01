<?php
	//session_start();
	include"../../header/header.php";
    include"../../connect/connectDB.php"; 
?>
<form method="POST" action="../model/reset_pas.php">
	<div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://static.thenounproject.com/png/85573-200.png" alt=""/>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Đổi Mật Khẩu</h3>
                        <div class="row register-form">
                            <div class="col-md-20" style="display: flex">
                                <div class="row register-form">
		                            <div class="col-md-12">		                            
		                                <div class="form-group">
		                                	<label for="name">Nhập Mật Khẩu Cũ</label>            
		                                	<input type="password" class="form-control"  value="" name="pass"  />
		                                </div>
		                                <div class="form-group">
		                                	<label for="address">Nhập Mật Khẩu Mới</label>
		                                    <input type="password" class="form-control"  value="" name="newpass"  />
		                                </div>
		                                <div class="form-group">
		                                	<label for="phone">Nhập Lại Mật Khẩu</label>
		                                    <input type="password" class="form-control"  value="" name="renewpass"  />
		                                </div>		                               
		                            </div>
		                            <div class="col-md-12" style="display: flex">
		                                <div class="form-group">
		                                   <button class="btn"  name="reset_pass">Đổi Mật Khẩu
		                                   </button>
		                                </div>
		                                <div class="form-group">
		                                    <button class="btn" name="cancel">Hủy</button>
		                                </div>
                            		</div>                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>