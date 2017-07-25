<?php
/**
 *================================================================
 * Mysql.class.php
 * @Author: Happydong
 * @Date:   2017-07-25 19:38:18
 * @Last Modified by:   Happydong
 * @Last Modified time: 2017-07-25 19:55:49
 *================================================================
 */
class Mysql {
    /*
     * 构造方法，负责连接服务器，选择数据库，设置字符
     * 设置字符方法
     */

    // 数据库连接资源
    protected $conn = false;
    // sql语句
    protected $sql;
    /**
     * __construct 构造方法 负责连接服务器，选择数据库，设置字符
     * @access public
     * @param  $config string 配置数组
     */
    public function __construct($config = array()){
        $host = isset($config['host']) ? $config['host'] : "localhost";
        $user = isset($config['user']) ? $config['user'] : "root";
        $password = isset($config['password']) ? $config['password'] : " ";
        $dbname = isset($config['dbname']) ? $config['dbname'] : " ";
        $port = isset($config['port']) ? $config['port'] : "3306";
        $charset = isset($config['charset']) ? $config['charset'] : "uft8";

        $this->conn = mysql_connect("$host:$port", $user, $password) or die('连接数据库失败');
        mysql_select_db($dbname) or die('数据库选择失败');
        $this->setChar($charset);
    }
}