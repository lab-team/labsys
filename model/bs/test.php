<?php
require_once("TaskInfo.php");
//$test=new ds_UserInfoModel();
$test=new bs_TaskInfoModel();
$res=$test->getTaskInfoByKeys('研二');
//$res=$test->add('test','11111111','test','test','123456.163.com');
//$res=$test->update(array('title'=>'test'),'test1');
var_dump($res);
//$res=$test->delete(false,'test1');






