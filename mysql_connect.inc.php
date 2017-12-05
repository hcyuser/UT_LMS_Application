<?php
$link = mysql_connect("localhost","hcy_utlms","utaipei8362");//連結伺服器
mysql_select_db("hcy_utlms",$link);//選擇資料庫
mysql_query('set names utf8');//以utf8讀取資料，讓資料可以讀取中文

$uid = 'u10416020';//設定uid

$sql = "SELECT * FROM utlms where uid='$uid'";
$result = mysql_query($sql);

echo "<meta charset='utf-8'>";


/*
$course = explode("***",$course);
$discuss_course = implode("***",$discuss_course);
$event_course = implode("***",$event_course);
$document_course = implode("***",$document_course);
$bulletin_course = implode("***",$bulletin_course);
$bulletin = implode("***",$bulletin);
$document = implode("***",$document);
$event = implode("***",$event);
$discuss = implode("***",$discuss);
*/

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



echo $semester."<br>";
echo $profile."<br>";
echo $course."<br>";

echo $bulletin."<br>";
echo $event."<br>";

echo "Discuss".$discuss_course."Discuss time: ".$discuss_time."<br>";
echo "Bulletin".$bulletin_course."Bulletin time: ".$bulletin_time."<br>";
echo "Event".$event_course."Event time: ".$event_time."<br>";

$course = explode("***",$course);
$discuss_course = explode("***",$discuss_course);
$discuss_time = explode("***",$discuss_time);
$event_course = explode("***",$event_course);
$event_time = explode("***",$event_time);
$document_course = explode("***",$document_course);
$bulletin_course = explode("***",$bulletin_course);
$bulletin_time = explode("***",$bulletin_time);
$bulletin = explode("***",$bulletin);
$document = explode("***",$document);
$event = explode("***",$event);
$discuss = explode("***",$discuss);

echo '<br>'."All Course:";
foreach($course as $v) {
    echo '<br>'.$v;   
}

echo '<br>'."All discuss Course:";
foreach($discuss_course as $v) {
    echo '<br>'.$v;   
}
echo '<br>'."All discuss time:";
foreach($discuss_time as $v) {
    echo '<br>'.$v;   
}
echo '<br>'."All event course:";
foreach($event_course as $v) {
    echo '<br>'.$v;   
}
?>
