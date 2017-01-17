<?php
    
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
            /*** CREATE table statements ***/
            $table = "CREATE TABLE animals ( animal_id MEDIUMINT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            animal_type VARCHAR(25) NOT NULL,
            animal_name VARCHAR(25) NOT NULL 
            )";
            $db->exec($table);
            /***  INSERT statements ***/
            $db->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('emu', 'bruce')");
            $db->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('funnel web', 'bruce')");
            $db->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('lizard', 'bruce')");
            $db->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('dingo', 'bruce')");
            $db->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('kangaroo', 'bruce')");
            $db->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('wallaby', 'bruce')");
            $db->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('wombat', 'bruce')");
            $db->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('koala', 'bruce')");
            $db->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('kiwi', 'bruce')");

            /*** commit the transaction ***/
            $db->commit();
            /*** echo a message to say the database was created ***/
            echo 'Data entered successfully<br />';
            //disconnect
            $db = null;

        } catch(PDOException $ex) {
             /*** roll back the transaction if we fail ***/
              $db->rollback();

              /*** echo the sql statement and error message ***/
              echo $table. '<br />' . $ex->getMessage();
             
        }
        //var_dump($dataDB);
?>
