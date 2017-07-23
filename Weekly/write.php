<?php

	require_once (dirname(__FILE__).'/../model/bs/Weekly.php');

    error_reporting(0);          //for LINE168

    if(!isset($_SESSION))
    {
        ob_start();
        session_start();
    }

    if(!$_SESSION['name']){
        echo "<script>alert('你还没有登录!!');location='../../index.php';</script>";
    }
?>
<html xmlns="http://www.baidu.com">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="./images-week/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./images-week/check.js"></script>
<style type="text/css">

<!--
.style1 {color: #FF0000}
-->
</style>
</head>
<body>
<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="109" align="right" valign="top" background="images-week/bjl2.jpg">&nbsp;</td>
    <td align="center" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="40" align="center"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
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
                <td>
                 
				 <table width="100%" height="100%" border="0" align="center" cellpadding="8" cellspacing="0">
        <tr>
          <td height="470" align="left" valign="top" bgcolor="#FFFFFF">

<form id="form1" name="form1" method="post" action="" style="margin-top:0px;">
  <table width="100" border="0" align="center" cellpadding="5" cellspacing="1" bordercolor="#000000" bgcolor="#CCCCCC">
    <tr>
     <td colspan="2" align="right" bgcolor="#FFFFFF"><a href="week.php">返回查看</a>&nbsp;&nbsp;</td>
    </tr>
	
    <tr>
      <th colspan="2" bgcolor="#FFFFFF">填写个人总结</th>
    </tr>
    <tr>
      <td width="100" height="50" align="center" bgcolor="#FFFFFF">选择头像:</td>
      <td bgcolor="#FFFFFF"> 
	 					    <input type="radio" value="1" name="face" checked="checked" />
                            <img src="./images-week/face/1.png" border="0" style="heigh:55;width:55"/>
                            <input type="radio" value="2" name="face" />
                            <img src="./images-week/face/2.png" border="0" style="heigh:55;width:55"/>
                            <input type="radio" value="3" name="face" />
                            <img src="./images-week/face/3.png" border="0" style="heigh:55;width:55"/>
                            <input type="radio" value="4" name="face" />
                            <img src="./images-week/face/4.png" border="0" style="heigh:55;width:55"/>
                            <input type="radio" value="5" name="face" />
                            <img src="./images-week/face/5.png" border="0" style="heigh:55;width:55"/>
                            <input type="radio" value="6" name="face" />
                            <img src="./images-week/face/6.png" border="0" style="heigh:55;width:55"/>
                            <input type="radio" value="7" name="face" />
                            <img src="./images-week/face/7.png" border="0" style="heigh:55;width:55"/>

							<!--<input type="radio" value="8" name="face" />
							 <img src="images-week/face/face8.GIF" border="0" />-->
							</td>
    </tr>
  <tr>
   <td align="center" bgcolor="#FFFFFF">如何写个人总结？</td>
   <td   bgcolor="#FFFFFF">1.本阶段学习了什么内容。2.学习过程中得到的收获。<br/>3.学习过程中遇到什么样的问题，问题是否解决以及解决方法。<br/>
   4.总结学习该知识的心得体会。5.对下阶段学习开展的简单思路。</td>
   </tr>
    <tr>
      <td align="center" bgcolor="#FFFFFF">周总结标题:</td><td bgcolor="#FFFFFF"><input name="title" type="text" id="title" />
    </tr>
	<tr>
		<td colspan="2" bgcolor="#FFFFFF">&nbsp;周总结内容:</td>
	</tr>
    <tr>
      <td colspan="2" bgcolor="#FFFFFF"><textarea name="content" cols="100%" rows="20"  placeholder="请输入个人总结，内容不得少于50个字！"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#FFFFFF"> <input type="submit" name="Submit" value="提交"onclick="return confirm('确定要提交吗？');" />
      <input type="reset" name="Submit2" value="重置" /></td>
    </tr>
  </table>
</form></td>
        </tr>
      </table>
				  
				 
				 </td>
                <td background="./images-week/2x.jpg">&nbsp;</td>
              </tr>
              <tr>
                <td width="18" height="15" align="right" valign="top"><img src="./images-week/4.jpg" width="18" height="15" /></td>
                <td height="12" background="./images-week/3z.jpg">&nbsp;</td>
                <td width="17" height="15" align="left" valign="top"><img src="./images-week/3.jpg" width="17" height="15" /></td>
              </tr>
            </table>
			  </td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td width="108" align="left" valign="top" background="./images-week/bjr2.jpg">&nbsp;</td>
  </tr>
</table>
<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="114" valign="top" background="./images-week/xm.jpg"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="55" align="center" class="wfont"><?php echo "书山有路勤为径 学海无涯苦作舟"?> 
       
      </tr>
      
    </table></td>
  </tr>
</table>



</body>
</html>
<?php
    $name      = $_SESSION['name'];
    $weeklyObj = new bs_WeeklyModel();
    //$result    = $weeklyObj->getData(false,fasle,false,$name);


    date_default_timezone_set('Asia/Shanghai');
    if($_POST["Submit"])
    {
        $username=$_SESSION['name'];

        $face=$_POST["face"];
        $title=$_POST["title"];
        $content=$_POST["content"];
        $time=date('Y-m-d H:i:s',time());
//        $time1=strtotime($t);

//        $d2=ceil((time()-$time1)/60/60/24);
//        if($d2<0){
//            echo"<script>alert('本周已提交，请下周提交') ;location='?tj=register';</script>";}

        if (empty($title))
            echo "<script>alert('标题不能为空');location='?tj=register';</script>";


        else  if (empty($content))
            echo "<script>alert('内容不能为空');history.go(-1);</script>";
        else {
            if(strlen($content)>10){
                $result = $weeklyObj->add($name,$face,$title,$content,$time);
                if ($result) {
                    echo "<script>alert('提交成功');location='week.php';</script>";
                }
                else {
                    echo "<script>alert('提交失败');location='write.php';</script>";
                }
            }
            else {
                echo "<script>alert('内容不得少于10个字！');history.go(-1);</script>";
            }

        }
    ?>
    <?php
}
?>
