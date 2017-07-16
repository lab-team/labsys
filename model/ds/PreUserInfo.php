<?php
require_once(dirname(__FILE__) . "/../dao/Mysql.php");
require_once(dirname(__FILE__) . "/../../conf/conf.php");

class ds_PreUserInfoModel {

    /**
     * 表名
     */
    const table = 'preuserinfo';

    /**
     * 获取数据
     * @param bool $chinaName
     * @param bool $id
     * @param bool $stuNo
     * @param bool $grade
     * @return array
     */
    public function getData($chinaName = false, $id = false, $stuNo = false, $grade = false, $order = array()) {
        $condtion = array();
        if (!empty($chinaName)) {
            $condtion['chinaname'] = trim($chinaName);
        }
        if (!empty($stuNo)) {
            $condtion['stuno'] = trim($stuNo);
        }
        if (!empty($grade)) {
            $condtion['grade'] = trim($grade);
        }
        if (!empty($id)) {
            $condtion['id'] = trim($id);
        }
        if (empty($order)) {
            //默认降序
            $order = array('id' => 'desc');
        }
        //逻辑删除之后的默认不显示
        $condtion['status'] = Conf::not_del;
        $userObj            = new dao_MysqlModel();
        $res                = $userObj->where($condtion)->order($order)->select(self::table);

        return $res;
    }

    /**
     * 逻辑删除
     * @param bool $id
     * @param bool $name
     * @param bool $stuNo
     * @return int|string
     */
    public function delete($id = false, $name = false, $stuNo = false) {
        if (empty($name) && empty($stuNo) && empty($id)) {
            return false;
        }
        $condtion = array();
        if (!empty($id)) {
            $condtion['id'] = trim($id);
        }
        if (!empty($name)) {
            $condtion['username'] = trim($name);
        }
        if (!empty($stuNo)) {
            $condtion['stuno'] = trim($stuNo);
        }
        $update['status'] = Conf::is_del;
        $userObj          = new dao_MysqlModel();
        $res              = $userObj->where($condtion)->update(self::table, $update);

        return $res;
    }
}

?>
