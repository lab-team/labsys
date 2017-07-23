<?php
require_once (dirname(__FILE__).'/../model/bs/Weekly.php');
$id=$_GET['id'];
?>
<html>
<meta http-equiv="Content-Type" content="text/html" ; charset="utf-8" />
<style type="text/css">
body{text-align: center;background: #F7FAFC;overflow: hidden;background: #fff;}#canvas{display: inline-block;}
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
	height: 300px;
	width:500px;
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
</style>
<body>
	
	 <?php
    $weekObj   =   new bs_WeeklyModel();
	$result    =   $weekObj->getDataByEqual($id);
    foreach ($result  as  $rs) {
        ?>
	<form action="" method="post" class="basic-grey">
	
		<label> <span>周报标题 :<?php echo $rs['leave_title'];?></span></label>
		<label> <span>填写时间:<?php echo $rs['leave_time'];?></span> </label>
		<label align=left><span >进行修改:</span> </label>
		<label>
			<textarea id="description" name="description" ><?php echo $rs['leave_contents'];?></textarea>
			<input type="submit" name="submit" class="button" value="保存修改" />
		</label>
	</form>
	<label><span> <a href="inquireWeek.php">
						<span>返回</span>
			      </a>
		   </span>
	</label>
    <?php if (isset($_POST["submit"]) && $_POST["submit"]) {
        
      if (isset($_POST["submit"]) && $_POST["submit"]) {
		   if(empty($_POST['description'])){
			   echo "<script>alert('修改内容不能为空');	window.history.back(-1);</script>";
			   exit(0);
		   }
		   datefmt_set_timezone('Asia/Shanghai');
		   $time    =   date('Y-m-d H:i:s',time());
		   $result  =  $weekObj->editWeekly($_POST['description'],$time,array( 'id' => $id));
            if($result){
                echo "<script>alert('修改成功');location='inquireWeek.php';</script>";
            }
            else {
                echo "errror";
      		}
      }
    }?>
    
    <?php } ?>

</body>
</html>