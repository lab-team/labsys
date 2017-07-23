<?php
require_once (dirname(__FILE__).'/../model/bs/Weekly.php');
require_once (dirname(__FILE__).'/../model/ds/UserInfo.php');
require_once (dirname(__FILE__).'/Page.Class.php');

error_reporting(0);

if(!isset($_SESSION)){
  ob_start();
  session_start();
}

if(!$_SESSION['name']){
  echo "<script>alert('你还没有登录!!');location='../../index.php';</script>";
}

$name = $_SESSION['name'];
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="images-week/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="109" align="right" valign="top" background="images-week/bjl2.jpg">&nbsp;</td>
    <td align="center" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="40"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="48" height="28" background="images-week/ttl1.jpg">&nbsp;</td>
            <td align="center" background="images-week/ttm.jpg" class="wfont">好好学习 周周总结！</td>
            <td width="43" height="28" background="images-week/ttr1.jpg">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="350" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="0">
			<table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="18" height="16" align="right" valign="bottom"><img src="images-week/1.jpg" width="18" height="16" /></td>
                <td height="12" background="images-week/1r.jpg">&nbsp;</td>
                <td width="17" height="16" align="left" valign="bottom"><img src="images-week/2.jpg" width="17" height="16" /></td>
              </tr>
              <tr>
                <td width="13" background="images-week/4s.jpg">&nbsp;</td>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="7"></td>
                  </tr>
                </table>
<table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" bordercolor="#000000" bgcolor="#CCCCCC">
<tr>
	<td colspan="3" align="right" bgcolor="#FFFFFF">
	<a href="write.php">填写周总结</a></td>
</tr>



 <?php
//使用方法：
   $weeklyObj = new bs_WeeklyModel();
   $userObj   = new ds_UserInfoModel();

   $nums=$weeklyObj->getWeeklyNums();                           //总留言数
   $each_disNums=$page=3;                                       //每页显示的条目数 $db->ly_system("system",6)
   $sub_pages=2;                                                //当 $subPage_type 为 2 时，每次显示的页数
   $pageNums = ceil($nums/$each_disNums);                       //总页数
   $subPage_link="week.php?&page=";                             //每个分页的链接
   $subPage_type=1;                                             //为1时,显示结果1,为2时,显示结果2,显示分页的类型
   $current_page=$_GET['page']!=""?$_GET['page']:1;           //当前被选中的页
   $currentNums=($current_page-1)*$each_disNums;                //limit计算来用

   $leaveWords = $weeklyObj->getDataByEqual(false,false,false,false,false,array(),$currentNums,$each_disNums);
   foreach ($leaveWords as $rows) {
     ?>
     <tr>
       <td width="101" rowspan="2" align="center" bgcolor="#FFFFFF"><img style="width:55;height:55"
                                                                         src="images-week/face/<?php echo $rows["face"]; ?>.png"/>
       </td>
       <td width="304" align="left" bgcolor="#FFFFFF">周总结标题:<?php echo strip_tags($rows["leave_title"]); ?></td>
       <td width="211" align="left" bgcolor="#FFFFFF">填写时间:<?php echo $rows["leave_time"] ?></td>
     </tr>
     <tr>
       <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF">

         <table width="100%" border="0" cellspacing="0" cellpadding="5">
           <tr>
             <td><?php echo strip_tags($rows["leave_contents"]); ?></td>
           </tr>
         </table>


         <?php

         if ($rows['is_audit'] == 0) {
           echo "<span style='color:red'>暂无回复</span>";
         } else {
           ?>
           <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
             <tr>
               <td bgcolor="#F2F2F2"><?php echo "<font color='red'>老师回复:</font><br>" . rows['reply'] . "<br>"; ?></td>
             </tr>
           </table>

           <?php
         }
         ?></td>
     </tr>
     <tr>
       <td align="center" bgcolor="#FFFFFF">姓名:<?php echo $userObj->getData($name)[0]['chinaname']; ?></td>

     </tr>
     <tr>
       <td colspan="3" bgcolor="#FFFFFF" height="15"></td>
     </tr>
     <?php
   }
  ?>
</table>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40" align="center"><?php $pg=new SubPages($each_disNums,$nums,$current_page,$sub_pages,$subPage_link,$subPage_type);?></td>
  </tr>
</table>
</td>
<td background="images-week/2x.jpg">&nbsp;</td>
              </tr>
              <tr>
                <td width="18" height="15" align="right" valign="top"><img src="images-week/4.jpg" width="18" height="15" /></td>
                <td height="12" background="images-week/3z.jpg">&nbsp;</td>
                <td width="17" height="15" align="left" valign="top"><img src="images-week/3.jpg" width="17" height="15" /></td>
              </tr>
            </table>
			  </td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td width="108" align="left" valign="top" background="images-week/bjr2.jpg">&nbsp;</td>
  </tr>
</table>
<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="114" valign="top" background="images-week/xm.jpg"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="55" align="center" class="wfont"><?php echo "书山有路勤为径 学海无涯苦作舟"?>
         <!--$db->ly_system("system",60)-->
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
