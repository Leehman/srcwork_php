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
            //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            //
            echo "Connected"."<br>";
            //$dataDB = $db->query('SELECT name, gender, company FROM clients ');
            //$count = $db->exec("INSERT INTO clients(name, gender, company) VALUES ('kiwi fruit', 'male', 'boo boohoo' )");

          /*** echo the number of affected rows ***/
            //echo $count;
            /*
            $sql = "SELECT * FROM clients";
            foreach ($db->query($sql) as $row)
                {
                print $row['name'] .' - '. $row['gender'] . '<br />';
                }

            */
            //$count = $db->exec("UPDATE clients SET name='kiwi friut australia' WHERE client_id=89");

            /*** echo the number of affected rows ***/
            //echo $count;

            /*** fetch into an PDOStatement object ***/
            //$sql = "SELECT * FROM clients";
            //$stmt = $db->query($sql);

            /*** echo number of columns ***/
            //$result = $stmt->fetch(PDO::FETCH_ASSOC);
            //$result = $stmt->fetch(PDO::FETCH_NUM);  
            //$result = $stmt->fetch(PDO::FETCH_BOTH); 
            /*** loop over the object directly ***/
            //foreach($result as $key=>$val)
            //{
            //  echo $key.' - '.$val.'<br />';
            //}


            /*** echo number of columns ***/
            //$obj = $stmt->fetch(PDO::FETCH_OBJ);

            /*** loop over the object directly ***/
            //echo $obj->name.'<br />';
            //echo $obj->gender.'<br />';
            //echo $obj->company;

            // /*** fetch into an PDOStatement object ***/
            //$stmt = $db->query($sql);

            /*** echo number of columns ***/
            //$result = $stmt->fetch(PDO::FETCH_BOTH);

            /*** loop over the object directly ***/
            //foreach($result as $key=>$val)
            //{
            //echo $key.' - '.$val.'<br />';
            //}
            /*** The SQL SELECT statement ***/
          //$sql = "SELECT * FROM clients";

          /*** fetch into an PDOStatement object ***/
          //$stmt = $db->query($sql);

          /*** fetch into the animals class ***/
          //$obj = $stmt->fetchALL(PDO::FETCH_CLASS, 'clients');

          /*** loop of the object directly ***/
          //foreach($obj as $clients)
          //    {
              /*** call the capitalizeType method ***/
          //    echo $clients->capitalizeType().'<br />';
          //    } 

             /*** The SQL SELECT statement ***/
            
            //$sql = "SELECT * FROM clients";

            /*** fetch into an PDOStatement object ***/
            //$stmt = $db->query($sql);

            /*** fetch into the animals class ***/
           // $clients = $stmt->fetchObject('clients');

            /*** echo the class properties ***/
            //echo $clients->name.'<br />';
           // echo $clients->capitalizeType().'<br />';
           // echo $clients->company;
                   /*** The SQL SELECT statement ***/
            //$sql = "SELECT * FROM clients";

            /*** fetch into an PDOStatement object ***/
            //$stmt = $db->query($sql);

            /*** set the fetch mode with PDO::setFetchMode() ***/
            //$stmt->setFetchMode(PDO::FETCH_INTO, new clients);

            /*** loop over the PDOStatement directly ***/
            //foreach($stmt as $clients)
            //{
            //echo $clients->capitalizeType().'<br />';
            //} 

             /*** The SQL SELECT statement ***/
            //$sql = "SELECT username FROM clients";
            //foreach ($db->query($sql) as $row)
             //   {
              //  print $row['name'] .' - '. $row['gender'] . '<br />';
              //  }
             $sql = "SELECT username FROM clients";

            /*** run the query ***/
             $result = $db->query($sql);



             //echo $db->errorCode();
             foreach($db->errorInfo() as $error)
              {
              echo $error.'<br />';
              }
            //disconnect
            $db = null;

        } catch(PDOException $ex) {
             echo "An Error occured! <br>"; //user friendly message
             echo $ex->getMessage();
             
        }
        //var_dump($dataDB);
?>
