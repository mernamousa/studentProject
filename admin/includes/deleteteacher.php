<?php

require_once "conn.php";
require_once "helpers.php";

if(isset($_GET['id'])){
    $sql = "DELETE FROM `teachers` WHERE id =?";
      $stmt = $conn->prepare($sql);
      $id =$_GET['id'];
      $stmt->execute([$id]);
      header('Location:../teachers.php');
      die();
}

?>