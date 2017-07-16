<?php
require_once(dirname(__FILE__) . "/model/ds/UserInfo.php");
require_once(dirname(__FILE__) . "/model/bs/TaskInfo.php");
require_once(dirname(__FILE__) . "/model/ds/TaskInfo.php");
if (!isset ($_SESSION)) {
    ob_start();
    session_start();
}
error_reporting(0);
//
if (!isset($_SESSION['name'])) {
    echo "<script>alert('你还没有登录!!');location='index.php';</script>";
} else {
    $name       = $_SESSION['name'];
    $userObj    = new ds_UserInfoModel();
    $userRes    = $userObj->getData($name);
    $china_name = $userRes[0]['chinaname'];
    $face_url   = $userRes[0]['image'];
    $taskObj    = new ds_TaskInfoModel();
    $taskRes    = $taskObj->getData(false, false, $name);
    $taskCount  = count($taskRes);
}
//注销操作
if (isset($_GET["tj"]) && $_GET["tj"] == "destroy") {
    session_destroy();
    echo "<script>alert('注销成功');location='index.php';</script>";
}

//获取签到按钮的value值
function check_reg() {
    $name    = $_SESSION['name'];
    $notice1 = "签到";
    $notice2 = "已签到";
//		global $ghostname;
//		global $gpassname;
//		global $gpassword;
//		global $gdatabase;
//    $host_name = $ghostname;
//    $db_name = $gdatabase;
//    $user_name = $gpassname;
//    $user_pass =$gpassword;
//    $conn = mysqli_connect($host_name,$user_name,$user_pass,$db_name) or die("Could not connect!");
//    $find_num_sql = "SELECT student_num FROM user_info WHERE user_name = '$name'";
//    $result_num = mysqli_query($conn,$find_num_sql);
//    $rs_num = mysqli_fetch_array($result_num);
//    $stuNum1 = $rs_num['stuno'];
//    //获取当日时间
//    date_default_timezone_set("PRC");
//    $date = date('y-m-d',time());
//
//    $qd_query = "select * from stureg where student_num = '$stuNum1'";
//    $qd_result = mysqli_query($conn,$qd_query);
//
//    if($qd_result){//如果找到有关该学号的签到信息
//        $qd_rows_num = mysqli_num_rows($qd_result);
//        if($qd_rows_num){
//           while($rows = mysqli_fetch_array($qd_result)){
//                if($rows['regtime']== $date) //判断该签到信息中的日期是否有今天
//                    return $notice2;  //如果有，返回“已签到”
//           }
//           return $notice1;
//        }
//        else
//            return $notice1;
//    }
//    else
    return $notice1; //如果有，返回“签到”

}

//获取签到按钮背景颜色值
function reg_color() {
    $name    = $_SESSION['name'];
    $notice1 = "#33ccff";
    $notice2 = "#888888";
//		global $ghostname;
//		global $gpassname;
//		global $gpassword;
//		global $gdatabase;
//    $host_name = $ghostname;
//    $db_name = $gdatabase;
//    $user_name = $gpassname;
//    $user_pass =$gpassword;
//    $conn = mysqli_connect($host_name,$user_name,$user_pass,$db_name) or die("Could not connect!");
//    $find_num_sql = "SELECT student_num FROM user_info WHERE user_name = '$name'";
//    $result_num = mysqli_query($conn,$find_num_sql);
//    $rs_num = mysqli_fetch_array($result_num);
//    $stuNum1 = $rs_num['stuno'];
//    //获取当日时间
//    date_default_timezone_set("PRC");
//    $date = date('y-m-d',time());
//
//    $qd_query = "select regDate from stureg where student_num = '$stuNum1'";
//    $qd_result = mysqli_query($conn,$qd_query);
//
//    if($qd_result){//如果找到有关该学号的签到信息
//        $qd_rows_num = mysqli_num_rows($qd_result);
//        if($qd_rows_num){
//           while($rows = mysqli_fetch_array($qd_result)){
//                if($rows['regtime']== $date) //判断该签到信息中的日期是否有今天
//                    return $notice2;  //如果有，返回“已签到”
//           }
//           return $notice1;
//        }
//        else
//            return $notice1;
//    }
//    else
    return $notice1; //如果有，返回“签到”
}

//签到按钮是否可点击
function click_not() {
    $name    = $_SESSION['name'];
    $notice1 = "";
    $notice2 = "disabled";
//		global $ghostname;
//		global $gpassname;
//		global $gpassword;
//		global $gdatabase;
//    $host_name = $ghostname;
//    $db_name = $gdatabase;
//    $user_name = $gpassname;
//    $user_pass =$gpassword;
//    $conn = mysqli_connect($host_name,$user_name,$user_pass,$db_name) or die("Could not connect!");
//    $find_num_sql = "SELECT student_num FROM user_info WHERE user_name = '$name'";
//    $result_num = mysqli_query($conn,$find_num_sql);
//    $rs_num = mysqli_fetch_array($result_num);
//    $stuNum1 = $rs_num['stuno'];
//    //获取当日时间
//    date_default_timezone_set("PRC");
//    $date = date('y-m-d',time());
//
//    $qd_query = "select regDate from stureg where student_num = '$stuNum1'";
//    $qd_result = mysqli_query($conn,$qd_query);
//
//    if($qd_result){//如果找到有关该学号的签到信息
//        $qd_rows_num = mysqli_num_rows($qd_result);
//        if($qd_rows_num){
//           while($rows = mysqli_fetch_array($qd_result)){
//                if($rows['regtime']== $date) //判断该签到信息中的日期是否有今天
//                    return $notice2;  //如果有，返回“已签到”
//           }
//           return $notice1;
//        }
//        else
//            return $notice1;
//    }
//    else
    return $notice1; //如果有，返回“签到”
}

