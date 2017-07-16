<?php
require_once("UserInfo.php");
require_once("TaskInfo.php");
//$test=new ds_UserInfoModel();
$test=new ds_TaskInfoModel();
//$res=$test->getData();
$res=$test->add('qly','22222222','33333333','qilingyun','123456.163.com');
//$res=$test->update(array('title'=>'test1'),'test1');
//$res=$test->delete(false,'test1');
var_dump($res);





