<?php

$con = new mysqli('localhost','root','root','crudoperation');

if(!$con){
    die(mysqli_error($con));
}

?>