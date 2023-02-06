<?php

class Dbh{

//Connect and Insert into database. Parameter is for the query.
public function connect($sql){
  $conn= new PDO("mysql:host=localhost; dbname=ums", "root", "");
  $conn->exec($sql);
  // echo  "success";
}

//Connect and fetch data from data. Parameter is for the query.
public function getdata($sql){
  $conn= new PDO("mysql:host=localhost; dbname=ums", "root", "");
  $sql1=$conn->query($sql);
  return $sql1;
}
}

?>