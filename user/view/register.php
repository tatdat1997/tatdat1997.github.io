<?php
	//session_start();
	include"../../header/header.php";
    include"../../connect/connectDB.php"; 
?>
<form method="POST" action="../model/register.php">
	<div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://static.thenounproject.com/png/85573-200.png" alt=""/>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Đăng Ký Tài Khoản</h3>
                        <div class="row register-form">
                            <div class="col-md-20" style="display: flex">
                                <div class="row register-form">
		                            <div class="col-md-12">
		                                <div class="form-group">                                
				                      		<input type="text" class="form-control" 
				                      			placeholder="Họ Và Tên" value="" name="Name" />
		                                </div>
		                                <div class="form-group">		                        
		                                    <input type="text" class="form-control" placeholder="Địa Chỉ" value="" name="address" />
		                                </div>
		                                <div class="form-group">                              	
		                                    <input type="text" class="form-control" placeholder="Số Điện Thoại" value="" name="phone" onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));">
		                                </div>
		                                <div class="form-group">		                           
		                                    <select class="form-control" id="gender" name="gender">
		                                    	<option value="Nam">Nam</option>
		                                    	<option value="Nữ">Nữ</option>
		                                    </select>
		                                </div>
		                                <div class="form-group">	                          
		                                    <input type="text" class="form-control" placeholder="Tên Tài Khoản" value="" name="account" />
		                                </div>
		                                <div class="form-group">		                           
		                                    <input type="password" class="form-control" placeholder="Mật Khẩu" value="" name="password" />
		                                </div>
		                                <div class="form-group">		                           
		                                    <input type="password" class="form-control" placeholder="Xác Nhận Lại Mật Khẩu" value="" name="repassword" />
		                                </div>
		                            </div>
		                            <div class="col-md-6" style="display: flex">
		                                <div class="form-group">
		                                   <button class="btn" name="register">Đăng Ký</button>
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