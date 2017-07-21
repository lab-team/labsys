<?php
require_once("UserInfo.php");
require_once("TaskInfo.php");
$test=new ds_UserInfoModel();
//$test=new ds_TaskInfoModel();
//$res=$test->getData();
//$res=$test->add('test','11111111','test','11111111','123456.163.com','研二','image_head/head7.jpg','13500000000');
//$res=$test->update(array('title'=>'test1'),'test1');
//$res=$test->delete(false,'test1');

//var_dump($res);
$pre=array(1,2,4,7,3,5,6,8);
$vin=array(4,7,2,1,5,3,8,6);
$al=array();
$ar=array();
$bl=array();
$br=array();
$tmp=0;
foreach($vin as $v){
    if($tmp==0){
        if($v==$pre[0]){
            $tmp=1;
            continue;
        }
        $bl[]=$v;
    }else{
        $br[]=$v;
    }
}
foreach ($pre as $p){
    if(in_array($p,$bl)){
        $al[]=$p;
    }
    if(in_array($p,$br)){
        $ar[]=$p;
    }
}
var_export($bl);
var_export($br);
var_export($al);
var_export($ar);





