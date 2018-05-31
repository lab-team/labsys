<?php
require_once("UserInfo.php");
require_once("TaskInfo.php");
$test=new ds_UserInfoModel();
//$test=new ds_TaskInfoModel();
//$res=$test->getData();
$res=$test->add('test','11111111','test','11111111','123456.163.com','研二','image_head/head7.jpg','13500000000');
//$res=$test->update(array('title'=>'test1'),'test1');
//$res=$test->delete(false,'test1');
var_dump($res);





