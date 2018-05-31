<?php
require_once(dirname(__FILE__) . "/model/ds/PreUserInfo.php");
require_once(dirname(__FILE__) . "/model/ds/UserInfo.php");
require_once(dirname(__FILE__) . "/model/ds/Image.php");

error_reporting(E_ALL & ~E_NOTICE);
?>
<html>
<head>
    <title>用户注册</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body {
            font-family: 微软雅黑;
        }

        #div_center {
            position: absolute;
            margin-left: 30%;
            margin-top: 2%;
            width: 35%;
            height: 632px;
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
            position:relative;
            width: 120px;
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

            position:relative;
            width: 100px;
            height: 48px;
            background: #6495ED;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            font-family: 微软雅黑;
            font-size: 15px;
            color: white;

        }

        #grade {
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
<canvas id="canvas"></canvas>
<script>
    //定义画布宽高和生成点的个数
    var WIDTH = window.innerWidth, HEIGHT = window.innerHeight, POINT = 35;

    var canvas = document.getElementById('canvas');
    canvas.width = WIDTH,
        canvas.height = HEIGHT;
    var context = canvas.getContext('2d');
    context.strokeStyle = 'rgba(0,0,0,0.02)',
        context.strokeWidth = 1,
        context.fillStyle = 'rgba(0,0,0,0.05)';
    var circleArr = [];

    //线条：开始xy坐标，结束xy坐标，线条透明度
    function Line(x, y, _x, _y, o) {
        this.beginX = x,
            this.beginY = y,
            this.closeX = _x,
            this.closeY = _y,
            this.o = o;
    }
    //点：圆心xy坐标，半径，每帧移动xy的距离
    function Circle(x, y, r, moveX, moveY) {
        this.x = x,
            this.y = y,
            this.r = r,
            this.moveX = moveX,
            this.moveY = moveY;
    }
    //生成max和min之间的随机数
    function num(max, _min) {
        var min = arguments[1] || 0;
        return Math.floor(Math.random() * (max - min + 1) + min);
    }
    // 绘制原点
    function drawCricle(cxt, x, y, r, moveX, moveY) {
        var circle = new Circle(x, y, r, moveX, moveY)
        cxt.beginPath()
        cxt.arc(circle.x, circle.y, circle.r, 0, 2 * Math.PI)
        cxt.closePath()
        cxt.fill();
        return circle;
    }
    //绘制线条
    function drawLine(cxt, x, y, _x, _y, o) {
        var line = new Line(x, y, _x, _y, o)
        cxt.beginPath()
        cxt.strokeStyle = 'rgba(0,0,0,' + o + ')'
        cxt.moveTo(line.beginX, line.beginY)
        cxt.lineTo(line.closeX, line.closeY)
        cxt.closePath()
        cxt.stroke();

    }
    //初始化生成原点
    function init() {
        circleArr = [];
        for (var i = 0; i < POINT; i++) {
            circleArr.push(drawCricle(context, num(WIDTH), num(HEIGHT), num(15, 2), num(10, -10) / 40, num(10, -10) / 40));
        }
        draw();
    }

    //每帧绘制
    function draw() {
        context.clearRect(0, 0, canvas.width, canvas.height);
        for (var i = 0; i < POINT; i++) {
            drawCricle(context, circleArr[i].x, circleArr[i].y, circleArr[i].r);
        }
        for (var i = 0; i < POINT; i++) {
            for (var j = 0; j < POINT; j++) {
                if (i + j < POINT) {
                    var A = Math.abs(circleArr[i + j].x - circleArr[i].x),
                        B = Math.abs(circleArr[i + j].y - circleArr[i].y);
                    var lineLength = Math.sqrt(A * A + B * B);
                    var C = 1 / lineLength * 7 - 0.009;
                    var lineOpacity = C > 0.03 ? 0.03 : C;
                    if (lineOpacity > 0) {
                        drawLine(context, circleArr[i].x, circleArr[i].y, circleArr[i + j].x, circleArr[i + j].y, lineOpacity);
                    }
                }
            }
        }
    }

    //调用执行
    window.onload = function () {
        init();
        setInterval(function () {
            for (var i = 0; i < POINT; i++) {
                var cir = circleArr[i];
                cir.x += cir.moveX;
                cir.y += cir.moveY;
                if (cir.x > WIDTH) cir.x = 0;
                else if (cir.x < 0) cir.x = WIDTH;
                if (cir.y > HEIGHT) cir.y = 0;
                else if (cir.y < 0) cir.y = HEIGHT;

            }
            draw();
        }, 16);
    }

    var exist_flag = <?php  echo $_POST["existInfo"];?>;

    if (exist_flag == 2)
        $(document).ready(function () {
            $("input[name=userpwd]").focus();
        });
    else if (exist_flag == 1)
        $(document).ready(function () {
            $("input[name=username]").focus();
        });
    else if (exist_flag == 3)
        $(document).ready(function () {
            $("input[name=email]").focus();
        });
