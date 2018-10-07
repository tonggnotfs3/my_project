<?php

include("connect.php");


$news_id = $_GET['news_id'];

		$sql = "UPDATE `news` SET `news_delstatus` = '0'  WHERE `news`.`news_id` = '$news_id'";
		$data = mysqli_query($conn,$sql);


?>
<meta http-equiv="refresh" content = "0;
  url = ../display_news.php">