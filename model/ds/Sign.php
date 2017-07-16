<?php
require_once(dirname(__FILE__) . '/../dao/Mysql.php');

class ds_SignModel {
    /*
     *   table name
    */
    const table = 'stusign';

    /**
     * 查询签到信息
     * @param bool  $id
     * @param bool  $stuNo
     * @param bool  $regtime
     * @param bool  $mac
     * @param array $order
     * @return array
     */
    public function getData($id = false, $stuNo = false, $regtime = false, $mac = false, $order = array()) {
        $condition = array();
        if (!empty($id)) {
            $condition['id'] = trim($id);
        }
        if (!empty($stuNo)) {
            $condition['stuno'] = trim($stuNo);
        }
        if (!empty($regtime)) {
            $condition['regtime'] = trim($regtime);
        }
        if (!empty($mac)) {
            $condition['mac'] = trim($mac);
        }
        if (empty($order)) {
            //默认降序
            $order = array('id' => 'desc');
        }
        $weeklyObj = new dao_MysqlModel();
        $res       = $weeklyObj->where($condition)->order($order)->select(self::table);

        return $res;
    }


    /**
     * @param $week_title
     * @param $week_content
     * @param $week_Sponsor
     * @return int
     */
    public function add($stuNo, $regtime, $mac) {
        if (empty($stuNo) || empty($regtime) || empty($mac)) {
            return false;
        }
        $insert            = array();
        $insert['stuno']   = trim($stuNo);
        $insert['regtime'] = trim($regtime);
        $insert['mac']     = trim($mac);
        $weeklyObj         = new dao_MysqlModel();
        $res               = $weeklyObj->insert(self::table, $insert);

        return $res;
    }

}
