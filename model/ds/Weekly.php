<?php
require_once(dirname(__FILE__) . '/../dao/Mysql.php');

class ds_WeeklyModel {
    /*
     *   table name
    */
    const table = 'leavewords';

    /**
     * 查询周报信息
     * @param bool $weekId
     * @param bool $title
     * @param bool $content
     * @param bool $sponsor
     * @return array
     */
    public function getData($weekId = false,$userName = false,$leaveTitle = false, $isAudit = false, $reply = false, $order = array(),$line = null, $size = null) {
        $condition = array();
        if (!empty($weekId)) {
            $condition['id'] = trim($weekId);
        }
        if (!empty($userName)) {
            $condition['username'] = trim($userName);
        }
        if (!empty($leaveTitle)) {
            $condition['leave_title'] = trim($leaveTitle);
        }
        if (!empty($isAudit)) {
            $condition['is_audit'] = $isAudit;
        }
        if (!empty($reply)) {
            $condition['reply'] = trim($reply);
        }
        if (empty($order)) {
            //默认降序
            $order = array('id' => 'desc');
        }
        $weeklyObj = new dao_MysqlModel();
        $res       = $weeklyObj->where($condition)->order($order)->limit2($line,$size)->select(self::table);
        return $res;
    }


    /**
     * @param $week_title
     * @param $week_content
     * @param $week_Sponsor
     * @return int
     */
    public function add($userName,$face,$leaveTitle,$leaveContents,$leaveTime) {
        if (empty($userName) || empty($face) || empty($leaveTitle) || empty($leaveContents) || empty($leaveTime)) {
            return false;
        }
        $insert                   =   array();
        $insert['username']       =   trim($userName);
        $insert['face']           =   trim($face);
        $insert['leave_title']    =   trim($leaveTitle);
        $insert['leave_contents'] =   trim($leaveContents);
        $insert['leave_time']     =   trim($leaveTime);
        $weeklyObj         = new dao_MysqlModel();
        $res               = $weeklyObj->insert(self::table, $insert);

        return $res;
    }

    /**
     * @param bool $weekId
     * @param bool $title
     * @return bool|int
     */
    public function delete($weekId = false, $title = false) {
        if (empty($weekId) && empty($week_Sponsor)) {
            return false;
        }
        $condition = array();
        if (!empty($weekId)) {
            $condition['id'] = trim($weekId);
        }
        if (!empty($title)) {
            $condition['leave_title'] = trim($title);
        }
        $weeklyObj = new dao_MysqlModel();
        $res       = $weeklyObj->where($condition)->delete(self::table);

        return $res;
    }

    /**
     * @param bool $weekId
     * @param bool $title
     * @param bool $content
     * @param bool $sponsor
     * @param      $condition
     * @return bool|int
     */
    public function update($face = false,$leaveTitle = false,$leaveContents = false,$leaveTime = false, $condition) {
        if (empty($condition) || !is_array($condition)) {
            return false;
        }
        $update = array();
        if (!empty($face)) {
            $update['$face'] = trim($face);
        }
        if (!empty($leaveTitle)) {
            $update['leave_title'] = trim($leaveTitle);
        }
        if (!empty($leaveContents)) {
            $update['leave_contents'] = trim($leaveContents);
        }
        if (!empty($leaveTime)){
            $update['leave_time'] = trim($leaveTime);
        }
        $weeklyObj = new dao_MysqlModel();
        $res       = $weeklyObj->where($condition)->update(self::table, $update);

        return $res;
    }

    public function getDataByLike($content = false,$time = false,$order = array()){
        $condition = array();
        if (!empty($content)) {
            $condition['leave_contents'] = trim($content);
        }
        if (!empty($time)) {
            $condition['leave_time'] = trim($time);
        }
        if (empty($order)) {
            //默认降序
            $order = array('id' => 'desc');
        }
        $weeklyObj = new dao_MysqlModel();var_dump($condition);
        $res       = $weeklyObj->like($condition)->order($order)->select(self::table);
        return $res;
    }
}
