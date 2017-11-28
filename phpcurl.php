<?php
session_start();
 if (isset($_POST["uid"]) && isset($_POST["pwd"])){
        $uid = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $uid = strtolower($uid);
        
  }
  else{
            $uid = null;
            $pwd = null;
            echo "no username supplied";
    }
   

$ckfile = "./cookie_file";
//利用CURLOPT_COOKIEJAR參數存放cookie
$ch = curl_init ("http://lms.utaipei.edu.tw/sys/lib/ajax/login_submit.php?account=\"$uid\"&password=$pwd");
curl_setopt($ch, CURLOPT_COOKIEJAR, $ckfile);
$output = curl_exec ($ch);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_COOKIEFILE, "./cookie_file");
curl_setopt($ch, CURLOPT_URL,"http://lms.utaipei.edu.tw/home.php");

curl_setopt($ch, CURLOPT_COOKIEFILE, $ckfile);
$output = curl_exec ($ch);



$file = fopen("$uid.html","w"); //開啟檔案
fwrite($file,$output);
fclose($file);

if(file_exists ("$uid.html")){
    $_SESSION['uid'] = $uid;
    $_SESSION['login'] = 1;
    echo "Success";
    echo "<script type='text/javascript'>";
    echo "window.location.href='./parse.php'";
    echo "</script>"; 
    
}else{
    echo "Error";
     $_SESSION['name'] = null;
    $_SESSION['login'] = 0;
    
}


?>