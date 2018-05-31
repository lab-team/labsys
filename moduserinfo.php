<?php
    require_once(dirname(__FILE__) . "/model/ds/UserInfo.php");
    require_once(dirname(__FILE__) . "/model/ds/Image.php");
    require_once(dirname(__FILE__) . "/model/ds/PreUserInfo.php");

    if (!isset ($_SESSION)) {
        ob_start();
        session_start();
    }

    if (!isset($_SESSION['name'])) {
        echo "<script>alert('你还没有登录!!');location='index.php';</script>";
        exit(0);
    }

    $name     = $_SESSION['name'];

    $userObj = new ds_UserInfoModel();
    $userRes = $userObj->getData($name);

?>
<html>
<head>

    <title>信息修改</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script type="text/javascript" src="js/jquery-1.6.min.js"></script>
    <span style="font-size:24px;">
    <style type="text/css">  
    body {
        overflow-x: hidden;
        overflow-y: hidden;
    }  
    </style>
	</span>
    <style>
        body {
            font-family: 微软雅黑;
        }

        #div_center {
            position: absolute;
            margin-left: 30%;
            margin-top: 2%;
            width: 35%;
            height: 582px;
            border: 3px;
            background-color: #FFFFFF;
            text-align: center;
            box-shadow: 0 0 5px #AAAAAA;
            top: 0;
        }

        #regist_head {
            position: relative;
            top: 5px;
            font-size: 25px;
        }

        #div_regcontext {
            position: relative;
            top: 13px;
            left: -20px;
            height: 50%;
            width: 100%;
        }

        .reg_title {
            font-size: 18px;
            color: #555555;
        }

        .textbox {
            height: 40px;
            width: 80%;
            border-radius: 4px;
            border: 1px solid #cccccc;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }

        .textbox:focus {
            border-color: #66afe9;
            outline: 0;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(100, 149, 237, 0.6);
        }

        #btn_reg {
            position: relative;
            left: 20px;
            width: 160px;
            height: 48px;
            background: #E27575;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            font-family: 微软雅黑;
            font-size: 15px;
            color: white;
        }

        #btn_reg:hover {
            background: #6495ED;
        }

        #href_back {
            position: relative;
            left: 4%;
            font-family: 微软雅黑;
        }

        #font_grade {
            position: absolute;
            left: 15%;
            top: 80%;
        }

        #stugrade {
            height: 40px;
            width: 50%;
            font-family: 微软雅黑;
            font-size: 15px;
            border-radius: 4px;
        }

        #div_error {
            position: relative;
            left: 12%;
            top: 2px;
            text-align: left;
            font-size: 17px;
            color: #AA0000;
        }

        #tb {
            margin-left: 10%;
            width: 100%;

        }

        .tr {
            height: 48px;
        }

        .td_1 {
            width: 10%;
        }
    </style>
