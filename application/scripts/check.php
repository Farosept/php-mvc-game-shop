<?php
session_start();
require 'connection.php';  
if (isset($_SESSION['id']) and isset($_SESSION['hash'])) 
{
    $id = $_SESSION['id'];
    $query ="SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

    $userdata = mysqli_fetch_assoc($result);
    $roleId = $userdata['id_role'];
    if(($userdata['hash'] !== $_SESSION['hash']) or ($userdata['id'] !== $_SESSION['id'])) 
    { 
        session_unset();
        header('Location: /account/login'); exit();
    }
} 
else 
{ 
 header('Location: /account/login'); exit();
}