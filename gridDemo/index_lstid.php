<?php
    
        //
        try {
            //connect db
            $db = new PDO('mysql:host=localhost:3306;dbname=griddemo;charset=utf8', 'tstweb', 'tstweb');
            //$db_sak = new PDO('mysql:host=localhost:3306;dbname=sakila;charset=utf8', 'tstweb', 'tstweb');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            //
            /*** INSERT a new row ***/
            $db->exec("INSERT INTO animals(animal_type, animal_name) VALUES ('galah', 'polly')");

            /*** display the id of the last INSERT ***/
            echo $db->lastInsertId();

                    //disconnect
            $db = null;

        } catch(PDOException $ex) {
             /*** roll back the transaction if we fail ***/
              //$db->rollback();

              /*** echo the sql statement and error message ***/
              echo $table. '<br />' . $ex->getMessage();
             
        }
        //var_dump($dataDB);
?>
