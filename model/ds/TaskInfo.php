<?php
require_once(dirname(__FILE__) . "/../dao/Mysql.php");
require_once(dirname(__FILE__) . "/../../conf/conf.php");

class ds_TaskInfoModel {
    /**
     * table name
     */
    const table = 'task';

    /**
     * 查询任务信息
     * @param bool  $id
     * @param bool  $title
     * @param bool  $sponsor
     * @param array $order
     * @return array
     * array(
     *      'id'=>1,
     *      'title'=>'title',
     *      'stime'=>'2017-01-01',
     *      'endtime'=>'2017-01-01',
     *      'content'=>'111111',
     *      'process'=>'xxx',
     *      'sponsor'=>'chen', //注册名
     *      'desc'=>'XXXXXX',
     *      'status'=>0,
     * )
     */
    public function getData($id = false, $title = false, $sponsor = false, $grade=false,$order = array()) {
        $condtion = array();
        if (!empty($id)) {
            $condtion['id'] = trim($id);
        }
        if (!empty($title)) {
            $condtion['title'] = trim($title);
        }
        if (!empty($sponsor)) {
            $condtion['sponsor'] = trim($sponsor);
        }
        if (!empty($grade)) {
            $condtion['grade'] = trim($grade);
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
     * 添加任务
     * @param $title
     * @param $content
     * @param $process
     * @param $sponsor
     * @param $desc
     * @return bool|int
     */
    public function add($title, $content, $process, $sponsor, $desc) {
        if (empty($title) || empty($content) || empty($process) || empty($sponsor) || empty($desc)) {
            return false;
        }
        $insert            = array();
        $insert['title']   = trim($title);
        $insert['content'] = trim($content);
        $insert['process'] = trim($process);
        $insert['sponsor'] = trim($sponsor);
        $insert['desc']    = trim($desc);
        $insert['stime']   = date(Conf::dafult_time);
        $userObj           = new dao_MysqlModel();
        $res               = $userObj->insert(self::table, $insert);

        return $res;
    }


    public function update($condtion, $title = false, $content = false, $desc = false, $process = false) {
        $update = array();
        if (empty($condtion) || !is_array($condtion)) {
            return false;
        }
        if (!empty($title)) {
            $update['title'] = trim($title);
        }
        if (!empty($content)) {
            $update['content'] = trim($content);
        }
        if (!empty($desc)) {
            $update['desc'] = trim($desc);
        }
        if (!empty($process)) {
            $update['process'] = trim($process);
        }

        $userObj = new dao_MysqlModel();
        $res     = $userObj->where($condtion)->update(self::table, $update);

        return $res;
    }

    /**
     * @param bool $id
     * @param bool $title
     * @param bool $process
     * @return bool|int
     */
    public function delete($id = false, $title = false, $process = false) {
        if (empty($id) && empty($title) && empty($process)) {
            return false;
        }
        $condtion = array();
        if (!empty($title)) {
            $condtion['title'] = trim($title);
        }
        if (!empty($id)) {
            $condtion['id'] = trim($id);
        }
        if (!empty($process)) {
            $condtion['process'] = trim($process);
        }
        $update  = array('status' => Conf::is_del);
        $userObj = new dao_MysqlModel();
        $res     = $userObj->where($condtion)->update(self::table, $update);

        return $res;
    }
}

?>