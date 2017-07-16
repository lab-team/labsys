<?php
require_once(dirname(__FILE__)."/model/ds/UserInfo.php");
require_once(dirname(__FILE__)."/model/ds/Sign.php");
if (!isset ($_SESSION)) {
    ob_start();
    session_start();
}
if (!isset($_SESSION['name'])) {
    //session_start();
    echo "<script>alert('你还没有登录!!!!');location='index.php';</script>";
} else {
    $name = $_SESSION['name'];
    $userObj=new ds_UserInfoModel();
    $userRes=$userObj->getData($name);
    $stuNo = $userRes[0]['stuno'];
    $signObj=new ds_SignModel();
    $result=$signObj->getData(false,$stuNo);
    $index = 0;
    $str   = "1";
    if ($result) {
        while ($rs = mysqli_fetch_array($result)) {
            $regdate[$index] = $rs['regDate'];
            $str             = $regdate[$index] . "/" . $str;
            $index++;


        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title>index</title>
    <link href="css/mystyle.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="js/new_file.js"></script>
    <script type="text/javascript" src="js/move.js"></script>
    <script type="text/javascript" src="js/MyAddWheel-1.1.js"></script>
    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="js/data.js"></script>

    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/date-range-picker.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/date-range-picker.js"></script>
    <script>
        var d = new Date();
        var date_str = (d.getMonth() + 1) + "/" + d.getDate() + "/" + d.getFullYear();
        var drp;

        function changeit(url) {
            window.location.href = url;
        }

        function makedatepicker() {
            var disableddates = []

            var str = '<?php echo $str?>';
            var length = (str.length) - 1; //获取拼接后的字符串总长度

            str = str.substr(0, length);
            var dd = [];
            str = str.split("/");

            var strlen = (str.length) - 1;
            var daterange = [];
            var j = 0;

            for (j = 0; j < strlen; j++) {  //j 表示str中获取到的第j个
                for (var i = 0; i < (str[j].length - 1); i++) {
                    strinner = str[j].split("-");
                }
                dd[j] = strinner[1] + "/" + strinner[2] + "/20" + strinner[0];
                daterange[j] = new Date(dd[j]);
                //location='testqiaodao.php?date='+str[0];
            }

            drp = $("#myDate").datepicker({
                daterange: daterange,
                disableddates: disableddates,
                defaultDate: new Date(date_str)
            });
        }

        /*遮罩层代码
         作用:通过遮罩层的方式防止表单提交次数过多
         */
        function MaskIt(obj) {
            var hoverdiv = '<div class="divMask" style="position: absolute; width: 100%; height: 100%; background: #fff; opacity: 0; filter: alpha(opacity=0);z-index:5;"></div>';
            $(obj).wrap('<div class="position:relative;"></div>');
            $(obj).before(hoverdiv);
            $(obj).data("mask", true);
        }
        function UnMaskIt(obj) {
            if ($(obj).data("mask") == true) {
                $(obj).parent().find(".divMask").remove();
                $(obj).unwrap();
                $(obj).data("mask", false);
            }
            $(obj).data("mask", false);
        }

        $(document).ready(function () {
            makedatepicker();
            MaskIt($('#wrap'));
        });

    </script>
</head>
<body>

<div id="all" style="position:absolute;height:100%;width:100%;z-index:-100">
    <div id="wrap">
        <div id="myDate" name="myDate" style="padding-left:75%; padding-top:0px;"></div>
    </div>
</div>

<div class="p4">

    <div class="p4Con">

        <h2 class="p4h2">
            <span class="et">实验室</span>任务系统
        </h2>

        <div id="p4Clis">
            <div class="p4Cll">


                <div class="p4CllM" id="p4m1"></div>
                <div class=texiao><h4><a href="#" onclick="changeit('TaskDetail.php')">任务管理工具</a></h4></div>
                <p>用于记录提醒人个工作及生活、学习等事务：让你轻松管理任务，有惊喜哟！</p>
            </div>
            <div class="p4Clr">
                <div class="p4ClrM" id="p4m2"></div>
                <div class=texiao><h4><a href="#" onclick="changeit('write.php')">周报工具</a></h4></div>
                <p>新入职工作的员工，想必都为周报头疼过，但是其实周报并不难，把自己的工作内容记录下来就可以了平时一定要养成工作记录的好习惯哟！</p>
            </div>

            <div class="p4Cll">
                <div class="p4CllM" id="p4m3"></div>
                <div class=texiao><h4><a href="#" onclick="changeit('stuReg2.php?WillLog=1')">个人签到</a></h4></div>
                <p>自由的内涵是“该”，前提是理性与意志力，知道自己该做什么，并一以贯之，前后一致，不为自己做过的选择后悔若给一些懒人“想”的自由，那么，大多数时候结果是堕落。所以签到吧！！！</p>
            </div>
            <div class="p4Clr">
                <div class="p4ClrM" id="p4m4"></div>
                <div class=texiao><h4><a href="#" onclick="changeit('UserInfo.php')">个人信息</h4></a></div>
                <p>扁平化组织环境下，更需要快速全面的了解每位下属的成效、既定工作的推进情况，并及时给予指导和调整。</p>
            </div>
            <div class="p4Cll">
                <div class="p4CllM" id="p4m5"></div>
                <div class=texiao><h4><a href="#" onclick="changeit('index2.php')">未开放</a></h4></div>
                <p>扁平化组织环境下，更需要快速全面的了解每位下属的成效、既定工作的推进情况，并及时给予指导和调整。</p>
            </div>
            <div class="p4Clr">
                <div class="p4ClrM" id="p4m6"></div>
                <div class=texiao><h4><a href="#" onclick="changeit('index2.php')">未开放</a></h4></div>
                <p>扁平化组织环境下，更需要快速全面的了解每位下属的成效、既定工作的推进情况，并及时给予指导和调整。</p>
            </div>
        </div>
    </div>
</div>

</html>			
