<?php session_start();?>
<html>
<head>
<meta charset="utf-8">
</head>

<?php 
if (isset($_POST['change_pass']))
{
    //Kết nối tới database
    include('ketnoi.php');
     mysql_query("SET NAMES 'utf8'");
    //Lấy dữ liệu nhập vào
   	$id_member=$_SESSION['id_member'];
    $username=$_SESSION['username'];
    $old= addslashes($_POST['txtPassword']);
    $new1= addslashes($_POST['txtPassword1']);
	$new2= addslashes($_POST['txtPassword2']);
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
   if (!$old || !$new1 || !$new2) 
   {
        echo "Vui lòng nhập đầy đủ  mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    //Kiểm tra tên đăng nhập có tồn tại không
	$sql = "SELECT * FROM member WHERE id_member=$id_member AND username= '$username'";
    $result = mysql_query($sql);
	$numcout = mysql_num_rows($result);
	if($numcout<=0)
	{
		header('location:dangnhap.php');
	}
	else
	{
    //Lấy mật khẩu trong database ra
     $arr = mysql_fetch_array($result);
	 $old=md5($old);
	 $new1= md5($new1);
	 $new2=md5($new2);
	 $pass=false;
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($old != $arr['password']) 
	{
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
	else
	{  
		if($new1!=$new2)
		{
			echo"mật khẩu không trùng khớp <a href='javascript: history.go(-1)'>Trở lại</a>";
		}
		else 
			if($new1==$old)
			{
			 	echo'Mật khẩu chưa thay đổi';
			} 
			else
			{
				$new=$new1;
				$id_member= $_SESSION['id_member'];
			 	$addpass = mysql_query(" UPDATE member
											SET password = '{$new}'
											where id_member=$id_member ");
											
				
				
				if($addpass == 1)
				{
					if(isset($_GET['add'])) 
					{
						if($_GET['add'] == 'member' )	
							{
								echo' Bạn đã thay đổi mật khẩu thành công. <a href="member.php?ID=Thongtin">Trở lại</a>';
							}
					}
					else
					 	echo' Bạn đã thay đổi mật khẩu thành công. <a href="admin.php">Trở lại</a>';
				}
				else 
				{
					if(isset($_GET['add'])) 
					{
						if($_GET['add'] == 'member' )	
							{
								echo'Xảy ra lỗi khi đổi mật khẩu. <a href=""member.php?ID=Thongtin">Trở lại</a>';
							}
					}
					else
					echo'Xảy ra lỗi khi đổi mật khẩu. <a href="admin.php">Trở lại</a>';
				}
			}
		
	}
     


}
}
else header('location:dangnhap.php');
  ?>
  
  </html>