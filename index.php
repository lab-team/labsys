<?php
SESSION_START();
require_once(dirname(__FILE__)."/model/ds/UserInfo.php");
error_reporting(0);
?>
<html>
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

</script>
</body>

<head>

    <title>用户登录</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 微软雅黑;
        }

        #div_login {
            position: absolute;
            margin-left: 32%;
            margin-top: 8%;
            width: 35%;
            height: 490px;
            border: 3px;
            background-color: #FFFFFF;
            text-align: center;
            box-shadow: 0 0 5px #AAAAAA;
            top: 0;

        }

        #login_head {
            position: relative;
            top: 35px;
            font-size: 25px;
        }

        #div_logcontext {
            position: relative;
            top: -20px;
            height: 50%;
            width: 100%;
        }

        #loginForm {
            position: relative;
            padding-top: 10%;
        }

        .log_title {
            font-size: 18px;
            color: #555555;
        }

        #username, #userpwd {
            height: 40px;
            width: 50%;
        }

        #username, #userpwd {
            border-radius: 4px;
            border: 1px solid #cccccc;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);

        }

        #username:focus, #userpwd:focus {
            border-color: #66afe9;
            outline: 0;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(100, 149, 237, 0.6);
        }

        #btn_login {
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

        #btn_login:hover {
            background: #6495ED;
        }

        #loginfo_style {
            position: relative;
            text-align: left;
            top: 60px;
            left: 150px;
            font-size: 17px;
            color: #AA0000;
        }

        #btn_backpage {
            background: #5599FF;
            width: 80px;
            height: 26px;
            font-family: 微软雅黑;
            color: white;
            border: none;
            border-radius: 2px;
            cursor: pointer;
        }

        #btn_backpage:hover {
            background: #33CCFF;
        }
    </style>

</head>

<body>
<div id="div_login">
    <p align="center"><font id="login_head">用 户 登 录</font></p>
    <p id="loginfo_style">
        <?php
        if ($_POST["logInfo"] == -1) {
            echo "您尚未注册！！请先注册";
        }
        if ($_POST["logInfo"] == 2) {
            echo "用户名或密码错误！！请重新输入";
        }
        ?>
    </p>
    <div id="div_logcontext">
        <form id="loginForm" name="form" action="check_login.php" method="post">
            <p>
                <font class="log_title">帐 号:&nbsp;&nbsp;&nbsp;&nbsp;</font>
                <input required type=text id="username" name="username" aria-label="请输入用户名" placeholder="请输入用户名"/>
            </p>
            <p>
                <font class="log_title">密 码:&nbsp;&nbsp;&nbsp;&nbsp;</font>
                <input required type="password" id="userpwd" name="userpwd" aria-label="请输入密码" placeholder="请输入密码"/>
            </p><br/>
            <button id="btn_login" name="btn_login" type="submit">登&nbsp;&nbsp;&nbsp;录</button>
            <br/><br/><br/><br/>

            <font id="txt_regist" color="#808080">没有账户 ? 点击进行<a href="regist.php"
                                                                style="text-decoration:underline;color:#6495ED;cursor:pointer;">
                    &nbsp;注册 &nbsp;</a>
            </font>

        </form>
        <p>
            <a href="lab_admin/lab_admin/admin_login.php">
                <button id="btn_backpage">后台入口</button>
            </a>
        </p>
    </div>
</div>

</body>
</html>
