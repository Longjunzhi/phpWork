<?php
    include './dbConfig.php';
    include './test.php';
    // $rows =db::getGoods("users");
    // test::p($rows);
    // foreach($rows as $val){
    //      echo "name:".$val['user_name'].'---'.$val['user_number'];
    //      echo '<br />';
    //      }
    class db{
        public static $link;

        
        public static function getTable($table){
            //获取数据表信息
            self::getLink();
            $query = "select * from ".$table.";";
            $result = mysqli_query(self::$link, $query);
            self::closeLink();
            return mysqli_fetch_all($result,MYSQLI_BOTH);
        }

        public static function updateTable($table,$condition,$value){
            self::getLink();
            //更新$table表,$condition 条件语句， $value 内容

            self::closeLink();
            return 0;
        }


        public static function getLink(){
            self::$link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("数据库连接失败!");
            mysqli_set_charset(self::$link, 'utf8');
        }
        public static function closeLink(){
            mysqli_close(self::$link);
        }
    }
?>