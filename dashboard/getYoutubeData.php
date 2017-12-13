<?php
@ob_start();
    session_start();
    
    include('../mysql_connect.inc.php');    
    echo '<script src="youtubeTest.js"></script>';
    echo '<script src="https://apis.google.com/js/client.js?onload=onClientLoad" ></script>';
    echo '<pre id="result"></pre>';
    //echo '<div id="output" class="out"> 
    //</div>';
    $result=array();
    $i=0;
    foreach($course as $key=>$v){
        echo '<div id="output'.$key.'" class="out"> 
    </div>'.$key.".".$v."<br>";
        $result[$key] = '<script type="text/javascript">
                                setTimeout(function(){
                                    searchFirst("'.$v.'",'.$i.');
                                },1000);
                                </script>';
        echo $result[$key];
        $i++;
    }
    //$file = fopen("../profiledata/video.html","w"); //開啟檔案
    //fwrite($file,$result[$key]);
    //fclose($file);
    
   
?>