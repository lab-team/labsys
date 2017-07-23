<?php
require_once(dirname(__FILE__) . "/../ds/TaskInfo.php");
require_once(dirname(__FILE__) . "/../ds/UserInfo.php");

class bs_TaskInfoModel {

    /**
     * @param bool $grade
     * @param bool $chinaName
     * @param bool $title
     * @return bool
     */
//    public function getTaskInfoByKeys($grade = false, $chinaName = false, $title = false) {
//        if (empty($grade) && empty($chinaName)) {
//            return false;
//        }
//        $res     = array();
//        $taskObj = new ds_TaskInfoModel();
//        //获取符合条件的用户的所有信息
//        $userObj = new ds_UserInfoModel();
//        $userRes = $userObj->getData(false, $chinaName, false, $grade);
//        //查询数据库错误
//        if (false === $userRes) {
//            return false;
//        }
//        foreach ($userRes as $user) {
//            //获取任务信息
//            $taskRes = $taskObj->getData(false,$title, false, $user['username']);
//            foreach ($taskRes as $task) {
//                if (!empty($task)) {
//                    $res[] = $task;
//                }
//            }
//        }
//
//        return $res;
//
//    }

    /**
     * @param bool $name
     * @param bool $grade
     * @param bool $title
     * @return array|bool
     */
        public function getTaskInfoByKeys($name = false, $grade = false, $title = false,$id = false) {
            if(empty($name) && empty($grade) && empty($title) && empty($id)) {
                return false;
            }

            $res = array();
            $taskObj = new ds_TaskInfoModel();
            $userObj = new ds_UserInfoModel();
            $userRes = $userObj->getData($name, false, false, $grade);
            if(false === $userRes){
                return false;
            }
            foreach ($userRes as $user){
                $taskRes = $taskObj->getData($id, $title, $user['username']);
                foreach($taskRes as $task)
                    if(!empty($task)) {
                        $res[] = $task;
                }
            }
            return $res;

        }

    /**
     * 此函数向任务表中添加信息
     * @param     $title
     * @param     $stime
     * @param     $endtime
     * @param     $content
     * @param     $process
     * @param     $sponsor
     * @param     $desc
     * @param int $status
     * @return bool|int
     */

        public function insertTaskInfo($title,$stime,$endtime,$content,$process,$sponsor,$desc,$status=0){
            if (empty($title) || empty($content) || empty($process) || empty($sponsor) || empty($desc)
                || empty($stime) || empty($endtime)) {
                return false;
            }
            $insert            = array();
            $insert['title']   = trim($title);
            $insert['stime']   = trim($stime);
            $insert['endtime'] = trim($endtime);
            $insert['content'] = trim($content);
            $insert['process'] = trim($process);
            $insert['sponsor'] = trim($sponsor);
            $insert['desc']    = trim($desc);
            $insert['status']  = $status;
            $taskObj = new ds_TaskInfoModel();
            $res     = $taskObj->add($insert);
            return $res;
        }

    /**
     * 此函数用于逻辑删除任务信息
     * @param bool $id
     * @param bool $title
     * @param bool $process
     * @return bool|int
     */
        public function updateStatusOfTask($id = false,$title = false,$process = false ){
            $taskObj = new ds_TaskInfoModel();
            $res = $taskObj->delete($id,$title,$process);
            return $res;
        }


    /**
     * 此函数用于根据ID号来更新任务表的进度和进度描述信息
     * @param      $id
     * @param bool $process
     * @param bool $desc
     * @return bool|int
     */
        public function updateTaskInfoById($id,$process = false,$desc = false ){
            if(empty($id)){
                return false;
            }
            if(empty($process) && empty($desc)){
                return false;
            }

            $taskObj = new ds_TaskInfoModel();
            $res = $taskObj->update(array('id' => $id),false,false,$desc,$process);

            return $res;
        }

}