</script>
</body>


<body>
<div id="div_center">
    <p align="center"><font id="regist_head">用 户 注 册</font></p>

    <div id="div_regcontext">
        <form action="" method=post>
            <table id="tb">
                <tr>

                    <p id="div_error">
                        <?php

                        if ($_POST["existInfo"] == 1) {
                            echo "用户名已存在！";
                        } else if ($_POST["existInfo"] == 2) {
                            echo "密码应不少于8位！";
                        } else if ($_POST["existInfo"] == 8) {
                            echo "密码输入不一致！";
                        } else if ($_POST["existInfo"] == 3) {
                            echo "邮箱格式不正确！";
                        } else if ($_POST["existInfo"] == 4) {
                            echo "此用户不在预设名单，暂不能注册！  请联系管理员";
                        } else if ($_POST["existInfo"] == 5) {
                            echo "学号已存在！";
                        } else if($_POST["existInfo"] == 6) {
                            echo "注册失败请重试！";
                        }

                        ?>
                    </p>

                </tr>
                <tr class="tr">
                    <td class="td_1">
                        <font class="reg_title">用户名<font color="red">*</font>:&nbsp;&nbsp;&nbsp;&nbsp;</font>
                    </td>
                    <td>
                        <input required type=text id="username" class="textbox" name="username" aria-label="请输入用户名"
                               placeholder="请输入用户名"
                               style="font-family:微软雅黑; font-size:14px" <?php if ($_POST["existInfo"] == 2 || $_POST["existInfo"] == 3) {
                            echo "value='" . $_POST['username'] . "'";
                        } ?> />
                    </td>
                </tr>
                <tr class="tr">
                    <td class="td_1">
                        <font class="reg_title">密&nbsp;&nbsp;&nbsp;码<font color="red">*</font>:&nbsp;&nbsp;&nbsp;&nbsp;
                        </font>
                    </td>
                    <td>
                        <input required type="password" id="userpwd" class="textbox" name="userpwd" aria-label="请输入密码"
                               placeholder="密码大于8位!" pattern="^[\w\W]{8,}$"
                               style="font-family:微软雅黑; font-size:14px" <?php if ($_POST["existInfo"] == 1 || $_POST["existInfo"] == 3) {
                            echo "value='" . $_POST['userpwd'] . "'";
                        } ?> />
                    </td>
                </tr>
                <tr class="tr">
                    <td class="td_1">
                        <font class="reg_title">确&nbsp;&nbsp;&nbsp;认<font color="red">*</font>:&nbsp;&nbsp;&nbsp;&nbsp;
                        </font>
                    </td>
                    <td>
                        <input required type="password" id="userpwdV" class="textbox" name="userpwdV"
                               placeholder="请确认密码"!" pattern="^[\w\W]{8,}$"
                               style="font-family:微软雅黑; font-size:14px" <?php if ($_POST["existInfo"] == 1 || $_POST["existInfo"] == 3) {
                            echo "value='" . $_POST['userpwd'] . "'";
                        } ?> />
                    </td>
                </tr>
                <tr class="tr">
                    <td class="td_1">
                        <font class="reg_title">姓&nbsp;&nbsp;&nbsp;名<font color="red">*</font>:&nbsp;&nbsp;&nbsp;&nbsp;
                        </font>
                    </td>
                    <td>
                        <input required type=text id="chinaname" class="textbox" name="chinaname" aria-label="请输入姓名"
                               placeholder="请输入姓名"
                               style="font-family:微软雅黑; font-size:14px" <?php if ($_POST["existInfo"] == 1 || $_POST["existInfo"] == 2 || $_POST["existInfo"] == 3) {
                            echo "value='" . $_POST['chinaname'] . "'";
                        } ?> />
                    </td>
                </tr>
                <tr class="tr">
                    <td class="td_1">
                        <font class="reg_title">学&nbsp;&nbsp;&nbsp;号<font color="red">*</font>:&nbsp;&nbsp;&nbsp;&nbsp;
                        </font>
                    </td>
                    <td>
                        <input required type=text id="stuno" class="textbox" name="stuno" aria-label="请输入学号"
                               placeholder="请输入学号"
                               style="font-family:微软雅黑; font-size:14px" <?php if ($_POST["existInfo"] == 1 || $_POST["existInfo"] == 2 || $_POST["existInfo"] == 3) {
                            echo "value='" . $_POST['stuno'] . "'";
                        } ?> />
                    </td>
                </tr>
                <tr class="tr">
                    <td class="td_1">
                        <font class="reg_title">邮&nbsp;&nbsp;&nbsp;箱<font color="red">*</font>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </font>
                    </td>
                    <td>
                        <input type=text id="email" class="textbox" name="email" aria-label="请输入邮箱"
                               placeholder="请输入邮箱"
                               style="font-family:微软雅黑; font-size:14px" <?php if ($_POST["existInfo"] == 1 || $_POST["existInfo"] == 2) {
                            echo "value='" . $_POST['email'] . "'";
                        } ?> />
                    </td>
                </tr>
                <tr class="tr">
                    <td class="td_1">
                        <font class="reg_title">手机号:</font>
                    </td>
                    <td>
                        <input type=text id="mobile" class="textbox" name="mobile" aria-label="请输入手机号"
                               placeholder="请输入手机号"
                               style="font-family:微软雅黑; font-size:14px" <?php if ($_POST["existInfo"] == 1 || $_POST["existInfo"] == 2) {
                            echo "value='" . $_POST['mobile'] . "'";
                        } ?> />
                    </td>
                </tr>
                <tr class="tr">
                    <td class="td_1">
                        <font class="reg_title">年&nbsp;&nbsp;&nbsp;级&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;</font>
                    </td>
                    <td>
                        <select name="stugrade" id="grade">
                            <option value="">请选择</option>
                            <option
                                value="本科" <?php if (($_POST["existInfo"] == 1 || $_POST["existInfo"] == 2 || $_POST["existInfo"] == 3) && $_POST['stugrade'] == '大四')
                                echo "selected='selected'"; ?> >大四
                            </option>
                            <option
                                value="研一" <?php if (($_POST["existInfo"] == 1 || $_POST["existInfo"] == 2 || $_POST["existInfo"] == 3) && $_POST['stugrade'] == '研一')
                                echo "selected='selected'"; ?> >研一
                            </option>
                            <option
                                value="研二" <?php if (($_POST["existInfo"] == 1 || $_POST["existInfo"] == 2 || $_POST["existInfo"] == 3) && $_POST['stugrade'] == '研二')
                                echo "selected='selected'"; ?> >研二
                            </option>
                            <option
                                value="研三" <?php if (($_POST["existInfo"] == 1 || $_POST["existInfo"] == 2 || $_POST["existInfo"] == 3) && $_POST['stugrade'] == '研三')
                                echo "selected='selected'"; ?> >研三
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
                            $head  = ds_ImageModel::head;
                            $i      = 0;
                            foreach ($head as $image) {
                                $i++; ?>

                                <td bgcolor="#FFFFFF">
                                    <input type="radio" value="<?php echo $image ?>"
                                           name="image" checked="checked"/>
                                    <img alt="" src="<?php echo $image ?>" height="49" width="49" border="0">
                                </td>
                            <?php } ?>

                        </tr>
                    </table>
                </tr>
                <tr>
                    <button id="btn_reg" name="btn_reg" type="submit">注&nbsp;&nbsp;&nbsp;册</button>
                    <p><a id="href_back" href="index.php">返回</a></p>
                </tr>
            </table>
        </form>

    </div>
