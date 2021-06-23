<?php session_start();?>
<?php 
if (isset($_POST['dangnhap']))
{
    //Kết nối tới database
	$_SESSION['admin'] = FALSE;
    include('ketnoi.php');
	mysql_query("SET NAMES 'uft8'");
     
    //Lấy dữ liệu nhập vào
    $username = addslashes($_POST['txtUsername']); // Hàm xử lý biến trước khi đưa vào query
    $password = addslashes($_POST['txtPassword']);
     
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
   if (!$username || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>"; 
									// history.go(-1) là quay lại trang trước, giống như phương thức history.back()
        exit;
    }
     
    // mã hóa pasword
    $password = md5($password);
     
    //Kiểm tra tên đăng nhập có tồn tại không
    $query = mysql_query("SELECT id_member, username, password, level FROM member WHERE username='$username' ");
	$arr = mysql_fetch_array($query);	
	$row = mysql_num_rows($query);
    if ($row == 0) 
	{
		echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";	
        exit;
	}
	else
	{
			if($arr['level'] == 0)	
				$_SESSION['admin'] = TRUE;
	}       
	
    //So sánh 2 mật khẩu có trùng khớp hay không
		if ($password != $arr['password'] ) 
		{
       		echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        	exit;
    	}
		
    //Lưu tên đăng nhập
    $_SESSION['username'] = $username;
	$_SESSION['user_id'] =$row['id_member'];
	 
	
  ?>
<?php 
	if(isset($_SESSION['username']) )
	{
		header("Location:index.php");
	}
    die();
}
?> 