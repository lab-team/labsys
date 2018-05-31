<?php
    require_once(dirname(__FILE__) . "/model/ds/UserInfo.php");
    if (!isset ($_SESSION)) {
        ob_start();
        session_start();
    }
    if (!isset($_SESSION['name'])) {
        echo "<script>alert('你还没有登录!!');location='index.php';</script>";
        exit("Log In");
}
    $name    = $_SESSION['name'];
    $userObj = new ds_UserInfoModel();
    $userRes = $userObj->getData($name);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AdminLTE | Simple Tables</title>
    <meta
        content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'
        name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!-- Ionicons -->
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css"/>
    <style type="text/CSS">
        .button {
            background: #E27575;
            border: none;
            padding: 10px 25px 10px 25px;
            color: #FFF;
            box-shadow: 1px 1px 5px #B6B6B6;
            border-radius: 3px;
            text-shadow: 1px 1px 1px #9E3F3F;
            cursor: pointer;
        }

        .button1 {
            background: #000000;
            border: none;
            padding: 10px 25px 10px 25px;
            color: #FFF;
            box-shadow: 1px 1px 5px #B6B6B6;
            border-radius: 3px;
            text-shadow: 1px 1px 1px #9E3F3F;
            cursor: pointer;

        }

        .button0 {
            background: #228B22;
            border: none;
            padding: 10px 25px 10px 25px;
            color: #FFF;
            box-shadow: 1px 1px 5px #B6B6B6;
            border-radius: 3px;
            text-shadow: 1px 1px 1px #9E3F3F;
            cursor: pointer;
        }

        .center {
        }
    </style>
</head>
<body>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<!-- Main content -->
<div class="center">
    <section class="content">
        <div class="row">
            <!-- /.box-header -->
            <div
                class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>用户名</th>
                        <th>中文名</th>
                        <th>学号</th>
                        <th>邮箱</th>
                        <th>年级</th>
                        <th colspan="2" align="center">操作</th>
                    </tr>

                    <?php
                    foreach ($userRes as $user) {
                        ?>
                        <tr>
                            <td><?php echo $user['username']; ?></td>
                            <td><?php echo $user['chinaname']; ?></td>
                            <td><?php echo $user['stuno']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['grade']; ?></td>
                            <td>
                                <input type="button" name="submit" class="button1" value="修改"
                                       onclick="window.location.href='<?php echo "moduserinfo.php?id=" . $user['stuno']; ?>' "/>
                            </td>
                        </tr>
                    <?php } ?>

                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
</body>
</html>
