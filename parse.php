<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ParseLMS</title>
    </head>
    <body>
        
    </body>
</html>

<?php

if(isset($_SESSION['uid'])&&isset($_SESSION['login'])){
	
	if ($_SESSION['login']==0 or $_SESSION['uid']==null){
            echo $uid."您好，您輸入的密碼或帳號錯誤!";
            exit;
	}
	
}else{
	
	echo "非法登入";
	exit;
	
}

include('simple_html_dom.php');
$uid = $_SESSION['uid'];
$htmlcon = "http://hcy.idv.tw/utlms/profiledata/$uid.html";
$html = file_get_html($htmlcon);
//Get semester
$semesterResult=$html->find("div.hint");
$semester=$semesterResult[0]->plaintext;



//Get online person number
$onlineResult=$html->find('span#counter');
$online=$onlineResult[0]->plaintext;
echo '<br>ONLINE NUMBER:'.$online;

//Get course name
$courseResult=$html->find(".mnuItem");//get course => div class="mnuItem"
$getResult='';
$arrayNumber=0;
$course;
foreach($courseResult as $v) {
    $getResult.=$v->innertext;    
    $arrayNumber++;
}

$patten='/<a[^>]*href=*[^>]*>(.*?)<\/a>/';
preg_match_all($patten,$getResult,$out);//select course name => <a..href=...> course name </a>

for($i=0;$i<$arrayNumber-1;$i++){
    $course[$i]=$out[1][$i];
    echo '<br>'.$out[1][$i];
}

//Get profile
$profileResult=$html->find("div#profile");
$profile="";
echo '<br>PROFILE';
foreach($profileResult as $v) {
    $profile .= $v->plaintext;
    //echo '<br>'.$v->plaintext;        
}
echo $profile;

//Get all discuss, event, document, bulletin
$allDataResult=$html->find("div.BlockItem");
$allData='';
foreach($allDataResult as $v) {
    $allData.=$v->innertext;
    echo '<br>'.$v->innertext;        
}
$allDataHtml=str_get_html($allData);

//Get all course
$b_course=$allDataHtml->find("div.hidden");
$all_course;
$course_count=0;
$course_key=0;
echo '<br><br>All course';
foreach($b_course as $v) {    
    if(($course_key%2)==1){        
        $all_course[$course_count]=$v->plaintext;
        echo '<br>'.$v->plaintext; 
        $course_count++;
    }          
    $course_key++;
}

//Get all time
$time=$allDataHtml->find("span.hint");
echo "<br>========================<br>";
$all_time;
$i=0;
foreach($time as $v) { 
    $all_time[$i]=$v->plaintext;
    echo '<br>'.$v->plaintext; 
    $i++;
}

$discuss_time;
$event_time;
$bulletin_time;


//Get bulletin
$bulletinResult=$allDataHtml->find("span.Eannounce");
$bulletin;
$bulletin_key=0;
echo '<br><br>BULLETIN';
foreach($bulletinResult as $v) {
    $bulletin[$bulletin_key]=$v->plaintext;
    echo '<br>'.$v->plaintext;   
    $bulletin_key++;
}


//Get document
$documentResult=$allDataHtml->find("span.Econtent");
$document;
$document_key=0;
echo '<br><br>DOCUMENT';
foreach($documentResult as $v) {
    $document[$document_key]=$v->plaintext;
    echo '<br>'.$v->plaintext;   
    $document_key++;
}


//Get event
$eventResult=$allDataHtml->find("span.Ehomework ");
$event;
$event_key=0;
echo '<br><br>EVENT';
foreach($eventResult as $v) {
    $event[$event_key]=$v->plaintext;
    echo '<br>'.$v->plaintext;   
    $event_key++;    
}
$eventResult2=$allDataHtml->find("span.Equiz ");
foreach($eventResult2 as $v) {
    $event[$event_key]=$v->plaintext;
    echo '<br>'.$v->plaintext;   
    $event_key++;    
}

//Get discuss and discuss course
$discussResult=$allDataHtml->find("span.hidden");
$discuss;
$length=count($discussResult);
$discuss_course;
$discuss_key=$length-$event_key-$bulletin_key-$document_key;

echo '<br> all key number: length:'.$length." event key:".$event_key. " bulletin key:" .$bulletin_key." document key: ".$document_key. " discuss key: ".$discuss_key;

echo '<br>DISCUSS<br>';
for($i=0;$i<$discuss_key;$i++){
   $discuss[$i]=$discussResult[$i]->plaintext;
   echo '<br>'.$discuss[$i];
   $discuss_course[$i]=$all_course[$i];
   $discuss_time[$i] = $all_time[$i];
}

//Get event course, document course, bulletin course
$event_course;
$document_course;
$bulletin_course;
for($i=0;$i<$event_key;$i++){   
   $event_course[$i]=$all_course[$i+$discuss_key];
   $event_time[$i]=$all_time[$i+$discuss_key];
   echo '<br>'.$event_course[$i];
   echo '<br>'.$event_time[$i];
}

for($i=0;$i<$document_key;$i++){      
   $document_course[$i]=$all_course[$i+$discuss_key+$event_key];   
   echo '<br>'.$document_course[$i];
}

for($i=0;$i<$bulletin_key;$i++){    
   $bulletin_course[$i]=$all_course[$i+$discuss_key+$event_key+$document_key];
   $bulletin_time[$i]=$all_time[$i+$discuss_key+$event_key+$document_key];
   echo '<br>'.$bulletin_course[$i];
}


$course = implode("***",$course);
$discuss_course = implode("***",$discuss_course);
$discuss_time = implode("***",$discuss_time);
$event_course = implode("***",$event_course);
$event_time = implode("***",$event_time);
$document_course = implode("***",$document_course);
$bulletin_course = implode("***",$bulletin_course);
$bulletin_time = implode("***",$bulletin_time);
$bulletin = implode("***",$bulletin);
$document = implode("***",$document);
$event = implode("***",$event);
$discuss = implode("***",$discuss);
$conn = new mysqli("localhost","hcy_utlms","utaipei8362","hcy_utlms");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
mysqli_set_charset($conn,"utf8");

$sqlfirst="DELETE FROM utlms WHERE uid='$uid'";

if ($conn->query($sqlfirst) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$sql = "INSERT INTO utlms (semester, course, profile, discuss_course, discuss_time, event_course, event_time, document_course, bulletin_course, bulletin_time, bulletin,document, event, discuss, uid) VALUES ('$semester','$course','$profile','$discuss_course', '$discuss_time','$event_course', '$event_time', '$document_course', '$bulletin_course', '$bulletin_time', '$bulletin', '$document', '$event', '$discuss', '$uid')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

//echo "<script type='text/javascript'>";
//echo "window.location.href='../'";
//echo "</script>"; 
    
?>

