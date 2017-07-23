<?php
require_once (dirname(__FILE__).'/../model/bs/TaskInfo.php');

$taskObj = new bs_TaskInfoModel();

//根据ID号逻辑删除任务
 $id=$_GET['id'];
 $status = $taskObj->updateStatusOfTask($id);

if($status==1){
     echo "<script>alert('删除成功');location='inquireTask1.php?';</script>";
 }
 else {
     echo "<script>alert('删除失败');location='inquireTask1.php?';</script>";
 }
?>