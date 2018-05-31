<?php
require_once (dirname(__FILE__).'/../model/bs/Weekly.php');
require_once (dirname(__FILE__).'/../model/ds/UserInfo.php');

	if(!isset($_SESSION)){
		ob_start();
		session_start();
	}
	if(!isset($_SESSION['name'])){
		echo "<script>alert('你还没有登录!!');location='index.php';</script>";
	}
	$name = $_SESSION['name'];
	$weeklyDb = new bs_WeeklyModel();
	$userDb = new ds_UserInfoModel();
	$chinaName = $userDb->getData($name)[0]['chinaname'];

	$result = array();
	$result = $weeklyDb->getDataByEqual(false,$name);


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>AdminLTE | Simple Tables</title>
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
	background: #000000;
	border: none;
	padding: 10px 25px 10px 25px;
	color: #FFF;
	box-shadow: 1px 1px 5px #B6B6B6;
	border-radius: 3px;
	text-shadow: 1px 1px 1px #9E3F3F;
	cursor: pointer;
	
}
.button0 {
	background: #228B22;
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

</head>
<!-- Main content -->
<body>
 <div class="center">
 <section class="content">
	<div class="row">
		<!--<div class="col-md-6">-->
			<div class="box">
				<form action="" method="post">
					<div class="box-header">
				

						
						<h3 class="box-title">详细任务信息</h3>
						<div class="box-tools">
							<div class="input-group">

								<!--<input type="text" name="table_search"
									class="form-control input-sm pull-right" style="width: 150px;"
									placeholder="总结标题" />-->
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
							<th>周报数</th>
							<th>周报标题</th>
							<th>中文名</th>
							<th>填写时间</th>
							

							<th colspan="2" align="center">操作</th>

						</tr>
                                        
                                             <?php
                     
 					foreach ($result as $row) {
						$i++;
                                        ?>
                                        <tr>
										
							<td><?php echo  $i?></td>
							<td><?php echo  $row['leave_title']?></td>
						    <td><?php echo  $chinaName?></td>
							<td><?php echo  $row['leave_time']?></td>
                                 
                                          
                                            <td>
												<input type="button"name="submit" class="button0" value="查看回复"onclick="window.location.href='<?php echo "WeekReply.php?id=".$row['id'];?>' " />
												<input type="button"name="submit" class="button1" value="修改"onclick="window.location.href='<?php echo "WeekEdit.php?id=".$row['id'];?>' " />
												<input type="button" class="button" id="button" value="删除"onclick="js_method('<?php echo $row['leave_title']?>','<?php echo $row['id']?>')" /></td>
						                    </tr>
                                       
                                        
                                       <?php }
									   }else{?>
                                          <tr>

							
							<td>你暂时还没有添写任何总结<a href="write.php">添加总结</a></td>
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
                  window.open("WeekDelete.php?id="+id,"_self","width=100,height=50");
               	  return true;
                }
                else{
                  
              	   return false;
                }  
            }

		</script>
</body>
</html>