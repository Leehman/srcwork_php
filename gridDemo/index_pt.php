<?php
        class clients{

        public $name;

        public $gender;

        public $company;

        
        public function capitalizeType(){
         return ucwords($this->gender);
        }

        }
        //
        try {
            //connect db
            $db = new PDO('mysql:host=localhost:3306;dbname=griddemo;charset=utf8', 'tstweb', 'tstweb');
            //$db_sak = new PDO('mysql:host=localhost:3306;dbname=sakila;charset=utf8', 'tstweb', 'tstweb');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            //
            $db->beginTransaction();
            echo "Connected"."<br>";
            //
            /*** prepare the SQL statement ***/
            $client_id = 12;

            //$name = 'bruce';
            /*** some variables ***/
            $data = array('client_id'=>35);

            $stmt = $db->prepare("SELECT * FROM clients WHERE client_id = :client_id ");

            /*** bind the paramaters ***/
            $stmt->bindParam(':client_id', $client_id, PDO::PARAM_INT);
            //$stmt->bindParam(':name', $name, PDO::PARAM_STR, 5);

            /*** execute the prepared statement ***/
            //$stmt->execute();
            $stmt->execute($data);

            /*** fetch the results ***/
            //$result = $stmt->fetchAll();

            /*** loop of the results ***/
            //foreach($result as $row)
            //    {
            //    echo $row['client_id'].'<br />';
            //    echo $row['name'].'<br />';
            //    echo $row['company'];
            //    echo $row['gender'];
             //   }

            while($row = $stmt->fetch())
              {
              echo $row['client_id'].'<br />';
               echo $row['name'].'<br />';
               echo $row['company'];
               echo $row['gender'];
              }

            //disconnect
            $db = null;

        } catch(PDOException $ex) {
             echo "An Error occured! <br>"; //user friendly message
             echo $ex->getMessage();
             
        }
        //var_dump($dataDB);
?>
