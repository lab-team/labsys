<?php
require_once(dirname(__FILE__) . "/../ds/Weekly.php");

class bs_WeeklyModel{

    public function getDataByEqual($weekId = false,$userName = false,$leaveTitle = false, $isAudit = false, $reply = false ,$order = array(),$line = null, $size = null){
        $taskObj = new ds_WeeklyModel();
        $res = $taskObj->getData($weekId,$userName,$leaveTitle,$isAudit,$reply,$order,$line,$size);
        return $res;
    }

    public function getDataByLike($content = false,$time = false,$order = array()){
        $weeklyObj = new ds_WeeklyModel();
        $res       = $weeklyObj->getDataByLike($content,$time,$order);
        return $res;
    }

    public function editWeekly($leaveContent = false,$leaveTime = false, $condition){
        $weeklyObj =    new ds_WeeklyModel();
        $res       =    $weeklyObj->update(false,false,$leaveContent,$leaveTime,$condition);
        return $res;
    }

    public function add($userName,$face,$leaveTitle,$leaveContents,$leaveTime){
        $weeklyObj = new ds_WeeklyModel();
        $res       = $weeklyObj->add($userName,$face,$leaveTitle,$leaveContents,$leaveTime);
        return $res;
    }

    public function ly_system($sort){
        $rs = $this->getDataByEqual();var_dump($rs);
        while($rows=mysqli_fetch_assoc($rs))
        {

            switch($sort){
                //case 1:
                //	echo $rows["name"];  //网站名称
                //	break;
                //case 2:
                //	echo $rows["title"];  //网站标题
                //	break;
                //case 3:
                //	echo $rows["keywords"];  //关键词
                //	break;
                //case 4:
                //	echo $rows["smalltext"];  //网站描述
                //	break;
                //case 5:
                //	echo $rows["url"];  //网站URL
                //	break;
                case 6:
                    return $rows["page"];  //页码
                    break;
                // case 7:
                // return $rows["is_audit"];  //留言审核
                // break;
                //case 8:
                //	return $rows["is_html"];  //过滤html
                //	break;
                default :
                    echo null;  //版权信息
            }
        }
    }

    public function getWeeklyNums($userName = false){
        $result = $this->getDataByEqual($userName);
        $nums = 0;
        foreach ($result as $value){
            $nums++;
        }
        return $nums;
    }
}