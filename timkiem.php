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
                    
                   
                    
                </div>
            </div>
            </div>
            <!-- phan menu -->
            <?php include('templates/menu_left.php');?>
         
            <!-- phan main -->
            <div id="main">
           		 <!-- phan main_left-->
               
                  <!--phan main_right-->
                 <div id="main-left" style="width:1000px;">
                
             <div id="products">
                        
                                 <?php
									
        if (isset($_REQUEST['ok'])) {
 
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['search']);
            // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
            $query = "select * from product where name like '%$search%'";
 
            // Kết nối sql
            mysql_connect("localhost", "root", "");
            // Chọn database
            mysql_select_db("demo");
 
            // Thực thi câu truy vấn
            $sql = mysql_query($query);
            // Đếm số đong trả về trong sql.
            $num = mysql_num_rows($sql);

            // Nếu $search rỗng thì báo lỗi tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } else {
                // Ngược lại nếu người dùng nhập liệu thì tiến hành xứ lý show dữ liệu.
                // Nếu $num > 0 hoặc $search khác rỗng tức là có dữ liệu mối show ra nhé, ngược lại thì báo lỗi.
                if ($num > 0 && $search != "") {
 
                    // Dùng $num để đếm số dòng trả về.
                    echo "<p  style='font-size:25px;><font color='	#000080'';>$num</font> ket qua tra ve voi tu khoa <font color='red'>$search</font><br><br></p>";
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                    while ($row = mysql_fetch_assoc($sql)) {
                        $name = $row['name'];
                        $price = $row['gia'];
                        $id = $row['id_product'];
                     
						$image="images/books/".$row['image']; 
						
					
						echo"<ul>"; 
 						  echo"<li >";
                               echo' <div class="content">';
                        echo "<img src='$image'width= 170 height=250>"; 
						echo"<font color='red'>";	echo"<br>"; 
						echo "$name:";
		echo number_format($row[gia],3)." VND";
		echo"</font>";echo"</br>";echo "<a href='addcart.php?item=$row[id]'>add to cart</a>";echo"</div>";
                            echo"</li>";
                        echo"</ul>";
                    }
                } else {
                    echo "Khong tim thay ket qua!";
                }
            }
        }
        ?>  
                    </div>
                </div>
            
             <!-- phan footer-->
           <?php include('templates/footer.inc');?>