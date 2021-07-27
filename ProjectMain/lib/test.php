<?php
    class DP{
        private static function connect_DB(){
            $host = "localhost";
            $dbname ="test2webtintuc";
            $us= "root";
            $pass ="";
            try{
                $con = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4",$us,$pass);
                return $con;
            }catch(PDOException $e){
                echo "Error: ".$e->getMessage();
                return false;
            }
        } 
        private static function get_type($var){
            switch($var){
                case "integer": return PDO::PARAM_INT;
                case "boolean": return PDO::PARAM_BOOL;
                case "null": return PDO::PARAM_NULL;
                default :return PDO::PARAM_STR;
            }
        } 
        public static function run_query_internal($q,$paras,$t,$con){
            try{
                $h= $con->prepare($q);
                foreach ($paras as $value =>$para ){
                    $h->bindValue($key+1,$para,DP::get_type($para));
                }
                $h->execute();
                $r;
                switch ($t) {
                    case 1: $r = true;break;
                    case 2: $r = $h->fetchAll();break;
                    case 3: $r = $con->lastInsertId();break;
                }
                $con =NULL;
                return $r;
            }catch(PDOException $e){
                echo "Error: ".$e->getMessage();
                return false;
            }
        } 
        public static function run_query($q,$paras,$t){
            $con = DP::connect_DB();
            if($con == false){
                return false;
            }
            return DP::run_query_internal($q,$paras,$t,$con);
        } 
    }
?>