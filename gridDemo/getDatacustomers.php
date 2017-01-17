<?php

require_once "dbconnect_customers.php";

class getData {

   //var $done = false;
   private static $editData = null;
   private static $dbreturn = null;

   public static function customersDB($fidcustomer) 
   {  try {

        //$db_clients = DB::getInstance();  //one instance only
        //$rec_id = $fid;

        $stmt = DB::getInstance()->prepare("SELECT * FROM customers WHERE customerNumber = :fidcustomer");

        $stmt->bindParam(':fidcustomer', $fidcustomer, PDO::PARAM_INT);
       
        $stmt->execute();

        $result = $stmt->fetchAll();

        foreach($result as $row)
            {
              self::$editData = array($row['customerNumber'],  $row['customerName'], $row['contactLastName'], 
                      $row['contactFirstName'], $row['phone'], $row['addressLine1'],
                      $row['addressLine2'], $row['city'], $row['state'], $row['postalCode'], $row['country'], 
                      $row['salesRepEmployeeNumber'], $row['creditLimit']);
            }

        /*** close the database connection ***/
        $dbc = null;
        return self::$editData;
          
      }    
      catch(PDOException $e)
      { echo $e->getMessage();  }
   }

   public static function clientByName($fclientname) 
   {  try {

        //$db_clients = DB::getInstance();  //one instance only
        //$rec_id = $fid;

        $stmt = DB::getInstance()->prepare("SELECT client_id, name, gender, company FROM clients WHERE name = :fclientname");

        $stmt->bindParam(':fclientname', $fclientname, PDO::PARAM_STR);
       
        $stmt->execute();

        $result = $stmt->fetchAll();

        foreach($result as $row)
            {
              self::$editData = array($row['name'], $row['gender'], $row['company'], $row['client_id']);
            }

        /*** close the database connection ***/
        $dbc = null;
        return self::$editData;
          
      }    
      catch(PDOException $e)
      { echo $e->getMessage();  }
  }

  public static function clientByid($fid) 
   {  try {

        //$db_clients = DB::getInstance();  //one instance only
        $rec_id = $fid;

        $stmt = DB::getInstance()->prepare("SELECT client_id, name, gender, company FROM clients WHERE client_id = :rec_id");

        $stmt->bindParam(':rec_id', $rec_id, PDO::PARAM_INT);
       
        $stmt->execute();

        $result = $stmt->fetchAll();

        foreach($result as $row)
            {
              self::$editData = array($row['name'], $row['gender'], $row['company']);
            }

        /*** close the database connection ***/
        $dbc = null;
        return self::$editData;
          
      }    
      catch(PDOException $e)
      { echo $e->getMessage();  }
  }
  public static function updateByid($fname,$fcompany,$fgender,$frecid) 
   {  try {

        //$rec_id = $frecid;
        $sql = "UPDATE clients SET name= ?, gender= ?, company= ? WHERE client_id = ?";
        $stmt = DB::getInstance()->prepare($sql);
        $isOk = $stmt->execute(array($fname,$fgender,$fcompany,$frecid));
        //
        //if ($isOk === TRUE) {
          $dbreturn = $stmt->rowCount();
          //return self::$dbreturn;    
       // } 
       // else {
            //trigger_error('Error executing statement.', E_USER_ERROR);
       //     $dbreturn = -1;
            //return -1;
       // }
        /*** close the database connection ***/
        return self::$dbreturn; 
      }    
      catch(PDOException $e)
      { echo $e->getMessage();  }
  }

  public static function addClients($fname,$fgender,$fcompany) 
   {  try {

        $sql = "INSERT clients (name, gender, company) VALUES ( :name, :gender, :company )";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->bindParam(':name', $fname, PDO::PARAM_STR, 50);
        $stmt->bindParam(':gender', $fgender, PDO::PARAM_STR, 50);
        $stmt->bindParam(':company', $fcompany, PDO::PARAM_STR, 50);
        $isOk = $stmt->execute();
        //
        //if ($isOk === TRUE) {
          $dbreturn = $stmt->rowCount();
          //return $rowCount;    
        //} 
        //else {
        //  $dbreturn = -1;
        //    trigger_error('Error executing statement.', E_USER_ERROR);
        //}
        /*** close the database connection ***/
        return self::$dbreturn;
      }    
      catch(PDOException $e)
      { echo $e->getMessage();  }
  }


  public static function deleteClients($frecid) 
   {  try {

        $sql = "DELETE clients WHERE client_id = ?";
        $stmt = DB::getInstance()->prepare($sql);
        $isOk = $stmt->execute(array($frecid));
        //
        //if ($isOk === TRUE) {
          $dbreturn = $stmt->rowCount();
          //return self::$dbreturn;    
       // } 
       // else {
            //trigger_error('Error executing statement.', E_USER_ERROR);
       //     $dbreturn = -1;
            //return -1;
       // }
        /*** close the database connection ***/
        return self::$dbreturn; 
      }    
      catch(PDOException $e)
      { echo $e->getMessage();  }
  }
 
} // end of class

?>
