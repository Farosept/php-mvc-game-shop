<?php
 require_once 'connection.php';
 $idimg = $_GET['delimg'];
 $query="UPDATE games set photo=NULL where id='$idimg'";
 mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
 $ref = $_SERVER['HTTP_REFERER'];
 header("Location: $ref");exit();
 ?>