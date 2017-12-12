<?php
$link = mysql_connect("localhost","hcy_utlms","utaipei8362");//連結伺服器
mysql_select_db("hcy_utlms",$link);//選擇資料庫
mysql_query('set names utf8');//以utf8讀取資料，讓資料可以讀取中文

$uid = $_SESSION['uid'];//設定uid
//$uid='u10416020';
$sql = "SELECT * FROM utlms where uid='$uid'";
$result = mysql_query($sql);

echo "<meta charset='utf-8'>";


//Get databas all contents
$row_result= mysql_fetch_assoc($result);

$semester = $row_result["semester"];
$profile = $row_result["profile"];
$course=$row_result["course"];

$discuss_course =$row_result["discuss_course"];
$discuss_time=$row_result["discuss_time"];

$event_course = $row_result["event_course"];
$event_time=$row_result["event_time"];

$bulletin_course = $row_result["bulletin_course"];
$bulletin_time=$row_result["bulletin_time"];

$bulletin=$row_result["bulletin"];
$event=$row_result["event"];
$discuss=$row_result["discuss"];


$course = explode("***",$course);
$discuss_course = explode("***",$discuss_course);
$discuss_time = explode("***",$discuss_time);
$event_course = explode("***",$event_course);
$event_time = explode("***",$event_time);
//$document_course = explode("***",$document_course);
$bulletin_course = explode("***",$bulletin_course);
$bulletin_time = explode("***",$bulletin_time);
$bulletin = explode("***",$bulletin);
//$document = explode("***",$document);
$event = explode("***",$event);
$discuss = explode("***",$discuss);

$discuss_number=count($discuss_course);
$event_number=count($event_course);
$bulletin_number=count($bulletin);


//profile reference
$name;
$last_login;
$login_time;
$capacity;


$profile = explode("  ",$profile);

$select=explode(" ",$profile[2]);

$name=$select[0];
$select=explode(" ",$profile[3]);

$last_login=$select[0]." ".$select[1];
$login_time=$profile[4];

$select=explode("</br>",$profile[6]);
$capacity=$select[0];

?>
