<?php session_start();?>
<?php $page_title='book store';
include('templates/header.inc');
?>
    <body>
        <div id="all">
            <!-- phan top -->
                 
            <div id="top">
                <div id="top-left">
                    <ul>
                        <li><a href="#"><img src="images/google.png"></a></li>
                        <li><a href="#"><img src="images/facebook.png"></a></li>
                        <li><a href="#"><img src="images/zing.png"></a></li>
                        <li><a href="#"><img src="images/yahoo.png"></a></li>
                    </ul>
                </div>
                <div id="top-right">
                   
   <?php
if (isset($_SESSION['username'])){
echo 'Xin chào: <i style="color:#00F;"> '.$_SESSION['username']." &nbsp"; 
echo '  &nbsp<a href="logout.php">Đăng xuất</a>';
}
else{
echo  '<ul>
                        <li><img src="images/login.png"></li>
                        <li><a href="dangnhap.php">Đăng nhập</a></li>
                        <li><a href="dangky.php">Đăng kí</a></li>
                    </ul>';

}?>
                   
                </div>   
            </div> 
            
            <!-- phan header -->
               
            <div id="header">
                <div style="float: left;width: 250px;height: 54px;margin: 50px 0 0 10px;"><a href="index.php"><img src="images/logo.png" width="250" height="80" alt="logo"></a></div>
                <div style="float: right;width: 400px;height: 93px;">
                    <div id="shopcart">
                        <img src="images/shopcart.png">
                        <div id="info-cart">
                            <?php
	$ok=1;
	if(isset($_SESSION['cart']))
	{
		foreach($_SESSION['cart'] as $k=>$v)
		{
			if(isset($k))
			{
			$ok=2;
			}
		}
	}

	if ($ok != 2)
	 {
		echo '<p>0 sản phẩm</p>';
	} else {
		$items = $_SESSION['cart'];
		echo '<p><a href="cart.php">'.count($items).' sản phẩm</a></p>';
	}
?> 
                           
                        </div>
                    </div>
                </div>
                <div style="float: right;width: 400px;height: 60px;">
                  <div id="phone">
                       <div id="ship">
                     
                    </div> 
                    </div>
                      <div id="search-box">
                       <form action="timkiem.php" id="search-form" method="get">
                            <input  type="text" name ="search" placeholder="search for here..." id="textsearch"/>
                            <button type="submit" name ="ok" value ="search" id="search-button"></button>
                        </form>
                    </div>
                   
                    
                </div>
            </div>
            </div>
            <!-- phan menu -->
            <?php include('templates/menu_left.php');?>
         
            <!-- phan main -->
            <div id="main">
           		 <!-- phan main_left-->
                <div id="main-left" >
             
            <form action="help.php" method="post">
            <p>Nếu bạn có thắc mắc hãy gửi ý kiến cho chúng tôi</p>
            <input style="height:150px; width:600px;" type="text" name="help" placeholder="Xin vui lòng gửi ý kiến đóng góp cho chúng tôi!"/><br >
            <button type="submit" name="gui" value="send" >Send</button>
             </form>
               <?php
			                            
    if(isset($_POST['gui'])){
		  include('ketnoi.php');
     
	if(isset($_POST['help'])){
          $help   = addslashes($_POST['help']);
		$date=date("Y-m-d h:m:s");
		$id_member= $_SESSION['id_member'];
     @$add = mysql_query("
           
               
              UPDATE member

 SET idea = '{$help}', date_send='{$date}'

where id_member=$id_member
           
        ");
		
		 }}
			    ?>
                </div>
            
             <!-- phan footer-->
           <?php include('templates/footer.inc');?>