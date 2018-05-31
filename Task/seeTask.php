<?php
require_once(dirname(__FILE__)."/../model/bs/TaskInfo.php");

error_reporting(0);
if (!isset ($_SESSION)) {
	ob_start();
	session_start();
}
if (! isset($_SESSION['name'])) {
    echo "<script>alert('你还没有登录');location='index.php';</script>";
} else {
    $name = $_SESSION['name'];
    $TaskObj = new bs_TaskInfoModel();
    $result = array();
    $result = $TaskObj->getTaskInfoByKeys($name);

	// print_r($result);
    // $Taskcount = count($result);
    
    // $title[]=array();
}

?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
	font-family: 微软雅黑;
}
</style>
<meta charset="UTF-8">
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title></title>
<meta
	content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'
	name='viewport'>
<!-- bootstrap 3.0.2 -->
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- font Awesome -->
<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
</head>

<div class="box" style="left: 5%; width: 90%; top:0px; height:100%" >
	<div class="box-header">
		<h3 class="box-title">任务总览</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body no-padding">
		<table class="table table-striped">
			
                                         <?php
                                        
                                    if ($result) {
                                            $i = 0;
                                            $color = "";
                                            foreach ($result as $key => $row) {
                                                $i++;
                                                                ?>
                                   <tr>
				<th style="width: 10px">#</th>
				<th>任务名</th>
				<th>进度</th>
				<th style="width: 40px">比率</th>
			</tr>     
                                        
                                        <tr>
				<td><?php echo $i?></td>
				<td><a href='TaskEdit.php?id=<?php echo $row['id']?>' onclick="changeit('TaskEdit.php?id=<?php $row['id']?>')"><?php echo  $row['title']?></a></td>
				<td>
					<div class="progress xs">
						<div class="progress-bar progress-bar-danger" style="width: <?php echo $row['process']?>"></div>
					</div>
				</td>
				<td><span class="badge bg-green"><?php echo  $row['process']?></span></td>
			</tr>
                                        <?php
                                            
}
                                       } else {
                                            ?>
                                                <tr>
				<td><span >你暂时还没有任何相关任务，请<a href="addTask.php" onclick="changeit('addTtask.php')">添加任务</a></span></td>
			</tr>
                                         <?php
                                        
}
                                        ?>
                                       
                                        
                                        
                                    </table>
	</div>
	<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</body>
</html>
</html>