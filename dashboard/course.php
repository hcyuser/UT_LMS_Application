<?php
    @ob_start();
    session_start();
    
    if(isset($_SESSION['uid'])&&isset($_SESSION['login'])){
        	
        if ($_SESSION['login']==0 or $_SESSION['uid']==null){
                    echo $uid."您好，您輸入的密碼或帳號錯誤!";
                    exit;
        	}
        	include('../mysql_connect.inc.php');
        }else{
        	
        	echo "非法登入";
        	exit;
        	
        }
?>
<!DOCTYPE html>
<html lang="zh-tw">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="youtubeTest.js"></script>       
    <script src="https://apis.google.com/js/client.js?onload=onClientLoad" ></script>
    
    <title>校園個人化系統</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">校園個人化系統</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>信箱名稱～</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> 昨天 下午 4:32 </p>
                                        <p>作業缺繳通知[Android應用程式專案開發與社群...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>信箱名稱～</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> 前天 上午 11:32</p>
                                        <p>新增獎學金項目...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>信箱名稱～</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> 前天 上午 11:32</p>
                                        <p>新增獎學金項目...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">個人行事曆 </a>
                        </li>
                        <li>
                            <a href="#">我的課表 </a>
                        </li>
                        <li>
                            <a href="#">歷年課程檔案 </a>
                        </li>
                        <li>
                            <a href="#">學習紀錄 </a>
                        </li>
                        
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                    <?php
                        echo $name;
                    ?>
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="setup.php"><i class="fa fa-fw fa-user"></i> 個人檔案</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> 信箱</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> 設定</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> 登出</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <!--<i class="fa fa-fw fa-dashboard"></i>-->
                        <a href="index.php"><i class="fa fa-fw fa-desktop"></i> 首頁</a>
                    </li>
                    <li class="active">
                    	<a href="course.php"><i class="fa fa-fw fa-edit"></i> 課程 </a>
                    </li>
                    <li>
                    	<a href="setup.php"><i class="fa fa-fw fa-wrench"></i> 個人資料 </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">


                <div class="page-header">
                    <h1>課程</h1>
                    
                </div>
                    <div class="col-lg-12 col-sm-4">
                                
                                    
                                <?php    
                                $delayTime=2000;
                            /*
                                echo '<form action="#" id="js-search-form" class="form-style" onload="getDataFromSearch(searchTerm, showApiData)">
                                            </form>
                                        <div id="js-search-results" class="search-results">                                    
                                        </div>';
                            
                            */
                            foreach($course as $key=>$v){
                                $delayTime+=500*$key;
                                
                                if(($key % 4) == 1){
                                    echo '<div class="panel panel-danger">
                                        <div class="panel-heading">
                                        <h3 class="panel-title">' .$v. '</h3>
                                    </div>';
                                       // Panel content
                                    //</div></div>';
                                }
                                else if(($key % 4) == 2){
                                    echo '<div class="panel panel-warning">
                                        <div class="panel-heading">
                                        <h3 class="panel-title">' .$v. '</h3>
                                    </div>';
                                        //Panel content
                                   // </div></div>';
                                }
                                else if(($key % 4) == 3){
                                    echo '<div class="panel panel-success">
                                        <div class="panel-heading">
                                        <h3 class="panel-title">' .$v. '</h3>
                                    </div>';
                                       // Panel content
                                    //</div></div>';
                                }
                                else if(($key % 4) == 0){
                                
                                    echo '<div class="panel panel-info">
                                        <div class="panel-heading">
                                        <h3 class="panel-title">' .$v. '</h3>
                                    </div>';
                                }
                                
                                /*
                                echo '<div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">' .$v. '</h3>
                                        </div>';
                                */
                                echo '                                        <div class="panel-body" id="output'.$key.'">';
                                echo '
                                <script type="text/javascript">
                                setTimeout(function(){
                                    searchFirst("'.$v.'",'.$key.');
                                },'.$delayTime.');
                                </script></div>
                                </div>';
                                
                                        /*
                                        ?>
                                
                                <script type="text/javascript">searchFirst('<?php echo  $v; ?>');</script>
                                <script src="https://apis.google.com/js/client.js?onload=onClientLoad" type="text/javascript"></script>
                                <pre id="result"></pre>
                                </div>
                                </div>
                           <?php
                           */
                           
                           /*
                             ?>
                                
                                    <script type="text/javascript">getDataFromSearch('<?php echo  $course[1]; ?>' , showApiData);
                                 
                                    </script>
                                <?php    
                            
                                echo '<form action="#" id="js-search-form" class="form-style" onload="getDataFromSearch(searchTerm, showApiData)">
                                            </form>
                                        <div id="js-search-results" class="search-results">                                    
                                        </div> </div></div>';
                            
                        
                                           
                        */
                        
                            }
                                ?>
                    </div>
                    

                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    

</body>

</html>