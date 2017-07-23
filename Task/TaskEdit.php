<?php
require_once (dirname(__FILE__).'/../model/bs/TaskInfo.php');

$id=$_GET['id'];
?>
<html>
<meta http-equiv="Content-Type" content="text/html" ; charset="utf-8" />
<style type="text/css">
body{text-align: center;background: #F7FAFC;overflow: hidden;background: #fff;}#canvas{display: inline-block;}
.basic-grey {
	margin-left: auto;
	margin-right: auto;
	max-width: 500px;
	background: #F7F7F7;
	padding: 25px 15px 25px 10px;
	font: 12px Georgia, "Times New Roman", Times, serif;
	color: #888;
	text-shadow: 1px 1px 1px #FFF;
	border: 1px solid #E4E4E4;
}

.basic-grey h1 {
	font-size: 25px;
	padding: 0px 0px 10px 40px;
	display: block;
	border-bottom: 1px solid #E4E4E4;
	margin: -10px -15px 30px -10px;;
	color: #888;
}

.basic-grey h1>span {
	display: block;
	font-size: 11px;
}

.basic-grey label {
	display: block;
	margin: 0px;
}

.basic-grey label>span {
	
	width: 20%;
	text-align: right;
	padding-right: 10px;
	margin-top: 10px;
	color: #888;
}

.basic-grey input[type="text"], .basic-grey input[type="email"],
	.basic-grey textarea, .basic-grey select {
	border: 1px solid #DADADA;
	color: #888;
	height: 30px;
	margin-bottom: 16px;
	margin-right: 6px;
	margin-top: 2px;
	outline: 0 none;
	padding: 3px 3px 3px 5px;
	width: 70%;
	font-size: 12px;
	line-height: 15px;
	box-shadow: inset 0px 1px 4px #ECECEC;
	-moz-box-shadow: inset 0px 1px 4px #ECECEC;
	-webkit-box-shadow: inset 0px 1px 4px #ECECEC;
}

.basic-grey textarea {
	padding: 5px 3px 3px 5px;
}

.basic-grey select {
	background: #FFF url('down-arrow.png') no-repeat right;
	background: #FFF url('down-arrow.png') no-repeat right);
	appearance: none;
	-webkit-appearance: none;
	-moz-appearance: none;
	text-indent: 0.01px;
	text-overflow: '';
	width: 70%;
	height: 35px;
	line-height: 25px;
}

.basic-grey textarea {
	height: 100px;
}

.basic-grey .button {
	background: #E27575;
	border: none;
	padding: 10px 25px 10px 25px;
	color: #FFF;
	box-shadow: 1px 1px 5px #B6B6B6;
	border-radius: 3px;
	text-shadow: 1px 1px 1px #9E3F3F;
	cursor: pointer;
}

.basic-grey .reset {
	background: #ccd2de;
	border: none;
	padding: 10px 25px 10px 25px;
	color: #FFF;
	box-shadow: 1px 1px 5px #B6B6B6;
	border-radius: 3px;
	text-shadow: 1px 1px 1px #9E3F3F;
	cursor: pointer;
}

.basic-grey .button:hover {
	background: #CF7A7A
}
.td_1{
	 wdith:50px;
}
.tr{
	 height:40px;
}

body{margin:0;padding:0;font-size:12px;}
ul.lanren{width:300px;}
.scale_panel{color:#999;width:240px;position:absolute;line-height:18px;left:-25px;top:0px;}
.scale_panel .r{float:right;}
.scale span{background:url(img/scroll.gif) no-repeat;width:8px;height:16px;position:absolute;left:-2px;top:-5px;cursor:pointer;}
.scale{ background-repeat: repeat-x; background-position: 0 100%; background-color: #E4E4E4; border-left: 1px #83BBD9 solid;  width: 240px; height: 3px; position: relative; font-size: 0px; border-radius: 3px; }
.scale div{ background-repeat: repeat-x; background-color: #3BE3FF; width: 0px; position: absolute; height: 3px; width: 0; left: 0; bottom: 0; }
.lanren li{font-size:12px;line-height:50px;position:relative;height:50px;list-style:none;}

</style>
<body>
	
	 <?php
	 $taskObj = new bs_TaskInfoModel();
	 $result = $taskObj->getTaskInfoByKeys(false,false,false,$id);
	 //var_dump($result);
    foreach ($result as $rs) {
        ?>
       <form action="" method="post" class="basic-grey">
	   <table style="width:100%">
	       <tr class="tr">
	           <td class="td_1">标题 :</td>
	           <td><?php echo $rs['title'];?></td>
	       </tr>
	       <tr class="tr">
	           <td class="td_1">起始时间:</td>
	           <td><?php echo $rs['stime'];?></td>
	       </tr>
	       <tr class="tr">
	           <td class="td_1">截止时间:</td>
	           <td><?php echo $rs['endtime'];?></td>
	       </tr>
            <tr class="tr">
	           <td class="td_1">内容:</td>
	           <td><?php echo $rs['content'];?></td>
	       </tr>
	       <tr class="tr">
	           <td class="td_1">进度:</td>
	           <td>
	               <input type="text" id="process" value="<?php echo $rs['process'];?>" name="process" readonly style="border:0px;"/>
	           </td>
	       </tr>
	       <tr>
	           <td></td>
	           <td>
	           <ul class="lanren">
	               <li>
		              <div class="scale_panel">
			             <span class="r">100</span>0
			             <div class="scale" id="bar">
				        <div></div>
				        <span id="btn"></span>
			         </div>
	                   </div>
	               </li>
	           </ul>
	           </td>
	       </tr>
	       <tr class="tr">
	           <td class="td_1">进度描述 :</td>
	           <td>
	               <textarea id="description" name="description" style="width:90%" placeholder="暂无任何描述"><?php echo $rs['desc']; ?></textarea>
	           </td>
	       </tr>
	       </table>
            <input type="submit" name="submit" class="button" value="保存修改" />
         </form>
<label><span> <a href="inquireTask1.php" onclick="changeit('seeTask.php')">
                                <span>返回</span>
                            </a></span></label>
    <?php if (isset($_POST["submit"]) && $_POST["submit"]) {
        
      if (isset($_POST["submit"]) && $_POST["submit"]) {
           echo $_POST['description'];
		  $result = $taskObj->updateTaskInfoById($id,$_POST['process'],$_POST['description']);
            if($result){
                echo "<script>alert('修改成功');location='inquireTask1.php';</script>";
            }
            else {
                echo "errror";
      }    } }?>
        
  
    
    <?php }
?>
	
<script>

var scale = function (btn,bar,process){
	this.btn=document.getElementById(btn);
	this.bar=document.getElementById(bar);
	this.process=document.getElementById(process);
	this.step=this.bar.getElementsByTagName("div")[0];
	this.init();
};
scale.prototype={
	init:function (){
		var f=this,g=document,b=window,m=Math;
		f.btn.onmousedown=function (e){
			var x=(e||b.event).clientX;
			var l=this.offsetLeft;
			var max=f.bar.offsetWidth-this.offsetWidth;
			g.onmousemove=function (e){
				var thisX=(e||b.event).clientX;
				var to=m.min(max,m.max(-2,l+(thisX-x)));
				f.btn.style.left=to+'px';
				f.ondrag(m.round(m.max(0,to/max)*100),to);
				b.getSelection ? b.getSelection().removeAllRanges() : g.selection.empty();
			};
			g.onmouseup=new Function('this.onmousemove=null');
		};
	},
	ondrag:function (pos,x){
		this.step.style.width=Math.max(0,x)+'px';
		this.process.value=pos+'%';
		
	}
}
new scale('btn','bar','process');

</script>




</body>
</html>