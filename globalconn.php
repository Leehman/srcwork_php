<?php
    class db{
        //
        private static $instance = NULL;

        private function __construct() {
        /*** maybe set the db name here later ***/
        }

        public static function getInstance($mydb) {
            try {

                if (!self::$instance)
                    {
                    self::$instance = new PDO("mysql:host=localhost;dbname={$mydb}", 'root', '',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                    self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    }
                    return self::$instance;
                //}

            }
            catch(PDOException $e)
              { echo $e->getMessage();  }

        } // end

        private function __clone(){
            //end of code
        }


    }
?>