</div>

<?php
$reg_info   = 0;
$exist_info = 0;

if (isset($_POST["btn_reg"])) {

    $preUserObj   = new ds_PreUserInfoModel();
    $userObj      = new ds_UserInfoModel();
    $in_name      = trim($_POST["username"]);
    $in_pwd       = trim($_POST["userpwd"]);
    $in_pwdV      = trim($_POST['userpwdV']);
    $in_chinaName = trim($_POST["chinaname"]);
    $in_stuno     = trim($_POST["stuno"]);
    $in_email     = trim($_POST["email"]);
    $in_grade     = trim($_POST["stugrade"]);
    $in_image     = trim($_POST["image"]);
    $in_mobile    = trim($_POST["mobile"]);

    $isExitName = $userObj->getData($in_name);
    $isExitNo   = $userObj->getData(false, false, $in_stuno);
    $isPre      = $preUserObj->getData($in_chinaName);
    $pattern    = "/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i";
    if (!empty($isExitName[0])) {
        $exist_info = 1;
    } else if (strlen($in_pwd) < 6) {
        $exist_info = 2;
    } else if (preg_match($pattern, $in_email) == 0 && $in_email != '') {
        $exist_info = 3;
    } else if (!empty($isExitNo[0])) {
        $exist_info = 5;
    } else if(strcmp($in_pwd,$in_pwdV) != 0){
        $exist_info = 8;
    } else if (!empty($isPre[0])) {//将数据插入数据库
        $in_pwd = md5($in_pwd); //加密

        $result   = $userObj->add($in_name, $in_pwd, $in_chinaName, $in_stuno, $in_email, $in_grade, $in_image, $in_mobile);echo $result;
        if($result){
            $reg_info = 1;
        }
        $exist_info = 6;
    } else {
        $exist_info = 4;
    }
}

