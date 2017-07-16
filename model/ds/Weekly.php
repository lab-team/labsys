<?php
require_once(dirname(__FILE__) . '/../dao/Mysql.php');

class ds_WeeklyModel {
    /*
     *   table name
    */
    const table = 'weekly';

    /**
     * 查询周报信息
     * @param bool $weekId
     * @param bool $title
     * @param bool $content
     * @param bool $sponsor
     * @return array
     */
    public function getData($weekId = false, $title = false, $content = false, $sponsor = false, $order = array()) {
        $condition = array();
        if (!empty($weekId)) {
            $condition['id'] = trim($weekId);
        }
        if (!empty($title)) {
            $condition['title'] = trim($title);
        }
        if (!empty($content)) {
            $condition['content'] = trim($content);
        }
        if (!empty($sponsor)) {
            $condition['sponsor'] = trim($sponsor);
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
    public function add($title, $content, $sponsor) {
        if (empty($week_title) || empty($week_content) || empty($week_Sponsor)) {
            return false;
        }
        $insert            = array();
        $insert['title']   = trim($title);
        $insert['content'] = trim($content);
        $insert['sponsor'] = trim($sponsor);
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
            $condition['title'] = trim($title);
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
    public function update($weekId = false, $title = false, $content = false, $condition) {
        if (empty($condition) || !is_array($condition)) {
            return false;
        }
        $update = array();
        if (!empty($weekId)) {
            $update['id'] = trim($weekId);
        }
        if (!empty($title)) {
            $update['title'] = trim($title);
        }
        if (!empty($content)) {
            $update['content'] = trim($content);
        }
        $weeklyObj = new dao_MysqlModel();
        $res       = $weeklyObj->where($condition)->update(self::table, $update);

        return $res;
    }
}
