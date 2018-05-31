<?php
/**
 * Created by PhpStorm.
 * User: Chen
 * Date: 2017/7/18
 * Time: 10:41
 */

require_once dirname(__FILE__).'/model/bs/TaskInfo.php';
require_once dirname(__FILE__).'/model/bs/Weekly.php';
require_once dirname(__FILE__).'/model/ds/Weekly.php';
require_once dirname(__FILE__).'/model/ds/UserInfo.php';


$userObj      = new ds_UserInfoModel();
$in_name      = 'username';
$in_pwd       = "userpwd";
$in_pwdV      = 'userpwdV';
$in_chinaName = "chinaname";
$in_stuno     = trim("stuno");
$in_email     = trim("email");
$in_grade     = trim("grade");
$in_image     = trim("image");
$in_mobile    = trim("mobile");

    $res   = $userObj->add($in_name, $in_pwd, $in_chinaName, $in_stuno, $in_email, $in_grade, $in_image, $in_mobile);

if($res){
    var_dump($res);
}
else
    echo 'falied';


echo 1111;