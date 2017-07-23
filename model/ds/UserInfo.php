<?php
require_once(dirname(__FILE__) . "/../dao/Mysql.php");
require_once(dirname(__FILE__) . "/../../conf/conf.php");

class ds_UserInfoModel {
    /**
     * table name
     */
    const table = 'userinfo';

    /**
     * 查询用户信息
     * @param string|bool $name
     * @param string|bool $china_name
     * @param string|bool $stuNo
     * @param int|bool    $grade
     * @return array
     * array(
     *      'id'=>1,
     *      'user_name'=>chen,
     *      'user_pwd'=>'111100',
     *      'china_name'=>'chen',
     *      'student_num'=>'111111',
     *      'user_email'=>'123456@163.com',
     *      'student_grade'=>'2',
     *      'face'=>'2',
     * )
     */
    public function getData($name = false, $chinaName = false, $stuNo = false, $grade = false, $order = array()) {
        $condtion = array();
        if (!empty($name)) {
            $condtion['username'] = trim($name);
        }
        if (!empty($chinaName)) {
            $condtion['chinaname'] = trim($chinaName);
        }
        if (!empty($stuNo)) {
            $condtion['stuno'] = trim($stuNo);
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
     * 添加用户
     * @param $name
     * @param $pswd
     * @param $chinaName
     * @param $stuNo
     * @param $email
     * @param $grade
     * @param $image
     * @param $mobile
     * @return int|string
     */
    public function add($name, $pswd, $chinaName, $stuNo, $email, $grade, $image, $mobile) {
        if (empty($name) || empty($pswd) || empty($chinaName) || empty($stuNo) || empty($email) || empty($grade) || empty($image) || empty($mobile)) {
            return false;
        }
        $insert              = array();
        $insert['username']  = trim($name);
        $insert['userpwd']   = trim($pswd);
        $insert['chinaname'] = trim($chinaName);
        $insert['stuno']     = trim($stuNo);
        $insert['email']     = trim($email);
        $insert['grade']     = trim($grade);
        $insert['image']     = trim($image);
        $insert['mobile']    = trim($mobile);
        $insert['regtime']   = date(Conf::dafult_time);
        $userObj             = new dao_MysqlModel();
        $res                 = $userObj->insert(self::table, $insert);

        return $res;
    }

    /**
     * update user info
     * @param bool $passWd
     * @param bool $grade
     * @param bool $face
     * @param      $condtion
     * @return int|string
     */
    public function update($condtion, $status = false, $passWd = false, $grade = false, $mobile = false,
                           $image = false,$email = false,$mac = false,$chinaname = false) {
        $update = array();
        if (empty($condtion) || !is_array($condtion)) {
            return false;
        }
        if (!empty($status)) {
            $update['status'] = trim($status);
        }
        if (!empty($passWd)) {
            $update['userpwd'] = trim($passWd);
        }
        if (!empty($grade)) {
            $update['grade'] = trim($grade);
        }
        if (!empty($mobile)) {
            $update['mobile'] = trim($mobile);
        }
        if (!empty($image)) {
            $update['image'] = trim($image);
        }
        if (!empty($email)) {
            $update['email'] = trim($email);
        }
        if (!empty($mac)) {
            $update['mac'] = trim($mac);
        }
        if(!empty($chinaname)){
            $update['chinaname'] = trim($chinaname);
        }

        $userObj = new dao_MysqlModel();
        $res     = $userObj->where($condtion)->update(self::table, $update);

        return $res;
    }

    /**
     * 逻辑删除
     * @param bool $name
     * @param bool $stuNo
     * @return int|string
     */
    public function delete($name = false, $stuNo = false) {
        if (empty($name) && empty($stuNo)) {
            return false;
        }
        $condtion = array();
        if (!empty($name)) {
            $condtion['username'] = trim($name);
        }
        if (!empty($stuNo)) {
            $condtion['stuno'] = trim($stuNo);
        }
        $res = $this->update($condtion, Conf::is_del);

        return $res;
    }
}

?>