function check_week() {
    $name    = $_SESSION['name'];
    $notice1 = "本周周报已提交";
    $notice2 = "本周周报未提交";
//			global $ghostname;
//		global $gpassname;
//		global $gpassword;
//		global $gdatabase;
//    $host_name = $ghostname;
//    $db_name = $gdatabase;
//    $user_name = $gpassname;
//    $user_pass =$gpassword;
//    $conn = mysqli_connect($host_name,$user_name,$user_pass,$db_name) or die("Could not connect!");
//    $find_num_sql = "SELECT * FROM leavewords  WHERE username = '$name' order by id desc";
//    $result_num = mysqli_query($conn,$find_num_sql);
//    $rs_num = mysqli_fetch_array($result_num);
//    $stuNum1 = $rs_num['leave_time'];
//
//    //获取当日时间
//    $time1=strtotime($stuNum1);
//    $d2=ceil((time()-$time1)/60/60/24);
//
//    if($d2<7)
//        return $notice1;
//    else
    return $notice2;
}

function check_week_color() {
    $name    = $_SESSION['name'];
    $notice1 = "#888888";
    $notice2 = "#33ccff";
//			global $ghostname;
//		global $gpassname;
//		global $gpassword;
//		global $gdatabase;
//    $host_name = $ghostname;
//    $db_name = $gdatabase;
//    $user_name = $gpassname;
//    $user_pass =$gpassword;
//    $conn = mysqli_connect($host_name,$user_name,$user_pass,$db_name) or die("Could not connect!");
//    $find_num_sql = "SELECT * FROM leavewords  WHERE username = '$name' order by id desc";
//    $result_num = mysqli_query($conn,$find_num_sql);
//    $rs_num = mysqli_fetch_array($result_num);
//    $stuNum1 = $rs_num['leave_time'];
//
//    //获取当日时间
//    $time1=strtotime($stuNum1);
//    $d2=ceil((time()-$time1)/60/60/24);
//
//    if($d2<7)
//        return $notice1;
//    else
    return $notice2;
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        #container {
            margin: 0 auto;
        }

        #shangceng {
            z-index: 999;
            margin-left: 220px;
            margin-top: 0px;
            height: 100%;
        }
    </style>
    <script type="text/javascript" language="javascript">

        function iFrameHeight() {

            var ifm = document.getElementById("iframepage");

            var subWeb = document.frames ? document.frames["iframepage"].document : ifm.contentDocument;

            if (ifm != null && subWeb != null) {

                ifm.height = subWeb.body.scrollHeight;

                ifm.width = subWeb.body.scrollWidth;

            }

        }
        function changeit(url) {
            aa.src = url;
        }

        function iFrameHeight() {

            var ifm = document.getElementById("aa");

            var subWeb = document.frames ? document.frames["aa"].document : ifm.contentDocument;

            if (ifm != null && subWeb != null) {

                ifm.height = subWeb.body.scrollHeight;

                ifm.width = subWeb.body.scrollWidth + 100;

            }

        }

        function changeFrameHeight() {
            var ifm = document.getElementById("aa");
            ifm.height = document.documentElement.clientHeight;
        }
        window.onresize = function () {
            changeFrameHeight();
        }
    </script>
    <meta charset="UTF-8">
    <title>Lab Task System</title>
    <meta
        content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'
        name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!-- Ionicons -->
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <!-- Morris chart -->
    <link href="css/morris/morris.css" rel="stylesheet" type="text/css"/>
    <!-- jvectormap -->
    <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"
          type="text/css"/>
    <!-- fullCalendar -->
    <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet"
          type="text/css"/>
    <!-- Daterange picker -->
    <link href="css/daterangepicker/daterangepicker-bs3.css"
          rel="stylesheet" type="text/css"/>
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"
          rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-blue">
