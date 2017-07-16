<?php
require_once("../model/ds/UserInfo.php");
$test=new ds_UserInfoModel();
$res=$test->getData();
//$res=$test->add('test','111111','ceshi','111111','123456.163.com','2','1');
//$res=$test->update('111111',false,false,array('user_name'=>'test'));
//$res=$test->delete();
var_dump($res);





