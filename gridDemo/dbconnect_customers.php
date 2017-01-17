<?php
    class db{
        //
        private static $instance = NULL;

        private function __construct() {
        /*** maybe set the db name here later ***/
        }

        public static function getInstance() {
            try {
               
                if (!self::$instance)
                    {
                    self::$instance = new PDO("mysql:host=localhost;dbname=classicmodels", 'root', '');
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
