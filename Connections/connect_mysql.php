<?
	$host="localhost";
	$user="root";
	$pw="30323";

	$dbname="salereport_db";

	$c=mysql_connect($host,$user,$pw); //เชื่อมตอ
	mysql_select_db($dbname,$c); //เลือกติดต่อกับฐานข้อมูลที่กำหนด
	mysql_query("set names tis620"); //เชื่อมต่อไปเป็นภาษาไทย
	//mysql_query("SET NAMES UTF8");
	/*
	mysql_query("SET character_set_results=utf8");
	mysql_query("SET character_set_client=utf8");
	mysql_query("SET character_set_connection=utf8");
	*/
 	if(!$c){
		echo"<h3>Can't connect database!</h3>";
		exit();
	}
 ?>
