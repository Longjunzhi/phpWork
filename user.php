<?php
/**
 * author:pang
 * time:2020.05.30
 * param:
 * 定义用户类，来进行用户操作
 * 单例模式
 * 购买商品
 * 购物车操作
 * 修改用户信息
 */
class user{
    private static $instance = null;
    // public $id;
    // public $name;
    // public $number;
    private $setting=[];
    private function __construct($id,$name,$number){
    }
    private static function __clone(){}
    public static function getInstance(){
        if(self::$instance==null){
            self::$instance=new self();
        }
        return self::$instance;
    }
    public function set($index,$value){
        $this->setting[$index]=$value;
    }
    public function get($index){
        return $this->setting[$index];
    }
}
?>