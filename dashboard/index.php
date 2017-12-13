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

    <title>校園個人化系統</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

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
                    <a href="email.html"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <!--
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
                    -->
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
                            <a href="email.html"><i class="fa fa-fw fa-envelope"></i> 信箱</a>
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
                    <li class="active">
                    	<!--<i class="fa fa-fw fa-dashboard"></i>-->
                        <a href="index.php"><i class="fa fa-fw fa-desktop"></i> 首頁</a>
                    </li>
                    <li>
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

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            首頁 <small>
                                <?php
                                    echo $uid;
                                    echo $name;
                                ?>
                            </small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                       <!-- <div class="alert alert-info alert-dismissable">-->
                            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
                            <!--<i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!-->
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                        <?php
                                            echo $discuss_number;
                                        ?>
                                        </div>
                                        <div>討論區</div>
                                    </div>
                                </div>
                            
                            <div class="panel panel-default">
                                <div class="list-group">
                                    <?php
                                        foreach($discuss as $key=>$v){
                                            echo '<a href="#" class="list-group-item">
                                                <span class="badge">'.$discuss_time[$key].'</span>'
                                                .$v.
                                                '<br>'.$discuss_course[$key].
                                            '</a>';
                                        }
                                    ?>
                                </div>
                            </div>
                                
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Read more...</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                        <?php
                                            echo $event_number;
                                        ?>
                                        </div>
                                        <div>作業 / 測驗</div>
                                    </div>
                                </div>
                               <div class="panel panel-default">
                                <div class="list-group">
                                    <?php
                                        foreach($event as $key=>$v){
                                            echo '<a href="#" class="list-group-item">
                                                <span class="badge">'.$event_time[$key].'</span>'
                                                .$v.
                                                '<br>'.$event_course[$key].
                                            '</a>';
                                        }
                                    ?>
                                </div>
                            </div> 
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Read more...</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                        <?php
                                            echo $bulletin_number;
                                        ?>
                                        </div>
                                        <div>最新公告</div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                <div class="list-group">
                                    <?php
                                        foreach($bulletin as $key=>$v){
                                            echo '<a href="#" class="list-group-item">
                                                <span class="badge">'.$bulletin_time[$key].'</span>'
                                                .$v.
                                                '<br>'.$bulletin_course[$key].
                                            '</a>';
                                        }
                                    ?>
                                </div>
                            </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Read more...</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                

                <!-- /.row -->
<!--pie chart
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Donut Chart</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-donut-chart"></div>
                                <div class="text-right">
                                    <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
  -->                  
                    
                   

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

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>