</head>
<body>
<div id="div_center">
    <p align="center"><font id="regist_head">信 息 修 改</font></p>

    <div id="div_regcontext">
        <form action="" method=post>
            <table id="tb">
                <tr>

                </tr>
                <tr class="tr">
                    <td class="td_1">
                        <font class="reg_title">用户名<font color="red">*</font>:&nbsp;&nbsp;&nbsp;&nbsp;</font>
                    </td>
                    <td>
                        <input type="text" readonly="readonly" class="textbox" name="username"
                               style="border:0; background:transparent;font-family:微软雅黑; font-size:14px"
                               <?php echo "value='" . $userRes[0]['username'] . "'"; ?> />
                    </td>
                </tr>
                <tr class="tr">
                    <td class="td_1">
                        <font class="reg_title">密&nbsp;&nbsp;&nbsp;码<font color="red">*</font>:&nbsp;&nbsp;&nbsp;&nbsp;
                        </font>
                    </td>
                    <td>
                        <input required type="password" pattern="^[\w\W]{8,}$" class="textbox"
                               name="userpwd" placeholder="密码大于8位！" style="font-family:微软雅黑; font-size:14px"/>
                    </td>
                </tr>
                <tr class="tr">
                    <td class="td_1">
                        <font class="reg_title">确&nbsp;&nbsp;&nbsp;认<font color="red">*</font>:&nbsp;&nbsp;&nbsp;&nbsp;
                        </font>
                    </td>
                    <td>
                        <input required type="password" pattern="^[\w\W]{8,}$" class="textbox"
                               name="pwdVerify" placeholder="请确认密码" style="font-family:微软雅黑; font-size:14px"/>
                    </td>
                </tr>
                <tr class="tr">
                    <td class="td_1">
                        <font class="reg_title">姓&nbsp;&nbsp;&nbsp;名<font color="red">*</font>:&nbsp;&nbsp;&nbsp;&nbsp;</font>
                    </td>
                    <td>
                        <input required type=text  class="textbox" name="chinaname" placeholder="请输入姓名"
                               style="font-family:微软雅黑; font-size:14px" <?php echo "value='".$userRes[0]['chinaname']."'";?> />
                    </td>
                </tr>
                <tr class="tr">
                    <td class="td_1">
                        <font class="reg_title">手机号<font color="red">*</font>:&nbsp;&nbsp;&nbsp;&nbsp;
                        </font>
                    </td>
                    <td>
                        <input required type=text  class="textbox" name="phone" placeholder="请输入手机号"
                               style="font-family:微软雅黑; font-size:14px" <?php echo "value='" . $userRes[0]['mobile'] . "'"; ?> />
                    </td>
                </tr>
                <tr class="tr">
                    <td class="td_1">
                        <font class="reg_title">mac<font color="red">*</font>:&nbsp;&nbsp;&nbsp;&nbsp;
                        </font>
                    </td>
                    <td>
                        <input type=text class="textbox" name="mac" placeholder="请输入mac地址"
                               style="font-family:微软雅黑; font-size:14px" <?php echo "value='" . $userRes[0]['mac'] . "'"; ?> />
                    </td>
                </tr>
                <tr class="tr">
                    <td class="td_1">
                        <font class="reg_title">邮&nbsp;&nbsp;&nbsp;箱&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
                    </td>
                    <td>
                        <input type=email  class="textbox" name="useremail" placeholder="请输入邮箱"
                               style="font-family:微软雅黑; font-size:14px" <?php echo "value='" . $userRes[0]['email'] . "'"; ?> />
                    </td>
                </tr>
                <tr class="tr">
                    <td class="td_1">
                        <font class="reg_title">年&nbsp;&nbsp;&nbsp;级&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;</font>
                    </td>
                    <td>
                        <select name="stugrade" id=stugrade>
                            <option value="">请选择</option>
                            <option value="本科" <?php if (strcmp($userRes[0]['grade'], "本科") == 0)
                                echo "selected"; ?>>大四
                            </option>
                            <option value="研一" <?php if (strcmp($userRes[0]['grade'], "研一") == 0)
                                echo "selected"; ?>>研一
                            </option>
                            <option value="研二" <?php if (strcmp($userRes[0]['grade'], "研二") == 0)
                                echo "selected"; ?>>研二
                            </option>
                            <option value="研三" <?php if (strcmp($userRes[0]['grade'], "研三") == 0)
                                echo "selected"; ?>>研三
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <table style="margin-left:50px">
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <?php
                            foreach (ds_ImageModel::head as $image) {
                                 ?>

                                <td bgcolor="#FFFFFF">
                                    <input type="radio" value="<?php echo $image; ?>"
                                           name="userface" checked="checked"/>
                                    <img alt="" src="<?php echo $image ?>" height="49" width="49" border="0">
                                </td>
                            <?php } ?>

                        </tr>
                    </table>
                </tr>
                <tr>
                    <button id="btn_reg" name="btn_reg" type="submit">修&nbsp;&nbsp;&nbsp;改</button>
                    <p><a id="href_back" href="userinfo.php">返回</a></p>
                </tr>
            </table>
        </form>

    </div>
</div>

<?php

    if (isset($_POST["btn_reg"])) {
        $pass          = $_POST["userpwd"];
        $passV         = $_POST["pwdVerify"];
        $chinaName     = $_POST["chinaname"];
        $phoneNo       = $_POST["phone"];
        $mac           = $_POST["mac"];
        $email         = $_POST["useremail"];
        $grade         = $_POST["stugrade"];
        $face          = $_POST["userface"];


        if (strcmp($pass, $passV) == 0) {
            $md5Pwd     =   md5($pass);
            $result     =   $userObj->update(array('username' => $name),false,$md5Pwd,$grade,$phoneNo,$face,$email,$mac,$chinaName);
                if ($result) {
                    echo "<script>alert('修改成功');location='userinfo.php';</script>";
                } else {
                    //echo "<script>alert('修改失败');location='userinfo.php';</script>";
                }
        } else {
            echo "<script>alert('两次密码输入不一致');</script>";
        }
    }
?>
</html>
