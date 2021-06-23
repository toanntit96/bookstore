<?php session_start();?>

<!DOCTYPE html>
<html>
    <head>
        <title>BookStore</title>
        <link rel="stylesheet" href="css/style1.css" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
        <script src="css/bootstrap/js/bootstrap.min.js"></script>
        <meta http-equiv="content-type" content="text/http; charset=UTF-8">
        <script src="jquery.js"></script>
       <script type="text/javascript" src="slider.js"></script>   
    </head>
    <body>
        <div id="all">
            <!-- phan top -->
                 
            <div id="top1" >
          	<div id="top-left"  style="float: left;width: 250px;height: 54px;margin: 9px 0 0 10px;">
                    <a href="index.php"><img src="images/logo.png" width="250" height="80" alt="logo"></a>
                </div>
                
                <div id="top-right">
					<ul>
                        <form  action='login.php' method='POST'class="box-border-shadow content-box clearfix" novalidate >   
                                <li style="width:150px;">
                                    <label><p> Tên đăng nhập </p>
                                    <input style="width:150px; size:5px" type='text' name='txtUsername' />  
                                    </label>
                                </li>
                                <li style="width:150px;">
                                    <label> <p>  Mật khẩu </p>
                                    <input  style="width:150px" type='password' name='txtPassword' />
                                    </label>
                                </li>
                                <li id="abc" style=" width:100px;float:right; margin-top:30px;margin-right:30px;margin-left:5px;">
                                    <input style="width:100px" type='submit' class="btn btn-primary" name="dangnhap" value='Đăng nhập' />
                                </li>
                        </form>
 					</ul>
                </div>   
            </div> 
         
            <!-- phan main -->
      <div id="dangki">
    <h3 class="head3">Bạn Chưa Có Tài Khoản ? </h3>
                 
        <form action="xuly.php" method="POST" class="box-border-shadow content-box clearfix" novalidate>
         <p class="p">
Đăng ký thành viên, bạn cần khai báo tất cả các ô trống dưới đây
</p>
<div class="login1">
            
                      <p>  Tên đăng nhập</p>
                        
                         <div class="input">
                        <input type="text" name="txtUsername"  size="50" required />
                        </div>
                		<br>
                    <p>   Mật khẩu  </p>
                       
                         <div class="input">
                   <input type="password" name="txtPassword" size="50" required/>
                   </div>
                   <br>
                     <p>   Email </p>
                         <div class="input">
                    
                        <input type="text" name="txtEmail"  size="50" required/></div>
                   <br>
               
                      <p>  Họ và tên  </p>
                        
                         <div class="input">
               
                        <input type="text" name="txtFullname" size="50" required/></div>
                 <br>
            
                      <p>  Ngày sinh</p> 
                       
                         <div>
                    
                        <input type="date" name="txtBirthday" size="50" /></div>
                
                 <br>
                      <p>  Giới tính  </p>
                     
                         <div class="input">
                  
                 
                        <select name="txtSex">
                            <option value=""></option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select></div>
                  
         <br>
            <input type="submit" class="btn btn-success" value="Đăng ký" />
            <input type="reset" class="btn btn-info" value="Nhập lại" />
            </div>
        </form>  </div>     
             
        </div>
    </body>
</html>

