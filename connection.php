<?php

$localhost="localhost";
$username="root";
$password="";
$db="midass";

$conn= new mysqli($localhost,$username,$password,$db);
if($conn->connect_error)
{
  die('Conncection Donot established'.$conn->connect_error);
}















 ?>