<header class="header">
    <a href="main.php" class="logo"> <!-- Add the class icon to your logo image or logo icon to add the margining -->
        Lab Task System
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas"
           role="button"> <span class="sr-only">Toggle navigation</span> <span
                class="icon-bar"></span> <span class="icon-bar"></span> <span
                class="icon-bar"></span>
        </a>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <input type="submit" value="<?php echo check_week(); ?>" id="in" name="in" class="btn_bu"
                           type="button"
                           style="margin-top:0.35cm; background:<?php echo check_week_color(); ?>;width:150px;height:26px; font-family:微软雅黑;color:white;border:none; border-radius:2px;cursor:default;">
                    &nbsp;&nbsp;&nbsp;
                <li class="dropdown messages-menu">
                    <form action="stuReg.php" method="get">
                        <input type="submit" value="<?php echo check_reg(); ?>" id="reg_in" name="reg_in" class="btn_bu"
                               type="button" <?php echo click_not(); ?>
                               style="margin-top:0.35cm; background:<?php echo reg_color(); ?>;width:80px;height:26px; font-family:微软雅黑;color:white;border:none; border-radius:2px; cursor:pointer;
                                   "></submit>
                    </form>
                    <?php
                    //对每月签到信息进行删除
                    if (strcmp($_SESSION['name'], "chenpan") == 0) {
                        include "deleteQiandaoInfo.html";
                    }
                    ?>
                    <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    </a>
                    <ul class="dropdown-menu">

                    </ul>
                </li>

                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu"><a href="#" class="dropdown-toggle"
                                                   data-toggle="dropdown"> <i class="fa fa-tasks"></i>
                        <span
                            class="label label-danger taskfresh"><?php echo $taskCount; ?></span>
                    </a>
                    <ul class="dropdown-menu">


                        <li class="header taskfresh">You have <?php echo $taskCount; ?> tasks</li>

                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu taskfresh">
                                <?php

                                if ($taskCount >= 4) {
                                    $newarr = array_slice($result, $taskCount - 4, 4);
                                } else {
                                    $newarr = $result;
                                }
                                if ($newarr) {

                                    foreach ($newarr as $key => $row) {

                                        ?>
                                        <li>
                                            <!-- Task item --> <a href="#">
                                                <h3>
                                                    <?php echo $row['title']; ?>
                                                    <small
                                                        class="pull-right"><?php echo $row['process']; ?> </small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua"
                                                         style="width: <?php echo $row['process']; ?> "
                                                         role="progressbar" aria-valuenow="50"
                                                         aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only"><?php echo $row['process']; ?>
                                                            Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->

                                    <?php }
                                } else { ?>

                                    <!-- Task item -->
                                    <li><h3>&nbsp;您暂时没有任何任务</h3></li>


                                <?php } ?>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#" onclick="changeit('seeTask.php')">查看所有任务</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu"><a href="#"
                                                       class="dropdown-toggle" data-toggle="dropdown"> <i
                            class="glyphicon glyphicon-user"></i> <span><?php echo $china_name; ?> <i
                                class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue"><img src="<?php echo $face_url; ?>"
                                                                   class="img-circle" alt="User Image"/>
                            <p>
                                <?php echo $china_name; ?>
                                <small>Member since Nov. 2017</small>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">

                            <div class="pull-right">
                                <a href="?tj=destroy" class="btn btn-default btn-flat">注销</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo $face_url; ?>" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>Hello, <?php echo $china_name; ?></p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                    <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i
                                        class="fa fa-search"></i></button>
                            </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li>
                    <a href="#" onclick="changeit('home.php')">
                        <i class="fa fa-dashboard"></i> <span>主页面</span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="changeit('seeTask.php')">
                        <i class="fa fa-th"></i> <span>任务总览</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>任务管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#" onclick="changeit('TaskDetail.php')"><i class="fa fa-angle-double-right"></i>查看任务</a>
                        </li>
                        <li><a href="#" onclick="changeit('addTask.php')"><i class="fa fa-angle-double-right"></i> 添加任务</a>
                        </li>

                        <li><a href="#" onclick="changeit('inquireTask1.php')"><i class="fa fa-angle-double-right"></i>
                                修改任务</a></li>

                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>周报管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#" onclick="changeit('write.php')"><i class="fa fa-angle-double-right"></i>
                                添加周报</a></li>
                        <li><a href="#" onclick="changeit('week.php')"><i class="fa fa-angle-double-right"></i> 查看周报</a>
                        </li>
                        <li><a href="#" onclick="changeit('inquireWeek.php')"><i class="fa fa-angle-double-right"></i>
                                修改周报</a></li>

                    </ul>
                </li>
                <li>
                    <a href="#" onclick="changeit('userinfo.php')">
                        <i class="fa fa-bar-chart-o"></i><span>修改信息</span>
                    </a>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Right side column. Contains the navbar and content of the page -->
    <div id="shangceng">
        <iframe id="aa" src="home.php" width="100%" height="100%" frameborder="0" onload="changeFrameHeight()"></iframe>
    </div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.0.2 -->
<script src="js/jquery.min.js"></script>
<!-- jQuery UI 1.10.3 -->
<script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="js/raphael-min.js"></script>
<script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="js/plugins/sparkline/jquery.sparkline.min.js"
        type="text/javascript"></script>
<!-- jvectormap -->
<script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"
        type="text/javascript"></script>
<script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"
        type="text/javascript"></script>
<!-- fullCalendar -->
<script src="js/plugins/fullcalendar/fullcalendar.min.js"
        type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="js/plugins/jqueryKnob/jquery.knob.js"
        type="text/javascript"></script>
<!-- daterangepicker -->
<script src="js/plugins/daterangepicker/daterangepicker.js"
        type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script
    src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"
    type="text/javascript"></script>
<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>

</body>
</html>
