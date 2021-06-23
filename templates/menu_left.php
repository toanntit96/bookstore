  <div id="menu">
                <ul>
                	<a href="index.php">
                    <img src="images/home.png">
                    </a>
                    <li style="color:#FFF"><a href="index.php">DANH MỤC SÁCH</a></li>
                   <?php 
				   	if(isset($_SESSION['username']))
					{
						$sql = "SELECT * FROM member WHERE username = '".$_SESSION['username']."'";
						$query = mysql_query($sql) or die(mysql_error());
						
						while($arr = mysql_fetch_array($query))
						{
							if($arr['level'] == 2 )
							{
								echo'<li style="border-left: 1px dotted #999999;"><a href="member.php?ID=Thongtin">TRANG CÁ NHÂN</a></li>';
						   }
						}
					}
				   ?>
                   
                </ul>
</div>           
<!-- phan slider -->
  <div id="abs">
    <div id="menu-left">
      <ul>
                           
          <li> <a  href="sachbanchay.php">Sách Bán Chạy </a></li>
          <li> <a href="sachngoaivan.php">Sách Ngoại Ngữ</a>  </li>
          <li>   <a href="sachkinhte.php">Sách Kinh Tế</a> </li>
          <li>   <a href="sachvhtn.php">Sách Văn Học Trong Nước</a> </li>
          <li>   <a href="sachvhnn.php">Sách Văn Học Nước Ngoài</a> </li>
          <li>   <a href="sachthieunhi.php">Sách Thiếu Nhi</a></li>
          <li>   <a href="sachtinhoc.php">Sách Tin Học - Ngoại Ngữ</a> </li>
          <li>   <a href="sachchuyennganh.php">Sách Chuyên Ngành</a>
          <li>   <a href="sachgiaokhoa.php">Sách Giáo Khoa - Giáo Trình</a></li>
          <li>   <a href="tapchi.php">Tạp Chí</a></li>
      </ul>
  </div>
  <div id="slider">
    <ul>
      <li><a href="#"> <img src="images/slide1.jpg"  /></a></li>
      <li><a href="#"><img src="images/slide2.jpg" /></a> </li>
      <li><a href="#"> <img src="images/slide3.jpg" /></a> </li>
      <li><a href="#"> <img src="images/slide4.jpg" /></a> </li>
    </ul>
  </div>
  </div>
 
        
    