<?php

require_once "conn.php";
require_once "helpers.php";

if(isset($_GET['id'])){
    $sql = "DELETE FROM `classes` WHERE id =?";
      $stmt = $conn->prepare($sql);
      $id =$_GET['id'];
      $stmt->execute([$id]);
      header('Location:../classes.php');
      die();
      

}

?>