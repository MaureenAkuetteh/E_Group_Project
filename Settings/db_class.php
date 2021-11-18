<?php
require('db_cred.php');


class Connection {

    //database connection
    public $db = null;

    //variable for query results
    public $results = null;

    //Method to connect to the database
    function connection (){

        $this->db = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);

        //if there are any errors
        if(mysqli_connect_errno()){
            return false;
        }
      
        return true;

    

    }


    // function to execute database sql statements (for insert, update, and delete) 
    function query($query){

        // check if the connection was successful
        if($this->connection() == false){
            return false; 
        }
        // else excute the query
        $this->results = mysqli_query($this->db, $query);

        //check if results is returning false
        if($this->results !=true){
            
            return false;
        }
        //else return true
        return true;

    }

    //method to fetch/select multiple rows from the database 
    function fetch($query){
        if($this->query($query)){
            return mysqli_fetch_all($this->results, MYSQLI_ASSOC);
        }
        //else return false
        return false;
    }



    function fetchOne($query){
        // if query executes successfully

        if($this->query($query)){
            //return one row
            return mysqli_fetch_assoc($this->results);
        }
        //else return false
        return false;
    }
}

?>