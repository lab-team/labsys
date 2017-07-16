<?php
SESSION_START();
require_once(dirname(__FILE__)."/model/ds/UserInfo.php");
    error_reporting(0);
?>

<html>
	<head>
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>

	<body>
		<?php
	       if(isset($_POST["btn_login"])){
	           $name = $_POST["username"];
	           $pwd = $_POST["userpwd"];
			   $userObj=new ds_UserInfoModel();
			   $userInfo=$userObj->getData($name);

	           //$pwd = md5($pwd); ////验证加密后密码
	           if(empty($userInfo[0])){
				   //尚未注册
				   $login_info=-1;
	           }
	           else if($userInfo[0]["userpwd"] == $pwd){
	               //"登陆成功";

	               $login_info=1;
				   $_SESSION['name'] = $name;
				   header("Location:main.php");
	           }
	           else if($userInfo[0]["userpwd"] != $pwd){
	               //用户名或密码错误";
	               $login_info=2;
	           }
	       }//if isset
		?>
		<div style="display: none">
			<form id="hiddenForm" name="hiddenForm" action="index.php" method="post"  >
				<input  id="logInfo" type="text" name="logInfo" value="<?php echo $login_info;?>"/>
			</form>
		</div>
	</body>
	<script type="text/javascript">
			jsvar = <?php echo $login_info; ?>; //将PHP中获取到的登录信息标记传给JS代码
			
			if(jsvar == -1 || jsvar == 2){
				window.onload= function(){
			    	document.getElementById('hiddenForm').submit();
				}
			}
	</script>
</html>
