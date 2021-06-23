 							
                        <div class="titlebook">
							<span> Top 10 sách bán chạy</span>
						</div>
						<br>
                        <div id="banchay">
                            <ul>
								<?php
						   		$connect=mysql_connect("localhost","root","")
								or die("Can not connect database");
								mysql_select_db("bookstore",$connect);
								mysql_query("SET NAMES 'utf8'");
								$sql = "SELECT * FROM product 
								ORDER BY product.soluongnguoimua DESC LIMIT 0 , 10";
								mysql_query("SET NAMES uft8");
								$query = mysql_query($sql);
								if(!( $query = mysql_query($sql))){
								
									echo 'Không có cơ sở dữ liệu';
									exit;
								}
								else{								
									while ($row = mysql_fetch_array($query)){	
									 
								?>
									<a class="tentop" href="details.php?id=<?php echo $row['id_product']?>">
                                    <li>
                                  		<img src="./images/books/<?php echo $row['image'] ?>" style="height:115px; width:105px"/>
                                        <?php echo $row['name'] ?>
                                	</li>
                               		</a>	
								<?php	
									}
								}
                           ?>
                               
                            </ul>
						</div>
             
       