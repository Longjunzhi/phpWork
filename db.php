<?php
    include './dbConfig.php';
    class db{
        public static $link;
        public static function getTable($table,$condition){
            //获取数据表信息
            self::getLink();
            $sql = "select * from ".$table." ";
            if($condition){
                $condition_str=[];
                foreach($condition as $key=>$value){
                    $condition_str[]=$key."='".$value."'";
                }
                $sql .=' WHERE ' . implode(" and ",$condition_str);
            }
            $sql .=';';
            $result = mysqli_query(self::$link, $sql);
            self::closeLink();
            return mysqli_fetch_all($result,MYSQLI_BOTH);
        }
        public static function updateTable($table,$condition,$data){
            //更新$table表,$condition 条件， $data 内容
            self::getLink();
            $data_str=[];
            foreach($data as $key=>$value){
                $data_str[]=$key."='".$value."'";
            }
            $condition_str=[];
            foreach($condition as $key=>$value){
                $condition_str[]=$key."='".$value."'";
            }
            $sql='UPDATE '.$table.' SET '.implode(' , ',$data_str).' '." WHERE ".implode(" and ",$condition_str).';' ;
            $res = mysqli_query(self::$link,$sql);
            // echo $sql;
            self::closeLink();
            return $res;
        }
        public static function add($table,$data){
            self::getLink();
            $sql='INSERT INTO '.$table ;
            $sql .="(`".implode("`,`",array_keys($data))."`) VALUES";
            $sql .="('".implode ("','",$data)."');";
            $res = mysqli_query(self::$link,$sql);
            self::closeLink();
            return $res;
        }
        public static function del($table,$data){
            self::getLink();
            $str=[];
            foreach($data as $key=>$value){
                $str[]=$key."='".$value."'";
            }
            $sql='UPDATE '.$table.' SET good_status_id=2 '." WHERE ".implode(" and ",$str).';' ;
            $res = mysqli_query(self::$link,$sql);
            self::closeLink();
            return $res;
        }

        public static function query($sql){
            //执行$sql语句返回结果
            self::getLink();
            $res = mysqli_query(self::$link,$sql);
            self::closeLink();
            return $res;
        }
    
        public static function getLink(){
            //建立连接
            self::$link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("数据库连接失败!");
            mysqli_set_charset(self::$link, 'utf8');
        }
        public static function closeLink(){
            //释放连接
            mysqli_close(self::$link);
        }
    }
?>