?>
<div style="display: none">
    <form id="hiddenForm" name="hiddenForm" action="" method="post">
        <input name="username" type="text" value="<?php echo $in_name; ?>"/>
        <input name="userpwd" type="text" value="<?php echo $in_pwd; ?>"/>
        <input name="chinaname" type="text" value="<?php echo $in_chinaName; ?>"/>
        <input name="stunum" type="text" value="<?php echo $in_stuno; ?>"/>
        <input name="useremail" type="text" value="<?php echo $in_email; ?>"/>
        <input name="stugrade" type="text" value="<?php echo $in_grade; ?>"/>

        <input id="existInfo" type="text" name="existInfo" value="<?php echo $exist_info; ?>"/>

    </form>
</div>

<script type="text/javascript">
    jsvar_1 = <?php echo $reg_info; ?>;
    jsvar_2 = <?php echo $exist_info; ?>; //将PHP中获取到的登录信息标记传给JS代码

    if (jsvar_1 == 1 && jsvar_2 != 1 && jsvar_2 != 2) { //如果注册成功，跳转到主页
        alert("注册成功！即将跳转至登录页面…………");
        window.location.href = 'index.php';
    }
    else if (jsvar_2 == 1 || jsvar_2 == 2 || jsvar_2 == 3 || jsvar_2 == 4 || jsvar_2 == 5 || jsvar_2 == 8) {
        window.onload = function () {
            document.getElementById('hiddenForm').submit();
        }
    }
</script>

</html>
