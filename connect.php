<?php
//pour eviter les erreur de connection avec la base
ini_set('display_errors','off'); 
mysql_connect('localhost','root','');
mysql_select_db('e-commerce');

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

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function test_existance($name)
{
  if(isset($name))
  { 
    if(!empty($name))
    {
      
      return test_input($name);
    }
  }
  return false;
}

function test_longueur($name,$taille)
{
  if(strlen($name) <= $taille)
  { 
    return $name;
  }
  return false;
}
?>