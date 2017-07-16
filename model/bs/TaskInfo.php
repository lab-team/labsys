<?php
require_once(dirname(__FILE__) . "/../ds/TaskInfo.php");
require_once(dirname(__FILE__) . "/../ds/UserInfo.php");

class bs_TaskInfoModel {

    /**
     * @param bool $grade
     * @param bool $chinaName
     * @return bool
     */
    public function getTaskInfoByKeys($grade = false, $chinaName = false) {
        if (empty($grade) && empty($chinaName)) {
            return false;
        }
        $res     = array();
        $taskObj = new ds_TaskInfoModel();
        //获取符合条件的用户的所有信息
        $userObj = new ds_UserInfoModel();
        $userRes = $userObj->getData(false, $chinaName, false, $grade);
        //查询数据库错误
        if (false === $userRes) {
            return false;
        }
        foreach ($userRes as $user) {
            //获取任务信息
            $taskRes = $taskObj->getData(false, false, $user['username']);
            foreach ($taskRes as $task) {
                if (!empty($task)) {
                    $res[] = $task;
                }
            }
        }

        return $res;

    }
}