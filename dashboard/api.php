<?php
    @ob_start();
    session_start();

    if(isset($_SESSION['uid'])&&isset($_SESSION['login'])){

        if ($_SESSION['login']==0 or $_SESSION['uid']==null){
                    echo $uid."您好，您輸入的密碼或帳號錯誤!";
                    exit;
        	}

          //echo "<meta charset=\"utf-8\"> <br>";
          $semester = explode(":",$_SESSION['semester']);
          $semester = explode("]",$semester[1]);
          $semester = trim($semester[0]);
          $financeArr->semester = $semester ;
          $financeArr->name = $_SESSION['name'];
          $financeArr->uid = $_SESSION['uid'];

          $financeJSON= json_encode($financeArr);


          echo $financeJSON;

        }else{

        	//echo "非法登入";
        	exit;

        }

?>
