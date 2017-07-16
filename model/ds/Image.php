<?php
require_once(dirname(__FILE__) . "/../dao/Mysql.php");

class ds_ImageModel {

    const table = 'image';

    public function getData($id = false, $title = false) {
        $condtion = array();
        if (!empty($id)) {
            $condtion['id'] = trim($id);
        }
        if (!empty($title)) {
            $condtion['title'] = trim($title);
        }
        $userObj = new dao_MysqlModel();
        $res     = $userObj->where($condtion)->select(self::table);

        return $res;
    }
}