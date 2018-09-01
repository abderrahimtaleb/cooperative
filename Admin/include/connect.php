<?php
ini_set('display_errors','off'); 
$cnx=mysql_connect('localhost','root','') or die(mysql_error());
$select=mysql_select_db("e-commerce") or die(mysql_error());

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-commerce";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo /*$sql . "<br>" .*/ $e->getMessage();
    }


?>




