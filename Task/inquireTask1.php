<?php
require_once (dirname(__FILE__).'/../model/bs/TaskInfo.php');
require_once (dirname(__FILE__).'/../model/ds/UserInfo.php');

if(!isset($_SESSION)){
	ob_start();
	session_start();
}

if(!isset($_SESSION['name'])){
	echo "<script>alert('你还没有登录!!');location='index.php';</script>";
	exit("请登录！");
}

$userObj = new ds_UserInfoModel();
$taskObj = new bs_TaskInfoModel();

//获取中文姓名
$chinaName  =  $userObj->getData($_SESSION['name'])[0]['chinaname'];

//获取任务信息
$result = array();
if (isset($_POST['submit'])) {
    if (isset($_POST['table_search']) && $_POST['table_search']) {
        $title = $_POST['table_search'];
        $result = $taskObj->getTaskInfoByKeys($_SESSION['name'],false,$title);
    } else {
        $title = "";
        $result = $taskObj->getTaskInfoByKeys($_SESSION['name']);
    }
} else {
    $title = "";
    $result = $taskObj->getTaskInfoByKeys($_SESSION['name']);
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>AdminLTE | Simple Tables</title>
<meta
	content='width=1000, initial-scale=1, maximum-scale=1, user-scalable=no'
	name='viewport'>
<!-- bootstrap 3.0.2 -->
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- font Awesome -->
<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
<style type="text/CSS">
.button {
	background: #E27575;
	border: none;
	padding: 10px 25px 10px 25px;
	color: #FFF;
	box-shadow: 1px 1px 5px #B6B6B6;
	border-radius: 3px;
	text-shadow: 1px 1px 1px #9E3F3F;
	cursor: pointer;
}

.button1 {
	background: #ccd2de;
	border: none;
	padding: 10px 25px 10px 25px;
	color: #FFF;
	box-shadow: 1px 1px 5px #B6B6B6;
	border-radius: 3px;
	text-shadow: 1px 1px 1px #9E3F3F;
	cursor: pointer;
	
}
.center{}
</style>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->


<!-- /.search form -->
<!-- sidebar menu: : style can be found in sidebar.less -->


<!-- /.sidebar -->


<!-- Main content -->
</head>
 <div class="center" style="width:90%; margin-left:80px;">
 <section class="content">
	<div class="row">
		<!--<div class="col-md-6">-->
			<div class="box" style="margin-top:50px;">
			<h3 class="box-title">详细任务信息<br/></h3>
				<form action="" method="post">
					<div class="box-header">
				

						
						
						<div class="box-tools">
							<div class="input-group">

								<input type="text" name="table_search"
									class="form-control input-sm pull-right" style="width: 150px;"
									placeholder="任务标题" />
								<div class="input-group-btn">
									<button name="submit" type="submit"
										class="btn btn-sm btn-default">
										<i class="fa fa-search"></i>
									</button>
								</div>

							</div>
						</div>
					
				</form>
				</div>
				<!-- /.box-header -->
                                <?php
                                
if ($result) {
                                    $i = 0;
                                    ?>
                                <div
					class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr>
							<th>任务号</th>
							<th>标题</th>
							<th>中文名</th>
							<th>起始时间</th>
							<th>状态</th>

							<th colspan="2" align="center">操作</th>

						</tr>
                                        
                                             <?php
                                    
foreach ($result as $key => $row) {
                                        $i ++;
                                        $status = "未完成";
                                        if ($row['process'] != "100%") {
                                            $status = "未完成";
                                        } else {
                                            $status = "已完成";
                                        }
                                        ?>
                                        <tr>
							<td><?php echo  $i?></td>
							<td><?php echo  $row['title']?></td>
							<td><?php echo  $chinaName?></td>
							<td><?php echo  $row['stime']?></td>
                                            <?php if($status=="已完成"){?>
                                            <td><span
								class="label label-success"><?php echo $status?></span></td><?php
                                        } else {
                                            ?>  <td><span
								class="label label-warning"><?php echo $status?></span></td><?php }?>
                                 
                                          
                                            <td><input type="button"
								name="submit" class="button1" value="修改"
								onclick="window.location.href='<?php echo "TaskEdit.php?id=".$row['id'];?>' " />
							<input type="button" class="button" id="button" value="删除"
								onclick="js_method('<?php echo $row['title']?>','<?php echo $row['id'];?>')" /></td>
						</tr>
                                       
                                        
                                       <?php  }}else{?>
                                          <tr>

							
							<td>你暂时还没有任何相关任务<a href="addTask.php">添加任务</a></td>
						</tr>
                                          
                                          
                                       
                                      <?php  }?>
                                       
                                    </table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>
</section>
</div>
<!-- /.content -->

<!-- /.right-side -->

<!-- ./wrapper -->

<script type="text/javascript">
            function js_method(user_name,id){
            	
                var r=confirm("确定删除'"+user_name+"'吗？");
                if(r==true){
                  window.open("TaskDelete.php?id="+id,"_self","width=100,height=50");
               	  return true;
                }
                else{
                  
              	   return false;
                }  
            }

		</script>
</body>
</html>