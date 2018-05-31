<?php
require_once (dirname(__FILE__).'/../model/bs/TaskInfo.php');
require_once (dirname(__FILE__).'/../model/ds/UserInfo.php');

if(!isset($_SESSION)){
	ob_start();
	session_start();
}

if (! isset($_SESSION['name'])) {
    echo "<script>alert('请登录!!');location='index.php';</script>";
	exit("未登录");
}

	$name = $_SESSION['name'];
	date_default_timezone_set("PRC");
	$nowtime = time();
	$rq = date("Y-m-d",$nowtime);


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" ; charset="utf-8" />
<meta name="generator" content="FFKJ.Net" />
<link rev="MADE" href="mailto:FFKJ@FFKJ.Net">
<title>在线--后台</title>
<link rel="stylesheet" type="text/css" href="../Skins/Admin_Style.Css" />
<script language="JavaScript" src="js/mydate.js"></script>
</head>
<style type="text/css">
.basic-grey {
	margin-left: auto;
	margin-right: auto;
	max-width: 500px;
	background: #F7F7F7;
	padding: 25px 15px 25px 10px;
	font: 12px Georgia, "Times New Roman", Times, serif;
	color: #888;
	text-shadow: 1px 1px 1px #FFF;
	border: 1px solid #E4E4E4;
}

.basic-grey h1 {
	font-size: 25px;
	padding: 0px 0px 10px 40px;
	display: block;
	border-bottom: 1px solid #E4E4E4;
	margin: -10px -15px 30px -10px;;
	color: #888;
}

.basic-grey h1>span {
	display: block;
	font-size: 11px;
}

.basic-grey label {
	display: block;
	margin: 0px;
}

.basic-grey label>span {
	float: left;
	width: 20%;
	text-align: right;
	padding-right: 10px;
	margin-top: 10px;
	color: #888;
}

.basic-grey input[type="text"], .basic-grey input[type="email"],
	.basic-grey textarea, .basic-grey select {
	border: 1px solid #DADADA;
	color: #888;
	height: 30px;
	margin-bottom: 16px;
	margin-right: 6px;
	margin-top: 2px;
	outline: 0 none;
	padding: 3px 3px 3px 5px;
	width: 70%;
	font-size: 12px;
	line-height: 15px;
	box-shadow: inset 0px 1px 4px #ECECEC;
	-moz-box-shadow: inset 0px 1px 4px #ECECEC;
	-webkit-box-shadow: inset 0px 1px 4px #ECECEC;
}

.basic-grey textarea {
	padding: 5px 3px 3px 5px;
}

.basic-grey select {
	background: #FFF url('down-arrow.png') no-repeat right;
	background: #FFF url('down-arrow.png') no-repeat right);
	appearance: none;
	-webkit-appearance: none;
	-moz-appearance: none;
	text-indent: 0.01px;
	text-overflow: '';
	width: 70%;
	height: 35px;
	line-height: 25px;
}

.basic-grey textarea {
	height: 100px;
}

.basic-grey .button {
	background: #E27575;
	border: none;
	padding: 10px 25px 10px 25px;
	color: #FFF;
	box-shadow: 1px 1px 5px #B6B6B6;
	border-radius: 3px;
	text-shadow: 1px 1px 1px #9E3F3F;
	cursor: pointer;
}

.basic-grey .reset {
	background: #ccd2de;
	border: none;
	padding: 10px 25px 10px 25px;
	color: #FFF;
	box-shadow: 1px 1px 5px #B6B6B6;
	border-radius: 3px;
	text-shadow: 1px 1px 1px #9E3F3F;
	cursor: pointer;
}

.basic-grey .button:hover {
	background: #CF7A7A
}


body{margin:0;padding:0;font-size:12px;}
ul.lanren{width:300px;}
.scale_panel{color:#999;width:240px;position:absolute;line-height:18px;left:40px;top:-0px;}
.scale_panel .r{float:right;}
.scale span{background:url(img/scroll.gif) no-repeat;width:8px;height:16px;position:absolute;left:-2px;top:-5px;cursor:pointer;}
.scale{ background-repeat: repeat-x; background-position: 0 100%; background-color: #E4E4E4; border-left: 1px #83BBD9 solid;  width: 240px; height: 3px; position: relative; font-size: 0px; border-radius: 3px; }
.scale div{ background-repeat: repeat-x; background-color: #3BE3FF; width: 0px; position: absolute; height: 3px; width: 0; left: 0; bottom: 0; }
.lanren li{font-size:12px;line-height:50px;position:relative;height:50px;list-style:none;}

</style>
<div id="full_form">
<form action="" method="post" class="basic-grey">
	<h1>
		添加任务</h1>
	
	<label> <span>标题 :</span> <input id="title" type="text" name="title"
		placeholder="标题大小不超过50字" />
	</label> <label> <span>起始时间 :</span> 
	<input type="text" name="starttime" onfocus="MyCalendar.SetDate(this)" value="<?php echo $rq;?>">
	</label> <label> <span>截止时间 :</span> 
	<input type="text" name="endtime" onfocus="MyCalendar.SetDate(this)" value="<?php echo $rq;?>">
	</label> <label> <span>内容 :</span> <textarea id="message"
			name="content" placeholder="任务内容"></textarea>
	<ul class="lanren">
	<li style="left:40px;">进度:&nbsp;&nbsp;<input type="text" value="0%" id="process" name="process" readonly style="border:0px;"/></li>
	<li>
		<div class="scale_panel">
			<span class="r">100</span>0
			<div class="scale" id="bar">
				<div></div>
				<span id="btn"></span>
			</div>
	       </div>
	</li>
	
    </ul>	
    <!--  
	</label> <label> <span>进度 :</span><select name="process">
			<option value="0">0</option>
	-->		

	</select>
	</label> <label> <span>&nbsp;</span> <input type="submit" name="submit"
		class="button" value="添加" /><input type="reset" class="reset"
		id="button" value="重置" />
	</label>
</form>
</div>


<?php
if (isset($_POST["submit"]) && $_POST["submit"]) {
    
    $title = $_POST['title'];
    $startTime = $_POST['starttime'];
    $eTime = $_POST['endtime'];
    $content = $_POST['content'];
    $process = $_POST['process'];
    
    if (empty($title)) {
		echo "<script>alert('标题不能为空');location='?tj=register';</script>";
	}
	else  if (empty($content)) {
		echo "<script>alert('内容不能为空');location='?tj=register';</script>";
	}
	else {
                  if( strlen($title)<50&&strlen($title)>5){
					  $taskObj = new bs_TaskInfoModel();
					  $result  = $taskObj->insertTaskInfo(
						  $title    ,
						  $startTime,
						  $eTime    ,
						  $content  ,
						  $process  ,
						  $name     ,
						  '暂无描述') ;
                  echo $result;
                    if ($result)
                        echo "<script>alert('添加成功');location='inquireTask1.php';</script>";
                    else {
                        echo "<script>alert('添加失败');location='addTask.php';</script>";
                    }
                  }
                  else {
                      echo "<script>alert('标题大于5字符或者小于50个字符');location='?tj=register';</script>";
                  }
        
        }
}
?>


</html>