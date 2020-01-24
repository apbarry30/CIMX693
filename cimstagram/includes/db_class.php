<?php

class database {
  public $mysqli;
  public $errors;
/*
* sets our initial object
*/
  public function __construct(){

    // Initialize the PHP MySql library
    $this->mysqli = mysqli_init();
    // Error checking syntax
    if (!$this->mysqli) {
        die('mysqli_init failed');
    }
    // More error checking.
    if (!$this->mysqli->options(MYSQLI_INIT_COMMAND, 'SET AUTOCOMMIT = 1')) {
        die('Setting MYSQLI_INIT_COMMAND failed');
    }
    // If it takes more than 5 seconds to connect, we have a problem
    if (!$this->mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5)) {
        die('Setting MYSQLI_OPT_CONNECT_TIMEOUT failed');
    }
    // connect syntax $mysqli->real_connect('host address', 'username', 'password', 'database name');
    // In the following connection, the password is empty because of the default xampp installation
    if (!$this->mysqli->real_connect('localhost', 'root', '', 'cimstagram')) {
        die('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
    }

  //  echo 'Success... ' . $this->mysqli->host_info . "\n<br>";
  }
  /*
  * we can create custom functions
  */
  // The read part of our db
  public function query($columns,$tablename,$filters){
    $where = "";
    $count = 0;
    //$filters is an array. we count the array to see if it has values
    if(count($filters) > 0) {
      $where = "WHERE ";
      foreach($filters as $key => $value){
        if($count > 0) {
          $combine = " AND";
        } else {
          $combine = "";
        }
        $where .= "$combine $key LIKE '$value' ";
        $count++;
      }
    }
    $sql = "SELECT $columns FROM $tablename $where";
    return $this->mysqli->query($sql);
  }
  public function update($columndata,$tablename,$filters){
    $before = "UPDATE `$tablename` SET ";
    // $keys store the column names
    $keys = "";
    // $values store the column values
    $values = "";
    // we use $count to track of the number of items displayed and
    // add "," if is not the last
    $where = "";
    $count = 0;
    //$filters is an array. we count the array to see if it has values
    if(count($filters) > 0) {
      $where = " WHERE ";
      foreach($filters as $key => $value){
        if($count > 0) {
          $combine = " AND";
        } else {
          $combine = "";
        }
        $where .= "$combine `$key` LIKE '$value' ";
        $count++;
      }
    }
    //$datasize gives us the number of items in $columndata
    $datasize = count($columndata) - 1;
    //iterate the array and get the column keys and values
    foreach ($columndata as $key => $value) {
      if($count < $datasize) {
        $combine = ",";
      } else {
        $combine = "";
      }
      $keys .= "`$key`$combine";
      if( ($value == 'NULL') || ($value == 'CURRENT_TIMESTAMP')){
        $values .= "`$key` = $value$combine";
      } else {
        $values .= "`$key` = '$value'$combine";
      }
      $count++;
    }
    //in insert $keys, `id`,`email`,`password`
    //the other part $values, NULL , 'jsj$sfs.com','1234'
    //echo $keys.'<br>';

  $sql = $before.$values.$where;
  echo $sql;

  }

  public function insert($tablename,$columndata){
    // $keys store the column names
    $keys = "";
    // $values store the column values
    $values = "";
    // we use $count to track of the number of items displayed and
    // add "," if is not the last
    $count = 0;
    //$datasize gives us the number of items in $columndata
    $datasize = count($columndata) - 1;

    foreach ($columndata as $key => $value) {
      if($count < $datasize) {
        $combine = ",";
      } else {
        $combine = "";
      }
      $keys .= "`$key`$combine";
      if( ($value == 'NULL') || ($value == 'CURRENT_TIMESTAMP')){
        $values .= "$value$combine";
      } else {
        $values .= "'$value'$combine";
      }
      $count++;
    }
    $sql = "INSERT INTO $tablename ($keys) VALUES ($values)";
    var_dump($sql);
     if($result = $this->mysqli->query($sql)){
       return $result;
     } else {
       $this->errors = $this->mysqli->error;
     }
  }
}


?>